<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($catid)
    {
        $category = Category::find($catid);

        if (is_null($category))
            return response()->json("category ne postoji", 404);

        return response()->json($category);
        //return new UserResource($user);
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
