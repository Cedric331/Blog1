<?php

namespace App\Http\Controllers;

use App\Like;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function store(Request $request)
    {
         $like = new Like;
         $like->user_id = Auth::user()->id;
         $like->article_id = $request->id;
         $like->save();
         $article = Article::find($request->id);
         
         return response()->json($article->likes, 200);
    }

    public function delete(Request $request)
    {
         $like = Like::where([
            ['article_id', $request->id],
            ['user_id', Auth::user()->id],
         ])->first();
         $like->delete();

         $article = Article::find($request->id);
         
         return response()->json($article->likes, 200);
    }
}
