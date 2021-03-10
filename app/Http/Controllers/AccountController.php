<?php

namespace App\Http\Controllers;

use App\User;
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

    public function update(Request $request)
    {
       $request->validate([
         'name' => ['required', 'string', 'max:255'],
       ]);

       if ($request->email != Auth::user()->email) {
         $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
          ]);
       }

       $user = User::find(Auth::user()->id);
       $user->email = $request->email;
       $user->name = $request->name;
       $user->save();

       return response()->json($user, 200);
    }
}
