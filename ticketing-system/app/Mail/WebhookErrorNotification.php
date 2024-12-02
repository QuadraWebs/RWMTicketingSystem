<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class WebhookErrorNotification extends Mailable
{
    public $errorMessage;
    public $errorTrace;
    public $payload;

    public function __construct($errorMessage, $errorTrace, $payload)
    {
        $this->errorMessage = $errorMessage;
        $this->errorTrace = $errorTrace;
        $this->payload = $payload;
    }

    public function build()
    {
        return $this->subject('Stripe Webhook Error')
                    ->view('emails.webhook-error');
    }
}
