<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {   
        $category = Category::all();
        $trendprod = Product::where('trending', '1')->take(15)->get();
        $user = User::all();
        return view('frontend.index',['category'=> $category, 'products'=>$trendprod, 'users'=>$user]);
    } 
    public function category()
    {   
        $category = Category::all();
        $products = Product::all();
        
        return view('frontend.categories',['category'=> $category, 'products'=>$products]);
    } 
    public function catProducts($id)
    {   
        $category = Category::findOrFail($id);
        $cproducts = Product::where('category_id', $id)->take(15)->get();
        return view('frontend.prodbycat',['category'=> $category, 'products'=>$cproducts]);
    } 
}
