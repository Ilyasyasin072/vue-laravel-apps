<?php

use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product')->insert([
            'name' => 'asus',
            'price' => '10000',
            'description' => 'Barang Elektronik'
        ]);
    }
}
