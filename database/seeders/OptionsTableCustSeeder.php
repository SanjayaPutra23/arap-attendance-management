<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionsTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'list' => 1,
                'text' => 'Mahasiswa Umum',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'list' => 1,
                'text' => 'Mahasiswa UGJ',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'list' => 1,
                'text' => 'Dosen Umum',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'list' => 1,
                'text' => 'Dosen UGJ',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'list' => 1,
                'text' => 'Peneliti Umum',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'list' => 2,
                'text' => 'Absen Karyawan',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'list' => 2,
                'text' => 'Absen Persamaan Persepsi',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'list' => 2,
                'text' => 'Absen PBL',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'list' => 2,
                'text' => 'Absen Skills Lab',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'list' => 2,
                'text' => 'Absen Kuliah',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'list' => 2,
                'text' => 'Absen Lainnya',
                'ket' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}