<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('frontend.contact',['stores'=>$stores]);
    }
    
}
    
    

