<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(JenjangTableSeeder::class);
        $this->call(ProdiTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(PetugasTableSeeder::class);
        $this->call(SppTableSeeder::class);
        $this->call(PetunjukTableSeeder::class);
        $this->call(TapelTableSeeder::class);
    }
}
