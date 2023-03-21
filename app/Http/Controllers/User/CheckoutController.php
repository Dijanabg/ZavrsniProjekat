<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $old_cart = Cart::where('user_id',Auth::id())->get();
        foreach($old_cart as $item){
            if(!Product::where('id',$item->product_id)->exists()){
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cart = Cart::where('user_id',Auth::id())->get();
        return view('users.check', ['carts'=>$cart]);
    }
    public function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->pincode = $request->input('pincode');
        $order->adress = $request->input('adress');
        $order->total_price = $request->input('totalPrice');
        $order->tracking_no = 'dijana'.rand(1111, 9999);
        $order->save();

        $cart = Cart::where('user_id',Auth::id())->get()->first();
        $product_id = $request->input('product_id');
        foreach($cart as $citem){
            OrderItem::create([
                'order_id'=>$request->orderId,
                'product_id'=>$request->$citem->products->product_id,
                'price'=>$request->$citem->products->sell_price
            ]);
        }
        $cart = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cart);
        return redirect('/')->with('status', 'Porudžina je prihvaćena');
    }
}
// OrderItem::create([
//     'order_id'=>$request->OrderItem->orderId(),
//     'product_id'=>$request->input('product_id'),
//     'price'=>$request->input('sell_price')
// ]);