<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_uuid',
        'package_id',
        'stripe_subscription_id',
        'is_unlimited',
        'available_pass',
        'is_in_used',
        'start_time',
        'end_time',
        'status',
        'valid_until',
        'ending_notification_sent'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'valid_until' => 'datetime',
        'is_unlimited' => 'boolean',
        'is_in_used' => 'boolean',
        'ending_notification_sent' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function audits()
    {
        return $this->hasMany(TicketAudit::class, 'tickets_id');
    }
    
}
