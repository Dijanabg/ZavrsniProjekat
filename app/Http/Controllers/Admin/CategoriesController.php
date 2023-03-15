<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        //return $category; ispisuje u json formatu na stranici 
        return view('categories.index',['category'=> $category]);
    }
    public function create()
    {
       
        return view('categories.create');
    }
    public function store(Request $request)
    {
       $new_cat = Category::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'status'=>$request->status
       ]);
       return redirect('categories/'. $new_cat->id);
    }
    public function show( $id)
    {
        $cat = Category::find($id);
        return view('categories.show',['categories'=>$cat]);
    }
    public function edit( $id)
    {
        $cat = Category::find($id);
        return view('categories.edit',['categories'=>$cat]);
    }
    public function update(Request $request,  $id)
    {
        $cat = Category::find($id);
        $cat->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'status'=>$request->status == true ? '1':'0',
        ]);
        return redirect('categories');
    }
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('categories');
    }
}
