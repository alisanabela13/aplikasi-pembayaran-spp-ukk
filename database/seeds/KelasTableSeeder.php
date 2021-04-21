<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Kelas::create([
            'nama' => '10 TKJ 1',
            'id_prodi' => 3
        ]);


        App\Kelas::create([
            'nama' => '10 MM 1',
            'id_prodi' => 2
        ]);
        App\Kelas::create([
            'nama' => '10 RPL 1',
            'id_prodi' => 1
        ]);

        App\Kelas::create([
            'nama' => '11 TKJ 1',
            'id_prodi' => 3
        ]);

        App\Kelas::create([
            'nama' => '11 MM 1',
            'id_prodi' => 2
        ]);


        App\Kelas::create([
            'nama' => '11 RPL 1',
            'id_prodi' => 1
        ]);

        App\Kelas::create([
            'nama' => '12 TKJ 1',
            'id_prodi' => 3
        ]);


        App\Kelas::create([
            'nama' => '12 MM 1',
            'id_prodi' => 2
        ]);

        App\Kelas::create([
            'nama' => '12 RPL 1',
            'id_prodi' => 1
        ]);
    }
}
