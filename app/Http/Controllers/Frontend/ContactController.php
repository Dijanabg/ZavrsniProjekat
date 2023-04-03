<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Store;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

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

        return to_route('frontend.contact');
    }
    
}
    
    

