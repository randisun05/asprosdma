<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['title' => 'Analis SDM Aparatur Ahli Pertama'],
            ['title' => 'Analis SDM Aparatur Ahli Muda'],
            ['title' => 'Analis SDM Aparatur Ahli Madya'],
            ['title' => 'Analis SDM Aparatur Ahli Utama'],
            ['title' => 'Pranata SDM Aparatur Terampil'],
            ['title' => 'Pranata SDM Aparatur Mahir'],
            ['title' => 'Pranata SDM Aparatur Penyelia'],
            ['title' => 'Lainnya'],
            ['title' => 'Lainnya2'],
            ['title' => 'Lainnya3'],
        ];

        foreach ($positions as $position) {
            \App\Models\Position::create($position);
        }
    }
}
