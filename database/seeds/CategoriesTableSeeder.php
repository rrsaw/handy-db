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
        DB::table('categories')->insert(array(
             array('name'=>'category1','icon'=>'category1.png'),
             array('name'=>'category2','icon'=>'category2.png'),
             array('name'=>'category3','icon'=>'category3.png'),
             array('name'=>'category4','icon'=>'category4.png'),
             array('name'=>'category5','icon'=>'category5.png'),
             array('name'=>'category6','icon'=>'category6.png')
          ));
    }
}
