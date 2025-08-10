<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'list'=> '1',
            'text'=> 'Mahasiswa Umum',
        ]);
        DB::table('options')->insert([
            'list'=> '1',
            'text'=> 'Mahasiswa UGJ',
        ]);
        DB::table('options')->insert([
            'list'=> '1',
            'text'=> 'Dosen Umum',
        ]);
        DB::table('options')->insert([
            'list'=> '1',
            'text'=> 'Dosen UGJ',
        ]);
        DB::table('options')->insert([
            'list'=> '1',
            'text'=> 'Peneliti Umum',
        ]);
    }
}
