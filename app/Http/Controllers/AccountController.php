<?php

namespace App\Http\Controllers;

use App\User;
use App\Commentaire;
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
       $commentaires = Commentaire::with('article:id,title,slug')
                     ->where('user_id', Auth::user()->id)
                     ->orderBy('created_at','DESC')
                     ->get();
                     
       return Inertia::render('Account',[
          'user' => Auth::user(),
          'comments' => $commentaires
       ]);
    }

    public function update(Request $request)
    {
       $request->validate([
         'name' => ['required', 'string', 'max:255', 'alpha_dash'],
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

    public function delete(User $user)
    {
       $user->delete();

       return response()->json(null, 200);
    }
}
