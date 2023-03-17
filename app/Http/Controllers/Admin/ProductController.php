<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $prod = Product::findOrFail($id);
        $prod ->delete();
        return redirect('product');
    }
}
