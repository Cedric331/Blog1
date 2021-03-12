<?php

use App\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $list = ['Animaux','Paysage','Ville'];

       foreach($list as $value) {
         $category =  new Categorie;
         $category->title = $value;
         $category->save();
       }
    }
}
