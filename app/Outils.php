<?php

use App\Categorie;

function allCategories(){
   $categories = Categorie::orderBy('title')->get();
   return $categories;
}