<?php

use Illuminate\Database\Seeder;
use Database\Factory\ModelFactory;
use handy\Loan;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('loans')->delete();
      $loan = factory(handy\Loan::class, 20)->create();
    }
}
