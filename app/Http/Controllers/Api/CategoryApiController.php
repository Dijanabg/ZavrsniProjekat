<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CategoryCollection;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return new CategoryCollection($categories);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'image' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
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
        
        return response()->json([
            'Kategorija je uspesno sacuvana',
            new CategoryResource($category)
        ]);
    }
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'image' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
       
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
        $category->save();
        return response()->json(['Kategorija je azurirana uspesno.', new CategoryResource($category)]);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('Post je uspesno obrisan.');
    }
}
