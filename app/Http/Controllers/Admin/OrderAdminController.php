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
        return view('admin.orders.edit',['orders'=>$orders]);
    }
    public function update(Request $request, $id){
        $orders = Order::findOrFail($id);
        $orders->status = $request->input('status');
        $orders->update();
        return redirect('/admin/orders')->with('status', "Porudžbina je ažurirana");
    }
}
