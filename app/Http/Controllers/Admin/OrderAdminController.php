<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        
        return view('admin.orders.index', ['orders'=>$orders]);
    }
    public function edit( $id)
    {
        $orders = Order::where('id', $id)->first();
        // $order_items = OrderItem::where('product_id', Product::all());
        return view('admin.orders.edit',compact('orders'));
    }
}
