<?php

use Illuminate\Database\Seeder;

class TapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tapel::create([
            'dari' => 2017,
            'sampai' => 2018
        ]);

        App\Tapel::create([
            'dari' => 2018,
            'sampai' => 2019
        ]);

        App\Tapel::create([
            'dari' => 2019,
            'sampai' => 2020
        ]);
    }
}
