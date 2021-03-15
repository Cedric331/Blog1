<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class ContactController extends Controller
{
    public function index()
    {
       $user = null;
       if (Auth::check()) {
          $user = Auth::user();
       }
       return Inertia::render('Contact',[
          'user' => $user
        ]);
    }

    public function post(Request $request)
    {
       $request->validate([
          'name' => ['required', 'string', 'max:50'],
          'email' => ['required', 'email'],
          'sujet' => ['required', 'string', 'max:50'],
          'message' => ['required', 'string', 'max:500'],
       ]);
       
      Mail::to(env('APP_MAIL'))->queue(new ContactMail($request->except('_token')));

      return response()->json(null, 200);
    }
}
