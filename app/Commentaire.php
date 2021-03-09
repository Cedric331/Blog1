<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
   protected $with = ['user'];

   protected $casts = [
      'created_at' => 'datetime:d-m-Y - H:i:s',
   ];

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'commentaire','user_id','article_id'
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }
}
