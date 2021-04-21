<?php

use Illuminate\Database\Seeder;

class PetunjukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Petunjuk::create([
            'judul' => 'Tata Cara Pembayaran',
            'isi' => 'Siswa membayar spp melalui bank <h5>Mandiri</h5>'
        ]);
    }
}
