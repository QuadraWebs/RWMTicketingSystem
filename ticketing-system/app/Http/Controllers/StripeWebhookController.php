<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use App\Models\Ticket;
use App\Models\StripeTransaction;
use App\Enums\TicketStatus;
use App\Mail\ConfirmationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Str;
use App\Mail\TicketCreated;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Log::info('Webhook received');
        $payload = $request->all();

        if ($payload['type'] === 'checkout.session.completed') {
            Log::info($payload);
            return $this->handleCheckoutSessionCompleted($payload);
        }

        return response()->json(['status' => 'received']);
    }

    private function handleCheckoutSessionCompleted($payload)
    {
        DB::beginTransaction();
        \Log::info('Checkout session completed');


        try {
            $session = $payload['data']['object'];
            $metadata = $session['metadata'];
            $productId = $metadata['product_id'];

            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
            $checkoutLineItem = $stripe->checkout->sessions->allLineItems(
                $session['id'],
                []
            );

            $quantity = $checkoutLineItem['data'][0]['quantity'];

            // Check if package exists
            $package = Package::where('stripe_package_id', $productId)->first();
            if (!$package) {
                Log::error('Package not found', ['product_id' => $productId]);
                throw new \Exception('Package not found');
            }
            Log::info('Package found', context: $package->toArray());

            // Find existing user or create new one
            $user = User::firstOrCreate(
                ['email' => $session['customer_details']['email']],
                [
                    'name' => $session['customer_details']['name'],
                    'phone' => $session['customer_details']['phone'],
                    'uuid' => Str::uuid()
                ]
            );

            Log::info('User found or created', context: $user->toArray());

            $tickets = [];

            for ($i = 0; $i < $quantity; $i++) {
                $ticket = Ticket::create([
                    'user_uuid' => $user->uuid,
                    'package_id' => $package->id,
                    'status' => TicketStatus::Active,
                    'is_unlimited' => (int) ($package->pass_type === 0),
                    'available_pass' => $package->pass_type ?: 0,
                    'valid_until' => now()->addDays(30),
                    'ending_notification_sent' => false,
                ]);

                $tickets[] = $ticket;
            }

            StripeTransaction::create([
                'payment_intent_id' => $session['payment_intent'],
                'payment_link' => $session['payment_link'],
                'payment_status' => $session['payment_status'],
                'total_amount' => $session['amount_total'] / 100, // Convert from cents to dollars
                'amount_discount' => $session['total_details']['amount_discount'] / 100,
                'payment_method_type' => $session['payment_method_types'][0],
                'metadata' => $session['metadata'],
                'user_id' => $user->id,
                'ticket_id' => $tickets[0]->id // Reference to first ticket
            ]);

            DB::commit();

            Mail::to($user->email)->send(new TicketCreated($tickets[0], $user));

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Webhook processing failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to process webhook'
            ], 500);
        }
    }

}
