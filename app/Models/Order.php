<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'budget',
        'creator_id',
        'category_id',
        'status',
        
    ];

    public function orderItems() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function invoice() {
        return $this->hasOne(Invoice::class,'order_id', 'id');
    }
}
