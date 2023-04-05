<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartApiController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id',Auth::id())->get();
        
        //return new CartResource::collection($cart);
    }
    public function store(Request $request){
        $product_id = $request->input('product_id');
        $validator = Validator::make($request->all(), [
            'product_id' => 'required'
        ]);
                 
        if ($validator->fails()) {
                    return response()->json($validator->errors());
        }
        $product_id = $request->input('product_id');
        if (Auth::check()) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json([' Already Added to Cart']);
                    
                } else {
                    $cart = new Cart();
                    $cart->product_id = $product_id;
                    $cart->user_id = Auth::id();
                    $cart->save();
                    return response()->json([' Added to Cart']);
                }
        } else {return response()->json(['status' ,' You must login']);
    }   
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
                    return response()->json(['status',' Deleted from Cart']);
                } else {
                    return response()->json(['status',' Not deleted from Cart']);
                }
        } return response()->json(['status',' Must login']);
    }
}

// public function index(Cart $cart)
// {

//    return $cart->with('Product')->get();
   
// }

// /**
//  * Show the form for creating a new resource.
//  *
//  * @return \Illuminate\Http\Response
//  */
// public function create()
// {
//     //
// }

// /**
//  * Store a newly created resource in storage.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @return \Illuminate\Http\Response
//  */
// public function store(Request $request, Cart $cart)
// {
//     $validator = Validator::make($request->all(), [
//         'product_id' => 'required'
//     ]);
     
//     if ($validator->fails()) {
       
//         $errors = $validator->errors();

//         //return $errors->toJson();
//         return response(null, 422);
        
//     }
//     else{
     
           
//             if (Product::where('id', '=', $request->product_id)->exists()) {
//                 $cart = new Cart;
//                 if(Cart::where('product_id', '=', $request->product_id)->exists()){

//                     $cart->where('product_id', $cart->product_id = $request->product_id)->increment('quantity' , 1 );
                   
     
//                  }
//                  else{
//                     $cart->quantity = 1;
//                  }
               
//                 $cart->product_id = $request->product_id;
//                 $cart->save();
//                 return $cart->with('product')->select( 'product_id', 'quantity')->get();  

//                 }else{
//                    return response(null, 404);
//                 }


            
          
           
          
           
       
       
//     }
   
// }

// /**
//  * Display the specified resource.
//  *
//  * @param  \App\cart  $cart
//  * @return \Illuminate\Http\Response
//  */
// public function show(cart $cart)
// {
//     //
// }

// /**
//  * Show the form for editing the specified resource.
//  *
//  * @param  \App\cart  $cart
//  * @return \Illuminate\Http\Response
//  */
// public function edit(cart $cart)
// {
//     //
// }

// /**
//  * Update the specified resource in storage.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @param  \App\cart  $cart
//  * @return \Illuminate\Http\Response
//  */
// public function update(Request $request, cart $cart)
// {
//     //
// }

// /**
//  * Remove the specified resource from storage.
//  *
//  * @param  \App\cart  $cart
//  * @return \Illuminate\Http\Response
//  */
// public function destroy(cart $cart)
// {
//    // Cart::truncate();
//     Cart::whereNotNull('id')->delete();
//    return response('http 200', 200);

   
// }

// public function delete(Cart $cart, Request $request)
// {
//    if(Cart::where('product_id', '=', $request->product_id)->exists()){
//     Cart::where('product_id', '=', $request->product_id)->delete();
  
//     return response(null, 200);
   
//    }else{
   
//     return response(null, 404);
//    }
  
   
