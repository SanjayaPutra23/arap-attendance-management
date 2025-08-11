<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MesinsTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mesins')->delete();
        
        \DB::table('mesins')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'GedungA Lantai 3',
                'tipe' => 'ip',
                'ip' => '192.168.12.12',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => '2025-07-21 09:10:03',
                'created_at' => '2022-09-28 07:09:07',
                'updated_at' => '2025-07-21 04:32:01',
                'grup' => 6,
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Gedung A lantai 1',
                'tipe' => 'ip',
                'ip' => '192.168.12.11',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => '2025-07-21 10:09:14',
                'created_at' => '2022-09-28 08:49:16',
                'updated_at' => '2025-07-21 04:32:07',
                'grup' => 6,
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Gedung B Lantai 1',
                'tipe' => 'ip',
                'ip' => '192.168.12.14',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => '2025-07-21 10:53:28',
                'created_at' => '2022-09-28 08:49:28',
                'updated_at' => '2025-07-21 04:32:12',
                'grup' => 6,
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'gedung lama lt 1',
                'tipe' => 'usb',
                'ip' => '192.168.12.15',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => NULL,
                'created_at' => '2023-02-21 01:32:47',
                'updated_at' => '2025-06-07 06:50:38',
                'grup' => 6,
            ),
            4 => 
            array (
                'id' => 9,
                'name' => '1 Komkordik',
                'tipe' => 'usb',
                'ip' => '139.255.210.11',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => '2025-07-21 07:27:23',
                'created_at' => '2023-02-21 01:33:01',
                'updated_at' => '2025-07-21 04:31:58',
                'grup' => 6,
            ),
            5 => 
            array (
                'id' => 12,
                'name' => 'PBL lt 2',
                'tipe' => 'ip',
                'ip' => '192.168.241.245',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => '2025-08-08 23:57:38',
                'created_at' => '2025-08-07 08:39:58',
                'updated_at' => '2025-08-11 03:05:16',
                'grup' => 7,
            ),
            6 => 
            array (
                'id' => 13,
                'name' => 'PBL lt 3',
                'tipe' => 'ip',
                'ip' => '192.168.241.246',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => '2025-08-08 23:24:27',
                'created_at' => '2025-08-07 08:40:18',
                'updated_at' => '2025-08-11 03:16:17',
                'grup' => 7,
            ),
            7 => 
            array (
                'id' => 14,
                'name' => 'PBL lt 4',
                'tipe' => 'ip',
                'ip' => '192.168.241.247',
                'port' => '4370',
                'maker_id' => 1,
                'last_sync' => '2025-08-08 10:56:46',
                'created_at' => '2025-08-07 08:40:40',
                'updated_at' => '2025-08-11 03:16:19',
                'grup' => 7,
            ),
        ));
        
        
    }
}