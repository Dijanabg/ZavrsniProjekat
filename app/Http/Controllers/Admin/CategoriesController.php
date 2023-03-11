<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$category = Category::all();
        //kad je vise podataka radi se paginate
        $category = Category::paginate(10);
        //return $category; ispisuje u json formatu na stranici 
        return view('admin/categories.index',['category'=> $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin/categories.add',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $new_cat = Category::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'status'=>$request->status
       ]);
       return redirect('admin/categories/'. $new_cat->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = Category::find($id);
        return view('/admin/categories.show',['category'=>$cat]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Category::find($id);
        return view('/admin/categories.edit',['category'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = Category::find($id);
        $cat->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'status'=>$request->status
        ]);
        return redirect('/admin/categories/'. $cat->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('/admin/categories');
    }
}
