<?php

namespace App\Http\Controllers;

use App\Article;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
   public function index()
   {
      return Inertia::render('Articles',[
         'articles' => Article::all()
      ]);
   }

   public function show($slug)
   {
      return Inertia::render('ViewArticle',[
         'article' => Article::where('slug', $slug)->first()
      ]);
   }
}
