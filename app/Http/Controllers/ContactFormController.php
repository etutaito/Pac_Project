<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    
    function post_message(Request $request){

        //form validation

        $request->validate([
            'email'=> 'required|email'
        ]);

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'message'=> $request->message,
        ];

        Mail::to('admin@pacificprojectfiji.com')->send(new ContactFormMail($data));

        return back()->with('success','Thanks for reaching out. Your message has been sent successfully');
    }
}
