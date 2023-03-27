<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = 'products';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'short_desc' => $this->resource->short_desc,
            'description' => $this->resource->description,
            'slug' => $this->resource->slug,
            'image' => $this->resource->image,
            'sell_price' => $this->resource->sell_price,
            'orig_price' => $this->resource->orig_price,
            'qty' => $this->resource->qty,
            'status' => $this->resource->status,
            'trending' => $this->resource->trending,
            'category_id' => $this->resource->category_id
        ];
    }
}
