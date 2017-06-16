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
             array('name'=>'house holds','icon'=>'category1.png'),
             array('name'=>'gardening','icon'=>'category2.png'),
             array('name'=>'cars and repairs','icon'=>'category3.png'),
             array('name'=>'pets','icon'=>'category4.png'),
             array('name'=>'party','icon'=>'category5.png'),
             array('name'=>'others','icon'=>'category6.png')
          ));
    }
}
