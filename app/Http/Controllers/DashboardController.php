<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index');
    }

    //profile view

    public function contact_mail_sent(Request $request)
    {
        Mail::to('official.iamanis@gmail.com')->send(new ContactMail($request));
        
        return redirect()->route('account.dashboard')->with('success', 'Message sent successfully!!');
    }


}
