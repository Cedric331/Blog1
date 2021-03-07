<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title','image','content','article_id'
   ];
}
