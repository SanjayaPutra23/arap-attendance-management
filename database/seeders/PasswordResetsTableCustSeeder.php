<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PasswordResetsTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'email' => 'kepk@fk.ugj',
                'token' => '$2y$10$ARxN3We3z8ARGk6DXNMkIuuV/fg4GxP5UQw7J11Op.lz87QDxd.VS',
                'created_at' => '2022-11-25 06:22:12',
            ),
            1 => 
            array (
                'email' => 'ikm@fk.ugj',
                'token' => '$2y$10$FIQTGE8RW/fHx8PZHDxpbuTuyxOAW74KC7ksqZaEchLJerDrj/hTy',
                'created_at' => '2023-11-24 04:15:25',
            ),
            2 => 
            array (
                'email' => 'umum@fk.ugj',
                'token' => '$2y$10$vIRGNEk2COVBnuhktvxCYOXO1OEDImArU0Y6Oy13TgMylmNiZAx/q',
                'created_at' => '2024-07-08 21:20:01',
            ),
            3 => 
            array (
                'email' => 'ronald@fk.ugj',
                'token' => '$2y$10$KLzqI1EK6J4aYfa1OsFhrOun7k9u8c3ja74I2LZDW4SHb0PqlSR6O',
                'created_at' => '2025-06-16 07:59:10',
            ),
        ));
        
        
    }
}