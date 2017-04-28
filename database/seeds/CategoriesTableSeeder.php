<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->delete();
      $category = factory(handy\Category::class, 20)->create();
    }
}
