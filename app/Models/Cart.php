<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'prod_qty'
    ];
    public function cartitems(){
        return $this->hasMany(Product::class);
    }
    public function cartuser(){
        return $this->hasOne(User::class);
    }
}
