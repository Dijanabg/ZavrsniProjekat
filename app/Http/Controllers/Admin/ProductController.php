<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);
        return view('admin.product.index', ['products'=> $product]);
    }

    public function create()
    {   $cat = Category::all();
        return view('admin.product.create', ['categories'=>$cat]);
    }

    public function store(Request $request)
    {   
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $prodImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $prodImage);
        //     $input['image'] = "$prodImage";
        // }  
      
        $prod = Product::create([
       
            'name'=>$request->name,
            'short_desc'=>$request->short_desc,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'image'=>$request->prodImage,
            'sell_price'=>$request->sell_price,
            'orig_price'=>$request->orig_price,
            'qty'=>$request->qty,
            'status'=>$request->status == true ? '1':'0',
            'trending'=>$request->trending == true ? '1':'0',
            'category_id'=>$request->category
        ]);
        return redirect('product');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.show', ['products'=>$product]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit',['products'=>$product]);
    }
    public function update(Request $request, $id)
    {
        $prod = Product::find($id);
        $prod->update([
            'name'=>$request->name,
            'short_desc'=>$request->short_desc,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'sell_price'=>$request->sell_price,
            'orig_price'=>$request->orig_price,
            'qty'=>$request->qty,
            'status'=>$request->status == true ? '1':'0',
            'trending'=>$request->trending == true ? '1':'0',
            'category_id'=>$request->category
        ]);
        return redirect('product');
    }
    public function addToCart(Request $request, $id)
    { 
        $product_id = $request->input('product_id');
        if (Auth::check()) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    //return response()->json(['status' => $prod_check->name . ' Already Added to Cart']);
                    return redirect()->back();
                } else {
                    $cart = new Cart();
                    $cart->product_id = $product_id;
                    $cart->user_id = Auth::id();
                    $cart->save();
                    return redirect('cart');
                }
        } else return redirect('/login');
    }

    public function destroy(int $id)
    {
        $prod = Product::findOrFail($id);
        $prod ->delete();
        return redirect('product');
    }
}
// $product_id = $request->input('product_id');
//         $product_qty = $request->input('product_qty');
//         if (Auth::check()) {
//             $prod_check = Product::where('id', $product_id)->first();
//             if ($prod_check) {
//                 if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id()->exists())) {
//                     return response()->json(['status' => $prod_check->name . ' Already Added to Cart']);
//                 } else {
//                     $cartitem = new Cart();
//                     $cartitem->prod_id = $product_id;
//                     $cartitem->user_id = Auth::id();
//                     $cartitem->prod_qty = $product_qty;
//                     $cartitem->save();
//                     return response()->json(['status' => $prod_check->name . ' Added to Cart']);
//                 }
//             }
//         } else return response()->json(['status' => 'Login to Continue']);