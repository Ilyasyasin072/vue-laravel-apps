<?php

use Illuminate\Database\Seeder;

class TransactionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('transactions')->insert([
            'user_id' => '1',
            'total_price' => '10000',
            'total_amount' => '20000'
        ]);
    }
}
