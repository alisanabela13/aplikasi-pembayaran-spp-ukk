<?php

use Illuminate\Database\Seeder;

class ProdiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Prodi::create([
            'nama_prodi' => 'Rekayasa Perangkat Lunak'
        ]);

        App\Prodi::create([
            'nama_prodi' => 'MultiMedia'
        ]);

        App\Prodi::create([
            'nama_prodi' => 'Teknik Komputer dan Jaringan'
        ]);
    }
}
