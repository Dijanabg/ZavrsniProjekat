<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderWithItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->resource->user_id,
            'tracking_no' => $this->resource->tracking_no,
            'fname' => $this->resource->fname,
            'lname' => $this->resource->lname,
            'email' => $this->resource->email,
            'slug' => $this->resource->slug,
            'phone' => $this->resource->phone,
            'pincode' => $this->resource->pincode,
            'adress' => $this->resource->adress,
            'total_price' => $this->resource->total_price,
            'pay_mode' => $this->resource->pay_mode,
            'pay_id' => $this->resource->pay_id,
            'status' => $this->resource->status,
            'comment' => $this->resource->comment,
            'order_items' => OrderItemsResource::collection($this->order_items)
        ];
    }
}
