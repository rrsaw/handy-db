<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('items')->delete();
      $item = factory(handy\Item::class, 20)->create();
    }
}
