<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        $total_price=0;
        $order_total = Cart::where('user_id',Auth::id())->get();
        foreach($order_total as $item){
            $total_price += $item->products->sell_price;
        }
        $order->total_price = $total_price;
        $order->tracking_no = 'dijana'.rand(1111, 9999);
        $order->save();

        OrderItem::create([
            'order_id' => DB::getPdo()->lastInsertId(),
            //'order_id'=>$request->OrderItem->orderId(),
            'product_id'=>$request->input('product_id'),
            'price'=>$request->input('sell_price')
        ]);

        // $cart = Cart::where('user_id',Auth::id())->get()->first();
        // $product_id = $request->input('product_id');
        // foreach($cart as $citem){
        //     OrderItem::create([
        //         'order_id' => DB::getPdo()->lastInsertId(),
        //         //'order_id'=>$request->orderId,
        //         'product_id'=>$request->$citem->products->product_id,
        //         'price'=>$request->$citem->products->sell_price
        //     ]);
        // }
        $cart = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cart);
        Alert::success('Porudžbina je prihvaćena','');
        return redirect('/')->with('status', 'Porudžina je prihvaćena');
    }
}
