<?php

namespace App\Http\Controllers\Admin;

//use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        //return $category; ispisuje u json formatu na stranici 
        return view('admin.categories.index',['category'=> $category]);
    } 
    public function create()
    {
       
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $category= new Category();
        $category->name = $request->input("name");
        $category->slug = $request->input("slug");
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image = $image->storeAs('public/category', $imageName);
                $category->image = $imageName;
        }
        $category->status = $request->input("status")==true? '1':'0';
        $category->save();
       return redirect('/admin/categories')->with('status', "Category add sucessfully");
    }
    public function show( $id)
    {
        $cat = Category::find($id);
        return view('categories.show',['categories'=>$cat]);
    }
    public function edit( $id)
    {
        $cat = Category::find($id);
        return view('admin.categories.edit',['categories'=>$cat]);
    }
    public function update(Request $request,  $id)
    {
        $category= Category::findOrFail($id);
        $category->name = $request->input("name");
        $category->slug = $request->input("slug");
        if ($request->hasFile('image')) {
                $path = 'public/category/'.$category->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image = $image->storeAs('public/category', $imageName);
                $category->image = $imageName;
        }
        $category->status = $request->input("status")==true? '1':'0';
        $category->update();
       return redirect('/admin/categories')->with('status', "Category updated sucessfully");
    }
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('admin/categories');
    }
}
