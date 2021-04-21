<?php

use Illuminate\Database\Seeder;
use App\Petugas;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Petugas::create([
            'id_user' => 1,
            'nama' => 'Dadang',
            'nip' => '00343259289',
            'nik' => '00678998990',
            'alamat' => 'Jl. Biawan No.9',
            'no_tlp' => '087645453434'
        ]);

        App\Petugas::create([
            'id_user' => 2,
            'nama' => 'chacha',
            'nip' => '003492899289',
            'nik' => '008872788989',
            'alamat' => 'Jl. awan No.9',
            'no_tlp' => '087682392929'
        ]);
       
        App\Petugas::create([
            'id_user' => 3,
            'nama' => 'Ujang',
            'nip' => null,
            'nik' => '000090082919',
            'alamat' => 'Jl. Layang No.9',
            'no_tlp' => '087649089999'
        ]);
    }
}