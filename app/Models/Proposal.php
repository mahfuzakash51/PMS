<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'description',
        'user_id',
        'budget',
        'status',
    ];

    public function order() {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
