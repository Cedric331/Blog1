<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
   public function index()
   {
      return Inertia::render('Articles',[
         'articles' => Article::all()
      ]);
   }

   public function indexCategorie($title)
   {
      $categorie = Categorie::where('title', $title)->first();

      return Inertia::render('Articles',[
         'articles' => Article::where('categorie_id', $categorie->id)->get()
      ]);
   }

   public function show($slug)
   {
      return Inertia::render('ViewArticle',[
         'article' => Article::where('slug', $slug)->first(),
         'user' => Auth::user()
      ]);
   }
}
