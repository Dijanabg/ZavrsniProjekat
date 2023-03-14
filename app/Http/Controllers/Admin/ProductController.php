<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', ['products'=> $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.add.create')->with(['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prod = Product::create([
            'name'=>$request->name,
            'short_desc'=>$request->short_desc,
            'decription'=>$request->decription,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'sell_price'=>$request->sell_price,
            'orig_price'=>$request->orig_price,
            'qty'=>$request->qty,
            'status'=>$request->status,
            'trending'=>$request->trending,
            'category_id'=>$request->category_id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        return view('admin/product.show', ['products'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit')->with(['products'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $prod = Product::findOrFail($id);
        $prod->update([
            'name'=>$request->name,
            'short_desc'=>$request->short_desc,
            'decription'=>$request->decription,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'sell_price'=>$request->sell_price,
            'orig_price'=>$request->orig_price,
            'qty'=>$request->qty,
            'status'=>$request->status,
            'trending'=>$request->trending,
            'category_id'=>$request->category_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $prod = Product::findOrFail($id);
        $prod ->delete();
        return redirect('admin.product');
    }
}
