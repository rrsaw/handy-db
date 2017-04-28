<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('reviews')->delete();
      $review = factory(handy\Review::class, 20)->create();
    }
}
