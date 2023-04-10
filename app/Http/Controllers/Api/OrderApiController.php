<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OrderWithItemsResource;

class OrderApiController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return new OrderCollection($orders);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|max:20',
            'tracking_no' => 'required|string',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'pincode' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'total_price' => 'required|string|max:255',
            'pay_mode' => 'required|string|max:255',
            'pay_id' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'comment' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $order= new Order();
        $order->user_id = $request->input("user_id");
        $order->tracking_no = $request->input("tracking_no");
        $order->fname = $request->input("fname");
        $order->lname = $request->input("lname");
        $order->email = $request->input("email");
        $order->phone = $request->input("phone");
        $order->pincode = $request->input("pincode");
        $order->adress = $request->input("adress");
        $order->total_price = $request->input("total_price");
        $order->pay_mode = $request->input("pay_mode");
        $order->pay_id = $request->input("pay_id");
        $order->status = $request->input("status")==true? '1':'0';
        $order->comment = $request->input("comment");
        $order->save();
        
        return response()->json([
            'Porudzbina je uspesno kreirana',
            new OrderResource($order)
        ]);
    }

    public function show(Order $order)
    {
        return response()->json([
             new OrderWithItemsResource($order)
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $order->status = $request->input("status")==true? '1':'0';
        $order->save();
        return response()->json(['Porudzbina je azurirana uspesno.', new OrderResource($order)]);
    }
} 

