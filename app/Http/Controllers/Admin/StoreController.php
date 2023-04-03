<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

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
        $store->phone = $request->input("phone");
        $store->work_time = $request->input("work_time");
        
        $store->save();
        Alert::success('Prodavnica je dodata uspešno','');
       return redirect('/admin/store');
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
        $store->phone = $request->input("phone");
        $store->work_time = $request->input("work_time");
        $store->update();
        Alert::success('Podaci su uspešno ažurirani','');
       return redirect('/admin/store');
    }
    public function destroy($id)
    {
        $store = store::find($id);
        $store->delete();
        Alert::success('Prodavnica je izbrisana uspešno','');
        return redirect('/admin/store');
    }
}

