<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $fillable = [
        'product_id',
        'user_id'
    ];
    public function wishitems(){
        return $this->hasMany(Product::class);
    }
    public function wishuser(){
        return $this->hasOne(User::class);
    }
    public function wishlist(){
        return $this->hasMany(Product::class);
    }
}
