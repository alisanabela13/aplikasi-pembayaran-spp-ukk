<?php

use Illuminate\Database\Seeder;
use App\Siswa;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Siswa::create([
            'id_user' => 4,
            'nisn' => '00404040',
            'nis' => '21.900',
            'nama' => 'Tiara Ramadhani',
            'id_jenjang' => 1,
            'id_kelas' => 2,
            'alamat' => 'Jl. Anggrek No.108',
            'no_tlp' => '085678789865',
            'status' => 'Aktif'

        ]);
    }
}
