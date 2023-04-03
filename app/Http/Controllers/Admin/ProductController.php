<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', ['products'=> $product]);
    }

    public function create()
    {   $cat = Category::all();
        return view('admin.product.create', ['categories'=>$cat]);
    }

    public function store(Request $request)
    {   
  
        $product= new Product();
        $product->name = $request->input("name");
        $product->short_desc = $request->input("short_desc");
        $product->description = $request->input("description");
        $product->slug = $request->input("slug");
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image = $image->storeAs('public/product', $imageName);
                $product->image = $imageName;
        }
        $product->sell_price = $request->input("sell_price");
        $product->orig_price = $request->input("orig_price");
        $product->qty = $request->input("qty");
        $product->status = $request->input("status")==true? '1':'0';
        $product->trending = $request->input("trending")==true? '1':'0';
        $product->category_id = $request->input("category");
        $product->save();
       return redirect('/admin/product')->with('status', "Product add sucessfully");
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
        $product = Product::find($id);
        $product->name = $request->input("name");
        $product->short_desc = $request->input("short_desc");
        $product->description = $request->input("description");
        $product->slug = $request->input("slug");
        if ($request->hasFile('image')) {
            $path = 'public/product/'.$product->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image = $image->storeAs('public/product', $imageName);
                $product->image = $imageName;
        }
        $product->sell_price = $request->input("sell_price");
        $product->orig_price = $request->input("orig_price");
        $product->qty = $request->input("qty");
        $product->status = $request->input("status")==true? '1':'0';
        $product->trending = $request->input("trending")==true? '1':'0';
        $product->category_id = $request->input("category");
        $product->save();
       return redirect('/admin/product')->with('status', "Product add sucessfully");
    }
    public function addToCart(Request $request)
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
                    Alert::success('Proizvod je ubacen u korpu','');
                    return redirect('cart');
                }
        } else return redirect('/login');
    }

    public function destroy(int $id)
    {
        $prod = Product::findOrFail($id);
        $prod ->delete();
        Alert::success('Proizvod je izbrisan','');
        return redirect('/admin/product');
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