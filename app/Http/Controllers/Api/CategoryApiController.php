<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // $category = Category::find($catid);

        // if (is_null($category))
        //     return response()->json("category ne postoji", 404);

        // return response()->json($category);
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($catid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $catid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $catid)
    {
        //
    }
}
