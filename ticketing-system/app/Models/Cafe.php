<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cafe extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'address'];

    public function ticketAudits()
    {
        return $this->hasMany(TicketAudit::class, 'cafes_id');
    }
}
