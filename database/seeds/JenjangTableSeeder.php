<?php

use Illuminate\Database\Seeder;

class JenjangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Jenjang::create([
            'kelas' => 10,
            'semester' => 1
        ]);

        App\Jenjang::create([
            'kelas' => 10,
            'semester' => 2
        ]);

        App\Jenjang::create([
            'kelas' => 11,
            'semester' => 1
        ]);

        App\Jenjang::create([
            'kelas' => 11,
            'semester' => 2
        ]);

        App\Jenjang::create([
            'kelas' => 12,
            'semester' => 1
        ]);

        App\Jenjang::create([
            'kelas' => 12,
            'semester' => 2
        ]);
    }
}
