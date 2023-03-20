<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id',Auth::id())->get();
        
        return view('users.cart', ['carts'=>$cart]);
    }
   
    public function show($id)
    {
       //
    }

    public function edit($id)
    {
       //
    }
    public function update(Request $request)
    {
       
    }
    public function destroy(Request $request)
    {    $product_id = $request->input('product_id');
        if (Auth::check()) {
            
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                    $cartItem->delete();
                    return redirect()->back();
                } else {
                    return redirect('cart');
                }
        } else return redirect('/login');
    }

}
