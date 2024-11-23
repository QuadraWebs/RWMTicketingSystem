<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        Log::info('Webhook received', ['payload' => $payload]);
        
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
            Log::info('Stripe event constructed', ['event_type' => $event->type]);
        } catch(\UnexpectedValueException $e) {
            Log::error('Invalid webhook payload', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                Log::info('Payment Intent Succeeded', [
                    'payment_intent_id' => $paymentIntent->id,
                    'amount' => $paymentIntent->amount,
                    'customer' => $paymentIntent->customer
                ]);
                return $this->handlePaymentIntentSucceeded($paymentIntent);

            case 'payment_method.attached':
                $paymentMethod = $event->data->object;
                Log::info('Payment Method Attached', [
                    'payment_method_id' => $paymentMethod->id,
                    'customer' => $paymentMethod->customer,
                    'type' => $paymentMethod->type
                ]);
                return $this->handlePaymentMethodAttached($paymentMethod);

            default:
                Log::info('Unknown event type received', ['type' => $event->type]);
                return response()->json(['message' => 'Received unknown event type ' . $event->type]);
        }
    }

    private function handlePaymentIntentSucceeded($paymentIntent)
    {
        Log::info('Processing Payment Intent', [
            'id' => $paymentIntent->id,
            'amount' => $paymentIntent->amount,
            'status' => $paymentIntent->status,
            'customer' => $paymentIntent->customer
        ]);
        
        return response()->json(['status' => 'success']);
    }

    private function handlePaymentMethodAttached($paymentMethod)
    {
        Log::info('Processing Payment Method', [
            'id' => $paymentMethod->id,
            'type' => $paymentMethod->type,
            'customer' => $paymentMethod->customer,
            'card_details' => $paymentMethod->card ?? null
        ]);
        
        return response()->json(['status' => 'success']);
    }
}
