<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
   protected $with = ['user'];

       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'article_id', 'user_id'
  ];

  public function user(){
   return $this->belongsTo(User::class);
   }
}
