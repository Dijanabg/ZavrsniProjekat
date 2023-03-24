<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::all();
        return view('admin.store.index',['store'=> $store]);
    } 
    public function create()
    {
       
        return view('admin.store.create');
    }
    public function store(Request $request)
    {
        $store= new Store();
        $store->city = $request->input("city");
        $store->adress = $request->input("adress");
        $store->work_time = $request->input("work_time");
        
        $store->save();
       return redirect('/admin/store')->with('status', "Store add sucessfully");
    }
    public function show( $id)
    {
    //
    }
    public function edit( $id)
    {
        $store = Store::find($id);
        return view('admin.store.edit',['store'=>$store]);
    }
    public function update(Request $request,  $id)
    {
        $store= Store::findOrFail($id);
        $store->city = $request->input("city");
        $store->adress = $request->input("adress");
        $store->work_time = $request->input("work_time");
        $store->update();
       return redirect('/admin/store')->with('status', "Store updated sucessfully");
    }
    public function destroy($id)
    {
        $store = store::find($id);
        $store->delete();
        return redirect('store');
    }
}

