<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

   protected $with = ['contenu','categorie', 'tag', 'commentaires', 'likes'];

   protected $casts = [
      'created_at' => 'datetime:d-m-Y',
   ];
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

   public function tag(){
      return $this->belongsToMany(Tag::class, 'article_tags');
   }

   public function commentaires(){
      return $this->hasMany(Commentaire::class);
   }

   public function likes(){
      return $this->hasMany(Like::class);
   }

}
