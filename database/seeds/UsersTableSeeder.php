<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();
      $user = factory(handy\User::class, 20)->create();
    }
}
