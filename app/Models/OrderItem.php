<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
    ];

    public function orderitems(){
        return $this->hasMany(Product::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
