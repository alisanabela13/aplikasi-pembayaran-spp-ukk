<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('123123')

        ]);

        App\User::create([
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('123123')

        ]);
        
        App\User::create([
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'role' => 'Petugas',
            'password' => bcrypt('123123')

        ]);

        App\User::create([
            'username' => '00404040',
            'email' => 'rara@gmail.com',
            'role' => 'Siswa',
            'password' => bcrypt('123123')

        ]);
    }
}
