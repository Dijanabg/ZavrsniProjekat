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
        'total_price',
        'pay_mode',
        'pay_id',
        'status',
        'comment' 
    ];
    public function users(){
        return $this->hasOne(User::class);
    }
}
