<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripeTransaction extends Model
{
    protected $fillable = [
        'payment_intent_id',
        'payment_link',
        'payment_status',
        'total_amount',
        'amount_discount',
        'payment_method_type',
        'metadata',
        'user_id',
        'ticket_id'
    ];

    protected $casts = [
        'metadata' => 'array',
        'total_amount' => 'decimal:2',
        'amount_discount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
