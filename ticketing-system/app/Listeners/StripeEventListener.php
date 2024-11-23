<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(WebhookReceived $event)
    {
        if ($event->payload['type'] === 'payment_intent.succeeded') {
            // Handle successful payment
            $paymentIntent = $event->payload['data']['object'];
            
            // Add your payment success logic here
            // For example:
            // - Update order status
            // - Send confirmation email
            // - Update database records
        }

        if ($event->payload['type'] === 'payment_intent.payment_failed') {
            // Handle failed payment
            $paymentIntent = $event->payload['data']['object'];
            
            // Add your payment failure logic here
            // For example:
            // - Update order status
            // - Send failure notification
            // - Log the error
        }
    }
}
