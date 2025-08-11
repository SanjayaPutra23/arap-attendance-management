<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'jam_datang_karyawan',
                'value' => '09:00:00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'jam_pulang_karyawan',
                'value' => '17:00:00',
                'created_at' => NULL,
                'updated_at' => '2025-04-15 09:38:16',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'jam_pulang_cs',
                'value' => '17:00:00',
                'created_at' => '2023-11-02 06:52:52',
                'updated_at' => '2024-03-14 05:37:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'jam_datang_cs',
                'value' => '07:00:00',
                'created_at' => '2023-11-02 06:53:08',
                'updated_at' => '2023-11-02 06:53:08',
            ),
        ));
        
        
    }
}