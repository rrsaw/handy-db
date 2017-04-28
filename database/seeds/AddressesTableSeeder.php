<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('addresses')->delete();
      $address = factory(handy\Address::class, 20)->create();
    }
}
