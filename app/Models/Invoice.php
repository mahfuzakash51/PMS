<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'total_cost',
        'payment_method',
        'details',
        'payment_status',

    ];

    public function order() {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
