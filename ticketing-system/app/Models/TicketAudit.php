<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TicketAudit extends Model
{
    protected $fillable = ['tickets_id', 'cafes_id', 'status'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'tickets_id');
    }

    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'cafes_id');
    }
}
