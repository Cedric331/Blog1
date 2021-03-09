<?php

namespace App\Http\Controllers;

use App\Article;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return Inertia::render('Home',[
           'article' => Article::where('top', true)->first()
         ]);
    }
}
