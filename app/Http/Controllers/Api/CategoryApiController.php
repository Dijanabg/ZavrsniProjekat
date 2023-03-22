<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryApiController extends Controller
{
    public function index()
    {
        $cat = DB::table('categories')->get();
        return $cat;
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
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:100',
            'slug' => 'required|string',
            'excerpt' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $cat = Category::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'Post je uspesno sacuvan',
            new CategoryResource($cat)
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
