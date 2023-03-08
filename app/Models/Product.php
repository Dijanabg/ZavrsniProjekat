<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_desc',
        'decription',
        'slug',
        'sell_price',
        'orig_price',
        'qty',
        'status',
        'trending',
        'category_id'
    ];
    public function category(){
        return $this->BelongsTo(Category::class,'category_id');
    }
}
