<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('images')->delete();
      $image = factory(handy\Image::class, 200)->create();
    }
}
