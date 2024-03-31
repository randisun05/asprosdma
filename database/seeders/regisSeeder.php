<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class regisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registration::create([
            'nip'      => '1',
            'name'      => 'randi',
            'email'     => 'randi@gmail.com',
            'contact'     => '008',
            'agency'     => 'bkn',
            'position'     => 'Analis SDM Aparatur',
            'level'     => 'pertama',
            'document_jab'     => 'aa',
            'status'     => 'submission',
        ]);

        Registration::create([
            'nip'      => '2',
            'name'      => 'dimas',
            'email'     => 'dimas@gmail.com',
            'contact'     => '009',
            'agency'     => 'bkn',
            'position'     => 'Analis SDM Aparatur',
            'level'     => 'muda',
            'document_jab'     => 'aa',
            'status'     => 'submission',
        ]);

        Registration::create([
            'nip'      => '3',
            'name'      => 'reza',
            'email'     => 'reza@gmail.com',
            'contact'     => '0010',
            'agency'     => 'bkn',
            'position'     => 'Pranata SDM Aparatur',
            'level'     => 'mahir',
            'document_jab'     => 'aa',
            'status'     => 'submission',
        ]);

        Registration::create([
            'nip'      => '4',
            'name'      => 'dhanu',
            'email'     => 'dhanu@gmail.com',
            'contact'     => '0011',
            'agency'     => 'bkn',
            'position'     => 'Pranata SDM Aparatur',
            'level'     => 'penyelia',
            'document_jab'     => 'aa',
            'status'     => 'submission',
        ]);
    }
}
