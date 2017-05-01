<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\ProfileImage;

class ProfileImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('profile_images')->delete();
      $image = factory(handy\ProfileImage::class, 20)->create();
    }
}
