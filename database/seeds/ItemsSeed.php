<?php

use Illuminate\Database\Seeder;

class ItemsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('items')->insert(
            [   
                'name' => 'Laptop',
                'stock' => 12,
                'unit' => 'electronik',
                'created_at' => '2020-06-14 00:00:00',
                'updated_at' => '2020-06-14 00:00:00',
            ]
            );

        \DB::table('items')->insert(
            [
                'name' => 'Komputer',
                'stock' => 12,
                'unit' => 'electronik',
                'created_at' => '2020-06-14 00:00:00',
                'updated_at' => '2020-06-14 00:00:00',
            ]
            );
            
    }
}
