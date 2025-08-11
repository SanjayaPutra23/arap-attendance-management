<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LibursTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('liburs')->delete();
        
        \DB::table('liburs')->insert(array (
            0 => 
            array (
                'id' => 20,
                'tanggal' => '2023-12-25',
                'ket' => 'Hari Raya Natal',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            1 => 
            array (
                'id' => 21,
                'tanggal' => '2023-09-28',
                'ket' => 'Maulid Nabi Muhammad SAW',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            2 => 
            array (
                'id' => 22,
                'tanggal' => '2023-08-17',
                'ket' => 'Hari Proklamasi Kemerdekaan RI',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            3 => 
            array (
                'id' => 23,
                'tanggal' => '2023-07-19',
                'ket' => 'Tahun Baru Islam 1445 Hijriyah',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            4 => 
            array (
                'id' => 24,
                'tanggal' => '2023-06-29',
                'ket' => 'Hari Raya Idul Adha 1444 Hijriyah',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            5 => 
            array (
                'id' => 25,
                'tanggal' => '2023-06-4',
                'ket' => 'Hari Raya Waisak 2567',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            6 => 
            array (
                'id' => 26,
                'tanggal' => '2023-06-1',
                'ket' => 'Hari Lahirnya Pancasila',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            7 => 
            array (
                'id' => 27,
                'tanggal' => '2023-05-18',
                'ket' => 'Kenaikan Isa Al Masih',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            8 => 
            array (
                'id' => 28,
                'tanggal' => '2023-05-1',
                'ket' => 'Hari Buruh Internasional',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            9 => 
            array (
                'id' => 29,
                'tanggal' => '2023-04-23',
                'ket' => 'Hari Raya Idul Fitri 1444 Hijriyah',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            10 => 
            array (
                'id' => 30,
                'tanggal' => '2023-04-22',
                'ket' => 'Hari Raya Idul Fitri 1444 Hijriyah',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            11 => 
            array (
                'id' => 31,
                'tanggal' => '2023-04-7',
                'ket' => 'Wafat Isa Al Masih',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            12 => 
            array (
                'id' => 32,
                'tanggal' => '2023-03-22',
                'ket' => 'Hari Raya Nyepi',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            13 => 
            array (
                'id' => 33,
                'tanggal' => '2023-02-18',
                'ket' => 'Isra Mikraj Nabi Muhammad SAW',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            14 => 
            array (
                'id' => 34,
                'tanggal' => '2023-01-22',
                'ket' => 'Tahun Baru Imlek 2574 Kongzili',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            15 => 
            array (
                'id' => 35,
                'tanggal' => '2023-01-1',
                'ket' => 'Tahun Baru Masehi',
                'created_at' => '2023-06-22 06:48:39',
                'updated_at' => '2023-06-22 06:48:39',
            ),
            16 => 
            array (
                'id' => 36,
                'tanggal' => '2023-06-28',
                'ket' => 'Cuti bersama Idul adha',
                'created_at' => '2023-07-17 08:09:46',
                'updated_at' => '2023-07-17 08:09:46',
            ),
            17 => 
            array (
                'id' => 37,
                'tanggal' => '2023-06-30',
                'ket' => 'Cuti bersama Idul adha',
                'created_at' => '2023-07-17 08:10:00',
                'updated_at' => '2023-09-01 01:22:43',
            ),
            18 => 
            array (
                'id' => 38,
                'tanggal' => '2023-06-02',
                'ket' => 'Cuti bersama',
                'created_at' => '2023-07-17 08:10:44',
                'updated_at' => '2023-07-17 08:10:44',
            ),
            19 => 
            array (
                'id' => 39,
                'tanggal' => '2023-12-26',
                'ket' => 'Cuti Bersama Natal',
                'created_at' => '2023-12-22 10:08:36',
                'updated_at' => '2023-12-22 10:08:36',
            ),
            20 => 
            array (
                'id' => 40,
                'tanggal' => '2024-12-25',
                'ket' => 'Hari Raya Natal',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            21 => 
            array (
                'id' => 41,
                'tanggal' => '2024-09-15',
                'ket' => 'Maulid Nabi Muhammad SAW',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            22 => 
            array (
                'id' => 42,
                'tanggal' => '2024-08-17',
                'ket' => 'Hari Proklamasi Kemerdekaan RI',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            23 => 
            array (
                'id' => 43,
                'tanggal' => '2024-07-7',
                'ket' => 'Tahun Baru Islam 1446 Hijriyah',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            24 => 
            array (
                'id' => 44,
                'tanggal' => '2024-06-17',
                'ket' => 'Hari Raya Idul Adha 1445 Hijriyah',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            25 => 
            array (
                'id' => 45,
                'tanggal' => '2024-06-1',
                'ket' => 'Hari Lahirnya Pancasila',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            26 => 
            array (
                'id' => 46,
                'tanggal' => '2024-05-23',
                'ket' => 'Hari Raya Waisak 2568',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            27 => 
            array (
                'id' => 47,
                'tanggal' => '2024-05-9',
                'ket' => 'Kenaikan Isa Al Masih',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            28 => 
            array (
                'id' => 48,
                'tanggal' => '2024-05-1',
                'ket' => 'Hari Buruh Internasional',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            29 => 
            array (
                'id' => 49,
                'tanggal' => '2024-04-09',
                'ket' => 'Libur Hari Raya Idul Fitri',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-03-14 05:48:47',
            ),
            30 => 
            array (
                'id' => 50,
                'tanggal' => '2024-04-10',
                'ket' => 'Hari Raya Idul Fitri 1445 Hijriyah',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            31 => 
            array (
                'id' => 51,
                'tanggal' => '2024-04-08',
                'ket' => 'Libur Hari Raya Idul Fitri',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-03-14 05:48:09',
            ),
            32 => 
            array (
                'id' => 52,
                'tanggal' => '2024-03-11',
                'ket' => 'Hari Raya Nyepi',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            33 => 
            array (
                'id' => 53,
                'tanggal' => '2024-02-10',
                'ket' => 'Tahun Baru Imlek 2575 Kongzili',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            34 => 
            array (
                'id' => 54,
                'tanggal' => '2024-02-8',
                'ket' => 'Isra Mikraj Nabi Muhammad SAW',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            35 => 
            array (
                'id' => 55,
                'tanggal' => '2024-01-1',
                'ket' => 'Tahun Baru Masehi',
                'created_at' => '2024-01-22 02:14:33',
                'updated_at' => '2024-01-22 02:14:33',
            ),
            36 => 
            array (
                'id' => 56,
                'tanggal' => '2024-02-09',
                'ket' => 'Cuti Bersama Imlek',
                'created_at' => '2024-02-07 03:23:09',
                'updated_at' => '2024-02-07 03:23:09',
            ),
            37 => 
            array (
                'id' => 57,
                'tanggal' => '2024-02-14',
                'ket' => 'Pemilu',
                'created_at' => '2024-02-20 13:58:41',
                'updated_at' => '2024-02-20 13:58:41',
            ),
            38 => 
            array (
                'id' => 58,
                'tanggal' => '2024-03-12',
                'ket' => 'Libur Awal Puasa',
                'created_at' => '2024-03-14 05:39:30',
                'updated_at' => '2024-03-14 05:42:52',
            ),
            39 => 
            array (
                'id' => 59,
                'tanggal' => '2024-03-29',
                'ket' => 'Wafat Isa Al Masih',
                'created_at' => '2024-03-14 05:40:25',
                'updated_at' => '2024-04-22 03:33:14',
            ),
            40 => 
            array (
                'id' => 60,
                'tanggal' => '2024-04-11',
                'ket' => 'Hari Raya Idul Fitri 1445 Hijriyah',
                'created_at' => '2024-03-14 05:44:11',
                'updated_at' => '2024-03-14 05:44:11',
            ),
            41 => 
            array (
                'id' => 61,
                'tanggal' => '2024-04-12',
                'ket' => 'Libur Hari Raya Idul Fitri',
                'created_at' => '2024-03-14 05:49:06',
                'updated_at' => '2024-03-14 05:49:06',
            ),
            42 => 
            array (
                'id' => 62,
                'tanggal' => '2024-04-15',
                'ket' => 'Libur Hari Raya Idul Fitri',
                'created_at' => '2024-03-14 05:49:19',
                'updated_at' => '2024-03-14 05:49:19',
            ),
            43 => 
            array (
                'id' => 64,
                'tanggal' => '2025-12-25',
                'ket' => 'Hari Raya Natal',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            44 => 
            array (
                'id' => 65,
                'tanggal' => '2025-09-5',
                'ket' => 'Maulid Nabi Muhammad SAW',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            45 => 
            array (
                'id' => 66,
                'tanggal' => '2025-08-17',
                'ket' => 'Hari Proklamasi Kemerdekaan RI',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            46 => 
            array (
                'id' => 67,
                'tanggal' => '2025-06-27',
                'ket' => 'Tahun Baru Islam 1447 Hijriyah',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            47 => 
            array (
                'id' => 68,
                'tanggal' => '2025-06-7',
                'ket' => 'Hari Raya Idul Adha 1446 Hijriyah',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            48 => 
            array (
                'id' => 69,
                'tanggal' => '2025-06-1',
                'ket' => 'Hari Lahirnya Pancasila',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            49 => 
            array (
                'id' => 70,
                'tanggal' => '2025-05-29',
                'ket' => 'Kenaikan Isa Al Masih',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            50 => 
            array (
                'id' => 71,
                'tanggal' => '2025-05-12',
                'ket' => 'Hari Raya Waisak 2569',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            51 => 
            array (
                'id' => 72,
                'tanggal' => '2025-05-1',
                'ket' => 'Hari Buruh Internasional',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            52 => 
            array (
                'id' => 73,
                'tanggal' => '2025-04-18',
                'ket' => 'Wafat Isa Al Masih',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            53 => 
            array (
                'id' => 74,
                'tanggal' => '2025-04-01',
                'ket' => 'Hari Raya Idul Fitri 1446 Hijriyah',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-03-16 21:16:34',
            ),
            54 => 
            array (
                'id' => 75,
                'tanggal' => '2025-03-31',
                'ket' => 'Hari Raya Idul Fitri 1446 Hijriyah',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            55 => 
            array (
                'id' => 76,
                'tanggal' => '2025-03-29',
                'ket' => 'Hari Raya Nyepi',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            56 => 
            array (
                'id' => 77,
                'tanggal' => '2025-01-29',
                'ket' => 'Tahun Baru Imlek 2576 Kongzili',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            57 => 
            array (
                'id' => 78,
                'tanggal' => '2025-01-27',
                'ket' => 'Isra Mikraj Nabi Muhammad SAW',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:07:46',
            ),
            58 => 
            array (
                'id' => 79,
                'tanggal' => '2025-01-01',
                'ket' => 'Tahun Baru Masehi',
                'created_at' => '2025-01-21 10:07:46',
                'updated_at' => '2025-01-21 10:12:10',
            ),
            59 => 
            array (
                'id' => 80,
                'tanggal' => '2024-12-26',
                'ket' => 'Cuti Bersama Natal',
                'created_at' => '2025-01-21 10:08:32',
                'updated_at' => '2025-01-21 10:08:32',
            ),
            60 => 
            array (
                'id' => 81,
                'tanggal' => '2025-01-28',
                'ket' => 'Cuti bersama Imlek',
                'created_at' => '2025-01-21 10:10:43',
                'updated_at' => '2025-01-21 10:10:43',
            ),
            61 => 
            array (
                'id' => 82,
                'tanggal' => '2025-02-28',
                'ket' => 'libur awal puasa',
                'created_at' => '2025-03-16 21:13:06',
                'updated_at' => '2025-03-16 21:13:06',
            ),
            62 => 
            array (
                'id' => 83,
                'tanggal' => '2025-03-28',
                'ket' => 'cuti bersama nyepi',
                'created_at' => '2025-03-16 21:13:54',
                'updated_at' => '2025-03-16 21:13:54',
            ),
            63 => 
            array (
                'id' => 84,
                'tanggal' => '2025-04-02',
                'ket' => 'libur lebaran',
                'created_at' => '2025-03-16 21:15:12',
                'updated_at' => '2025-03-16 21:15:12',
            ),
            64 => 
            array (
                'id' => 85,
                'tanggal' => '2025-04-03',
                'ket' => 'libur lebaran',
                'created_at' => '2025-03-16 21:16:04',
                'updated_at' => '2025-03-16 21:16:04',
            ),
            65 => 
            array (
                'id' => 86,
                'tanggal' => '2025-04-04',
                'ket' => 'libur lebaran',
                'created_at' => '2025-03-16 21:17:01',
                'updated_at' => '2025-03-16 21:17:01',
            ),
            66 => 
            array (
                'id' => 87,
                'tanggal' => '2025-04-07',
                'ket' => 'libur lebaran',
                'created_at' => '2025-03-16 21:17:31',
                'updated_at' => '2025-03-16 21:17:31',
            ),
            67 => 
            array (
                'id' => 88,
                'tanggal' => '2025-04-08',
                'ket' => 'libur lebaran',
                'created_at' => '2025-03-16 21:17:54',
                'updated_at' => '2025-03-16 21:17:54',
            ),
            68 => 
            array (
                'id' => 89,
                'tanggal' => '2025-06-09',
                'ket' => 'Cuti bersama idul adha',
                'created_at' => '2025-06-07 07:22:14',
                'updated_at' => '2025-06-07 07:22:14',
            ),
            69 => 
            array (
                'id' => 90,
                'tanggal' => '2025-06-06',
                'ket' => 'Cuti bersama idul adha',
                'created_at' => '2025-06-07 07:22:57',
                'updated_at' => '2025-06-07 07:22:57',
            ),
        ));
        
        
    }
}