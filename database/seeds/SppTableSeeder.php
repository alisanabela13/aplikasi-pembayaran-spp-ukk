<?php

use Illuminate\Database\Seeder;

class SppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Spp::create([
            'id_jenjang' => 1,
            'nominal' => 500000
        ]);

        App\Spp::create([
            'id_jenjang' => 2,
            'nominal' => 500000
        ]);

        App\Spp::create([
            'id_jenjang' => 3,
            'nominal' => 600000
        ]);

        App\Spp::create([
            'id_jenjang' => 4,
            'nominal' => 600000
        ]);

        App\Spp::create([
            'id_jenjang' => 5,
            'nominal' => 700000
        ]);

        App\Spp::create([
            'id_jenjang' => 6,
            'nominal' => 700000
        ]);

    }
}
