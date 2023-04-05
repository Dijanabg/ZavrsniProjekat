<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return new ProductCollection($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'short_desc' => 'required|string|max:255',
            'slug' => 'required|string',
            'image' => 'required|string',
            'sell_price' => 'required|integer',
            'orig_price' => 'required|integer',
            'qty' => 'required|integer',
            'status' => 'required',
            'trending' => 'required',
            'category_id' =>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
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
        $product->category_id = $request->input("category_id");
        $product->save();
        return response()->json([
            'Proizvod je uspesno sacuvan',
            new ProductResource($product)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'short_desc' => 'required|string|max:255',
            'slug' => 'required|string',
            'image' => 'required|string',
            'sell_price' => 'required|integer',
            'orig_price' => 'required|integer',
            'qty' => 'required|integer',
            'status' => 'required',
            'trending' => 'required',
            'category_id'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
                $product->name = $request->name;
                $product->short_desc = $request->short_desc;
                $product->description = $request->description;
                $product->slug = $request->slug;
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
                $product->sell_price = $request->sell_price;
                $product->orig_price = $request->orig_price;
                $product->qty = $request->qty;
                $product->status = $request->status==true? '1':'0';
                $product->trending = $request->trending==true? '1':'0';
                $product->category_id = $request->category_id;
                $product->save();
                return response()->json(['Proizvod je azuriran uspesno.', new ProductResource($product)]);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['Proizvod je uspesno obrisan.']);
    }
}
