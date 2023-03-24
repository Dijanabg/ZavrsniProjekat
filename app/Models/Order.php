<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tracking_no',
        'fname',
        'lname',
        'email',
        'phone',
        'pincode',
        'adress',
        'total_price',
        'pay_mode',
        'pay_id',
        'status',
        'comment' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order_items()
    {
        return $this->belongsTo(Order::class, 'order_id','id');
}
}
