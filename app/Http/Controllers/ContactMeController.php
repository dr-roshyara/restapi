<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;
class ContactMeController extends Controller
{
    //
      //
      public $topic="store";
    public function show(){
        return view('emails.contact');
    }
    public function store(){
    //    dd(request()->all());
        $email =request()->validate(['email'=>'required | email']);
        //  dd($email);
          Mail::to($email)
        ->send(new ContactMe());
        return redirect('/contact')
        ->with('message',"Email gesendet");
    }
}
