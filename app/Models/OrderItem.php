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
    public function orders(){
        return $this->BelongsTo(Order::class,'order_id','id');
    } public function products(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
    public function product(){
        return $this->hasMany(Product::class,'product_id','id');
    }
}
