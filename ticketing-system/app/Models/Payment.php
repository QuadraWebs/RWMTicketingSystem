<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'stripe_session_id',
        'amount',
        'customer_email',
        'status'
    ];
}
