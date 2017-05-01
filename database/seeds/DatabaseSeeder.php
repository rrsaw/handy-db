<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(LoansTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        //$this->call(ForeignKeySeeder::class);
    }
}
