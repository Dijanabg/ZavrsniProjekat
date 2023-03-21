<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
    ];
    public function orderId(){
        return $this->BelongsTo(Order::class,'order_id');
    } public function user(){
        return $this->belongsTo(User::class);
    }
    // public function carts(){
    //     return $this->BelongsTo(Cart::class,'product_id', 'product_id');
    // } 
    public function orderitems(){
        return $this->hasMany(Product::class);
    }
    // public function orders(){
    //     return $this->hasMany(Order::class);
    // }
}
