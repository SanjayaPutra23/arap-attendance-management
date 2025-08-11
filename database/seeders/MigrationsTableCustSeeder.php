<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2014_10_12_200000_add_two_factor_columns_to_users_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2021_03_31_141537_create_roles_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2021_03_31_141815_create_role_user_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2021_04_23_060330_create_options_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2022_05_09_041348_create_pesertas_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2022_05_09_042252_create_presensis_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2022_05_09_043714_create_kehadirans_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2022_07_12_015617_create_mesins_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2022_07_12_084731_create_pools_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2022_07_13_065309_create_absensis_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2022_07_22_173908_create_detail_absens_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2022_09_13_025747_create_notulensis_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2025_08_11_094345_create_absensis_table',
                'batch' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2025_08_11_094345_create_detail_absens_table',
                'batch' => 0,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2025_08_11_094345_create_failed_jobs_table',
                'batch' => 0,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2025_08_11_094345_create_kehadirans_table',
                'batch' => 0,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2025_08_11_094345_create_liburs_table',
                'batch' => 0,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2025_08_11_094345_create_mesins_table',
                'batch' => 0,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2025_08_11_094345_create_notulensis_table',
                'batch' => 0,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2025_08_11_094345_create_options_table',
                'batch' => 0,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2025_08_11_094345_create_password_resets_table',
                'batch' => 0,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2025_08_11_094345_create_pesertas_table',
                'batch' => 0,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2025_08_11_094345_create_pesertas_old_table',
                'batch' => 0,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2025_08_11_094345_create_pods_table',
                'batch' => 0,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2025_08_11_094345_create_pools_table',
                'batch' => 0,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2025_08_11_094345_create_presensis_table',
                'batch' => 0,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2025_08_11_094345_create_role_user_table',
                'batch' => 0,
            ),
            30 => 
            array (
                'id' => 31,
                'migration' => '2025_08_11_094345_create_roles_table',
                'batch' => 0,
            ),
            31 => 
            array (
                'id' => 32,
                'migration' => '2025_08_11_094345_create_settings_table',
                'batch' => 0,
            ),
            32 => 
            array (
                'id' => 33,
                'migration' => '2025_08_11_094345_create_users_table',
                'batch' => 0,
            ),
            33 => 
            array (
                'id' => 34,
                'migration' => '2025_08_11_094348_add_foreign_keys_to_role_user_table',
                'batch' => 0,
            ),
        ));
        
        
    }
}