<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nip'      => '0000000000000000',
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'role'     => 'administrator',
            'password'  => bcrypt('Hausbozz123'),
        ]);

        User::create([
            'nip'      => '0000000000000001',
            'name'      => 'Dimas',
            'email'     => 'dimas@gmail.com',
            'role'     => 'administrator',
            'password'  => bcrypt('password'),
        ]);

        User::create([
            'nip'      => '0000000000000002',
            'name'      => 'Afreza',
            'email'     => 'afreza@gmail.com',
            'role'     => 'administrator',
            'password'  => bcrypt('password'),
        ]);

        User::create([
            'nip'      => '0000000000000003',
            'name'      => 'Dhanu',
            'email'     => 'dhanu@gmail.com',
            'role'     => 'administrator',
            'password'  => bcrypt('password'),
        ]);

    }
}
