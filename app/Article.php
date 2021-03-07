<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

   protected $with = ['contenu','categorie'];
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title','image','slug','categorie_id','top'
   ];

   public function contenu(){
      return $this->hasMany(Contenu::class);
   }

   public function categorie(){
      return $this->belongsTo(Categorie::class);
   }
}
