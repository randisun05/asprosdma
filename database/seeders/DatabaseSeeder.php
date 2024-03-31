<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Event;
use App\Models\Member;
use App\Models\Category;
use App\Models\instansi;
use App\Models\ItemProfile;
use App\Models\Registration;
use App\Models\ProfileDataMain;
use App\Models\ProfileDataPosition;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'nip'      => '123',
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'role'     => 'administrator',
            'password'  => bcrypt('password'),
        ]);

        User::create([
            'nip'      => '456',
            'name'      => 'dimas',
            'email'     => 'dimas@gmail.com',
            'role'     => 'member',
            'password'  => bcrypt('password'),
        ]);

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

        Member::create([
            'nip'      => '199501052022031111',
            'nomember'      => '199501052022031001',
            'name'      => 'Administrator',
            'email'      => 'admin@gmail.com',
            'password'      => 'password',
            'agency'      => 'BKN',
        ]);
        Member::create([
            'nip'      => '199501052022031002',
            'nomember'      => '199501052022031002',
            'name'      => 'Randi',
            'email'      => 'randi@gmail.com',
            'password'      => 'password',
            'agency'      => 'BKN'
        ]);

        Member::create([
            'nip'      => '199501052022031003',
            'nomember'      => '199501052022031003',
            'name'      => 'Adi',
            'email'      => 'adi@gmail.com',
            'password'      => 'password',
            'agency'      => 'BKN'
        ]);

        ProfileDataMain::create([
            'nip'      => '199501052022031001',
            'nomember'      => '199501052022031001',
            'name'      => 'Administrator',
            'email'      => 'admin@gmail.com',

        ]);
        ProfileDataMain::create([
            'nip'      => '199501052022031002',
            'nomember'      => '199501052022031002',
            'name'      => 'Randi',
            'email'      => 'randi@gmail.com',

        ]);

        ProfileDataMain::create([
            'nip'      => '199501052022031003',
            'nomember'      => '199501052022031003',
            'name'      => 'Adi',
            'email'      => 'adi@gmail.com',

        ]);

        ProfileDataPosition::create([
            'main_id'      => '1',
            'agency'      => 'BKN',
            'position'      => 'Analis SDM Aparatur',
            'level'      => 'Pertama',

        ]);
        ProfileDataPosition::create([
            'main_id'      => '2',
            'agency'      => 'BKN',
            'position'      => 'Analis SDM Aparatur',
            'level'      => 'Pertama',
        ]);

        ProfileDataPosition::create([
            'main_id'      => '3',
            'agency'      => 'BKN',
            'position'      => 'Analis SDM Aparatur',
            'level'      => 'Pertama',
        ]);

        Category::create([
            'title'      => 'Berita',
        ]);

        Category::create([
            'title'      => 'Cerita',
        ]);

        Category::create([
            'title'      => 'Artikel',
        ]);

        Category::create([
            'title'      => 'Lainnya',
        ]);

        Event::create([
            'title'  => 'Media',
            'slug'  => 'Media',
            'body' => 'Media',
            'date' => '2024-03-16',
            'enddate' => '2024-03-16',
            'place' => 'Media',
            'link' => 'Media',
            'participant' => '0',
            'image' => '',
            'status' => 'media',
        ]);


        \App\Models\Post::factory(20)->create();
        \App\Models\Event::factory(20)->create();
        \App\Models\Merchan::factory(20)->create();


    }




}
