<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Store;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::all();
        return view('frontend.contact',['stores'=> $stores]);
    }
    public function submit(ContactRequest $request)
    {
        Mail::to('di.webkom@gmail.com')->send(new ContactMail($request->name, $request->email, $request->subject, $request->message));
        Alert::success('Email je uspešno poslat','Potrudićemo se da odgovorimo u najkraćem mogućem roku');
        return to_route('contact.index');
        //return response()->json($request);
    }
    
}