<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //   $this->call(CategorieSeeder::class);
      //   $this->call(ArticleSeeder::class);
        $this->call(TagSeeder::class);
    }
}
