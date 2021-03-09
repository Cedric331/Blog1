<?php

namespace App\Http\Controllers;

use App\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

    public function store(Request $request)
    {
       $request->validate([
          'commentaire' => ['required', 'string', 'max:255']
       ]);

         $commentaire = new Commentaire;
         $commentaire->commentaire = $request->commentaire;
         $commentaire->article_id = $request->article;
         $commentaire->user_id = Auth::user()->id;
         $commentaire->save();

         $commentaires = Commentaire::where('article_id', $request->article)->get();

         return response()->json($commentaires, 200);
    }

    public function edit(Request $request)
    {
      $request->validate([
         'commentaire' => ['required', 'string', 'max:255']
      ]);
         $commentaire = Commentaire::find($request->id);

         if (Auth::user()->can('update', $commentaire)) {
            $commentaire->commentaire = $request->commentaire;
            $commentaire->save();

            $commentaires = Commentaire::where('article_id', $commentaire->article_id)->get();

            return response()->json($commentaires, 200);

          } 
          else {
            return response()->json(null, 401);
          }
    }
}
