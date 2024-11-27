<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'stripe_package_id',
        'name',
        'description',
        'price',
        'duration',
        'is_recurring',
        'pass_type',
        'title',
        'payment_link'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
