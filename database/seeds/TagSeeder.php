<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tag = new Tag;
      $tag->name = "nature";
      $tag->save();

      $tag = new Tag;
      $tag->name = "forêt";
      $tag->save();

      $tag = new Tag;
      $tag->name = "hiver";
      $tag->save();

      $tag = new Tag;
      $tag->name = "paysage";
      $tag->save();

      $tag = new Tag;
      $tag->name = "ville";
      $tag->save();

      $tag = new Tag;
      $tag->name = "portrait";
      $tag->save();
    }
}
