<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
       return Inertia::render('Account',[
          'user' => Auth::user()
       ]);
    }
}
