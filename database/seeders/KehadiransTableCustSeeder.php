<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KehadiransTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kehadirans')->delete();
        
        \DB::table('kehadirans')->insert(array (
            0 => 
            array (
                'id' => 5,
                'presensi_id' => 3,
                'peserta_id' => 38,
                'sign' => '633556a5a96a6.png',
                'slug' => '1EPQQLKBTkxNpmiRg12a',
                'created_at' => '2022-09-29 08:23:20',
                'updated_at' => '2022-09-29 08:26:13',
            ),
            1 => 
            array (
                'id' => 6,
                'presensi_id' => 3,
                'peserta_id' => 9,
                'sign' => '6335568b2a6fa.png',
                'slug' => 'IJ2cLDt8sjbnPZHVgzdi',
                'created_at' => '2022-09-29 08:23:57',
                'updated_at' => '2022-09-29 08:25:47',
            ),
            2 => 
            array (
                'id' => 8,
                'presensi_id' => 3,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'pKlTbGVfP2K0VE4hH820',
                'created_at' => '2022-09-29 08:24:28',
                'updated_at' => '2022-09-29 08:24:28',
            ),
            3 => 
            array (
                'id' => 9,
                'presensi_id' => 4,
                'peserta_id' => 32,
                'sign' => '633557832968e.png',
                'slug' => 'Nneg5BxA8Y6Vn4JEw2bi',
                'created_at' => '2022-09-29 08:27:55',
                'updated_at' => '2022-09-29 08:29:55',
            ),
            4 => 
            array (
                'id' => 10,
                'presensi_id' => 4,
                'peserta_id' => 33,
                'sign' => NULL,
                'slug' => 'GNUjn8OmVMfq6Nhvo9Nw',
                'created_at' => '2022-09-29 08:34:02',
                'updated_at' => '2022-09-29 08:34:02',
            ),
            5 => 
            array (
                'id' => 11,
                'presensi_id' => 5,
                'peserta_id' => 5,
                'sign' => '63366362b138c.png',
                'slug' => 'f3d0XecD60mILCT13qLd',
                'created_at' => '2022-09-30 03:08:31',
                'updated_at' => '2022-09-30 03:32:50',
            ),
            6 => 
            array (
                'id' => 12,
                'presensi_id' => 5,
                'peserta_id' => 7,
                'sign' => '633666117c55b.png',
                'slug' => '7JI5NB8NLSNQEU23X1Cv',
                'created_at' => '2022-09-30 03:14:18',
                'updated_at' => '2022-09-30 03:44:17',
            ),
            7 => 
            array (
                'id' => 13,
                'presensi_id' => 5,
                'peserta_id' => 6,
                'sign' => '63367aaf7fef7.png',
                'slug' => 'wCHBTHKoovCtwFdzJFIP',
                'created_at' => '2022-09-30 03:14:23',
                'updated_at' => '2022-09-30 05:12:15',
            ),
            8 => 
            array (
                'id' => 14,
                'presensi_id' => 5,
                'peserta_id' => 9,
                'sign' => '633661c8aaf21.png',
                'slug' => '68dggNaHaklo47DQf0iq',
                'created_at' => '2022-09-30 03:14:28',
                'updated_at' => '2022-09-30 03:26:00',
            ),
            9 => 
            array (
                'id' => 15,
                'presensi_id' => 5,
                'peserta_id' => 10,
                'sign' => '63366666869df.png',
                'slug' => 'rvgET5vO5oY6iMAzj2YK',
                'created_at' => '2022-09-30 03:14:35',
                'updated_at' => '2022-09-30 03:45:42',
            ),
            10 => 
            array (
                'id' => 16,
                'presensi_id' => 5,
                'peserta_id' => 11,
                'sign' => '63366e6117421.png',
                'slug' => 'uQxCqiwTDsVahFio4wRU',
                'created_at' => '2022-09-30 03:14:41',
                'updated_at' => '2022-09-30 04:19:45',
            ),
            11 => 
            array (
                'id' => 17,
                'presensi_id' => 5,
                'peserta_id' => 12,
                'sign' => '6336646f21489.png',
                'slug' => 'S9hu5uvjA0TmFZRNf84g',
                'created_at' => '2022-09-30 03:14:46',
                'updated_at' => '2022-09-30 03:37:19',
            ),
            12 => 
            array (
                'id' => 18,
                'presensi_id' => 5,
                'peserta_id' => 107,
                'sign' => '6336627192626.png',
                'slug' => 'FgC877vj1ETOJtnWk6r0',
                'created_at' => '2022-09-30 03:14:52',
                'updated_at' => '2022-09-30 03:28:49',
            ),
            13 => 
            array (
                'id' => 19,
                'presensi_id' => 5,
                'peserta_id' => 108,
                'sign' => '633662eb72efc.png',
                'slug' => 'y4VfZun9O1qMzKbFVXW9',
                'created_at' => '2022-09-30 03:15:00',
                'updated_at' => '2022-09-30 03:30:51',
            ),
            14 => 
            array (
                'id' => 20,
                'presensi_id' => 5,
                'peserta_id' => 109,
                'sign' => '63366839660df.png',
                'slug' => 'TDjwZOa25im5a7ud06jV',
                'created_at' => '2022-09-30 03:15:05',
                'updated_at' => '2022-09-30 03:53:29',
            ),
            15 => 
            array (
                'id' => 21,
                'presensi_id' => 5,
                'peserta_id' => 102,
                'sign' => '6336627c1e18a.png',
                'slug' => 'FuKJpEfu6U4LYvWrlUA9',
                'created_at' => '2022-09-30 03:15:12',
                'updated_at' => '2022-09-30 03:29:00',
            ),
            16 => 
            array (
                'id' => 22,
                'presensi_id' => 5,
                'peserta_id' => 100,
                'sign' => '63366299db3f2.png',
                'slug' => 'EbRrJCKep1M7Bq3OoiBI',
                'created_at' => '2022-09-30 03:15:19',
                'updated_at' => '2022-09-30 03:29:29',
            ),
            17 => 
            array (
                'id' => 23,
                'presensi_id' => 5,
                'peserta_id' => 21,
                'sign' => '63367a8f82aa3.png',
                'slug' => 'nAcRxW6ymbwQj2K9NqnJ',
                'created_at' => '2022-09-30 03:15:31',
                'updated_at' => '2022-09-30 05:11:43',
            ),
            18 => 
            array (
                'id' => 24,
                'presensi_id' => 5,
                'peserta_id' => 98,
                'sign' => '63367ad555227.png',
                'slug' => '49DQ8hDADZb53FtppJpr',
                'created_at' => '2022-09-30 03:15:36',
                'updated_at' => '2022-09-30 05:12:53',
            ),
            19 => 
            array (
                'id' => 25,
                'presensi_id' => 5,
                'peserta_id' => 113,
                'sign' => '63367b0d4e73b.png',
                'slug' => 'Y3mhEwIPUdv1ORDRg9OD',
                'created_at' => '2022-09-30 03:15:43',
                'updated_at' => '2022-09-30 05:13:49',
            ),
            20 => 
            array (
                'id' => 26,
                'presensi_id' => 6,
                'peserta_id' => 5,
                'sign' => '633a831447faa.png',
                'slug' => 'u3xmRnBaBepOJQNY2fdm',
                'created_at' => '2022-10-03 06:29:50',
                'updated_at' => '2022-10-03 06:37:08',
            ),
            21 => 
            array (
                'id' => 27,
                'presensi_id' => 6,
                'peserta_id' => 7,
                'sign' => '633b7fde10cff.png',
                'slug' => 'xAcvNdZQxXgdA2lANcjh',
                'created_at' => '2022-10-03 06:30:06',
                'updated_at' => '2022-10-04 00:35:42',
            ),
            22 => 
            array (
                'id' => 28,
                'presensi_id' => 6,
                'peserta_id' => 6,
                'sign' => '633b802c29e0a.png',
                'slug' => 'TwWT1Y3IVqmDgWdOcvlP',
                'created_at' => '2022-10-03 06:30:12',
                'updated_at' => '2022-10-04 00:37:00',
            ),
            23 => 
            array (
                'id' => 29,
                'presensi_id' => 6,
                'peserta_id' => 9,
                'sign' => '633a83c5b9ca3.png',
                'slug' => 's66m5ef9f5erdDl06YqH',
                'created_at' => '2022-10-03 06:30:18',
                'updated_at' => '2022-10-03 06:40:05',
            ),
            24 => 
            array (
                'id' => 30,
                'presensi_id' => 6,
                'peserta_id' => 10,
                'sign' => '633b8059d43a8.png',
                'slug' => 'Zf857u2xNahDnnD36MIk',
                'created_at' => '2022-10-03 06:30:24',
                'updated_at' => '2022-10-04 00:37:45',
            ),
            25 => 
            array (
                'id' => 31,
                'presensi_id' => 6,
                'peserta_id' => 11,
                'sign' => '633a86fa6df72.png',
                'slug' => 'xI9t84oZfa7smjpbb19d',
                'created_at' => '2022-10-03 06:30:30',
                'updated_at' => '2022-10-03 06:53:46',
            ),
            26 => 
            array (
                'id' => 32,
                'presensi_id' => 6,
                'peserta_id' => 12,
                'sign' => '633a9eef1581e.png',
                'slug' => 'IZwUqUYNzOLGbUy4Hs0f',
                'created_at' => '2022-10-03 06:30:40',
                'updated_at' => '2022-10-03 08:35:59',
            ),
            27 => 
            array (
                'id' => 33,
                'presensi_id' => 6,
                'peserta_id' => 107,
                'sign' => '633a87baee36a.png',
                'slug' => 'RVLyQuQWJffO3raTYKS2',
                'created_at' => '2022-10-03 06:30:53',
                'updated_at' => '2022-10-03 06:56:58',
            ),
            28 => 
            array (
                'id' => 34,
                'presensi_id' => 6,
                'peserta_id' => 108,
                'sign' => '633a8246b7431.png',
                'slug' => 'IjhhovDE5d4X1hYJPWJM',
                'created_at' => '2022-10-03 06:30:59',
                'updated_at' => '2022-10-03 06:33:42',
            ),
            29 => 
            array (
                'id' => 35,
                'presensi_id' => 6,
                'peserta_id' => 109,
                'sign' => '633a851d1af72.png',
                'slug' => 'dYaJ2COv2EFQFjgdApzN',
                'created_at' => '2022-10-03 06:31:03',
                'updated_at' => '2022-10-03 06:45:49',
            ),
            30 => 
            array (
                'id' => 36,
                'presensi_id' => 6,
                'peserta_id' => 102,
                'sign' => '633a947ff2c2e.png',
                'slug' => '2zQHND4zYPmMJJ0WkQz7',
                'created_at' => '2022-10-03 06:31:08',
                'updated_at' => '2022-10-03 07:51:27',
            ),
            31 => 
            array (
                'id' => 37,
                'presensi_id' => 6,
                'peserta_id' => 100,
                'sign' => '633a827fcc892.png',
                'slug' => '4xltUtaHFes01zz7GtMs',
                'created_at' => '2022-10-03 06:31:15',
                'updated_at' => '2022-10-03 06:34:39',
            ),
            32 => 
            array (
                'id' => 38,
                'presensi_id' => 6,
                'peserta_id' => 106,
                'sign' => '633b8099bcf8e.png',
                'slug' => 'iAS3RbTbxt0HEitdklTf',
                'created_at' => '2022-10-03 06:31:23',
                'updated_at' => '2022-10-04 00:38:49',
            ),
            33 => 
            array (
                'id' => 39,
                'presensi_id' => 6,
                'peserta_id' => 97,
                'sign' => '633b80b432e35.png',
                'slug' => 'YDHaNAsx8o8NGm0DpJ7t',
                'created_at' => '2022-10-03 06:31:28',
                'updated_at' => '2022-10-04 00:39:16',
            ),
            34 => 
            array (
                'id' => 40,
                'presensi_id' => 6,
                'peserta_id' => 21,
                'sign' => '633b82d4294d7.png',
                'slug' => '2on3oa9IP8YWBWaMTqXD',
                'created_at' => '2022-10-04 00:47:51',
                'updated_at' => '2022-10-04 00:48:20',
            ),
            35 => 
            array (
                'id' => 41,
                'presensi_id' => 7,
                'peserta_id' => 5,
                'sign' => '6357846347abc.png',
                'slug' => 'SHqNxWCsEpvawPU0fwTa',
                'created_at' => '2022-10-25 06:37:09',
                'updated_at' => '2022-10-25 06:38:27',
            ),
            36 => 
            array (
                'id' => 42,
                'presensi_id' => 7,
                'peserta_id' => 7,
                'sign' => '63578779456d7.png',
                'slug' => '9k55TFeB6M7BpWgJJqKe',
                'created_at' => '2022-10-25 06:38:10',
                'updated_at' => '2022-10-25 06:51:37',
            ),
            37 => 
            array (
                'id' => 43,
                'presensi_id' => 7,
                'peserta_id' => 6,
                'sign' => '635885e40755e.png',
                'slug' => 'zVM7nBP4UD4znvNLBEsZ',
                'created_at' => '2022-10-25 06:38:14',
                'updated_at' => '2022-10-26 00:57:08',
            ),
            38 => 
            array (
                'id' => 44,
                'presensi_id' => 7,
                'peserta_id' => 9,
                'sign' => '635785348205c.png',
                'slug' => 'pbFEwo9L9EqHcoraBF1r',
                'created_at' => '2022-10-25 06:38:20',
                'updated_at' => '2022-10-25 06:41:56',
            ),
            39 => 
            array (
                'id' => 45,
                'presensi_id' => 7,
                'peserta_id' => 10,
                'sign' => '635886011ebde.png',
                'slug' => 'pwotxCcPzw595X8OW7hy',
                'created_at' => '2022-10-25 06:38:26',
                'updated_at' => '2022-10-26 00:57:37',
            ),
            40 => 
            array (
                'id' => 46,
                'presensi_id' => 7,
                'peserta_id' => 11,
                'sign' => '63588620f0560.png',
                'slug' => 'PRAVDjB5jytotIsHPNTn',
                'created_at' => '2022-10-25 06:38:33',
                'updated_at' => '2022-10-26 00:58:08',
            ),
            41 => 
            array (
                'id' => 47,
                'presensi_id' => 7,
                'peserta_id' => 12,
                'sign' => '63578671690e4.png',
                'slug' => '8Uv3sTq62iYEQ0tBIMHR',
                'created_at' => '2022-10-25 06:38:38',
                'updated_at' => '2022-10-25 06:47:13',
            ),
            42 => 
            array (
                'id' => 48,
                'presensi_id' => 7,
                'peserta_id' => 107,
                'sign' => '635785c4ab7ec.png',
                'slug' => 'gvLMCK5QVv5ZbStaVjkM',
                'created_at' => '2022-10-25 06:38:43',
                'updated_at' => '2022-10-25 06:44:20',
            ),
            43 => 
            array (
                'id' => 49,
                'presensi_id' => 7,
                'peserta_id' => 108,
                'sign' => '635785f741056.png',
                'slug' => 'eBkn1MJHp8gEZUkj6QCS',
                'created_at' => '2022-10-25 06:38:48',
                'updated_at' => '2022-10-25 06:45:11',
            ),
            44 => 
            array (
                'id' => 50,
                'presensi_id' => 7,
                'peserta_id' => 109,
                'sign' => '63578816aeabb.png',
                'slug' => 'iezTPuoGv7phDgkSW3Ra',
                'created_at' => '2022-10-25 06:38:57',
                'updated_at' => '2022-10-25 06:54:14',
            ),
            45 => 
            array (
                'id' => 51,
                'presensi_id' => 7,
                'peserta_id' => 21,
                'sign' => '6358866d91f2b.png',
                'slug' => 'sELNWqvAY43MbkYHdPQ5',
                'created_at' => '2022-10-25 06:39:02',
                'updated_at' => '2022-10-26 00:59:25',
            ),
            46 => 
            array (
                'id' => 52,
                'presensi_id' => 7,
                'peserta_id' => 98,
                'sign' => '635785948e1ab.png',
                'slug' => 'yw2PFGzJnbcazC1MX3UU',
                'created_at' => '2022-10-25 06:39:11',
                'updated_at' => '2022-10-25 06:43:32',
            ),
            47 => 
            array (
                'id' => 53,
                'presensi_id' => 7,
                'peserta_id' => 113,
                'sign' => '635787585b031.png',
                'slug' => 'gJoz1Q133Mzos4APcPfw',
                'created_at' => '2022-10-25 06:39:22',
                'updated_at' => '2022-10-25 06:51:04',
            ),
            48 => 
            array (
                'id' => 55,
                'presensi_id' => 9,
                'peserta_id' => 5,
                'sign' => '6358f790b88e7.png',
                'slug' => '01xyHXst8GdDTKYTV7oz',
                'created_at' => '2022-10-26 04:07:37',
                'updated_at' => '2022-10-26 09:02:08',
            ),
            49 => 
            array (
                'id' => 56,
                'presensi_id' => 9,
                'peserta_id' => 7,
                'sign' => '6358d4be6985c.png',
                'slug' => '1C1o1uC1vcCMQkgpF7h1',
                'created_at' => '2022-10-26 04:07:54',
                'updated_at' => '2022-10-26 06:33:34',
            ),
            50 => 
            array (
                'id' => 57,
                'presensi_id' => 9,
                'peserta_id' => 6,
                'sign' => '635b0ae413c6d.png',
                'slug' => '1WCtpZYc9SuRITDErBxr',
                'created_at' => '2022-10-26 04:08:03',
                'updated_at' => '2022-10-27 22:49:08',
            ),
            51 => 
            array (
                'id' => 58,
                'presensi_id' => 9,
                'peserta_id' => 9,
                'sign' => '6358e43d8c1e9.png',
                'slug' => 'fuYvpYXfQNP6rrrb2DYX',
                'created_at' => '2022-10-26 04:08:23',
                'updated_at' => '2022-10-26 07:39:41',
            ),
            52 => 
            array (
                'id' => 59,
                'presensi_id' => 9,
                'peserta_id' => 10,
                'sign' => '635b0af59ac48.png',
                'slug' => 'jrdfUgJxBsGUHCMy2Grl',
                'created_at' => '2022-10-26 04:08:31',
                'updated_at' => '2022-10-27 22:49:25',
            ),
            53 => 
            array (
                'id' => 60,
                'presensi_id' => 9,
                'peserta_id' => 11,
                'sign' => '6358d890b4dd9.png',
                'slug' => 'dh6FDGYVYiRukj83OeaY',
                'created_at' => '2022-10-26 04:08:36',
                'updated_at' => '2022-10-26 06:49:52',
            ),
            54 => 
            array (
                'id' => 61,
                'presensi_id' => 9,
                'peserta_id' => 12,
                'sign' => '6358d4b7613b7.png',
                'slug' => 'GLtkYi0TRHmBimDwWwXF',
                'created_at' => '2022-10-26 04:08:43',
                'updated_at' => '2022-10-26 06:33:27',
            ),
            55 => 
            array (
                'id' => 62,
                'presensi_id' => 9,
                'peserta_id' => 107,
                'sign' => '6358f6f33445c.png',
                'slug' => 'Gv4eBLmyIM3NJv7yX99T',
                'created_at' => '2022-10-26 04:08:54',
                'updated_at' => '2022-10-26 08:59:31',
            ),
            56 => 
            array (
                'id' => 63,
                'presensi_id' => 9,
                'peserta_id' => 108,
                'sign' => '6358e9b339afd.png',
                'slug' => 'Ikj8X4z7a8XX0g9h0pdh',
                'created_at' => '2022-10-26 04:08:59',
                'updated_at' => '2022-10-26 08:02:59',
            ),
            57 => 
            array (
                'id' => 64,
                'presensi_id' => 9,
                'peserta_id' => 109,
                'sign' => '6358f24c07720.png',
                'slug' => '7FHsfw1mVuNq62dABp67',
                'created_at' => '2022-10-26 04:09:04',
                'updated_at' => '2022-10-26 08:39:40',
            ),
            58 => 
            array (
                'id' => 65,
                'presensi_id' => 9,
                'peserta_id' => 21,
                'sign' => '635b0b030c453.png',
                'slug' => 'pF6KteeMjuktaSH4SiZ2',
                'created_at' => '2022-10-26 04:09:08',
                'updated_at' => '2022-10-27 22:49:39',
            ),
            59 => 
            array (
                'id' => 66,
                'presensi_id' => 9,
                'peserta_id' => 97,
                'sign' => '635b0b443590f.png',
                'slug' => 'XG3JnMNqDA5wNfCef4Rv',
                'created_at' => '2022-10-26 04:09:17',
                'updated_at' => '2022-10-27 22:50:44',
            ),
            60 => 
            array (
                'id' => 67,
                'presensi_id' => 9,
                'peserta_id' => 106,
                'sign' => '6358d5711cd4e.png',
                'slug' => 'yzHi70e9T6jbOEveK3is',
                'created_at' => '2022-10-26 04:09:22',
                'updated_at' => '2022-10-26 06:36:33',
            ),
            61 => 
            array (
                'id' => 68,
                'presensi_id' => 9,
                'peserta_id' => 111,
                'sign' => '6358d513db8fd.png',
                'slug' => 'SiICZ9G4eWZ5RS5lyT9O',
                'created_at' => '2022-10-26 04:09:28',
                'updated_at' => '2022-10-26 06:34:59',
            ),
            62 => 
            array (
                'id' => 69,
                'presensi_id' => 10,
                'peserta_id' => 5,
                'sign' => '636481fa8415d.png',
                'slug' => 'ZQwyEaKFrMV6YoMYXCe1',
                'created_at' => '2022-11-04 03:00:18',
                'updated_at' => '2022-11-04 03:07:38',
            ),
            63 => 
            array (
                'id' => 70,
                'presensi_id' => 10,
                'peserta_id' => 108,
                'sign' => '63648210e9395.png',
                'slug' => '3E3xv5WW0GnfO5C2gSJ7',
                'created_at' => '2022-11-04 03:00:38',
                'updated_at' => '2022-11-04 03:08:00',
            ),
            64 => 
            array (
                'id' => 71,
                'presensi_id' => 10,
                'peserta_id' => 109,
                'sign' => '63648dbfacb49.png',
                'slug' => '2MtGVpujRLP3DDKUIeOP',
                'created_at' => '2022-11-04 03:00:44',
                'updated_at' => '2022-11-04 03:57:51',
            ),
            65 => 
            array (
                'id' => 72,
                'presensi_id' => 10,
                'peserta_id' => 17,
                'sign' => '6364a80e56738.png',
                'slug' => 'A7oRmzfF7Dz220sOKm3e',
                'created_at' => '2022-11-04 03:00:55',
                'updated_at' => '2022-11-04 05:50:06',
            ),
            66 => 
            array (
                'id' => 73,
                'presensi_id' => 10,
                'peserta_id' => 10,
                'sign' => '636481de78de6.png',
                'slug' => 'yJZCSpfkMVK6DskdpJVR',
                'created_at' => '2022-11-04 03:01:07',
                'updated_at' => '2022-11-04 03:07:10',
            ),
            67 => 
            array (
                'id' => 74,
                'presensi_id' => 10,
                'peserta_id' => 12,
                'sign' => '636489a255ab5.png',
                'slug' => '3OOeVFfSJt6YNOsoApIa',
                'created_at' => '2022-11-04 03:01:43',
                'updated_at' => '2022-11-04 03:40:18',
            ),
            68 => 
            array (
                'id' => 75,
                'presensi_id' => 10,
                'peserta_id' => 107,
                'sign' => '6364838dbdc25.png',
                'slug' => 'BSINrLWzgKCZ9ziZbMTW',
                'created_at' => '2022-11-04 03:13:18',
                'updated_at' => '2022-11-04 03:14:21',
            ),
            69 => 
            array (
                'id' => 76,
                'presensi_id' => 10,
                'peserta_id' => 9,
                'sign' => '636483a630131.png',
                'slug' => 'Fa24mlOZnlxexKtADvGE',
                'created_at' => '2022-11-04 03:13:26',
                'updated_at' => '2022-11-04 03:14:46',
            ),
            70 => 
            array (
                'id' => 77,
                'presensi_id' => 10,
                'peserta_id' => 6,
                'sign' => '637af70ce096f.png',
                'slug' => 'sSfCNqUHCn0pUF3RUDJR',
                'created_at' => '2022-11-21 03:48:57',
                'updated_at' => '2022-11-21 03:57:00',
            ),
            71 => 
            array (
                'id' => 78,
                'presensi_id' => 10,
                'peserta_id' => 7,
                'sign' => '637af6ae57326.png',
                'slug' => 'NvHH142adh2n4C4v5Y8m',
                'created_at' => '2022-11-21 03:49:09',
                'updated_at' => '2022-11-21 03:55:26',
            ),
            72 => 
            array (
                'id' => 79,
                'presensi_id' => 10,
                'peserta_id' => 21,
                'sign' => '637af68831291.png',
                'slug' => 'Wb5g0PbWyaM5FfDwJsr0',
                'created_at' => '2022-11-21 03:49:36',
                'updated_at' => '2022-11-21 03:54:48',
            ),
            73 => 
            array (
                'id' => 80,
                'presensi_id' => 10,
                'peserta_id' => 11,
                'sign' => '637af6d655a6e.png',
                'slug' => 'KnO7yZWnO0B4NFohXGMw',
                'created_at' => '2022-11-21 03:49:46',
                'updated_at' => '2022-11-21 03:56:06',
            ),
            74 => 
            array (
                'id' => 81,
                'presensi_id' => 10,
                'peserta_id' => 105,
                'sign' => '637af708ecced.png',
                'slug' => 'kSKosAauAwasGUjKOLGl',
                'created_at' => '2022-11-21 03:50:07',
                'updated_at' => '2022-11-21 03:56:56',
            ),
            75 => 
            array (
                'id' => 82,
                'presensi_id' => 11,
                'peserta_id' => 19,
                'sign' => '638062e7a5b4e.png',
                'slug' => '3zazXSAktbknEbS726Ax',
                'created_at' => '2022-11-25 06:24:41',
                'updated_at' => '2022-11-25 06:38:31',
            ),
            76 => 
            array (
                'id' => 84,
                'presensi_id' => 11,
                'peserta_id' => 13,
                'sign' => '638060c1c02c4.png',
                'slug' => 'BlMcKcbzaHDggwyiPPpU',
                'created_at' => '2022-11-25 06:25:13',
                'updated_at' => '2022-11-25 06:29:21',
            ),
            77 => 
            array (
                'id' => 85,
                'presensi_id' => 11,
                'peserta_id' => 62,
                'sign' => NULL,
                'slug' => 'rWhubNCwRMEvaY9RgZvb',
                'created_at' => '2022-11-25 06:25:21',
                'updated_at' => '2022-11-25 06:25:21',
            ),
            78 => 
            array (
                'id' => 86,
                'presensi_id' => 11,
                'peserta_id' => 77,
                'sign' => '63806df5ea5cf.png',
                'slug' => 'pevANB5a28pddaLEYLuJ',
                'created_at' => '2022-11-25 06:25:30',
                'updated_at' => '2022-11-25 07:25:41',
            ),
            79 => 
            array (
                'id' => 87,
                'presensi_id' => 11,
                'peserta_id' => 20,
                'sign' => '638061141e7ac.png',
                'slug' => '8eiFPzvz0ivVzHmsdeJ6',
                'created_at' => '2022-11-25 06:25:42',
                'updated_at' => '2022-11-25 06:30:44',
            ),
            80 => 
            array (
                'id' => 88,
                'presensi_id' => 11,
                'peserta_id' => 82,
                'sign' => '638061fbc64ed.png',
                'slug' => 'sCeSMYrLVW7XtJOmro7X',
                'created_at' => '2022-11-25 06:25:50',
                'updated_at' => '2022-11-25 06:34:35',
            ),
            81 => 
            array (
                'id' => 89,
                'presensi_id' => 11,
                'peserta_id' => 16,
                'sign' => '63806210c16a4.png',
                'slug' => '0FuBM5d3T2cS6f1b1ZWJ',
                'created_at' => '2022-11-25 06:26:08',
                'updated_at' => '2022-11-25 06:34:56',
            ),
            82 => 
            array (
                'id' => 90,
                'presensi_id' => 11,
                'peserta_id' => 114,
                'sign' => '63806dc057784.png',
                'slug' => 'uuPRLSN5sVuXaij9uxY4',
                'created_at' => '2022-11-25 06:26:41',
                'updated_at' => '2022-11-25 07:24:48',
            ),
            83 => 
            array (
                'id' => 91,
                'presensi_id' => 11,
                'peserta_id' => 21,
                'sign' => '638061a722241.png',
                'slug' => 'bNyAGRWhQIzQmCOZ9X2q',
                'created_at' => '2022-11-25 06:30:02',
                'updated_at' => '2022-11-25 06:33:11',
            ),
            84 => 
            array (
                'id' => 92,
                'presensi_id' => 11,
                'peserta_id' => 33,
                'sign' => '63806de511f48.png',
                'slug' => 'uHP1CqXK5XMER4ndEl0c',
                'created_at' => '2022-11-25 06:31:55',
                'updated_at' => '2022-11-25 07:25:25',
            ),
            85 => 
            array (
                'id' => 93,
                'presensi_id' => 11,
                'peserta_id' => 26,
                'sign' => '63808e5038b3f.png',
                'slug' => 'hdqoSvGuGqjEFdFuIGD8',
                'created_at' => '2022-11-25 06:52:07',
                'updated_at' => '2022-11-25 09:43:44',
            ),
            86 => 
            array (
                'id' => 94,
                'presensi_id' => 11,
                'peserta_id' => 76,
                'sign' => '63806a61c94e8.png',
                'slug' => 'Fpo3C6P4SOBDe20OTUrh',
                'created_at' => '2022-11-25 07:08:56',
                'updated_at' => '2022-11-25 07:10:25',
            ),
            87 => 
            array (
                'id' => 95,
                'presensi_id' => 11,
                'peserta_id' => 32,
                'sign' => '638072f63c0a2.png',
                'slug' => 'nSwwakRXPENP9dECe3g2',
                'created_at' => '2022-11-25 07:09:03',
                'updated_at' => '2022-11-25 07:47:02',
            ),
            88 => 
            array (
                'id' => 97,
                'presensi_id' => 12,
                'peserta_id' => 5,
                'sign' => '63881f370553c.png',
                'slug' => 'CXzzBQ5Y7AgEuyxi8es1',
                'created_at' => '2022-12-01 03:24:32',
                'updated_at' => '2022-12-01 03:27:51',
            ),
            89 => 
            array (
                'id' => 98,
                'presensi_id' => 12,
                'peserta_id' => 7,
                'sign' => '638836dd16b68.png',
                'slug' => 'IvkUCNSWhXBkaM00mSVY',
                'created_at' => '2022-12-01 03:24:43',
                'updated_at' => '2022-12-01 05:08:45',
            ),
            90 => 
            array (
                'id' => 99,
                'presensi_id' => 12,
                'peserta_id' => 6,
                'sign' => '638836ec509d9.png',
                'slug' => '7Cui8GISa3I7BNy3KEqN',
                'created_at' => '2022-12-01 03:24:48',
                'updated_at' => '2022-12-01 05:09:00',
            ),
            91 => 
            array (
                'id' => 100,
                'presensi_id' => 12,
                'peserta_id' => 9,
                'sign' => '63882120069fe.png',
                'slug' => 'LvLuw5OD2II9C9I9IjU2',
                'created_at' => '2022-12-01 03:26:00',
                'updated_at' => '2022-12-01 03:36:00',
            ),
            92 => 
            array (
                'id' => 101,
                'presensi_id' => 12,
                'peserta_id' => 10,
                'sign' => '638836fde5b4d.png',
                'slug' => 'h9TU2SpiDOLMmdkM9qev',
                'created_at' => '2022-12-01 03:26:05',
                'updated_at' => '2022-12-01 05:09:17',
            ),
            93 => 
            array (
                'id' => 102,
                'presensi_id' => 12,
                'peserta_id' => 11,
                'sign' => '6388370e709ff.png',
                'slug' => 'ULXN5bHSYupQNWDG42hZ',
                'created_at' => '2022-12-01 03:26:11',
                'updated_at' => '2022-12-01 05:09:34',
            ),
            94 => 
            array (
                'id' => 103,
                'presensi_id' => 12,
                'peserta_id' => 12,
                'sign' => '638820fe015e3.png',
                'slug' => 'nETUzrSMNLmNKEFQlkNx',
                'created_at' => '2022-12-01 03:26:16',
                'updated_at' => '2022-12-01 03:35:26',
            ),
            95 => 
            array (
                'id' => 104,
                'presensi_id' => 12,
                'peserta_id' => 107,
                'sign' => '6388209918bac.png',
                'slug' => 'zv8kfoYoY5fOcZqLBUJ5',
                'created_at' => '2022-12-01 03:26:22',
                'updated_at' => '2022-12-01 03:33:45',
            ),
            96 => 
            array (
                'id' => 105,
                'presensi_id' => 12,
                'peserta_id' => 108,
                'sign' => '63881fd1b3718.png',
                'slug' => 'iKQizhcJGnZTUCKYnxar',
                'created_at' => '2022-12-01 03:26:32',
                'updated_at' => '2022-12-01 03:30:25',
            ),
            97 => 
            array (
                'id' => 106,
                'presensi_id' => 12,
                'peserta_id' => 109,
                'sign' => '6388202f2b4bd.png',
                'slug' => 'ZNuXrypG9HCHCNgoJS6c',
                'created_at' => '2022-12-01 03:26:37',
                'updated_at' => '2022-12-01 03:31:59',
            ),
            98 => 
            array (
                'id' => 107,
                'presensi_id' => 12,
                'peserta_id' => 21,
                'sign' => '6388322dec80b.png',
                'slug' => 'ZYsB0EyjKQWEgMQLcILW',
                'created_at' => '2022-12-01 03:26:42',
                'updated_at' => '2022-12-01 04:48:45',
            ),
            99 => 
            array (
                'id' => 108,
                'presensi_id' => 12,
                'peserta_id' => 98,
                'sign' => '63882fd3ce429.png',
                'slug' => 'zn0WtVHDj8zMzkxEatKq',
                'created_at' => '2022-12-01 03:26:47',
                'updated_at' => '2022-12-01 04:38:43',
            ),
            100 => 
            array (
                'id' => 109,
                'presensi_id' => 12,
                'peserta_id' => 113,
                'sign' => '63882e430941a.png',
                'slug' => 'BuGhYeKOCqUTLeM16lMK',
                'created_at' => '2022-12-01 03:26:52',
                'updated_at' => '2022-12-01 04:32:03',
            ),
            101 => 
            array (
                'id' => 110,
                'presensi_id' => 13,
                'peserta_id' => 5,
                'sign' => '638feeeac630d.png',
                'slug' => 'cpAsgk5sfv83SEcrOjSd',
                'created_at' => '2022-12-07 01:26:57',
                'updated_at' => '2022-12-07 01:39:54',
            ),
            102 => 
            array (
                'id' => 111,
                'presensi_id' => 13,
                'peserta_id' => 6,
                'sign' => '6392a79e9ac7f.png',
                'slug' => 'hr1bEN7qUdgLJSvc4wWP',
                'created_at' => '2022-12-07 01:27:06',
                'updated_at' => '2022-12-09 03:12:30',
            ),
            103 => 
            array (
                'id' => 112,
                'presensi_id' => 13,
                'peserta_id' => 9,
                'sign' => '638ff9d6a5424.png',
                'slug' => 'nTBKhmFXthVJanhzaCBQ',
                'created_at' => '2022-12-07 01:27:11',
                'updated_at' => '2022-12-07 02:26:30',
            ),
            104 => 
            array (
                'id' => 113,
                'presensi_id' => 13,
                'peserta_id' => 10,
                'sign' => '638ff614b4afd.png',
                'slug' => 'i6dyop1Npr2MULeje2Y4',
                'created_at' => '2022-12-07 01:27:17',
                'updated_at' => '2022-12-07 02:10:28',
            ),
            105 => 
            array (
                'id' => 114,
                'presensi_id' => 13,
                'peserta_id' => 11,
                'sign' => '6390294b25718.png',
                'slug' => 'blZafO7xRVAQ87JKb9KB',
                'created_at' => '2022-12-07 01:27:23',
                'updated_at' => '2022-12-07 05:48:59',
            ),
            106 => 
            array (
                'id' => 115,
                'presensi_id' => 13,
                'peserta_id' => 12,
                'sign' => '638fee29ce28d.png',
                'slug' => 'wUzF445IrzuTYlHvLQR1',
                'created_at' => '2022-12-07 01:27:28',
                'updated_at' => '2022-12-07 01:36:41',
            ),
            107 => 
            array (
                'id' => 116,
                'presensi_id' => 13,
                'peserta_id' => 107,
                'sign' => '638ff639621ae.png',
                'slug' => 'Ik2ZHVbr1gSIdoQQYWtf',
                'created_at' => '2022-12-07 01:27:33',
                'updated_at' => '2022-12-07 02:11:05',
            ),
            108 => 
            array (
                'id' => 117,
                'presensi_id' => 13,
                'peserta_id' => 108,
                'sign' => '6390108dba90e.png',
                'slug' => 'aLsJCY1NlPc1c7GGyjZB',
                'created_at' => '2022-12-07 01:27:38',
                'updated_at' => '2022-12-07 04:03:25',
            ),
            109 => 
            array (
                'id' => 118,
                'presensi_id' => 13,
                'peserta_id' => 109,
                'sign' => '638ff0322a473.png',
                'slug' => 'FvoIqy6LFi4dUBjr7EUu',
                'created_at' => '2022-12-07 01:27:43',
                'updated_at' => '2022-12-07 01:45:22',
            ),
            110 => 
            array (
                'id' => 119,
                'presensi_id' => 13,
                'peserta_id' => 21,
                'sign' => '6392a7a5c6901.png',
                'slug' => 'iTzaUyXTYcbPfLnR3qTU',
                'created_at' => '2022-12-07 01:27:50',
                'updated_at' => '2022-12-09 03:12:37',
            ),
            111 => 
            array (
                'id' => 120,
                'presensi_id' => 13,
                'peserta_id' => 106,
                'sign' => '638fed31a4966.png',
                'slug' => 'Fp0iiYV8RHU2ghLHanNr',
                'created_at' => '2022-12-07 01:27:58',
                'updated_at' => '2022-12-07 01:32:33',
            ),
            112 => 
            array (
                'id' => 121,
                'presensi_id' => 13,
                'peserta_id' => 111,
                'sign' => '63914f137e4b8.png',
                'slug' => 'yLvDtTfAB1nDBNRqLZUN',
                'created_at' => '2022-12-07 01:28:03',
                'updated_at' => '2022-12-08 02:42:27',
            ),
            113 => 
            array (
                'id' => 122,
                'presensi_id' => 13,
                'peserta_id' => 17,
                'sign' => '639010d590988.png',
                'slug' => 'At4vVLtqKXQ55PxTtbG0',
                'created_at' => '2022-12-07 01:28:09',
                'updated_at' => '2022-12-07 04:04:37',
            ),
            114 => 
            array (
                'id' => 123,
                'presensi_id' => 13,
                'peserta_id' => 105,
                'sign' => '63900b639fec4.png',
                'slug' => 'RP5Y92xOrBDPSwJXokx3',
                'created_at' => '2022-12-07 01:28:45',
                'updated_at' => '2022-12-07 03:41:23',
            ),
            115 => 
            array (
                'id' => 124,
                'presensi_id' => 13,
                'peserta_id' => 18,
                'sign' => NULL,
                'slug' => 'Asz89GpQAIfS1AnBRNGQ',
                'created_at' => '2022-12-07 01:29:02',
                'updated_at' => '2022-12-07 01:29:02',
            ),
            116 => 
            array (
                'id' => 125,
                'presensi_id' => 13,
                'peserta_id' => 19,
                'sign' => '63900e8186777.png',
                'slug' => 'BlQcyo7hEF68pZMhp5CW',
                'created_at' => '2022-12-07 02:10:14',
                'updated_at' => '2022-12-07 03:54:41',
            ),
            117 => 
            array (
                'id' => 127,
                'presensi_id' => 14,
                'peserta_id' => 5,
                'sign' => '63a2710e54db3.png',
                'slug' => 'PfcDrCO2SpiIajHy0cCk',
                'created_at' => '2022-12-21 01:13:20',
                'updated_at' => '2022-12-21 02:35:58',
            ),
            118 => 
            array (
                'id' => 129,
                'presensi_id' => 14,
                'peserta_id' => 9,
                'sign' => '63a27095c3c73.png',
                'slug' => 'zVFJqKFH3k2BeFR858b8',
                'created_at' => '2022-12-21 01:13:40',
                'updated_at' => '2022-12-21 02:33:57',
            ),
            119 => 
            array (
                'id' => 132,
                'presensi_id' => 14,
                'peserta_id' => 12,
                'sign' => '63a2713ad7220.png',
                'slug' => 'u0hpGtt8de0Ki6l94d0I',
                'created_at' => '2022-12-21 01:14:00',
                'updated_at' => '2022-12-21 02:36:42',
            ),
            120 => 
            array (
                'id' => 133,
                'presensi_id' => 14,
                'peserta_id' => 107,
                'sign' => '63a27142af342.png',
                'slug' => '3xLphhSlDZABL0Zk4NPj',
                'created_at' => '2022-12-21 01:14:05',
                'updated_at' => '2022-12-21 02:36:50',
            ),
            121 => 
            array (
                'id' => 136,
                'presensi_id' => 14,
                'peserta_id' => 38,
                'sign' => '63a271192746f.png',
                'slug' => 'iVz3mG5BUeQhdCRbKqA8',
                'created_at' => '2022-12-21 01:14:36',
                'updated_at' => '2022-12-21 02:36:09',
            ),
            122 => 
            array (
                'id' => 137,
                'presensi_id' => 14,
                'peserta_id' => 40,
                'sign' => '63a27113d886b.png',
                'slug' => 'HehyNqiqF6KlsUg1zp2O',
                'created_at' => '2022-12-21 01:14:44',
                'updated_at' => '2022-12-21 02:36:03',
            ),
            123 => 
            array (
                'id' => 138,
                'presensi_id' => 14,
                'peserta_id' => 21,
                'sign' => '63a2726e7ad26.png',
                'slug' => 'qln8lrm9QdyCKEYFAqL3',
                'created_at' => '2022-12-21 01:16:33',
                'updated_at' => '2022-12-21 02:41:50',
            ),
            124 => 
            array (
                'id' => 139,
                'presensi_id' => 14,
                'peserta_id' => 22,
                'sign' => '63a27ea30bb35.png',
                'slug' => 'k0jYiODLfrF7PzqZL4QK',
                'created_at' => '2022-12-21 02:31:19',
                'updated_at' => '2022-12-21 03:33:55',
            ),
            125 => 
            array (
                'id' => 140,
                'presensi_id' => 15,
                'peserta_id' => 38,
                'sign' => NULL,
                'slug' => 'kfVzMGGel7bLKnPQoUf0',
                'created_at' => '2022-12-30 03:54:28',
                'updated_at' => '2022-12-30 03:54:28',
            ),
            126 => 
            array (
                'id' => 141,
                'presensi_id' => 16,
                'peserta_id' => 5,
                'sign' => '63be2aec74818.png',
                'slug' => 'w9R1SjJRiNZ5az90salG',
                'created_at' => '2023-01-11 02:49:24',
                'updated_at' => '2023-01-11 03:20:12',
            ),
            127 => 
            array (
                'id' => 143,
                'presensi_id' => 16,
                'peserta_id' => 9,
                'sign' => '63be2acb01270.png',
                'slug' => 'eQAlY0ojkYEDnJlo8CIS',
                'created_at' => '2023-01-11 02:49:43',
                'updated_at' => '2023-01-11 03:19:39',
            ),
            128 => 
            array (
                'id' => 144,
                'presensi_id' => 16,
                'peserta_id' => 10,
                'sign' => '63be2a7993b68.png',
                'slug' => 'Z6Tc42eL2HEOnQW5PIcW',
                'created_at' => '2023-01-11 02:49:54',
                'updated_at' => '2023-01-11 03:18:17',
            ),
            129 => 
            array (
                'id' => 145,
                'presensi_id' => 16,
                'peserta_id' => 11,
                'sign' => '63be34c0b13fb.png',
                'slug' => 'xVifOgJ3wgpQLHyQ61fH',
                'created_at' => '2023-01-11 02:49:58',
                'updated_at' => '2023-01-11 04:02:08',
            ),
            130 => 
            array (
                'id' => 146,
                'presensi_id' => 16,
                'peserta_id' => 12,
                'sign' => '63be2b7df41c3.png',
                'slug' => 'WNbcmL9pmopNbNyPvAy2',
                'created_at' => '2023-01-11 02:50:08',
                'updated_at' => '2023-01-11 03:22:38',
            ),
            131 => 
            array (
                'id' => 147,
                'presensi_id' => 16,
                'peserta_id' => 107,
                'sign' => '63be380cbe23b.png',
                'slug' => 'eU1PM3qgHyn9K9obmwE9',
                'created_at' => '2023-01-11 02:50:18',
                'updated_at' => '2023-01-11 04:16:12',
            ),
            132 => 
            array (
                'id' => 148,
                'presensi_id' => 16,
                'peserta_id' => 109,
                'sign' => '63be2bc796ef9.png',
                'slug' => 'DGlQ7vNdrludCds21iTB',
                'created_at' => '2023-01-11 02:50:23',
                'updated_at' => '2023-01-11 03:23:51',
            ),
            133 => 
            array (
                'id' => 149,
                'presensi_id' => 16,
                'peserta_id' => 21,
                'sign' => '63be2dca46fba.png',
                'slug' => 'mYZlEZl8qmPAeQ2O4ow1',
                'created_at' => '2023-01-11 02:50:29',
                'updated_at' => '2023-01-11 03:32:26',
            ),
            134 => 
            array (
                'id' => 150,
                'presensi_id' => 16,
                'peserta_id' => 38,
                'sign' => '63be351a5a4c1.png',
                'slug' => 'QUxzIOQHtIyTs3pn4oMB',
                'created_at' => '2023-01-11 02:50:34',
                'updated_at' => '2023-01-11 04:03:38',
            ),
            135 => 
            array (
                'id' => 151,
                'presensi_id' => 16,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'ygcHqr7O3OH8pYLuOC3u',
                'created_at' => '2023-01-11 02:50:39',
                'updated_at' => '2023-01-11 02:50:39',
            ),
            136 => 
            array (
                'id' => 152,
                'presensi_id' => 16,
                'peserta_id' => 26,
                'sign' => '63be2c09c3d6b.png',
                'slug' => 'gZ7xZdi48iS1XX7BU4oi',
                'created_at' => '2023-01-11 02:50:46',
                'updated_at' => '2023-01-11 03:24:57',
            ),
            137 => 
            array (
                'id' => 153,
                'presensi_id' => 16,
                'peserta_id' => 89,
                'sign' => NULL,
                'slug' => 'I61iZe786bNpvlQMEtj7',
                'created_at' => '2023-01-11 02:50:52',
                'updated_at' => '2023-01-11 02:50:52',
            ),
            138 => 
            array (
                'id' => 154,
                'presensi_id' => 16,
                'peserta_id' => 86,
                'sign' => '63be3265b8b02.png',
                'slug' => 'ERpg2jf3xDDHcO659Zny',
                'created_at' => '2023-01-11 02:51:02',
                'updated_at' => '2023-01-11 03:52:05',
            ),
            139 => 
            array (
                'id' => 155,
                'presensi_id' => 16,
                'peserta_id' => 111,
                'sign' => '63be3780b9119.png',
                'slug' => 'TLi2KA9rvUZzqiVwpme6',
                'created_at' => '2023-01-11 02:51:09',
                'updated_at' => '2023-01-11 04:13:52',
            ),
            140 => 
            array (
                'id' => 156,
                'presensi_id' => 16,
                'peserta_id' => 106,
                'sign' => '63be2e4eb3142.png',
                'slug' => '6DNjgQbdvtamSZh94FBA',
                'created_at' => '2023-01-11 02:51:14',
                'updated_at' => '2023-01-11 03:34:38',
            ),
            141 => 
            array (
                'id' => 157,
                'presensi_id' => 16,
                'peserta_id' => 102,
                'sign' => '63be3207a0975.png',
                'slug' => 'UTfmngwqZt7bW4SyZNqy',
                'created_at' => '2023-01-11 02:51:23',
                'updated_at' => '2023-01-11 03:50:31',
            ),
            142 => 
            array (
                'id' => 158,
                'presensi_id' => 16,
                'peserta_id' => 100,
                'sign' => '63be3158250e2.png',
                'slug' => 'rYtenHWOApSH6lDLbNyA',
                'created_at' => '2023-01-11 02:51:32',
                'updated_at' => '2023-01-11 03:47:36',
            ),
            143 => 
            array (
                'id' => 159,
                'presensi_id' => 16,
                'peserta_id' => 108,
                'sign' => '63be2f0e9f354.png',
                'slug' => '2mUcL773veD29j7r5gl9',
                'created_at' => '2023-01-11 03:23:17',
                'updated_at' => '2023-01-11 03:37:50',
            ),
            144 => 
            array (
                'id' => 161,
                'presensi_id' => 17,
                'peserta_id' => 6,
                'sign' => '63cf2fd8c42f1.png',
                'slug' => 'RAXpc5EiOsha8iKc3bhJ',
                'created_at' => '2023-01-18 02:23:09',
                'updated_at' => '2023-01-24 01:09:44',
            ),
            145 => 
            array (
                'id' => 162,
                'presensi_id' => 17,
                'peserta_id' => 9,
                'sign' => '63c766ab13fd4.png',
                'slug' => 'llatmqGNh8HsKdUaKWbi',
                'created_at' => '2023-01-18 02:23:15',
                'updated_at' => '2023-01-18 03:25:31',
            ),
            146 => 
            array (
                'id' => 163,
                'presensi_id' => 17,
                'peserta_id' => 10,
                'sign' => '63c769380bd74.png',
                'slug' => 'XDJXfuTPlw2YIDJLFgxL',
                'created_at' => '2023-01-18 02:23:36',
                'updated_at' => '2023-01-18 03:36:24',
            ),
            147 => 
            array (
                'id' => 164,
                'presensi_id' => 17,
                'peserta_id' => 11,
                'sign' => '63c78959addf8.png',
                'slug' => 'jWruP9kfFMUBWFKXgYGe',
                'created_at' => '2023-01-18 02:23:42',
                'updated_at' => '2023-01-18 05:53:29',
            ),
            148 => 
            array (
                'id' => 165,
                'presensi_id' => 17,
                'peserta_id' => 12,
                'sign' => '63c76a0502863.png',
                'slug' => 'dqazC4ZIangtDHIVUnKH',
                'created_at' => '2023-01-18 02:23:53',
                'updated_at' => '2023-01-18 03:39:49',
            ),
            149 => 
            array (
                'id' => 166,
                'presensi_id' => 17,
                'peserta_id' => 107,
                'sign' => '63c76ecc63a50.png',
                'slug' => '0UR7wFaW90dbu4cfuHXs',
                'created_at' => '2023-01-18 02:23:59',
                'updated_at' => '2023-01-18 04:00:12',
            ),
            150 => 
            array (
                'id' => 167,
                'presensi_id' => 17,
                'peserta_id' => 108,
                'sign' => '63c777522789f.png',
                'slug' => '9PpYwf84mzYK8sswxkoV',
                'created_at' => '2023-01-18 02:24:05',
                'updated_at' => '2023-01-18 04:36:34',
            ),
            151 => 
            array (
                'id' => 168,
                'presensi_id' => 17,
                'peserta_id' => 109,
                'sign' => '63c76f500fe03.png',
                'slug' => 'Z9yqf5LHuPbe1kee7v3b',
                'created_at' => '2023-01-18 02:24:10',
                'updated_at' => '2023-01-18 04:02:24',
            ),
            152 => 
            array (
                'id' => 169,
                'presensi_id' => 17,
                'peserta_id' => 21,
                'sign' => '63c76e6a4b961.png',
                'slug' => 'UTduZdEuSfyhMeqQMxjS',
                'created_at' => '2023-01-18 02:25:06',
                'updated_at' => '2023-01-18 03:58:34',
            ),
            153 => 
            array (
                'id' => 170,
                'presensi_id' => 17,
                'peserta_id' => 38,
                'sign' => '63cf2fac19a1a.png',
                'slug' => 'Z9Sa8fzz8Q34jYPriYAJ',
                'created_at' => '2023-01-18 02:25:15',
                'updated_at' => '2023-01-24 01:09:00',
            ),
            154 => 
            array (
                'id' => 171,
                'presensi_id' => 17,
                'peserta_id' => 22,
                'sign' => '63c76987d253e.png',
                'slug' => 'AH3o7etZEY1EAwjgScQb',
                'created_at' => '2023-01-18 02:25:22',
                'updated_at' => '2023-01-18 03:37:43',
            ),
            155 => 
            array (
                'id' => 172,
                'presensi_id' => 17,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'sigGCz5lLHZZR4Aqe7fT',
                'created_at' => '2023-01-18 02:25:31',
                'updated_at' => '2023-01-18 02:25:31',
            ),
            156 => 
            array (
                'id' => 173,
                'presensi_id' => 17,
                'peserta_id' => 27,
                'sign' => '63c768aa95142.png',
                'slug' => 'SuxpYhkskWb0gTHZfpF0',
                'created_at' => '2023-01-18 02:25:44',
                'updated_at' => '2023-01-18 03:34:02',
            ),
            157 => 
            array (
                'id' => 174,
                'presensi_id' => 17,
                'peserta_id' => 40,
                'sign' => '63c76881bfe0e.png',
                'slug' => 'WelA3BZE5AsitInaY6QN',
                'created_at' => '2023-01-18 02:25:51',
                'updated_at' => '2023-01-18 03:33:21',
            ),
            158 => 
            array (
                'id' => 175,
                'presensi_id' => 17,
                'peserta_id' => 113,
                'sign' => '63c7d37c187c3.png',
                'slug' => 'ebzjxm0IbXMYJEUmtfVC',
                'created_at' => '2023-01-18 02:26:18',
                'updated_at' => '2023-01-18 11:09:48',
            ),
            159 => 
            array (
                'id' => 176,
                'presensi_id' => 17,
                'peserta_id' => 98,
                'sign' => '63c7d39cdeabe.png',
                'slug' => 'slOkhFq7Y9X4d6tQhRln',
                'created_at' => '2023-01-18 02:26:24',
                'updated_at' => '2023-01-18 11:10:20',
            ),
            160 => 
            array (
                'id' => 177,
                'presensi_id' => 17,
                'peserta_id' => 105,
                'sign' => '63c771ad2cfe9.png',
                'slug' => 'X7QrIemTUoujlgZLtvHQ',
                'created_at' => '2023-01-18 02:26:38',
                'updated_at' => '2023-01-18 04:12:29',
            ),
            161 => 
            array (
                'id' => 178,
                'presensi_id' => 17,
                'peserta_id' => 17,
                'sign' => '63c76b94efca0.png',
                'slug' => '2MjOsRPdP5kn3ojjeepv',
                'created_at' => '2023-01-18 02:27:02',
                'updated_at' => '2023-01-18 03:46:28',
            ),
            162 => 
            array (
                'id' => 179,
                'presensi_id' => 18,
                'peserta_id' => 5,
                'sign' => '63e088c94c1a1.png',
                'slug' => 'AfCh7JR3ihV8p5bY1q1n',
                'created_at' => '2023-02-06 04:52:52',
                'updated_at' => '2023-02-06 04:57:45',
            ),
            163 => 
            array (
                'id' => 180,
                'presensi_id' => 18,
                'peserta_id' => 6,
                'sign' => '63e1d80803676.png',
                'slug' => 'yCuOdbMkb7Gj5PB7bmix',
                'created_at' => '2023-02-06 04:53:11',
                'updated_at' => '2023-02-07 04:48:08',
            ),
            164 => 
            array (
                'id' => 181,
                'presensi_id' => 18,
                'peserta_id' => 9,
                'sign' => '63e08981c106e.png',
                'slug' => 'ieMnJsM5k5F9qsvg2Ndr',
                'created_at' => '2023-02-06 04:53:17',
                'updated_at' => '2023-02-06 05:00:49',
            ),
            165 => 
            array (
                'id' => 182,
                'presensi_id' => 18,
                'peserta_id' => 10,
                'sign' => '63e088f90a919.png',
                'slug' => 'aNAechQyeyqo9JubGQw3',
                'created_at' => '2023-02-06 04:53:38',
                'updated_at' => '2023-02-06 04:58:33',
            ),
            166 => 
            array (
                'id' => 183,
                'presensi_id' => 18,
                'peserta_id' => 11,
                'sign' => '63e08c7aa16ef.png',
                'slug' => 'Ic29SfPqhjnPd0HC6kJI',
                'created_at' => '2023-02-06 04:53:44',
                'updated_at' => '2023-02-06 05:13:30',
            ),
            167 => 
            array (
                'id' => 184,
                'presensi_id' => 18,
                'peserta_id' => 12,
                'sign' => '63e0895abbf7c.png',
                'slug' => 'UZhLRPal7Vkgd6yHvR1y',
                'created_at' => '2023-02-06 04:53:49',
                'updated_at' => '2023-02-06 05:00:10',
            ),
            168 => 
            array (
                'id' => 185,
                'presensi_id' => 18,
                'peserta_id' => 107,
                'sign' => '63e0891a2fb2a.png',
                'slug' => 'afENzpnDxhZy2EYa3uzg',
                'created_at' => '2023-02-06 04:53:54',
                'updated_at' => '2023-02-06 04:59:06',
            ),
            169 => 
            array (
                'id' => 186,
                'presensi_id' => 18,
                'peserta_id' => 108,
                'sign' => '63e1d85fef1ca.png',
                'slug' => 'KmdYF54fjZ9KNehUf4Vb',
                'created_at' => '2023-02-06 04:53:59',
                'updated_at' => '2023-02-07 04:49:35',
            ),
            170 => 
            array (
                'id' => 187,
                'presensi_id' => 18,
                'peserta_id' => 109,
                'sign' => '63e08ca0736a8.png',
                'slug' => 'ENZuKsy3ptJx38qN7zFL',
                'created_at' => '2023-02-06 04:54:03',
                'updated_at' => '2023-02-06 05:14:08',
            ),
            171 => 
            array (
                'id' => 188,
                'presensi_id' => 18,
                'peserta_id' => 21,
                'sign' => '63e0898c7cd8c.png',
                'slug' => 'T3X9X1gNzAuowuJGIaNx',
                'created_at' => '2023-02-06 04:54:09',
                'updated_at' => '2023-02-06 05:01:00',
            ),
            172 => 
            array (
                'id' => 189,
                'presensi_id' => 18,
                'peserta_id' => 38,
                'sign' => '63e0a1dabfca7.png',
                'slug' => 'dGIxzXVcurpCl9fDwYQf',
                'created_at' => '2023-02-06 04:54:13',
                'updated_at' => '2023-02-06 06:44:42',
            ),
            173 => 
            array (
                'id' => 190,
                'presensi_id' => 18,
                'peserta_id' => 22,
                'sign' => '63e08abbc703e.png',
                'slug' => 'gwWQUzy2wn8D0DW1NPMF',
                'created_at' => '2023-02-06 04:54:18',
                'updated_at' => '2023-02-06 05:06:03',
            ),
            174 => 
            array (
                'id' => 191,
                'presensi_id' => 18,
                'peserta_id' => 25,
                'sign' => '63e0a63f092c1.png',
                'slug' => 'P4VeU8DSpTp04TB1E8qY',
                'created_at' => '2023-02-06 04:54:24',
                'updated_at' => '2023-02-06 07:03:27',
            ),
            175 => 
            array (
                'id' => 192,
                'presensi_id' => 18,
                'peserta_id' => 27,
                'sign' => '63e09adf1d1a0.png',
                'slug' => 'tMMeYWizQQUWnIRjKt3X',
                'created_at' => '2023-02-06 04:54:29',
                'updated_at' => '2023-02-06 06:14:55',
            ),
            176 => 
            array (
                'id' => 193,
                'presensi_id' => 18,
                'peserta_id' => 26,
                'sign' => '63e0a3afe78d1.png',
                'slug' => 'ocFNYjfX7mUsuUA2Gyqa',
                'created_at' => '2023-02-06 04:54:34',
                'updated_at' => '2023-02-06 06:52:31',
            ),
            177 => 
            array (
                'id' => 194,
                'presensi_id' => 18,
                'peserta_id' => 89,
                'sign' => '63e089efd0956.png',
                'slug' => 'AlB7TQCkq3cAY1w0Al1x',
                'created_at' => '2023-02-06 04:54:40',
                'updated_at' => '2023-02-06 05:02:39',
            ),
            178 => 
            array (
                'id' => 195,
                'presensi_id' => 18,
                'peserta_id' => 86,
                'sign' => '63e08aaa16157.png',
                'slug' => 'MnyTkiD2yW0NWbaMu0lg',
                'created_at' => '2023-02-06 04:54:47',
                'updated_at' => '2023-02-06 05:05:46',
            ),
            179 => 
            array (
                'id' => 196,
                'presensi_id' => 18,
                'peserta_id' => 40,
                'sign' => '63e08cab19f20.png',
                'slug' => 'uvYbSeApgppDFyJA1xQE',
                'created_at' => '2023-02-06 04:55:32',
                'updated_at' => '2023-02-06 05:14:19',
            ),
            180 => 
            array (
                'id' => 197,
                'presensi_id' => 18,
                'peserta_id' => 111,
                'sign' => '63e08a3f64d72.png',
                'slug' => 'tbQjxV613KfbedymMlgD',
                'created_at' => '2023-02-06 04:55:39',
                'updated_at' => '2023-02-06 05:03:59',
            ),
            181 => 
            array (
                'id' => 198,
                'presensi_id' => 18,
                'peserta_id' => 106,
                'sign' => '63e08ea993731.png',
                'slug' => '5EEs4uZHVDm2rAM7rDn0',
                'created_at' => '2023-02-06 04:55:44',
                'updated_at' => '2023-02-06 05:22:49',
            ),
            182 => 
            array (
                'id' => 199,
                'presensi_id' => 18,
                'peserta_id' => 113,
                'sign' => '63e091925d3ba.png',
                'slug' => 'nC8OInjUxmg4eZ0Pkwov',
                'created_at' => '2023-02-06 04:55:49',
                'updated_at' => '2023-02-06 05:35:14',
            ),
            183 => 
            array (
                'id' => 200,
                'presensi_id' => 18,
                'peserta_id' => 17,
                'sign' => '63e08a68aa67c.png',
                'slug' => 'H9ofnbpyv5iIpe8iDM5l',
                'created_at' => '2023-02-06 04:56:24',
                'updated_at' => '2023-02-06 05:04:40',
            ),
            184 => 
            array (
                'id' => 201,
                'presensi_id' => 18,
                'peserta_id' => 105,
                'sign' => '63e1d8a290257.png',
                'slug' => 'EX61vhGLeVtqID03aRUH',
                'created_at' => '2023-02-06 04:56:39',
                'updated_at' => '2023-02-07 04:50:42',
            ),
            185 => 
            array (
                'id' => 202,
                'presensi_id' => 18,
                'peserta_id' => 102,
                'sign' => '63e08ae5712f4.png',
                'slug' => 'NMMzfyBb3hnEuScO8AvJ',
                'created_at' => '2023-02-06 04:56:45',
                'updated_at' => '2023-02-06 05:06:45',
            ),
            186 => 
            array (
                'id' => 203,
                'presensi_id' => 18,
                'peserta_id' => 100,
                'sign' => '63e0999a20525.png',
                'slug' => 'mmldGaVWcGLq3qeUJ1G6',
                'created_at' => '2023-02-06 04:56:52',
                'updated_at' => '2023-02-06 06:09:30',
            ),
            187 => 
            array (
                'id' => 204,
                'presensi_id' => 19,
                'peserta_id' => 5,
                'sign' => '63e1ea65190cc.png',
                'slug' => 'ScLXPqfKn3zRTqHFTNET',
                'created_at' => '2023-02-07 04:54:49',
                'updated_at' => '2023-02-07 06:06:29',
            ),
            188 => 
            array (
                'id' => 205,
                'presensi_id' => 19,
                'peserta_id' => 6,
                'sign' => '63e1f9afed8c4.png',
                'slug' => 'teu3XiM9lL1VrqcmNQVX',
                'created_at' => '2023-02-07 04:54:58',
                'updated_at' => '2023-02-07 07:11:43',
            ),
            189 => 
            array (
                'id' => 206,
                'presensi_id' => 19,
                'peserta_id' => 9,
                'sign' => '63e1de5c5c35c.png',
                'slug' => 's3rmdKHeYNilQRaHJjF6',
                'created_at' => '2023-02-07 04:55:03',
                'updated_at' => '2023-02-07 05:15:08',
            ),
            190 => 
            array (
                'id' => 207,
                'presensi_id' => 19,
                'peserta_id' => 10,
                'sign' => '63e1e1e044c83.png',
                'slug' => 'FQW0qyYPChjoOhOlJ83S',
                'created_at' => '2023-02-07 04:55:10',
                'updated_at' => '2023-02-07 05:30:08',
            ),
            191 => 
            array (
                'id' => 208,
                'presensi_id' => 19,
                'peserta_id' => 11,
                'sign' => '63e1e44a51137.png',
                'slug' => 'lou64QfZSCm11WgZRKIZ',
                'created_at' => '2023-02-07 04:55:16',
                'updated_at' => '2023-02-07 05:40:26',
            ),
            192 => 
            array (
                'id' => 209,
                'presensi_id' => 19,
                'peserta_id' => 12,
                'sign' => '63e1e3884e935.png',
                'slug' => 'R2zYMiORAEf48JVozNzy',
                'created_at' => '2023-02-07 04:55:23',
                'updated_at' => '2023-02-07 05:37:12',
            ),
            193 => 
            array (
                'id' => 211,
                'presensi_id' => 19,
                'peserta_id' => 108,
                'sign' => '63e1f263a81ac.png',
                'slug' => 'hspTbjVkQvm7lolIawhx',
                'created_at' => '2023-02-07 04:55:38',
                'updated_at' => '2023-02-07 06:40:35',
            ),
            194 => 
            array (
                'id' => 212,
                'presensi_id' => 19,
                'peserta_id' => 109,
                'sign' => '63e1e60232f97.png',
                'slug' => '3v2NCRzcY5YXgCDPXjk7',
                'created_at' => '2023-02-07 04:55:43',
                'updated_at' => '2023-02-07 05:47:46',
            ),
            195 => 
            array (
                'id' => 213,
                'presensi_id' => 19,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => '6XKiHuZk2iHLLs7V4NU3',
                'created_at' => '2023-02-07 04:55:50',
                'updated_at' => '2023-02-07 04:55:50',
            ),
            196 => 
            array (
                'id' => 214,
                'presensi_id' => 19,
                'peserta_id' => 113,
                'sign' => '63e1e24bf2436.png',
                'slug' => 'muyZVX8nAEdo3580Uuru',
                'created_at' => '2023-02-07 04:55:59',
                'updated_at' => '2023-02-07 05:31:55',
            ),
            197 => 
            array (
                'id' => 215,
                'presensi_id' => 19,
                'peserta_id' => 99,
                'sign' => '63e1e8377ca5d.png',
                'slug' => 'mOf7cuGmj5CMkmOst2WH',
                'created_at' => '2023-02-07 04:56:31',
                'updated_at' => '2023-02-07 05:57:11',
            ),
            198 => 
            array (
                'id' => 216,
                'presensi_id' => 19,
                'peserta_id' => 17,
                'sign' => '63e1fa31964be.png',
                'slug' => 'kINH0VKsNcqD1jOjRMYp',
                'created_at' => '2023-02-07 04:56:50',
                'updated_at' => '2023-02-07 07:13:53',
            ),
            199 => 
            array (
                'id' => 217,
                'presensi_id' => 19,
                'peserta_id' => 105,
                'sign' => '63e1fa4c7b35f.png',
                'slug' => 'kCmaqlcelZoIqkcFeIjw',
                'created_at' => '2023-02-07 04:57:13',
                'updated_at' => '2023-02-07 07:14:20',
            ),
            200 => 
            array (
                'id' => 218,
                'presensi_id' => 19,
                'peserta_id' => 83,
                'sign' => '63e1ea041ecea.png',
                'slug' => 'DgXH2w0tagahbiwp8fn0',
                'created_at' => '2023-02-07 04:57:22',
                'updated_at' => '2023-02-07 06:04:52',
            ),
            201 => 
            array (
                'id' => 219,
                'presensi_id' => 19,
                'peserta_id' => 77,
                'sign' => '63e1e36537114.png',
                'slug' => 'EFv6Is8CtF2q9j8IxiEX',
                'created_at' => '2023-02-07 04:57:31',
                'updated_at' => '2023-02-07 05:36:37',
            ),
            202 => 
            array (
                'id' => 220,
                'presensi_id' => 19,
                'peserta_id' => 116,
                'sign' => NULL,
                'slug' => 'FOofMdH1xvj2cjCn9oAk',
                'created_at' => '2023-02-07 05:01:58',
                'updated_at' => '2023-02-07 05:01:58',
            ),
            203 => 
            array (
                'id' => 221,
                'presensi_id' => 19,
                'peserta_id' => 117,
                'sign' => NULL,
                'slug' => 'j4IBniIHd44CaRelsMs2',
                'created_at' => '2023-02-07 05:02:56',
                'updated_at' => '2023-02-07 05:02:56',
            ),
            204 => 
            array (
                'id' => 222,
                'presensi_id' => 19,
                'peserta_id' => 118,
                'sign' => NULL,
                'slug' => 'nCXo3YNHq5nJaYWuVncM',
                'created_at' => '2023-02-07 05:03:38',
                'updated_at' => '2023-02-07 05:03:38',
            ),
            205 => 
            array (
                'id' => 223,
                'presensi_id' => 19,
                'peserta_id' => 79,
                'sign' => '63e1f81dd59d0.png',
                'slug' => 'Mz1GTIiCygtSx11i7bLA',
                'created_at' => '2023-02-07 05:05:41',
                'updated_at' => '2023-02-07 07:05:01',
            ),
            206 => 
            array (
                'id' => 224,
                'presensi_id' => 19,
                'peserta_id' => 46,
                'sign' => '63e1e2939034c.png',
                'slug' => 'R5GyYTRuoa9LL32dcNsm',
                'created_at' => '2023-02-07 05:05:47',
                'updated_at' => '2023-02-07 05:33:07',
            ),
            207 => 
            array (
                'id' => 225,
                'presensi_id' => 19,
                'peserta_id' => 110,
                'sign' => '63e1e38ec0da4.png',
                'slug' => 'mMvTMuhM8X9Y5wzolXpZ',
                'created_at' => '2023-02-07 05:05:54',
                'updated_at' => '2023-02-07 05:37:18',
            ),
            208 => 
            array (
                'id' => 226,
                'presensi_id' => 19,
                'peserta_id' => 20,
                'sign' => NULL,
                'slug' => '2YloqVqpVRsRJNl0Zjhi',
                'created_at' => '2023-02-07 05:06:07',
                'updated_at' => '2023-02-07 05:06:07',
            ),
            209 => 
            array (
                'id' => 227,
                'presensi_id' => 19,
                'peserta_id' => 15,
                'sign' => NULL,
                'slug' => 'dm9uMG5Gk0bgU51cFkCd',
                'created_at' => '2023-02-07 05:06:14',
                'updated_at' => '2023-02-07 05:06:14',
            ),
            210 => 
            array (
                'id' => 229,
                'presensi_id' => 19,
                'peserta_id' => 112,
                'sign' => '63e1fbca4f9fd.png',
                'slug' => 'rK2I818yhU7eW6QgtAj5',
                'created_at' => '2023-02-07 07:15:18',
                'updated_at' => '2023-02-07 07:20:42',
            ),
            211 => 
            array (
                'id' => 257,
                'presensi_id' => 21,
                'peserta_id' => 5,
                'sign' => '63e30b555f2b1.png',
                'slug' => 'jDrFYETiqhC3TJzqnLNG',
                'created_at' => '2023-02-08 02:26:46',
                'updated_at' => '2023-02-08 02:39:17',
            ),
            212 => 
            array (
                'id' => 258,
                'presensi_id' => 21,
                'peserta_id' => 6,
                'sign' => '63e30e592bf86.png',
                'slug' => '01aItXZpVNajerN56GlM',
                'created_at' => '2023-02-08 02:27:23',
                'updated_at' => '2023-02-08 02:52:09',
            ),
            213 => 
            array (
                'id' => 259,
                'presensi_id' => 21,
                'peserta_id' => 9,
                'sign' => '63e30ea739f40.png',
                'slug' => 'eRMniyWhPl4FPJMHTE2G',
                'created_at' => '2023-02-08 02:28:24',
                'updated_at' => '2023-02-08 02:53:27',
            ),
            214 => 
            array (
                'id' => 260,
                'presensi_id' => 21,
                'peserta_id' => 10,
                'sign' => '63e30cc6b02b8.png',
                'slug' => 'czPjGeetOyz5N8LmIWDj',
                'created_at' => '2023-02-08 02:28:33',
                'updated_at' => '2023-02-08 02:45:26',
            ),
            215 => 
            array (
                'id' => 261,
                'presensi_id' => 21,
                'peserta_id' => 11,
                'sign' => '63e30c3f28b78.png',
                'slug' => 'VCAph1PUAh912d1KkFV2',
                'created_at' => '2023-02-08 02:28:40',
                'updated_at' => '2023-02-08 02:43:11',
            ),
            216 => 
            array (
                'id' => 262,
                'presensi_id' => 21,
                'peserta_id' => 12,
                'sign' => '63e30f44ce3f2.png',
                'slug' => '7Vq1ofX0TVgFAFHrjQzf',
                'created_at' => '2023-02-08 02:28:46',
                'updated_at' => '2023-02-08 02:56:04',
            ),
            217 => 
            array (
                'id' => 263,
                'presensi_id' => 21,
                'peserta_id' => 107,
                'sign' => '63e30a635aa63.png',
                'slug' => 'OkU0RIaIeFCZlRRl0AHM',
                'created_at' => '2023-02-08 02:29:15',
                'updated_at' => '2023-02-08 02:35:15',
            ),
            218 => 
            array (
                'id' => 264,
                'presensi_id' => 21,
                'peserta_id' => 108,
                'sign' => '63e315c8c8c27.png',
                'slug' => 'oZbdbnftn82mn7rBspwC',
                'created_at' => '2023-02-08 02:29:21',
                'updated_at' => '2023-02-08 03:23:52',
            ),
            219 => 
            array (
                'id' => 265,
                'presensi_id' => 21,
                'peserta_id' => 109,
                'sign' => '63e30ee9bb0d6.png',
                'slug' => 'I6vS4WgYMRZWSqEQ8Syl',
                'created_at' => '2023-02-08 02:29:33',
                'updated_at' => '2023-02-08 02:54:33',
            ),
            220 => 
            array (
                'id' => 266,
                'presensi_id' => 21,
                'peserta_id' => 21,
                'sign' => '63e30cb4be863.png',
                'slug' => 'Jli2PgSoUxX2fbVlOTc5',
                'created_at' => '2023-02-08 02:29:42',
                'updated_at' => '2023-02-08 02:45:08',
            ),
            221 => 
            array (
                'id' => 267,
                'presensi_id' => 21,
                'peserta_id' => 38,
                'sign' => '63e331df8f32f.png',
                'slug' => 'TURXUZfAJ0l3ldnoY6fw',
                'created_at' => '2023-02-08 02:29:48',
                'updated_at' => '2023-02-08 05:23:43',
            ),
            222 => 
            array (
                'id' => 268,
                'presensi_id' => 21,
                'peserta_id' => 22,
                'sign' => '63e30ee055660.png',
                'slug' => 'EEg1b7fMfwB1khUMIzrj',
                'created_at' => '2023-02-08 02:30:34',
                'updated_at' => '2023-02-08 02:54:24',
            ),
            223 => 
            array (
                'id' => 269,
                'presensi_id' => 21,
                'peserta_id' => 89,
                'sign' => '63e30d219d894.png',
                'slug' => 'mGwJ7nkXGmipydEUgJTM',
                'created_at' => '2023-02-08 02:30:45',
                'updated_at' => '2023-02-08 02:46:57',
            ),
            224 => 
            array (
                'id' => 270,
                'presensi_id' => 21,
                'peserta_id' => 49,
                'sign' => NULL,
                'slug' => '3k8fEodtL3dyHpzdpOhV',
                'created_at' => '2023-02-08 02:30:50',
                'updated_at' => '2023-02-08 02:30:50',
            ),
            225 => 
            array (
                'id' => 271,
                'presensi_id' => 21,
                'peserta_id' => 86,
                'sign' => '63e32b84d781f.png',
                'slug' => 'hgvpE68MSVfyfikaKl8j',
                'created_at' => '2023-02-08 02:31:06',
                'updated_at' => '2023-02-08 04:56:36',
            ),
            226 => 
            array (
                'id' => 272,
                'presensi_id' => 21,
                'peserta_id' => 87,
                'sign' => NULL,
                'slug' => 'Z5d8KeXhVUDBVi0aqHou',
                'created_at' => '2023-02-08 02:31:29',
                'updated_at' => '2023-02-08 02:31:29',
            ),
            227 => 
            array (
                'id' => 273,
                'presensi_id' => 21,
                'peserta_id' => 83,
                'sign' => '63e30fc3da226.png',
                'slug' => 'E2eoOqlnrUDtxfhzbxT8',
                'created_at' => '2023-02-08 02:31:36',
                'updated_at' => '2023-02-08 02:58:11',
            ),
            228 => 
            array (
                'id' => 274,
                'presensi_id' => 21,
                'peserta_id' => 91,
                'sign' => '63e315dbd8a16.png',
                'slug' => 'ZJv2tZyNNbvyO6ZmzWiT',
                'created_at' => '2023-02-08 02:31:43',
                'updated_at' => '2023-02-08 03:24:11',
            ),
            229 => 
            array (
                'id' => 275,
                'presensi_id' => 21,
                'peserta_id' => 31,
                'sign' => NULL,
                'slug' => 'wGiZyqXODXhFwEzT8o9G',
                'created_at' => '2023-02-08 02:32:04',
                'updated_at' => '2023-02-08 02:32:04',
            ),
            230 => 
            array (
                'id' => 276,
                'presensi_id' => 21,
                'peserta_id' => 119,
                'sign' => NULL,
                'slug' => 'tn7pnveByYougQitEDDA',
                'created_at' => '2023-02-08 02:32:15',
                'updated_at' => '2023-02-08 02:32:15',
            ),
            231 => 
            array (
                'id' => 277,
                'presensi_id' => 21,
                'peserta_id' => 57,
                'sign' => '63e318a7a8e79.png',
                'slug' => 'lY4LYwQEK6CzylheBEcP',
                'created_at' => '2023-02-08 02:32:20',
                'updated_at' => '2023-02-08 03:36:07',
            ),
            232 => 
            array (
                'id' => 278,
                'presensi_id' => 21,
                'peserta_id' => 32,
                'sign' => '63e31051329f2.png',
                'slug' => 'YMLM4tATa6YhUoZtwIdm',
                'created_at' => '2023-02-08 02:32:32',
                'updated_at' => '2023-02-08 03:00:33',
            ),
            233 => 
            array (
                'id' => 279,
                'presensi_id' => 21,
                'peserta_id' => 16,
                'sign' => '63e30de8ad62f.png',
                'slug' => '9evo8Kfe4uv0pDiZEZ5X',
                'created_at' => '2023-02-08 02:32:37',
                'updated_at' => '2023-02-08 02:50:16',
            ),
            234 => 
            array (
                'id' => 280,
                'presensi_id' => 21,
                'peserta_id' => 106,
                'sign' => '63e32b7ccd765.png',
                'slug' => 'cuoc0xzTS1lKZtSVYpiz',
                'created_at' => '2023-02-08 02:33:03',
                'updated_at' => '2023-02-08 04:56:28',
            ),
            235 => 
            array (
                'id' => 281,
                'presensi_id' => 21,
                'peserta_id' => 111,
                'sign' => '63e315dc0c4f1.png',
                'slug' => 'tHVgWSaYxUKC5uYhKlLG',
                'created_at' => '2023-02-08 02:33:10',
                'updated_at' => '2023-02-08 03:24:12',
            ),
            236 => 
            array (
                'id' => 282,
                'presensi_id' => 21,
                'peserta_id' => 17,
                'sign' => '63e32a09db27a.png',
                'slug' => 'lhn49rkPKPGB38UqTSq0',
                'created_at' => '2023-02-08 02:33:18',
                'updated_at' => '2023-02-08 04:50:17',
            ),
            237 => 
            array (
                'id' => 283,
                'presensi_id' => 21,
                'peserta_id' => 105,
                'sign' => '63e32a83326c6.png',
                'slug' => 'PRx0KsuEY3WZb3DfVy4c',
                'created_at' => '2023-02-08 02:33:24',
                'updated_at' => '2023-02-08 04:52:19',
            ),
            238 => 
            array (
                'id' => 284,
                'presensi_id' => 22,
                'peserta_id' => 114,
                'sign' => '63e340ad6a772.png',
                'slug' => 'GVc6iCwBqv29x0ojNcz4',
                'created_at' => '2023-02-08 06:01:01',
                'updated_at' => '2023-02-08 06:26:53',
            ),
            239 => 
            array (
                'id' => 285,
                'presensi_id' => 22,
                'peserta_id' => 9,
                'sign' => '63e33ea4264e1.png',
                'slug' => 'y6Na0TC1w7AYxgueSP9D',
                'created_at' => '2023-02-08 06:01:13',
                'updated_at' => '2023-02-08 06:18:12',
            ),
            240 => 
            array (
                'id' => 286,
                'presensi_id' => 22,
                'peserta_id' => 16,
                'sign' => '63e33cf71242b.png',
                'slug' => 'Gnv7wEjxIrBnC4OiJDwa',
                'created_at' => '2023-02-08 06:01:26',
                'updated_at' => '2023-02-08 06:11:03',
            ),
            241 => 
            array (
                'id' => 287,
                'presensi_id' => 22,
                'peserta_id' => 19,
                'sign' => '63e341ce2033d.png',
                'slug' => 'VL6FRjyQx5u97z8BrjoI',
                'created_at' => '2023-02-08 06:01:33',
                'updated_at' => '2023-02-08 06:31:42',
            ),
            242 => 
            array (
                'id' => 288,
                'presensi_id' => 22,
                'peserta_id' => 32,
                'sign' => '63e33d0d5b41b.png',
                'slug' => 'teMqusF4nxdtIK7D2QC5',
                'created_at' => '2023-02-08 06:01:41',
                'updated_at' => '2023-02-08 06:11:25',
            ),
            243 => 
            array (
                'id' => 289,
                'presensi_id' => 22,
                'peserta_id' => 77,
                'sign' => '63e33e5883cfa.png',
                'slug' => 'tFyVtKtINJBNHXIZQTIJ',
                'created_at' => '2023-02-08 06:01:50',
                'updated_at' => '2023-02-08 06:16:56',
            ),
            244 => 
            array (
                'id' => 290,
                'presensi_id' => 22,
                'peserta_id' => 5,
                'sign' => '63e345f4a533b.png',
                'slug' => 'rbu1C8l6L3zzGgg6ITPP',
                'created_at' => '2023-02-08 06:02:42',
                'updated_at' => '2023-02-08 06:49:24',
            ),
            245 => 
            array (
                'id' => 291,
                'presensi_id' => 22,
                'peserta_id' => 21,
                'sign' => '63e3402495c49.png',
                'slug' => 'gFb3hFbdBmSlCXfHm3Or',
                'created_at' => '2023-02-08 06:02:55',
                'updated_at' => '2023-02-08 06:24:36',
            ),
            246 => 
            array (
                'id' => 292,
                'presensi_id' => 22,
                'peserta_id' => 26,
                'sign' => '63e33e75e289f.png',
                'slug' => 'fokMYRWO4wowl5JCHOUH',
                'created_at' => '2023-02-08 06:03:03',
                'updated_at' => '2023-02-08 06:17:25',
            ),
            247 => 
            array (
                'id' => 293,
                'presensi_id' => 22,
                'peserta_id' => 75,
                'sign' => NULL,
                'slug' => 'sf8Ni1BwD7F9XrXM6J30',
                'created_at' => '2023-02-08 06:09:37',
                'updated_at' => '2023-02-08 06:09:37',
            ),
            248 => 
            array (
                'id' => 294,
                'presensi_id' => 22,
                'peserta_id' => 33,
                'sign' => NULL,
                'slug' => 'IctaFxjqeZqSRW8hloiF',
                'created_at' => '2023-02-08 06:10:04',
                'updated_at' => '2023-02-08 06:10:04',
            ),
            249 => 
            array (
                'id' => 295,
                'presensi_id' => 22,
                'peserta_id' => 24,
                'sign' => '63e33e9aa0310.png',
                'slug' => 'jlkd1c8sNLmL6fCfnqbA',
                'created_at' => '2023-02-08 06:12:06',
                'updated_at' => '2023-02-08 06:18:02',
            ),
            250 => 
            array (
                'id' => 296,
                'presensi_id' => 22,
                'peserta_id' => 82,
                'sign' => '63e33efa34ec4.png',
                'slug' => 'Q2GSHBFmQ2rVsBrkh1eV',
                'created_at' => '2023-02-08 06:19:12',
                'updated_at' => '2023-02-08 06:19:38',
            ),
            251 => 
            array (
                'id' => 297,
                'presensi_id' => 22,
                'peserta_id' => 51,
                'sign' => '63e3425b1df5f.png',
                'slug' => 'zWqZ5IiEXro6ZK4nfr86',
                'created_at' => '2023-02-08 06:32:54',
                'updated_at' => '2023-02-08 06:34:03',
            ),
            252 => 
            array (
                'id' => 298,
                'presensi_id' => 22,
                'peserta_id' => 62,
                'sign' => '63e344411bf98.png',
                'slug' => 'mA5SNHellTLfd8qRHrn6',
                'created_at' => '2023-02-08 06:40:23',
                'updated_at' => '2023-02-08 06:42:09',
            ),
            253 => 
            array (
                'id' => 299,
                'presensi_id' => 22,
                'peserta_id' => 13,
                'sign' => '63e344865812d.png',
                'slug' => 'ncfb2UAMlBBZyDxt1Zxe',
                'created_at' => '2023-02-08 06:42:35',
                'updated_at' => '2023-02-08 06:43:18',
            ),
            254 => 
            array (
                'id' => 300,
                'presensi_id' => 22,
                'peserta_id' => 18,
                'sign' => '63e3448e7f9b8.png',
                'slug' => 'NO4pqBBZBxqqRZUn7Ji8',
                'created_at' => '2023-02-08 06:42:40',
                'updated_at' => '2023-02-08 06:43:26',
            ),
            255 => 
            array (
                'id' => 301,
                'presensi_id' => 22,
                'peserta_id' => 60,
                'sign' => '63e3488d4d7bd.png',
                'slug' => 'KWywYzXlpWwXfnW9BuP1',
                'created_at' => '2023-02-08 06:59:41',
                'updated_at' => '2023-02-08 07:00:29',
            ),
            256 => 
            array (
                'id' => 302,
                'presensi_id' => 23,
                'peserta_id' => 5,
                'sign' => '63e477975ffc3.png',
                'slug' => 'o6DFkaun1BArOdEnb502',
                'created_at' => '2023-02-08 13:41:22',
                'updated_at' => '2023-02-09 04:33:27',
            ),
            257 => 
            array (
                'id' => 303,
                'presensi_id' => 23,
                'peserta_id' => 6,
                'sign' => '63e476f789e81.png',
                'slug' => 'vWu1eJ9jTerMZhg3y9mB',
                'created_at' => '2023-02-08 13:41:39',
                'updated_at' => '2023-02-09 04:30:47',
            ),
            258 => 
            array (
                'id' => 304,
                'presensi_id' => 23,
                'peserta_id' => 9,
                'sign' => '63e47720ec5c1.png',
                'slug' => 'CEGAyDNuSjmtC7BaApke',
                'created_at' => '2023-02-08 13:41:51',
                'updated_at' => '2023-02-09 04:31:28',
            ),
            259 => 
            array (
                'id' => 305,
                'presensi_id' => 23,
                'peserta_id' => 10,
                'sign' => '63e47771c5b3f.png',
                'slug' => 'CdJ3YEXZWRS04iuKH5Bw',
                'created_at' => '2023-02-08 13:42:34',
                'updated_at' => '2023-02-09 04:32:49',
            ),
            260 => 
            array (
                'id' => 306,
                'presensi_id' => 23,
                'peserta_id' => 11,
                'sign' => '63e5ad6b47f95.png',
                'slug' => 'fHHQ8hlX3ghzdtXGQcgf',
                'created_at' => '2023-02-08 13:42:40',
                'updated_at' => '2023-02-10 02:35:23',
            ),
            261 => 
            array (
                'id' => 307,
                'presensi_id' => 23,
                'peserta_id' => 12,
                'sign' => '63e4779a5da34.png',
                'slug' => 'flbI1hKsxJYjcloHnN9a',
                'created_at' => '2023-02-08 13:42:45',
                'updated_at' => '2023-02-09 04:33:30',
            ),
            262 => 
            array (
                'id' => 308,
                'presensi_id' => 23,
                'peserta_id' => 107,
                'sign' => '63e4917f3b51f.png',
                'slug' => 'zI4YgOSuGgY5EjKOqgwk',
                'created_at' => '2023-02-08 13:42:51',
                'updated_at' => '2023-02-09 06:23:59',
            ),
            263 => 
            array (
                'id' => 309,
                'presensi_id' => 23,
                'peserta_id' => 108,
                'sign' => '63e477b07aac0.png',
                'slug' => 'GftU9NdGKnJrUKnWZFpi',
                'created_at' => '2023-02-08 13:42:59',
                'updated_at' => '2023-02-09 04:33:52',
            ),
            264 => 
            array (
                'id' => 310,
                'presensi_id' => 23,
                'peserta_id' => 109,
                'sign' => '63e4786cd3f9c.png',
                'slug' => 'LrFre1axnrm8obJ5Y5iY',
                'created_at' => '2023-02-08 13:43:05',
                'updated_at' => '2023-02-09 04:37:00',
            ),
            265 => 
            array (
                'id' => 311,
                'presensi_id' => 23,
                'peserta_id' => 21,
                'sign' => '63e47937dca43.png',
                'slug' => 'jPimW1V4iDFp05XQWTai',
                'created_at' => '2023-02-08 13:43:12',
                'updated_at' => '2023-02-09 04:40:23',
            ),
            266 => 
            array (
                'id' => 312,
                'presensi_id' => 23,
                'peserta_id' => 22,
                'sign' => '63e47b6eacab5.png',
                'slug' => 'aM1Pt9GnYTz7UhbBm7Jc',
                'created_at' => '2023-02-08 13:43:19',
                'updated_at' => '2023-02-09 04:49:50',
            ),
            267 => 
            array (
                'id' => 313,
                'presensi_id' => 23,
                'peserta_id' => 120,
                'sign' => '63e47a800bf5d.png',
                'slug' => 'rVcpXFYtTZTYp9esJVrD',
                'created_at' => '2023-02-08 13:49:13',
                'updated_at' => '2023-02-09 04:45:52',
            ),
            268 => 
            array (
                'id' => 314,
                'presensi_id' => 23,
                'peserta_id' => 121,
                'sign' => NULL,
                'slug' => 'PTUOsqm9q8xpzDoOvYcy',
                'created_at' => '2023-02-08 13:49:51',
                'updated_at' => '2023-02-08 13:49:51',
            ),
            269 => 
            array (
                'id' => 315,
                'presensi_id' => 23,
                'peserta_id' => 122,
                'sign' => '63e478c756db5.png',
                'slug' => 'hbRPNJlwE0hp0eiYsZLM',
                'created_at' => '2023-02-08 13:51:35',
                'updated_at' => '2023-02-09 04:38:31',
            ),
            270 => 
            array (
                'id' => 316,
                'presensi_id' => 23,
                'peserta_id' => 17,
                'sign' => '63e478c9b17c0.png',
                'slug' => '0n7nV8Nnb7tJ9ngkTy7p',
                'created_at' => '2023-02-08 13:51:45',
                'updated_at' => '2023-02-09 04:38:33',
            ),
            271 => 
            array (
                'id' => 317,
                'presensi_id' => 23,
                'peserta_id' => 105,
                'sign' => NULL,
                'slug' => 'YYZtiY8Yg7bkq3imZluC',
                'created_at' => '2023-02-08 13:51:52',
                'updated_at' => '2023-02-08 13:51:52',
            ),
            272 => 
            array (
                'id' => 318,
                'presensi_id' => 24,
                'peserta_id' => 5,
                'sign' => '63e5b3c42597e.png',
                'slug' => 'l5uIbuZOH45eeHAyOHVL',
                'created_at' => '2023-02-08 13:52:45',
                'updated_at' => '2023-02-10 03:02:28',
            ),
            273 => 
            array (
                'id' => 319,
                'presensi_id' => 24,
                'peserta_id' => 6,
                'sign' => '63e5b752be937.png',
                'slug' => '3iYaru1ymPd0SvJgy57k',
                'created_at' => '2023-02-08 13:53:04',
                'updated_at' => '2023-02-10 03:17:38',
            ),
            274 => 
            array (
                'id' => 320,
                'presensi_id' => 24,
                'peserta_id' => 9,
                'sign' => '63e5b4529a26b.png',
                'slug' => 'wMwEK6y6lZlaaGfequnW',
                'created_at' => '2023-02-08 13:53:10',
                'updated_at' => '2023-02-10 03:04:50',
            ),
            275 => 
            array (
                'id' => 321,
                'presensi_id' => 24,
                'peserta_id' => 10,
                'sign' => '63e5ba2e4ad0a.png',
                'slug' => 'kdRiDrcS7c08thUAwnto',
                'created_at' => '2023-02-08 13:53:16',
                'updated_at' => '2023-02-10 03:29:50',
            ),
            276 => 
            array (
                'id' => 322,
                'presensi_id' => 24,
                'peserta_id' => 11,
                'sign' => '63e5b4748cbe8.png',
                'slug' => '3ZsDsENYJTiwwc2HX9ka',
                'created_at' => '2023-02-08 13:53:28',
                'updated_at' => '2023-02-10 03:05:24',
            ),
            277 => 
            array (
                'id' => 323,
                'presensi_id' => 24,
                'peserta_id' => 12,
                'sign' => '63e5c11d4ee27.png',
                'slug' => 'fql3FzzAD42NUUppaelm',
                'created_at' => '2023-02-08 13:53:33',
                'updated_at' => '2023-02-10 03:59:25',
            ),
            278 => 
            array (
                'id' => 324,
                'presensi_id' => 24,
                'peserta_id' => 107,
                'sign' => '63e5b70c36ef5.png',
                'slug' => 'bbZPKVQvLu30E6vRYwjd',
                'created_at' => '2023-02-08 13:53:39',
                'updated_at' => '2023-02-10 03:16:28',
            ),
            279 => 
            array (
                'id' => 325,
                'presensi_id' => 24,
                'peserta_id' => 108,
                'sign' => '63e5ba78617a5.png',
                'slug' => 'n4CHn35iCfdgbo4PGieu',
                'created_at' => '2023-02-08 13:53:44',
                'updated_at' => '2023-02-10 03:31:04',
            ),
            280 => 
            array (
                'id' => 326,
                'presensi_id' => 24,
                'peserta_id' => 109,
                'sign' => '63e5b886baee5.png',
                'slug' => 'NpuphT5lVn77njqPselg',
                'created_at' => '2023-02-08 13:53:51',
                'updated_at' => '2023-02-10 03:22:46',
            ),
            281 => 
            array (
                'id' => 327,
                'presensi_id' => 24,
                'peserta_id' => 21,
                'sign' => '63e5b67de0688.png',
                'slug' => '2AsE4PXOqm5pyGKXtjQH',
                'created_at' => '2023-02-08 13:53:57',
                'updated_at' => '2023-02-10 03:14:05',
            ),
            282 => 
            array (
                'id' => 328,
                'presensi_id' => 24,
                'peserta_id' => 4,
                'sign' => '63e5b7803962f.png',
                'slug' => 'Mhq0fBusrSDf4IsRM1r1',
                'created_at' => '2023-02-08 13:54:29',
                'updated_at' => '2023-02-10 03:18:24',
            ),
            283 => 
            array (
                'id' => 329,
                'presensi_id' => 24,
                'peserta_id' => 123,
                'sign' => '63e5d97bddbd8.png',
                'slug' => 'mX8oM3hcpisMcIAP7yZF',
                'created_at' => '2023-02-08 13:55:15',
                'updated_at' => '2023-02-10 05:43:23',
            ),
            284 => 
            array (
                'id' => 330,
                'presensi_id' => 24,
                'peserta_id' => 124,
                'sign' => '63e5e3f05dd28.png',
                'slug' => 'EQWNeuybv5LoObaYVXpB',
                'created_at' => '2023-02-08 13:57:05',
                'updated_at' => '2023-02-10 06:28:00',
            ),
            285 => 
            array (
                'id' => 331,
                'presensi_id' => 24,
                'peserta_id' => 125,
                'sign' => NULL,
                'slug' => 'DYmA8dkonw7uqZ1T8Ho2',
                'created_at' => '2023-02-08 13:57:48',
                'updated_at' => '2023-02-08 13:57:48',
            ),
            286 => 
            array (
                'id' => 332,
                'presensi_id' => 24,
                'peserta_id' => 126,
                'sign' => '63e5b70e4f391.png',
                'slug' => '8jcGCW4ag8uN66zCfWyZ',
                'created_at' => '2023-02-08 13:58:24',
                'updated_at' => '2023-02-10 03:16:30',
            ),
            287 => 
            array (
                'id' => 333,
                'presensi_id' => 24,
                'peserta_id' => 22,
                'sign' => '63e5b586a1521.png',
                'slug' => 'UoZHNySvIMU2CsrR9iiM',
                'created_at' => '2023-02-08 13:58:42',
                'updated_at' => '2023-02-10 03:09:58',
            ),
            288 => 
            array (
                'id' => 334,
                'presensi_id' => 24,
                'peserta_id' => 113,
                'sign' => '63e5b50f0737a.png',
                'slug' => 'sL8uo2YDJjkZedYesVzE',
                'created_at' => '2023-02-08 14:02:39',
                'updated_at' => '2023-02-10 03:07:59',
            ),
            289 => 
            array (
                'id' => 335,
                'presensi_id' => 24,
                'peserta_id' => 99,
                'sign' => '63e5bcdfb12d1.png',
                'slug' => '0pSCPz6SLwSxKVEQXYMi',
                'created_at' => '2023-02-08 14:02:47',
                'updated_at' => '2023-02-10 03:41:19',
            ),
            290 => 
            array (
                'id' => 336,
                'presensi_id' => 24,
                'peserta_id' => 17,
                'sign' => '63e5b93c33732.png',
                'slug' => '4VhuteV6BHSdvdLsBJ28',
                'created_at' => '2023-02-08 14:02:53',
                'updated_at' => '2023-02-10 03:25:48',
            ),
            291 => 
            array (
                'id' => 337,
                'presensi_id' => 24,
                'peserta_id' => 105,
                'sign' => '63e5b77b66b8a.png',
                'slug' => 'Bqs7ov3uHXZOqufdnCRx',
                'created_at' => '2023-02-08 14:02:58',
                'updated_at' => '2023-02-10 03:18:19',
            ),
            292 => 
            array (
                'id' => 338,
                'presensi_id' => 24,
                'peserta_id' => 127,
                'sign' => NULL,
                'slug' => 'iNHFkktnmjvx7a6f1GjO',
                'created_at' => '2023-02-08 14:42:32',
                'updated_at' => '2023-02-08 14:42:32',
            ),
            293 => 
            array (
                'id' => 339,
                'presensi_id' => 25,
                'peserta_id' => 5,
                'sign' => '63e9f7f2d2d77.png',
                'slug' => '1ppBytktbiawZEne2N23',
                'created_at' => '2023-02-12 22:57:36',
                'updated_at' => '2023-02-13 08:42:26',
            ),
            294 => 
            array (
                'id' => 340,
                'presensi_id' => 25,
                'peserta_id' => 6,
                'sign' => '63ea061253497.png',
                'slug' => '4ksNzsmS5cv4rjF5J9Fx',
                'created_at' => '2023-02-12 22:58:34',
                'updated_at' => '2023-02-13 09:42:42',
            ),
            295 => 
            array (
                'id' => 341,
                'presensi_id' => 25,
                'peserta_id' => 9,
                'sign' => '63e9eb072c5dd.png',
                'slug' => 'VJ8cO8P68cQuGsr0N8i5',
                'created_at' => '2023-02-12 22:58:39',
                'updated_at' => '2023-02-13 07:47:19',
            ),
            296 => 
            array (
                'id' => 342,
                'presensi_id' => 25,
                'peserta_id' => 10,
                'sign' => '63e9eb73f21dc.png',
                'slug' => 'M0Rh7OOw8YuRkd6DiFKN',
                'created_at' => '2023-02-12 22:58:48',
                'updated_at' => '2023-02-13 07:49:07',
            ),
            297 => 
            array (
                'id' => 343,
                'presensi_id' => 25,
                'peserta_id' => 11,
                'sign' => '63e9f7ebe51ac.png',
                'slug' => '5zj446ZlTGICv9c4KpiH',
                'created_at' => '2023-02-12 22:58:53',
                'updated_at' => '2023-02-13 08:42:19',
            ),
            298 => 
            array (
                'id' => 344,
                'presensi_id' => 25,
                'peserta_id' => 12,
                'sign' => '63e9eb63d0730.png',
                'slug' => 'lax0dHRnEBAXPvJqm1uP',
                'created_at' => '2023-02-12 22:58:59',
                'updated_at' => '2023-02-13 07:48:51',
            ),
            299 => 
            array (
                'id' => 345,
                'presensi_id' => 25,
                'peserta_id' => 107,
                'sign' => '63e9eafce8201.png',
                'slug' => '2KckuLI2Fyr3HOoNf2SO',
                'created_at' => '2023-02-12 22:59:04',
                'updated_at' => '2023-02-13 07:47:08',
            ),
            300 => 
            array (
                'id' => 346,
                'presensi_id' => 25,
                'peserta_id' => 108,
                'sign' => '63e9f04117437.png',
                'slug' => 'clX8Bq8c6qu3WXT7v7Yh',
                'created_at' => '2023-02-12 23:00:08',
                'updated_at' => '2023-02-13 08:09:37',
            ),
            301 => 
            array (
                'id' => 347,
                'presensi_id' => 25,
                'peserta_id' => 109,
                'sign' => '63ea073a00434.png',
                'slug' => 'xiEIO08v3G2tDgOIqLqP',
                'created_at' => '2023-02-12 23:00:18',
                'updated_at' => '2023-02-13 09:47:38',
            ),
            302 => 
            array (
                'id' => 348,
                'presensi_id' => 25,
                'peserta_id' => 21,
                'sign' => '63e9ebc0ab36b.png',
                'slug' => 'NfquBrl1Pp3ph9fwkW9Q',
                'created_at' => '2023-02-12 23:00:24',
                'updated_at' => '2023-02-13 07:50:24',
            ),
            303 => 
            array (
                'id' => 349,
                'presensi_id' => 25,
                'peserta_id' => 22,
                'sign' => '63e9ebceeb0e0.png',
                'slug' => 'ohKW7TrcuAJVHkSNGsiO',
                'created_at' => '2023-02-12 23:00:30',
                'updated_at' => '2023-02-13 07:50:38',
            ),
            304 => 
            array (
                'id' => 350,
                'presensi_id' => 25,
                'peserta_id' => 113,
                'sign' => '63e9eb9705d53.png',
                'slug' => '1jJcwIgFWmD6YCPJiyQc',
                'created_at' => '2023-02-12 23:00:37',
                'updated_at' => '2023-02-13 07:49:43',
            ),
            305 => 
            array (
                'id' => 351,
                'presensi_id' => 25,
                'peserta_id' => 99,
                'sign' => '63e9f721053bd.png',
                'slug' => 'QahewqNJAUljOXfcFgUS',
                'created_at' => '2023-02-12 23:00:43',
                'updated_at' => '2023-02-13 08:38:57',
            ),
            306 => 
            array (
                'id' => 352,
                'presensi_id' => 25,
                'peserta_id' => 17,
                'sign' => '63e9ee1129a01.png',
                'slug' => 'Lr77tkt3GoFSix1UCRei',
                'created_at' => '2023-02-12 23:00:50',
                'updated_at' => '2023-02-13 08:00:17',
            ),
            307 => 
            array (
                'id' => 353,
                'presensi_id' => 25,
                'peserta_id' => 105,
                'sign' => '63e9ecb9a091b.png',
                'slug' => 'ZMzom3imeYj7qrWQF5xZ',
                'created_at' => '2023-02-12 23:00:59',
                'updated_at' => '2023-02-13 07:54:33',
            ),
            308 => 
            array (
                'id' => 354,
                'presensi_id' => 25,
                'peserta_id' => 128,
                'sign' => NULL,
                'slug' => 'Ylzz6DU7EirklHrQTxXk',
                'created_at' => '2023-02-12 23:01:43',
                'updated_at' => '2023-02-12 23:01:43',
            ),
            309 => 
            array (
                'id' => 355,
                'presensi_id' => 25,
                'peserta_id' => 129,
                'sign' => '63ea2a7464cc3.png',
                'slug' => 'x78lY9GCsvFGfVCjdRHe',
                'created_at' => '2023-02-12 23:02:09',
                'updated_at' => '2023-02-13 12:17:56',
            ),
            310 => 
            array (
                'id' => 357,
                'presensi_id' => 25,
                'peserta_id' => 131,
                'sign' => '63ea276d69d2d.png',
                'slug' => 'nJFZdknzJB1e7vQzb0IX',
                'created_at' => '2023-02-12 23:03:21',
                'updated_at' => '2023-02-13 12:05:01',
            ),
            311 => 
            array (
                'id' => 358,
                'presensi_id' => 25,
                'peserta_id' => 132,
                'sign' => NULL,
                'slug' => 'rhbZePbpeUffrCj2qkIY',
                'created_at' => '2023-02-13 10:54:02',
                'updated_at' => '2023-02-13 10:54:02',
            ),
            312 => 
            array (
                'id' => 359,
                'presensi_id' => 26,
                'peserta_id' => 5,
                'sign' => '63eb37303d237.png',
                'slug' => 'fxiWI6JlNkBN61pTyzwp',
                'created_at' => '2023-02-14 02:01:58',
                'updated_at' => '2023-02-14 07:24:32',
            ),
            313 => 
            array (
                'id' => 360,
                'presensi_id' => 26,
                'peserta_id' => 6,
                'sign' => '63eb58a9d7cd4.png',
                'slug' => 'swkLOWOBjvoWVk0qGY1C',
                'created_at' => '2023-02-14 02:02:40',
                'updated_at' => '2023-02-14 09:47:21',
            ),
            314 => 
            array (
                'id' => 361,
                'presensi_id' => 26,
                'peserta_id' => 9,
                'sign' => '63eb37968bc30.png',
                'slug' => 'FhRyfXUyERjV0qXYVLBR',
                'created_at' => '2023-02-14 02:02:51',
                'updated_at' => '2023-02-14 07:26:14',
            ),
            315 => 
            array (
                'id' => 362,
                'presensi_id' => 26,
                'peserta_id' => 10,
                'sign' => '63eb3ad2b089e.png',
                'slug' => 'wWuiSnQKfPN3qn4yTncR',
                'created_at' => '2023-02-14 02:03:06',
                'updated_at' => '2023-02-14 07:40:02',
            ),
            316 => 
            array (
                'id' => 363,
                'presensi_id' => 26,
                'peserta_id' => 11,
                'sign' => '63eb73ccdc4a8.png',
                'slug' => 'PJUCHuLj2y57IPFesK2t',
                'created_at' => '2023-02-14 02:03:11',
                'updated_at' => '2023-02-14 11:43:08',
            ),
            317 => 
            array (
                'id' => 364,
                'presensi_id' => 26,
                'peserta_id' => 12,
                'sign' => '63eb379e798a8.png',
                'slug' => 'aBIdKNqruUQ4yAltBt2f',
                'created_at' => '2023-02-14 02:03:17',
                'updated_at' => '2023-02-14 07:26:22',
            ),
            318 => 
            array (
                'id' => 365,
                'presensi_id' => 26,
                'peserta_id' => 107,
                'sign' => '63eb58a2e09ca.png',
                'slug' => 'EFLH4NnAPMswGx4zBGtr',
                'created_at' => '2023-02-14 02:03:24',
                'updated_at' => '2023-02-14 09:47:14',
            ),
            319 => 
            array (
                'id' => 366,
                'presensi_id' => 26,
                'peserta_id' => 108,
                'sign' => '63eb37c879139.png',
                'slug' => 'Jrpp30WZlxBWBPWX0xWb',
                'created_at' => '2023-02-14 02:03:57',
                'updated_at' => '2023-02-14 07:27:04',
            ),
            320 => 
            array (
                'id' => 367,
                'presensi_id' => 26,
                'peserta_id' => 109,
                'sign' => '63eb37f8406ea.png',
                'slug' => 'MKhQoKD3nDgkvqo2Cy9m',
                'created_at' => '2023-02-14 02:04:05',
                'updated_at' => '2023-02-14 07:27:52',
            ),
            321 => 
            array (
                'id' => 368,
                'presensi_id' => 26,
                'peserta_id' => 21,
                'sign' => '63eb3837c4fd9.png',
                'slug' => 'UYcqmMdmDCPDB6BIiEqz',
                'created_at' => '2023-02-14 02:04:16',
                'updated_at' => '2023-02-14 07:28:55',
            ),
            322 => 
            array (
                'id' => 369,
                'presensi_id' => 26,
                'peserta_id' => 22,
                'sign' => '63eb3c249f6fb.png',
                'slug' => 'shdqnQZw2qjcodrBs6G1',
                'created_at' => '2023-02-14 02:04:21',
                'updated_at' => '2023-02-14 07:45:40',
            ),
            323 => 
            array (
                'id' => 370,
                'presensi_id' => 26,
                'peserta_id' => 113,
                'sign' => '63eb3c18e9342.png',
                'slug' => 'ZsExuJMXZbzxuZSv7ahb',
                'created_at' => '2023-02-14 02:04:27',
                'updated_at' => '2023-02-14 07:45:28',
            ),
            324 => 
            array (
                'id' => 371,
                'presensi_id' => 26,
                'peserta_id' => 99,
                'sign' => '63eb46fc59c4e.png',
                'slug' => 'ztT3mW0kMy1yniZxPOwl',
                'created_at' => '2023-02-14 02:04:32',
                'updated_at' => '2023-02-14 08:31:56',
            ),
            325 => 
            array (
                'id' => 372,
                'presensi_id' => 26,
                'peserta_id' => 133,
                'sign' => NULL,
                'slug' => 'iy3LspKQqnLYMLj2PXol',
                'created_at' => '2023-02-14 04:01:57',
                'updated_at' => '2023-02-14 04:01:57',
            ),
            326 => 
            array (
                'id' => 373,
                'presensi_id' => 26,
                'peserta_id' => 134,
                'sign' => '63eb43fcf0c17.png',
                'slug' => 'aMtZpiiUGHBS3vqwqcxr',
                'created_at' => '2023-02-14 04:03:23',
                'updated_at' => '2023-02-14 08:19:08',
            ),
            327 => 
            array (
                'id' => 374,
                'presensi_id' => 26,
                'peserta_id' => 135,
                'sign' => '63eb3a5d25a27.png',
                'slug' => 'ELw6BdsnPJt9kYEOu1Bi',
                'created_at' => '2023-02-14 04:04:16',
                'updated_at' => '2023-02-14 07:38:05',
            ),
            328 => 
            array (
                'id' => 375,
                'presensi_id' => 26,
                'peserta_id' => 136,
                'sign' => NULL,
                'slug' => 'rc3f97PJQSXaLQG9tkr4',
                'created_at' => '2023-02-14 04:06:00',
                'updated_at' => '2023-02-14 04:06:00',
            ),
            329 => 
            array (
                'id' => 376,
                'presensi_id' => 26,
                'peserta_id' => 137,
                'sign' => '63ec77fba0abb.png',
                'slug' => 'gFtcPBS8QIZgRhzUGzfj',
                'created_at' => '2023-02-14 04:06:20',
                'updated_at' => '2023-02-15 06:13:15',
            ),
            330 => 
            array (
                'id' => 377,
                'presensi_id' => 26,
                'peserta_id' => 138,
                'sign' => NULL,
                'slug' => 'ixbJZyJeaihKvdBHIDtB',
                'created_at' => '2023-02-14 04:07:07',
                'updated_at' => '2023-02-14 04:07:07',
            ),
            331 => 
            array (
                'id' => 379,
                'presensi_id' => 26,
                'peserta_id' => 140,
                'sign' => '63eb3e33dd049.png',
                'slug' => 'ezFzbEU47JXnqDmhS4mX',
                'created_at' => '2023-02-14 05:11:20',
                'updated_at' => '2023-02-14 07:54:27',
            ),
            332 => 
            array (
                'id' => 380,
                'presensi_id' => 27,
                'peserta_id' => 5,
                'sign' => '63ec530bc6fcb.png',
                'slug' => 'KjV0AqhkDvVfSdgfsRn0',
                'created_at' => '2023-02-15 01:50:30',
                'updated_at' => '2023-02-15 03:35:39',
            ),
            333 => 
            array (
                'id' => 381,
                'presensi_id' => 27,
                'peserta_id' => 6,
                'sign' => '63ec530a2da3d.png',
                'slug' => 'ES5O0YoQ7GzgRZ0rRrtf',
                'created_at' => '2023-02-15 01:50:39',
                'updated_at' => '2023-02-15 03:35:38',
            ),
            334 => 
            array (
                'id' => 382,
                'presensi_id' => 27,
                'peserta_id' => 9,
                'sign' => '63ec65be43b08.png',
                'slug' => 'hywe57OM5E8Ht31NvVDj',
                'created_at' => '2023-02-15 01:50:44',
                'updated_at' => '2023-02-15 04:55:26',
            ),
            335 => 
            array (
                'id' => 383,
                'presensi_id' => 27,
                'peserta_id' => 10,
                'sign' => '63ec61263cbfb.png',
                'slug' => 'TuLWCcpzknAEWqXULY1N',
                'created_at' => '2023-02-15 01:50:50',
                'updated_at' => '2023-02-15 04:35:50',
            ),
            336 => 
            array (
                'id' => 384,
                'presensi_id' => 27,
                'peserta_id' => 11,
                'sign' => '63ec537a99963.png',
                'slug' => '8tJljJSM1dpuyCiM00i6',
                'created_at' => '2023-02-15 01:50:54',
                'updated_at' => '2023-02-15 03:37:30',
            ),
            337 => 
            array (
                'id' => 385,
                'presensi_id' => 27,
                'peserta_id' => 12,
                'sign' => '63ec546633599.png',
                'slug' => '1lLyCQpaBkrfahpG0lcw',
                'created_at' => '2023-02-15 01:51:00',
                'updated_at' => '2023-02-15 03:41:26',
            ),
            338 => 
            array (
                'id' => 386,
                'presensi_id' => 27,
                'peserta_id' => 107,
                'sign' => '63ec53d85105f.png',
                'slug' => 'ogYcuCKFTPrw655NoHm3',
                'created_at' => '2023-02-15 01:51:05',
                'updated_at' => '2023-02-15 03:39:04',
            ),
            339 => 
            array (
                'id' => 387,
                'presensi_id' => 27,
                'peserta_id' => 108,
                'sign' => '63ec544336f6a.png',
                'slug' => 'YhxgCuncoDqzW0jm8ml0',
                'created_at' => '2023-02-15 01:51:10',
                'updated_at' => '2023-02-15 03:40:51',
            ),
            340 => 
            array (
                'id' => 388,
                'presensi_id' => 27,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'qgUNGNnzFZurjHsEoVnL',
                'created_at' => '2023-02-15 01:51:14',
                'updated_at' => '2023-02-15 01:51:14',
            ),
            341 => 
            array (
                'id' => 389,
                'presensi_id' => 27,
                'peserta_id' => 21,
                'sign' => '63ec54a76c56b.png',
                'slug' => 'NiTyYSInsFFu0FK8VQIh',
                'created_at' => '2023-02-15 01:51:24',
                'updated_at' => '2023-02-15 03:42:31',
            ),
            342 => 
            array (
                'id' => 390,
                'presensi_id' => 27,
                'peserta_id' => 22,
                'sign' => '63ec54f0e637f.png',
                'slug' => 'ptv3EQv392RXOt6Eq9Dg',
                'created_at' => '2023-02-15 01:51:33',
                'updated_at' => '2023-02-15 03:43:44',
            ),
            343 => 
            array (
                'id' => 391,
                'presensi_id' => 27,
                'peserta_id' => 113,
                'sign' => '63ec56e08bd8f.png',
                'slug' => '9DPBM5YqQaBRtlucJORJ',
                'created_at' => '2023-02-15 01:51:39',
                'updated_at' => '2023-02-15 03:52:00',
            ),
            344 => 
            array (
                'id' => 392,
                'presensi_id' => 27,
                'peserta_id' => 99,
                'sign' => '63ec549b74535.png',
                'slug' => '9qtfGVOuuaEpSu1tyZae',
                'created_at' => '2023-02-15 01:51:47',
                'updated_at' => '2023-02-15 03:42:19',
            ),
            345 => 
            array (
                'id' => 393,
                'presensi_id' => 27,
                'peserta_id' => 141,
                'sign' => '63ec77089a5ae.png',
                'slug' => 'CxygzIL6sLxKv7uTO6wQ',
                'created_at' => '2023-02-15 01:53:09',
                'updated_at' => '2023-02-15 06:09:12',
            ),
            346 => 
            array (
                'id' => 394,
                'presensi_id' => 27,
                'peserta_id' => 142,
                'sign' => NULL,
                'slug' => 'wJoeo7tCXUvT3HemX5zh',
                'created_at' => '2023-02-15 01:53:40',
                'updated_at' => '2023-02-15 01:53:40',
            ),
            347 => 
            array (
                'id' => 395,
                'presensi_id' => 27,
                'peserta_id' => 143,
                'sign' => '63ec5778c5645.png',
                'slug' => 'wT82yE1B2RWKI5ty8e99',
                'created_at' => '2023-02-15 01:54:08',
                'updated_at' => '2023-02-15 03:54:32',
            ),
            348 => 
            array (
                'id' => 396,
                'presensi_id' => 27,
                'peserta_id' => 48,
                'sign' => '63ec7e34dd361.png',
                'slug' => 'Fh1FoKCsBfYRP63BWw3K',
                'created_at' => '2023-02-15 01:54:19',
                'updated_at' => '2023-02-15 06:39:48',
            ),
            349 => 
            array (
                'id' => 397,
                'presensi_id' => 27,
                'peserta_id' => 17,
                'sign' => '63ec6d2c0f0b5.png',
                'slug' => 'vuK802hAGnraNwQRmIP4',
                'created_at' => '2023-02-15 01:54:24',
                'updated_at' => '2023-02-15 05:27:08',
            ),
            350 => 
            array (
                'id' => 398,
                'presensi_id' => 28,
                'peserta_id' => 5,
                'sign' => '63eda20b4e398.png',
                'slug' => '4Wr0kJjH8dAXxtBg6OV7',
                'created_at' => '2023-02-16 02:14:40',
                'updated_at' => '2023-02-16 03:24:59',
            ),
            351 => 
            array (
                'id' => 399,
                'presensi_id' => 28,
                'peserta_id' => 6,
                'sign' => '63eda30c61bb7.png',
                'slug' => 'hA9kx0eUQmtjrDU1iFlF',
                'created_at' => '2023-02-16 02:14:53',
                'updated_at' => '2023-02-16 03:29:16',
            ),
            352 => 
            array (
                'id' => 400,
                'presensi_id' => 28,
                'peserta_id' => 9,
                'sign' => '63eda13269b47.png',
                'slug' => 'ERlfapsRvQUgOOCti8bS',
                'created_at' => '2023-02-16 02:15:00',
                'updated_at' => '2023-02-16 03:21:22',
            ),
            353 => 
            array (
                'id' => 401,
                'presensi_id' => 28,
                'peserta_id' => 10,
                'sign' => '63eda5a351061.png',
                'slug' => '4i05TgAGa2z13GRsL46k',
                'created_at' => '2023-02-16 02:15:06',
                'updated_at' => '2023-02-16 03:40:19',
            ),
            354 => 
            array (
                'id' => 402,
                'presensi_id' => 28,
                'peserta_id' => 11,
                'sign' => '63eda23a1817f.png',
                'slug' => 'FECnPmpRRjcdnZ3eqiZH',
                'created_at' => '2023-02-16 02:15:12',
                'updated_at' => '2023-02-16 03:25:46',
            ),
            355 => 
            array (
                'id' => 403,
                'presensi_id' => 28,
                'peserta_id' => 12,
                'sign' => '63eda1810e0a0.png',
                'slug' => 'VNdF8HTiFqe6iPlJwSIM',
                'created_at' => '2023-02-16 02:15:17',
                'updated_at' => '2023-02-16 03:22:41',
            ),
            356 => 
            array (
                'id' => 404,
                'presensi_id' => 28,
                'peserta_id' => 107,
                'sign' => '63ed9f97597d2.png',
                'slug' => 'fAfNE0kgUOjt2h4Wdccj',
                'created_at' => '2023-02-16 02:15:49',
                'updated_at' => '2023-02-16 03:14:31',
            ),
            357 => 
            array (
                'id' => 405,
                'presensi_id' => 28,
                'peserta_id' => 108,
                'sign' => '63eda3fe4f0e4.png',
                'slug' => 'WEeugUqEwKBbbBHot6Nz',
                'created_at' => '2023-02-16 02:15:55',
                'updated_at' => '2023-02-16 03:33:18',
            ),
            358 => 
            array (
                'id' => 406,
                'presensi_id' => 28,
                'peserta_id' => 109,
                'sign' => '63ed9fac62f98.png',
                'slug' => 'fDJPw98ynh692RO5WURl',
                'created_at' => '2023-02-16 02:16:01',
                'updated_at' => '2023-02-16 03:14:52',
            ),
            359 => 
            array (
                'id' => 407,
                'presensi_id' => 28,
                'peserta_id' => 21,
                'sign' => '63eda2968db65.png',
                'slug' => 'YtUrLwkA8ELTZv9mYTCN',
                'created_at' => '2023-02-16 02:16:06',
                'updated_at' => '2023-02-16 03:27:18',
            ),
            360 => 
            array (
                'id' => 408,
                'presensi_id' => 28,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'GRw8LPxjrhfG681QUhum',
                'created_at' => '2023-02-16 02:16:24',
                'updated_at' => '2023-02-16 02:16:24',
            ),
            361 => 
            array (
                'id' => 409,
                'presensi_id' => 28,
                'peserta_id' => 17,
                'sign' => '63eda8ea629ef.png',
                'slug' => '6RJAfBcw56FWpuPsHwvV',
                'created_at' => '2023-02-16 02:16:31',
                'updated_at' => '2023-02-16 03:54:18',
            ),
            362 => 
            array (
                'id' => 410,
                'presensi_id' => 28,
                'peserta_id' => 105,
                'sign' => '63eda26888706.png',
                'slug' => 'lMb5qZvPfTgtRw12jJq0',
                'created_at' => '2023-02-16 02:16:39',
                'updated_at' => '2023-02-16 03:26:32',
            ),
            363 => 
            array (
                'id' => 411,
                'presensi_id' => 28,
                'peserta_id' => 144,
                'sign' => '63eda760acf81.png',
                'slug' => 'BvUq1fpwBOGmCOZjKteX',
                'created_at' => '2023-02-16 02:17:58',
                'updated_at' => '2023-02-16 03:47:44',
            ),
            364 => 
            array (
                'id' => 412,
                'presensi_id' => 29,
                'peserta_id' => 5,
                'sign' => '63f58aa3b45c4.png',
                'slug' => '1RMt0Zgapw8yAM7v0Zh8',
                'created_at' => '2023-02-22 03:00:22',
                'updated_at' => '2023-02-22 03:23:15',
            ),
            365 => 
            array (
                'id' => 413,
                'presensi_id' => 29,
                'peserta_id' => 6,
                'sign' => '63f59479eca20.png',
                'slug' => 'EUIlYJl0iB99VcMKZCbj',
                'created_at' => '2023-02-22 03:00:36',
                'updated_at' => '2023-02-22 04:05:13',
            ),
            366 => 
            array (
                'id' => 414,
                'presensi_id' => 29,
                'peserta_id' => 9,
                'sign' => '63f58b22460e2.png',
                'slug' => 'pNy1h7O3le5WO0ges9ir',
                'created_at' => '2023-02-22 03:00:47',
                'updated_at' => '2023-02-22 03:25:22',
            ),
            367 => 
            array (
                'id' => 415,
                'presensi_id' => 29,
                'peserta_id' => 10,
                'sign' => '63f58b2edea11.png',
                'slug' => 'OGC4PJMkthnmOdeAHHSy',
                'created_at' => '2023-02-22 03:00:57',
                'updated_at' => '2023-02-22 03:25:34',
            ),
            368 => 
            array (
                'id' => 416,
                'presensi_id' => 29,
                'peserta_id' => 11,
                'sign' => '63f59b11d5a0e.png',
                'slug' => 'a71srPYwIz4odiJmggev',
                'created_at' => '2023-02-22 03:01:03',
                'updated_at' => '2023-02-22 04:33:21',
            ),
            369 => 
            array (
                'id' => 417,
                'presensi_id' => 29,
                'peserta_id' => 12,
                'sign' => '63f58b3a6b378.png',
                'slug' => 'ByDHxtq5qF7haWW59Y5n',
                'created_at' => '2023-02-22 03:01:09',
                'updated_at' => '2023-02-22 03:25:46',
            ),
            370 => 
            array (
                'id' => 418,
                'presensi_id' => 29,
                'peserta_id' => 107,
                'sign' => '63f59e468b76d.png',
                'slug' => 'ev8n9T0XcDwGzCvkKWBm',
                'created_at' => '2023-02-22 03:01:15',
                'updated_at' => '2023-02-22 04:47:02',
            ),
            371 => 
            array (
                'id' => 419,
                'presensi_id' => 29,
                'peserta_id' => 108,
                'sign' => '63f58e12b5676.png',
                'slug' => 'kX1bkpo3LvrgJZOG7PTE',
                'created_at' => '2023-02-22 03:01:21',
                'updated_at' => '2023-02-22 03:37:54',
            ),
            372 => 
            array (
                'id' => 420,
                'presensi_id' => 29,
                'peserta_id' => 109,
                'sign' => '63f5a976713e3.png',
                'slug' => 'RjCe1FBbJ9qcyYMRxqzG',
                'created_at' => '2023-02-22 03:01:29',
                'updated_at' => '2023-02-22 05:34:46',
            ),
            373 => 
            array (
                'id' => 421,
                'presensi_id' => 29,
                'peserta_id' => 21,
                'sign' => '63f58b8cc6143.png',
                'slug' => 'xzt75lD2UrLEMGTDRdzw',
                'created_at' => '2023-02-22 03:01:38',
                'updated_at' => '2023-02-22 03:27:08',
            ),
            374 => 
            array (
                'id' => 422,
                'presensi_id' => 29,
                'peserta_id' => 22,
                'sign' => '63f5900450cb2.png',
                'slug' => 'Q7eAckritxlUCz8i3oGC',
                'created_at' => '2023-02-22 03:01:43',
                'updated_at' => '2023-02-22 03:46:12',
            ),
            375 => 
            array (
                'id' => 423,
                'presensi_id' => 29,
                'peserta_id' => 99,
                'sign' => '63f5915866f18.png',
                'slug' => 'EljAS5gXFAMQ68Y24yZH',
                'created_at' => '2023-02-22 03:01:56',
                'updated_at' => '2023-02-22 03:51:52',
            ),
            376 => 
            array (
                'id' => 424,
                'presensi_id' => 29,
                'peserta_id' => 113,
                'sign' => '63f58c941fb4e.png',
                'slug' => 'MWh9moXtcLyyL86V4ZD7',
                'created_at' => '2023-02-22 03:02:16',
                'updated_at' => '2023-02-22 03:31:32',
            ),
            377 => 
            array (
                'id' => 425,
                'presensi_id' => 29,
                'peserta_id' => 105,
                'sign' => '63f58cb494cef.png',
                'slug' => 'KJbVWEDCrPsZ4Jt5Lj7Y',
                'created_at' => '2023-02-22 03:02:37',
                'updated_at' => '2023-02-22 03:32:04',
            ),
            378 => 
            array (
                'id' => 426,
                'presensi_id' => 29,
                'peserta_id' => 17,
                'sign' => '63f5a30a3f62f.png',
                'slug' => 'h5MH0lsRda2pk6pIGJQy',
                'created_at' => '2023-02-22 03:02:42',
                'updated_at' => '2023-02-22 05:07:22',
            ),
            379 => 
            array (
                'id' => 427,
                'presensi_id' => 29,
                'peserta_id' => 52,
                'sign' => '63f58c916c92d.png',
                'slug' => '881lGuxyiKnpaKMYRcxq',
                'created_at' => '2023-02-22 03:04:38',
                'updated_at' => '2023-02-22 03:31:29',
            ),
            380 => 
            array (
                'id' => 428,
                'presensi_id' => 29,
                'peserta_id' => 3,
                'sign' => NULL,
                'slug' => 'iMbR2QEsLTOeLp9PBGJf',
                'created_at' => '2023-02-22 03:05:50',
                'updated_at' => '2023-02-22 03:05:50',
            ),
            381 => 
            array (
                'id' => 429,
                'presensi_id' => 29,
                'peserta_id' => 27,
                'sign' => NULL,
                'slug' => 'Dmewnm1tn4G2nRBnmvFu',
                'created_at' => '2023-02-22 03:05:57',
                'updated_at' => '2023-02-22 03:05:57',
            ),
            382 => 
            array (
                'id' => 430,
                'presensi_id' => 29,
                'peserta_id' => 14,
                'sign' => NULL,
                'slug' => 'wHBZ1GFhkj1CejzSeYhp',
                'created_at' => '2023-02-22 03:06:05',
                'updated_at' => '2023-02-22 03:06:05',
            ),
            383 => 
            array (
                'id' => 431,
                'presensi_id' => 29,
                'peserta_id' => 39,
                'sign' => NULL,
                'slug' => 'IJpEFe1UGY2ik35Y9HFV',
                'created_at' => '2023-02-22 03:06:12',
                'updated_at' => '2023-02-22 03:06:12',
            ),
            384 => 
            array (
                'id' => 432,
                'presensi_id' => 29,
                'peserta_id' => 18,
                'sign' => '63f6ae7b7edc2.png',
                'slug' => 'k8rV1gk3fzbKbD9Muj9k',
                'created_at' => '2023-02-22 03:06:33',
                'updated_at' => '2023-02-23 00:08:27',
            ),
            385 => 
            array (
                'id' => 433,
                'presensi_id' => 29,
                'peserta_id' => 40,
                'sign' => '63f58c69cd53a.png',
                'slug' => 'aFChowdnCh37VhKMGiyv',
                'created_at' => '2023-02-22 03:06:38',
                'updated_at' => '2023-02-22 03:30:49',
            ),
            386 => 
            array (
                'id' => 434,
                'presensi_id' => 29,
                'peserta_id' => 103,
                'sign' => '63f58d5f34262.png',
                'slug' => 'cUkgq3Zm2icZ2SE7xFJ4',
                'created_at' => '2023-02-22 03:06:43',
                'updated_at' => '2023-02-22 03:34:55',
            ),
            387 => 
            array (
                'id' => 435,
                'presensi_id' => 29,
                'peserta_id' => 154,
                'sign' => NULL,
                'slug' => 'rufLw6HJkv6dfdBB68lx',
                'created_at' => '2023-02-22 03:07:50',
                'updated_at' => '2023-02-22 03:07:50',
            ),
            388 => 
            array (
                'id' => 436,
                'presensi_id' => 29,
                'peserta_id' => 155,
                'sign' => NULL,
                'slug' => 'HMy6K9O3J9NWcEXmEqXp',
                'created_at' => '2023-02-22 03:08:29',
                'updated_at' => '2023-02-22 03:08:29',
            ),
            389 => 
            array (
                'id' => 437,
                'presensi_id' => 29,
                'peserta_id' => 156,
                'sign' => NULL,
                'slug' => 'u57vDx4klgBGEONbos2b',
                'created_at' => '2023-02-22 03:10:29',
                'updated_at' => '2023-02-22 03:10:29',
            ),
            390 => 
            array (
                'id' => 439,
                'presensi_id' => 30,
                'peserta_id' => 5,
                'sign' => '640819617e014.png',
                'slug' => 'BDvHJyt0aLaMaf3UgDNi',
                'created_at' => '2023-03-08 03:31:25',
                'updated_at' => '2023-03-08 05:13:05',
            ),
            391 => 
            array (
                'id' => 441,
                'presensi_id' => 30,
                'peserta_id' => 9,
                'sign' => '64081945184e4.png',
                'slug' => 'VmyjwT8DFdlAi1G4gGIH',
                'created_at' => '2023-03-08 03:31:45',
                'updated_at' => '2023-03-08 05:12:37',
            ),
            392 => 
            array (
                'id' => 442,
                'presensi_id' => 30,
                'peserta_id' => 159,
                'sign' => '64081c551b902.png',
                'slug' => 'rbOkeGTrRMbIks6WrHka',
                'created_at' => '2023-03-08 03:33:09',
                'updated_at' => '2023-03-08 05:25:41',
            ),
            393 => 
            array (
                'id' => 443,
                'presensi_id' => 30,
                'peserta_id' => 21,
                'sign' => '640816a5d2753.png',
                'slug' => 'V2ZDGStqkx3R0j1BBoU0',
                'created_at' => '2023-03-08 03:34:05',
                'updated_at' => '2023-03-08 05:01:25',
            ),
            394 => 
            array (
                'id' => 444,
                'presensi_id' => 30,
                'peserta_id' => 10,
                'sign' => '64081a111d6be.png',
                'slug' => '6EIJl4xAKn8WmtwzTy6g',
                'created_at' => '2023-03-08 03:34:10',
                'updated_at' => '2023-03-08 05:16:01',
            ),
            395 => 
            array (
                'id' => 445,
                'presensi_id' => 30,
                'peserta_id' => 11,
                'sign' => '640959ee5ba1f.png',
                'slug' => 'ny7K8123J64demONPfv3',
                'created_at' => '2023-03-08 03:34:15',
                'updated_at' => '2023-03-09 04:00:46',
            ),
            396 => 
            array (
                'id' => 446,
                'presensi_id' => 30,
                'peserta_id' => 12,
                'sign' => '64081cfa2a443.png',
                'slug' => 'nbB5Z9KAoEiRXFnyZKQx',
                'created_at' => '2023-03-08 03:34:19',
                'updated_at' => '2023-03-08 05:28:26',
            ),
            397 => 
            array (
                'id' => 447,
                'presensi_id' => 30,
                'peserta_id' => 107,
                'sign' => '640811ab536ea.png',
                'slug' => 'aKiADXJUrWx29yrRcs7T',
                'created_at' => '2023-03-08 03:34:24',
                'updated_at' => '2023-03-08 04:40:11',
            ),
            398 => 
            array (
                'id' => 448,
                'presensi_id' => 30,
                'peserta_id' => 108,
                'sign' => '640813a620f1a.png',
                'slug' => 'j9KAPQjnp5oqrFQJ1Pg0',
                'created_at' => '2023-03-08 03:34:28',
                'updated_at' => '2023-03-08 04:48:38',
            ),
            399 => 
            array (
                'id' => 449,
                'presensi_id' => 30,
                'peserta_id' => 109,
                'sign' => '640815b84fc7a.png',
                'slug' => 'HUEhWFdrCeRrlyNc8rlt',
                'created_at' => '2023-03-08 03:34:33',
                'updated_at' => '2023-03-08 04:57:28',
            ),
            400 => 
            array (
                'id' => 450,
                'presensi_id' => 30,
                'peserta_id' => 106,
                'sign' => '640819db77ff0.png',
                'slug' => '4HbtLjoi1M2xVnFX12du',
                'created_at' => '2023-03-08 03:34:38',
                'updated_at' => '2023-03-08 05:15:07',
            ),
            401 => 
            array (
                'id' => 451,
                'presensi_id' => 30,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'sYUxZDO2riLwdLWfVBL7',
                'created_at' => '2023-03-08 03:34:44',
                'updated_at' => '2023-03-08 03:34:44',
            ),
            402 => 
            array (
                'id' => 452,
                'presensi_id' => 30,
                'peserta_id' => 111,
                'sign' => '64082a852b1a6.png',
                'slug' => 'Wok2VqWj27LYEEWqFrHm',
                'created_at' => '2023-03-08 03:34:51',
                'updated_at' => '2023-03-08 06:26:13',
            ),
            403 => 
            array (
                'id' => 453,
                'presensi_id' => 30,
                'peserta_id' => 38,
                'sign' => '640838552f28c.png',
                'slug' => 'Uhehwk431M7whGOMg164',
                'created_at' => '2023-03-08 05:16:03',
                'updated_at' => '2023-03-08 07:25:09',
            ),
            404 => 
            array (
                'id' => 454,
                'presensi_id' => 31,
                'peserta_id' => 5,
                'sign' => '64096aff053cc.png',
                'slug' => 'BMrMf8MxjXNR6d3PxSvM',
                'created_at' => '2023-03-09 04:48:56',
                'updated_at' => '2023-03-09 05:13:35',
            ),
            405 => 
            array (
                'id' => 455,
                'presensi_id' => 31,
                'peserta_id' => 6,
                'sign' => '6409c26c037f9.png',
                'slug' => 'Ij0XVQ0YFxPXRypPz0VG',
                'created_at' => '2023-03-09 04:53:11',
                'updated_at' => '2023-03-09 11:26:36',
            ),
            406 => 
            array (
                'id' => 456,
                'presensi_id' => 31,
                'peserta_id' => 9,
                'sign' => '64096b9969c0e.png',
                'slug' => 'JteU6QDDgNyfKWTLuWCx',
                'created_at' => '2023-03-09 04:53:16',
                'updated_at' => '2023-03-09 05:16:09',
            ),
            407 => 
            array (
                'id' => 457,
                'presensi_id' => 31,
                'peserta_id' => 159,
                'sign' => '64098044a8b23.png',
                'slug' => 'rXOZJWG24L7X1LGJJKK4',
                'created_at' => '2023-03-09 04:53:22',
                'updated_at' => '2023-03-09 06:44:20',
            ),
            408 => 
            array (
                'id' => 458,
                'presensi_id' => 31,
                'peserta_id' => 10,
                'sign' => '64096cae8a69b.png',
                'slug' => 'Y4tTv9lf2M62hFIet3hU',
                'created_at' => '2023-03-09 04:53:27',
                'updated_at' => '2023-03-09 05:20:46',
            ),
            409 => 
            array (
                'id' => 459,
                'presensi_id' => 31,
                'peserta_id' => 11,
                'sign' => '640977d51874b.png',
                'slug' => 'gRBHTtKXVKqLU1o4LlG8',
                'created_at' => '2023-03-09 04:53:35',
                'updated_at' => '2023-03-09 06:08:21',
            ),
            410 => 
            array (
                'id' => 460,
                'presensi_id' => 31,
                'peserta_id' => 12,
                'sign' => '6409725215d8e.png',
                'slug' => 's16cG4VFUxPwH1houHUB',
                'created_at' => '2023-03-09 04:53:42',
                'updated_at' => '2023-03-09 05:44:50',
            ),
            411 => 
            array (
                'id' => 461,
                'presensi_id' => 31,
                'peserta_id' => 107,
                'sign' => '640974fa880de.png',
                'slug' => 'PMa3fHaeNeZaMx6p5xWn',
                'created_at' => '2023-03-09 04:53:55',
                'updated_at' => '2023-03-09 05:56:10',
            ),
            412 => 
            array (
                'id' => 462,
                'presensi_id' => 31,
                'peserta_id' => 108,
                'sign' => '6409799a2353d.png',
                'slug' => 'wFkzTlr7B7ofwmoiwFtP',
                'created_at' => '2023-03-09 04:54:01',
                'updated_at' => '2023-03-09 06:15:54',
            ),
            413 => 
            array (
                'id' => 463,
                'presensi_id' => 31,
                'peserta_id' => 109,
                'sign' => '640979f7cfb0e.png',
                'slug' => 'NbeDewQlVwAJX4OINXYd',
                'created_at' => '2023-03-09 04:54:07',
                'updated_at' => '2023-03-09 06:17:27',
            ),
            414 => 
            array (
                'id' => 464,
                'presensi_id' => 31,
                'peserta_id' => 21,
                'sign' => '64097af72e06f.png',
                'slug' => 'C1TvpbqrAm8bAY7557ER',
                'created_at' => '2023-03-09 04:54:14',
                'updated_at' => '2023-03-09 06:21:43',
            ),
            415 => 
            array (
                'id' => 465,
                'presensi_id' => 31,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'aHsAzYzv3zikeriOkmc8',
                'created_at' => '2023-03-09 04:54:20',
                'updated_at' => '2023-03-09 04:54:20',
            ),
            416 => 
            array (
                'id' => 466,
                'presensi_id' => 31,
                'peserta_id' => 99,
                'sign' => '6409800f5ab63.png',
                'slug' => '5Vp7Ph1vjP4y16ythe0n',
                'created_at' => '2023-03-09 04:54:26',
                'updated_at' => '2023-03-09 06:43:27',
            ),
            417 => 
            array (
                'id' => 467,
                'presensi_id' => 31,
                'peserta_id' => 113,
                'sign' => '640986579bd10.png',
                'slug' => 'rQghJvub6dLKcfZMy20i',
                'created_at' => '2023-03-09 04:54:31',
                'updated_at' => '2023-03-09 07:10:15',
            ),
            418 => 
            array (
                'id' => 468,
                'presensi_id' => 31,
                'peserta_id' => 160,
                'sign' => '6409813ba9896.png',
                'slug' => 'yAoCCyOa8AgCvtbF73oB',
                'created_at' => '2023-03-09 04:55:30',
                'updated_at' => '2023-03-09 06:48:27',
            ),
            419 => 
            array (
                'id' => 469,
                'presensi_id' => 32,
                'peserta_id' => 5,
                'sign' => '64096b1a13555.png',
                'slug' => 'KBNHc3gKNdBujHBv9be0',
                'created_at' => '2023-03-09 04:58:28',
                'updated_at' => '2023-03-09 05:14:02',
            ),
            420 => 
            array (
                'id' => 470,
                'presensi_id' => 32,
                'peserta_id' => 6,
                'sign' => '6409c27cb6ee3.png',
                'slug' => 'IIkVDna8AwyJXAI3gJhA',
                'created_at' => '2023-03-09 04:58:37',
                'updated_at' => '2023-03-09 11:26:52',
            ),
            421 => 
            array (
                'id' => 471,
                'presensi_id' => 32,
                'peserta_id' => 9,
                'sign' => '64097e52e5fb3.png',
                'slug' => '5rCArJCSlky6eAZUjx90',
                'created_at' => '2023-03-09 04:58:42',
                'updated_at' => '2023-03-09 06:36:02',
            ),
            422 => 
            array (
                'id' => 472,
                'presensi_id' => 32,
                'peserta_id' => 10,
                'sign' => '64097b5f2331c.png',
                'slug' => 'p01zqK5Vj3aG8abJqjTq',
                'created_at' => '2023-03-09 04:58:52',
                'updated_at' => '2023-03-09 06:23:27',
            ),
            423 => 
            array (
                'id' => 473,
                'presensi_id' => 32,
                'peserta_id' => 11,
                'sign' => '640977e197f56.png',
                'slug' => 'uP5gjHUP8U8OqbtiOmhy',
                'created_at' => '2023-03-09 04:58:56',
                'updated_at' => '2023-03-09 06:08:33',
            ),
            424 => 
            array (
                'id' => 474,
                'presensi_id' => 32,
                'peserta_id' => 12,
                'sign' => '640972666c27e.png',
                'slug' => 'oe1YAz1weHjqyIzkGYrP',
                'created_at' => '2023-03-09 04:59:01',
                'updated_at' => '2023-03-09 05:45:10',
            ),
            425 => 
            array (
                'id' => 475,
                'presensi_id' => 32,
                'peserta_id' => 107,
                'sign' => '640973190c2bb.png',
                'slug' => 'bIWxyZyxHJ4HN5mqXMWx',
                'created_at' => '2023-03-09 04:59:06',
                'updated_at' => '2023-03-09 05:48:09',
            ),
            426 => 
            array (
                'id' => 476,
                'presensi_id' => 32,
                'peserta_id' => 108,
                'sign' => '6409793fb2be9.png',
                'slug' => 'MuopYCAXwztbQTjDqfXh',
                'created_at' => '2023-03-09 04:59:14',
                'updated_at' => '2023-03-09 06:14:23',
            ),
            427 => 
            array (
                'id' => 477,
                'presensi_id' => 32,
                'peserta_id' => 109,
                'sign' => '64097a00f01a6.png',
                'slug' => 'fCR1WRl4z16RTTUpxBGQ',
                'created_at' => '2023-03-09 04:59:19',
                'updated_at' => '2023-03-09 06:17:36',
            ),
            428 => 
            array (
                'id' => 478,
                'presensi_id' => 32,
                'peserta_id' => 159,
                'sign' => '64097f4ce8fff.png',
                'slug' => 'zZoUJbgkimsjNCBeKKDc',
                'created_at' => '2023-03-09 04:59:26',
                'updated_at' => '2023-03-09 06:40:12',
            ),
            429 => 
            array (
                'id' => 479,
                'presensi_id' => 32,
                'peserta_id' => 21,
                'sign' => '64097b01c2e4c.png',
                'slug' => 'krRu8ArT8qrtjowRLUjk',
                'created_at' => '2023-03-09 04:59:37',
                'updated_at' => '2023-03-09 06:21:53',
            ),
            430 => 
            array (
                'id' => 480,
                'presensi_id' => 32,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'DX1Fv4gNLOErl23ycdqT',
                'created_at' => '2023-03-09 04:59:42',
                'updated_at' => '2023-03-09 04:59:42',
            ),
            431 => 
            array (
                'id' => 481,
                'presensi_id' => 32,
                'peserta_id' => 38,
                'sign' => '640984faaece6.png',
                'slug' => 'PXT2vCiI3nN877HQGaON',
                'created_at' => '2023-03-09 04:59:49',
                'updated_at' => '2023-03-09 07:04:26',
            ),
            432 => 
            array (
                'id' => 482,
                'presensi_id' => 32,
                'peserta_id' => 40,
                'sign' => '64097caab2a4d.png',
                'slug' => '9VnHI6ciT8cmb8eDFg8X',
                'created_at' => '2023-03-09 04:59:54',
                'updated_at' => '2023-03-09 06:28:58',
            ),
            433 => 
            array (
                'id' => 483,
                'presensi_id' => 32,
                'peserta_id' => 47,
                'sign' => '640980a471bc0.png',
                'slug' => 'dKLRCWO2OROCiQEO2cSP',
                'created_at' => '2023-03-09 04:59:59',
                'updated_at' => '2023-03-09 06:45:56',
            ),
            434 => 
            array (
                'id' => 484,
                'presensi_id' => 32,
                'peserta_id' => 48,
                'sign' => '640984f6ebecf.png',
                'slug' => 'zwz2h17OMPkixQTQYykq',
                'created_at' => '2023-03-09 05:00:05',
                'updated_at' => '2023-03-09 07:04:22',
            ),
            435 => 
            array (
                'id' => 485,
                'presensi_id' => 32,
                'peserta_id' => 46,
                'sign' => '64097d33972d1.png',
                'slug' => 'A9uQzOBQwVGigyIoK8yv',
                'created_at' => '2023-03-09 05:00:13',
                'updated_at' => '2023-03-09 06:31:15',
            ),
            436 => 
            array (
                'id' => 486,
                'presensi_id' => 32,
                'peserta_id' => 49,
                'sign' => '64097d5b33c5d.png',
                'slug' => 'UH1rIHhieOS26nFXkIkL',
                'created_at' => '2023-03-09 05:00:18',
                'updated_at' => '2023-03-09 06:31:55',
            ),
            437 => 
            array (
                'id' => 488,
                'presensi_id' => 32,
                'peserta_id' => 160,
                'sign' => '6409814e1b5a7.png',
                'slug' => 'JYl4pH4iz1NLTeb7GzWs',
                'created_at' => '2023-03-09 06:33:32',
                'updated_at' => '2023-03-09 06:48:46',
            ),
            438 => 
            array (
                'id' => 489,
                'presensi_id' => 33,
                'peserta_id' => 5,
                'sign' => '640e947bb4d6c.png',
                'slug' => 'DfXVd6D4sCFnJt1FTfdR',
                'created_at' => '2023-03-13 03:06:09',
                'updated_at' => '2023-03-13 03:11:55',
            ),
            439 => 
            array (
                'id' => 490,
                'presensi_id' => 33,
                'peserta_id' => 6,
                'sign' => '640f1cd4bb5aa.png',
                'slug' => 'KE0kyc0WN8oUmMurQeQ1',
                'created_at' => '2023-03-13 03:06:18',
                'updated_at' => '2023-03-13 12:53:40',
            ),
            440 => 
            array (
                'id' => 491,
                'presensi_id' => 33,
                'peserta_id' => 9,
                'sign' => '640e945eb4499.png',
                'slug' => 'CxBFbqZ9TNNhCKFTKEMh',
                'created_at' => '2023-03-13 03:06:24',
                'updated_at' => '2023-03-13 03:11:26',
            ),
            441 => 
            array (
                'id' => 492,
                'presensi_id' => 33,
                'peserta_id' => 10,
                'sign' => '640f00c01d7b1.png',
                'slug' => 'fjy2hgKP4f6A1up6LWqo',
                'created_at' => '2023-03-13 03:06:32',
                'updated_at' => '2023-03-13 10:53:52',
            ),
            442 => 
            array (
                'id' => 493,
                'presensi_id' => 33,
                'peserta_id' => 11,
                'sign' => '640eadaedd852.png',
                'slug' => 'B3CceDG4tCIscByhEaIx',
                'created_at' => '2023-03-13 03:06:39',
                'updated_at' => '2023-03-13 04:59:26',
            ),
            443 => 
            array (
                'id' => 494,
                'presensi_id' => 33,
                'peserta_id' => 12,
                'sign' => '640e95d678022.png',
                'slug' => 'dtm0qL9zrYuRjYBhcrS8',
                'created_at' => '2023-03-13 03:06:57',
                'updated_at' => '2023-03-13 03:17:42',
            ),
            444 => 
            array (
                'id' => 495,
                'presensi_id' => 33,
                'peserta_id' => 107,
                'sign' => '640e94bd93222.png',
                'slug' => 'ndE9CdaHqjxoMGrLphTu',
                'created_at' => '2023-03-13 03:07:06',
                'updated_at' => '2023-03-13 03:13:01',
            ),
            445 => 
            array (
                'id' => 496,
                'presensi_id' => 33,
                'peserta_id' => 108,
                'sign' => '640e9767763c7.png',
                'slug' => 'PkMCJa4M72Cy0FCz1W4f',
                'created_at' => '2023-03-13 03:08:21',
                'updated_at' => '2023-03-13 03:24:23',
            ),
            446 => 
            array (
                'id' => 497,
                'presensi_id' => 33,
                'peserta_id' => 109,
                'sign' => '640e9595d2ffe.png',
                'slug' => 'pKv9IJbCv5fp4pU6AGIM',
                'created_at' => '2023-03-13 03:08:29',
                'updated_at' => '2023-03-13 03:16:37',
            ),
            447 => 
            array (
                'id' => 498,
                'presensi_id' => 33,
                'peserta_id' => 159,
                'sign' => '640e952f37888.png',
                'slug' => 'GQ6K1trr2Zaf0HB6oGJl',
                'created_at' => '2023-03-13 03:08:38',
                'updated_at' => '2023-03-13 03:14:55',
            ),
            448 => 
            array (
                'id' => 499,
                'presensi_id' => 33,
                'peserta_id' => 21,
                'sign' => '640e959b48c3f.png',
                'slug' => 'DzEtAUhlyOZRxulHFJnm',
                'created_at' => '2023-03-13 03:08:49',
                'updated_at' => '2023-03-13 03:16:43',
            ),
            449 => 
            array (
                'id' => 500,
                'presensi_id' => 33,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '1WdBd8CMCVgjQPBGIqOs',
                'created_at' => '2023-03-13 03:08:58',
                'updated_at' => '2023-03-13 03:08:58',
            ),
            450 => 
            array (
                'id' => 501,
                'presensi_id' => 33,
                'peserta_id' => 105,
                'sign' => '640e955614f02.png',
                'slug' => 'CfsZEyBosbDUdYGLSxsv',
                'created_at' => '2023-03-13 03:09:06',
                'updated_at' => '2023-03-13 03:15:34',
            ),
            451 => 
            array (
                'id' => 502,
                'presensi_id' => 33,
                'peserta_id' => 17,
                'sign' => NULL,
                'slug' => 'PYP7vml2tsObQyXJq9bE',
                'created_at' => '2023-03-13 03:09:13',
                'updated_at' => '2023-03-13 03:09:13',
            ),
            452 => 
            array (
                'id' => 503,
                'presensi_id' => 34,
                'peserta_id' => 5,
                'sign' => '6424e6b5db1c8.png',
                'slug' => 'nYSjOsP1JW3B0xWhD0iZ',
                'created_at' => '2023-03-30 01:25:12',
                'updated_at' => '2023-03-30 01:32:37',
            ),
            453 => 
            array (
                'id' => 504,
                'presensi_id' => 34,
                'peserta_id' => 9,
                'sign' => '6424eb1155276.png',
                'slug' => '9z6dOFzOVGPW6hQXaJOh',
                'created_at' => '2023-03-30 01:26:31',
                'updated_at' => '2023-03-30 01:51:13',
            ),
            454 => 
            array (
                'id' => 505,
                'presensi_id' => 34,
                'peserta_id' => 6,
                'sign' => '6424eaa575f73.png',
                'slug' => 'PwSmoU7xSyxK5j9oJueQ',
                'created_at' => '2023-03-30 01:26:54',
                'updated_at' => '2023-03-30 01:49:25',
            ),
            455 => 
            array (
                'id' => 506,
                'presensi_id' => 34,
                'peserta_id' => 159,
                'sign' => '6424ec076c0f5.png',
                'slug' => 'fBnIp8Hq0hjamelGQQ50',
                'created_at' => '2023-03-30 01:27:00',
                'updated_at' => '2023-03-30 01:55:19',
            ),
            456 => 
            array (
                'id' => 507,
                'presensi_id' => 34,
                'peserta_id' => 10,
                'sign' => '6424f556cad6a.png',
                'slug' => 'jiTGu0Z3jNBfRH0TbM89',
                'created_at' => '2023-03-30 01:27:11',
                'updated_at' => '2023-03-30 02:35:02',
            ),
            457 => 
            array (
                'id' => 508,
                'presensi_id' => 34,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => '0gs1CLMtRXE25uofUGAT',
                'created_at' => '2023-03-30 01:27:16',
                'updated_at' => '2023-03-30 01:27:16',
            ),
            458 => 
            array (
                'id' => 509,
                'presensi_id' => 34,
                'peserta_id' => 12,
                'sign' => '6424eb8d6370e.png',
                'slug' => 'jov4wKYbyKbX84McUDPm',
                'created_at' => '2023-03-30 01:27:21',
                'updated_at' => '2023-03-30 01:53:17',
            ),
            459 => 
            array (
                'id' => 510,
                'presensi_id' => 34,
                'peserta_id' => 107,
                'sign' => '6424eb8e776ea.png',
                'slug' => 'AMLPG6gployYUQy3aOES',
                'created_at' => '2023-03-30 01:27:27',
                'updated_at' => '2023-03-30 01:53:18',
            ),
            460 => 
            array (
                'id' => 511,
                'presensi_id' => 34,
                'peserta_id' => 108,
                'sign' => '6424ea134c772.png',
                'slug' => 'qfbNZ8UlkU9c4HoMPjPV',
                'created_at' => '2023-03-30 01:27:33',
                'updated_at' => '2023-03-30 01:46:59',
            ),
            461 => 
            array (
                'id' => 512,
                'presensi_id' => 34,
                'peserta_id' => 109,
                'sign' => '6424ebf8a21f3.png',
                'slug' => 'waJ5oJfHlBH2JnrCIzFO',
                'created_at' => '2023-03-30 01:27:38',
                'updated_at' => '2023-03-30 01:55:04',
            ),
            462 => 
            array (
                'id' => 513,
                'presensi_id' => 34,
                'peserta_id' => 151,
                'sign' => '642520e22d1c9.png',
                'slug' => '4DaYxwWTnKfmGZ6msqGb',
                'created_at' => '2023-03-30 01:27:46',
                'updated_at' => '2023-03-30 05:40:50',
            ),
            463 => 
            array (
                'id' => 514,
                'presensi_id' => 34,
                'peserta_id' => 150,
                'sign' => '642520e194044.png',
                'slug' => 'TRsubrq0oHrkXLdw3pZZ',
                'created_at' => '2023-03-30 01:27:51',
                'updated_at' => '2023-03-30 05:40:49',
            ),
            464 => 
            array (
                'id' => 515,
                'presensi_id' => 34,
                'peserta_id' => 160,
                'sign' => '642520e04a3be.png',
                'slug' => 'B6MDHzyh1rA90IrFpDUc',
                'created_at' => '2023-03-30 01:27:58',
                'updated_at' => '2023-03-30 05:40:48',
            ),
            465 => 
            array (
                'id' => 516,
                'presensi_id' => 34,
                'peserta_id' => 161,
                'sign' => '6424fc946bb32.png',
                'slug' => 'tuAT2uIEDU5YX01QjRZB',
                'created_at' => '2023-03-30 01:30:00',
                'updated_at' => '2023-03-30 03:05:56',
            ),
            466 => 
            array (
                'id' => 517,
                'presensi_id' => 35,
                'peserta_id' => 5,
                'sign' => '6424f21da199d.png',
                'slug' => 'bcziUi8w9BkoLht9YeBh',
                'created_at' => '2023-03-30 02:01:07',
                'updated_at' => '2023-03-30 02:21:17',
            ),
            467 => 
            array (
                'id' => 518,
                'presensi_id' => 35,
                'peserta_id' => 9,
                'sign' => '6424ee7810b02.png',
                'slug' => 'okNNVX7uwujuCZNi81YS',
                'created_at' => '2023-03-30 02:01:44',
                'updated_at' => '2023-03-30 02:05:44',
            ),
            468 => 
            array (
                'id' => 519,
                'presensi_id' => 35,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'vWX8qxgWm0sm95eNUmLV',
                'created_at' => '2023-03-30 02:01:53',
                'updated_at' => '2023-03-30 02:01:53',
            ),
            469 => 
            array (
                'id' => 520,
                'presensi_id' => 35,
                'peserta_id' => 159,
                'sign' => '6424f32973b44.png',
                'slug' => '1UkublMv4zw93Wf0Xw7o',
                'created_at' => '2023-03-30 02:01:57',
                'updated_at' => '2023-03-30 02:25:45',
            ),
            470 => 
            array (
                'id' => 521,
                'presensi_id' => 35,
                'peserta_id' => 10,
                'sign' => '6424f5ef1291a.png',
                'slug' => 'KdNAg3pbSQZCrtRByp2p',
                'created_at' => '2023-03-30 02:02:03',
                'updated_at' => '2023-03-30 02:37:35',
            ),
            471 => 
            array (
                'id' => 522,
                'presensi_id' => 35,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'kj82U66K0j4T0nMjdXUq',
                'created_at' => '2023-03-30 02:02:09',
                'updated_at' => '2023-03-30 02:02:09',
            ),
            472 => 
            array (
                'id' => 523,
                'presensi_id' => 35,
                'peserta_id' => 86,
                'sign' => '6424f89411f32.png',
                'slug' => 'dnLjbXBQNLHfolSOD9Nh',
                'created_at' => '2023-03-30 02:02:21',
                'updated_at' => '2023-03-30 02:48:52',
            ),
            473 => 
            array (
                'id' => 524,
                'presensi_id' => 35,
                'peserta_id' => 12,
                'sign' => '6424f04d29f60.png',
                'slug' => '8SGwgGGGievB4SC4Hjpu',
                'created_at' => '2023-03-30 02:02:26',
                'updated_at' => '2023-03-30 02:13:33',
            ),
            474 => 
            array (
                'id' => 525,
                'presensi_id' => 35,
                'peserta_id' => 107,
                'sign' => '6424efb99dde4.png',
                'slug' => 'kj1e1HDQheDPLUSoomMf',
                'created_at' => '2023-03-30 02:02:33',
                'updated_at' => '2023-03-30 02:11:05',
            ),
            475 => 
            array (
                'id' => 526,
                'presensi_id' => 35,
                'peserta_id' => 108,
                'sign' => '6424f0c475602.png',
                'slug' => 'piP8Te3F9cqfLxlnFJaI',
                'created_at' => '2023-03-30 02:02:39',
                'updated_at' => '2023-03-30 02:15:32',
            ),
            476 => 
            array (
                'id' => 527,
                'presensi_id' => 35,
                'peserta_id' => 109,
                'sign' => '6424f4043833a.png',
                'slug' => 'eAHDibIhssSmnQvIIpvg',
                'created_at' => '2023-03-30 02:02:44',
                'updated_at' => '2023-03-30 02:29:24',
            ),
            477 => 
            array (
                'id' => 528,
                'presensi_id' => 34,
                'peserta_id' => 21,
                'sign' => '6424f667ad5f9.png',
                'slug' => 'FdjOECtWBpjP5s5GpnD7',
                'created_at' => '2023-03-30 02:32:47',
                'updated_at' => '2023-03-30 02:39:35',
            ),
            478 => 
            array (
                'id' => 534,
                'presensi_id' => 37,
                'peserta_id' => 114,
                'sign' => NULL,
                'slug' => 'CKY2QU4dmLLCO9Qfl7tA',
                'created_at' => '2023-04-13 06:11:08',
                'updated_at' => '2023-04-13 06:11:08',
            ),
            479 => 
            array (
                'id' => 535,
                'presensi_id' => 37,
                'peserta_id' => 19,
                'sign' => '6437b7726e710.png',
                'slug' => 'ja1w7DHuT8a7Ws5bUOdg',
                'created_at' => '2023-04-13 06:11:24',
                'updated_at' => '2023-04-13 08:04:02',
            ),
            480 => 
            array (
                'id' => 536,
                'presensi_id' => 37,
                'peserta_id' => 9,
                'sign' => '6437b71b0535a.png',
                'slug' => 'wTumTY2Pw5VgUq4XaZCv',
                'created_at' => '2023-04-13 06:11:36',
                'updated_at' => '2023-04-13 08:02:35',
            ),
            481 => 
            array (
                'id' => 537,
                'presensi_id' => 37,
                'peserta_id' => 16,
                'sign' => '6437b74a6cb9b.png',
                'slug' => 'aHyCfZXReAbNS2NsRqWn',
                'created_at' => '2023-04-13 06:11:43',
                'updated_at' => '2023-04-13 08:03:22',
            ),
            482 => 
            array (
                'id' => 538,
                'presensi_id' => 37,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'zv91tud99KC9v3Ayr1kU',
                'created_at' => '2023-04-13 06:13:01',
                'updated_at' => '2023-04-13 06:13:01',
            ),
            483 => 
            array (
                'id' => 539,
                'presensi_id' => 37,
                'peserta_id' => 24,
                'sign' => NULL,
                'slug' => '2lZWL8K9FfOFKFuiNzZJ',
                'created_at' => '2023-04-13 06:13:12',
                'updated_at' => '2023-04-13 06:13:12',
            ),
            484 => 
            array (
                'id' => 540,
                'presensi_id' => 37,
                'peserta_id' => 62,
                'sign' => NULL,
                'slug' => 'a8D0s76ZtT3mr7zhaXrb',
                'created_at' => '2023-04-13 06:13:18',
                'updated_at' => '2023-04-13 06:13:18',
            ),
            485 => 
            array (
                'id' => 541,
                'presensi_id' => 37,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'gPeLzt1hel3IXnOsApFc',
                'created_at' => '2023-04-13 06:13:30',
                'updated_at' => '2023-04-13 06:13:30',
            ),
            486 => 
            array (
                'id' => 542,
                'presensi_id' => 37,
                'peserta_id' => 33,
                'sign' => '6437b93ec8a36.png',
                'slug' => '9MBolTTCgTitDmCFB9Be',
                'created_at' => '2023-04-13 06:13:40',
                'updated_at' => '2023-04-13 08:11:42',
            ),
            487 => 
            array (
                'id' => 543,
                'presensi_id' => 37,
                'peserta_id' => 20,
                'sign' => NULL,
                'slug' => 'KCl01v0pIxZem53YirgY',
                'created_at' => '2023-04-13 06:13:50',
                'updated_at' => '2023-04-13 06:13:50',
            ),
            488 => 
            array (
                'id' => 544,
                'presensi_id' => 37,
                'peserta_id' => 82,
                'sign' => '6437c33ac795e.png',
                'slug' => 'hSe7O7qRKEk4mWx14XsB',
                'created_at' => '2023-04-13 06:14:09',
                'updated_at' => '2023-04-13 08:54:18',
            ),
            489 => 
            array (
                'id' => 545,
                'presensi_id' => 37,
                'peserta_id' => 13,
                'sign' => NULL,
                'slug' => 'mRwzlV5n3i2ea2BuT9xO',
                'created_at' => '2023-04-13 06:14:25',
                'updated_at' => '2023-04-13 06:14:25',
            ),
            490 => 
            array (
                'id' => 546,
                'presensi_id' => 37,
                'peserta_id' => 4,
                'sign' => NULL,
                'slug' => 'BGZZ6vLbSLDats9q4fap',
                'created_at' => '2023-04-13 06:14:31',
                'updated_at' => '2023-04-13 06:14:31',
            ),
            491 => 
            array (
                'id' => 547,
                'presensi_id' => 37,
                'peserta_id' => 56,
                'sign' => NULL,
                'slug' => 'gNZpGh2gowC3c3uc6ico',
                'created_at' => '2023-04-13 06:14:37',
                'updated_at' => '2023-04-13 06:14:37',
            ),
            492 => 
            array (
                'id' => 548,
                'presensi_id' => 37,
                'peserta_id' => 1,
                'sign' => NULL,
                'slug' => '5RqNcYCLSj9ztEQhWOyh',
                'created_at' => '2023-04-13 06:14:45',
                'updated_at' => '2023-04-13 06:14:45',
            ),
            493 => 
            array (
                'id' => 549,
                'presensi_id' => 37,
                'peserta_id' => 75,
                'sign' => NULL,
                'slug' => 'cOB2yQTZ9SoKsNymMP1s',
                'created_at' => '2023-04-13 06:14:54',
                'updated_at' => '2023-04-13 06:14:54',
            ),
            494 => 
            array (
                'id' => 550,
                'presensi_id' => 37,
                'peserta_id' => 26,
                'sign' => '64f1af7ba4d11.png',
                'slug' => 'CSP8y3hp9VfM0m3y2wnC',
                'created_at' => '2023-04-13 06:15:01',
                'updated_at' => '2023-09-01 09:31:39',
            ),
            495 => 
            array (
                'id' => 551,
                'presensi_id' => 37,
                'peserta_id' => 32,
                'sign' => NULL,
                'slug' => 'V9ZOO38ABJdGZiqnF9ob',
                'created_at' => '2023-04-13 06:15:09',
                'updated_at' => '2023-04-13 06:15:09',
            ),
            496 => 
            array (
                'id' => 552,
                'presensi_id' => 38,
                'peserta_id' => 12,
                'sign' => '644b36033537b.png',
                'slug' => 'fuD7ZB8v9fblNd8GKh2v',
                'created_at' => '2023-04-28 02:51:14',
                'updated_at' => '2023-04-28 02:57:07',
            ),
            497 => 
            array (
                'id' => 553,
                'presensi_id' => 38,
                'peserta_id' => 11,
                'sign' => '644b361b5fe44.png',
                'slug' => 'LPapAggjYlbqgNsTlHcq',
                'created_at' => '2023-04-28 02:51:39',
                'updated_at' => '2023-04-28 02:57:31',
            ),
            498 => 
            array (
                'id' => 554,
                'presensi_id' => 38,
                'peserta_id' => 107,
                'sign' => '644b35a1931b8.png',
                'slug' => 'rxWNaEJQXIa0Y1JFiP3f',
                'created_at' => '2023-04-28 02:51:44',
                'updated_at' => '2023-04-28 02:55:29',
            ),
            499 => 
            array (
                'id' => 555,
                'presensi_id' => 38,
                'peserta_id' => 108,
                'sign' => '644b35ca4c77a.png',
                'slug' => '0ENnFxz4qM2v4AQv1i1s',
                'created_at' => '2023-04-28 02:51:49',
                'updated_at' => '2023-04-28 02:56:10',
            ),
        ));
        \DB::table('kehadirans')->insert(array (
            0 => 
            array (
                'id' => 556,
                'presensi_id' => 38,
                'peserta_id' => 109,
                'sign' => '644b477e6ee86.png',
                'slug' => '9zC3uLWQhjRBDDCIihFv',
                'created_at' => '2023-04-28 02:52:10',
                'updated_at' => '2023-04-28 04:11:42',
            ),
            1 => 
            array (
                'id' => 557,
                'presensi_id' => 39,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => '52MQOhQWexjCXROVpGR0',
                'created_at' => '2023-04-28 02:53:20',
                'updated_at' => '2023-04-28 02:53:20',
            ),
            2 => 
            array (
                'id' => 558,
                'presensi_id' => 39,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => '9abWwR7KfzG6f2ZHITOV',
                'created_at' => '2023-04-28 02:58:09',
                'updated_at' => '2023-04-28 02:58:09',
            ),
            3 => 
            array (
                'id' => 559,
                'presensi_id' => 39,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'qZhImqHQoWjj4gQl1Z8q',
                'created_at' => '2023-04-28 02:58:14',
                'updated_at' => '2023-04-28 02:58:14',
            ),
            4 => 
            array (
                'id' => 560,
                'presensi_id' => 39,
                'peserta_id' => 159,
                'sign' => NULL,
                'slug' => 'r8Wgp86tkJHxd9DSMXTJ',
                'created_at' => '2023-04-28 02:58:19',
                'updated_at' => '2023-04-28 02:58:19',
            ),
            5 => 
            array (
                'id' => 561,
                'presensi_id' => 39,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'ZNtscB0YHuixFep8ny5P',
                'created_at' => '2023-04-28 02:58:25',
                'updated_at' => '2023-04-28 02:58:25',
            ),
            6 => 
            array (
                'id' => 562,
                'presensi_id' => 39,
                'peserta_id' => 86,
                'sign' => NULL,
                'slug' => 'xHjx5nAlM5zsgBP1FkJa',
                'created_at' => '2023-04-28 02:58:31',
                'updated_at' => '2023-04-28 02:58:31',
            ),
            7 => 
            array (
                'id' => 563,
                'presensi_id' => 39,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'WUZpStbkPX3GIcGSJqL4',
                'created_at' => '2023-04-28 02:58:36',
                'updated_at' => '2023-04-28 02:58:36',
            ),
            8 => 
            array (
                'id' => 564,
                'presensi_id' => 39,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => 'Pi5hnD2fo8SNx2VVz0jQ',
                'created_at' => '2023-04-28 02:59:02',
                'updated_at' => '2023-04-28 02:59:02',
            ),
            9 => 
            array (
                'id' => 565,
                'presensi_id' => 39,
                'peserta_id' => 107,
                'sign' => '644b36b6a01e2.png',
                'slug' => '7W3EMDm6f3jZ8a1xan5e',
                'created_at' => '2023-04-28 02:59:07',
                'updated_at' => '2023-04-28 03:00:06',
            ),
            10 => 
            array (
                'id' => 566,
                'presensi_id' => 39,
                'peserta_id' => 108,
                'sign' => '644b36a56e6ca.png',
                'slug' => 'rMtHV5mwFXrgnn9aZIrY',
                'created_at' => '2023-04-28 02:59:12',
                'updated_at' => '2023-04-28 02:59:49',
            ),
            11 => 
            array (
                'id' => 567,
                'presensi_id' => 39,
                'peserta_id' => 109,
                'sign' => '644b4787e4198.png',
                'slug' => 'dbtMKuilm12HLTCMixCu',
                'created_at' => '2023-04-28 02:59:18',
                'updated_at' => '2023-04-28 04:11:51',
            ),
            12 => 
            array (
                'id' => 568,
                'presensi_id' => 40,
                'peserta_id' => 5,
                'sign' => '64631c3914620.png',
                'slug' => 'KErEtW1wFPKKJRfrhBDE',
                'created_at' => '2023-05-16 04:35:36',
                'updated_at' => '2023-05-16 06:01:29',
            ),
            13 => 
            array (
                'id' => 569,
                'presensi_id' => 40,
                'peserta_id' => 6,
                'sign' => '646330ac7621b.png',
                'slug' => 'lSFrEdCW0kdLRBsWm9z9',
                'created_at' => '2023-05-16 04:36:13',
                'updated_at' => '2023-05-16 07:28:44',
            ),
            14 => 
            array (
                'id' => 570,
                'presensi_id' => 40,
                'peserta_id' => 9,
                'sign' => '64631149be852.png',
                'slug' => 'gVKUJHAD8BOja9a3K5yx',
                'created_at' => '2023-05-16 04:36:17',
                'updated_at' => '2023-05-16 05:14:49',
            ),
            15 => 
            array (
                'id' => 571,
                'presensi_id' => 40,
                'peserta_id' => 159,
                'sign' => '646313f6d9ca0.png',
                'slug' => 'FZJhTa1clNqyxxciHy0N',
                'created_at' => '2023-05-16 04:36:23',
                'updated_at' => '2023-05-16 05:26:14',
            ),
            16 => 
            array (
                'id' => 572,
                'presensi_id' => 40,
                'peserta_id' => 10,
                'sign' => '64631dccf23d1.png',
                'slug' => '9Pr49EYs0dMVJtddOHA3',
                'created_at' => '2023-05-16 04:36:28',
                'updated_at' => '2023-05-16 06:08:12',
            ),
            17 => 
            array (
                'id' => 573,
                'presensi_id' => 40,
                'peserta_id' => 11,
                'sign' => '6466f5ebb12d4.png',
                'slug' => '4cd42IRvKdsP4mBTQJzr',
                'created_at' => '2023-05-16 04:36:33',
                'updated_at' => '2023-05-19 04:07:07',
            ),
            18 => 
            array (
                'id' => 574,
                'presensi_id' => 40,
                'peserta_id' => 12,
                'sign' => '646312bf747dc.png',
                'slug' => 'es2khBMNSaCanvFojEbs',
                'created_at' => '2023-05-16 04:36:37',
                'updated_at' => '2023-05-16 05:21:03',
            ),
            19 => 
            array (
                'id' => 575,
                'presensi_id' => 40,
                'peserta_id' => 107,
                'sign' => '646314204b870.png',
                'slug' => 'BMiq7lPQHGRfUwSaI3K3',
                'created_at' => '2023-05-16 04:36:41',
                'updated_at' => '2023-05-16 05:26:56',
            ),
            20 => 
            array (
                'id' => 576,
                'presensi_id' => 40,
                'peserta_id' => 108,
                'sign' => '6463298650814.png',
                'slug' => 'hpMUaSfezk981IPagHtM',
                'created_at' => '2023-05-16 04:36:45',
                'updated_at' => '2023-05-16 06:58:14',
            ),
            21 => 
            array (
                'id' => 577,
                'presensi_id' => 40,
                'peserta_id' => 109,
                'sign' => '64631668bef9c.png',
                'slug' => 'RnIP6ajhW9XdyucsxzXK',
                'created_at' => '2023-05-16 04:36:50',
                'updated_at' => '2023-05-16 05:36:40',
            ),
            22 => 
            array (
                'id' => 578,
                'presensi_id' => 40,
                'peserta_id' => 21,
                'sign' => '64631a873080a.png',
                'slug' => 'BBX98clTz1pSEtC27FJF',
                'created_at' => '2023-05-16 04:36:56',
                'updated_at' => '2023-05-16 05:54:15',
            ),
            23 => 
            array (
                'id' => 579,
                'presensi_id' => 40,
                'peserta_id' => 22,
                'sign' => '6466f65f518c8.png',
                'slug' => 'NPhqZxvKR2Kd0Kj8Ucq6',
                'created_at' => '2023-05-16 04:37:00',
                'updated_at' => '2023-05-19 04:09:03',
            ),
            24 => 
            array (
                'id' => 580,
                'presensi_id' => 40,
                'peserta_id' => 111,
                'sign' => '6463145b5243d.png',
                'slug' => 'gFsWH2kPcf4NAHP2xY0q',
                'created_at' => '2023-05-16 04:37:06',
                'updated_at' => '2023-05-16 05:27:55',
            ),
            25 => 
            array (
                'id' => 581,
                'presensi_id' => 40,
                'peserta_id' => 106,
                'sign' => '646327256da14.png',
                'slug' => '7SXK9CZGqxz8YgugKque',
                'created_at' => '2023-05-16 04:37:11',
                'updated_at' => '2023-05-16 06:48:05',
            ),
            26 => 
            array (
                'id' => 582,
                'presensi_id' => 41,
                'peserta_id' => 5,
                'sign' => '6466fcb5634bd.png',
                'slug' => 'i50roOacQNMx4WhRkgBG',
                'created_at' => '2023-05-19 04:03:06',
                'updated_at' => '2023-05-19 04:36:05',
            ),
            27 => 
            array (
                'id' => 583,
                'presensi_id' => 41,
                'peserta_id' => 6,
                'sign' => '6466fb74b9b52.png',
                'slug' => '0qDQdKnpoDFiOyueTkQS',
                'created_at' => '2023-05-19 04:03:17',
                'updated_at' => '2023-05-19 04:30:44',
            ),
            28 => 
            array (
                'id' => 584,
                'presensi_id' => 41,
                'peserta_id' => 9,
                'sign' => '6467074b650ed.png',
                'slug' => 'mN24eSNLfUQuM8AuV5E1',
                'created_at' => '2023-05-19 04:03:21',
                'updated_at' => '2023-05-19 05:21:15',
            ),
            29 => 
            array (
                'id' => 585,
                'presensi_id' => 41,
                'peserta_id' => 159,
                'sign' => '6466fa4767dfd.png',
                'slug' => 'EperO86xXDlnBB2l7buJ',
                'created_at' => '2023-05-19 04:03:33',
                'updated_at' => '2023-05-19 04:25:43',
            ),
            30 => 
            array (
                'id' => 586,
                'presensi_id' => 41,
                'peserta_id' => 10,
                'sign' => '6466f9b2b9e6c.png',
                'slug' => 'GW3T6BFuux8mOkKKISUx',
                'created_at' => '2023-05-19 04:03:39',
                'updated_at' => '2023-05-19 04:23:14',
            ),
            31 => 
            array (
                'id' => 587,
                'presensi_id' => 41,
                'peserta_id' => 11,
                'sign' => '64671025b08b8.png',
                'slug' => 'wQaUuL9o1iiKUzSnjrMa',
                'created_at' => '2023-05-19 04:03:45',
                'updated_at' => '2023-05-19 05:59:01',
            ),
            32 => 
            array (
                'id' => 588,
                'presensi_id' => 41,
                'peserta_id' => 12,
                'sign' => '6466f9507530a.png',
                'slug' => 'yvQAtclFErPD3jSyw48B',
                'created_at' => '2023-05-19 04:03:54',
                'updated_at' => '2023-05-19 04:21:36',
            ),
            33 => 
            array (
                'id' => 589,
                'presensi_id' => 41,
                'peserta_id' => 107,
                'sign' => '6466fa541b304.png',
                'slug' => 'HeUZxp3M248fprQPhjLX',
                'created_at' => '2023-05-19 04:04:04',
                'updated_at' => '2023-05-19 04:25:56',
            ),
            34 => 
            array (
                'id' => 590,
                'presensi_id' => 41,
                'peserta_id' => 108,
                'sign' => '6466f9b466f70.png',
                'slug' => 'uAnN4QRT8W66vNZgK6Se',
                'created_at' => '2023-05-19 04:04:08',
                'updated_at' => '2023-05-19 04:23:16',
            ),
            35 => 
            array (
                'id' => 591,
                'presensi_id' => 41,
                'peserta_id' => 109,
                'sign' => '646c4e036d009.png',
                'slug' => '3WfEruOzSGy5Rfnwm2KC',
                'created_at' => '2023-05-19 04:04:13',
                'updated_at' => '2023-05-23 05:24:19',
            ),
            36 => 
            array (
                'id' => 592,
                'presensi_id' => 41,
                'peserta_id' => 21,
                'sign' => '6466fb27489fa.png',
                'slug' => 'ojXmPvCGv0mrx6qBcJgC',
                'created_at' => '2023-05-19 04:04:21',
                'updated_at' => '2023-05-19 04:29:27',
            ),
            37 => 
            array (
                'id' => 593,
                'presensi_id' => 41,
                'peserta_id' => 22,
                'sign' => '6466fb39efa27.png',
                'slug' => 'FbwY073PtIleZMq1gUsr',
                'created_at' => '2023-05-19 04:04:25',
                'updated_at' => '2023-05-19 04:29:45',
            ),
            38 => 
            array (
                'id' => 594,
                'presensi_id' => 41,
                'peserta_id' => 105,
                'sign' => '646704612fd4b.png',
                'slug' => '9xGdKobv3NNZfcXdlgo1',
                'created_at' => '2023-05-19 04:04:33',
                'updated_at' => '2023-05-19 05:08:49',
            ),
            39 => 
            array (
                'id' => 595,
                'presensi_id' => 41,
                'peserta_id' => 152,
                'sign' => '6466fa00364ba.png',
                'slug' => 'MSiCPb8pSFcAfLDjGU4N',
                'created_at' => '2023-05-19 04:04:38',
                'updated_at' => '2023-05-19 04:24:32',
            ),
            40 => 
            array (
                'id' => 596,
                'presensi_id' => 42,
                'peserta_id' => 5,
                'sign' => '646c240401ab6.png',
                'slug' => 'owhKEfFwJlg1y9BjMErk',
                'created_at' => '2023-05-23 02:06:03',
                'updated_at' => '2023-05-23 02:25:08',
            ),
            41 => 
            array (
                'id' => 597,
                'presensi_id' => 42,
                'peserta_id' => 9,
                'sign' => '646c25ba023f7.png',
                'slug' => 'DVq3XnkZCZ37WHen6sSF',
                'created_at' => '2023-05-23 02:06:13',
                'updated_at' => '2023-05-23 02:32:26',
            ),
            42 => 
            array (
                'id' => 598,
                'presensi_id' => 42,
                'peserta_id' => 6,
                'sign' => '646c4b5b0ae39.png',
                'slug' => 'dV8QtvtCavOLhu2hEGta',
                'created_at' => '2023-05-23 02:06:18',
                'updated_at' => '2023-05-23 05:12:59',
            ),
            43 => 
            array (
                'id' => 599,
                'presensi_id' => 42,
                'peserta_id' => 159,
                'sign' => '646c311aa18df.png',
                'slug' => 'BnZgFkCpZs268jiub5lo',
                'created_at' => '2023-05-23 02:13:01',
                'updated_at' => '2023-05-23 03:20:58',
            ),
            44 => 
            array (
                'id' => 600,
                'presensi_id' => 42,
                'peserta_id' => 10,
                'sign' => '646c2be630d58.png',
                'slug' => '9yQvwWQ8nY497H9f1MWE',
                'created_at' => '2023-05-23 02:16:56',
                'updated_at' => '2023-05-23 02:58:46',
            ),
            45 => 
            array (
                'id' => 601,
                'presensi_id' => 42,
                'peserta_id' => 11,
                'sign' => '646c3519d2fab.png',
                'slug' => 'qN5v0DkXkQ5oul4carCC',
                'created_at' => '2023-05-23 02:17:00',
                'updated_at' => '2023-05-23 03:38:01',
            ),
            46 => 
            array (
                'id' => 602,
                'presensi_id' => 42,
                'peserta_id' => 12,
                'sign' => '646c24354ea15.png',
                'slug' => 'yIkBy93rdjTj77cA1WMV',
                'created_at' => '2023-05-23 02:20:15',
                'updated_at' => '2023-05-23 02:25:57',
            ),
            47 => 
            array (
                'id' => 603,
                'presensi_id' => 42,
                'peserta_id' => 107,
                'sign' => '646c252172d8f.png',
                'slug' => 'SU01JNjfhXEqbna63FNG',
                'created_at' => '2023-05-23 02:20:19',
                'updated_at' => '2023-05-23 02:29:53',
            ),
            48 => 
            array (
                'id' => 604,
                'presensi_id' => 42,
                'peserta_id' => 108,
                'sign' => '646c26b76ebba.png',
                'slug' => 'zOICdE3xcqW0thZTGrUX',
                'created_at' => '2023-05-23 02:20:36',
                'updated_at' => '2023-05-23 02:36:39',
            ),
            49 => 
            array (
                'id' => 605,
                'presensi_id' => 42,
                'peserta_id' => 109,
                'sign' => '646c4ac81d3e6.png',
                'slug' => 'WFE5Em5nKEkaA39xZw76',
                'created_at' => '2023-05-23 02:20:40',
                'updated_at' => '2023-05-23 05:10:32',
            ),
            50 => 
            array (
                'id' => 606,
                'presensi_id' => 42,
                'peserta_id' => 21,
                'sign' => '646c271c2495a.png',
                'slug' => 'nsMagF5mhEsqEVd0KwGo',
                'created_at' => '2023-05-23 02:20:44',
                'updated_at' => '2023-05-23 02:38:20',
            ),
            51 => 
            array (
                'id' => 607,
                'presensi_id' => 42,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'VajvH1iF8IP1QySaV7Qe',
                'created_at' => '2023-05-23 02:20:50',
                'updated_at' => '2023-05-23 02:20:50',
            ),
            52 => 
            array (
                'id' => 608,
                'presensi_id' => 42,
                'peserta_id' => 113,
                'sign' => '646c24295a156.png',
                'slug' => '1MYPOQcAlkGEamzPYQGI',
                'created_at' => '2023-05-23 02:21:02',
                'updated_at' => '2023-05-23 02:25:45',
            ),
            53 => 
            array (
                'id' => 609,
                'presensi_id' => 42,
                'peserta_id' => 99,
                'sign' => '646c2441433a9.png',
                'slug' => 'O7ZvWUcoOfDI2u38NCl9',
                'created_at' => '2023-05-23 02:21:24',
                'updated_at' => '2023-05-23 02:26:09',
            ),
            54 => 
            array (
                'id' => 610,
                'presensi_id' => 43,
                'peserta_id' => 5,
                'sign' => '6487f04455959.png',
                'slug' => 'pYJu4NVLRCCaSsDo6ihA',
                'created_at' => '2023-06-13 02:21:45',
                'updated_at' => '2023-06-13 04:27:48',
            ),
            55 => 
            array (
                'id' => 611,
                'presensi_id' => 43,
                'peserta_id' => 6,
                'sign' => '6487f2151cbe6.png',
                'slug' => 'qHdX5gXJyrnil6vecfcK',
                'created_at' => '2023-06-13 02:22:40',
                'updated_at' => '2023-06-13 04:35:33',
            ),
            56 => 
            array (
                'id' => 612,
                'presensi_id' => 43,
                'peserta_id' => 9,
                'sign' => '6487f118b73ae.png',
                'slug' => 'SrccdDZkzWBTl3htZfYH',
                'created_at' => '2023-06-13 02:22:46',
                'updated_at' => '2023-06-13 04:31:20',
            ),
            57 => 
            array (
                'id' => 613,
                'presensi_id' => 43,
                'peserta_id' => 10,
                'sign' => '6487ef9723273.png',
                'slug' => '0YskXncntyH6QEPft74k',
                'created_at' => '2023-06-13 02:25:56',
                'updated_at' => '2023-06-13 04:24:55',
            ),
            58 => 
            array (
                'id' => 614,
                'presensi_id' => 43,
                'peserta_id' => 159,
                'sign' => '6487f3dade8d1.png',
                'slug' => 'PEYj05Q6N1XDCB5WmyHD',
                'created_at' => '2023-06-13 02:26:30',
                'updated_at' => '2023-06-13 04:43:06',
            ),
            59 => 
            array (
                'id' => 615,
                'presensi_id' => 43,
                'peserta_id' => 11,
                'sign' => '6487f8eea940d.png',
                'slug' => 'Z6dfu3kHJBCx50LR12h0',
                'created_at' => '2023-06-13 02:26:58',
                'updated_at' => '2023-06-13 05:04:46',
            ),
            60 => 
            array (
                'id' => 616,
                'presensi_id' => 43,
                'peserta_id' => 12,
                'sign' => '6487f16d69d02.png',
                'slug' => 'wyoCuph3S4HOTFlB8MJZ',
                'created_at' => '2023-06-13 02:27:03',
                'updated_at' => '2023-06-13 04:32:45',
            ),
            61 => 
            array (
                'id' => 617,
                'presensi_id' => 43,
                'peserta_id' => 107,
                'sign' => '6487f1731ae7f.png',
                'slug' => 'oEOWvprkr3DPkg5c7njz',
                'created_at' => '2023-06-13 02:27:12',
                'updated_at' => '2023-06-13 04:32:51',
            ),
            62 => 
            array (
                'id' => 618,
                'presensi_id' => 43,
                'peserta_id' => 108,
                'sign' => '6487f38e10b44.png',
                'slug' => 'GI4HA2fMsXuebkEwu0Ny',
                'created_at' => '2023-06-13 02:27:24',
                'updated_at' => '2023-06-13 04:41:50',
            ),
            63 => 
            array (
                'id' => 619,
                'presensi_id' => 43,
                'peserta_id' => 109,
                'sign' => '6487fb567f712.png',
                'slug' => 'sGK27By4ffgHKE2J978l',
                'created_at' => '2023-06-13 02:27:35',
                'updated_at' => '2023-06-13 05:15:02',
            ),
            64 => 
            array (
                'id' => 620,
                'presensi_id' => 43,
                'peserta_id' => 21,
                'sign' => '6487f6eb85d43.png',
                'slug' => '1pNmWToG2XSLPDeXHXdP',
                'created_at' => '2023-06-13 02:27:52',
                'updated_at' => '2023-06-13 04:56:11',
            ),
            65 => 
            array (
                'id' => 621,
                'presensi_id' => 43,
                'peserta_id' => 22,
                'sign' => '6487f176f2221.png',
                'slug' => 'WVaqZqqdvPm9O1r4ZN2Y',
                'created_at' => '2023-06-13 02:27:57',
                'updated_at' => '2023-06-13 04:32:54',
            ),
            66 => 
            array (
                'id' => 622,
                'presensi_id' => 43,
                'peserta_id' => 113,
                'sign' => '6487f1c028fb0.png',
                'slug' => '89rZKnojKTxCoK4VrXb3',
                'created_at' => '2023-06-13 02:28:03',
                'updated_at' => '2023-06-13 04:34:08',
            ),
            67 => 
            array (
                'id' => 623,
                'presensi_id' => 43,
                'peserta_id' => 99,
                'sign' => '6487f395262f2.png',
                'slug' => 'RCJGUO0sBgTXeoJ8TrWe',
                'created_at' => '2023-06-13 02:28:09',
                'updated_at' => '2023-06-13 04:41:57',
            ),
            68 => 
            array (
                'id' => 624,
                'presensi_id' => 44,
                'peserta_id' => 5,
                'sign' => '648955bc5eba2.png',
                'slug' => 'r1zzPLcW2Rr0gosQbaqA',
                'created_at' => '2023-06-14 00:01:44',
                'updated_at' => '2023-06-14 05:53:00',
            ),
            69 => 
            array (
                'id' => 625,
                'presensi_id' => 44,
                'peserta_id' => 6,
                'sign' => '648a577e16cf7.png',
                'slug' => 'T2WmoDeXKsXwng7otwA0',
                'created_at' => '2023-06-14 00:01:54',
                'updated_at' => '2023-06-15 00:12:46',
            ),
            70 => 
            array (
                'id' => 626,
                'presensi_id' => 44,
                'peserta_id' => 9,
                'sign' => '64895672a117f.png',
                'slug' => 'H54X99wCA2wazahb5r3W',
                'created_at' => '2023-06-14 00:02:00',
                'updated_at' => '2023-06-14 05:56:02',
            ),
            71 => 
            array (
                'id' => 627,
                'presensi_id' => 44,
                'peserta_id' => 10,
                'sign' => '648954f6553a3.png',
                'slug' => '6GaU4zYAqw4KN4c9W5WH',
                'created_at' => '2023-06-14 00:02:05',
                'updated_at' => '2023-06-14 05:49:42',
            ),
            72 => 
            array (
                'id' => 628,
                'presensi_id' => 44,
                'peserta_id' => 159,
                'sign' => '64895c9790726.png',
                'slug' => 'syZg5pe6nWafaP9DMOB6',
                'created_at' => '2023-06-14 00:02:11',
                'updated_at' => '2023-06-14 06:22:15',
            ),
            73 => 
            array (
                'id' => 629,
                'presensi_id' => 44,
                'peserta_id' => 11,
                'sign' => '6489551c94e8d.png',
                'slug' => 'yM51VZEGaIAg1deVdiIt',
                'created_at' => '2023-06-14 00:02:16',
                'updated_at' => '2023-06-14 05:50:20',
            ),
            74 => 
            array (
                'id' => 630,
                'presensi_id' => 44,
                'peserta_id' => 12,
                'sign' => '64895560df460.png',
                'slug' => 'R7RP1GQW4ggQPgYXn9JO',
                'created_at' => '2023-06-14 00:02:22',
                'updated_at' => '2023-06-14 05:51:28',
            ),
            75 => 
            array (
                'id' => 631,
                'presensi_id' => 44,
                'peserta_id' => 107,
                'sign' => '6489551a34563.png',
                'slug' => '0qlPkEp3t2pGSFA5KLoL',
                'created_at' => '2023-06-14 00:02:28',
                'updated_at' => '2023-06-14 05:50:18',
            ),
            76 => 
            array (
                'id' => 632,
                'presensi_id' => 44,
                'peserta_id' => 108,
                'sign' => '6489579226b59.png',
                'slug' => 'kq7e4AOcleAf8wXKDuYf',
                'created_at' => '2023-06-14 00:02:34',
                'updated_at' => '2023-06-14 06:00:50',
            ),
            77 => 
            array (
                'id' => 633,
                'presensi_id' => 44,
                'peserta_id' => 109,
                'sign' => '6489561715d0f.png',
                'slug' => 'mpj8rwZYJqjYwvAI9odC',
                'created_at' => '2023-06-14 00:02:39',
                'updated_at' => '2023-06-14 05:54:31',
            ),
            78 => 
            array (
                'id' => 634,
                'presensi_id' => 44,
                'peserta_id' => 21,
                'sign' => '648957c8c8896.png',
                'slug' => 'mi951ZljXBjE3G8eC83G',
                'created_at' => '2023-06-14 00:02:43',
                'updated_at' => '2023-06-14 06:01:44',
            ),
            79 => 
            array (
                'id' => 635,
                'presensi_id' => 44,
                'peserta_id' => 22,
                'sign' => '648a57ece37d4.png',
                'slug' => '3512UnT7IBwwQHYFaYUq',
                'created_at' => '2023-06-14 00:02:48',
                'updated_at' => '2023-06-15 00:14:36',
            ),
            80 => 
            array (
                'id' => 636,
                'presensi_id' => 44,
                'peserta_id' => 103,
                'sign' => '648a57d6ca6e8.png',
                'slug' => 'KHp1lWVqpkAyNm1xO5PB',
                'created_at' => '2023-06-14 00:02:54',
                'updated_at' => '2023-06-15 00:14:14',
            ),
            81 => 
            array (
                'id' => 637,
                'presensi_id' => 44,
                'peserta_id' => 40,
                'sign' => '6489589dd7c21.png',
                'slug' => 'PB7BnNZoBXAmG1ANK1Nu',
                'created_at' => '2023-06-14 00:02:59',
                'updated_at' => '2023-06-14 06:05:17',
            ),
            82 => 
            array (
                'id' => 638,
                'presensi_id' => 45,
                'peserta_id' => 5,
                'sign' => '649264625d995.png',
                'slug' => '5XZaG5lhn0HjSzKHoFhH',
                'created_at' => '2023-06-21 02:30:41',
                'updated_at' => '2023-06-21 02:45:54',
            ),
            83 => 
            array (
                'id' => 639,
                'presensi_id' => 45,
                'peserta_id' => 6,
                'sign' => '64926bb6b31e2.png',
                'slug' => 'BAQdnYYsqsYYnPY0G5pd',
                'created_at' => '2023-06-21 02:30:58',
                'updated_at' => '2023-06-21 03:17:10',
            ),
            84 => 
            array (
                'id' => 640,
                'presensi_id' => 45,
                'peserta_id' => 9,
                'sign' => '64926aac233d1.png',
                'slug' => 'K4ikW93EoCxjpYG5D3m9',
                'created_at' => '2023-06-21 02:31:03',
                'updated_at' => '2023-06-21 03:12:44',
            ),
            85 => 
            array (
                'id' => 641,
                'presensi_id' => 45,
                'peserta_id' => 159,
                'sign' => '64926a464eadb.png',
                'slug' => '77vbSgR14GRI1JGvAFmp',
                'created_at' => '2023-06-21 02:31:08',
                'updated_at' => '2023-06-21 03:11:02',
            ),
            86 => 
            array (
                'id' => 642,
                'presensi_id' => 45,
                'peserta_id' => 10,
                'sign' => '64926598472a2.png',
                'slug' => 'rO8LlIrikKrsiE7gPNkV',
                'created_at' => '2023-06-21 02:31:13',
                'updated_at' => '2023-06-21 02:51:04',
            ),
            87 => 
            array (
                'id' => 643,
                'presensi_id' => 45,
                'peserta_id' => 11,
                'sign' => '649263101abf9.png',
                'slug' => 'MJILs5IsC5oVyeZV5iGV',
                'created_at' => '2023-06-21 02:31:25',
                'updated_at' => '2023-06-21 02:40:16',
            ),
            88 => 
            array (
                'id' => 644,
                'presensi_id' => 45,
                'peserta_id' => 12,
                'sign' => '6492631e98690.png',
                'slug' => 'BY7LUHjlQca1xyzoUzvG',
                'created_at' => '2023-06-21 02:31:37',
                'updated_at' => '2023-06-21 02:40:30',
            ),
            89 => 
            array (
                'id' => 645,
                'presensi_id' => 45,
                'peserta_id' => 107,
                'sign' => '649265af69a70.png',
                'slug' => 'vjlbkW5y9e4rsIYo90FR',
                'created_at' => '2023-06-21 02:31:44',
                'updated_at' => '2023-06-21 02:51:27',
            ),
            90 => 
            array (
                'id' => 646,
                'presensi_id' => 45,
                'peserta_id' => 108,
                'sign' => '64926f8a20a22.png',
                'slug' => 'nfJg4919vU4zRPkigKqI',
                'created_at' => '2023-06-21 02:31:49',
                'updated_at' => '2023-06-21 03:33:30',
            ),
            91 => 
            array (
                'id' => 647,
                'presensi_id' => 45,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'pgM6HBRWW6aCRdtj0ZyI',
                'created_at' => '2023-06-21 02:31:54',
                'updated_at' => '2023-06-21 02:31:54',
            ),
            92 => 
            array (
                'id' => 648,
                'presensi_id' => 45,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'kmtQE9i54MP6bJzQnu3Z',
                'created_at' => '2023-06-21 02:31:59',
                'updated_at' => '2023-06-21 02:31:59',
            ),
            93 => 
            array (
                'id' => 649,
                'presensi_id' => 45,
                'peserta_id' => 22,
                'sign' => '6492640e66ae1.png',
                'slug' => 'vRI3lKGbGnKWKqSoYD3d',
                'created_at' => '2023-06-21 02:32:03',
                'updated_at' => '2023-06-21 02:44:30',
            ),
            94 => 
            array (
                'id' => 650,
                'presensi_id' => 45,
                'peserta_id' => 105,
                'sign' => '64928965a5c48.png',
                'slug' => 'SWD3UjRyRVs3dltIVCEg',
                'created_at' => '2023-06-21 02:32:08',
                'updated_at' => '2023-06-21 05:23:49',
            ),
            95 => 
            array (
                'id' => 651,
                'presensi_id' => 45,
                'peserta_id' => 152,
                'sign' => '64926d9b37d50.png',
                'slug' => '8VoAsOkWVdKOqnvJZUU1',
                'created_at' => '2023-06-21 02:32:14',
                'updated_at' => '2023-06-21 03:25:15',
            ),
            96 => 
            array (
                'id' => 652,
                'presensi_id' => 46,
                'peserta_id' => 5,
                'sign' => '6495515e32d51.png',
                'slug' => 'AlwJEnqoJtojvOswpvFb',
                'created_at' => '2023-06-23 07:58:28',
                'updated_at' => '2023-06-23 08:01:34',
            ),
            97 => 
            array (
                'id' => 653,
                'presensi_id' => 46,
                'peserta_id' => 6,
                'sign' => '6495529ea5e90.png',
                'slug' => '55ubIHfSMEEyZ0jyY0LX',
                'created_at' => '2023-06-23 07:58:44',
                'updated_at' => '2023-06-23 08:06:54',
            ),
            98 => 
            array (
                'id' => 654,
                'presensi_id' => 46,
                'peserta_id' => 9,
                'sign' => '649554b8137a2.png',
                'slug' => 'dMgJPVnxsVRnsl6Q6b8o',
                'created_at' => '2023-06-23 07:58:53',
                'updated_at' => '2023-06-23 08:15:52',
            ),
            99 => 
            array (
                'id' => 655,
                'presensi_id' => 46,
                'peserta_id' => 10,
                'sign' => '64955bf01d607.png',
                'slug' => 'da4h9KgqL7jzWMy7ggwt',
                'created_at' => '2023-06-23 07:58:58',
                'updated_at' => '2023-06-23 08:46:40',
            ),
            100 => 
            array (
                'id' => 656,
                'presensi_id' => 46,
                'peserta_id' => 159,
                'sign' => '649551e596935.png',
                'slug' => 'JfDz9g3fvMkny7u40VFu',
                'created_at' => '2023-06-23 07:59:10',
                'updated_at' => '2023-06-23 08:03:49',
            ),
            101 => 
            array (
                'id' => 657,
                'presensi_id' => 46,
                'peserta_id' => 11,
                'sign' => '64955b615daf8.png',
                'slug' => '2RXJpuKbMcFB8JdL4Zsb',
                'created_at' => '2023-06-23 07:59:14',
                'updated_at' => '2023-06-23 08:44:17',
            ),
            102 => 
            array (
                'id' => 658,
                'presensi_id' => 46,
                'peserta_id' => 12,
                'sign' => '649558f3b69b4.png',
                'slug' => 'aR1ikGbA1Bh6xJHvftdq',
                'created_at' => '2023-06-23 07:59:25',
                'updated_at' => '2023-06-23 08:33:55',
            ),
            103 => 
            array (
                'id' => 659,
                'presensi_id' => 46,
                'peserta_id' => 107,
                'sign' => '6495529776ba1.png',
                'slug' => '3FWgcBm57DUIA65VVRLE',
                'created_at' => '2023-06-23 07:59:29',
                'updated_at' => '2023-06-23 08:06:47',
            ),
            104 => 
            array (
                'id' => 660,
                'presensi_id' => 46,
                'peserta_id' => 108,
                'sign' => '649557e5a257f.png',
                'slug' => 'mwhzKXwP1E4rA5z8CCoS',
                'created_at' => '2023-06-23 07:59:34',
                'updated_at' => '2023-06-23 08:29:25',
            ),
            105 => 
            array (
                'id' => 661,
                'presensi_id' => 46,
                'peserta_id' => 109,
                'sign' => '6498c6b455476.png',
                'slug' => 'tdAUAwkmRXnKbGNE4ux2',
                'created_at' => '2023-06-23 07:59:38',
                'updated_at' => '2023-06-25 22:59:00',
            ),
            106 => 
            array (
                'id' => 662,
                'presensi_id' => 46,
                'peserta_id' => 21,
                'sign' => '649553a95d3c7.png',
                'slug' => 'k0lgsIb8gTLzSt7N9PSG',
                'created_at' => '2023-06-23 07:59:44',
                'updated_at' => '2023-06-23 08:11:21',
            ),
            107 => 
            array (
                'id' => 663,
                'presensi_id' => 46,
                'peserta_id' => 22,
                'sign' => '649553f665940.png',
                'slug' => 'M3PEe7TiFhBRYb7OusBA',
                'created_at' => '2023-06-23 07:59:49',
                'updated_at' => '2023-06-23 08:12:38',
            ),
            108 => 
            array (
                'id' => 664,
                'presensi_id' => 46,
                'peserta_id' => 111,
                'sign' => '649568cc3e41d.png',
                'slug' => '5duCOWvIWZWd5sjaEG1C',
                'created_at' => '2023-06-23 08:00:02',
                'updated_at' => '2023-06-23 09:41:32',
            ),
            109 => 
            array (
                'id' => 665,
                'presensi_id' => 46,
                'peserta_id' => 106,
                'sign' => '64955297b9217.png',
                'slug' => 'iaTBAeHJJy5Iw9yBPJM5',
                'created_at' => '2023-06-23 08:00:36',
                'updated_at' => '2023-06-23 08:06:47',
            ),
            110 => 
            array (
                'id' => 667,
                'presensi_id' => 48,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'WBLq1zC0x5I9sWoef1t5',
                'created_at' => '2023-07-28 06:39:23',
                'updated_at' => '2023-07-28 06:39:23',
            ),
            111 => 
            array (
                'id' => 668,
                'presensi_id' => 48,
                'peserta_id' => 26,
                'sign' => NULL,
                'slug' => 'Wwcs9pKD11uAxFTN4Thf',
                'created_at' => '2023-07-28 06:42:21',
                'updated_at' => '2023-07-28 06:42:21',
            ),
            112 => 
            array (
                'id' => 669,
                'presensi_id' => 48,
                'peserta_id' => 27,
                'sign' => NULL,
                'slug' => 'lBtzHyTQhe4odtDkvAcV',
                'created_at' => '2023-07-28 06:42:37',
                'updated_at' => '2023-07-28 06:42:37',
            ),
            113 => 
            array (
                'id' => 670,
                'presensi_id' => 48,
                'peserta_id' => 31,
                'sign' => '64c3800223374.png',
                'slug' => 'EaKLnAnFt8JuKvk2hsju',
                'created_at' => '2023-07-28 06:42:44',
                'updated_at' => '2023-07-28 08:44:50',
            ),
            114 => 
            array (
                'id' => 671,
                'presensi_id' => 48,
                'peserta_id' => 97,
                'sign' => '64c36401f31c9.png',
                'slug' => 'RibmNzXQEgl6TJ0zXgdf',
                'created_at' => '2023-07-28 06:42:55',
                'updated_at' => '2023-07-28 06:45:21',
            ),
            115 => 
            array (
                'id' => 672,
                'presensi_id' => 48,
                'peserta_id' => 103,
                'sign' => '64c363f1e0e43.png',
                'slug' => 'wVj1XNCh9IyZjCOTXv7r',
                'created_at' => '2023-07-28 06:43:10',
                'updated_at' => '2023-07-28 06:45:05',
            ),
            116 => 
            array (
                'id' => 673,
                'presensi_id' => 48,
                'peserta_id' => 110,
                'sign' => NULL,
                'slug' => 'u9IkNlEZUmeOt92vSaut',
                'created_at' => '2023-07-28 06:43:18',
                'updated_at' => '2023-07-28 06:43:18',
            ),
            117 => 
            array (
                'id' => 674,
                'presensi_id' => 49,
                'peserta_id' => 5,
                'sign' => '64d1d1730f12c.png',
                'slug' => '3tQ77KMejeuaC0VX4gsv',
                'created_at' => '2023-08-08 04:00:37',
                'updated_at' => '2023-08-08 05:24:03',
            ),
            118 => 
            array (
                'id' => 675,
                'presensi_id' => 49,
                'peserta_id' => 6,
                'sign' => '64d1da49d73d0.png',
                'slug' => '0miwzuTwWD9YesSIWfQO',
                'created_at' => '2023-08-08 04:01:02',
                'updated_at' => '2023-08-08 06:01:45',
            ),
            119 => 
            array (
                'id' => 676,
                'presensi_id' => 49,
                'peserta_id' => 9,
                'sign' => '64d1d34281024.png',
                'slug' => '8bJjKrXXTezZ0sN36Pq7',
                'created_at' => '2023-08-08 04:01:06',
                'updated_at' => '2023-08-08 05:31:46',
            ),
            120 => 
            array (
                'id' => 677,
                'presensi_id' => 49,
                'peserta_id' => 10,
                'sign' => '64d1da73afcdf.png',
                'slug' => '1rsFbFQlp0YB3Kx2KMpR',
                'created_at' => '2023-08-08 04:01:16',
                'updated_at' => '2023-08-08 06:02:27',
            ),
            121 => 
            array (
                'id' => 678,
                'presensi_id' => 49,
                'peserta_id' => 159,
                'sign' => '64d1d5aa30a53.png',
                'slug' => 'p2iVtwbS9eqMv2KN64bR',
                'created_at' => '2023-08-08 04:01:20',
                'updated_at' => '2023-08-08 05:42:02',
            ),
            122 => 
            array (
                'id' => 680,
                'presensi_id' => 49,
                'peserta_id' => 12,
                'sign' => '64d1d2462f0dd.png',
                'slug' => 'zrO5AxbgWRTW3sotFEGI',
                'created_at' => '2023-08-08 04:01:34',
                'updated_at' => '2023-08-08 05:27:34',
            ),
            123 => 
            array (
                'id' => 681,
                'presensi_id' => 49,
                'peserta_id' => 107,
                'sign' => '64d1d6d489c7b.png',
                'slug' => 'dRFcpF5M4U433EtPruWr',
                'created_at' => '2023-08-08 04:01:44',
                'updated_at' => '2023-08-08 05:47:00',
            ),
            124 => 
            array (
                'id' => 682,
                'presensi_id' => 49,
                'peserta_id' => 108,
                'sign' => '64d1d1ce30a8c.png',
                'slug' => 'C9yhOfxizkAb4We3WxC2',
                'created_at' => '2023-08-08 04:01:52',
                'updated_at' => '2023-08-08 05:25:34',
            ),
            125 => 
            array (
                'id' => 683,
                'presensi_id' => 49,
                'peserta_id' => 109,
                'sign' => '64d1d187d8a62.png',
                'slug' => 'rqDACpDFw7N4Rt8VuUwH',
                'created_at' => '2023-08-08 04:01:57',
                'updated_at' => '2023-08-08 05:24:23',
            ),
            126 => 
            array (
                'id' => 684,
                'presensi_id' => 49,
                'peserta_id' => 21,
                'sign' => '64d24a923bb60.png',
                'slug' => 'KFjcJy4vqzw33h4EY9Df',
                'created_at' => '2023-08-08 04:02:07',
                'updated_at' => '2023-08-08 14:00:50',
            ),
            127 => 
            array (
                'id' => 685,
                'presensi_id' => 49,
                'peserta_id' => 22,
                'sign' => '64d1db5795661.png',
                'slug' => '5PojvIjWiyZ2aDyks07r',
                'created_at' => '2023-08-08 04:02:12',
                'updated_at' => '2023-08-08 06:06:15',
            ),
            128 => 
            array (
                'id' => 686,
                'presensi_id' => 49,
                'peserta_id' => 38,
                'sign' => '64d24aafe4d33.png',
                'slug' => 'WUMMIydeGkmf2gH3ueBa',
                'created_at' => '2023-08-08 04:02:16',
                'updated_at' => '2023-08-08 14:01:19',
            ),
            129 => 
            array (
                'id' => 687,
                'presensi_id' => 49,
                'peserta_id' => 113,
                'sign' => '64d1d25e7137e.png',
                'slug' => 'csiXDobckyYcHwokw3a6',
                'created_at' => '2023-08-08 04:02:27',
                'updated_at' => '2023-08-08 05:27:58',
            ),
            130 => 
            array (
                'id' => 688,
                'presensi_id' => 49,
                'peserta_id' => 99,
                'sign' => '64d1d3e4ed5f5.png',
                'slug' => '8gUhO2nxJjzSeL0Pt1Mt',
                'created_at' => '2023-08-08 04:02:33',
                'updated_at' => '2023-08-08 05:34:28',
            ),
            131 => 
            array (
                'id' => 689,
                'presensi_id' => 49,
                'peserta_id' => 25,
                'sign' => '64d216d5f1ee9.png',
                'slug' => 'v9FXwJTdrDv4RAxkxVb6',
                'created_at' => '2023-08-08 04:05:33',
                'updated_at' => '2023-08-08 10:20:05',
            ),
            132 => 
            array (
                'id' => 690,
                'presensi_id' => 49,
                'peserta_id' => 138,
                'sign' => '64d1d9f41672c.png',
                'slug' => 'nl34z1klKxjp100lb6no',
                'created_at' => '2023-08-08 04:05:44',
                'updated_at' => '2023-08-08 06:00:20',
            ),
            133 => 
            array (
                'id' => 692,
                'presensi_id' => 49,
                'peserta_id' => 32,
                'sign' => '64d1e166d41f0.png',
                'slug' => '4D9FsRlsklUcboJJFiCb',
                'created_at' => '2023-08-08 05:05:44',
                'updated_at' => '2023-08-08 06:32:06',
            ),
            134 => 
            array (
                'id' => 694,
                'presensi_id' => 50,
                'peserta_id' => 5,
                'sign' => '64d32b78c69a7.png',
                'slug' => '934tLayzy1a4QZN5mogi',
                'created_at' => '2023-08-09 05:52:40',
                'updated_at' => '2023-08-09 06:00:24',
            ),
            135 => 
            array (
                'id' => 695,
                'presensi_id' => 50,
                'peserta_id' => 6,
                'sign' => '64d3372ff0a5b.png',
                'slug' => 'xS1YSGt2O2t3rxnxrqIT',
                'created_at' => '2023-08-09 05:52:51',
                'updated_at' => '2023-08-09 06:50:23',
            ),
            136 => 
            array (
                'id' => 696,
                'presensi_id' => 50,
                'peserta_id' => 9,
                'sign' => '64d32a3260d4e.png',
                'slug' => '5LOy6P6PDUiwnA2gK8eB',
                'created_at' => '2023-08-09 05:52:55',
                'updated_at' => '2023-08-09 05:54:58',
            ),
            137 => 
            array (
                'id' => 697,
                'presensi_id' => 50,
                'peserta_id' => 162,
                'sign' => '64d32ab8dcb22.png',
                'slug' => 'yZM7Mvs5LdfHM3wXQCL4',
                'created_at' => '2023-08-09 05:53:01',
                'updated_at' => '2023-08-09 05:57:12',
            ),
            138 => 
            array (
                'id' => 698,
                'presensi_id' => 50,
                'peserta_id' => 159,
                'sign' => '64d32a6a85d65.png',
                'slug' => 'DslxdGOLvtG9m9UD0a3O',
                'created_at' => '2023-08-09 05:53:06',
                'updated_at' => '2023-08-09 05:55:54',
            ),
            139 => 
            array (
                'id' => 699,
                'presensi_id' => 50,
                'peserta_id' => 11,
                'sign' => '64d32f45dae85.png',
                'slug' => 'H9CxSRvrrKqSuq2M75qk',
                'created_at' => '2023-08-09 05:53:11',
                'updated_at' => '2023-08-09 06:16:37',
            ),
            140 => 
            array (
                'id' => 700,
                'presensi_id' => 50,
                'peserta_id' => 12,
                'sign' => '64d34013ab490.png',
                'slug' => 'KXocWgnaJJwlbSovo0A1',
                'created_at' => '2023-08-09 05:53:19',
                'updated_at' => '2023-08-09 07:28:19',
            ),
            141 => 
            array (
                'id' => 701,
                'presensi_id' => 50,
                'peserta_id' => 107,
                'sign' => '64d32ac1b3a11.png',
                'slug' => 'EyXV1IWTbu856xya6dTV',
                'created_at' => '2023-08-09 05:53:24',
                'updated_at' => '2023-08-09 05:57:21',
            ),
            142 => 
            array (
                'id' => 702,
                'presensi_id' => 50,
                'peserta_id' => 108,
                'sign' => '64d3379126c8b.png',
                'slug' => 'T5HAThCOb1oHLcnkrjLt',
                'created_at' => '2023-08-09 05:53:29',
                'updated_at' => '2023-08-09 06:52:01',
            ),
            143 => 
            array (
                'id' => 703,
                'presensi_id' => 50,
                'peserta_id' => 109,
                'sign' => '64d330c6e8194.png',
                'slug' => 'pHXyfj4zEQtGe7CvBQ6S',
                'created_at' => '2023-08-09 05:53:34',
                'updated_at' => '2023-08-09 06:23:02',
            ),
            144 => 
            array (
                'id' => 704,
                'presensi_id' => 50,
                'peserta_id' => 21,
                'sign' => '64d32c42928bd.png',
                'slug' => 'xJ0z1yBFSzwFlYU2sTXD',
                'created_at' => '2023-08-09 05:53:38',
                'updated_at' => '2023-08-09 06:03:46',
            ),
            145 => 
            array (
                'id' => 705,
                'presensi_id' => 50,
                'peserta_id' => 22,
                'sign' => '64d33b182d04f.png',
                'slug' => '56S5WVqiAYHhmBn7LjRo',
                'created_at' => '2023-08-09 05:53:43',
                'updated_at' => '2023-08-09 07:07:04',
            ),
            146 => 
            array (
                'id' => 706,
                'presensi_id' => 50,
                'peserta_id' => 38,
                'sign' => '64d32b76081a7.png',
                'slug' => 'CNCCkUvmLh0CzjGr1YGr',
                'created_at' => '2023-08-09 05:53:48',
                'updated_at' => '2023-08-09 06:00:22',
            ),
            147 => 
            array (
                'id' => 707,
                'presensi_id' => 50,
                'peserta_id' => 26,
                'sign' => '64d32e14234d2.png',
                'slug' => 'pa0I2xWlapc8d826g2V1',
                'created_at' => '2023-08-09 05:53:54',
                'updated_at' => '2023-08-09 06:11:32',
            ),
            148 => 
            array (
                'id' => 708,
                'presensi_id' => 50,
                'peserta_id' => 111,
                'sign' => '64d331c9788d4.png',
                'slug' => 'X3gS1LRBjxd5Yuu2K2Ak',
                'created_at' => '2023-08-09 05:54:00',
                'updated_at' => '2023-08-09 06:27:21',
            ),
            149 => 
            array (
                'id' => 709,
                'presensi_id' => 50,
                'peserta_id' => 151,
                'sign' => '64d32b965b186.png',
                'slug' => '4oxnlaXYsQdZB7OGlO30',
                'created_at' => '2023-08-09 05:54:05',
                'updated_at' => '2023-08-09 06:00:54',
            ),
            150 => 
            array (
                'id' => 710,
                'presensi_id' => 50,
                'peserta_id' => 32,
                'sign' => '64d32cf614be1.png',
                'slug' => 'dL5hXqVmS5hye0CbEYbL',
                'created_at' => '2023-08-09 05:56:59',
                'updated_at' => '2023-08-09 06:06:46',
            ),
            151 => 
            array (
                'id' => 711,
                'presensi_id' => 50,
                'peserta_id' => 86,
                'sign' => '64d35377c3b33.png',
                'slug' => 'wuqbrbAhB3t4tc0ckBQl',
                'created_at' => '2023-08-09 05:57:07',
                'updated_at' => '2023-08-09 08:51:03',
            ),
            152 => 
            array (
                'id' => 712,
                'presensi_id' => 50,
                'peserta_id' => 89,
                'sign' => '64d32cdb373d9.png',
                'slug' => 'u1RWmYadPQ5dac6taW7f',
                'created_at' => '2023-08-09 05:57:12',
                'updated_at' => '2023-08-09 06:06:19',
            ),
            153 => 
            array (
                'id' => 713,
                'presensi_id' => 51,
                'peserta_id' => 5,
                'sign' => '64d5a81cb404c.png',
                'slug' => '7C7pIQ6QpiZXHSjpy1Q6',
                'created_at' => '2023-08-11 02:45:57',
                'updated_at' => '2023-08-11 03:16:44',
            ),
            154 => 
            array (
                'id' => 714,
                'presensi_id' => 51,
                'peserta_id' => 6,
                'sign' => '64d5a978b0482.png',
                'slug' => 'lPnQdmraBxSQDdzFSX3F',
                'created_at' => '2023-08-11 03:09:45',
                'updated_at' => '2023-08-11 03:22:32',
            ),
            155 => 
            array (
                'id' => 715,
                'presensi_id' => 51,
                'peserta_id' => 162,
                'sign' => '64d5b614a9069.png',
                'slug' => 'JTRhcMwRvFLXTNZZ1pCG',
                'created_at' => '2023-08-11 03:10:01',
                'updated_at' => '2023-08-11 04:16:20',
            ),
            156 => 
            array (
                'id' => 716,
                'presensi_id' => 51,
                'peserta_id' => 159,
                'sign' => '64d5ab287d88f.png',
                'slug' => 'XWzrInft9qz84MkK9A9O',
                'created_at' => '2023-08-11 03:10:19',
                'updated_at' => '2023-08-11 03:29:44',
            ),
            157 => 
            array (
                'id' => 717,
                'presensi_id' => 51,
                'peserta_id' => 12,
                'sign' => '64d5aac9aac61.png',
                'slug' => '8A4z58udbZbhj4WAyl6I',
                'created_at' => '2023-08-11 03:10:28',
                'updated_at' => '2023-08-11 03:28:09',
            ),
            158 => 
            array (
                'id' => 718,
                'presensi_id' => 51,
                'peserta_id' => 11,
                'sign' => '64dacd53a21e5.png',
                'slug' => 'l2Kn7v2Gt87ezdOrSjJu',
                'created_at' => '2023-08-11 03:13:51',
                'updated_at' => '2023-08-15 00:56:51',
            ),
            159 => 
            array (
                'id' => 719,
                'presensi_id' => 51,
                'peserta_id' => 9,
                'sign' => '64d5a9696b2ed.png',
                'slug' => 'CYDMGVxinauS7lC9C4Lc',
                'created_at' => '2023-08-11 03:13:57',
                'updated_at' => '2023-08-11 03:22:17',
            ),
            160 => 
            array (
                'id' => 720,
                'presensi_id' => 51,
                'peserta_id' => 107,
                'sign' => '64d5a981aac67.png',
                'slug' => 'WMZqZmQREwVRnjjKFBh1',
                'created_at' => '2023-08-11 03:14:02',
                'updated_at' => '2023-08-11 03:22:41',
            ),
            161 => 
            array (
                'id' => 721,
                'presensi_id' => 51,
                'peserta_id' => 108,
                'sign' => '64d5a88723fa3.png',
                'slug' => 'k97lsyi8RiuaYKoBPJYd',
                'created_at' => '2023-08-11 03:14:08',
                'updated_at' => '2023-08-11 03:18:31',
            ),
            162 => 
            array (
                'id' => 722,
                'presensi_id' => 51,
                'peserta_id' => 109,
                'sign' => '64d5c5ac10161.png',
                'slug' => 'FqffqeevaQGhl16tDZAQ',
                'created_at' => '2023-08-11 03:14:16',
                'updated_at' => '2023-08-11 05:22:52',
            ),
            163 => 
            array (
                'id' => 723,
                'presensi_id' => 51,
                'peserta_id' => 21,
                'sign' => '64d5a89b43216.png',
                'slug' => 'uwYIfmstgezTzRwj7IFB',
                'created_at' => '2023-08-11 03:14:22',
                'updated_at' => '2023-08-11 03:18:51',
            ),
            164 => 
            array (
                'id' => 724,
                'presensi_id' => 51,
                'peserta_id' => 22,
                'sign' => '64dacd61e33a9.png',
                'slug' => 'h70HxSw0WMvTmDRZhpdt',
                'created_at' => '2023-08-11 03:14:26',
                'updated_at' => '2023-08-15 00:57:05',
            ),
            165 => 
            array (
                'id' => 725,
                'presensi_id' => 51,
                'peserta_id' => 38,
                'sign' => '64d5b1f38f6d2.png',
                'slug' => 'P56X8Uiag96BjEskR5hQ',
                'created_at' => '2023-08-11 03:14:31',
                'updated_at' => '2023-08-11 03:58:43',
            ),
            166 => 
            array (
                'id' => 726,
                'presensi_id' => 51,
                'peserta_id' => 105,
                'sign' => '64d5a946a35fc.png',
                'slug' => '1WNxleFcMJTdo4csUiRw',
                'created_at' => '2023-08-11 03:14:38',
                'updated_at' => '2023-08-11 03:21:42',
            ),
            167 => 
            array (
                'id' => 727,
                'presensi_id' => 51,
                'peserta_id' => 152,
                'sign' => '64d5aa78ab9cf.png',
                'slug' => 'gpEdttwYyNGbZ05pxbY9',
                'created_at' => '2023-08-11 03:14:43',
                'updated_at' => '2023-08-11 03:26:48',
            ),
            168 => 
            array (
                'id' => 728,
                'presensi_id' => 51,
                'peserta_id' => 40,
                'sign' => '64d5b7658e2b8.png',
                'slug' => '0pUe8oILoH4MzEo2Xr6C',
                'created_at' => '2023-08-11 03:14:50',
                'updated_at' => '2023-08-11 04:21:57',
            ),
            169 => 
            array (
                'id' => 729,
                'presensi_id' => 51,
                'peserta_id' => 27,
                'sign' => '64d5b1eb1c608.png',
                'slug' => '4aeGpIPUkyxhfWA4gh0n',
                'created_at' => '2023-08-11 03:14:56',
                'updated_at' => '2023-08-11 03:58:35',
            ),
            170 => 
            array (
                'id' => 730,
                'presensi_id' => 51,
                'peserta_id' => 32,
                'sign' => '64d5a99ea3af0.png',
                'slug' => 'gCrPvNf8W5N3pKzgMfHb',
                'created_at' => '2023-08-11 03:15:17',
                'updated_at' => '2023-08-11 03:23:10',
            ),
            171 => 
            array (
                'id' => 731,
                'presensi_id' => 52,
                'peserta_id' => 5,
                'sign' => '64db1af65d4c1.png',
                'slug' => 'f5zpNADftx5sKf8HuZZ9',
                'created_at' => '2023-08-15 02:32:19',
                'updated_at' => '2023-08-15 06:28:06',
            ),
            172 => 
            array (
                'id' => 732,
                'presensi_id' => 52,
                'peserta_id' => 6,
                'sign' => '64db1a5d39cb5.png',
                'slug' => 'dqZQVjjy5Oe0c8ja04nj',
                'created_at' => '2023-08-15 02:34:09',
                'updated_at' => '2023-08-15 06:25:33',
            ),
            173 => 
            array (
                'id' => 733,
                'presensi_id' => 52,
                'peserta_id' => 9,
                'sign' => '64db302789c8c.png',
                'slug' => 'NEdL8DKch9S8i3W7gdq8',
                'created_at' => '2023-08-15 02:34:14',
                'updated_at' => '2023-08-15 07:58:31',
            ),
            174 => 
            array (
                'id' => 734,
                'presensi_id' => 52,
                'peserta_id' => 162,
                'sign' => '64db195dcb2e6.png',
                'slug' => 'hlv1RvrL3rmiCNTGfBLF',
                'created_at' => '2023-08-15 02:34:33',
                'updated_at' => '2023-08-15 06:21:17',
            ),
            175 => 
            array (
                'id' => 735,
                'presensi_id' => 52,
                'peserta_id' => 159,
                'sign' => '64db1b5e1ec2d.png',
                'slug' => 'yO0eRrj6tMJaX9RYMXfZ',
                'created_at' => '2023-08-15 02:34:41',
                'updated_at' => '2023-08-15 06:29:50',
            ),
            176 => 
            array (
                'id' => 736,
                'presensi_id' => 52,
                'peserta_id' => 11,
                'sign' => '64db198c1f1ac.png',
                'slug' => 'ceVXY8zuyupjZnw63EmM',
                'created_at' => '2023-08-15 02:34:45',
                'updated_at' => '2023-08-15 06:22:04',
            ),
            177 => 
            array (
                'id' => 737,
                'presensi_id' => 52,
                'peserta_id' => 12,
                'sign' => '64db1a0ce4945.png',
                'slug' => 'aeaafXh8tJChjOZ8P19h',
                'created_at' => '2023-08-15 02:34:49',
                'updated_at' => '2023-08-15 06:24:12',
            ),
            178 => 
            array (
                'id' => 738,
                'presensi_id' => 52,
                'peserta_id' => 107,
                'sign' => '64db1a53e824c.png',
                'slug' => 'SBHV6gQ9fGwH3c5oGJJO',
                'created_at' => '2023-08-15 02:34:55',
                'updated_at' => '2023-08-15 06:25:23',
            ),
            179 => 
            array (
                'id' => 739,
                'presensi_id' => 52,
                'peserta_id' => 108,
                'sign' => '64db1ee3f077b.png',
                'slug' => 'Bt1vDucVIUN0THXtwWwu',
                'created_at' => '2023-08-15 02:35:05',
                'updated_at' => '2023-08-15 06:44:51',
            ),
            180 => 
            array (
                'id' => 740,
                'presensi_id' => 52,
                'peserta_id' => 109,
                'sign' => '64db1b2d8c279.png',
                'slug' => 'MTGQU4mk1f15YKjZGQf2',
                'created_at' => '2023-08-15 02:35:35',
                'updated_at' => '2023-08-15 06:29:01',
            ),
            181 => 
            array (
                'id' => 741,
                'presensi_id' => 52,
                'peserta_id' => 21,
                'sign' => '64db19f76a7b9.png',
                'slug' => 'WtQhx0x0nLlCZcXEZwG9',
                'created_at' => '2023-08-15 02:35:44',
                'updated_at' => '2023-08-15 06:23:51',
            ),
            182 => 
            array (
                'id' => 742,
                'presensi_id' => 52,
                'peserta_id' => 22,
                'sign' => '64db19f1d4b8a.png',
                'slug' => 'zhwL8u52NfPEuhUxQJKg',
                'created_at' => '2023-08-15 02:35:49',
                'updated_at' => '2023-08-15 06:23:45',
            ),
            183 => 
            array (
                'id' => 743,
                'presensi_id' => 52,
                'peserta_id' => 38,
                'sign' => '64db1f04db3cc.png',
                'slug' => 'IRcuDjGS8SfcXinIpBzp',
                'created_at' => '2023-08-15 02:38:21',
                'updated_at' => '2023-08-15 06:45:24',
            ),
            184 => 
            array (
                'id' => 744,
                'presensi_id' => 52,
                'peserta_id' => 26,
                'sign' => '64db3dc1794c8.png',
                'slug' => '7TGiPS7j2tF9mPP3Rfe0',
                'created_at' => '2023-08-15 02:38:26',
                'updated_at' => '2023-08-15 08:56:33',
            ),
            185 => 
            array (
                'id' => 745,
                'presensi_id' => 53,
                'peserta_id' => 25,
                'sign' => '64e36ddcc0fc0.png',
                'slug' => 'p0a9Pj0Oaj6X4tdsEgfA',
                'created_at' => '2023-08-21 12:46:10',
                'updated_at' => '2023-08-21 13:59:56',
            ),
            186 => 
            array (
                'id' => 746,
                'presensi_id' => 53,
                'peserta_id' => 26,
                'sign' => '64e362706e82c.png',
                'slug' => 'PjuNhDDU6COOaaHg9HMS',
                'created_at' => '2023-08-21 12:46:31',
                'updated_at' => '2023-08-21 13:11:12',
            ),
            187 => 
            array (
                'id' => 747,
                'presensi_id' => 53,
                'peserta_id' => 27,
                'sign' => '64e3638813266.png',
                'slug' => 'dQYvB9bZZUOXbZRIaEzg',
                'created_at' => '2023-08-21 12:46:37',
                'updated_at' => '2023-08-21 13:15:52',
            ),
            188 => 
            array (
                'id' => 748,
                'presensi_id' => 53,
                'peserta_id' => 28,
                'sign' => '64e36bd0d5c18.png',
                'slug' => 'gn02p6PQTX9Gr28rw4GP',
                'created_at' => '2023-08-21 12:46:42',
                'updated_at' => '2023-08-21 13:51:12',
            ),
            189 => 
            array (
                'id' => 749,
                'presensi_id' => 53,
                'peserta_id' => 52,
                'sign' => '64e35d83d7e60.png',
                'slug' => 'KOn6FHJk8FrxnkSRptcv',
                'created_at' => '2023-08-21 12:47:04',
                'updated_at' => '2023-08-21 12:50:11',
            ),
            190 => 
            array (
                'id' => 750,
                'presensi_id' => 53,
                'peserta_id' => 103,
                'sign' => '64e35d945a081.png',
                'slug' => 'c8uWYlkgEwMOfVAlCBU3',
                'created_at' => '2023-08-21 12:47:12',
                'updated_at' => '2023-08-21 12:50:28',
            ),
            191 => 
            array (
                'id' => 751,
                'presensi_id' => 53,
                'peserta_id' => 110,
                'sign' => '64e36053e555e.png',
                'slug' => 'SDG0QtAju1FdopVmV3L3',
                'created_at' => '2023-08-21 12:47:18',
                'updated_at' => '2023-08-21 13:02:11',
            ),
            192 => 
            array (
                'id' => 752,
                'presensi_id' => 53,
                'peserta_id' => 31,
                'sign' => '64e3630be8917.png',
                'slug' => 'hA3DwZWM4NNDQ8YeN3wE',
                'created_at' => '2023-08-21 12:47:24',
                'updated_at' => '2023-08-21 13:13:47',
            ),
            193 => 
            array (
                'id' => 753,
                'presensi_id' => 53,
                'peserta_id' => 97,
                'sign' => '64e35dab71f51.png',
                'slug' => 'QfzgdwxOPT6Bne72R3ur',
                'created_at' => '2023-08-21 12:47:34',
                'updated_at' => '2023-08-21 12:50:51',
            ),
            194 => 
            array (
                'id' => 754,
                'presensi_id' => 53,
                'peserta_id' => 29,
                'sign' => '64e3665848853.png',
                'slug' => 'RRUDP5dKWOXZqcMe7bIx',
                'created_at' => '2023-08-21 12:47:39',
                'updated_at' => '2023-08-21 13:27:52',
            ),
            195 => 
            array (
                'id' => 755,
                'presensi_id' => 53,
                'peserta_id' => 30,
                'sign' => '64e36b6ed9f19.png',
                'slug' => 'CaR9YAQTU2U4DB6XeooP',
                'created_at' => '2023-08-21 12:47:44',
                'updated_at' => '2023-08-21 13:49:34',
            ),
            196 => 
            array (
                'id' => 756,
                'presensi_id' => 53,
                'peserta_id' => 23,
                'sign' => NULL,
                'slug' => 't6rQosN2osmWtEeK4qov',
                'created_at' => '2023-08-21 12:56:13',
                'updated_at' => '2023-08-21 12:56:13',
            ),
            197 => 
            array (
                'id' => 757,
                'presensi_id' => 54,
                'peserta_id' => 1,
                'sign' => '64e45209db6e8.png',
                'slug' => 'bAIbwbhZ0RybglC5H0nv',
                'created_at' => '2023-08-22 04:20:18',
                'updated_at' => '2023-08-22 06:13:29',
            ),
            198 => 
            array (
                'id' => 758,
                'presensi_id' => 54,
                'peserta_id' => 25,
                'sign' => '64e48a33d78ec.png',
                'slug' => 'lGNSuss6TcTvu0Ux3EvV',
                'created_at' => '2023-08-22 04:20:45',
                'updated_at' => '2023-08-22 10:13:07',
            ),
            199 => 
            array (
                'id' => 760,
                'presensi_id' => 54,
                'peserta_id' => 26,
                'sign' => '64e459696a8e9.png',
                'slug' => 'UirRXUgJ9o5C4RvhVLtA',
                'created_at' => '2023-08-22 04:22:00',
                'updated_at' => '2023-08-22 06:44:57',
            ),
            200 => 
            array (
                'id' => 762,
                'presensi_id' => 54,
                'peserta_id' => 9,
                'sign' => '64e43994b8b91.png',
                'slug' => 'IgTACCuM2Ny2RSLBjtZu',
                'created_at' => '2023-08-22 04:22:55',
                'updated_at' => '2023-08-22 04:29:08',
            ),
            201 => 
            array (
                'id' => 763,
                'presensi_id' => 54,
                'peserta_id' => 44,
                'sign' => '64e43a20aa9b1.png',
                'slug' => 'clUBzoHxpj9lhxoK2CcN',
                'created_at' => '2023-08-22 04:23:02',
                'updated_at' => '2023-08-22 04:31:28',
            ),
            202 => 
            array (
                'id' => 764,
                'presensi_id' => 54,
                'peserta_id' => 110,
                'sign' => '64e4512c13d34.png',
                'slug' => 'CYBizsutevhPyQ6HAaKk',
                'created_at' => '2023-08-22 04:23:06',
                'updated_at' => '2023-08-22 06:09:48',
            ),
            203 => 
            array (
                'id' => 765,
                'presensi_id' => 54,
                'peserta_id' => 103,
                'sign' => '64e439b1165e3.png',
                'slug' => 'mBUvddGtMTYW4TjZM9iU',
                'created_at' => '2023-08-22 04:23:10',
                'updated_at' => '2023-08-22 04:29:37',
            ),
            204 => 
            array (
                'id' => 766,
                'presensi_id' => 54,
                'peserta_id' => 67,
                'sign' => '64e43a777e774.png',
                'slug' => 'YdpjZkF3oEQIJKlPEjB4',
                'created_at' => '2023-08-22 04:27:06',
                'updated_at' => '2023-08-22 04:32:55',
            ),
            205 => 
            array (
                'id' => 767,
                'presensi_id' => 54,
                'peserta_id' => 55,
                'sign' => '64e44a88a53a1.png',
                'slug' => 'fjk40MObYucuk62vWsT6',
                'created_at' => '2023-08-22 04:28:10',
                'updated_at' => '2023-08-22 05:41:28',
            ),
            206 => 
            array (
                'id' => 768,
                'presensi_id' => 54,
                'peserta_id' => 28,
                'sign' => '64e43a4167dcc.png',
                'slug' => '8LNv5VARsxMowvPJwglv',
                'created_at' => '2023-08-22 04:28:31',
                'updated_at' => '2023-08-22 04:32:01',
            ),
            207 => 
            array (
                'id' => 769,
                'presensi_id' => 54,
                'peserta_id' => 23,
                'sign' => '64e43b5cdb56b.png',
                'slug' => 'UneS30TDMSlL8ATzA8zE',
                'created_at' => '2023-08-22 04:29:15',
                'updated_at' => '2023-08-22 04:36:44',
            ),
            208 => 
            array (
                'id' => 770,
                'presensi_id' => 54,
                'peserta_id' => 51,
                'sign' => '64e44564a4836.png',
                'slug' => 'r1v7FyYLxdTVn7ii4L53',
                'created_at' => '2023-08-22 04:29:21',
                'updated_at' => '2023-08-22 05:19:32',
            ),
            209 => 
            array (
                'id' => 771,
                'presensi_id' => 54,
                'peserta_id' => 29,
                'sign' => '64e43a4dc7cc4.png',
                'slug' => 'Nm4oVecoqss5Q4KEa0hH',
                'created_at' => '2023-08-22 04:29:26',
                'updated_at' => '2023-08-22 04:32:13',
            ),
            210 => 
            array (
                'id' => 772,
                'presensi_id' => 54,
                'peserta_id' => 60,
                'sign' => NULL,
                'slug' => '86M8Fy2ggN1f8PyTkLob',
                'created_at' => '2023-08-22 04:32:33',
                'updated_at' => '2023-08-22 04:32:33',
            ),
            211 => 
            array (
                'id' => 773,
                'presensi_id' => 54,
                'peserta_id' => 52,
                'sign' => '64ed524569401.png',
                'slug' => 'rklEwIdJpbtlEPXPrZ6n',
                'created_at' => '2023-08-22 04:47:16',
                'updated_at' => '2023-08-29 02:04:53',
            ),
            212 => 
            array (
                'id' => 774,
                'presensi_id' => 54,
                'peserta_id' => 31,
                'sign' => '64e43fec090d7.png',
                'slug' => 'uBCRu7zONfzxw8631DEg',
                'created_at' => '2023-08-22 04:52:35',
                'updated_at' => '2023-08-22 04:56:12',
            ),
            213 => 
            array (
                'id' => 775,
                'presensi_id' => 55,
                'peserta_id' => 5,
                'sign' => '64ed71e59cc3c.png',
                'slug' => 'ildcbXjHJFIE2oggZgCu',
                'created_at' => '2023-08-29 04:12:37',
                'updated_at' => '2023-08-29 04:19:49',
            ),
            214 => 
            array (
                'id' => 776,
                'presensi_id' => 55,
                'peserta_id' => 9,
                'sign' => '64ed721305948.png',
                'slug' => 'UUoxvO9sxCtyTGy6jsyh',
                'created_at' => '2023-08-29 04:12:55',
                'updated_at' => '2023-08-29 04:20:35',
            ),
            215 => 
            array (
                'id' => 777,
                'presensi_id' => 55,
                'peserta_id' => 162,
                'sign' => '64ed72b755514.png',
                'slug' => 'YicxOHUBEON6CRDNqtia',
                'created_at' => '2023-08-29 04:13:00',
                'updated_at' => '2023-08-29 04:23:19',
            ),
            216 => 
            array (
                'id' => 778,
                'presensi_id' => 55,
                'peserta_id' => 159,
                'sign' => '64ed729e85869.png',
                'slug' => 'XpLkh2LHINREVPIFnH2D',
                'created_at' => '2023-08-29 04:13:06',
                'updated_at' => '2023-08-29 04:22:54',
            ),
            217 => 
            array (
                'id' => 779,
                'presensi_id' => 55,
                'peserta_id' => 12,
                'sign' => '64eda5b8bf7dd.png',
                'slug' => 'zTSSiStH1jZxVqgzG1f6',
                'created_at' => '2023-08-29 04:13:14',
                'updated_at' => '2023-08-29 08:00:56',
            ),
            218 => 
            array (
                'id' => 780,
                'presensi_id' => 55,
                'peserta_id' => 107,
                'sign' => '64eda55041128.png',
                'slug' => 'UDEWHXCdGhZ5jeytbkmD',
                'created_at' => '2023-08-29 04:13:19',
                'updated_at' => '2023-08-29 07:59:12',
            ),
            219 => 
            array (
                'id' => 781,
                'presensi_id' => 55,
                'peserta_id' => 109,
                'sign' => '64ed72eb8809a.png',
                'slug' => 'kVPP3vrN5TkR7qOlhWQm',
                'created_at' => '2023-08-29 04:13:23',
                'updated_at' => '2023-08-29 04:24:11',
            ),
            220 => 
            array (
                'id' => 782,
                'presensi_id' => 55,
                'peserta_id' => 21,
                'sign' => '64ed75e66b5c9.png',
                'slug' => 'SE6EFcqIi2Y2B5Bl7gU8',
                'created_at' => '2023-08-29 04:13:30',
                'updated_at' => '2023-08-29 04:36:54',
            ),
            221 => 
            array (
                'id' => 783,
                'presensi_id' => 55,
                'peserta_id' => 38,
                'sign' => '64ed734d4ccf8.png',
                'slug' => 'DqR46mtS8KfZXMor9RoU',
                'created_at' => '2023-08-29 04:13:35',
                'updated_at' => '2023-08-29 04:25:49',
            ),
            222 => 
            array (
                'id' => 784,
                'presensi_id' => 55,
                'peserta_id' => 22,
                'sign' => '64ed7617323de.png',
                'slug' => 'olFSjbv1lsva44tP20pf',
                'created_at' => '2023-08-29 04:13:39',
                'updated_at' => '2023-08-29 04:37:43',
            ),
            223 => 
            array (
                'id' => 785,
                'presensi_id' => 55,
                'peserta_id' => 20,
                'sign' => '64ed739e76e45.png',
                'slug' => 'IP9dgGycAO40FsRVO5Ft',
                'created_at' => '2023-08-29 04:13:50',
                'updated_at' => '2023-08-29 04:27:10',
            ),
            224 => 
            array (
                'id' => 786,
                'presensi_id' => 55,
                'peserta_id' => 15,
                'sign' => '64ee76276bc7a.png',
                'slug' => 'SsyBJVgZpZyxg49qy1lX',
                'created_at' => '2023-08-29 04:13:54',
                'updated_at' => '2023-08-29 22:50:15',
            ),
            225 => 
            array (
                'id' => 787,
                'presensi_id' => 55,
                'peserta_id' => 112,
                'sign' => '64eda79590b00.png',
                'slug' => 'ij1OYTH0aLaUgpY0jcqd',
                'created_at' => '2023-08-29 04:14:01',
                'updated_at' => '2023-08-29 08:08:53',
            ),
            226 => 
            array (
                'id' => 788,
                'presensi_id' => 55,
                'peserta_id' => 163,
                'sign' => '64eda8585648a.png',
                'slug' => '9Q45JAU7Tfkkj7Q0v6OT',
                'created_at' => '2023-08-29 04:15:48',
                'updated_at' => '2023-08-29 08:12:08',
            ),
            227 => 
            array (
                'id' => 789,
                'presensi_id' => 55,
                'peserta_id' => 164,
                'sign' => '64ee766513ef2.png',
                'slug' => 'FIZzWrh3JqkfiiIH0Yfm',
                'created_at' => '2023-08-29 04:16:08',
                'updated_at' => '2023-08-29 22:51:17',
            ),
            228 => 
            array (
                'id' => 790,
                'presensi_id' => 55,
                'peserta_id' => 113,
                'sign' => '64ed7425c742b.png',
                'slug' => 'R1mAA7hmBxFrt7OP2vv5',
                'created_at' => '2023-08-29 04:16:19',
                'updated_at' => '2023-08-29 04:29:25',
            ),
            229 => 
            array (
                'id' => 791,
                'presensi_id' => 55,
                'peserta_id' => 99,
                'sign' => '64ed73914539e.png',
                'slug' => 'Fw22g6KaS8CqaLk6a0tN',
                'created_at' => '2023-08-29 04:16:24',
                'updated_at' => '2023-08-29 04:26:57',
            ),
            230 => 
            array (
                'id' => 792,
                'presensi_id' => 55,
                'peserta_id' => 105,
                'sign' => '64ed8104be010.png',
                'slug' => 'n2k72Q8LczPhERen7Qt8',
                'created_at' => '2023-08-29 04:16:30',
                'updated_at' => '2023-08-29 05:24:20',
            ),
            231 => 
            array (
                'id' => 793,
                'presensi_id' => 55,
                'peserta_id' => 152,
                'sign' => '64ee759fd52fe.png',
                'slug' => '1uasrsyVLwQmvpN5bG2M',
                'created_at' => '2023-08-29 04:16:37',
                'updated_at' => '2023-08-29 22:47:59',
            ),
            232 => 
            array (
                'id' => 794,
                'presensi_id' => 56,
                'peserta_id' => 25,
                'sign' => '64ef39f16f102.png',
                'slug' => 'q8X5xGpX5QrHtRJY1WC2',
                'created_at' => '2023-08-30 10:03:55',
                'updated_at' => '2023-08-30 12:45:37',
            ),
            233 => 
            array (
                'id' => 795,
                'presensi_id' => 56,
                'peserta_id' => 26,
                'sign' => '64ef1ae39b3e4.png',
                'slug' => 'pvedd22CawFzYlNN672r',
                'created_at' => '2023-08-30 10:04:11',
                'updated_at' => '2023-08-30 10:33:07',
            ),
            234 => 
            array (
                'id' => 796,
                'presensi_id' => 56,
                'peserta_id' => 52,
                'sign' => '64ef1500ba63b.png',
                'slug' => 'TjaEpwWrlJjOLZRW5wYU',
                'created_at' => '2023-08-30 10:04:26',
                'updated_at' => '2023-08-30 10:08:00',
            ),
            235 => 
            array (
                'id' => 797,
                'presensi_id' => 56,
                'peserta_id' => 30,
                'sign' => '64ef164df2d78.png',
                'slug' => 'wa5pnDoN45sFKTV05uAy',
                'created_at' => '2023-08-30 10:04:31',
                'updated_at' => '2023-08-30 10:13:33',
            ),
            236 => 
            array (
                'id' => 798,
                'presensi_id' => 56,
                'peserta_id' => 29,
                'sign' => '64ef14f2ae781.png',
                'slug' => '4MWDiU2rLp6EfXUlwfW9',
                'created_at' => '2023-08-30 10:04:38',
                'updated_at' => '2023-08-30 10:07:46',
            ),
            237 => 
            array (
                'id' => 799,
                'presensi_id' => 56,
                'peserta_id' => 97,
                'sign' => '64ef15255979f.png',
                'slug' => 'KxWW0Eo6f0xWjJSawc7V',
                'created_at' => '2023-08-30 10:04:44',
                'updated_at' => '2023-08-30 10:08:37',
            ),
            238 => 
            array (
                'id' => 800,
                'presensi_id' => 56,
                'peserta_id' => 31,
                'sign' => NULL,
                'slug' => 'NCMVsRHN2f5ZzgAtEjYl',
                'created_at' => '2023-08-30 10:04:52',
                'updated_at' => '2023-08-30 10:04:52',
            ),
            239 => 
            array (
                'id' => 801,
                'presensi_id' => 56,
                'peserta_id' => 103,
                'sign' => '64ef14f871e4e.png',
                'slug' => 'zXXmkwu6wfexdWVrwxND',
                'created_at' => '2023-08-30 10:04:57',
                'updated_at' => '2023-08-30 10:07:52',
            ),
            240 => 
            array (
                'id' => 802,
                'presensi_id' => 56,
                'peserta_id' => 28,
                'sign' => '64ef190e7a426.png',
                'slug' => 'SevUyDDLh9cdlLngnm3e',
                'created_at' => '2023-08-30 10:05:04',
                'updated_at' => '2023-08-30 10:25:18',
            ),
            241 => 
            array (
                'id' => 804,
                'presensi_id' => 56,
                'peserta_id' => 27,
                'sign' => '64ef1647625b0.png',
                'slug' => 'FA45ryNdg0UGYrB15Oxw',
                'created_at' => '2023-08-30 10:08:58',
                'updated_at' => '2023-08-30 10:13:27',
            ),
            242 => 
            array (
                'id' => 805,
                'presensi_id' => 56,
                'peserta_id' => 23,
                'sign' => NULL,
                'slug' => 'iPcVwtmymT8lzIyaFC65',
                'created_at' => '2023-08-30 10:27:13',
                'updated_at' => '2023-08-30 10:27:13',
            ),
            243 => 
            array (
                'id' => 806,
                'presensi_id' => 57,
                'peserta_id' => 5,
                'sign' => '64f01c61d19de.png',
                'slug' => 'rPGLkAiT0lhhId2H9JOm',
                'created_at' => '2023-08-31 03:57:55',
                'updated_at' => '2023-08-31 04:51:45',
            ),
            244 => 
            array (
                'id' => 807,
                'presensi_id' => 57,
                'peserta_id' => 6,
                'sign' => '64f014df3673f.png',
                'slug' => 'itzyDjITSEeU5YlJDmGG',
                'created_at' => '2023-08-31 04:00:06',
                'updated_at' => '2023-08-31 04:19:43',
            ),
            245 => 
            array (
                'id' => 808,
                'presensi_id' => 57,
                'peserta_id' => 9,
                'sign' => '64f0262f16c4e.png',
                'slug' => 'Y9StLr4hdrccpibOloje',
                'created_at' => '2023-08-31 04:00:17',
                'updated_at' => '2023-08-31 05:33:35',
            ),
            246 => 
            array (
                'id' => 810,
                'presensi_id' => 57,
                'peserta_id' => 162,
                'sign' => '64f05096ba33c.png',
                'slug' => 'AKEpCu6SHHT75Y05JVYe',
                'created_at' => '2023-08-31 04:01:25',
                'updated_at' => '2023-08-31 08:34:30',
            ),
            247 => 
            array (
                'id' => 811,
                'presensi_id' => 57,
                'peserta_id' => 159,
                'sign' => '64f017a1ce83d.png',
                'slug' => '6FZaCpwaf9lnGbUOSgD2',
                'created_at' => '2023-08-31 04:01:32',
                'updated_at' => '2023-08-31 04:31:29',
            ),
            248 => 
            array (
                'id' => 812,
                'presensi_id' => 57,
                'peserta_id' => 11,
                'sign' => '64f0357ad4e1a.png',
                'slug' => 'HsGnZbtnwlosGYfLrPtt',
                'created_at' => '2023-08-31 04:01:38',
                'updated_at' => '2023-08-31 06:38:50',
            ),
            249 => 
            array (
                'id' => 813,
                'presensi_id' => 57,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => '5kjhgWZPZlbXCYYzzRvb',
                'created_at' => '2023-08-31 04:01:46',
                'updated_at' => '2023-08-31 04:01:46',
            ),
            250 => 
            array (
                'id' => 814,
                'presensi_id' => 57,
                'peserta_id' => 107,
                'sign' => '64f014e7c82f7.png',
                'slug' => '3f5qr3xHJRz2AzfMFVSN',
                'created_at' => '2023-08-31 04:01:51',
                'updated_at' => '2023-08-31 04:19:51',
            ),
            251 => 
            array (
                'id' => 815,
                'presensi_id' => 57,
                'peserta_id' => 109,
                'sign' => '64f017afd75bf.png',
                'slug' => '3OhkOJkr1ShRD1Qzp4ef',
                'created_at' => '2023-08-31 04:01:56',
                'updated_at' => '2023-08-31 04:31:43',
            ),
            252 => 
            array (
                'id' => 816,
                'presensi_id' => 57,
                'peserta_id' => 108,
                'sign' => '64f015ddd5573.png',
                'slug' => 'vnvzb7VGyzPMzMxvjaU8',
                'created_at' => '2023-08-31 04:02:01',
                'updated_at' => '2023-08-31 04:23:57',
            ),
            253 => 
            array (
                'id' => 817,
                'presensi_id' => 57,
                'peserta_id' => 21,
                'sign' => '64f01764c23d1.png',
                'slug' => '4VUQyXnpbDIgrLT5pqkK',
                'created_at' => '2023-08-31 04:02:07',
                'updated_at' => '2023-08-31 04:30:28',
            ),
            254 => 
            array (
                'id' => 818,
                'presensi_id' => 57,
                'peserta_id' => 22,
                'sign' => '64f016910231b.png',
                'slug' => 'VxEzh8B0jTUquiL8aphd',
                'created_at' => '2023-08-31 04:02:12',
                'updated_at' => '2023-08-31 04:26:57',
            ),
            255 => 
            array (
                'id' => 819,
                'presensi_id' => 57,
                'peserta_id' => 38,
                'sign' => '64f02c9f84873.png',
                'slug' => '1DztZStJGF1Lm73IQZpU',
                'created_at' => '2023-08-31 04:02:19',
                'updated_at' => '2023-08-31 06:01:03',
            ),
            256 => 
            array (
                'id' => 820,
                'presensi_id' => 57,
                'peserta_id' => 151,
                'sign' => '64f0161a0d9c6.png',
                'slug' => 'alc2Mmgm7VT6Or9dvjIO',
                'created_at' => '2023-08-31 04:02:32',
                'updated_at' => '2023-08-31 04:24:58',
            ),
            257 => 
            array (
                'id' => 821,
                'presensi_id' => 57,
                'peserta_id' => 111,
                'sign' => '64f071b0a9a86.png',
                'slug' => 'jWdTiIKMfkbA3cqNGTV9',
                'created_at' => '2023-08-31 04:02:47',
                'updated_at' => '2023-08-31 10:55:44',
            ),
            258 => 
            array (
                'id' => 822,
                'presensi_id' => 57,
                'peserta_id' => 165,
                'sign' => NULL,
                'slug' => '7lSBDpwKYKEXzjiRnkIg',
                'created_at' => '2023-08-31 04:18:19',
                'updated_at' => '2023-08-31 04:18:19',
            ),
            259 => 
            array (
                'id' => 823,
                'presensi_id' => 57,
                'peserta_id' => 166,
                'sign' => '64f019a9715a2.png',
                'slug' => 'vE3cIiwqHK1LX37ml4uF',
                'created_at' => '2023-08-31 04:18:33',
                'updated_at' => '2023-08-31 04:40:09',
            ),
            260 => 
            array (
                'id' => 824,
                'presensi_id' => 57,
                'peserta_id' => 167,
                'sign' => NULL,
                'slug' => 'pA34ThcgQ6fP7fIIKSZ3',
                'created_at' => '2023-08-31 04:18:46',
                'updated_at' => '2023-08-31 04:18:46',
            ),
            261 => 
            array (
                'id' => 825,
                'presensi_id' => 58,
                'peserta_id' => 5,
                'sign' => '64f1a71aad30f.png',
                'slug' => 'eWXdfbZRkFWtpMUe0ZXa',
                'created_at' => '2023-09-01 03:01:29',
                'updated_at' => '2023-09-01 08:55:54',
            ),
            262 => 
            array (
                'id' => 826,
                'presensi_id' => 58,
                'peserta_id' => 6,
                'sign' => '64f1a70595728.png',
                'slug' => 'C1MaClchQXsqPOydMZH8',
                'created_at' => '2023-09-01 03:01:46',
                'updated_at' => '2023-09-01 08:55:33',
            ),
            263 => 
            array (
                'id' => 827,
                'presensi_id' => 58,
                'peserta_id' => 9,
                'sign' => '64f1a9689f85d.png',
                'slug' => 'Tv3uOguQM6x7FcBUVMGK',
                'created_at' => '2023-09-01 03:01:52',
                'updated_at' => '2023-09-01 09:05:44',
            ),
            264 => 
            array (
                'id' => 828,
                'presensi_id' => 58,
                'peserta_id' => 162,
                'sign' => '64f1b5628c487.png',
                'slug' => 'w78p4rA5rfgIJR0leNum',
                'created_at' => '2023-09-01 03:01:58',
                'updated_at' => '2023-09-01 09:56:50',
            ),
            265 => 
            array (
                'id' => 829,
                'presensi_id' => 58,
                'peserta_id' => 159,
                'sign' => '64f1ab28b0df2.png',
                'slug' => 'uv7kfZXj4mwzFdY4F0Ku',
                'created_at' => '2023-09-01 03:02:03',
                'updated_at' => '2023-09-01 09:13:12',
            ),
            266 => 
            array (
                'id' => 830,
                'presensi_id' => 58,
                'peserta_id' => 12,
                'sign' => '64f1ab773cdc8.png',
                'slug' => 'WOZZAUYegn3Sz3P5qkxi',
                'created_at' => '2023-09-01 03:02:08',
                'updated_at' => '2023-09-01 09:14:31',
            ),
            267 => 
            array (
                'id' => 831,
                'presensi_id' => 58,
                'peserta_id' => 11,
                'sign' => '64f1ae0abd0a8.png',
                'slug' => '3uJlkQLm7qUJGkHAs8P2',
                'created_at' => '2023-09-01 03:02:35',
                'updated_at' => '2023-09-01 09:25:30',
            ),
            268 => 
            array (
                'id' => 832,
                'presensi_id' => 58,
                'peserta_id' => 107,
                'sign' => '64f15496d94f5.png',
                'slug' => 'w19pZV48kAsZoAmD5sZy',
                'created_at' => '2023-09-01 03:02:42',
                'updated_at' => '2023-09-01 03:03:50',
            ),
            269 => 
            array (
                'id' => 833,
                'presensi_id' => 58,
                'peserta_id' => 108,
                'sign' => '64f1b33f9d783.png',
                'slug' => 'asOIvJZP6H4IZdfi6NsR',
                'created_at' => '2023-09-01 03:02:49',
                'updated_at' => '2023-09-01 09:47:43',
            ),
            270 => 
            array (
                'id' => 834,
                'presensi_id' => 58,
                'peserta_id' => 109,
                'sign' => '64f2ae1c71641.png',
                'slug' => 'mMQJFcF2RodgL1yL15cX',
                'created_at' => '2023-09-01 03:02:54',
                'updated_at' => '2023-09-02 03:38:04',
            ),
            271 => 
            array (
                'id' => 835,
                'presensi_id' => 58,
                'peserta_id' => 21,
                'sign' => '64f1b31c9bdc7.png',
                'slug' => 'AsisvxVPwBmYBN9yaBme',
                'created_at' => '2023-09-01 03:03:02',
                'updated_at' => '2023-09-01 09:47:08',
            ),
            272 => 
            array (
                'id' => 836,
                'presensi_id' => 58,
                'peserta_id' => 38,
                'sign' => '64f1a836bd4df.png',
                'slug' => '1pNDgrliortx86qj2xun',
                'created_at' => '2023-09-01 03:03:07',
                'updated_at' => '2023-09-01 09:00:38',
            ),
            273 => 
            array (
                'id' => 837,
                'presensi_id' => 58,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'dvWQFsSIH0fNHqDhDlkN',
                'created_at' => '2023-09-01 03:03:12',
                'updated_at' => '2023-09-01 03:03:12',
            ),
            274 => 
            array (
                'id' => 838,
                'presensi_id' => 58,
                'peserta_id' => 151,
                'sign' => '64f1ab9984103.png',
                'slug' => 'IGxFDokKp5kwIU1hZBnp',
                'created_at' => '2023-09-01 03:03:19',
                'updated_at' => '2023-09-01 09:15:05',
            ),
            275 => 
            array (
                'id' => 840,
                'presensi_id' => 58,
                'peserta_id' => 105,
                'sign' => '64f1acc5002d8.png',
                'slug' => 'nkhbkINXyBZEVj4onU92',
                'created_at' => '2023-09-01 03:03:30',
                'updated_at' => '2023-09-01 09:20:05',
            ),
            276 => 
            array (
                'id' => 841,
                'presensi_id' => 58,
                'peserta_id' => 152,
                'sign' => '64f1abc191872.png',
                'slug' => 'vd6FynWP1SzB1i4Xz2cV',
                'created_at' => '2023-09-01 03:03:35',
                'updated_at' => '2023-09-01 09:15:45',
            ),
            277 => 
            array (
                'id' => 842,
                'presensi_id' => 58,
                'peserta_id' => 144,
                'sign' => '64f1ab8cf2476.png',
                'slug' => 'MYPeGQHdCoYZyLbDBw6u',
                'created_at' => '2023-09-01 03:03:41',
                'updated_at' => '2023-09-01 09:14:52',
            ),
            278 => 
            array (
                'id' => 843,
                'presensi_id' => 59,
                'peserta_id' => 5,
                'sign' => '64f57184494eb.png',
                'slug' => 'UI28KKhcsvnUqnjb7ldC',
                'created_at' => '2023-09-04 02:12:43',
                'updated_at' => '2023-09-04 05:56:20',
            ),
            279 => 
            array (
                'id' => 844,
                'presensi_id' => 59,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => '3cZGGxMZ1B1mDLj7b65f',
                'created_at' => '2023-09-04 02:12:52',
                'updated_at' => '2023-09-04 02:12:52',
            ),
            280 => 
            array (
                'id' => 845,
                'presensi_id' => 59,
                'peserta_id' => 9,
                'sign' => '64f5746db80cf.png',
                'slug' => 'v2hIMEqUau8JCgGc0IgT',
                'created_at' => '2023-09-04 02:12:57',
                'updated_at' => '2023-09-04 06:08:45',
            ),
            281 => 
            array (
                'id' => 846,
                'presensi_id' => 59,
                'peserta_id' => 159,
                'sign' => '64f5780d70bb1.png',
                'slug' => 'e37WrqBhIkr20GqrvSS4',
                'created_at' => '2023-09-04 02:13:03',
                'updated_at' => '2023-09-04 06:24:13',
            ),
            282 => 
            array (
                'id' => 847,
                'presensi_id' => 59,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'APREC2jdauYQ8b2z2iH5',
                'created_at' => '2023-09-04 02:13:08',
                'updated_at' => '2023-09-04 02:13:08',
            ),
            283 => 
            array (
                'id' => 848,
                'presensi_id' => 59,
                'peserta_id' => 162,
                'sign' => '64f571e7e81cb.png',
                'slug' => 'cUY3F4SDyt6REzIcpwZK',
                'created_at' => '2023-09-04 02:13:13',
                'updated_at' => '2023-09-04 05:57:59',
            ),
            284 => 
            array (
                'id' => 849,
                'presensi_id' => 59,
                'peserta_id' => 12,
                'sign' => '64f5774f95d38.png',
                'slug' => 'hHEeXcDeQ5YSfUp8ffc2',
                'created_at' => '2023-09-04 02:13:18',
                'updated_at' => '2023-09-04 06:21:03',
            ),
            285 => 
            array (
                'id' => 850,
                'presensi_id' => 59,
                'peserta_id' => 107,
                'sign' => '64f574dec9fbe.png',
                'slug' => '0F3U87okIv99ZY7n26d8',
                'created_at' => '2023-09-04 02:13:24',
                'updated_at' => '2023-09-04 06:10:38',
            ),
            286 => 
            array (
                'id' => 851,
                'presensi_id' => 59,
                'peserta_id' => 108,
                'sign' => '64f5937e8a5b5.png',
                'slug' => 'wtlPkDw7rlMFKqhfynFj',
                'created_at' => '2023-09-04 02:13:29',
                'updated_at' => '2023-09-04 08:21:18',
            ),
            287 => 
            array (
                'id' => 852,
                'presensi_id' => 59,
                'peserta_id' => 109,
                'sign' => '64f57368a483c.png',
                'slug' => 'aMkyQRIdNtmW7VE9KwLe',
                'created_at' => '2023-09-04 02:13:34',
                'updated_at' => '2023-09-04 06:04:24',
            ),
            288 => 
            array (
                'id' => 853,
                'presensi_id' => 59,
                'peserta_id' => 21,
                'sign' => '64f574a96e91a.png',
                'slug' => 'VeSAOPP23Gz1pYG19zG3',
                'created_at' => '2023-09-04 02:13:39',
                'updated_at' => '2023-09-04 06:09:45',
            ),
            289 => 
            array (
                'id' => 854,
                'presensi_id' => 59,
                'peserta_id' => 22,
                'sign' => '64f586e039dfa.png',
                'slug' => '65taJLOMvrmOow7Du0E7',
                'created_at' => '2023-09-04 02:13:54',
                'updated_at' => '2023-09-04 07:27:28',
            ),
            290 => 
            array (
                'id' => 855,
                'presensi_id' => 59,
                'peserta_id' => 38,
                'sign' => '64f57402e5b1c.png',
                'slug' => 'hGvSI4IKPQ3X5tEBCH65',
                'created_at' => '2023-09-04 02:13:59',
                'updated_at' => '2023-09-04 06:06:58',
            ),
            291 => 
            array (
                'id' => 856,
                'presensi_id' => 59,
                'peserta_id' => 111,
                'sign' => '64f57785ccf3f.png',
                'slug' => 'kn1cYE1qA4eBp7vdfzzi',
                'created_at' => '2023-09-04 02:14:17',
                'updated_at' => '2023-09-04 06:21:57',
            ),
            292 => 
            array (
                'id' => 857,
                'presensi_id' => 59,
                'peserta_id' => 151,
                'sign' => '64f573c263e13.png',
                'slug' => '40OoWqrRKWTKkx7EJyFJ',
                'created_at' => '2023-09-04 02:14:23',
                'updated_at' => '2023-09-04 06:05:54',
            ),
            293 => 
            array (
                'id' => 858,
                'presensi_id' => 59,
                'peserta_id' => 113,
                'sign' => '64f5776f05b2f.png',
                'slug' => 'R1l3DIrXYdgVQJ5ZGY6J',
                'created_at' => '2023-09-04 02:14:28',
                'updated_at' => '2023-09-04 06:21:35',
            ),
            294 => 
            array (
                'id' => 859,
                'presensi_id' => 59,
                'peserta_id' => 98,
                'sign' => '64f573e2a10c4.png',
                'slug' => 'uuxP1wQskrfXkRsX33tz',
                'created_at' => '2023-09-04 02:14:35',
                'updated_at' => '2023-09-04 06:06:26',
            ),
            295 => 
            array (
                'id' => 860,
                'presensi_id' => 59,
                'peserta_id' => 105,
                'sign' => '64f575e926c03.png',
                'slug' => 'qs5qRzWYhm3QbMY30oQC',
                'created_at' => '2023-09-04 02:14:44',
                'updated_at' => '2023-09-04 06:15:05',
            ),
            296 => 
            array (
                'id' => 861,
                'presensi_id' => 59,
                'peserta_id' => 152,
                'sign' => '64f58692f107b.png',
                'slug' => 'HyonS3qvaA2Fu4yIbCAA',
                'created_at' => '2023-09-04 02:14:48',
                'updated_at' => '2023-09-04 07:26:10',
            ),
            297 => 
            array (
                'id' => 862,
                'presensi_id' => 59,
                'peserta_id' => 49,
                'sign' => '64f57933c0967.png',
                'slug' => 'HfcxaSLuBfSK8QQeYjHZ',
                'created_at' => '2023-09-04 02:15:02',
                'updated_at' => '2023-09-04 06:29:07',
            ),
            298 => 
            array (
                'id' => 863,
                'presensi_id' => 59,
                'peserta_id' => 89,
                'sign' => NULL,
                'slug' => 'fAlobw10m9Xu1Ed2QfRB',
                'created_at' => '2023-09-04 02:15:06',
                'updated_at' => '2023-09-04 02:15:06',
            ),
            299 => 
            array (
                'id' => 864,
                'presensi_id' => 59,
                'peserta_id' => 91,
                'sign' => '64f57e00aa6d5.png',
                'slug' => 'uLRxprqIjmTupR705O3w',
                'created_at' => '2023-09-04 02:15:11',
                'updated_at' => '2023-09-04 06:49:36',
            ),
            300 => 
            array (
                'id' => 865,
                'presensi_id' => 59,
                'peserta_id' => 83,
                'sign' => '64f6b0f14f9f9.png',
                'slug' => 'CfJQWe760IIUBZChP3V2',
                'created_at' => '2023-09-04 02:15:19',
                'updated_at' => '2023-09-05 04:39:13',
            ),
            301 => 
            array (
                'id' => 866,
                'presensi_id' => 59,
                'peserta_id' => 16,
                'sign' => '64f57528338a7.png',
                'slug' => 'LB41cgs1sx7yTGeLGuoG',
                'created_at' => '2023-09-04 02:15:27',
                'updated_at' => '2023-09-04 06:11:52',
            ),
            302 => 
            array (
                'id' => 867,
                'presensi_id' => 59,
                'peserta_id' => 8,
                'sign' => NULL,
                'slug' => 'bfGMdmjxPZBDKomkTaRi',
                'created_at' => '2023-09-04 02:15:33',
                'updated_at' => '2023-09-04 02:15:33',
            ),
            303 => 
            array (
                'id' => 868,
                'presensi_id' => 59,
                'peserta_id' => 86,
                'sign' => '64f5861be4fed.png',
                'slug' => 'YhI4dCGqKa67X0QmAczB',
                'created_at' => '2023-09-04 02:15:47',
                'updated_at' => '2023-09-04 07:24:11',
            ),
            304 => 
            array (
                'id' => 869,
                'presensi_id' => 59,
                'peserta_id' => 119,
                'sign' => '64f574904ea20.png',
                'slug' => 'ai5GwrJae2GjDCjcuIpb',
                'created_at' => '2023-09-04 02:16:51',
                'updated_at' => '2023-09-04 06:09:20',
            ),
            305 => 
            array (
                'id' => 870,
                'presensi_id' => 59,
                'peserta_id' => 57,
                'sign' => '64f578c012b9d.png',
                'slug' => 'DOKcmp43K6sBkRTOGAbN',
                'created_at' => '2023-09-04 02:16:55',
                'updated_at' => '2023-09-04 06:27:12',
            ),
            306 => 
            array (
                'id' => 871,
                'presensi_id' => 59,
                'peserta_id' => 32,
                'sign' => '64f57e32124ce.png',
                'slug' => 'rDBSavdUA1PRM5UGEbav',
                'created_at' => '2023-09-04 02:26:20',
                'updated_at' => '2023-09-04 06:50:26',
            ),
            307 => 
            array (
                'id' => 872,
                'presensi_id' => 60,
                'peserta_id' => 5,
                'sign' => '64f6b5ea2868d.png',
                'slug' => '0PehqF2Se4sxbBpfOtZt',
                'created_at' => '2023-09-05 00:18:44',
                'updated_at' => '2023-09-05 05:00:26',
            ),
            308 => 
            array (
                'id' => 873,
                'presensi_id' => 60,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'r2qGa6Ia3ev2GrDkkGnT',
                'created_at' => '2023-09-05 00:19:42',
                'updated_at' => '2023-09-05 00:19:42',
            ),
            309 => 
            array (
                'id' => 874,
                'presensi_id' => 60,
                'peserta_id' => 9,
                'sign' => '64f6c1a02e8d7.png',
                'slug' => 'fqw74CLSp9Yf3M2kJCHr',
                'created_at' => '2023-09-05 00:19:50',
                'updated_at' => '2023-09-05 05:50:24',
            ),
            310 => 
            array (
                'id' => 875,
                'presensi_id' => 60,
                'peserta_id' => 162,
                'sign' => '64f6ae8828fc5.png',
                'slug' => '7VbNgjOMCNMvQXP9RJaW',
                'created_at' => '2023-09-05 00:20:18',
                'updated_at' => '2023-09-05 04:28:56',
            ),
            311 => 
            array (
                'id' => 876,
                'presensi_id' => 60,
                'peserta_id' => 159,
                'sign' => '64f6b0e591e76.png',
                'slug' => 'pWwCjQdA7UHxVTmz4y3c',
                'created_at' => '2023-09-05 00:20:24',
                'updated_at' => '2023-09-05 04:39:01',
            ),
            312 => 
            array (
                'id' => 877,
                'presensi_id' => 60,
                'peserta_id' => 11,
                'sign' => '64f6b3bb6a07c.png',
                'slug' => '8zq0wqt8jWtRVG9YzVNl',
                'created_at' => '2023-09-05 00:20:37',
                'updated_at' => '2023-09-05 04:51:07',
            ),
            313 => 
            array (
                'id' => 878,
                'presensi_id' => 60,
                'peserta_id' => 12,
                'sign' => '64f6b480e3bbc.png',
                'slug' => 'YJ6OxDYhtllC66Mxp5bA',
                'created_at' => '2023-09-05 00:20:42',
                'updated_at' => '2023-09-05 04:54:24',
            ),
            314 => 
            array (
                'id' => 879,
                'presensi_id' => 60,
                'peserta_id' => 107,
                'sign' => '64f6aeb9a734a.png',
                'slug' => '5Pk8lL9yYdGu9NM538Sl',
                'created_at' => '2023-09-05 00:28:56',
                'updated_at' => '2023-09-05 04:29:45',
            ),
            315 => 
            array (
                'id' => 880,
                'presensi_id' => 60,
                'peserta_id' => 108,
                'sign' => '64f6baf8754a8.png',
                'slug' => 'aMb97q2QhEe2jRA9pOAj',
                'created_at' => '2023-09-05 00:29:01',
                'updated_at' => '2023-09-05 05:22:00',
            ),
            316 => 
            array (
                'id' => 881,
                'presensi_id' => 60,
                'peserta_id' => 109,
                'sign' => '64f6af3692841.png',
                'slug' => '2L0UXJvP5sB8u8boNLtL',
                'created_at' => '2023-09-05 00:29:06',
                'updated_at' => '2023-09-05 04:31:50',
            ),
            317 => 
            array (
                'id' => 882,
                'presensi_id' => 60,
                'peserta_id' => 21,
                'sign' => '64f6b1b5b7eb1.png',
                'slug' => 'vMEnU0DJcztpy68g5YcL',
                'created_at' => '2023-09-05 00:29:12',
                'updated_at' => '2023-09-05 04:42:29',
            ),
            318 => 
            array (
                'id' => 883,
                'presensi_id' => 60,
                'peserta_id' => 22,
                'sign' => '64f6c5bde4fdb.png',
                'slug' => 'IfVlCT30Dz78zsqOKQkh',
                'created_at' => '2023-09-05 00:29:17',
                'updated_at' => '2023-09-05 06:07:57',
            ),
            319 => 
            array (
                'id' => 884,
                'presensi_id' => 60,
                'peserta_id' => 38,
                'sign' => '64feafb1b55ad.png',
                'slug' => '0QbDJyOjX5xlC2RCmF9E',
                'created_at' => '2023-09-05 00:29:22',
                'updated_at' => '2023-09-11 06:12:01',
            ),
            320 => 
            array (
                'id' => 885,
                'presensi_id' => 60,
                'peserta_id' => 113,
                'sign' => '64f6af4b20ef8.png',
                'slug' => 'CalunRzOsaBv0oBgEQ13',
                'created_at' => '2023-09-05 00:30:48',
                'updated_at' => '2023-09-05 04:32:11',
            ),
            321 => 
            array (
                'id' => 886,
                'presensi_id' => 60,
                'peserta_id' => 98,
                'sign' => NULL,
                'slug' => 'tpSVCmfxBPhSiQ9um0el',
                'created_at' => '2023-09-05 00:30:53',
                'updated_at' => '2023-09-05 00:30:53',
            ),
            322 => 
            array (
                'id' => 887,
                'presensi_id' => 60,
                'peserta_id' => 105,
                'sign' => '64f9919983009.png',
                'slug' => '2jTP1cunNYqg6iWPw80Y',
                'created_at' => '2023-09-05 00:31:11',
                'updated_at' => '2023-09-07 09:02:17',
            ),
            323 => 
            array (
                'id' => 888,
                'presensi_id' => 60,
                'peserta_id' => 152,
                'sign' => '64f6c24e66361.png',
                'slug' => 'UaZNdkBAsK4AmSC5dVr1',
                'created_at' => '2023-09-05 00:31:16',
                'updated_at' => '2023-09-05 05:53:18',
            ),
            324 => 
            array (
                'id' => 889,
                'presensi_id' => 60,
                'peserta_id' => 100,
                'sign' => '64f70a415bee0.png',
                'slug' => 'Ylm78YVn2hKwj2oqPHmf',
                'created_at' => '2023-09-05 00:31:25',
                'updated_at' => '2023-09-05 11:00:17',
            ),
            325 => 
            array (
                'id' => 890,
                'presensi_id' => 60,
                'peserta_id' => 102,
                'sign' => '64f722ac0b40a.png',
                'slug' => 'YjHTkuzTstR9VR4eCh57',
                'created_at' => '2023-09-05 00:33:03',
                'updated_at' => '2023-09-05 12:44:28',
            ),
            326 => 
            array (
                'id' => 891,
                'presensi_id' => 60,
                'peserta_id' => 83,
                'sign' => '64f6b11674597.png',
                'slug' => '7l9LTsSGF9FkAHfFQF7B',
                'created_at' => '2023-09-05 00:33:17',
                'updated_at' => '2023-09-05 04:39:50',
            ),
            327 => 
            array (
                'id' => 892,
                'presensi_id' => 60,
                'peserta_id' => 77,
                'sign' => NULL,
                'slug' => '4ud8SkXRORVY3kB60msa',
                'created_at' => '2023-09-05 00:33:21',
                'updated_at' => '2023-09-05 00:33:21',
            ),
            328 => 
            array (
                'id' => 893,
                'presensi_id' => 60,
                'peserta_id' => 79,
                'sign' => NULL,
                'slug' => 'x8LKLCsOMjxafWRCfpyj',
                'created_at' => '2023-09-05 00:33:27',
                'updated_at' => '2023-09-05 00:33:27',
            ),
            329 => 
            array (
                'id' => 894,
                'presensi_id' => 60,
                'peserta_id' => 168,
                'sign' => NULL,
                'slug' => 'b798qDQVBKQTDh7SnJfM',
                'created_at' => '2023-09-05 00:36:31',
                'updated_at' => '2023-09-05 00:36:31',
            ),
            330 => 
            array (
                'id' => 895,
                'presensi_id' => 60,
                'peserta_id' => 169,
                'sign' => '64f70bb855169.png',
                'slug' => 'ZOvOaAqtY7CeJSqYlVxS',
                'created_at' => '2023-09-05 00:37:19',
                'updated_at' => '2023-09-05 11:06:32',
            ),
            331 => 
            array (
                'id' => 896,
                'presensi_id' => 60,
                'peserta_id' => 170,
                'sign' => NULL,
                'slug' => '5gj5JjeFukJnivpVZUB9',
                'created_at' => '2023-09-05 00:40:14',
                'updated_at' => '2023-09-05 00:40:14',
            ),
            332 => 
            array (
                'id' => 897,
                'presensi_id' => 61,
                'peserta_id' => 5,
                'sign' => '64f98ed35241d.png',
                'slug' => '0OuM1raqKeJ9TRle3lxp',
                'created_at' => '2023-09-07 00:29:53',
                'updated_at' => '2023-09-07 08:50:27',
            ),
            333 => 
            array (
                'id' => 898,
                'presensi_id' => 61,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'bUEl9QYELQoxgUXHzq7S',
                'created_at' => '2023-09-07 00:30:42',
                'updated_at' => '2023-09-07 00:30:42',
            ),
            334 => 
            array (
                'id' => 899,
                'presensi_id' => 61,
                'peserta_id' => 9,
                'sign' => '64f9a11d8c3af.png',
                'slug' => 'tJcYHQ775tYepXvRgyAC',
                'created_at' => '2023-09-07 00:30:47',
                'updated_at' => '2023-09-07 10:08:29',
            ),
            335 => 
            array (
                'id' => 900,
                'presensi_id' => 61,
                'peserta_id' => 162,
                'sign' => '64f98f0550a4c.png',
                'slug' => 'Xfax3w3c95LmULDLud7C',
                'created_at' => '2023-09-07 00:30:53',
                'updated_at' => '2023-09-07 08:51:17',
            ),
            336 => 
            array (
                'id' => 901,
                'presensi_id' => 61,
                'peserta_id' => 159,
                'sign' => '64f98f1702400.png',
                'slug' => 'cm7m3Zl9wM7EBMvaAdQE',
                'created_at' => '2023-09-07 00:30:59',
                'updated_at' => '2023-09-07 08:51:35',
            ),
            337 => 
            array (
                'id' => 902,
                'presensi_id' => 61,
                'peserta_id' => 11,
                'sign' => '64f998e546a0b.png',
                'slug' => 'ErtcLCwruavFJIdaNP9b',
                'created_at' => '2023-09-07 00:31:04',
                'updated_at' => '2023-09-07 09:33:25',
            ),
            338 => 
            array (
                'id' => 903,
                'presensi_id' => 61,
                'peserta_id' => 12,
                'sign' => '64f98f8a6e4bc.png',
                'slug' => 'RAOFyRU0kh0BA0qI1CfV',
                'created_at' => '2023-09-07 00:31:09',
                'updated_at' => '2023-09-07 08:53:30',
            ),
            339 => 
            array (
                'id' => 904,
                'presensi_id' => 61,
                'peserta_id' => 107,
                'sign' => '64f98f401a117.png',
                'slug' => 'krqouRAznkXXcRXINPE8',
                'created_at' => '2023-09-07 00:31:15',
                'updated_at' => '2023-09-07 08:52:16',
            ),
            340 => 
            array (
                'id' => 905,
                'presensi_id' => 61,
                'peserta_id' => 108,
                'sign' => '64f99683b8b86.png',
                'slug' => 'A4ZaH58bPc6kn7Z1w7Zr',
                'created_at' => '2023-09-07 00:31:20',
                'updated_at' => '2023-09-07 09:23:15',
            ),
            341 => 
            array (
                'id' => 906,
                'presensi_id' => 61,
                'peserta_id' => 109,
                'sign' => '64f9ad034d1da.png',
                'slug' => 'tndJVVSnTgDW3QQLvf7m',
                'created_at' => '2023-09-07 00:31:26',
                'updated_at' => '2023-09-07 10:59:15',
            ),
            342 => 
            array (
                'id' => 907,
                'presensi_id' => 61,
                'peserta_id' => 21,
                'sign' => '64f99883b40ee.png',
                'slug' => '7dUoFEjM5qkTIbbkh4AE',
                'created_at' => '2023-09-07 00:31:34',
                'updated_at' => '2023-09-07 09:31:47',
            ),
            343 => 
            array (
                'id' => 908,
                'presensi_id' => 61,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'ldskUNQYDomjqLYKmhxt',
                'created_at' => '2023-09-07 00:31:48',
                'updated_at' => '2023-09-07 00:31:48',
            ),
            344 => 
            array (
                'id' => 909,
                'presensi_id' => 61,
                'peserta_id' => 38,
                'sign' => '64f98fcdc6f3c.png',
                'slug' => 'eur0oov0DNeVuPsYoTcx',
                'created_at' => '2023-09-07 00:31:54',
                'updated_at' => '2023-09-07 08:54:37',
            ),
            345 => 
            array (
                'id' => 910,
                'presensi_id' => 61,
                'peserta_id' => 141,
                'sign' => '64f997c982a0b.png',
                'slug' => 'xqFz6lSNP8LojQAN0err',
                'created_at' => '2023-09-07 00:32:07',
                'updated_at' => '2023-09-07 09:28:41',
            ),
            346 => 
            array (
                'id' => 911,
                'presensi_id' => 61,
                'peserta_id' => 142,
                'sign' => NULL,
                'slug' => 'Mp1xbG9cHA2Jvm2G6qU8',
                'created_at' => '2023-09-07 00:32:12',
                'updated_at' => '2023-09-07 00:32:12',
            ),
            347 => 
            array (
                'id' => 912,
                'presensi_id' => 61,
                'peserta_id' => 143,
                'sign' => '64f991c45fd57.png',
                'slug' => 'wFLDIcgeLo256Rvy0vtm',
                'created_at' => '2023-09-07 00:32:44',
                'updated_at' => '2023-09-07 09:03:00',
            ),
            348 => 
            array (
                'id' => 913,
                'presensi_id' => 61,
                'peserta_id' => 113,
                'sign' => '64f990d188214.png',
                'slug' => 'U7wKVBTPML2UZnKk1YOj',
                'created_at' => '2023-09-07 00:32:52',
                'updated_at' => '2023-09-07 08:58:57',
            ),
            349 => 
            array (
                'id' => 914,
                'presensi_id' => 61,
                'peserta_id' => 98,
                'sign' => '64f99005bea22.png',
                'slug' => 'ukF6VyGCmeWb2dlyKSo2',
                'created_at' => '2023-09-07 00:32:57',
                'updated_at' => '2023-09-07 08:55:33',
            ),
            350 => 
            array (
                'id' => 915,
                'presensi_id' => 61,
                'peserta_id' => 105,
                'sign' => '64f991a3b1a00.png',
                'slug' => 'DZSSSEUxCK654otAm0Hy',
                'created_at' => '2023-09-07 00:33:04',
                'updated_at' => '2023-09-07 09:02:27',
            ),
            351 => 
            array (
                'id' => 916,
                'presensi_id' => 61,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'qH6Pi1X3uthtAvBJ7mle',
                'created_at' => '2023-09-07 00:33:10',
                'updated_at' => '2023-09-07 00:33:10',
            ),
            352 => 
            array (
                'id' => 917,
                'presensi_id' => 62,
                'peserta_id' => 5,
                'sign' => '64feab24102b7.png',
                'slug' => 'MDuEo4j8zC2Jk9r663f3',
                'created_at' => '2023-09-11 05:29:54',
                'updated_at' => '2023-09-11 05:52:36',
            ),
            353 => 
            array (
                'id' => 918,
                'presensi_id' => 62,
                'peserta_id' => 6,
                'sign' => '6500edc579db4.png',
                'slug' => 'YSEb6y2xHD3uANrgG0w1',
                'created_at' => '2023-09-11 05:30:05',
                'updated_at' => '2023-09-12 23:01:25',
            ),
            354 => 
            array (
                'id' => 919,
                'presensi_id' => 62,
                'peserta_id' => 9,
                'sign' => '64feac6c7085b.png',
                'slug' => 'ucT9CJzDY9xbucWeYLGD',
                'created_at' => '2023-09-11 05:30:15',
                'updated_at' => '2023-09-11 05:58:04',
            ),
            355 => 
            array (
                'id' => 920,
                'presensi_id' => 62,
                'peserta_id' => 162,
                'sign' => '64fea9b24b04d.png',
                'slug' => 'tPolZ1B05lvVcXFhMCAq',
                'created_at' => '2023-09-11 05:31:01',
                'updated_at' => '2023-09-11 05:46:26',
            ),
            356 => 
            array (
                'id' => 921,
                'presensi_id' => 62,
                'peserta_id' => 159,
                'sign' => '64feaeff72ca5.png',
                'slug' => 'zoo82ZAv4Oz0qxQvHOuU',
                'created_at' => '2023-09-11 05:31:13',
                'updated_at' => '2023-09-11 06:09:03',
            ),
            357 => 
            array (
                'id' => 922,
                'presensi_id' => 62,
                'peserta_id' => 11,
                'sign' => '64fea9f74051b.png',
                'slug' => 'JccyZ6OyY7ir8cwBq5wQ',
                'created_at' => '2023-09-11 05:31:38',
                'updated_at' => '2023-09-11 05:47:35',
            ),
            358 => 
            array (
                'id' => 923,
                'presensi_id' => 62,
                'peserta_id' => 12,
                'sign' => '64feaadd38b97.png',
                'slug' => 'N0ezPYaYNO80fFxFr2zR',
                'created_at' => '2023-09-11 05:31:44',
                'updated_at' => '2023-09-11 05:51:25',
            ),
            359 => 
            array (
                'id' => 924,
                'presensi_id' => 62,
                'peserta_id' => 107,
                'sign' => '64febffe2d32c.png',
                'slug' => 'LgUKDOWDSVukdjeYfKoq',
                'created_at' => '2023-09-11 05:32:00',
                'updated_at' => '2023-09-11 07:21:34',
            ),
            360 => 
            array (
                'id' => 925,
                'presensi_id' => 62,
                'peserta_id' => 108,
                'sign' => '64fea9b7a16d9.png',
                'slug' => 'HsO4QIF8lvOBM4ga6Kzz',
                'created_at' => '2023-09-11 05:32:06',
                'updated_at' => '2023-09-11 05:46:31',
            ),
            361 => 
            array (
                'id' => 926,
                'presensi_id' => 62,
                'peserta_id' => 109,
                'sign' => '64feb2c4910f3.png',
                'slug' => 'Vue2nw10rp3X8TtlFEXF',
                'created_at' => '2023-09-11 05:32:10',
                'updated_at' => '2023-09-11 06:25:08',
            ),
            362 => 
            array (
                'id' => 927,
                'presensi_id' => 62,
                'peserta_id' => 21,
                'sign' => '64feab6244382.png',
                'slug' => 'Tw363H2v5sGHFxFz7SEM',
                'created_at' => '2023-09-11 05:32:14',
                'updated_at' => '2023-09-11 05:53:38',
            ),
            363 => 
            array (
                'id' => 928,
                'presensi_id' => 62,
                'peserta_id' => 22,
                'sign' => '6500edfc03784.png',
                'slug' => 'NNmhEdEok8EO2wDKgcvZ',
                'created_at' => '2023-09-11 05:32:19',
                'updated_at' => '2023-09-12 23:02:20',
            ),
            364 => 
            array (
                'id' => 929,
                'presensi_id' => 62,
                'peserta_id' => 38,
                'sign' => '64feafa17a267.png',
                'slug' => 'zeDvQveVinDIjnDo0nDF',
                'created_at' => '2023-09-11 05:32:23',
                'updated_at' => '2023-09-11 06:11:45',
            ),
            365 => 
            array (
                'id' => 930,
                'presensi_id' => 62,
                'peserta_id' => 52,
                'sign' => '6500ee1ad2d9d.png',
                'slug' => 'n60C8u6CKfciWxekTAqT',
                'created_at' => '2023-09-11 05:32:30',
                'updated_at' => '2023-09-12 23:02:50',
            ),
            366 => 
            array (
                'id' => 931,
                'presensi_id' => 62,
                'peserta_id' => 27,
                'sign' => '64febcc6792d7.png',
                'slug' => 'JfAV9CBwntw60VN7tkRh',
                'created_at' => '2023-09-11 05:32:45',
                'updated_at' => '2023-09-11 07:07:50',
            ),
            367 => 
            array (
                'id' => 932,
                'presensi_id' => 62,
                'peserta_id' => 14,
                'sign' => NULL,
                'slug' => 'yKy6HpJuxEB7eftepNUH',
                'created_at' => '2023-09-11 05:32:52',
                'updated_at' => '2023-09-11 05:32:52',
            ),
            368 => 
            array (
                'id' => 933,
                'presensi_id' => 62,
                'peserta_id' => 39,
                'sign' => NULL,
                'slug' => 'FMERanhkHHqDfdeerzdO',
                'created_at' => '2023-09-11 05:32:58',
                'updated_at' => '2023-09-11 05:32:58',
            ),
            369 => 
            array (
                'id' => 934,
                'presensi_id' => 62,
                'peserta_id' => 154,
                'sign' => NULL,
                'slug' => 'yHtgdJfNvUpYRMFCZ7r3',
                'created_at' => '2023-09-11 05:33:02',
                'updated_at' => '2023-09-11 05:33:02',
            ),
            370 => 
            array (
                'id' => 935,
                'presensi_id' => 62,
                'peserta_id' => 155,
                'sign' => NULL,
                'slug' => 'sXenH3g9pm204PTQiQzo',
                'created_at' => '2023-09-11 05:33:09',
                'updated_at' => '2023-09-11 05:33:09',
            ),
            371 => 
            array (
                'id' => 936,
                'presensi_id' => 62,
                'peserta_id' => 157,
                'sign' => '64feb0fe33f98.png',
                'slug' => 'EuwLOIgVENPsPh4xgYYp',
                'created_at' => '2023-09-11 05:33:23',
                'updated_at' => '2023-09-11 06:17:34',
            ),
            372 => 
            array (
                'id' => 937,
                'presensi_id' => 62,
                'peserta_id' => 40,
                'sign' => '64feae1a30f08.png',
                'slug' => 'h6Lj9gK1zD59abEvLBPT',
                'created_at' => '2023-09-11 05:33:28',
                'updated_at' => '2023-09-11 06:05:14',
            ),
            373 => 
            array (
                'id' => 938,
                'presensi_id' => 62,
                'peserta_id' => 103,
                'sign' => '64febb71e39c9.png',
                'slug' => 'cWtOCoy8HqN1Ko9CM4nv',
                'created_at' => '2023-09-11 05:33:33',
                'updated_at' => '2023-09-11 07:02:09',
            ),
            374 => 
            array (
                'id' => 943,
                'presensi_id' => 62,
                'peserta_id' => 113,
                'sign' => '64feaa46bd13d.png',
                'slug' => 'qRIgO0rJwl98u0VDoxgo',
                'created_at' => '2023-09-11 05:36:23',
                'updated_at' => '2023-09-11 05:48:54',
            ),
            375 => 
            array (
                'id' => 944,
                'presensi_id' => 62,
                'peserta_id' => 98,
                'sign' => '64feaa5dcbac8.png',
                'slug' => 'Oz58e7q20EFkpeEqiP6m',
                'created_at' => '2023-09-11 05:36:28',
                'updated_at' => '2023-09-11 05:49:17',
            ),
            376 => 
            array (
                'id' => 945,
                'presensi_id' => 62,
                'peserta_id' => 105,
                'sign' => '64feab1be449e.png',
                'slug' => 'dTCPN8mi4Q3UxdXvRQXY',
                'created_at' => '2023-09-11 05:36:36',
                'updated_at' => '2023-09-11 05:52:27',
            ),
            377 => 
            array (
                'id' => 946,
                'presensi_id' => 62,
                'peserta_id' => 152,
                'sign' => '64feab0b2ca16.png',
                'slug' => '3ZHlnaz1bfSERnkj6Sme',
                'created_at' => '2023-09-11 05:36:44',
                'updated_at' => '2023-09-11 05:52:11',
            ),
            378 => 
            array (
                'id' => 947,
                'presensi_id' => 62,
                'peserta_id' => 102,
                'sign' => '64feb133c208a.png',
                'slug' => 'YS0IVZ6jCCC4CSp3Gasq',
                'created_at' => '2023-09-11 05:36:49',
                'updated_at' => '2023-09-11 06:18:27',
            ),
            379 => 
            array (
                'id' => 948,
                'presensi_id' => 62,
                'peserta_id' => 100,
                'sign' => '64fead778e8fb.png',
                'slug' => '5NTwvd6JYcNcDW1NByRK',
                'created_at' => '2023-09-11 05:36:55',
                'updated_at' => '2023-09-11 06:02:31',
            ),
            380 => 
            array (
                'id' => 949,
                'presensi_id' => 63,
                'peserta_id' => 5,
                'sign' => '6500ee547284f.png',
                'slug' => 'RYMk4251h3ELZSXrN3vi',
                'created_at' => '2023-09-11 05:37:47',
                'updated_at' => '2023-09-12 23:03:48',
            ),
            381 => 
            array (
                'id' => 950,
                'presensi_id' => 63,
                'peserta_id' => 9,
                'sign' => '6500ee6453f04.png',
                'slug' => 'XeNgu2XFugOwL5GO87hJ',
                'created_at' => '2023-09-11 05:38:01',
                'updated_at' => '2023-09-12 23:04:04',
            ),
            382 => 
            array (
                'id' => 951,
                'presensi_id' => 63,
                'peserta_id' => 6,
                'sign' => '6500ee727032c.png',
                'slug' => '4nUvQUBm65jTK69tD0qT',
                'created_at' => '2023-09-11 05:38:06',
                'updated_at' => '2023-09-12 23:04:18',
            ),
            383 => 
            array (
                'id' => 952,
                'presensi_id' => 63,
                'peserta_id' => 162,
                'sign' => '6500ee8154864.png',
                'slug' => 'e5AiK4g9EE9ZL1T1cm35',
                'created_at' => '2023-09-11 05:38:13',
                'updated_at' => '2023-09-12 23:04:33',
            ),
            384 => 
            array (
                'id' => 953,
                'presensi_id' => 63,
                'peserta_id' => 159,
                'sign' => '6500eee31c534.png',
                'slug' => 'hxqwHyWQJeuftqxNQpS3',
                'created_at' => '2023-09-11 05:38:18',
                'updated_at' => '2023-09-12 23:06:11',
            ),
            385 => 
            array (
                'id' => 954,
                'presensi_id' => 63,
                'peserta_id' => 11,
                'sign' => '6500ee99417a0.png',
                'slug' => 'r27LA8haYNjJRsZbvIkz',
                'created_at' => '2023-09-11 05:38:24',
                'updated_at' => '2023-09-12 23:04:57',
            ),
            386 => 
            array (
                'id' => 955,
                'presensi_id' => 63,
                'peserta_id' => 12,
                'sign' => '6500eea095dc9.png',
                'slug' => '7jvJOz5S2sQmFaH16s6C',
                'created_at' => '2023-09-11 05:38:31',
                'updated_at' => '2023-09-12 23:05:04',
            ),
            387 => 
            array (
                'id' => 956,
                'presensi_id' => 63,
                'peserta_id' => 107,
                'sign' => '6500eea61ef3a.png',
                'slug' => 'lgMCC7L93lzKqQ7UWxKP',
                'created_at' => '2023-09-11 05:38:47',
                'updated_at' => '2023-09-12 23:05:10',
            ),
            388 => 
            array (
                'id' => 957,
                'presensi_id' => 63,
                'peserta_id' => 108,
                'sign' => '6500eeb4ddfea.png',
                'slug' => 'XsCyPdwDmr8PiANTI6K0',
                'created_at' => '2023-09-11 05:38:56',
                'updated_at' => '2023-09-12 23:05:24',
            ),
            389 => 
            array (
                'id' => 958,
                'presensi_id' => 63,
                'peserta_id' => 109,
                'sign' => '6500eebfef815.png',
                'slug' => 'u2daGLL1NPtyUrWNYhhM',
                'created_at' => '2023-09-11 05:39:01',
                'updated_at' => '2023-09-12 23:05:35',
            ),
            390 => 
            array (
                'id' => 959,
                'presensi_id' => 63,
                'peserta_id' => 128,
                'sign' => NULL,
                'slug' => 'sOrVsYjoJPnpFVWi6zvq',
                'created_at' => '2023-09-11 05:39:17',
                'updated_at' => '2023-09-11 05:39:17',
            ),
            391 => 
            array (
                'id' => 960,
                'presensi_id' => 63,
                'peserta_id' => 129,
                'sign' => '6500f0efdc723.png',
                'slug' => 'BappfIex3DiiiDVh6lG6',
                'created_at' => '2023-09-11 05:39:22',
                'updated_at' => '2023-09-12 23:14:55',
            ),
            392 => 
            array (
                'id' => 961,
                'presensi_id' => 63,
                'peserta_id' => 130,
                'sign' => NULL,
                'slug' => 'tKO8H9mTgofLUjN2kBBb',
                'created_at' => '2023-09-11 05:39:30',
                'updated_at' => '2023-09-11 05:39:30',
            ),
            393 => 
            array (
                'id' => 962,
                'presensi_id' => 63,
                'peserta_id' => 131,
                'sign' => '6500f11bbad30.png',
                'slug' => 'B63NOxNU3mXrLvwIJhOE',
                'created_at' => '2023-09-11 05:39:34',
                'updated_at' => '2023-09-12 23:15:39',
            ),
            394 => 
            array (
                'id' => 963,
                'presensi_id' => 63,
                'peserta_id' => 171,
                'sign' => NULL,
                'slug' => 'qTCW36LCMl0ooZ3xTmWg',
                'created_at' => '2023-09-11 05:39:55',
                'updated_at' => '2023-09-11 05:39:55',
            ),
            395 => 
            array (
                'id' => 965,
                'presensi_id' => 65,
                'peserta_id' => 5,
                'sign' => '6500ef0c453c0.png',
                'slug' => 'Kh3zW8bZR3bZVvc4nAZe',
                'created_at' => '2023-09-11 07:33:54',
                'updated_at' => '2023-09-12 23:06:52',
            ),
            396 => 
            array (
                'id' => 966,
                'presensi_id' => 65,
                'peserta_id' => 6,
                'sign' => '6500ef149ec55.png',
                'slug' => 'eMpir7AvZq3MKhVahpY6',
                'created_at' => '2023-09-11 07:34:10',
                'updated_at' => '2023-09-12 23:07:00',
            ),
            397 => 
            array (
                'id' => 967,
                'presensi_id' => 65,
                'peserta_id' => 9,
                'sign' => '6500ef23aa683.png',
                'slug' => 'ykLaQqhRhCseuX5aluEm',
                'created_at' => '2023-09-11 07:34:14',
                'updated_at' => '2023-09-12 23:07:15',
            ),
            398 => 
            array (
                'id' => 968,
                'presensi_id' => 65,
                'peserta_id' => 162,
                'sign' => '6500ef2ea214f.png',
                'slug' => 'o0YldeQE1evVoOyewJU3',
                'created_at' => '2023-09-11 07:34:19',
                'updated_at' => '2023-09-12 23:07:26',
            ),
            399 => 
            array (
                'id' => 969,
                'presensi_id' => 65,
                'peserta_id' => 159,
                'sign' => '6500ef396ca19.png',
                'slug' => 'bLzi9HvDjE2TCJsqNzpj',
                'created_at' => '2023-09-11 07:34:26',
                'updated_at' => '2023-09-12 23:07:37',
            ),
            400 => 
            array (
                'id' => 970,
                'presensi_id' => 65,
                'peserta_id' => 11,
                'sign' => '6500ef466da12.png',
                'slug' => 'rDYVNMBeG78rwzWTVIHp',
                'created_at' => '2023-09-11 07:34:32',
                'updated_at' => '2023-09-12 23:07:50',
            ),
            401 => 
            array (
                'id' => 971,
                'presensi_id' => 65,
                'peserta_id' => 12,
                'sign' => '6500ef4b0b14c.png',
                'slug' => '8pBhOVqgg6rEBfrpTJQT',
                'created_at' => '2023-09-11 07:34:37',
                'updated_at' => '2023-09-12 23:07:55',
            ),
            402 => 
            array (
                'id' => 972,
                'presensi_id' => 65,
                'peserta_id' => 107,
                'sign' => '6500ef50c73a5.png',
                'slug' => 'D2jss3V2Iq9kM0GNQI4t',
                'created_at' => '2023-09-11 07:34:41',
                'updated_at' => '2023-09-12 23:08:00',
            ),
            403 => 
            array (
                'id' => 973,
                'presensi_id' => 65,
                'peserta_id' => 108,
                'sign' => '6500ef5c0feda.png',
                'slug' => 'dtdLlsrZzQYddX1Jepvw',
                'created_at' => '2023-09-11 07:34:45',
                'updated_at' => '2023-09-12 23:08:12',
            ),
            404 => 
            array (
                'id' => 974,
                'presensi_id' => 65,
                'peserta_id' => 109,
                'sign' => '6500ef62f2421.png',
                'slug' => 'g3MAGS41QuJGU6cjSdAp',
                'created_at' => '2023-09-11 07:34:50',
                'updated_at' => '2023-09-12 23:08:18',
            ),
            405 => 
            array (
                'id' => 975,
                'presensi_id' => 65,
                'peserta_id' => 21,
                'sign' => '6500ef79d4582.png',
                'slug' => 'df4i4hcdiLg9LfPHU8Ra',
                'created_at' => '2023-09-11 07:34:54',
                'updated_at' => '2023-09-12 23:08:41',
            ),
            406 => 
            array (
                'id' => 976,
                'presensi_id' => 65,
                'peserta_id' => 22,
                'sign' => '6500ef8293739.png',
                'slug' => '6OVVqNDOQunVnGalV4y1',
                'created_at' => '2023-09-11 07:34:58',
                'updated_at' => '2023-09-12 23:08:50',
            ),
            407 => 
            array (
                'id' => 977,
                'presensi_id' => 65,
                'peserta_id' => 38,
                'sign' => '6500ef8f42832.png',
                'slug' => 'XjjSnMClOvJBepYvOh5v',
                'created_at' => '2023-09-11 07:35:02',
                'updated_at' => '2023-09-12 23:09:03',
            ),
            408 => 
            array (
                'id' => 978,
                'presensi_id' => 65,
                'peserta_id' => 172,
                'sign' => '64fee70be7c1d.png',
                'slug' => '2bwxmhglaGz6HQLh2jd9',
                'created_at' => '2023-09-11 07:37:08',
                'updated_at' => '2023-09-11 10:08:11',
            ),
            409 => 
            array (
                'id' => 979,
                'presensi_id' => 65,
                'peserta_id' => 123,
                'sign' => '64feced6d7e97.png',
                'slug' => 'vEyHuJW0zVTysFdo8YTL',
                'created_at' => '2023-09-11 07:37:50',
                'updated_at' => '2023-09-11 08:24:54',
            ),
            410 => 
            array (
                'id' => 980,
                'presensi_id' => 65,
                'peserta_id' => 127,
                'sign' => NULL,
                'slug' => 'eIl4P1eFz5xmQYHuHWVx',
                'created_at' => '2023-09-11 07:37:58',
                'updated_at' => '2023-09-11 07:37:58',
            ),
            411 => 
            array (
                'id' => 981,
                'presensi_id' => 65,
                'peserta_id' => 124,
                'sign' => '64fec8a2b2130.png',
                'slug' => '6hKoWRLcoh3YCfmf7bl8',
                'created_at' => '2023-09-11 07:38:11',
                'updated_at' => '2023-09-11 07:58:26',
            ),
            412 => 
            array (
                'id' => 982,
                'presensi_id' => 65,
                'peserta_id' => 125,
                'sign' => NULL,
                'slug' => 'lnDBt6KXyGgkwcKP4Ngl',
                'created_at' => '2023-09-11 07:38:16',
                'updated_at' => '2023-09-11 07:38:16',
            ),
            413 => 
            array (
                'id' => 983,
                'presensi_id' => 65,
                'peserta_id' => 126,
                'sign' => '64fec66dd4ee9.png',
                'slug' => 'Pv1j7LP91d0xjZjq1y2S',
                'created_at' => '2023-09-11 07:38:26',
                'updated_at' => '2023-09-11 07:49:01',
            ),
            414 => 
            array (
                'id' => 984,
                'presensi_id' => 65,
                'peserta_id' => 173,
                'sign' => '64ff0a5cd0120.png',
                'slug' => 'qWOHUwDCOXhGfqJGBJED',
                'created_at' => '2023-09-11 07:39:14',
                'updated_at' => '2023-09-11 12:38:52',
            ),
            415 => 
            array (
                'id' => 985,
                'presensi_id' => 65,
                'peserta_id' => 174,
                'sign' => NULL,
                'slug' => '1goQQ1XC3xGHF3sYXWWF',
                'created_at' => '2023-09-11 07:40:05',
                'updated_at' => '2023-09-11 07:40:05',
            ),
            416 => 
            array (
                'id' => 986,
                'presensi_id' => 65,
                'peserta_id' => 113,
                'sign' => '6500efab5876c.png',
                'slug' => 'DWVpJ1GtfGOIyd9tYJ2W',
                'created_at' => '2023-09-11 07:40:15',
                'updated_at' => '2023-09-12 23:09:31',
            ),
            417 => 
            array (
                'id' => 987,
                'presensi_id' => 65,
                'peserta_id' => 98,
                'sign' => '6500efb65974d.png',
                'slug' => 'fkduPKMFKlrZPsbqo1cV',
                'created_at' => '2023-09-11 07:40:20',
                'updated_at' => '2023-09-12 23:09:42',
            ),
            418 => 
            array (
                'id' => 988,
                'presensi_id' => 65,
                'peserta_id' => 105,
                'sign' => '6500efc6a4051.png',
                'slug' => '5JMekcxLeVWDh2NbQ9GZ',
                'created_at' => '2023-09-11 07:40:28',
                'updated_at' => '2023-09-12 23:09:58',
            ),
            419 => 
            array (
                'id' => 989,
                'presensi_id' => 65,
                'peserta_id' => 152,
                'sign' => '6500efd4603aa.png',
                'slug' => 'YU8xMRyBDe4htQNqH5fj',
                'created_at' => '2023-09-11 07:40:32',
                'updated_at' => '2023-09-12 23:10:12',
            ),
            420 => 
            array (
                'id' => 990,
                'presensi_id' => 65,
                'peserta_id' => 102,
                'sign' => '6500efe3bb070.png',
                'slug' => 'ha3WpFuh8uLdzrbU92er',
                'created_at' => '2023-09-11 07:40:36',
                'updated_at' => '2023-09-12 23:10:27',
            ),
            421 => 
            array (
                'id' => 991,
                'presensi_id' => 65,
                'peserta_id' => 100,
                'sign' => '6500efec66e33.png',
                'slug' => 'pYbm5dAHUkUnxpb0afiv',
                'created_at' => '2023-09-11 07:40:42',
                'updated_at' => '2023-09-12 23:10:36',
            ),
            422 => 
            array (
                'id' => 993,
                'presensi_id' => 67,
                'peserta_id' => 5,
                'sign' => '6501565c4a146.png',
                'slug' => 'EuIxEVsvdAnTexkNck60',
                'created_at' => '2023-09-13 05:58:09',
                'updated_at' => '2023-09-13 06:27:40',
            ),
            423 => 
            array (
                'id' => 994,
                'presensi_id' => 67,
                'peserta_id' => 6,
                'sign' => '6501618463f66.png',
                'slug' => '9UeLGD3lzMGQ1fQ3koZO',
                'created_at' => '2023-09-13 05:58:19',
                'updated_at' => '2023-09-13 07:15:16',
            ),
            424 => 
            array (
                'id' => 995,
                'presensi_id' => 67,
                'peserta_id' => 9,
                'sign' => '650157d618dfe.png',
                'slug' => 'jUH8NVb7j0k24K5njviO',
                'created_at' => '2023-09-13 05:58:24',
                'updated_at' => '2023-09-13 06:33:58',
            ),
            425 => 
            array (
                'id' => 996,
                'presensi_id' => 67,
                'peserta_id' => 162,
                'sign' => '6501583ab35ea.png',
                'slug' => '3WPnprfCxUPmMvxx4Wgd',
                'created_at' => '2023-09-13 05:58:31',
                'updated_at' => '2023-09-13 06:35:38',
            ),
            426 => 
            array (
                'id' => 997,
                'presensi_id' => 67,
                'peserta_id' => 159,
                'sign' => '650156e24b495.png',
                'slug' => '1x0a3YsTlwMfPKGzfb7D',
                'created_at' => '2023-09-13 05:58:38',
                'updated_at' => '2023-09-13 06:29:54',
            ),
            427 => 
            array (
                'id' => 998,
                'presensi_id' => 67,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'qlZQ6UOkIdCj6Jgg8HIy',
                'created_at' => '2023-09-13 05:58:48',
                'updated_at' => '2023-09-13 05:58:48',
            ),
            428 => 
            array (
                'id' => 999,
                'presensi_id' => 67,
                'peserta_id' => 12,
                'sign' => '65015b60591a6.png',
                'slug' => '9Osb28M9Y8eijhYmTZbm',
                'created_at' => '2023-09-13 05:58:57',
                'updated_at' => '2023-09-13 06:49:04',
            ),
            429 => 
            array (
                'id' => 1000,
                'presensi_id' => 67,
                'peserta_id' => 107,
                'sign' => '650158d860377.png',
                'slug' => 'DC3WGJMAmErWRasDPPaw',
                'created_at' => '2023-09-13 05:59:04',
                'updated_at' => '2023-09-13 06:38:16',
            ),
            430 => 
            array (
                'id' => 1001,
                'presensi_id' => 67,
                'peserta_id' => 108,
                'sign' => '65015fcabe9bb.png',
                'slug' => 'YO4KOciMjyjj4mBMs2A3',
                'created_at' => '2023-09-13 05:59:29',
                'updated_at' => '2023-09-13 07:07:54',
            ),
            431 => 
            array (
                'id' => 1002,
                'presensi_id' => 67,
                'peserta_id' => 109,
                'sign' => '6501619530a12.png',
                'slug' => 'caMtIjUiaztyJNc9agyA',
                'created_at' => '2023-09-13 05:59:34',
                'updated_at' => '2023-09-13 07:15:33',
            ),
            432 => 
            array (
                'id' => 1003,
                'presensi_id' => 67,
                'peserta_id' => 21,
                'sign' => '65015a14512ab.png',
                'slug' => 'N1l7utIcMeLk0Z6m8Ga2',
                'created_at' => '2023-09-13 05:59:38',
                'updated_at' => '2023-09-13 06:43:32',
            ),
            433 => 
            array (
                'id' => 1004,
                'presensi_id' => 67,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'JWAfKPgWWyAn980vOcBp',
                'created_at' => '2023-09-13 05:59:42',
                'updated_at' => '2023-09-13 05:59:42',
            ),
            434 => 
            array (
                'id' => 1005,
                'presensi_id' => 67,
                'peserta_id' => 38,
                'sign' => '6501576d83c48.png',
                'slug' => 'Xxn13BZ65CODeExJDgmg',
                'created_at' => '2023-09-13 05:59:48',
                'updated_at' => '2023-09-13 06:32:13',
            ),
            435 => 
            array (
                'id' => 1006,
                'presensi_id' => 67,
                'peserta_id' => 113,
                'sign' => '650159f3b4788.png',
                'slug' => 'wppu2XZfdPF2pHMp9bNs',
                'created_at' => '2023-09-13 05:59:58',
                'updated_at' => '2023-09-13 06:42:59',
            ),
            436 => 
            array (
                'id' => 1007,
                'presensi_id' => 67,
                'peserta_id' => 98,
                'sign' => '65015c2751532.png',
                'slug' => 'aR4Pq2IIohEQt1y2gdE2',
                'created_at' => '2023-09-13 06:00:03',
                'updated_at' => '2023-09-13 06:52:23',
            ),
            437 => 
            array (
                'id' => 1008,
                'presensi_id' => 67,
                'peserta_id' => 105,
                'sign' => '650158440873c.png',
                'slug' => '3LOhAP2AZDwOJbl2aKHP',
                'created_at' => '2023-09-13 06:00:08',
                'updated_at' => '2023-09-13 06:35:48',
            ),
            438 => 
            array (
                'id' => 1009,
                'presensi_id' => 67,
                'peserta_id' => 152,
                'sign' => '65015ac7b9e91.png',
                'slug' => 'avjFHJzJgt02Kk3MnNnL',
                'created_at' => '2023-09-13 06:00:33',
                'updated_at' => '2023-09-13 06:46:31',
            ),
            439 => 
            array (
                'id' => 1010,
                'presensi_id' => 67,
                'peserta_id' => 100,
                'sign' => '650157db24eb4.png',
                'slug' => 'ziBh0MXtNUKUGFQhPCoT',
                'created_at' => '2023-09-13 06:00:39',
                'updated_at' => '2023-09-13 06:34:03',
            ),
            440 => 
            array (
                'id' => 1011,
                'presensi_id' => 67,
                'peserta_id' => 102,
                'sign' => '650160528793c.png',
                'slug' => 'eMUG3c3WOivRA2cGVNNM',
                'created_at' => '2023-09-13 06:00:43',
                'updated_at' => '2023-09-13 07:10:10',
            ),
            441 => 
            array (
                'id' => 1012,
                'presensi_id' => 67,
                'peserta_id' => 133,
                'sign' => NULL,
                'slug' => 'rUS3r1GsAg1DUMaOv6Gr',
                'created_at' => '2023-09-13 06:00:54',
                'updated_at' => '2023-09-13 06:00:54',
            ),
            442 => 
            array (
                'id' => 1013,
                'presensi_id' => 67,
                'peserta_id' => 134,
                'sign' => '65015c63ad761.png',
                'slug' => 'OHQxw89tHk2eWNspqTOp',
                'created_at' => '2023-09-13 06:01:20',
                'updated_at' => '2023-09-13 06:53:23',
            ),
            443 => 
            array (
                'id' => 1014,
                'presensi_id' => 67,
                'peserta_id' => 33,
                'sign' => NULL,
                'slug' => 'aBvZB6Pb6uNn0ialvpJ7',
                'created_at' => '2023-09-13 06:01:44',
                'updated_at' => '2023-09-13 06:01:44',
            ),
            444 => 
            array (
                'id' => 1015,
                'presensi_id' => 67,
                'peserta_id' => 140,
                'sign' => '65016bd7c2ec7.png',
                'slug' => 'GCevbyaO4kOD9G05ew3G',
                'created_at' => '2023-09-13 06:02:00',
                'updated_at' => '2023-09-13 07:59:19',
            ),
            445 => 
            array (
                'id' => 1016,
                'presensi_id' => 67,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'IAf1AbmDxukBROMYcirP',
                'created_at' => '2023-09-13 06:12:13',
                'updated_at' => '2023-09-13 06:12:13',
            ),
            446 => 
            array (
                'id' => 1017,
                'presensi_id' => 67,
                'peserta_id' => 175,
                'sign' => '65015a852954a.png',
                'slug' => 'SyUiZxSzJ0Ve7w8N7snp',
                'created_at' => '2023-09-13 06:24:38',
                'updated_at' => '2023-09-13 06:45:25',
            ),
            447 => 
            array (
                'id' => 1018,
                'presensi_id' => 68,
                'peserta_id' => 5,
                'sign' => '65027642af2b5.png',
                'slug' => 'c6NUC4tbHpIITaY1f5Lu',
                'created_at' => '2023-09-14 02:27:34',
                'updated_at' => '2023-09-14 02:56:02',
            ),
            448 => 
            array (
                'id' => 1019,
                'presensi_id' => 68,
                'peserta_id' => 6,
                'sign' => '6502adf4bdba4.png',
                'slug' => 'XTf2epXtKjLOCJkhbAyw',
                'created_at' => '2023-09-14 02:27:47',
                'updated_at' => '2023-09-14 06:53:40',
            ),
            449 => 
            array (
                'id' => 1020,
                'presensi_id' => 68,
                'peserta_id' => 9,
                'sign' => '65027927a8a20.png',
                'slug' => '0Sl0i4yrUUncvivIlYni',
                'created_at' => '2023-09-14 02:28:06',
                'updated_at' => '2023-09-14 03:08:23',
            ),
            450 => 
            array (
                'id' => 1021,
                'presensi_id' => 68,
                'peserta_id' => 162,
                'sign' => '650274334f664.png',
                'slug' => '44V8umf9SLlDRAmcHMqP',
                'created_at' => '2023-09-14 02:28:17',
                'updated_at' => '2023-09-14 02:47:15',
            ),
            451 => 
            array (
                'id' => 1022,
                'presensi_id' => 68,
                'peserta_id' => 159,
                'sign' => '6502ac75ce646.png',
                'slug' => '7syX0cgqCucmzjOFCOOI',
                'created_at' => '2023-09-14 02:28:26',
                'updated_at' => '2023-09-14 06:47:17',
            ),
            452 => 
            array (
                'id' => 1023,
                'presensi_id' => 68,
                'peserta_id' => 11,
                'sign' => '6502850dede00.png',
                'slug' => 'NsPFKYNhf6VreGp5LzNI',
                'created_at' => '2023-09-14 02:28:32',
                'updated_at' => '2023-09-14 03:59:09',
            ),
            453 => 
            array (
                'id' => 1024,
                'presensi_id' => 68,
                'peserta_id' => 12,
                'sign' => '6502746a5e09c.png',
                'slug' => 'MfQRc7GZ8uKIYi2W7aDj',
                'created_at' => '2023-09-14 02:28:36',
                'updated_at' => '2023-09-14 02:48:10',
            ),
            454 => 
            array (
                'id' => 1025,
                'presensi_id' => 68,
                'peserta_id' => 107,
                'sign' => '650274786391c.png',
                'slug' => '0aUrvjsC28NEX5KxHoks',
                'created_at' => '2023-09-14 02:28:40',
                'updated_at' => '2023-09-14 02:48:24',
            ),
            455 => 
            array (
                'id' => 1026,
                'presensi_id' => 68,
                'peserta_id' => 108,
                'sign' => '6502747c6f53f.png',
                'slug' => 'nuRlnKwdeyJ6O1QlmBbT',
                'created_at' => '2023-09-14 02:28:44',
                'updated_at' => '2023-09-14 02:48:28',
            ),
            456 => 
            array (
                'id' => 1027,
                'presensi_id' => 68,
                'peserta_id' => 109,
                'sign' => '6503c5c585c8b.png',
                'slug' => 'I8rmoBkTRhO1FAhn3UFG',
                'created_at' => '2023-09-14 02:28:49',
                'updated_at' => '2023-09-15 02:47:33',
            ),
            457 => 
            array (
                'id' => 1028,
                'presensi_id' => 68,
                'peserta_id' => 21,
                'sign' => '650276ded4861.png',
                'slug' => '9UffFuAZExQwUh2ylq1h',
                'created_at' => '2023-09-14 02:28:57',
                'updated_at' => '2023-09-14 02:58:38',
            ),
            458 => 
            array (
                'id' => 1029,
                'presensi_id' => 68,
                'peserta_id' => 22,
                'sign' => '65027af71dfb5.png',
                'slug' => 'DWRkfOjmIWIJ3LX9jjjU',
                'created_at' => '2023-09-14 02:29:02',
                'updated_at' => '2023-09-14 03:16:07',
            ),
            459 => 
            array (
                'id' => 1030,
                'presensi_id' => 68,
                'peserta_id' => 38,
                'sign' => '650310374042f.png',
                'slug' => 'YpuSbpXQVe4BtfpzPcq4',
                'created_at' => '2023-09-14 02:29:08',
                'updated_at' => '2023-09-14 13:52:55',
            ),
            460 => 
            array (
                'id' => 1031,
                'presensi_id' => 68,
                'peserta_id' => 40,
                'sign' => '650277364e922.png',
                'slug' => 'j0o2VK27imWvTMMTBLMF',
                'created_at' => '2023-09-14 02:29:34',
                'updated_at' => '2023-09-14 03:00:06',
            ),
            461 => 
            array (
                'id' => 1032,
                'presensi_id' => 68,
                'peserta_id' => 47,
                'sign' => '65027bb204901.png',
                'slug' => '0uu6OxfgOHNHBC9GVdhZ',
                'created_at' => '2023-09-14 02:29:40',
                'updated_at' => '2023-09-14 03:19:14',
            ),
            462 => 
            array (
                'id' => 1033,
                'presensi_id' => 68,
                'peserta_id' => 48,
                'sign' => '65027952d6f9f.png',
                'slug' => 'KztEcy0c2S963sfMzPa5',
                'created_at' => '2023-09-14 02:29:47',
                'updated_at' => '2023-09-14 03:09:06',
            ),
            463 => 
            array (
                'id' => 1034,
                'presensi_id' => 68,
                'peserta_id' => 49,
                'sign' => '65028002dd6ed.png',
                'slug' => 'YlO4nOrJSEtIoZ2IBBSb',
                'created_at' => '2023-09-14 02:29:52',
                'updated_at' => '2023-09-14 03:37:38',
            ),
            464 => 
            array (
                'id' => 1035,
                'presensi_id' => 68,
                'peserta_id' => 176,
                'sign' => NULL,
                'slug' => 'iq8JhvKtaVNcMkwb43al',
                'created_at' => '2023-09-14 02:30:58',
                'updated_at' => '2023-09-14 02:30:58',
            ),
            465 => 
            array (
                'id' => 1036,
                'presensi_id' => 68,
                'peserta_id' => 177,
                'sign' => NULL,
                'slug' => 'd28IHMub1wJUo7BTtg3M',
                'created_at' => '2023-09-14 02:31:14',
                'updated_at' => '2023-09-14 02:31:14',
            ),
            466 => 
            array (
                'id' => 1037,
                'presensi_id' => 68,
                'peserta_id' => 178,
                'sign' => NULL,
                'slug' => 'R2V2fJHqQyCBPya1bkmg',
                'created_at' => '2023-09-14 02:31:35',
                'updated_at' => '2023-09-14 02:31:35',
            ),
            467 => 
            array (
                'id' => 1038,
                'presensi_id' => 68,
                'peserta_id' => 179,
                'sign' => NULL,
                'slug' => 'cwbJQMULW7ZNkl7mqpzY',
                'created_at' => '2023-09-14 02:31:51',
                'updated_at' => '2023-09-14 02:31:51',
            ),
            468 => 
            array (
                'id' => 1039,
                'presensi_id' => 68,
                'peserta_id' => 180,
                'sign' => NULL,
                'slug' => 'AyASOEWjn8P3IZSWH9rl',
                'created_at' => '2023-09-14 02:32:11',
                'updated_at' => '2023-09-14 02:32:11',
            ),
            469 => 
            array (
                'id' => 1040,
                'presensi_id' => 68,
                'peserta_id' => 181,
                'sign' => NULL,
                'slug' => 'EqBma19LWmGCBv2rGHtp',
                'created_at' => '2023-09-14 02:32:52',
                'updated_at' => '2023-09-14 02:32:52',
            ),
            470 => 
            array (
                'id' => 1041,
                'presensi_id' => 68,
                'peserta_id' => 113,
                'sign' => '6502a51a531a3.png',
                'slug' => 'kSSDJsAfF9SHUHEuRG1n',
                'created_at' => '2023-09-14 02:32:58',
                'updated_at' => '2023-09-14 06:15:54',
            ),
            471 => 
            array (
                'id' => 1042,
                'presensi_id' => 68,
                'peserta_id' => 98,
                'sign' => '6502a2a1bde21.png',
                'slug' => 'EvWBGiIacaNl2Lqa98sk',
                'created_at' => '2023-09-14 02:33:02',
                'updated_at' => '2023-09-14 06:05:21',
            ),
            472 => 
            array (
                'id' => 1043,
                'presensi_id' => 68,
                'peserta_id' => 100,
                'sign' => '6502a7a4acfe2.png',
                'slug' => 'dpa2iNWPZkrQ9tp9Fk4l',
                'created_at' => '2023-09-14 02:33:09',
                'updated_at' => '2023-09-14 06:26:44',
            ),
            473 => 
            array (
                'id' => 1044,
                'presensi_id' => 68,
                'peserta_id' => 102,
                'sign' => '6502b3f078fda.png',
                'slug' => 'YgokrW9hmTQjaGh7cqfM',
                'created_at' => '2023-09-14 02:33:13',
                'updated_at' => '2023-09-14 07:19:12',
            ),
            474 => 
            array (
                'id' => 1045,
                'presensi_id' => 69,
                'peserta_id' => 5,
                'sign' => '6503f34aea671.png',
                'slug' => '1XK6wuj27dQT1eAh1ppk',
                'created_at' => '2023-09-15 04:58:19',
                'updated_at' => '2023-09-15 06:01:46',
            ),
            475 => 
            array (
                'id' => 1046,
                'presensi_id' => 69,
                'peserta_id' => 6,
                'sign' => '6503f3460d14f.png',
                'slug' => 'FeMkQYBDUuoTFvqI4QPs',
                'created_at' => '2023-09-15 04:58:27',
                'updated_at' => '2023-09-15 06:01:42',
            ),
            476 => 
            array (
                'id' => 1047,
                'presensi_id' => 69,
                'peserta_id' => 9,
                'sign' => '6503f373bdc0a.png',
                'slug' => 'TQfJEt25YrCfbhz26Nai',
                'created_at' => '2023-09-15 04:58:31',
                'updated_at' => '2023-09-15 06:02:27',
            ),
            477 => 
            array (
                'id' => 1048,
                'presensi_id' => 69,
                'peserta_id' => 162,
                'sign' => '6503f47a0611c.png',
                'slug' => 'BnpFKxg7d28GhKaYS8fs',
                'created_at' => '2023-09-15 04:58:35',
                'updated_at' => '2023-09-15 06:06:50',
            ),
            478 => 
            array (
                'id' => 1049,
                'presensi_id' => 69,
                'peserta_id' => 159,
                'sign' => '6503f3deb1305.png',
                'slug' => 'Ayf0NhetisJjR4aWydgU',
                'created_at' => '2023-09-15 04:58:40',
                'updated_at' => '2023-09-15 06:04:14',
            ),
            479 => 
            array (
                'id' => 1051,
                'presensi_id' => 69,
                'peserta_id' => 12,
                'sign' => '6503f4904cc73.png',
                'slug' => 'oaQMuhCRgDexixfqf2nE',
                'created_at' => '2023-09-15 04:58:49',
                'updated_at' => '2023-09-15 06:07:12',
            ),
            480 => 
            array (
                'id' => 1052,
                'presensi_id' => 69,
                'peserta_id' => 107,
                'sign' => '6503f4828a72e.png',
                'slug' => 'tX6mI5GOpD1cRPtukWbX',
                'created_at' => '2023-09-15 04:58:54',
                'updated_at' => '2023-09-15 06:06:58',
            ),
            481 => 
            array (
                'id' => 1053,
                'presensi_id' => 69,
                'peserta_id' => 108,
                'sign' => '6503fca2a505b.png',
                'slug' => 'jYo7eX9RlUy6i0fOL7vH',
                'created_at' => '2023-09-15 04:58:59',
                'updated_at' => '2023-09-15 06:41:38',
            ),
            482 => 
            array (
                'id' => 1054,
                'presensi_id' => 69,
                'peserta_id' => 109,
                'sign' => '6503f5a536edf.png',
                'slug' => 'ZcIzsKUjcAIwNp8tWtqZ',
                'created_at' => '2023-09-15 04:59:03',
                'updated_at' => '2023-09-15 06:11:49',
            ),
            483 => 
            array (
                'id' => 1055,
                'presensi_id' => 69,
                'peserta_id' => 21,
                'sign' => '6503f5638da7a.png',
                'slug' => 'v0xGSyGMmpEn80yBvdkZ',
                'created_at' => '2023-09-15 04:59:07',
                'updated_at' => '2023-09-15 06:10:43',
            ),
            484 => 
            array (
                'id' => 1056,
                'presensi_id' => 69,
                'peserta_id' => 38,
                'sign' => '6503f7788afb8.png',
                'slug' => 'k9RTQYPvAn5aVRyj831A',
                'created_at' => '2023-09-15 04:59:11',
                'updated_at' => '2023-09-15 06:19:36',
            ),
            485 => 
            array (
                'id' => 1057,
                'presensi_id' => 69,
                'peserta_id' => 80,
                'sign' => '6504084cf4042.png',
                'slug' => 'WgceIiAr1py3iKbpsrTc',
                'created_at' => '2023-09-15 05:00:02',
                'updated_at' => '2023-09-15 07:31:25',
            ),
            486 => 
            array (
                'id' => 1058,
                'presensi_id' => 69,
                'peserta_id' => 13,
                'sign' => NULL,
                'slug' => 'lCXPDUk1tNJO6H9Ml3qH',
                'created_at' => '2023-09-15 05:00:14',
                'updated_at' => '2023-09-15 05:00:14',
            ),
            487 => 
            array (
                'id' => 1059,
                'presensi_id' => 69,
                'peserta_id' => 182,
                'sign' => '6503f9439781e.png',
                'slug' => 'vdAe6hXNWWVzEcyMwtRq',
                'created_at' => '2023-09-15 05:01:26',
                'updated_at' => '2023-09-15 06:27:15',
            ),
            488 => 
            array (
                'id' => 1060,
                'presensi_id' => 69,
                'peserta_id' => 81,
                'sign' => NULL,
                'slug' => 'mWsnZQWRJXC7evL45GVe',
                'created_at' => '2023-09-15 05:02:44',
                'updated_at' => '2023-09-15 05:02:44',
            ),
            489 => 
            array (
                'id' => 1061,
                'presensi_id' => 69,
                'peserta_id' => 151,
                'sign' => '6503faca2399b.png',
                'slug' => 'C8pfT4jv3F1YxL2Zh9Ta',
                'created_at' => '2023-09-15 05:03:06',
                'updated_at' => '2023-09-15 06:33:46',
            ),
            490 => 
            array (
                'id' => 1062,
                'presensi_id' => 69,
                'peserta_id' => 111,
                'sign' => '6503fb535a008.png',
                'slug' => 'WbqMm1OKxb3yPBa1eb6B',
                'created_at' => '2023-09-15 05:03:10',
                'updated_at' => '2023-09-15 06:36:03',
            ),
            491 => 
            array (
                'id' => 1063,
                'presensi_id' => 69,
                'peserta_id' => 113,
                'sign' => '6503f75de2867.png',
                'slug' => 'znXZa7YUSwnP1Tbo4Uym',
                'created_at' => '2023-09-15 05:03:14',
                'updated_at' => '2023-09-15 06:19:09',
            ),
            492 => 
            array (
                'id' => 1064,
                'presensi_id' => 69,
                'peserta_id' => 98,
                'sign' => '6503f6d462e5c.png',
                'slug' => 'yn5AqWyHRtW8VhXt5iqf',
                'created_at' => '2023-09-15 05:03:18',
                'updated_at' => '2023-09-15 06:16:52',
            ),
            493 => 
            array (
                'id' => 1065,
                'presensi_id' => 69,
                'peserta_id' => 105,
                'sign' => NULL,
                'slug' => '65HDZJCbQTm9yTfa7T4z',
                'created_at' => '2023-09-15 05:03:23',
                'updated_at' => '2023-09-15 05:03:23',
            ),
            494 => 
            array (
                'id' => 1066,
                'presensi_id' => 69,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'yBpCEtwGFg6W5yTC5lw1',
                'created_at' => '2023-09-15 05:03:28',
                'updated_at' => '2023-09-15 05:03:28',
            ),
            495 => 
            array (
                'id' => 1067,
                'presensi_id' => 69,
                'peserta_id' => 102,
                'sign' => '6503f6a3b3a19.png',
                'slug' => '8lcKMiNVUR6Oh6oRLmb4',
                'created_at' => '2023-09-15 05:03:33',
                'updated_at' => '2023-09-15 06:16:03',
            ),
            496 => 
            array (
                'id' => 1068,
                'presensi_id' => 69,
                'peserta_id' => 100,
                'sign' => '6503fb71873b5.png',
                'slug' => 'lirtLR3DSYfSNenipi7s',
                'created_at' => '2023-09-15 05:03:45',
                'updated_at' => '2023-09-15 06:36:33',
            ),
            497 => 
            array (
                'id' => 1069,
                'presensi_id' => 69,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'HZwNcgtYLL8qu3IHi6po',
                'created_at' => '2023-09-15 06:08:24',
                'updated_at' => '2023-09-15 06:08:24',
            ),
            498 => 
            array (
                'id' => 1070,
                'presensi_id' => 70,
                'peserta_id' => 5,
                'sign' => '6507cef6a28ce.png',
                'slug' => '4fOYdBws4fbDtlMbMyfL',
                'created_at' => '2023-09-18 04:11:09',
                'updated_at' => '2023-09-18 04:15:50',
            ),
            499 => 
            array (
                'id' => 1071,
                'presensi_id' => 70,
                'peserta_id' => 6,
                'sign' => '6507d774d0393.png',
                'slug' => 'Xfci1IAi1at6ShUu5IK5',
                'created_at' => '2023-09-18 04:11:17',
                'updated_at' => '2023-09-18 04:52:04',
            ),
        ));
        \DB::table('kehadirans')->insert(array (
            0 => 
            array (
                'id' => 1072,
                'presensi_id' => 70,
                'peserta_id' => 9,
                'sign' => '6507d3ef8df7d.png',
                'slug' => 'ASBsL9AqnWbtEJaqIPUs',
                'created_at' => '2023-09-18 04:11:25',
                'updated_at' => '2023-09-18 04:37:03',
            ),
            1 => 
            array (
                'id' => 1073,
                'presensi_id' => 70,
                'peserta_id' => 162,
                'sign' => '6507d1c755abf.png',
                'slug' => 'ldfQMc1CxCeiczX8teud',
                'created_at' => '2023-09-18 04:11:40',
                'updated_at' => '2023-09-18 04:27:51',
            ),
            2 => 
            array (
                'id' => 1074,
                'presensi_id' => 70,
                'peserta_id' => 159,
                'sign' => '6507d4bfd43bf.png',
                'slug' => 'a2NnetTs2WQ1aVlfPnNi',
                'created_at' => '2023-09-18 04:11:46',
                'updated_at' => '2023-09-18 04:40:31',
            ),
            3 => 
            array (
                'id' => 1075,
                'presensi_id' => 70,
                'peserta_id' => 11,
                'sign' => '6507f718ea5d8.png',
                'slug' => 'M6px6MyuTC64RvahxVaJ',
                'created_at' => '2023-09-18 04:11:53',
                'updated_at' => '2023-09-18 07:07:04',
            ),
            4 => 
            array (
                'id' => 1076,
                'presensi_id' => 70,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'tqttoRjvZvpjlh42geQX',
                'created_at' => '2023-09-18 04:11:58',
                'updated_at' => '2023-09-18 04:11:58',
            ),
            5 => 
            array (
                'id' => 1077,
                'presensi_id' => 70,
                'peserta_id' => 107,
                'sign' => '6507d3625b2f3.png',
                'slug' => 'NuEQNldCw8s5UY6n2wey',
                'created_at' => '2023-09-18 04:12:03',
                'updated_at' => '2023-09-18 04:34:42',
            ),
            6 => 
            array (
                'id' => 1078,
                'presensi_id' => 70,
                'peserta_id' => 108,
                'sign' => '6507d5040c655.png',
                'slug' => 'niFomtLTVIVK7b7YSLSw',
                'created_at' => '2023-09-18 04:12:08',
                'updated_at' => '2023-09-18 04:41:40',
            ),
            7 => 
            array (
                'id' => 1079,
                'presensi_id' => 70,
                'peserta_id' => 109,
                'sign' => '6507d0ef84a9b.png',
                'slug' => 'i4PctJsjogEJWoMjfmRg',
                'created_at' => '2023-09-18 04:12:13',
                'updated_at' => '2023-09-18 04:24:15',
            ),
            8 => 
            array (
                'id' => 1080,
                'presensi_id' => 70,
                'peserta_id' => 21,
                'sign' => '6507d26bc608c.png',
                'slug' => '6fIG7qM80EKvuU0pqIJ2',
                'created_at' => '2023-09-18 04:12:17',
                'updated_at' => '2023-09-18 04:30:35',
            ),
            9 => 
            array (
                'id' => 1081,
                'presensi_id' => 70,
                'peserta_id' => 22,
                'sign' => '6507db3b53ee3.png',
                'slug' => 'YFAB1iLlF5vYVvKqNPl3',
                'created_at' => '2023-09-18 04:12:22',
                'updated_at' => '2023-09-18 05:08:11',
            ),
            10 => 
            array (
                'id' => 1082,
                'presensi_id' => 70,
                'peserta_id' => 38,
                'sign' => '6507e9ceab22a.png',
                'slug' => '22XBzRKiTVJdJE1Cxcfd',
                'created_at' => '2023-09-18 04:12:27',
                'updated_at' => '2023-09-18 06:10:22',
            ),
            11 => 
            array (
                'id' => 1083,
                'presensi_id' => 70,
                'peserta_id' => 1,
                'sign' => NULL,
                'slug' => 'ZOlrqPihJw6kJhLqLiQw',
                'created_at' => '2023-09-18 04:12:32',
                'updated_at' => '2023-09-18 04:12:32',
            ),
            12 => 
            array (
                'id' => 1084,
                'presensi_id' => 70,
                'peserta_id' => 26,
                'sign' => '6507d26dc23fc.png',
                'slug' => 'cqlAZRl0mA9h3hHAu1We',
                'created_at' => '2023-09-18 04:12:38',
                'updated_at' => '2023-09-18 04:30:37',
            ),
            13 => 
            array (
                'id' => 1085,
                'presensi_id' => 70,
                'peserta_id' => 19,
                'sign' => '6507d38b852d4.png',
                'slug' => 'zXGRXAx5Iy8C4Ms1ZZHE',
                'created_at' => '2023-09-18 04:12:50',
                'updated_at' => '2023-09-18 04:35:23',
            ),
            14 => 
            array (
                'id' => 1086,
                'presensi_id' => 70,
                'peserta_id' => 82,
                'sign' => '6507d573caa5a.png',
                'slug' => 'qqGmuxjqEgEfgKZHRJAr',
                'created_at' => '2023-09-18 04:13:00',
                'updated_at' => '2023-09-18 04:43:31',
            ),
            15 => 
            array (
                'id' => 1087,
                'presensi_id' => 70,
                'peserta_id' => 111,
                'sign' => '6507e3b36511b.png',
                'slug' => 'tu66MAnArFFpsaG5aQPf',
                'created_at' => '2023-09-18 04:13:14',
                'updated_at' => '2023-09-18 05:44:19',
            ),
            16 => 
            array (
                'id' => 1088,
                'presensi_id' => 70,
                'peserta_id' => 151,
                'sign' => '6507d3d87b9f3.png',
                'slug' => 'hD7drFo60QqORq2bAsOP',
                'created_at' => '2023-09-18 04:13:25',
                'updated_at' => '2023-09-18 04:36:40',
            ),
            17 => 
            array (
                'id' => 1089,
                'presensi_id' => 70,
                'peserta_id' => 105,
                'sign' => '6507e171cad56.png',
                'slug' => 'zUhXQPFZm9aTmoVWhxB7',
                'created_at' => '2023-09-18 04:13:33',
                'updated_at' => '2023-09-18 05:34:41',
            ),
            18 => 
            array (
                'id' => 1090,
                'presensi_id' => 70,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => '4CrX2DNYFJDNIzjdksVk',
                'created_at' => '2023-09-18 04:13:41',
                'updated_at' => '2023-09-18 04:13:41',
            ),
            19 => 
            array (
                'id' => 1091,
                'presensi_id' => 70,
                'peserta_id' => 100,
                'sign' => '6507e25fd3774.png',
                'slug' => 'AotJG8R8Zst1ldLMzbiv',
                'created_at' => '2023-09-18 04:13:47',
                'updated_at' => '2023-09-18 05:38:39',
            ),
            20 => 
            array (
                'id' => 1092,
                'presensi_id' => 70,
                'peserta_id' => 102,
                'sign' => '6507d38620877.png',
                'slug' => 'jITuTRwwQdYPhinqvPsH',
                'created_at' => '2023-09-18 04:13:53',
                'updated_at' => '2023-09-18 04:35:18',
            ),
            21 => 
            array (
                'id' => 1093,
                'presensi_id' => 70,
                'peserta_id' => 157,
                'sign' => NULL,
                'slug' => 'lqib6eDbwFtg7sEksvjK',
                'created_at' => '2023-09-18 04:14:14',
                'updated_at' => '2023-09-18 04:14:14',
            ),
            22 => 
            array (
                'id' => 1094,
                'presensi_id' => 71,
                'peserta_id' => 5,
                'sign' => '65091da904de1.png',
                'slug' => 'C9Tfft9K6DbAKAHSERDA',
                'created_at' => '2023-09-19 03:35:23',
                'updated_at' => '2023-09-19 04:03:53',
            ),
            23 => 
            array (
                'id' => 1095,
                'presensi_id' => 71,
                'peserta_id' => 6,
                'sign' => '6509379f3a96f.png',
                'slug' => 'lbXrSUPiRY6OKfUTztFz',
                'created_at' => '2023-09-19 03:35:33',
                'updated_at' => '2023-09-19 05:54:39',
            ),
            24 => 
            array (
                'id' => 1096,
                'presensi_id' => 71,
                'peserta_id' => 9,
                'sign' => '650920a1e02b2.png',
                'slug' => 'ZjXLobaSKQSYTcKTTdPb',
                'created_at' => '2023-09-19 03:35:37',
                'updated_at' => '2023-09-19 04:16:33',
            ),
            25 => 
            array (
                'id' => 1097,
                'presensi_id' => 71,
                'peserta_id' => 162,
                'sign' => '65091da64c854.png',
                'slug' => 'HbUTWH5JIGmpc2JOPvFe',
                'created_at' => '2023-09-19 03:35:41',
                'updated_at' => '2023-09-19 04:03:50',
            ),
            26 => 
            array (
                'id' => 1098,
                'presensi_id' => 71,
                'peserta_id' => 159,
                'sign' => '65091db4c0386.png',
                'slug' => 'zzChJ7HNilVayeXQF0Hx',
                'created_at' => '2023-09-19 03:35:46',
                'updated_at' => '2023-09-19 04:04:04',
            ),
            27 => 
            array (
                'id' => 1099,
                'presensi_id' => 71,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'FjrSeS2Ac9f3uVzR6l89',
                'created_at' => '2023-09-19 03:35:52',
                'updated_at' => '2023-09-19 03:35:52',
            ),
            28 => 
            array (
                'id' => 1100,
                'presensi_id' => 71,
                'peserta_id' => 12,
                'sign' => '6509205f5efd2.png',
                'slug' => 'FwYqLKg0HnpnKKKfewOz',
                'created_at' => '2023-09-19 03:36:03',
                'updated_at' => '2023-09-19 04:15:27',
            ),
            29 => 
            array (
                'id' => 1101,
                'presensi_id' => 71,
                'peserta_id' => 107,
                'sign' => '65091e1a1fadc.png',
                'slug' => 'M1jFK1DrUilINIf36fzV',
                'created_at' => '2023-09-19 03:36:11',
                'updated_at' => '2023-09-19 04:05:46',
            ),
            30 => 
            array (
                'id' => 1102,
                'presensi_id' => 71,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => '1tn2t4NcQkvYyg2lZ7QO',
                'created_at' => '2023-09-19 03:36:16',
                'updated_at' => '2023-09-19 03:36:16',
            ),
            31 => 
            array (
                'id' => 1103,
                'presensi_id' => 71,
                'peserta_id' => 109,
                'sign' => '65091faa2e24e.png',
                'slug' => 'TeHFj4UE5hbpfWYVc5IW',
                'created_at' => '2023-09-19 03:36:21',
                'updated_at' => '2023-09-19 04:12:26',
            ),
            32 => 
            array (
                'id' => 1104,
                'presensi_id' => 71,
                'peserta_id' => 21,
                'sign' => '65091f730aac5.png',
                'slug' => '9e76WnnlZGRuE9sJKiIT',
                'created_at' => '2023-09-19 03:36:27',
                'updated_at' => '2023-09-19 04:11:31',
            ),
            33 => 
            array (
                'id' => 1105,
                'presensi_id' => 71,
                'peserta_id' => 22,
                'sign' => '65091e39770de.png',
                'slug' => 'pMNkeIB4eUioRArWusQs',
                'created_at' => '2023-09-19 03:36:32',
                'updated_at' => '2023-09-19 04:06:17',
            ),
            34 => 
            array (
                'id' => 1106,
                'presensi_id' => 71,
                'peserta_id' => 38,
                'sign' => '65091e1fa2173.png',
                'slug' => '3xlmK9S3RvEMu8M4TlO5',
                'created_at' => '2023-09-19 03:36:36',
                'updated_at' => '2023-09-19 04:05:51',
            ),
            35 => 
            array (
                'id' => 1107,
                'presensi_id' => 71,
                'peserta_id' => 26,
                'sign' => '65091ed99e173.png',
                'slug' => 'c7D9JwhBo7wyYTkEb3QM',
                'created_at' => '2023-09-19 03:37:06',
                'updated_at' => '2023-09-19 04:08:57',
            ),
            36 => 
            array (
                'id' => 1108,
                'presensi_id' => 71,
                'peserta_id' => 151,
                'sign' => '65093c87970fa.png',
                'slug' => 'WO0ddL45YCUHwcXsTjbn',
                'created_at' => '2023-09-19 03:37:13',
                'updated_at' => '2023-09-19 06:15:35',
            ),
            37 => 
            array (
                'id' => 1109,
                'presensi_id' => 71,
                'peserta_id' => 111,
                'sign' => '6509396289db6.png',
                'slug' => 'HwUK6TtgBVvE0vPF0Ggu',
                'created_at' => '2023-09-19 03:37:18',
                'updated_at' => '2023-09-19 06:02:10',
            ),
            38 => 
            array (
                'id' => 1110,
                'presensi_id' => 71,
                'peserta_id' => 113,
                'sign' => '65093ce4c33d2.png',
                'slug' => '9Zt542Dbos7SBpnkhgUh',
                'created_at' => '2023-09-19 03:37:23',
                'updated_at' => '2023-09-19 06:17:08',
            ),
            39 => 
            array (
                'id' => 1111,
                'presensi_id' => 71,
                'peserta_id' => 99,
                'sign' => '65093cf79c95b.png',
                'slug' => 'IyV44VU132yPQhnx2NQN',
                'created_at' => '2023-09-19 03:37:29',
                'updated_at' => '2023-09-19 06:17:27',
            ),
            40 => 
            array (
                'id' => 1112,
                'presensi_id' => 71,
                'peserta_id' => 105,
                'sign' => '65093d1b82570.png',
                'slug' => '1iLMJNQjsH8WymI6cQEg',
                'created_at' => '2023-09-19 03:37:35',
                'updated_at' => '2023-09-19 06:18:03',
            ),
            41 => 
            array (
                'id' => 1113,
                'presensi_id' => 71,
                'peserta_id' => 152,
                'sign' => '65093d2d700fc.png',
                'slug' => 'wdpmKnFmjGErvMaENWLf',
                'created_at' => '2023-09-19 03:37:40',
                'updated_at' => '2023-09-19 06:18:21',
            ),
            42 => 
            array (
                'id' => 1114,
                'presensi_id' => 71,
                'peserta_id' => 100,
                'sign' => '65093d477cc9b.png',
                'slug' => 'dCEniImOn8p2COxc1ueE',
                'created_at' => '2023-09-19 03:37:45',
                'updated_at' => '2023-09-19 06:18:47',
            ),
            43 => 
            array (
                'id' => 1115,
                'presensi_id' => 71,
                'peserta_id' => 102,
                'sign' => '65093d5a6f42e.png',
                'slug' => 'nh2LxWuvO0Osj1dnK0tN',
                'created_at' => '2023-09-19 03:37:56',
                'updated_at' => '2023-09-19 06:19:06',
            ),
            44 => 
            array (
                'id' => 1116,
                'presensi_id' => 71,
                'peserta_id' => 82,
                'sign' => NULL,
                'slug' => '31PzS8GtmYxWjUhx5sro',
                'created_at' => '2023-09-19 03:38:48',
                'updated_at' => '2023-09-19 03:38:48',
            ),
            45 => 
            array (
                'id' => 1117,
                'presensi_id' => 71,
                'peserta_id' => 19,
                'sign' => NULL,
                'slug' => 'HIM0t3YjEaN1nu1Qf8D3',
                'created_at' => '2023-09-19 03:38:54',
                'updated_at' => '2023-09-19 03:38:54',
            ),
            46 => 
            array (
                'id' => 1118,
                'presensi_id' => 71,
                'peserta_id' => 32,
                'sign' => NULL,
                'slug' => 'NLzqVq599qrWSsveJ4CL',
                'created_at' => '2023-09-19 03:39:11',
                'updated_at' => '2023-09-19 03:39:11',
            ),
            47 => 
            array (
                'id' => 1119,
                'presensi_id' => 72,
                'peserta_id' => 31,
                'sign' => NULL,
                'slug' => 'wXjeezlkLHUv3Su1mQRJ',
                'created_at' => '2023-09-19 06:08:47',
                'updated_at' => '2023-09-19 06:08:47',
            ),
            48 => 
            array (
                'id' => 1120,
                'presensi_id' => 72,
                'peserta_id' => 103,
                'sign' => '65093b357f440.png',
                'slug' => '8UXMUvQ9c8vmYL02QBgD',
                'created_at' => '2023-09-19 06:09:22',
                'updated_at' => '2023-09-19 06:09:57',
            ),
            49 => 
            array (
                'id' => 1121,
                'presensi_id' => 73,
                'peserta_id' => 5,
                'sign' => '651104db3c159.png',
                'slug' => '4yLtPniyjkTWSshlGNiq',
                'created_at' => '2023-09-25 03:45:09',
                'updated_at' => '2023-09-25 03:56:11',
            ),
            50 => 
            array (
                'id' => 1122,
                'presensi_id' => 73,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'QENqAV5Kkr5Hcv3WQbpU',
                'created_at' => '2023-09-25 03:45:59',
                'updated_at' => '2023-09-25 03:45:59',
            ),
            51 => 
            array (
                'id' => 1123,
                'presensi_id' => 73,
                'peserta_id' => 9,
                'sign' => '6511061853c18.png',
                'slug' => '9lcwQbj3yXq3mX8zgd4g',
                'created_at' => '2023-09-25 03:46:05',
                'updated_at' => '2023-09-25 04:01:28',
            ),
            52 => 
            array (
                'id' => 1124,
                'presensi_id' => 73,
                'peserta_id' => 162,
                'sign' => '651105580a0d4.png',
                'slug' => '98D0g5GaAAZyUGmOfXog',
                'created_at' => '2023-09-25 03:46:11',
                'updated_at' => '2023-09-25 03:58:16',
            ),
            53 => 
            array (
                'id' => 1125,
                'presensi_id' => 73,
                'peserta_id' => 159,
                'sign' => '65111195686a8.png',
                'slug' => 'Ki68AQzTFjyW7K407h1s',
                'created_at' => '2023-09-25 03:46:21',
                'updated_at' => '2023-09-25 04:50:29',
            ),
            54 => 
            array (
                'id' => 1126,
                'presensi_id' => 73,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'iTgFUBTdVy2GxLirE1Ls',
                'created_at' => '2023-09-25 03:46:33',
                'updated_at' => '2023-09-25 03:46:33',
            ),
            55 => 
            array (
                'id' => 1127,
                'presensi_id' => 73,
                'peserta_id' => 12,
                'sign' => '651111469699f.png',
                'slug' => 'BIuPzwOM0K9KJGIClId0',
                'created_at' => '2023-09-25 03:46:40',
                'updated_at' => '2023-09-25 04:49:10',
            ),
            56 => 
            array (
                'id' => 1128,
                'presensi_id' => 73,
                'peserta_id' => 107,
                'sign' => '651107a491b0e.png',
                'slug' => 'Lud1aDrIS2WXiUttQGlS',
                'created_at' => '2023-09-25 03:46:50',
                'updated_at' => '2023-09-25 04:08:04',
            ),
            57 => 
            array (
                'id' => 1129,
                'presensi_id' => 73,
                'peserta_id' => 108,
                'sign' => '65110cd698e9a.png',
                'slug' => 't2Nc0a7tPlnALvQ7uEvB',
                'created_at' => '2023-09-25 03:46:54',
                'updated_at' => '2023-09-25 04:30:14',
            ),
            58 => 
            array (
                'id' => 1130,
                'presensi_id' => 73,
                'peserta_id' => 109,
                'sign' => '65111ab5a784a.png',
                'slug' => 'Q2MQ4DBkL3pofAaZOWlR',
                'created_at' => '2023-09-25 03:46:59',
                'updated_at' => '2023-09-25 05:29:25',
            ),
            59 => 
            array (
                'id' => 1131,
                'presensi_id' => 73,
                'peserta_id' => 21,
                'sign' => '651108ba10588.png',
                'slug' => 'NhQXIFYaRHgBaWqHkWaG',
                'created_at' => '2023-09-25 03:47:07',
                'updated_at' => '2023-09-25 04:12:42',
            ),
            60 => 
            array (
                'id' => 1132,
                'presensi_id' => 73,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '54IwwkeGkPImwRgsfsmk',
                'created_at' => '2023-09-25 03:47:12',
                'updated_at' => '2023-09-25 03:47:12',
            ),
            61 => 
            array (
                'id' => 1133,
                'presensi_id' => 73,
                'peserta_id' => 38,
                'sign' => '651109187f79f.png',
                'slug' => 'D3BxPqfVXSsHonZX0HKO',
                'created_at' => '2023-09-25 03:47:16',
                'updated_at' => '2023-09-25 04:14:16',
            ),
            62 => 
            array (
                'id' => 1134,
                'presensi_id' => 73,
                'peserta_id' => 102,
                'sign' => '651108a6be01c.png',
                'slug' => 'TgVGp0p7rUIrgG6RBcJc',
                'created_at' => '2023-09-25 03:47:20',
                'updated_at' => '2023-09-25 04:12:22',
            ),
            63 => 
            array (
                'id' => 1136,
                'presensi_id' => 73,
                'peserta_id' => 152,
                'sign' => '65110879e6bd4.png',
                'slug' => 'zatxBuyeGsUAhDiVa6Ob',
                'created_at' => '2023-09-25 04:06:52',
                'updated_at' => '2023-09-25 04:11:37',
            ),
            64 => 
            array (
                'id' => 1137,
                'presensi_id' => 74,
                'peserta_id' => 5,
                'sign' => '651259c214b43.png',
                'slug' => 'sae2vXOH2WS8ZrTPVHBp',
                'created_at' => '2023-09-26 03:52:07',
                'updated_at' => '2023-09-26 04:10:42',
            ),
            65 => 
            array (
                'id' => 1138,
                'presensi_id' => 74,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'SIIdMdT4KwF2CBH0RoQB',
                'created_at' => '2023-09-26 03:52:49',
                'updated_at' => '2023-09-26 03:52:49',
            ),
            66 => 
            array (
                'id' => 1139,
                'presensi_id' => 74,
                'peserta_id' => 9,
                'sign' => '651271666b2ce.png',
                'slug' => 'XatSN7OxwX5fom2iBAMN',
                'created_at' => '2023-09-26 03:52:53',
                'updated_at' => '2023-09-26 05:51:34',
            ),
            67 => 
            array (
                'id' => 1140,
                'presensi_id' => 74,
                'peserta_id' => 162,
                'sign' => '651262a7aa87e.png',
                'slug' => 'gIic5F9RCWOTL2E6ODBp',
                'created_at' => '2023-09-26 03:52:59',
                'updated_at' => '2023-09-26 04:48:39',
            ),
            68 => 
            array (
                'id' => 1141,
                'presensi_id' => 74,
                'peserta_id' => 159,
                'sign' => '65125cf8cf430.png',
                'slug' => 'uDOG0oplTfLpt4kIfppW',
                'created_at' => '2023-09-26 03:53:24',
                'updated_at' => '2023-09-26 04:24:24',
            ),
            69 => 
            array (
                'id' => 1142,
                'presensi_id' => 74,
                'peserta_id' => 11,
                'sign' => '6512627cd52da.png',
                'slug' => 'VZIUeuMyNqkx6vP7tlGB',
                'created_at' => '2023-09-26 03:53:28',
                'updated_at' => '2023-09-26 04:47:56',
            ),
            70 => 
            array (
                'id' => 1143,
                'presensi_id' => 74,
                'peserta_id' => 12,
                'sign' => '65125a00a776a.png',
                'slug' => 'qGz20CuTsSCZyVoigzZv',
                'created_at' => '2023-09-26 03:53:32',
                'updated_at' => '2023-09-26 04:11:44',
            ),
            71 => 
            array (
                'id' => 1144,
                'presensi_id' => 74,
                'peserta_id' => 107,
                'sign' => '65125c0552cb4.png',
                'slug' => 'jblPD3mgZshyluZn8GzT',
                'created_at' => '2023-09-26 03:53:36',
                'updated_at' => '2023-09-26 04:20:21',
            ),
            72 => 
            array (
                'id' => 1145,
                'presensi_id' => 74,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'QwPAQf3bub0eWjepgu78',
                'created_at' => '2023-09-26 03:53:41',
                'updated_at' => '2023-09-26 03:53:41',
            ),
            73 => 
            array (
                'id' => 1146,
                'presensi_id' => 74,
                'peserta_id' => 109,
                'sign' => '65125baa5212e.png',
                'slug' => 'GVbdxSnapdCKL0hdCLwy',
                'created_at' => '2023-09-26 03:53:52',
                'updated_at' => '2023-09-26 04:18:50',
            ),
            74 => 
            array (
                'id' => 1147,
                'presensi_id' => 74,
                'peserta_id' => 21,
                'sign' => '651266432486f.png',
                'slug' => '98JN2OpGGTAGCp4uWea2',
                'created_at' => '2023-09-26 03:54:18',
                'updated_at' => '2023-09-26 05:04:03',
            ),
            75 => 
            array (
                'id' => 1148,
                'presensi_id' => 74,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'QQS27UPLVQEkdQIihlXj',
                'created_at' => '2023-09-26 03:54:22',
                'updated_at' => '2023-09-26 03:54:22',
            ),
            76 => 
            array (
                'id' => 1149,
                'presensi_id' => 74,
                'peserta_id' => 38,
                'sign' => '6512e352bd0b4.png',
                'slug' => 'fpzyaF7OZ8f50L7HZHpM',
                'created_at' => '2023-09-26 03:54:26',
                'updated_at' => '2023-09-26 13:57:38',
            ),
            77 => 
            array (
                'id' => 1150,
                'presensi_id' => 74,
                'peserta_id' => 111,
                'sign' => '65125eb2ee72a.png',
                'slug' => 'OTCMxmDqdm47ZhnoMASU',
                'created_at' => '2023-09-26 03:54:31',
                'updated_at' => '2023-09-26 04:31:46',
            ),
            78 => 
            array (
                'id' => 1151,
                'presensi_id' => 74,
                'peserta_id' => 151,
                'sign' => '65125bf216864.png',
                'slug' => 'q6pApht90Zs5IXw9oOka',
                'created_at' => '2023-09-26 04:19:25',
                'updated_at' => '2023-09-26 04:20:02',
            ),
            79 => 
            array (
                'id' => 1152,
                'presensi_id' => 75,
                'peserta_id' => 5,
                'sign' => '6513daf884884.png',
                'slug' => 'uGRxGPA4Qwik1YbbTP6R',
                'created_at' => '2023-09-27 04:52:20',
                'updated_at' => '2023-09-27 07:34:16',
            ),
            80 => 
            array (
                'id' => 1153,
                'presensi_id' => 75,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'aE1U04Jnph5vQT2febad',
                'created_at' => '2023-09-27 04:52:38',
                'updated_at' => '2023-09-27 04:52:38',
            ),
            81 => 
            array (
                'id' => 1154,
                'presensi_id' => 75,
                'peserta_id' => 9,
                'sign' => '6513df745a57d.png',
                'slug' => 'DkzPVPEsBjrZejS06ihY',
                'created_at' => '2023-09-27 04:52:42',
                'updated_at' => '2023-09-27 07:53:24',
            ),
            82 => 
            array (
                'id' => 1155,
                'presensi_id' => 75,
                'peserta_id' => 162,
                'sign' => '6513dc13b47b9.png',
                'slug' => 'baLFMvG2JlIULUEYDkY1',
                'created_at' => '2023-09-27 04:52:50',
                'updated_at' => '2023-09-27 07:38:59',
            ),
            83 => 
            array (
                'id' => 1156,
                'presensi_id' => 75,
                'peserta_id' => 159,
                'sign' => '6513dff609513.png',
                'slug' => 'SA5lBkRaamEWMozWhEwE',
                'created_at' => '2023-09-27 04:52:56',
                'updated_at' => '2023-09-27 07:55:34',
            ),
            84 => 
            array (
                'id' => 1157,
                'presensi_id' => 75,
                'peserta_id' => 11,
                'sign' => '6513dd764993c.png',
                'slug' => 'XEWJhwGk4ZGTjMcGBt7m',
                'created_at' => '2023-09-27 04:53:01',
                'updated_at' => '2023-09-27 07:44:54',
            ),
            85 => 
            array (
                'id' => 1158,
                'presensi_id' => 75,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'Nja0Da9tjkvTy6vHesnk',
                'created_at' => '2023-09-27 04:53:09',
                'updated_at' => '2023-09-27 04:53:09',
            ),
            86 => 
            array (
                'id' => 1159,
                'presensi_id' => 75,
                'peserta_id' => 107,
                'sign' => '6513dc04a6ec2.png',
                'slug' => 'Komf3RUrRM4lIjczjy4c',
                'created_at' => '2023-09-27 04:53:19',
                'updated_at' => '2023-09-27 07:38:44',
            ),
            87 => 
            array (
                'id' => 1160,
                'presensi_id' => 75,
                'peserta_id' => 108,
                'sign' => '6513db4f2cba2.png',
                'slug' => 'vy6DBUt9NYX6S23y7FXL',
                'created_at' => '2023-09-27 04:53:25',
                'updated_at' => '2023-09-27 07:35:43',
            ),
            88 => 
            array (
                'id' => 1161,
                'presensi_id' => 75,
                'peserta_id' => 109,
                'sign' => '6513f110b8b3f.png',
                'slug' => 'uVCUNjbU7XvdUjGoAJWQ',
                'created_at' => '2023-09-27 04:53:31',
                'updated_at' => '2023-09-27 09:08:32',
            ),
            89 => 
            array (
                'id' => 1162,
                'presensi_id' => 75,
                'peserta_id' => 21,
                'sign' => '6513dc25b719c.png',
                'slug' => '3TSeBKszQJsrqLV13dRh',
                'created_at' => '2023-09-27 04:54:00',
                'updated_at' => '2023-09-27 07:39:17',
            ),
            90 => 
            array (
                'id' => 1163,
                'presensi_id' => 75,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'YCBLMyWsVMrauY0FcbEg',
                'created_at' => '2023-09-27 04:54:05',
                'updated_at' => '2023-09-27 04:54:05',
            ),
            91 => 
            array (
                'id' => 1164,
                'presensi_id' => 75,
                'peserta_id' => 38,
                'sign' => '6513dbdf39d01.png',
                'slug' => 'G1u4uNbb7DyU8cczkyi4',
                'created_at' => '2023-09-27 04:54:09',
                'updated_at' => '2023-09-27 07:38:07',
            ),
            92 => 
            array (
                'id' => 1165,
                'presensi_id' => 75,
                'peserta_id' => 113,
                'sign' => '6513e553a46eb.png',
                'slug' => '6cf8jUL0JSdZl9BWSpZN',
                'created_at' => '2023-09-27 04:54:14',
                'updated_at' => '2023-09-27 08:18:27',
            ),
            93 => 
            array (
                'id' => 1166,
                'presensi_id' => 75,
                'peserta_id' => 98,
                'sign' => '6513e7eec7a2c.png',
                'slug' => 'Z2qSbgzKSazyNPg34uEM',
                'created_at' => '2023-09-27 04:54:21',
                'updated_at' => '2023-09-27 08:29:34',
            ),
            94 => 
            array (
                'id' => 1167,
                'presensi_id' => 76,
                'peserta_id' => 5,
                'sign' => '65164738a8771.png',
                'slug' => 'uJZUy3s0KwmBSJrd7ai6',
                'created_at' => '2023-09-29 03:36:14',
                'updated_at' => '2023-09-29 03:40:40',
            ),
            95 => 
            array (
                'id' => 1168,
                'presensi_id' => 76,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'jLgDTN92rwW7sXU6z6MR',
                'created_at' => '2023-09-29 03:36:55',
                'updated_at' => '2023-09-29 03:36:55',
            ),
            96 => 
            array (
                'id' => 1169,
                'presensi_id' => 76,
                'peserta_id' => 9,
                'sign' => '65164922d6c83.png',
                'slug' => 'kyE79eDMLhn9KuwcxDk2',
                'created_at' => '2023-09-29 03:36:59',
                'updated_at' => '2023-09-29 03:48:50',
            ),
            97 => 
            array (
                'id' => 1170,
                'presensi_id' => 76,
                'peserta_id' => 162,
                'sign' => '651647ada2d41.png',
                'slug' => 'ElJuzqxdkxlkFloBsT3p',
                'created_at' => '2023-09-29 03:37:08',
                'updated_at' => '2023-09-29 03:42:37',
            ),
            98 => 
            array (
                'id' => 1171,
                'presensi_id' => 76,
                'peserta_id' => 159,
                'sign' => '6516472439eab.png',
                'slug' => 'XzAs8646ndSqq9fcyzjN',
                'created_at' => '2023-09-29 03:37:14',
                'updated_at' => '2023-09-29 03:40:20',
            ),
            99 => 
            array (
                'id' => 1172,
                'presensi_id' => 76,
                'peserta_id' => 11,
                'sign' => '651648e5b6cab.png',
                'slug' => 'TzCSk4vXVMLw0qaU0BhO',
                'created_at' => '2023-09-29 03:37:19',
                'updated_at' => '2023-09-29 03:47:49',
            ),
            100 => 
            array (
                'id' => 1173,
                'presensi_id' => 76,
                'peserta_id' => 12,
                'sign' => '651647f54a3ac.png',
                'slug' => 'DSAkv9ZFROeK5tBpftAN',
                'created_at' => '2023-09-29 03:37:23',
                'updated_at' => '2023-09-29 03:43:49',
            ),
            101 => 
            array (
                'id' => 1174,
                'presensi_id' => 76,
                'peserta_id' => 107,
                'sign' => '651649aaa2cc9.png',
                'slug' => 'uRBpxAdrYRXQHNyjiwS7',
                'created_at' => '2023-09-29 03:37:29',
                'updated_at' => '2023-09-29 03:51:06',
            ),
            102 => 
            array (
                'id' => 1175,
                'presensi_id' => 76,
                'peserta_id' => 108,
                'sign' => '651648799b815.png',
                'slug' => 'xapOp3E9GpPZlAjXuaAv',
                'created_at' => '2023-09-29 03:37:33',
                'updated_at' => '2023-09-29 03:46:01',
            ),
            103 => 
            array (
                'id' => 1176,
                'presensi_id' => 76,
                'peserta_id' => 109,
                'sign' => '6516ad918f7ab.png',
                'slug' => 'C0hIr0dFL93Ih9pMe1fN',
                'created_at' => '2023-09-29 03:37:38',
                'updated_at' => '2023-09-29 10:57:21',
            ),
            104 => 
            array (
                'id' => 1177,
                'presensi_id' => 76,
                'peserta_id' => 21,
                'sign' => '6516487930391.png',
                'slug' => 'ThITHhRELX6H9sibEr2D',
                'created_at' => '2023-09-29 03:37:42',
                'updated_at' => '2023-09-29 03:46:01',
            ),
            105 => 
            array (
                'id' => 1178,
                'presensi_id' => 76,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'txAUEyKID41ueWLyJP20',
                'created_at' => '2023-09-29 03:37:47',
                'updated_at' => '2023-09-29 03:37:47',
            ),
            106 => 
            array (
                'id' => 1179,
                'presensi_id' => 76,
                'peserta_id' => 38,
                'sign' => '65167e2acba96.png',
                'slug' => 'K7xvA90ENAFdyzh1ZBjw',
                'created_at' => '2023-09-29 03:37:52',
                'updated_at' => '2023-09-29 07:35:06',
            ),
            107 => 
            array (
                'id' => 1180,
                'presensi_id' => 76,
                'peserta_id' => 105,
                'sign' => '651647f6b923d.png',
                'slug' => 'TGOD4eGwPpCtrRJAWcZZ',
                'created_at' => '2023-09-29 03:38:05',
                'updated_at' => '2023-09-29 03:43:50',
            ),
            108 => 
            array (
                'id' => 1181,
                'presensi_id' => 76,
                'peserta_id' => 100,
                'sign' => '6516480c1df8f.png',
                'slug' => '45fKH3TxYg67sgoCev9G',
                'created_at' => '2023-09-29 03:38:10',
                'updated_at' => '2023-09-29 03:44:12',
            ),
            109 => 
            array (
                'id' => 1182,
                'presensi_id' => 77,
                'peserta_id' => 5,
                'sign' => '652cd19c34859.png',
                'slug' => 'esdyIIWSGo3F8qY7NPSO',
                'created_at' => '2023-10-16 04:36:24',
                'updated_at' => '2023-10-16 06:01:00',
            ),
            110 => 
            array (
                'id' => 1183,
                'presensi_id' => 77,
                'peserta_id' => 6,
                'sign' => '652cd4681fdc1.png',
                'slug' => 'tjb6v3purVxjkebT5DT2',
                'created_at' => '2023-10-16 04:36:45',
                'updated_at' => '2023-10-16 06:12:56',
            ),
            111 => 
            array (
                'id' => 1184,
                'presensi_id' => 77,
                'peserta_id' => 9,
                'sign' => '652ceb3b5569c.png',
                'slug' => '0x3jUpRa05RQXEhXQ6RF',
                'created_at' => '2023-10-16 04:36:58',
                'updated_at' => '2023-10-16 07:50:19',
            ),
            112 => 
            array (
                'id' => 1187,
                'presensi_id' => 77,
                'peserta_id' => 11,
                'sign' => '652cd92cc5f42.png',
                'slug' => '5RfjNJflJUKkTWYavl8L',
                'created_at' => '2023-10-16 04:37:17',
                'updated_at' => '2023-10-16 06:33:16',
            ),
            113 => 
            array (
                'id' => 1188,
                'presensi_id' => 77,
                'peserta_id' => 12,
                'sign' => '652cd98c871bf.png',
                'slug' => '0vqS0Wwzrcs4GEw4utIF',
                'created_at' => '2023-10-16 04:42:47',
                'updated_at' => '2023-10-16 06:34:52',
            ),
            114 => 
            array (
                'id' => 1189,
                'presensi_id' => 77,
                'peserta_id' => 107,
                'sign' => '652cd26b5d84f.png',
                'slug' => '6ZBUMjjOu3UTWqJdHOXO',
                'created_at' => '2023-10-16 04:42:55',
                'updated_at' => '2023-10-16 06:04:27',
            ),
            115 => 
            array (
                'id' => 1190,
                'presensi_id' => 77,
                'peserta_id' => 108,
                'sign' => '652cede5ca427.png',
                'slug' => 'LZDHEAdx0IxJgVDFKbpp',
                'created_at' => '2023-10-16 04:43:03',
                'updated_at' => '2023-10-16 08:01:41',
            ),
            116 => 
            array (
                'id' => 1191,
                'presensi_id' => 77,
                'peserta_id' => 109,
                'sign' => '652cd09a2fe2d.png',
                'slug' => 'PLQTB8VJZ0VLk0k8bNjz',
                'created_at' => '2023-10-16 04:43:13',
                'updated_at' => '2023-10-16 05:56:42',
            ),
            117 => 
            array (
                'id' => 1192,
                'presensi_id' => 77,
                'peserta_id' => 21,
                'sign' => '652cd1c7d6e1e.png',
                'slug' => 'Ds1VbGfn8ioUaLNpm4Rc',
                'created_at' => '2023-10-16 04:43:19',
                'updated_at' => '2023-10-16 06:01:43',
            ),
            118 => 
            array (
                'id' => 1193,
                'presensi_id' => 77,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '7T35j3rnjfIRV15G1bhu',
                'created_at' => '2023-10-16 04:43:26',
                'updated_at' => '2023-10-16 04:43:26',
            ),
            119 => 
            array (
                'id' => 1194,
                'presensi_id' => 77,
                'peserta_id' => 38,
                'sign' => '652de96f81a8c.png',
                'slug' => 'qQAMyb0bdPy2TCjOUarM',
                'created_at' => '2023-10-16 04:43:33',
                'updated_at' => '2023-10-17 01:54:55',
            ),
            120 => 
            array (
                'id' => 1195,
                'presensi_id' => 77,
                'peserta_id' => 102,
                'sign' => '652cd4a56f4b5.png',
                'slug' => 'c1JGOWM5bIULbJKswhHA',
                'created_at' => '2023-10-16 04:43:40',
                'updated_at' => '2023-10-16 06:13:57',
            ),
            121 => 
            array (
                'id' => 1196,
                'presensi_id' => 77,
                'peserta_id' => 152,
                'sign' => '652cd14f20f71.png',
                'slug' => 'OSMv0vchm4txO1FZohSG',
                'created_at' => '2023-10-16 04:43:46',
                'updated_at' => '2023-10-16 05:59:43',
            ),
            122 => 
            array (
                'id' => 1197,
                'presensi_id' => 78,
                'peserta_id' => 5,
                'sign' => '6541cfe5ed0c5.png',
                'slug' => 'MS78hTjNC6xl9QVhCHCu',
                'created_at' => '2023-11-01 02:26:45',
                'updated_at' => '2023-11-01 04:11:17',
            ),
            123 => 
            array (
                'id' => 1198,
                'presensi_id' => 78,
                'peserta_id' => 6,
                'sign' => '6541d0ac975b6.png',
                'slug' => 'bETJAh73d9Wj2aTtyqlB',
                'created_at' => '2023-11-01 02:26:56',
                'updated_at' => '2023-11-01 04:14:36',
            ),
            124 => 
            array (
                'id' => 1199,
                'presensi_id' => 78,
                'peserta_id' => 9,
                'sign' => '6541c4a9ca055.png',
                'slug' => 'lYe9U0JYyujs8QOnK4dY',
                'created_at' => '2023-11-01 02:27:01',
                'updated_at' => '2023-11-01 03:23:21',
            ),
            125 => 
            array (
                'id' => 1200,
                'presensi_id' => 78,
                'peserta_id' => 10,
                'sign' => '6541c5b4d64c3.png',
                'slug' => 'gl9ZTJNfVBZTwq16D0Xm',
                'created_at' => '2023-11-01 02:27:13',
                'updated_at' => '2023-11-01 03:27:48',
            ),
            126 => 
            array (
                'id' => 1201,
                'presensi_id' => 78,
                'peserta_id' => 85,
                'sign' => '6541c4731430e.png',
                'slug' => 's19bPkMCscu5ABbLHq7Z',
                'created_at' => '2023-11-01 02:27:18',
                'updated_at' => '2023-11-01 03:22:27',
            ),
            127 => 
            array (
                'id' => 1202,
                'presensi_id' => 78,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'L35aJCosdPDM2NE3Z9Tm',
                'created_at' => '2023-11-01 02:27:23',
                'updated_at' => '2023-11-01 02:27:23',
            ),
            128 => 
            array (
                'id' => 1203,
                'presensi_id' => 78,
                'peserta_id' => 12,
                'sign' => '6541c5b93b575.png',
                'slug' => 'f3UPfIWqhHbiQ0zdgdrm',
                'created_at' => '2023-11-01 02:27:52',
                'updated_at' => '2023-11-01 03:27:53',
            ),
            129 => 
            array (
                'id' => 1204,
                'presensi_id' => 78,
                'peserta_id' => 107,
                'sign' => '6541c4d9717ba.png',
                'slug' => 'TAokHehozjptJVwMzSug',
                'created_at' => '2023-11-01 02:48:15',
                'updated_at' => '2023-11-01 03:24:09',
            ),
            130 => 
            array (
                'id' => 1205,
                'presensi_id' => 78,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'SzL52QhfNqVNd2RXGIlY',
                'created_at' => '2023-11-01 02:48:19',
                'updated_at' => '2023-11-01 02:48:19',
            ),
            131 => 
            array (
                'id' => 1206,
                'presensi_id' => 78,
                'peserta_id' => 109,
                'sign' => '6541c53c3b215.png',
                'slug' => 'yxurN4cJ8iwfpVvXNYqb',
                'created_at' => '2023-11-01 02:48:24',
                'updated_at' => '2023-11-01 03:25:48',
            ),
            132 => 
            array (
                'id' => 1207,
                'presensi_id' => 78,
                'peserta_id' => 21,
                'sign' => '6541c4e4ec59a.png',
                'slug' => 'YT1XB2rF9SjQ6YgWi1lN',
                'created_at' => '2023-11-01 02:49:31',
                'updated_at' => '2023-11-01 03:24:20',
            ),
            133 => 
            array (
                'id' => 1208,
                'presensi_id' => 78,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'KUjgbgr9DVZ0dvr4izBk',
                'created_at' => '2023-11-01 02:49:36',
                'updated_at' => '2023-11-01 02:49:36',
            ),
            134 => 
            array (
                'id' => 1209,
                'presensi_id' => 78,
                'peserta_id' => 38,
                'sign' => NULL,
                'slug' => '8oq8LVZaW9Bjmwgd1bqB',
                'created_at' => '2023-11-01 02:49:40',
                'updated_at' => '2023-11-01 02:49:40',
            ),
            135 => 
            array (
                'id' => 1210,
                'presensi_id' => 78,
                'peserta_id' => 98,
                'sign' => NULL,
                'slug' => '6kKnr9VaKFOTUeblF5rZ',
                'created_at' => '2023-11-01 02:49:50',
                'updated_at' => '2023-11-01 02:49:50',
            ),
            136 => 
            array (
                'id' => 1211,
                'presensi_id' => 78,
                'peserta_id' => 113,
                'sign' => '6541c53ef1c7d.png',
                'slug' => 'gcqSQqQ1BNByr9IyOyrA',
                'created_at' => '2023-11-01 02:49:56',
                'updated_at' => '2023-11-01 03:25:50',
            ),
            137 => 
            array (
                'id' => 1212,
                'presensi_id' => 78,
                'peserta_id' => 152,
                'sign' => '6541c4a51bf72.png',
                'slug' => 'I6VpPzpt8VrjG63BgySA',
                'created_at' => '2023-11-01 02:50:06',
                'updated_at' => '2023-11-01 03:23:17',
            ),
            138 => 
            array (
                'id' => 1213,
                'presensi_id' => 78,
                'peserta_id' => 100,
                'sign' => '6541c51a8baa9.png',
                'slug' => 'hxwKTi1mp8H3jtB7Ddqn',
                'created_at' => '2023-11-01 02:50:29',
                'updated_at' => '2023-11-01 03:25:14',
            ),
            139 => 
            array (
                'id' => 1214,
                'presensi_id' => 78,
                'peserta_id' => 102,
                'sign' => '6541c561e4575.png',
                'slug' => 'xkUELrYHD25vdbsb10P5',
                'created_at' => '2023-11-01 02:50:36',
                'updated_at' => '2023-11-01 03:26:25',
            ),
            140 => 
            array (
                'id' => 1215,
                'presensi_id' => 78,
                'peserta_id' => 105,
                'sign' => '6541c4dd65a31.png',
                'slug' => 'C1BtVEFciRHbkgzre9Nt',
                'created_at' => '2023-11-01 02:50:43',
                'updated_at' => '2023-11-01 03:24:13',
            ),
            141 => 
            array (
                'id' => 1216,
                'presensi_id' => 78,
                'peserta_id' => 151,
                'sign' => NULL,
                'slug' => 'JcHjMVBo6WM1uQti2oia',
                'created_at' => '2023-11-01 03:23:56',
                'updated_at' => '2023-11-01 03:23:56',
            ),
            142 => 
            array (
                'id' => 1217,
                'presensi_id' => 79,
                'peserta_id' => 5,
                'sign' => '6549d722cd926.png',
                'slug' => 'KDFoGgTTA2pDh79BwEkX',
                'created_at' => '2023-11-07 06:00:44',
                'updated_at' => '2023-11-07 06:20:18',
            ),
            143 => 
            array (
                'id' => 1218,
                'presensi_id' => 79,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => '7cbn1GY4HPKIkLIzxI9X',
                'created_at' => '2023-11-07 06:01:23',
                'updated_at' => '2023-11-07 06:01:23',
            ),
            144 => 
            array (
                'id' => 1219,
                'presensi_id' => 79,
                'peserta_id' => 9,
                'sign' => '6549d6e81602c.png',
                'slug' => 'PAeEgHq3KCFMigje2if0',
                'created_at' => '2023-11-07 06:01:28',
                'updated_at' => '2023-11-07 06:19:20',
            ),
            145 => 
            array (
                'id' => 1220,
                'presensi_id' => 79,
                'peserta_id' => 10,
                'sign' => '6549e80b6d28f.png',
                'slug' => '9hxUlu8txOV6DsXVfR50',
                'created_at' => '2023-11-07 06:01:32',
                'updated_at' => '2023-11-07 07:32:27',
            ),
            146 => 
            array (
                'id' => 1221,
                'presensi_id' => 79,
                'peserta_id' => 85,
                'sign' => '6549ee487de83.png',
                'slug' => 'zoZizlZ2rQZ2QGcuCTbt',
                'created_at' => '2023-11-07 06:01:36',
                'updated_at' => '2023-11-07 07:59:04',
            ),
            147 => 
            array (
                'id' => 1222,
                'presensi_id' => 79,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => '0whXq3hEuCHfVC4W6uA0',
                'created_at' => '2023-11-07 06:01:41',
                'updated_at' => '2023-11-07 06:01:41',
            ),
            148 => 
            array (
                'id' => 1223,
                'presensi_id' => 79,
                'peserta_id' => 12,
                'sign' => '6549d78f124b7.png',
                'slug' => 'q8w3iM8dZkvnWYXiW2iM',
                'created_at' => '2023-11-07 06:01:53',
                'updated_at' => '2023-11-07 06:22:07',
            ),
            149 => 
            array (
                'id' => 1224,
                'presensi_id' => 79,
                'peserta_id' => 107,
                'sign' => '6549e7bfaf36f.png',
                'slug' => '7txFwjxjJm5m8fvyywuw',
                'created_at' => '2023-11-07 06:01:57',
                'updated_at' => '2023-11-07 07:31:11',
            ),
            150 => 
            array (
                'id' => 1225,
                'presensi_id' => 79,
                'peserta_id' => 109,
                'sign' => '6549e7feaee15.png',
                'slug' => '4VNSdcu58MpYTU4Oz8dM',
                'created_at' => '2023-11-07 06:02:02',
                'updated_at' => '2023-11-07 07:32:14',
            ),
            151 => 
            array (
                'id' => 1226,
                'presensi_id' => 79,
                'peserta_id' => 108,
                'sign' => '654b129a965a7.png',
                'slug' => 'PR2StPm57YH5EIbd7QH5',
                'created_at' => '2023-11-07 06:02:07',
                'updated_at' => '2023-11-08 04:46:18',
            ),
            152 => 
            array (
                'id' => 1227,
                'presensi_id' => 79,
                'peserta_id' => 21,
                'sign' => '654b08ceb5e59.png',
                'slug' => 'QhSkAiLRAWxtBFO6Es3v',
                'created_at' => '2023-11-07 06:02:12',
                'updated_at' => '2023-11-08 04:04:30',
            ),
            153 => 
            array (
                'id' => 1228,
                'presensi_id' => 79,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'bVfZpE7Qt6MsBKAp7vwf',
                'created_at' => '2023-11-07 06:02:17',
                'updated_at' => '2023-11-07 06:02:17',
            ),
            154 => 
            array (
                'id' => 1229,
                'presensi_id' => 79,
                'peserta_id' => 38,
                'sign' => '6549d983ac328.png',
                'slug' => 'SSYly6oJPkCuiRUH7qDt',
                'created_at' => '2023-11-07 06:02:23',
                'updated_at' => '2023-11-07 06:30:27',
            ),
            155 => 
            array (
                'id' => 1230,
                'presensi_id' => 79,
                'peserta_id' => 111,
                'sign' => '6549df33e570e.png',
                'slug' => '6w5Gme5qIWp2Ebbxpabh',
                'created_at' => '2023-11-07 06:02:30',
                'updated_at' => '2023-11-07 06:54:43',
            ),
            156 => 
            array (
                'id' => 1231,
                'presensi_id' => 79,
                'peserta_id' => 151,
                'sign' => '6549e421ba31f.png',
                'slug' => 'I0U1O6lj2xHJEbK5Rcgw',
                'created_at' => '2023-11-07 06:02:35',
                'updated_at' => '2023-11-07 07:15:45',
            ),
            157 => 
            array (
                'id' => 1232,
                'presensi_id' => 80,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'DNickQSASvnQ32s18eec',
                'created_at' => '2023-11-08 03:12:21',
                'updated_at' => '2023-11-08 03:12:21',
            ),
            158 => 
            array (
                'id' => 1233,
                'presensi_id' => 80,
                'peserta_id' => 6,
                'sign' => '654b05747ee42.png',
                'slug' => '8bxPBvy2NP1bX5V2lDwR',
                'created_at' => '2023-11-08 03:12:29',
                'updated_at' => '2023-11-08 03:50:12',
            ),
            159 => 
            array (
                'id' => 1234,
                'presensi_id' => 80,
                'peserta_id' => 9,
                'sign' => '654b0649cb910.png',
                'slug' => '5e2N3crVg3oqafKYwpjO',
                'created_at' => '2023-11-08 03:12:33',
                'updated_at' => '2023-11-08 03:53:45',
            ),
            160 => 
            array (
                'id' => 1235,
                'presensi_id' => 80,
                'peserta_id' => 10,
                'sign' => '654b09472a06c.png',
                'slug' => 'ymvDpQ95OHv7h1QgL6Sb',
                'created_at' => '2023-11-08 03:12:52',
                'updated_at' => '2023-11-08 04:06:31',
            ),
            161 => 
            array (
                'id' => 1236,
                'presensi_id' => 80,
                'peserta_id' => 85,
                'sign' => '654b253fefaf7.png',
                'slug' => 'Ju6coDoCsXB0HggYyJlS',
                'created_at' => '2023-11-08 03:14:31',
                'updated_at' => '2023-11-08 06:05:51',
            ),
            162 => 
            array (
                'id' => 1237,
                'presensi_id' => 80,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'UDZ0h085ShBme7VfNDb6',
                'created_at' => '2023-11-08 03:14:46',
                'updated_at' => '2023-11-08 03:14:46',
            ),
            163 => 
            array (
                'id' => 1238,
                'presensi_id' => 80,
                'peserta_id' => 12,
                'sign' => '654b062896a07.png',
                'slug' => '3OqbySTybeKBfrrVmAuo',
                'created_at' => '2023-11-08 03:14:50',
                'updated_at' => '2023-11-08 03:53:12',
            ),
            164 => 
            array (
                'id' => 1239,
                'presensi_id' => 80,
                'peserta_id' => 107,
                'sign' => '654b06665bcfe.png',
                'slug' => 'ihvQ43ccYWidspzGtDgu',
                'created_at' => '2023-11-08 03:14:54',
                'updated_at' => '2023-11-08 03:54:14',
            ),
            165 => 
            array (
                'id' => 1240,
                'presensi_id' => 80,
                'peserta_id' => 109,
                'sign' => '654affc65e538.png',
                'slug' => 'eO4Zs0ggWFsatHrBbjwo',
                'created_at' => '2023-11-08 03:14:58',
                'updated_at' => '2023-11-08 03:25:58',
            ),
            166 => 
            array (
                'id' => 1241,
                'presensi_id' => 80,
                'peserta_id' => 108,
                'sign' => '654b1269df184.png',
                'slug' => 'mFOv3wSgQL1EnFnGYgfn',
                'created_at' => '2023-11-08 03:15:45',
                'updated_at' => '2023-11-08 04:45:29',
            ),
            167 => 
            array (
                'id' => 1242,
                'presensi_id' => 80,
                'peserta_id' => 21,
                'sign' => '654b07debe80c.png',
                'slug' => 'kADoVobjS9XY0NzNgo6S',
                'created_at' => '2023-11-08 03:15:51',
                'updated_at' => '2023-11-08 04:00:30',
            ),
            168 => 
            array (
                'id' => 1243,
                'presensi_id' => 80,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'Lo6njeL8fgE5sPptCOu0',
                'created_at' => '2023-11-08 03:15:55',
                'updated_at' => '2023-11-08 03:15:55',
            ),
            169 => 
            array (
                'id' => 1244,
                'presensi_id' => 80,
                'peserta_id' => 38,
                'sign' => '654b81f69a49d.png',
                'slug' => 'YcjZSvE6XNKKsmFTeK0n',
                'created_at' => '2023-11-08 03:16:03',
                'updated_at' => '2023-11-08 12:41:26',
            ),
            170 => 
            array (
                'id' => 1245,
                'presensi_id' => 80,
                'peserta_id' => 100,
                'sign' => '654affda7cd5d.png',
                'slug' => 'Ppkt85YAv9z8bMqo6GcQ',
                'created_at' => '2023-11-08 03:16:31',
                'updated_at' => '2023-11-08 03:26:18',
            ),
            171 => 
            array (
                'id' => 1246,
                'presensi_id' => 80,
                'peserta_id' => 105,
                'sign' => '654b93248c2ce.png',
                'slug' => 'S8lV1d4tliOY2ecAo72B',
                'created_at' => '2023-11-08 03:16:36',
                'updated_at' => '2023-11-08 13:54:44',
            ),
            172 => 
            array (
                'id' => 1247,
                'presensi_id' => 81,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'YsKhfVUjIIYOCvzNCyNC',
                'created_at' => '2023-11-08 03:17:22',
                'updated_at' => '2023-11-08 03:17:22',
            ),
            173 => 
            array (
                'id' => 1248,
                'presensi_id' => 81,
                'peserta_id' => 6,
                'sign' => '654b056c02381.png',
                'slug' => 'HnDTCjYmobPMHOVoAFqN',
                'created_at' => '2023-11-08 03:17:32',
                'updated_at' => '2023-11-08 03:50:04',
            ),
            174 => 
            array (
                'id' => 1249,
                'presensi_id' => 81,
                'peserta_id' => 9,
                'sign' => '654b06249daea.png',
                'slug' => '6XBmbHvJEEgQDGLFoRig',
                'created_at' => '2023-11-08 03:17:36',
                'updated_at' => '2023-11-08 03:53:08',
            ),
            175 => 
            array (
                'id' => 1250,
                'presensi_id' => 81,
                'peserta_id' => 10,
                'sign' => '654b09538d99f.png',
                'slug' => 'JdsVa7o8eyOLxDmtLiyK',
                'created_at' => '2023-11-08 03:17:48',
                'updated_at' => '2023-11-08 04:06:43',
            ),
            176 => 
            array (
                'id' => 1251,
                'presensi_id' => 81,
                'peserta_id' => 85,
                'sign' => '654b252a3764f.png',
                'slug' => 'prf1fdoHyev00YljtDIm',
                'created_at' => '2023-11-08 03:17:52',
                'updated_at' => '2023-11-08 06:05:30',
            ),
            177 => 
            array (
                'id' => 1252,
                'presensi_id' => 81,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'pY0t6GxkC45Ix4y1l2dS',
                'created_at' => '2023-11-08 03:17:59',
                'updated_at' => '2023-11-08 03:17:59',
            ),
            178 => 
            array (
                'id' => 1253,
                'presensi_id' => 81,
                'peserta_id' => 12,
                'sign' => '654b062f788a6.png',
                'slug' => 'GFGzZ04oD270fcIalbDW',
                'created_at' => '2023-11-08 03:18:03',
                'updated_at' => '2023-11-08 03:53:19',
            ),
            179 => 
            array (
                'id' => 1254,
                'presensi_id' => 81,
                'peserta_id' => 107,
                'sign' => '654b065f8ac17.png',
                'slug' => 'QVTaoVDzX69px4CYbknU',
                'created_at' => '2023-11-08 03:18:09',
                'updated_at' => '2023-11-08 03:54:07',
            ),
            180 => 
            array (
                'id' => 1255,
                'presensi_id' => 81,
                'peserta_id' => 109,
                'sign' => '654affdf1a2e6.png',
                'slug' => 'RX90pWhFUtNAGYXGUaRV',
                'created_at' => '2023-11-08 03:18:13',
                'updated_at' => '2023-11-08 03:26:23',
            ),
            181 => 
            array (
                'id' => 1256,
                'presensi_id' => 81,
                'peserta_id' => 108,
                'sign' => '654b1285ba871.png',
                'slug' => 'm1Z7S5oTiWfwZnwYLo6o',
                'created_at' => '2023-11-08 03:18:17',
                'updated_at' => '2023-11-08 04:45:57',
            ),
            182 => 
            array (
                'id' => 1257,
                'presensi_id' => 81,
                'peserta_id' => 21,
                'sign' => '654b080719e33.png',
                'slug' => 'tB5iyqAhh9tYYsR6BkAB',
                'created_at' => '2023-11-08 03:18:21',
                'updated_at' => '2023-11-08 04:01:11',
            ),
            183 => 
            array (
                'id' => 1258,
                'presensi_id' => 81,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'EGsmrrfzqpAfqGQatlPX',
                'created_at' => '2023-11-08 03:18:27',
                'updated_at' => '2023-11-08 03:18:27',
            ),
            184 => 
            array (
                'id' => 1259,
                'presensi_id' => 81,
                'peserta_id' => 38,
                'sign' => '654b81d5d4ac3.png',
                'slug' => 'vX4MG9GZky54v4Fcpe1U',
                'created_at' => '2023-11-08 03:18:32',
                'updated_at' => '2023-11-08 12:40:53',
            ),
            185 => 
            array (
                'id' => 1260,
                'presensi_id' => 81,
                'peserta_id' => 113,
                'sign' => '654c43fc7330a.png',
                'slug' => 'YDLrgSGK6EU0Qn9wX5Xl',
                'created_at' => '2023-11-08 03:18:36',
                'updated_at' => '2023-11-09 02:29:16',
            ),
            186 => 
            array (
                'id' => 1263,
                'presensi_id' => 81,
                'peserta_id' => 98,
                'sign' => '655321ca1f3b0.png',
                'slug' => 'sVoHU8t6p3HOjsoCXKZD',
                'created_at' => '2023-11-08 05:08:21',
                'updated_at' => '2023-11-14 07:29:14',
            ),
            187 => 
            array (
                'id' => 1264,
                'presensi_id' => 82,
                'peserta_id' => 5,
                'sign' => '6551e808e50f4.png',
                'slug' => 'a33PAVLnCHEd44ImKbBR',
                'created_at' => '2023-11-13 03:12:01',
                'updated_at' => '2023-11-13 09:10:32',
            ),
            188 => 
            array (
                'id' => 1265,
                'presensi_id' => 82,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'VywPDFbGxuDFcffhYVMh',
                'created_at' => '2023-11-13 03:12:24',
                'updated_at' => '2023-11-13 03:12:24',
            ),
            189 => 
            array (
                'id' => 1266,
                'presensi_id' => 82,
                'peserta_id' => 9,
                'sign' => '655197b553e10.png',
                'slug' => 'kW6oz7Y4HAc2vPsBeL5Q',
                'created_at' => '2023-11-13 03:12:30',
                'updated_at' => '2023-11-13 03:27:49',
            ),
            190 => 
            array (
                'id' => 1267,
                'presensi_id' => 82,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => 'Oslhw9zbmbBX422wYlHw',
                'created_at' => '2023-11-13 03:14:17',
                'updated_at' => '2023-11-13 03:14:17',
            ),
            191 => 
            array (
                'id' => 1268,
                'presensi_id' => 82,
                'peserta_id' => 85,
                'sign' => '655198d67d6fa.png',
                'slug' => 'lkp6d5w2mwlQerE5MRas',
                'created_at' => '2023-11-13 03:14:22',
                'updated_at' => '2023-11-13 03:32:38',
            ),
            192 => 
            array (
                'id' => 1269,
                'presensi_id' => 82,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'fbpI7RVM3JYdyHNN6bhp',
                'created_at' => '2023-11-13 03:14:29',
                'updated_at' => '2023-11-13 03:14:29',
            ),
            193 => 
            array (
                'id' => 1270,
                'presensi_id' => 82,
                'peserta_id' => 12,
                'sign' => '65519e07e9277.png',
                'slug' => 'W0YuaJYfx7eTpEuYmrqK',
                'created_at' => '2023-11-13 03:15:08',
                'updated_at' => '2023-11-13 03:54:47',
            ),
            194 => 
            array (
                'id' => 1271,
                'presensi_id' => 82,
                'peserta_id' => 107,
                'sign' => '6551986923d21.png',
                'slug' => 'BJESLdIVLWgE6PbHDhZf',
                'created_at' => '2023-11-13 03:15:14',
                'updated_at' => '2023-11-13 03:30:49',
            ),
            195 => 
            array (
                'id' => 1272,
                'presensi_id' => 82,
                'peserta_id' => 109,
                'sign' => '65519a2f3e00f.png',
                'slug' => 'qT78Tai7WA6CH4t4VmLV',
                'created_at' => '2023-11-13 03:15:19',
                'updated_at' => '2023-11-13 03:38:23',
            ),
            196 => 
            array (
                'id' => 1273,
                'presensi_id' => 82,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'xffzxRsgz8zz5qAyQRNE',
                'created_at' => '2023-11-13 03:15:23',
                'updated_at' => '2023-11-13 03:15:23',
            ),
            197 => 
            array (
                'id' => 1274,
                'presensi_id' => 82,
                'peserta_id' => 21,
                'sign' => '65519bb2417b4.png',
                'slug' => '68J4sK9OgM3O4yiHDc90',
                'created_at' => '2023-11-13 03:15:28',
                'updated_at' => '2023-11-13 03:44:50',
            ),
            198 => 
            array (
                'id' => 1275,
                'presensi_id' => 82,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '63zv5eTfXaRWfBYNmL90',
                'created_at' => '2023-11-13 03:15:32',
                'updated_at' => '2023-11-13 03:15:32',
            ),
            199 => 
            array (
                'id' => 1276,
                'presensi_id' => 82,
                'peserta_id' => 38,
                'sign' => '6551e83319665.png',
                'slug' => '6vDuVrFZmNoYhjcdd4km',
                'created_at' => '2023-11-13 03:15:36',
                'updated_at' => '2023-11-13 09:11:15',
            ),
            200 => 
            array (
                'id' => 1277,
                'presensi_id' => 82,
                'peserta_id' => 102,
                'sign' => '6551e7469a27e.png',
                'slug' => 'DriUPQ4ZGPLVaEThP1HK',
                'created_at' => '2023-11-13 03:15:48',
                'updated_at' => '2023-11-13 09:07:18',
            ),
            201 => 
            array (
                'id' => 1278,
                'presensi_id' => 82,
                'peserta_id' => 152,
                'sign' => '6551a1858e179.png',
                'slug' => 'XAhE2q4v5Y2D1mjI3WvR',
                'created_at' => '2023-11-13 03:15:52',
                'updated_at' => '2023-11-13 04:09:41',
            ),
            202 => 
            array (
                'id' => 1279,
                'presensi_id' => 83,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'T0vkcP2eVxrkM4dzi7Yy',
                'created_at' => '2023-11-14 01:51:04',
                'updated_at' => '2023-11-14 01:51:04',
            ),
            203 => 
            array (
                'id' => 1280,
                'presensi_id' => 83,
                'peserta_id' => 6,
                'sign' => '65532225dc87e.png',
                'slug' => 'pKYeYaVCj8RMbj8B43XK',
                'created_at' => '2023-11-14 01:54:40',
                'updated_at' => '2023-11-14 07:30:45',
            ),
            204 => 
            array (
                'id' => 1281,
                'presensi_id' => 83,
                'peserta_id' => 9,
                'sign' => '6552d5d77376c.png',
                'slug' => 'leaABXAhpEkqodebrqS7',
                'created_at' => '2023-11-14 01:54:44',
                'updated_at' => '2023-11-14 02:05:11',
            ),
            205 => 
            array (
                'id' => 1282,
                'presensi_id' => 83,
                'peserta_id' => 10,
                'sign' => '655322485ec70.png',
                'slug' => 'iEYspMTMCet95JPSYOhh',
                'created_at' => '2023-11-14 01:54:49',
                'updated_at' => '2023-11-14 07:31:20',
            ),
            206 => 
            array (
                'id' => 1283,
                'presensi_id' => 83,
                'peserta_id' => 85,
                'sign' => '655315b04a2bc.png',
                'slug' => 'dvSrTVGXPWKyNZfrj0D7',
                'created_at' => '2023-11-14 01:54:54',
                'updated_at' => '2023-11-14 06:37:36',
            ),
            207 => 
            array (
                'id' => 1284,
                'presensi_id' => 83,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'GXzRP4WgWFBeO1y6PzNH',
                'created_at' => '2023-11-14 01:54:59',
                'updated_at' => '2023-11-14 01:54:59',
            ),
            208 => 
            array (
                'id' => 1285,
                'presensi_id' => 83,
                'peserta_id' => 12,
                'sign' => '655321a535c75.png',
                'slug' => 'VbRbKQjFKwQMQJlPLCTi',
                'created_at' => '2023-11-14 01:55:07',
                'updated_at' => '2023-11-14 07:28:37',
            ),
            209 => 
            array (
                'id' => 1286,
                'presensi_id' => 83,
                'peserta_id' => 107,
                'sign' => '6552dfcfc079c.png',
                'slug' => 'uoaug9AFSElYZzcfZ53l',
                'created_at' => '2023-11-14 01:55:40',
                'updated_at' => '2023-11-14 02:47:43',
            ),
            210 => 
            array (
                'id' => 1287,
                'presensi_id' => 83,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'zjkBljAYESrgnFZiMs8J',
                'created_at' => '2023-11-14 01:55:45',
                'updated_at' => '2023-11-14 01:55:45',
            ),
            211 => 
            array (
                'id' => 1288,
                'presensi_id' => 83,
                'peserta_id' => 109,
                'sign' => '6553221da7ccf.png',
                'slug' => 'nG8RHsA6O1yO4xkPSvqS',
                'created_at' => '2023-11-14 01:55:49',
                'updated_at' => '2023-11-14 07:30:37',
            ),
            212 => 
            array (
                'id' => 1289,
                'presensi_id' => 83,
                'peserta_id' => 21,
                'sign' => '6552d6d5d9879.png',
                'slug' => 'XRG7N9gJZrq6nzjMWt5T',
                'created_at' => '2023-11-14 01:55:54',
                'updated_at' => '2023-11-14 02:09:25',
            ),
            213 => 
            array (
                'id' => 1290,
                'presensi_id' => 83,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'L9eqeTDpeLqdeW9TnCYX',
                'created_at' => '2023-11-14 01:55:58',
                'updated_at' => '2023-11-14 01:55:58',
            ),
            214 => 
            array (
                'id' => 1291,
                'presensi_id' => 83,
                'peserta_id' => 38,
                'sign' => '655321bc2d1d6.png',
                'slug' => 'MiwOBEBZ3pbKBe7Ep4or',
                'created_at' => '2023-11-14 01:56:02',
                'updated_at' => '2023-11-14 07:29:00',
            ),
            215 => 
            array (
                'id' => 1292,
                'presensi_id' => 83,
                'peserta_id' => 113,
                'sign' => '6552db0ac2bdf.png',
                'slug' => 'j0Mzj4XCeyu6GpP3z95Y',
                'created_at' => '2023-11-14 01:56:08',
                'updated_at' => '2023-11-14 02:27:22',
            ),
            216 => 
            array (
                'id' => 1293,
                'presensi_id' => 83,
                'peserta_id' => 98,
                'sign' => '655321b1f1e76.png',
                'slug' => 'TstoHsUitRFJEX1A1nup',
                'created_at' => '2023-11-14 01:56:25',
                'updated_at' => '2023-11-14 07:28:49',
            ),
            217 => 
            array (
                'id' => 1294,
                'presensi_id' => 83,
                'peserta_id' => 92,
                'sign' => '6552deda9de1c.png',
                'slug' => 'Pyra7B8ZGuUAdAgxcCPF',
                'created_at' => '2023-11-14 01:56:29',
                'updated_at' => '2023-11-14 02:43:38',
            ),
            218 => 
            array (
                'id' => 1295,
                'presensi_id' => 83,
                'peserta_id' => 25,
                'sign' => '65530dc01245a.png',
                'slug' => '9zOLdpq7OkekmDqmOykN',
                'created_at' => '2023-11-14 01:56:40',
                'updated_at' => '2023-11-14 06:03:44',
            ),
            219 => 
            array (
                'id' => 1296,
                'presensi_id' => 84,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'cuzGHl3j46FFOoT6dMwA',
                'created_at' => '2023-11-15 01:21:37',
                'updated_at' => '2023-11-15 01:21:37',
            ),
            220 => 
            array (
                'id' => 1297,
                'presensi_id' => 84,
                'peserta_id' => 6,
                'sign' => '65543111b7174.png',
                'slug' => 'TIYBpIn6hvJL7SzWxlR5',
                'created_at' => '2023-11-15 01:23:14',
                'updated_at' => '2023-11-15 02:46:41',
            ),
            221 => 
            array (
                'id' => 1298,
                'presensi_id' => 84,
                'peserta_id' => 9,
                'sign' => '65542005229cb.png',
                'slug' => '5el0c2Q13iLMTpg5MLGM',
                'created_at' => '2023-11-15 01:24:07',
                'updated_at' => '2023-11-15 01:33:57',
            ),
            222 => 
            array (
                'id' => 1299,
                'presensi_id' => 84,
                'peserta_id' => 10,
                'sign' => '655420b43bfd8.png',
                'slug' => 'ThUqMLEakF8c2p0OkaMG',
                'created_at' => '2023-11-15 01:24:13',
                'updated_at' => '2023-11-15 01:36:52',
            ),
            223 => 
            array (
                'id' => 1300,
                'presensi_id' => 84,
                'peserta_id' => 85,
                'sign' => '655431e592649.png',
                'slug' => 'bPHaKCe32qA6OqYRDlOy',
                'created_at' => '2023-11-15 01:24:19',
                'updated_at' => '2023-11-15 02:50:13',
            ),
            224 => 
            array (
                'id' => 1301,
                'presensi_id' => 84,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'lblh9jqL1tObMfLvwC5D',
                'created_at' => '2023-11-15 01:24:25',
                'updated_at' => '2023-11-15 01:24:25',
            ),
            225 => 
            array (
                'id' => 1302,
                'presensi_id' => 84,
                'peserta_id' => 12,
                'sign' => '65541ff272021.png',
                'slug' => 'xJ7PxJwykB2MiYJBwu6h',
                'created_at' => '2023-11-15 01:24:31',
                'updated_at' => '2023-11-15 01:33:38',
            ),
            226 => 
            array (
                'id' => 1303,
                'presensi_id' => 84,
                'peserta_id' => 107,
                'sign' => '65541facddc43.png',
                'slug' => 'gJyfASEiv6igKNhp7bhu',
                'created_at' => '2023-11-15 01:24:36',
                'updated_at' => '2023-11-15 01:32:28',
            ),
            227 => 
            array (
                'id' => 1304,
                'presensi_id' => 84,
                'peserta_id' => 109,
                'sign' => '655431430af47.png',
                'slug' => '6rtyxSqc7DX7ZwdHQ2jf',
                'created_at' => '2023-11-15 01:24:40',
                'updated_at' => '2023-11-15 02:47:31',
            ),
            228 => 
            array (
                'id' => 1305,
                'presensi_id' => 84,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => '8lTDWwzND7Us4e4nKO6P',
                'created_at' => '2023-11-15 01:24:45',
                'updated_at' => '2023-11-15 01:24:45',
            ),
            229 => 
            array (
                'id' => 1306,
                'presensi_id' => 84,
                'peserta_id' => 21,
                'sign' => '655433af45e3c.png',
                'slug' => 'DW37C8SaUYQmVPwRa11g',
                'created_at' => '2023-11-15 01:25:13',
                'updated_at' => '2023-11-15 02:57:51',
            ),
            230 => 
            array (
                'id' => 1307,
                'presensi_id' => 84,
                'peserta_id' => 22,
                'sign' => '65545da99c3ed.png',
                'slug' => 'tD7XcE6N30agGptOx0ql',
                'created_at' => '2023-11-15 01:25:19',
                'updated_at' => '2023-11-15 05:56:57',
            ),
            231 => 
            array (
                'id' => 1308,
                'presensi_id' => 84,
                'peserta_id' => 38,
                'sign' => NULL,
                'slug' => 'KdzYKXmCKddF3UjcrfZ3',
                'created_at' => '2023-11-15 01:25:23',
                'updated_at' => '2023-11-15 01:25:23',
            ),
            232 => 
            array (
                'id' => 1309,
                'presensi_id' => 84,
                'peserta_id' => 100,
                'sign' => '65542b242976a.png',
                'slug' => 'GtMKuWsmxcJx0GxaZMHp',
                'created_at' => '2023-11-15 01:25:31',
                'updated_at' => '2023-11-15 02:21:24',
            ),
            233 => 
            array (
                'id' => 1310,
                'presensi_id' => 84,
                'peserta_id' => 105,
                'sign' => '655420732e865.png',
                'slug' => 'dWMMKpONqozJa0U61Sko',
                'created_at' => '2023-11-15 01:25:37',
                'updated_at' => '2023-11-15 01:35:47',
            ),
            234 => 
            array (
                'id' => 1311,
                'presensi_id' => 84,
                'peserta_id' => 40,
                'sign' => '6554322b88395.png',
                'slug' => 'HDxVRJTHYN1RbqTdSlZU',
                'created_at' => '2023-11-15 01:25:41',
                'updated_at' => '2023-11-15 02:51:23',
            ),
            235 => 
            array (
                'id' => 1312,
                'presensi_id' => 84,
                'peserta_id' => 27,
                'sign' => '655423d49d366.png',
                'slug' => '93FzxsPSd1bhp2JleNrg',
                'created_at' => '2023-11-15 01:25:46',
                'updated_at' => '2023-11-15 01:50:12',
            ),
            236 => 
            array (
                'id' => 1313,
                'presensi_id' => 85,
                'peserta_id' => 5,
                'sign' => '655efe25d3d5c.png',
                'slug' => 'W406tTPMJvssIFkOgF1l',
                'created_at' => '2023-11-21 07:16:03',
                'updated_at' => '2023-11-23 07:24:21',
            ),
            237 => 
            array (
                'id' => 1314,
                'presensi_id' => 85,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'BUYwJTeuO8irqWKAXNWC',
                'created_at' => '2023-11-21 07:17:04',
                'updated_at' => '2023-11-21 07:17:04',
            ),
            238 => 
            array (
                'id' => 1315,
                'presensi_id' => 85,
                'peserta_id' => 9,
                'sign' => '655c640ce8511.png',
                'slug' => 'sRIEzuoyI2IV5WSMDfFQ',
                'created_at' => '2023-11-21 07:17:08',
                'updated_at' => '2023-11-21 08:02:20',
            ),
            239 => 
            array (
                'id' => 1316,
                'presensi_id' => 85,
                'peserta_id' => 10,
                'sign' => '655c65966ef19.png',
                'slug' => 'Rz6RYZ6d8TZ0MYnrLOky',
                'created_at' => '2023-11-21 07:17:14',
                'updated_at' => '2023-11-21 08:08:54',
            ),
            240 => 
            array (
                'id' => 1317,
                'presensi_id' => 85,
                'peserta_id' => 85,
                'sign' => '655c63bc3a783.png',
                'slug' => 'I2HOeeSRuVcu05WTlVKY',
                'created_at' => '2023-11-21 07:17:22',
                'updated_at' => '2023-11-21 08:01:00',
            ),
            241 => 
            array (
                'id' => 1318,
                'presensi_id' => 85,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'iDQ58sRqCdLobTdovKjQ',
                'created_at' => '2023-11-21 07:17:42',
                'updated_at' => '2023-11-21 07:17:42',
            ),
            242 => 
            array (
                'id' => 1319,
                'presensi_id' => 85,
                'peserta_id' => 12,
                'sign' => '655c63eb0a5c7.png',
                'slug' => 'NvQRUwXrdQeoghauuLrv',
                'created_at' => '2023-11-21 07:20:53',
                'updated_at' => '2023-11-21 08:01:47',
            ),
            243 => 
            array (
                'id' => 1320,
                'presensi_id' => 85,
                'peserta_id' => 107,
                'sign' => '655c63d2f01f8.png',
                'slug' => 'OtWMlM3R0OJVvuQhsFc8',
                'created_at' => '2023-11-21 07:20:58',
                'updated_at' => '2023-11-21 08:01:22',
            ),
            244 => 
            array (
                'id' => 1321,
                'presensi_id' => 85,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'ruaQPJVNO0F3OP7FUbSE',
                'created_at' => '2023-11-21 07:21:02',
                'updated_at' => '2023-11-21 07:21:02',
            ),
            245 => 
            array (
                'id' => 1322,
                'presensi_id' => 85,
                'peserta_id' => 109,
                'sign' => '655c64ef3527d.png',
                'slug' => 'dSdxwH8CrMFhZu5DrYsH',
                'created_at' => '2023-11-21 07:21:07',
                'updated_at' => '2023-11-21 08:06:07',
            ),
            246 => 
            array (
                'id' => 1323,
                'presensi_id' => 85,
                'peserta_id' => 21,
                'sign' => '655c714800b0e.png',
                'slug' => 'NCY3qoJLU5OxFSOg5eeo',
                'created_at' => '2023-11-21 07:21:12',
                'updated_at' => '2023-11-21 08:58:48',
            ),
            247 => 
            array (
                'id' => 1324,
                'presensi_id' => 85,
                'peserta_id' => 22,
                'sign' => '655c68759e8d9.png',
                'slug' => 'gQ2HEKRxTj8lXVK1qZNf',
                'created_at' => '2023-11-21 07:21:18',
                'updated_at' => '2023-11-21 08:21:09',
            ),
            248 => 
            array (
                'id' => 1325,
                'presensi_id' => 85,
                'peserta_id' => 38,
                'sign' => '655c65ef88ffe.png',
                'slug' => 'zikXjxkKdiqnqGlpMiZX',
                'created_at' => '2023-11-21 07:21:22',
                'updated_at' => '2023-11-21 08:10:23',
            ),
            249 => 
            array (
                'id' => 1326,
                'presensi_id' => 85,
                'peserta_id' => 52,
                'sign' => '655c6723d3366.png',
                'slug' => '2Clnp7rjF9XRXMxlo8mS',
                'created_at' => '2023-11-21 07:21:30',
                'updated_at' => '2023-11-21 08:15:31',
            ),
            250 => 
            array (
                'id' => 1327,
                'presensi_id' => 85,
                'peserta_id' => 152,
                'sign' => '655c906dade8b.png',
                'slug' => 'kdQamYOwjZqNK1srgcYN',
                'created_at' => '2023-11-21 07:21:36',
                'updated_at' => '2023-11-21 11:11:41',
            ),
            251 => 
            array (
                'id' => 1328,
                'presensi_id' => 85,
                'peserta_id' => 102,
                'sign' => '655c68df66fa1.png',
                'slug' => 'm7z3C2zwJjRq2aT7aexi',
                'created_at' => '2023-11-21 07:21:41',
                'updated_at' => '2023-11-21 08:22:55',
            ),
            252 => 
            array (
                'id' => 1331,
                'presensi_id' => 85,
                'peserta_id' => 40,
                'sign' => NULL,
                'slug' => 'pUvIXDV5VXO3LXFz4AOe',
                'created_at' => '2023-11-23 05:09:25',
                'updated_at' => '2023-11-23 05:09:25',
            ),
            253 => 
            array (
                'id' => 1332,
                'presensi_id' => 85,
                'peserta_id' => 103,
                'sign' => NULL,
                'slug' => 'CdYo8qmcJYKluEiDGEwH',
                'created_at' => '2023-11-23 05:09:30',
                'updated_at' => '2023-11-23 05:09:30',
            ),
            254 => 
            array (
                'id' => 1333,
                'presensi_id' => 85,
                'peserta_id' => 39,
                'sign' => NULL,
                'slug' => 'cSvGS5JjRDinbNM5tNQY',
                'created_at' => '2023-11-23 05:09:35',
                'updated_at' => '2023-11-23 05:09:35',
            ),
            255 => 
            array (
                'id' => 1334,
                'presensi_id' => 86,
                'peserta_id' => 5,
                'sign' => '655efe0a62556.png',
                'slug' => 'go0WUgR0hzihxLiUZYEY',
                'created_at' => '2023-11-23 05:26:59',
                'updated_at' => '2023-11-23 07:23:54',
            ),
            256 => 
            array (
                'id' => 1335,
                'presensi_id' => 86,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'tq3RHKCq2YEv29kyNOCZ',
                'created_at' => '2023-11-23 05:27:10',
                'updated_at' => '2023-11-23 05:27:10',
            ),
            257 => 
            array (
                'id' => 1336,
                'presensi_id' => 86,
                'peserta_id' => 9,
                'sign' => '655ef45ba7091.png',
                'slug' => 'tCcTOza8C9ScgdbBiZFw',
                'created_at' => '2023-11-23 05:28:01',
                'updated_at' => '2023-11-23 06:42:35',
            ),
            258 => 
            array (
                'id' => 1337,
                'presensi_id' => 86,
                'peserta_id' => 10,
                'sign' => '655ef3fd26b72.png',
                'slug' => 'kXTQJ6DV86MoA4Q2RXeC',
                'created_at' => '2023-11-23 05:28:14',
                'updated_at' => '2023-11-23 06:41:01',
            ),
            259 => 
            array (
                'id' => 1338,
                'presensi_id' => 86,
                'peserta_id' => 85,
                'sign' => '655ef924c06c5.png',
                'slug' => 'PZBLPF8ce6Lx8MnczzBn',
                'created_at' => '2023-11-23 05:28:19',
                'updated_at' => '2023-11-23 07:03:00',
            ),
            260 => 
            array (
                'id' => 1339,
                'presensi_id' => 86,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'heUSKUEQkucIirg4TzYi',
                'created_at' => '2023-11-23 05:28:24',
                'updated_at' => '2023-11-23 05:28:24',
            ),
            261 => 
            array (
                'id' => 1340,
                'presensi_id' => 86,
                'peserta_id' => 12,
                'sign' => '655ef60cb76be.png',
                'slug' => 'hWmPYYk9UI3kLrpzdzvS',
                'created_at' => '2023-11-23 05:28:29',
                'updated_at' => '2023-11-23 06:49:48',
            ),
            262 => 
            array (
                'id' => 1341,
                'presensi_id' => 86,
                'peserta_id' => 107,
                'sign' => '655ef496e8c2c.png',
                'slug' => 'aWcw6Cx5fmWOCKAeCsVi',
                'created_at' => '2023-11-23 05:28:33',
                'updated_at' => '2023-11-23 06:43:34',
            ),
            263 => 
            array (
                'id' => 1342,
                'presensi_id' => 86,
                'peserta_id' => 109,
                'sign' => '655efac31eba6.png',
                'slug' => 'Df0K3t4ngcJNzfBPHDwe',
                'created_at' => '2023-11-23 05:28:39',
                'updated_at' => '2023-11-23 07:09:55',
            ),
            264 => 
            array (
                'id' => 1343,
                'presensi_id' => 86,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'P8MNhPtgIEFZIuN438JP',
                'created_at' => '2023-11-23 05:28:44',
                'updated_at' => '2023-11-23 05:28:44',
            ),
            265 => 
            array (
                'id' => 1344,
                'presensi_id' => 86,
                'peserta_id' => 21,
                'sign' => '655ef445ea9c6.png',
                'slug' => 'FwED3Orfq0fYsgWB6y5D',
                'created_at' => '2023-11-23 05:28:50',
                'updated_at' => '2023-11-23 06:42:13',
            ),
            266 => 
            array (
                'id' => 1345,
                'presensi_id' => 86,
                'peserta_id' => 22,
                'sign' => '655ef59de9d3b.png',
                'slug' => 'pohp5ecNFywJC2vM9UUR',
                'created_at' => '2023-11-23 05:28:55',
                'updated_at' => '2023-11-23 06:47:57',
            ),
            267 => 
            array (
                'id' => 1347,
                'presensi_id' => 86,
                'peserta_id' => 38,
                'sign' => '655f1c4cb0839.png',
                'slug' => 'Vnl2RNl8kmNBvl0E6XdP',
                'created_at' => '2023-11-23 05:29:44',
                'updated_at' => '2023-11-23 09:33:00',
            ),
            268 => 
            array (
                'id' => 1348,
                'presensi_id' => 86,
                'peserta_id' => 102,
                'sign' => '655ef63036a12.png',
                'slug' => 'BvKVAQwK0Ppc8QiEJ1PF',
                'created_at' => '2023-11-23 05:30:20',
                'updated_at' => '2023-11-23 06:50:24',
            ),
            269 => 
            array (
                'id' => 1349,
                'presensi_id' => 86,
                'peserta_id' => 152,
                'sign' => '655ef55b4761f.png',
                'slug' => 'mLenGRmp4p5q27u8fqyG',
                'created_at' => '2023-11-23 05:30:25',
                'updated_at' => '2023-11-23 06:46:51',
            ),
            270 => 
            array (
                'id' => 1350,
                'presensi_id' => 86,
                'peserta_id' => 57,
                'sign' => '655ef472b6373.png',
                'slug' => 'UsybPbqk1m0abtIHOGKr',
                'created_at' => '2023-11-23 05:30:42',
                'updated_at' => '2023-11-23 06:42:58',
            ),
            271 => 
            array (
                'id' => 1351,
                'presensi_id' => 86,
                'peserta_id' => 119,
                'sign' => '655ef941773a9.png',
                'slug' => 'rvgk3Pj7Eh7pMI8P8Ceo',
                'created_at' => '2023-11-23 05:30:54',
                'updated_at' => '2023-11-23 07:03:29',
            ),
            272 => 
            array (
                'id' => 1352,
                'presensi_id' => 86,
                'peserta_id' => 18,
                'sign' => '655ef4e6a20fe.png',
                'slug' => 'N0zLXdYngCdcPWU7UOvg',
                'created_at' => '2023-11-23 05:32:29',
                'updated_at' => '2023-11-23 06:44:54',
            ),
            273 => 
            array (
                'id' => 1353,
                'presensi_id' => 86,
                'peserta_id' => 163,
                'sign' => NULL,
                'slug' => 'rEuFziZwInj9HX7kibik',
                'created_at' => '2023-11-23 05:32:36',
                'updated_at' => '2023-11-23 05:32:36',
            ),
            274 => 
            array (
                'id' => 1354,
                'presensi_id' => 86,
                'peserta_id' => 1,
                'sign' => NULL,
                'slug' => 'JyFLuVbWyVe4Ti9nTAEi',
                'created_at' => '2023-11-23 05:32:42',
                'updated_at' => '2023-11-23 05:32:42',
            ),
            275 => 
            array (
                'id' => 1355,
                'presensi_id' => 86,
                'peserta_id' => 26,
                'sign' => NULL,
                'slug' => 'SA19b7hxSnmHP4U3rP5S',
                'created_at' => '2023-11-23 05:32:46',
                'updated_at' => '2023-11-23 05:32:46',
            ),
            276 => 
            array (
                'id' => 1356,
                'presensi_id' => 86,
                'peserta_id' => 80,
                'sign' => NULL,
                'slug' => 'YIvJzcdZStj6tjWIlL5r',
                'created_at' => '2023-11-23 05:32:53',
                'updated_at' => '2023-11-23 05:32:53',
            ),
            277 => 
            array (
                'id' => 1357,
                'presensi_id' => 86,
                'peserta_id' => 75,
                'sign' => NULL,
                'slug' => 'jW3X8e3xZ6hiruXa6dtN',
                'created_at' => '2023-11-23 05:33:03',
                'updated_at' => '2023-11-23 05:33:03',
            ),
            278 => 
            array (
                'id' => 1358,
                'presensi_id' => 86,
                'peserta_id' => 52,
                'sign' => '655ef86a0057d.png',
                'slug' => 'xRr8tbgli8PM0n4ZEZEg',
                'created_at' => '2023-11-23 06:42:59',
                'updated_at' => '2023-11-23 06:59:54',
            ),
            279 => 
            array (
                'id' => 1359,
                'presensi_id' => 86,
                'peserta_id' => 13,
                'sign' => NULL,
                'slug' => '05eW3BRvOPbFVcJC0xFC',
                'created_at' => '2023-11-23 07:29:48',
                'updated_at' => '2023-11-23 07:29:48',
            ),
            280 => 
            array (
                'id' => 1367,
                'presensi_id' => 88,
                'peserta_id' => 5,
                'sign' => '6564390e384f3.png',
                'slug' => 'aXTBr62xL5860x67HgdJ',
                'created_at' => '2023-11-27 06:26:24',
                'updated_at' => '2023-11-27 06:37:02',
            ),
            281 => 
            array (
                'id' => 1368,
                'presensi_id' => 88,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'TC32ImxtKjtkpU97I5y1',
                'created_at' => '2023-11-27 06:26:42',
                'updated_at' => '2023-11-27 06:26:42',
            ),
            282 => 
            array (
                'id' => 1369,
                'presensi_id' => 88,
                'peserta_id' => 9,
                'sign' => '65643f6a21402.png',
                'slug' => 'g4ByyHHDvTzaqmyJ0m49',
                'created_at' => '2023-11-27 06:26:46',
                'updated_at' => '2023-11-27 07:04:10',
            ),
            283 => 
            array (
                'id' => 1370,
                'presensi_id' => 88,
                'peserta_id' => 10,
                'sign' => '656437da4099d.png',
                'slug' => '2BVsm1gTqgHVw4Ml4FS8',
                'created_at' => '2023-11-27 06:26:51',
                'updated_at' => '2023-11-27 06:31:54',
            ),
            284 => 
            array (
                'id' => 1371,
                'presensi_id' => 88,
                'peserta_id' => 85,
                'sign' => '65643fa120a0a.png',
                'slug' => 'SPGEmh1UGil5BiKvMYv7',
                'created_at' => '2023-11-27 06:26:55',
                'updated_at' => '2023-11-27 07:05:05',
            ),
            285 => 
            array (
                'id' => 1372,
                'presensi_id' => 88,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'w1eGQQmxiAdryvGAri8o',
                'created_at' => '2023-11-27 06:26:59',
                'updated_at' => '2023-11-27 06:26:59',
            ),
            286 => 
            array (
                'id' => 1373,
                'presensi_id' => 88,
                'peserta_id' => 12,
                'sign' => '656438e7f3f9a.png',
                'slug' => '4SmJtli5reUpziE89pDx',
                'created_at' => '2023-11-27 06:27:03',
                'updated_at' => '2023-11-27 06:36:24',
            ),
            287 => 
            array (
                'id' => 1374,
                'presensi_id' => 88,
                'peserta_id' => 107,
                'sign' => '656438e41ee04.png',
                'slug' => 'GlBblnkfevsfrQ7mmRIr',
                'created_at' => '2023-11-27 06:27:07',
                'updated_at' => '2023-11-27 06:36:20',
            ),
            288 => 
            array (
                'id' => 1375,
                'presensi_id' => 88,
                'peserta_id' => 109,
                'sign' => '6564441139d45.png',
                'slug' => 's5Wpyqu7W2wISNFUi594',
                'created_at' => '2023-11-27 06:27:12',
                'updated_at' => '2023-11-27 07:24:01',
            ),
            289 => 
            array (
                'id' => 1376,
                'presensi_id' => 88,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'iXgY8EXGfbhHckdpTZ3Z',
                'created_at' => '2023-11-27 06:27:16',
                'updated_at' => '2023-11-27 06:27:16',
            ),
            290 => 
            array (
                'id' => 1377,
                'presensi_id' => 88,
                'peserta_id' => 21,
                'sign' => '6564386bcbea4.png',
                'slug' => 'D46zHWWV7AcWTyBeCQ76',
                'created_at' => '2023-11-27 06:27:37',
                'updated_at' => '2023-11-27 06:34:19',
            ),
            291 => 
            array (
                'id' => 1378,
                'presensi_id' => 88,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '5RAZ2RyaMixlzmtRaJot',
                'created_at' => '2023-11-27 06:27:41',
                'updated_at' => '2023-11-27 06:27:41',
            ),
            292 => 
            array (
                'id' => 1379,
                'presensi_id' => 88,
                'peserta_id' => 38,
                'sign' => '65767817ca268.png',
                'slug' => 'hlea9cwGzyss4VVqKq6c',
                'created_at' => '2023-11-27 06:27:45',
                'updated_at' => '2023-12-11 02:46:47',
            ),
            293 => 
            array (
                'id' => 1380,
                'presensi_id' => 88,
                'peserta_id' => 100,
                'sign' => '656438daa7f69.png',
                'slug' => 'ljrWJShslu3uzVwMjBOu',
                'created_at' => '2023-11-27 06:27:58',
                'updated_at' => '2023-11-27 06:36:10',
            ),
            294 => 
            array (
                'id' => 1381,
                'presensi_id' => 88,
                'peserta_id' => 105,
                'sign' => '65644644ba538.png',
                'slug' => 'wnvWyFvJDV8JqY5JqHpx',
                'created_at' => '2023-11-27 06:28:04',
                'updated_at' => '2023-11-27 07:33:24',
            ),
            295 => 
            array (
                'id' => 1382,
                'presensi_id' => 88,
                'peserta_id' => 18,
                'sign' => '656443d03253a.png',
                'slug' => 'ubw6wUa8AF1Icq16gpzx',
                'created_at' => '2023-11-27 06:28:15',
                'updated_at' => '2023-11-27 07:22:56',
            ),
            296 => 
            array (
                'id' => 1383,
                'presensi_id' => 88,
                'peserta_id' => 19,
                'sign' => '6564434073e34.png',
                'slug' => 'kC4buPE3pZzYcdTR29uI',
                'created_at' => '2023-11-27 06:28:24',
                'updated_at' => '2023-11-27 07:20:32',
            ),
            297 => 
            array (
                'id' => 1384,
                'presensi_id' => 89,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'bJzJo9dvoh6w3JKEIaf6',
                'created_at' => '2023-11-30 05:46:41',
                'updated_at' => '2023-11-30 05:46:41',
            ),
            298 => 
            array (
                'id' => 1385,
                'presensi_id' => 89,
                'peserta_id' => 26,
                'sign' => NULL,
                'slug' => '5Fv6A0DgRvFLvLl4Adfo',
                'created_at' => '2023-11-30 05:46:57',
                'updated_at' => '2023-11-30 05:46:57',
            ),
            299 => 
            array (
                'id' => 1386,
                'presensi_id' => 89,
                'peserta_id' => 31,
                'sign' => NULL,
                'slug' => 'bqi5KQNUrY8TDcz2H10E',
                'created_at' => '2023-11-30 05:47:06',
                'updated_at' => '2023-11-30 05:47:06',
            ),
            300 => 
            array (
                'id' => 1387,
                'presensi_id' => 89,
                'peserta_id' => 110,
                'sign' => '6568226e72234.png',
                'slug' => 'lAc6V36kjexfN6coEjtT',
                'created_at' => '2023-11-30 05:47:11',
                'updated_at' => '2023-11-30 05:49:34',
            ),
            301 => 
            array (
                'id' => 1388,
                'presensi_id' => 89,
                'peserta_id' => 97,
                'sign' => '656823eacc718.png',
                'slug' => 'WuXlB6j5xottzkEdOxUh',
                'created_at' => '2023-11-30 05:47:17',
                'updated_at' => '2023-11-30 05:55:54',
            ),
            302 => 
            array (
                'id' => 1389,
                'presensi_id' => 89,
                'peserta_id' => 103,
                'sign' => '65682281563f7.png',
                'slug' => 'IS5yeI3NdsHSfaIbvv5C',
                'created_at' => '2023-11-30 05:47:23',
                'updated_at' => '2023-11-30 05:49:53',
            ),
            303 => 
            array (
                'id' => 1390,
                'presensi_id' => 89,
                'peserta_id' => 23,
                'sign' => NULL,
                'slug' => 'I1gZ11DMfLup1wWI2zEk',
                'created_at' => '2023-11-30 05:50:06',
                'updated_at' => '2023-11-30 05:50:06',
            ),
            304 => 
            array (
                'id' => 1391,
                'presensi_id' => 89,
                'peserta_id' => 28,
                'sign' => '6568237fdea58.png',
                'slug' => 'uPKpq8ov5rsMJIUyHVSE',
                'created_at' => '2023-11-30 05:50:12',
                'updated_at' => '2023-11-30 05:54:07',
            ),
            305 => 
            array (
                'id' => 1392,
                'presensi_id' => 89,
                'peserta_id' => 28,
                'sign' => NULL,
                'slug' => 'khe8C45tswRqOvDrbjWU',
                'created_at' => '2023-11-30 05:54:34',
                'updated_at' => '2023-11-30 05:54:34',
            ),
            306 => 
            array (
                'id' => 1393,
                'presensi_id' => 89,
                'peserta_id' => 30,
                'sign' => NULL,
                'slug' => 'ek4xIP7nludKPNbKko0h',
                'created_at' => '2023-11-30 07:14:07',
                'updated_at' => '2023-11-30 07:14:07',
            ),
            307 => 
            array (
                'id' => 1394,
                'presensi_id' => 90,
                'peserta_id' => 5,
                'sign' => '656edac0a227b.png',
                'slug' => 'mzzeNOIA46sfIlfOvL45',
                'created_at' => '2023-12-05 03:42:49',
                'updated_at' => '2023-12-05 08:09:36',
            ),
            308 => 
            array (
                'id' => 1395,
                'presensi_id' => 90,
                'peserta_id' => 9,
                'sign' => '656ec1d44d33c.png',
                'slug' => 'nQUFnoSRD6vPr5foESMN',
                'created_at' => '2023-12-05 03:42:59',
                'updated_at' => '2023-12-05 06:23:16',
            ),
            309 => 
            array (
                'id' => 1396,
                'presensi_id' => 90,
                'peserta_id' => 10,
                'sign' => '656ebf71e8f4f.png',
                'slug' => 'bfczh3FEyZuzLR1sCJXb',
                'created_at' => '2023-12-05 03:43:25',
                'updated_at' => '2023-12-05 06:13:05',
            ),
            310 => 
            array (
                'id' => 1397,
                'presensi_id' => 90,
                'peserta_id' => 85,
                'sign' => '656ed68641b83.png',
                'slug' => 'tmxcL79sP0pRGGYcOBbz',
                'created_at' => '2023-12-05 03:43:29',
                'updated_at' => '2023-12-05 07:51:34',
            ),
            311 => 
            array (
                'id' => 1398,
                'presensi_id' => 90,
                'peserta_id' => 12,
                'sign' => '656ebfd9e321b.png',
                'slug' => 'ukl8Icy5wn75S3bikwAI',
                'created_at' => '2023-12-05 03:43:39',
                'updated_at' => '2023-12-05 06:14:49',
            ),
            312 => 
            array (
                'id' => 1399,
                'presensi_id' => 90,
                'peserta_id' => 107,
                'sign' => '656ebfd0bedee.png',
                'slug' => 'vCFRDgaA4qSZ4V9vFeUm',
                'created_at' => '2023-12-05 03:43:43',
                'updated_at' => '2023-12-05 06:14:40',
            ),
            313 => 
            array (
                'id' => 1400,
                'presensi_id' => 90,
                'peserta_id' => 109,
                'sign' => '656ed09033160.png',
                'slug' => 'gk3bhyhNHlgI35Vnme9v',
                'created_at' => '2023-12-05 03:43:50',
                'updated_at' => '2023-12-05 07:26:08',
            ),
            314 => 
            array (
                'id' => 1401,
                'presensi_id' => 90,
                'peserta_id' => 21,
                'sign' => '656ec01de8bf7.png',
                'slug' => 'AOvPsbOMvkHYbt29TGmQ',
                'created_at' => '2023-12-05 03:43:55',
                'updated_at' => '2023-12-05 06:15:57',
            ),
            315 => 
            array (
                'id' => 1402,
                'presensi_id' => 90,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'Lna1vxkcDAIg09tc2VlT',
                'created_at' => '2023-12-05 03:43:59',
                'updated_at' => '2023-12-05 03:43:59',
            ),
            316 => 
            array (
                'id' => 1403,
                'presensi_id' => 90,
                'peserta_id' => 38,
                'sign' => '656ed244198dc.png',
                'slug' => 'v8aSXFKzOKCfaBppJXQx',
                'created_at' => '2023-12-05 03:44:07',
                'updated_at' => '2023-12-05 07:33:24',
            ),
            317 => 
            array (
                'id' => 1404,
                'presensi_id' => 90,
                'peserta_id' => 111,
                'sign' => '656ebfa4628cf.png',
                'slug' => '81D3eKKzspj6nCJnwKi7',
                'created_at' => '2023-12-05 03:44:18',
                'updated_at' => '2023-12-05 06:13:56',
            ),
            318 => 
            array (
                'id' => 1405,
                'presensi_id' => 90,
                'peserta_id' => 151,
                'sign' => '656ec99c74182.png',
                'slug' => 'Y7bl0fs10vCBvtl8K9Jx',
                'created_at' => '2023-12-05 03:44:23',
                'updated_at' => '2023-12-05 06:56:28',
            ),
            319 => 
            array (
                'id' => 1406,
                'presensi_id' => 90,
                'peserta_id' => 86,
                'sign' => '656ed43dced86.png',
                'slug' => 'GdpQdtfDqnFbyjVVpPHD',
                'created_at' => '2023-12-05 03:44:54',
                'updated_at' => '2023-12-05 07:41:49',
            ),
            320 => 
            array (
                'id' => 1407,
                'presensi_id' => 90,
                'peserta_id' => 89,
                'sign' => '656ec1902d2f8.png',
                'slug' => 'otcAHzM5OhFr9UNRVx2N',
                'created_at' => '2023-12-05 03:44:59',
                'updated_at' => '2023-12-05 06:22:08',
            ),
            321 => 
            array (
                'id' => 1408,
                'presensi_id' => 90,
                'peserta_id' => 26,
                'sign' => '656ec14bee2e0.png',
                'slug' => 'sAvPppr2oLVLaPOOOiRu',
                'created_at' => '2023-12-05 03:45:04',
                'updated_at' => '2023-12-05 06:20:59',
            ),
            322 => 
            array (
                'id' => 1409,
                'presensi_id' => 90,
                'peserta_id' => 113,
                'sign' => '656eee991389d.png',
                'slug' => '2kPo625tjkz3inKCM0zK',
                'created_at' => '2023-12-05 03:45:09',
                'updated_at' => '2023-12-05 09:34:17',
            ),
            323 => 
            array (
                'id' => 1410,
                'presensi_id' => 90,
                'peserta_id' => 98,
                'sign' => '656eda7124674.png',
                'slug' => 'ARAf8AZdU9YqkpJtmKzv',
                'created_at' => '2023-12-05 03:45:13',
                'updated_at' => '2023-12-05 08:08:17',
            ),
            324 => 
            array (
                'id' => 1411,
                'presensi_id' => 90,
                'peserta_id' => 92,
                'sign' => '656eda9503da2.png',
                'slug' => 'JFPFv85oWj8s5eYUIfZF',
                'created_at' => '2023-12-05 03:45:23',
                'updated_at' => '2023-12-05 08:08:53',
            ),
            325 => 
            array (
                'id' => 1412,
                'presensi_id' => 90,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'b16uIOhSbopt3HT9d3cv',
                'created_at' => '2023-12-05 03:45:28',
                'updated_at' => '2023-12-05 03:45:28',
            ),
            326 => 
            array (
                'id' => 1413,
                'presensi_id' => 90,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'HJVKTTIjQATkDTXYKBWT',
                'created_at' => '2023-12-05 04:02:20',
                'updated_at' => '2023-12-05 04:02:20',
            ),
            327 => 
            array (
                'id' => 1414,
                'presensi_id' => 90,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'Hqj6rTGPSDrSkWMYuDcL',
                'created_at' => '2023-12-05 04:02:25',
                'updated_at' => '2023-12-05 04:02:25',
            ),
            328 => 
            array (
                'id' => 1415,
                'presensi_id' => 90,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'VeQr8hPLdPrE3jRg9jwf',
                'created_at' => '2023-12-05 08:04:08',
                'updated_at' => '2023-12-05 08:04:08',
            ),
            329 => 
            array (
                'id' => 1416,
                'presensi_id' => 90,
                'peserta_id' => 48,
                'sign' => '656ed9afae608.png',
                'slug' => 'mGPCsiNoUUErb9PkpJyA',
                'created_at' => '2023-12-05 08:04:29',
                'updated_at' => '2023-12-05 08:05:03',
            ),
            330 => 
            array (
                'id' => 1417,
                'presensi_id' => 91,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'vw0h33GmpPpWmikiqXib',
                'created_at' => '2023-12-08 05:53:28',
                'updated_at' => '2023-12-08 05:53:28',
            ),
            331 => 
            array (
                'id' => 1418,
                'presensi_id' => 91,
                'peserta_id' => 9,
                'sign' => '6572b8832abe6.png',
                'slug' => 'BkEpSTL1Iqu6fqrcVlL1',
                'created_at' => '2023-12-08 05:53:36',
                'updated_at' => '2023-12-08 06:32:35',
            ),
            332 => 
            array (
                'id' => 1419,
                'presensi_id' => 91,
                'peserta_id' => 10,
                'sign' => '6572c171db8fc.png',
                'slug' => '3xwfh0Ol4v1h4bZicm7i',
                'created_at' => '2023-12-08 05:55:20',
                'updated_at' => '2023-12-08 07:10:41',
            ),
            333 => 
            array (
                'id' => 1420,
                'presensi_id' => 91,
                'peserta_id' => 85,
                'sign' => '6572b6699bbaf.png',
                'slug' => 'cz8s5fHX24aZSTFRoK4M',
                'created_at' => '2023-12-08 05:55:24',
                'updated_at' => '2023-12-08 06:23:37',
            ),
            334 => 
            array (
                'id' => 1421,
                'presensi_id' => 91,
                'peserta_id' => 12,
                'sign' => '6572b66b2b1db.png',
                'slug' => '8maoYwz9o230ZcZ0iXjL',
                'created_at' => '2023-12-08 05:55:28',
                'updated_at' => '2023-12-08 06:23:39',
            ),
            335 => 
            array (
                'id' => 1423,
                'presensi_id' => 91,
                'peserta_id' => 107,
                'sign' => '6572b6afc2905.png',
                'slug' => 'BEAEQAIN9nRP8xRTylC7',
                'created_at' => '2023-12-08 05:55:38',
                'updated_at' => '2023-12-08 06:24:47',
            ),
            336 => 
            array (
                'id' => 1424,
                'presensi_id' => 91,
                'peserta_id' => 109,
                'sign' => '6572c91a30e73.png',
                'slug' => 'gunX8gDPJ5LDLGvBC9rI',
                'created_at' => '2023-12-08 05:55:43',
                'updated_at' => '2023-12-08 07:43:22',
            ),
            337 => 
            array (
                'id' => 1425,
                'presensi_id' => 91,
                'peserta_id' => 21,
                'sign' => '6572d1c0391ad.png',
                'slug' => 'nXRHhnIWoIPt8BxtYESn',
                'created_at' => '2023-12-08 05:55:52',
                'updated_at' => '2023-12-08 08:20:16',
            ),
            338 => 
            array (
                'id' => 1426,
                'presensi_id' => 91,
                'peserta_id' => 38,
                'sign' => NULL,
                'slug' => '10N55HTO7SsGHqRLBIKX',
                'created_at' => '2023-12-08 05:55:57',
                'updated_at' => '2023-12-08 05:55:57',
            ),
            339 => 
            array (
                'id' => 1427,
                'presensi_id' => 91,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'Tj18kXFXcumMeCAWFoPg',
                'created_at' => '2023-12-08 05:56:01',
                'updated_at' => '2023-12-08 05:56:01',
            ),
            340 => 
            array (
                'id' => 1428,
                'presensi_id' => 91,
                'peserta_id' => 105,
                'sign' => '6572d36745641.png',
                'slug' => 'LVTLhaexrtemInlpXm20',
                'created_at' => '2023-12-08 05:56:09',
                'updated_at' => '2023-12-08 08:27:19',
            ),
            341 => 
            array (
                'id' => 1429,
                'presensi_id' => 91,
                'peserta_id' => 100,
                'sign' => NULL,
                'slug' => 'Gb1MYEiFkEIpnmTWvKjh',
                'created_at' => '2023-12-08 05:56:14',
                'updated_at' => '2023-12-08 05:56:14',
            ),
            342 => 
            array (
                'id' => 1430,
                'presensi_id' => 91,
                'peserta_id' => 40,
                'sign' => '6572b6f88b7e9.png',
                'slug' => '7X4QqwJyn3cn9uvfjgUI',
                'created_at' => '2023-12-08 05:56:21',
                'updated_at' => '2023-12-08 06:26:00',
            ),
            343 => 
            array (
                'id' => 1431,
                'presensi_id' => 91,
                'peserta_id' => 27,
                'sign' => NULL,
                'slug' => 'Ls9SQtCBxQJdjuwNmmr4',
                'created_at' => '2023-12-08 05:56:26',
                'updated_at' => '2023-12-08 05:56:26',
            ),
            344 => 
            array (
                'id' => 1432,
                'presensi_id' => 91,
                'peserta_id' => 26,
                'sign' => '6572c1f2bd3e3.png',
                'slug' => 'wBcQ5MbFjdVfzWgYjSB1',
                'created_at' => '2023-12-08 06:19:54',
                'updated_at' => '2023-12-08 07:12:50',
            ),
            345 => 
            array (
                'id' => 1433,
                'presensi_id' => 92,
                'peserta_id' => 5,
                'sign' => '65792a79f41ee.png',
                'slug' => '1hc5SQodmlemvWQN3z7P',
                'created_at' => '2023-12-13 00:50:04',
                'updated_at' => '2023-12-13 03:52:26',
            ),
            346 => 
            array (
                'id' => 1434,
                'presensi_id' => 92,
                'peserta_id' => 9,
                'sign' => '6579209d83725.png',
                'slug' => 'NZ2crpbeN4zVz8kjfNtN',
                'created_at' => '2023-12-13 00:50:15',
                'updated_at' => '2023-12-13 03:10:21',
            ),
            347 => 
            array (
                'id' => 1435,
                'presensi_id' => 92,
                'peserta_id' => 10,
                'sign' => '657923bf1d5bf.png',
                'slug' => 'j2OtVFWW3gSwh7mQZZmS',
                'created_at' => '2023-12-13 00:50:20',
                'updated_at' => '2023-12-13 03:23:43',
            ),
            348 => 
            array (
                'id' => 1436,
                'presensi_id' => 92,
                'peserta_id' => 85,
                'sign' => '65792f1e95ecc.png',
                'slug' => 'pCyBcNQeFNQk7ocqugpu',
                'created_at' => '2023-12-13 00:50:24',
                'updated_at' => '2023-12-13 04:12:14',
            ),
            349 => 
            array (
                'id' => 1437,
                'presensi_id' => 92,
                'peserta_id' => 12,
                'sign' => '65792130f0134.png',
                'slug' => '7qmgcjABAjUuePfD1Qka',
                'created_at' => '2023-12-13 00:50:30',
                'updated_at' => '2023-12-13 03:12:48',
            ),
            350 => 
            array (
                'id' => 1438,
                'presensi_id' => 92,
                'peserta_id' => 107,
                'sign' => '657920d7774de.png',
                'slug' => 'xHpYfUyOKQRDqsyx7ZaN',
                'created_at' => '2023-12-13 00:50:34',
                'updated_at' => '2023-12-13 03:11:19',
            ),
            351 => 
            array (
                'id' => 1439,
                'presensi_id' => 92,
                'peserta_id' => 109,
                'sign' => '657922252a3ff.png',
                'slug' => 'd0PrxZEYxz5mpZlEcsZ7',
                'created_at' => '2023-12-13 00:50:45',
                'updated_at' => '2023-12-13 03:16:53',
            ),
            352 => 
            array (
                'id' => 1440,
                'presensi_id' => 92,
                'peserta_id' => 21,
                'sign' => '65792159d103a.png',
                'slug' => '8ZNfP7Nw8RhTpI5NbY2j',
                'created_at' => '2023-12-13 00:50:52',
                'updated_at' => '2023-12-13 03:13:29',
            ),
            353 => 
            array (
                'id' => 1441,
                'presensi_id' => 92,
                'peserta_id' => 22,
                'sign' => '65792178164dd.png',
                'slug' => 'hdvm5LbH6JXhUPAfZUou',
                'created_at' => '2023-12-13 00:50:57',
                'updated_at' => '2023-12-13 03:14:00',
            ),
            354 => 
            array (
                'id' => 1442,
                'presensi_id' => 92,
                'peserta_id' => 38,
                'sign' => '6579260c38481.png',
                'slug' => '6jnw1wcXqFHaJaQz1xNZ',
                'created_at' => '2023-12-13 00:51:02',
                'updated_at' => '2023-12-13 03:33:32',
            ),
            355 => 
            array (
                'id' => 1443,
                'presensi_id' => 92,
                'peserta_id' => 98,
                'sign' => '65792117f0bec.png',
                'slug' => 'vBJvCP2bioTh5OTWYILZ',
                'created_at' => '2023-12-13 00:51:07',
                'updated_at' => '2023-12-13 03:12:23',
            ),
            356 => 
            array (
                'id' => 1444,
                'presensi_id' => 92,
                'peserta_id' => 113,
                'sign' => NULL,
                'slug' => '4AgSibVqUUFKFJEkwKS5',
                'created_at' => '2023-12-13 00:51:12',
                'updated_at' => '2023-12-13 00:51:12',
            ),
            357 => 
            array (
                'id' => 1445,
                'presensi_id' => 92,
                'peserta_id' => 151,
                'sign' => '65792206ddd2d.png',
                'slug' => 'aPL5L33wzIYSEDd6bA6o',
                'created_at' => '2023-12-13 00:52:00',
                'updated_at' => '2023-12-13 03:16:22',
            ),
            358 => 
            array (
                'id' => 1446,
                'presensi_id' => 92,
                'peserta_id' => 111,
                'sign' => '6579217ca63dc.png',
                'slug' => 'qh2EuaivNjSeut89R0E2',
                'created_at' => '2023-12-13 00:52:07',
                'updated_at' => '2023-12-13 03:14:04',
            ),
            359 => 
            array (
                'id' => 1447,
                'presensi_id' => 92,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => '1OFsK5zsqyA4vy87b6SH',
                'created_at' => '2023-12-13 01:06:05',
                'updated_at' => '2023-12-13 01:06:05',
            ),
            360 => 
            array (
                'id' => 1448,
                'presensi_id' => 92,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'kXTKHjjzKpuhzbBJp23S',
                'created_at' => '2023-12-13 01:06:09',
                'updated_at' => '2023-12-13 01:06:09',
            ),
            361 => 
            array (
                'id' => 1449,
                'presensi_id' => 92,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'x6s2demqHSTysX9aiY7v',
                'created_at' => '2023-12-13 01:06:14',
                'updated_at' => '2023-12-13 01:06:14',
            ),
            362 => 
            array (
                'id' => 1450,
                'presensi_id' => 93,
                'peserta_id' => 5,
                'sign' => '658277e9b0ce8.png',
                'slug' => 'egK7GhFbSP8BEWAlC0xA',
                'created_at' => '2023-12-20 01:50:19',
                'updated_at' => '2023-12-20 05:13:13',
            ),
            363 => 
            array (
                'id' => 1451,
                'presensi_id' => 93,
                'peserta_id' => 6,
                'sign' => '65829f98b8d4a.png',
                'slug' => 'mdiuZ5J420XgdXqjCarA',
                'created_at' => '2023-12-20 01:51:17',
                'updated_at' => '2023-12-20 08:02:32',
            ),
            364 => 
            array (
                'id' => 1452,
                'presensi_id' => 93,
                'peserta_id' => 9,
                'sign' => '65825cec32229.png',
                'slug' => 'm8Bn3yaJ7SfevCw2fnnO',
                'created_at' => '2023-12-20 01:51:21',
                'updated_at' => '2023-12-20 03:18:04',
            ),
            365 => 
            array (
                'id' => 1453,
                'presensi_id' => 93,
                'peserta_id' => 10,
                'sign' => '658256fe4089a.png',
                'slug' => 'vTq7IUoqfBSkKDZaPLPF',
                'created_at' => '2023-12-20 01:51:27',
                'updated_at' => '2023-12-20 02:52:46',
            ),
            366 => 
            array (
                'id' => 1454,
                'presensi_id' => 93,
                'peserta_id' => 85,
                'sign' => '65825ea9f2ef8.png',
                'slug' => 'mSDThGe51ejGwfzwHvg1',
                'created_at' => '2023-12-20 01:51:32',
                'updated_at' => '2023-12-20 03:25:29',
            ),
            367 => 
            array (
                'id' => 1455,
                'presensi_id' => 93,
                'peserta_id' => 12,
                'sign' => '65825e08810ad.png',
                'slug' => 'ywjNcXbrGOkMjJD8Z3er',
                'created_at' => '2023-12-20 01:51:51',
                'updated_at' => '2023-12-20 03:22:48',
            ),
            368 => 
            array (
                'id' => 1456,
                'presensi_id' => 93,
                'peserta_id' => 107,
                'sign' => '65825c8e06eae.png',
                'slug' => 'uLEqu5wpNJBc7X5PDM3Q',
                'created_at' => '2023-12-20 01:51:56',
                'updated_at' => '2023-12-20 03:16:30',
            ),
            369 => 
            array (
                'id' => 1457,
                'presensi_id' => 93,
                'peserta_id' => 108,
                'sign' => '65829fb265e59.png',
                'slug' => 'Ght7hLMU958lZArMH4hn',
                'created_at' => '2023-12-20 01:52:01',
                'updated_at' => '2023-12-20 08:02:58',
            ),
            370 => 
            array (
                'id' => 1458,
                'presensi_id' => 93,
                'peserta_id' => 109,
                'sign' => '65826823c9f51.png',
                'slug' => 'HL1bPLMQKVHdcMXj8OTn',
                'created_at' => '2023-12-20 01:52:06',
                'updated_at' => '2023-12-20 04:05:55',
            ),
            371 => 
            array (
                'id' => 1459,
                'presensi_id' => 93,
                'peserta_id' => 21,
                'sign' => '65825cb2c6d61.png',
                'slug' => 'emEBSTYgUetBAQh0PybK',
                'created_at' => '2023-12-20 01:52:12',
                'updated_at' => '2023-12-20 03:17:06',
            ),
            372 => 
            array (
                'id' => 1460,
                'presensi_id' => 93,
                'peserta_id' => 22,
                'sign' => '6582607269cb1.png',
                'slug' => 'gVsDYQZ7kQ2jDNRSRHc5',
                'created_at' => '2023-12-20 01:52:19',
                'updated_at' => '2023-12-20 03:33:06',
            ),
            373 => 
            array (
                'id' => 1461,
                'presensi_id' => 93,
                'peserta_id' => 38,
                'sign' => '6582758ac2d26.png',
                'slug' => '7huc05j88e9o4lNiVmSO',
                'created_at' => '2023-12-20 01:52:24',
                'updated_at' => '2023-12-20 05:03:06',
            ),
            374 => 
            array (
                'id' => 1462,
                'presensi_id' => 93,
                'peserta_id' => 151,
                'sign' => '658280a625063.png',
                'slug' => 'hZU2vFikqL567TT3tfUu',
                'created_at' => '2023-12-20 01:52:34',
                'updated_at' => '2023-12-20 05:50:30',
            ),
            375 => 
            array (
                'id' => 1463,
                'presensi_id' => 93,
                'peserta_id' => 111,
                'sign' => '65828f6a48a40.png',
                'slug' => 'BmqnewN67IC0jCBFK1Iv',
                'created_at' => '2023-12-20 01:52:40',
                'updated_at' => '2023-12-20 06:53:30',
            ),
            376 => 
            array (
                'id' => 1464,
                'presensi_id' => 93,
                'peserta_id' => 26,
                'sign' => '65825de9ecba5.png',
                'slug' => 'wOv0WtxrT61NajXmVwyW',
                'created_at' => '2023-12-20 01:52:46',
                'updated_at' => '2023-12-20 03:22:17',
            ),
            377 => 
            array (
                'id' => 1465,
                'presensi_id' => 93,
                'peserta_id' => 86,
                'sign' => '65825de7ed5c9.png',
                'slug' => 'DPNNW1fWSrjUcVGXPjGd',
                'created_at' => '2023-12-20 01:53:03',
                'updated_at' => '2023-12-20 03:22:15',
            ),
            378 => 
            array (
                'id' => 1466,
                'presensi_id' => 93,
                'peserta_id' => 89,
                'sign' => '65825d77bd17d.png',
                'slug' => 'RDPBQfsbq7oHWWNmb7Qm',
                'created_at' => '2023-12-20 01:53:10',
                'updated_at' => '2023-12-20 03:20:23',
            ),
            379 => 
            array (
                'id' => 1467,
                'presensi_id' => 93,
                'peserta_id' => 113,
                'sign' => '65829e83ce3f6.png',
                'slug' => 'kaMKRG6RYrXnMFEFKNFZ',
                'created_at' => '2023-12-20 01:56:02',
                'updated_at' => '2023-12-20 07:57:55',
            ),
            380 => 
            array (
                'id' => 1468,
                'presensi_id' => 93,
                'peserta_id' => 98,
                'sign' => '65829e5cd2360.png',
                'slug' => 'M9QtLTMC8VJME9NOFeBm',
                'created_at' => '2023-12-20 01:56:08',
                'updated_at' => '2023-12-20 07:57:16',
            ),
            381 => 
            array (
                'id' => 1469,
                'presensi_id' => 93,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'XtXgvteMbrmaV1u4hF9H',
                'created_at' => '2023-12-20 01:56:21',
                'updated_at' => '2023-12-20 01:56:21',
            ),
            382 => 
            array (
                'id' => 1470,
                'presensi_id' => 93,
                'peserta_id' => 92,
                'sign' => '65828d7576144.png',
                'slug' => 'C6pjah2APS0NQMI2vSlt',
                'created_at' => '2023-12-20 01:56:25',
                'updated_at' => '2023-12-20 06:45:09',
            ),
            383 => 
            array (
                'id' => 1471,
                'presensi_id' => 93,
                'peserta_id' => 11,
                'sign' => '65829fe44cfb2.png',
                'slug' => 'iclcEyB3nZXjnf5NYsN1',
                'created_at' => '2023-12-20 01:57:35',
                'updated_at' => '2023-12-20 08:03:48',
            ),
            384 => 
            array (
                'id' => 1472,
                'presensi_id' => 93,
                'peserta_id' => 48,
                'sign' => NULL,
                'slug' => 'VPy9o5BqAehyarMrzdft',
                'created_at' => '2023-12-20 01:57:47',
                'updated_at' => '2023-12-20 01:57:47',
            ),
            385 => 
            array (
                'id' => 1473,
                'presensi_id' => 94,
                'peserta_id' => 86,
                'sign' => NULL,
                'slug' => 'kILjhhD6GWMNzY20fZWM',
                'created_at' => '2023-12-20 04:23:17',
                'updated_at' => '2023-12-20 04:23:17',
            ),
            386 => 
            array (
                'id' => 1474,
                'presensi_id' => 94,
                'peserta_id' => 97,
                'sign' => '65827b79d5058.png',
                'slug' => 'dvqOhIDk1eqVnc1MtqwN',
                'created_at' => '2023-12-20 04:23:51',
                'updated_at' => '2023-12-20 05:28:25',
            ),
            387 => 
            array (
                'id' => 1475,
                'presensi_id' => 94,
                'peserta_id' => 31,
                'sign' => '65827bad9aa3a.png',
                'slug' => 'eDTuDzKZMT2XpFJupwmC',
                'created_at' => '2023-12-20 04:24:10',
                'updated_at' => '2023-12-20 05:29:17',
            ),
            388 => 
            array (
                'id' => 1476,
                'presensi_id' => 94,
                'peserta_id' => 103,
                'sign' => '65827bb7c23a5.png',
                'slug' => 'ftEWfcUzs1y55KAtzlrq',
                'created_at' => '2023-12-20 04:25:05',
                'updated_at' => '2023-12-20 05:29:27',
            ),
            389 => 
            array (
                'id' => 1477,
                'presensi_id' => 94,
                'peserta_id' => 110,
                'sign' => NULL,
                'slug' => 'Tuw4ZoK9hLCp3h7U81J6',
                'created_at' => '2023-12-20 04:25:17',
                'updated_at' => '2023-12-20 04:25:17',
            ),
            390 => 
            array (
                'id' => 1478,
                'presensi_id' => 95,
                'peserta_id' => 5,
                'sign' => '6583b6d8bebca.png',
                'slug' => 'cECXlFgczZbHzyyJ8yYG',
                'created_at' => '2023-12-21 03:20:14',
                'updated_at' => '2023-12-21 03:54:00',
            ),
            391 => 
            array (
                'id' => 1479,
                'presensi_id' => 95,
                'peserta_id' => 6,
                'sign' => '6584e52fe9a7f.png',
                'slug' => 'ESlPQuBTCvxcruTXPg6O',
                'created_at' => '2023-12-21 03:23:59',
                'updated_at' => '2023-12-22 01:23:59',
            ),
            392 => 
            array (
                'id' => 1480,
                'presensi_id' => 95,
                'peserta_id' => 9,
                'sign' => '6583b5970c0e6.png',
                'slug' => 'Ye1wqPf7rnjrFU9IfJeJ',
                'created_at' => '2023-12-21 03:24:06',
                'updated_at' => '2023-12-21 03:48:39',
            ),
            393 => 
            array (
                'id' => 1481,
                'presensi_id' => 95,
                'peserta_id' => 10,
                'sign' => '6583b2e49ae5e.png',
                'slug' => 'E7cWp52LyjnJJLIRZ5ZC',
                'created_at' => '2023-12-21 03:24:20',
                'updated_at' => '2023-12-21 03:37:08',
            ),
            394 => 
            array (
                'id' => 1482,
                'presensi_id' => 95,
                'peserta_id' => 85,
                'sign' => '6583bfaeaa184.png',
                'slug' => 'VsCBRNSvKRZrGTiJ3Nca',
                'created_at' => '2023-12-21 03:24:25',
                'updated_at' => '2023-12-21 04:31:42',
            ),
            395 => 
            array (
                'id' => 1483,
                'presensi_id' => 95,
                'peserta_id' => 11,
                'sign' => '6584e59744ab2.png',
                'slug' => '5uPiyCfSTKSIq0qXJ6nU',
                'created_at' => '2023-12-21 03:24:32',
                'updated_at' => '2023-12-22 01:25:43',
            ),
            396 => 
            array (
                'id' => 1484,
                'presensi_id' => 95,
                'peserta_id' => 12,
                'sign' => '6583b3ed7a1c6.png',
                'slug' => 'bpNJJgJ2RxZ12P7mMmwf',
                'created_at' => '2023-12-21 03:24:37',
                'updated_at' => '2023-12-21 03:41:33',
            ),
            397 => 
            array (
                'id' => 1485,
                'presensi_id' => 95,
                'peserta_id' => 107,
                'sign' => '6583b25ed394d.png',
                'slug' => 'CZsxa8n1QFWIHp9YPhjZ',
                'created_at' => '2023-12-21 03:24:42',
                'updated_at' => '2023-12-21 03:34:54',
            ),
            398 => 
            array (
                'id' => 1486,
                'presensi_id' => 95,
                'peserta_id' => 109,
                'sign' => '6584e712180fd.png',
                'slug' => 'IfJNUxrQGAKnoRwrXKmq',
                'created_at' => '2023-12-21 03:24:47',
                'updated_at' => '2023-12-22 01:32:02',
            ),
            399 => 
            array (
                'id' => 1487,
                'presensi_id' => 95,
                'peserta_id' => 108,
                'sign' => '6584e5814fd37.png',
                'slug' => 'd6xghssTnr7vNz9Ij0Oo',
                'created_at' => '2023-12-21 03:24:52',
                'updated_at' => '2023-12-22 01:25:21',
            ),
            400 => 
            array (
                'id' => 1488,
                'presensi_id' => 95,
                'peserta_id' => 21,
                'sign' => '6583b23ec496f.png',
                'slug' => 'fKVCb13pweZTbK6QRCtU',
                'created_at' => '2023-12-21 03:24:57',
                'updated_at' => '2023-12-21 03:34:22',
            ),
            401 => 
            array (
                'id' => 1489,
                'presensi_id' => 95,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'RQH6cOr46JpEVa1dO7Ix',
                'created_at' => '2023-12-21 03:25:09',
                'updated_at' => '2023-12-21 03:25:09',
            ),
            402 => 
            array (
                'id' => 1490,
                'presensi_id' => 95,
                'peserta_id' => 38,
                'sign' => '6583c3107b064.png',
                'slug' => 'rdiD7MBgrWDwDblZUaYq',
                'created_at' => '2023-12-21 03:25:14',
                'updated_at' => '2023-12-21 04:46:08',
            ),
            403 => 
            array (
                'id' => 1491,
                'presensi_id' => 95,
                'peserta_id' => 98,
                'sign' => '6583e73554eeb.png',
                'slug' => 'uF6GjiIOMugt0KVNMg6i',
                'created_at' => '2023-12-21 03:25:31',
                'updated_at' => '2023-12-21 07:20:21',
            ),
            404 => 
            array (
                'id' => 1492,
                'presensi_id' => 95,
                'peserta_id' => 113,
                'sign' => NULL,
                'slug' => 'AvexhZ0cXIukc6cekRSv',
                'created_at' => '2023-12-21 03:25:35',
                'updated_at' => '2023-12-21 03:25:35',
            ),
            405 => 
            array (
                'id' => 1493,
                'presensi_id' => 95,
                'peserta_id' => 92,
                'sign' => '6583b45fca1aa.png',
                'slug' => '1Z5aIR2GJIQfdRdN4oW4',
                'created_at' => '2023-12-21 03:25:41',
                'updated_at' => '2023-12-21 03:43:27',
            ),
            406 => 
            array (
                'id' => 1495,
                'presensi_id' => 95,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'UBPFd3p280RScroHNyrC',
                'created_at' => '2023-12-21 03:26:38',
                'updated_at' => '2023-12-21 03:26:38',
            ),
            407 => 
            array (
                'id' => 1496,
                'presensi_id' => 96,
                'peserta_id' => 5,
                'sign' => '6584ebe3b5602.png',
                'slug' => 'GetVusFxgAg38KLjuU4g',
                'created_at' => '2023-12-22 01:16:14',
                'updated_at' => '2023-12-22 01:52:35',
            ),
            408 => 
            array (
                'id' => 1497,
                'presensi_id' => 96,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'cUSh1dHg5DaOzDXStJoT',
                'created_at' => '2023-12-22 01:16:21',
                'updated_at' => '2023-12-22 01:16:21',
            ),
            409 => 
            array (
                'id' => 1498,
                'presensi_id' => 96,
                'peserta_id' => 9,
                'sign' => '6584f5fb05618.png',
                'slug' => 'ahK12PpOwI7BJaek5B4y',
                'created_at' => '2023-12-22 01:16:26',
                'updated_at' => '2023-12-22 02:35:39',
            ),
            410 => 
            array (
                'id' => 1499,
                'presensi_id' => 96,
                'peserta_id' => 10,
                'sign' => '6584fd5a27eec.png',
                'slug' => 'TrPq1J0awW8Jb1SmeJbS',
                'created_at' => '2023-12-22 01:16:32',
                'updated_at' => '2023-12-22 03:07:06',
            ),
            411 => 
            array (
                'id' => 1500,
                'presensi_id' => 96,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'XYe1Yw3Ux1B4rZABldS6',
                'created_at' => '2023-12-22 01:16:37',
                'updated_at' => '2023-12-22 01:16:37',
            ),
            412 => 
            array (
                'id' => 1501,
                'presensi_id' => 96,
                'peserta_id' => 85,
                'sign' => '6584ee3114059.png',
                'slug' => '9mYwadL27MplHsmJ4mrf',
                'created_at' => '2023-12-22 01:16:41',
                'updated_at' => '2023-12-22 02:02:25',
            ),
            413 => 
            array (
                'id' => 1502,
                'presensi_id' => 96,
                'peserta_id' => 12,
                'sign' => '6584ec71929ed.png',
                'slug' => 'xn3Yxosn6x507xynHeUS',
                'created_at' => '2023-12-22 01:16:44',
                'updated_at' => '2023-12-22 01:54:57',
            ),
            414 => 
            array (
                'id' => 1503,
                'presensi_id' => 96,
                'peserta_id' => 107,
                'sign' => '6584ec2ca9fab.png',
                'slug' => 'HYRHglb52DO2yW2Vhael',
                'created_at' => '2023-12-22 01:16:48',
                'updated_at' => '2023-12-22 01:53:48',
            ),
            415 => 
            array (
                'id' => 1504,
                'presensi_id' => 96,
                'peserta_id' => 108,
                'sign' => '6584f21b98307.png',
                'slug' => 'hGMr2JRX4aMUVKCju8p1',
                'created_at' => '2023-12-22 01:16:52',
                'updated_at' => '2023-12-22 02:19:07',
            ),
            416 => 
            array (
                'id' => 1505,
                'presensi_id' => 96,
                'peserta_id' => 109,
                'sign' => '6584ed25232d2.png',
                'slug' => 'LlijcFQayhS14ZIGb92Z',
                'created_at' => '2023-12-22 01:16:58',
                'updated_at' => '2023-12-22 01:57:57',
            ),
            417 => 
            array (
                'id' => 1506,
                'presensi_id' => 96,
                'peserta_id' => 21,
                'sign' => '6584ed93bf639.png',
                'slug' => 'pm7fyHV45McCE2XRZD9D',
                'created_at' => '2023-12-22 01:17:03',
                'updated_at' => '2023-12-22 01:59:47',
            ),
            418 => 
            array (
                'id' => 1507,
                'presensi_id' => 96,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'U9xqUwPtOf02UE97ThKR',
                'created_at' => '2023-12-22 01:17:07',
                'updated_at' => '2023-12-22 01:17:07',
            ),
            419 => 
            array (
                'id' => 1508,
                'presensi_id' => 96,
                'peserta_id' => 38,
                'sign' => '6584f16ece86d.png',
                'slug' => 'q4qW2SOqSAbytgem3YIt',
                'created_at' => '2023-12-22 01:17:12',
                'updated_at' => '2023-12-22 02:16:14',
            ),
            420 => 
            array (
                'id' => 1509,
                'presensi_id' => 96,
                'peserta_id' => 40,
                'sign' => '6584efcfedf9d.png',
                'slug' => 'kIYEoCtS57e1OGoclfEq',
                'created_at' => '2023-12-22 01:17:20',
                'updated_at' => '2023-12-22 02:09:19',
            ),
            421 => 
            array (
                'id' => 1510,
                'presensi_id' => 96,
                'peserta_id' => 26,
                'sign' => '6584ec854bc1f.png',
                'slug' => 'i7pzacmsuBsIvd76YNNz',
                'created_at' => '2023-12-22 01:17:25',
                'updated_at' => '2023-12-22 01:55:17',
            ),
            422 => 
            array (
                'id' => 1511,
                'presensi_id' => 96,
                'peserta_id' => 105,
                'sign' => '6584f21ed3c13.png',
                'slug' => '6B3afW5cScHicoNThib6',
                'created_at' => '2023-12-22 01:17:30',
                'updated_at' => '2023-12-22 02:19:10',
            ),
            423 => 
            array (
                'id' => 1512,
                'presensi_id' => 96,
                'peserta_id' => 100,
                'sign' => '6584ec3417a87.png',
                'slug' => 'VFqWFUz2ub5Q7ygwLg2y',
                'created_at' => '2023-12-22 01:17:34',
                'updated_at' => '2023-12-22 01:53:56',
            ),
            424 => 
            array (
                'id' => 1513,
                'presensi_id' => 96,
                'peserta_id' => 27,
                'sign' => '6584f1c7e39fd.png',
                'slug' => 'oz42eb1ANHU1IHJhUyI0',
                'created_at' => '2023-12-22 02:15:12',
                'updated_at' => '2023-12-22 02:17:43',
            ),
            425 => 
            array (
                'id' => 1515,
                'presensi_id' => 98,
                'peserta_id' => 1,
                'sign' => '6593d84d65c37.png',
                'slug' => 'iWtuLreVzPpjAa2Zfon5',
                'created_at' => '2024-01-02 09:32:55',
                'updated_at' => '2024-01-02 09:33:01',
            ),
            426 => 
            array (
                'id' => 1516,
                'presensi_id' => 98,
                'peserta_id' => 9,
                'sign' => '659649880f550.png',
                'slug' => '6G1aqMtPyGziCL1ezKd4',
                'created_at' => '2024-01-02 09:33:15',
                'updated_at' => '2024-01-04 06:00:40',
            ),
            427 => 
            array (
                'id' => 1517,
                'presensi_id' => 99,
                'peserta_id' => 5,
                'sign' => '65964969745da.png',
                'slug' => 'n0L5aSrLd3ctNAwo24Nk',
                'created_at' => '2024-01-04 04:57:08',
                'updated_at' => '2024-01-04 06:00:09',
            ),
            428 => 
            array (
                'id' => 1518,
                'presensi_id' => 99,
                'peserta_id' => 6,
                'sign' => '65964947c0b95.png',
                'slug' => 'vwy4lDh0PNgT5kwYIFtG',
                'created_at' => '2024-01-04 04:57:21',
                'updated_at' => '2024-01-04 05:59:35',
            ),
            429 => 
            array (
                'id' => 1519,
                'presensi_id' => 99,
                'peserta_id' => 9,
                'sign' => '65a8b5b9b2bf9.png',
                'slug' => '5ck328pGdAW75n8DlJSl',
                'created_at' => '2024-01-04 04:57:25',
                'updated_at' => '2024-01-18 05:23:05',
            ),
            430 => 
            array (
                'id' => 1520,
                'presensi_id' => 99,
                'peserta_id' => 10,
                'sign' => '65964c684dec3.png',
                'slug' => 'y1BPJ80Gm6jfflC0pQIb',
                'created_at' => '2024-01-04 05:00:05',
                'updated_at' => '2024-01-04 06:12:56',
            ),
            431 => 
            array (
                'id' => 1521,
                'presensi_id' => 99,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => '82EFE5uXD8hx1ZO7qs17',
                'created_at' => '2024-01-04 05:00:13',
                'updated_at' => '2024-01-04 05:00:13',
            ),
            432 => 
            array (
                'id' => 1522,
                'presensi_id' => 99,
                'peserta_id' => 85,
                'sign' => '659654555c815.png',
                'slug' => 'J5XXdByAaJZrlq7kUVVp',
                'created_at' => '2024-01-04 05:00:17',
                'updated_at' => '2024-01-04 06:46:45',
            ),
            433 => 
            array (
                'id' => 1523,
                'presensi_id' => 99,
                'peserta_id' => 12,
                'sign' => '65964965d2c25.png',
                'slug' => 'Caug4iZR0vuMTo0FW335',
                'created_at' => '2024-01-04 05:00:22',
                'updated_at' => '2024-01-04 06:00:05',
            ),
            434 => 
            array (
                'id' => 1524,
                'presensi_id' => 99,
                'peserta_id' => 107,
                'sign' => '65963bcb8519b.png',
                'slug' => 'jO46p7h54BBwpOANZRBV',
                'created_at' => '2024-01-04 05:00:28',
                'updated_at' => '2024-01-04 05:02:03',
            ),
            435 => 
            array (
                'id' => 1525,
                'presensi_id' => 99,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'PSqxknIVm4nVpGaoDZVj',
                'created_at' => '2024-01-04 05:00:33',
                'updated_at' => '2024-01-04 05:00:33',
            ),
            436 => 
            array (
                'id' => 1526,
                'presensi_id' => 99,
                'peserta_id' => 109,
                'sign' => '65963c044152b.png',
                'slug' => 'C63yO2L7Zj8Ps5cZKJAn',
                'created_at' => '2024-01-04 05:00:38',
                'updated_at' => '2024-01-04 05:03:00',
            ),
            437 => 
            array (
                'id' => 1527,
                'presensi_id' => 99,
                'peserta_id' => 21,
                'sign' => '65964b03c26c7.png',
                'slug' => 'PuTKP8FKvWpBNIRGXidC',
                'created_at' => '2024-01-04 05:00:46',
                'updated_at' => '2024-01-04 06:06:59',
            ),
            438 => 
            array (
                'id' => 1528,
                'presensi_id' => 99,
                'peserta_id' => 38,
                'sign' => '65964928e80e2.png',
                'slug' => 'VD7OyJ1WwuLN2Eko9VNQ',
                'created_at' => '2024-01-04 05:01:03',
                'updated_at' => '2024-01-04 05:59:04',
            ),
            439 => 
            array (
                'id' => 1529,
                'presensi_id' => 99,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'v3o6TEzdJsQpubo4Tc6p',
                'created_at' => '2024-01-04 05:01:15',
                'updated_at' => '2024-01-04 05:01:15',
            ),
            440 => 
            array (
                'id' => 1530,
                'presensi_id' => 99,
                'peserta_id' => 105,
                'sign' => '65964cb406849.png',
                'slug' => 'p50HeXsIGMiVtzaNf3gf',
                'created_at' => '2024-01-04 05:01:22',
                'updated_at' => '2024-01-04 06:14:12',
            ),
            441 => 
            array (
                'id' => 1531,
                'presensi_id' => 99,
                'peserta_id' => 100,
                'sign' => '659649fd22677.png',
                'slug' => '9H6WjBd0InBz3QDmcRfb',
                'created_at' => '2024-01-04 05:01:27',
                'updated_at' => '2024-01-04 06:02:37',
            ),
            442 => 
            array (
                'id' => 1532,
                'presensi_id' => 99,
                'peserta_id' => 18,
                'sign' => NULL,
                'slug' => 'G32yRJD4CgoIiaRSXZAZ',
                'created_at' => '2024-01-04 05:01:32',
                'updated_at' => '2024-01-04 05:01:32',
            ),
            443 => 
            array (
                'id' => 1533,
                'presensi_id' => 99,
                'peserta_id' => 19,
                'sign' => '65964a67583ac.png',
                'slug' => 'alaHer83VViN3BdWd7zo',
                'created_at' => '2024-01-04 05:01:37',
                'updated_at' => '2024-01-04 06:04:23',
            ),
            444 => 
            array (
                'id' => 1534,
                'presensi_id' => 100,
                'peserta_id' => 5,
                'sign' => '65a8b5a253ae9.png',
                'slug' => 'r1oTYol7NuYW2FF6ZoxO',
                'created_at' => '2024-01-18 05:02:53',
                'updated_at' => '2024-01-18 05:22:42',
            ),
            445 => 
            array (
                'id' => 1535,
                'presensi_id' => 100,
                'peserta_id' => 6,
                'sign' => '65a8d8bf21ec3.png',
                'slug' => 'Tm3rypPwcKyaKJLxlGQS',
                'created_at' => '2024-01-18 05:14:09',
                'updated_at' => '2024-01-18 07:52:31',
            ),
            446 => 
            array (
                'id' => 1536,
                'presensi_id' => 100,
                'peserta_id' => 9,
                'sign' => '65a8b5a7d30f6.png',
                'slug' => 'mqXgRMNANQXt1EDcKbbD',
                'created_at' => '2024-01-18 05:14:13',
                'updated_at' => '2024-01-18 05:22:47',
            ),
            447 => 
            array (
                'id' => 1537,
                'presensi_id' => 100,
                'peserta_id' => 52,
                'sign' => '65a8b662726f3.png',
                'slug' => 'XzBi3zi8eX0PmRlTHF5K',
                'created_at' => '2024-01-18 05:14:18',
                'updated_at' => '2024-01-18 05:25:54',
            ),
            448 => 
            array (
                'id' => 1538,
                'presensi_id' => 100,
                'peserta_id' => 10,
                'sign' => '65a8b6a0959e3.png',
                'slug' => 'pMOv7wqGpGdgEcewMfdX',
                'created_at' => '2024-01-18 05:14:23',
                'updated_at' => '2024-01-18 05:26:56',
            ),
            449 => 
            array (
                'id' => 1539,
                'presensi_id' => 100,
                'peserta_id' => 85,
                'sign' => '65a8b776cb61e.png',
                'slug' => 'xUxaBLUdlL6JlVSuU2tf',
                'created_at' => '2024-01-18 05:14:28',
                'updated_at' => '2024-01-18 05:30:30',
            ),
            450 => 
            array (
                'id' => 1540,
                'presensi_id' => 100,
                'peserta_id' => 12,
                'sign' => '65a8b597ace46.png',
                'slug' => 'cukt3xMZJO1j1nlVvMZT',
                'created_at' => '2024-01-18 05:18:14',
                'updated_at' => '2024-01-18 05:22:31',
            ),
            451 => 
            array (
                'id' => 1541,
                'presensi_id' => 100,
                'peserta_id' => 107,
                'sign' => '65a8b5c1aa3ab.png',
                'slug' => 'IQY8FaTSUp7RdG1Sakdy',
                'created_at' => '2024-01-18 05:18:22',
                'updated_at' => '2024-01-18 05:23:13',
            ),
            452 => 
            array (
                'id' => 1542,
                'presensi_id' => 100,
                'peserta_id' => 108,
                'sign' => '65a8d9108ac2d.png',
                'slug' => '2sh4TAU9eIsPDnydwygH',
                'created_at' => '2024-01-18 05:18:43',
                'updated_at' => '2024-01-18 07:53:52',
            ),
            453 => 
            array (
                'id' => 1543,
                'presensi_id' => 100,
                'peserta_id' => 109,
                'sign' => '65a8d88bba3df.png',
                'slug' => 'WXsVYx6vCeCAa9AiP94Y',
                'created_at' => '2024-01-18 05:18:49',
                'updated_at' => '2024-01-18 07:51:39',
            ),
            454 => 
            array (
                'id' => 1544,
                'presensi_id' => 100,
                'peserta_id' => 21,
                'sign' => '65a8bb6f18760.png',
                'slug' => 'DTJGYEe2aCRV8jEFQLTz',
                'created_at' => '2024-01-18 05:18:55',
                'updated_at' => '2024-01-18 05:47:27',
            ),
            455 => 
            array (
                'id' => 1545,
                'presensi_id' => 100,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '7DXXEyKU3cgSxyn6qh4k',
                'created_at' => '2024-01-18 05:19:01',
                'updated_at' => '2024-01-18 05:19:01',
            ),
            456 => 
            array (
                'id' => 1546,
                'presensi_id' => 100,
                'peserta_id' => 38,
                'sign' => '65a8c75bb8d0c.png',
                'slug' => 'xdZfrpPkcE4m1gLTwmn1',
                'created_at' => '2024-01-18 05:19:06',
                'updated_at' => '2024-01-18 06:38:19',
            ),
            457 => 
            array (
                'id' => 1547,
                'presensi_id' => 100,
                'peserta_id' => 89,
                'sign' => '65a8c8ca854f1.png',
                'slug' => 'BPzshM5liK6okzzop8FZ',
                'created_at' => '2024-01-18 05:19:12',
                'updated_at' => '2024-01-18 06:44:26',
            ),
            458 => 
            array (
                'id' => 1548,
                'presensi_id' => 100,
                'peserta_id' => 86,
                'sign' => '65a8c97f43140.png',
                'slug' => 'UQgXt9qAsKf9MGhT92E6',
                'created_at' => '2024-01-18 05:19:19',
                'updated_at' => '2024-01-18 06:47:27',
            ),
            459 => 
            array (
                'id' => 1549,
                'presensi_id' => 100,
                'peserta_id' => 26,
                'sign' => '65a8c713c6186.png',
                'slug' => 'rUeTafMxD9OHkyFnaV1d',
                'created_at' => '2024-01-18 05:19:28',
                'updated_at' => '2024-01-18 06:37:07',
            ),
            460 => 
            array (
                'id' => 1550,
                'presensi_id' => 100,
                'peserta_id' => 151,
                'sign' => '65a8b9ba0ed8f.png',
                'slug' => 'tX2SQ96tcJXyAMwGwa5s',
                'created_at' => '2024-01-18 05:19:40',
                'updated_at' => '2024-01-18 05:40:10',
            ),
            461 => 
            array (
                'id' => 1551,
                'presensi_id' => 100,
                'peserta_id' => 111,
                'sign' => '65a8c74a2240b.png',
                'slug' => 'U9rSFtW653Oec3c75yHT',
                'created_at' => '2024-01-18 05:19:45',
                'updated_at' => '2024-01-18 06:38:02',
            ),
            462 => 
            array (
                'id' => 1552,
                'presensi_id' => 100,
                'peserta_id' => 92,
                'sign' => '65a8d148eac33.png',
                'slug' => 'CzwZt5bMML3sj1qBgdUi',
                'created_at' => '2024-01-18 05:20:27',
                'updated_at' => '2024-01-18 07:20:40',
            ),
            463 => 
            array (
                'id' => 1553,
                'presensi_id' => 100,
                'peserta_id' => 11,
                'sign' => '65a8d91e5ded7.png',
                'slug' => '9hLg9Igxc668FqEVbNJR',
                'created_at' => '2024-01-18 05:20:33',
                'updated_at' => '2024-01-18 07:54:06',
            ),
            464 => 
            array (
                'id' => 1554,
                'presensi_id' => 100,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'pArgUXAPP0uUjfpW08Ji',
                'created_at' => '2024-01-18 05:21:05',
                'updated_at' => '2024-01-18 05:21:05',
            ),
            465 => 
            array (
                'id' => 1555,
                'presensi_id' => 100,
                'peserta_id' => 98,
                'sign' => '65a8d352af14f.png',
                'slug' => 'Vl2AfOpXVQwukyhOcQkK',
                'created_at' => '2024-01-18 05:21:15',
                'updated_at' => '2024-01-18 07:29:22',
            ),
            466 => 
            array (
                'id' => 1556,
                'presensi_id' => 100,
                'peserta_id' => 218,
                'sign' => '65a9f8de56a6d.png',
                'slug' => 'rY3lLal5nZPVpmYw18Et',
                'created_at' => '2024-01-18 05:21:20',
                'updated_at' => '2024-01-19 04:21:50',
            ),
            467 => 
            array (
                'id' => 1557,
                'presensi_id' => 101,
                'peserta_id' => 1,
                'sign' => NULL,
                'slug' => 'AotsXALpzP9vXAukLc34',
                'created_at' => '2024-01-23 06:59:19',
                'updated_at' => '2024-01-23 06:59:19',
            ),
            468 => 
            array (
                'id' => 1558,
                'presensi_id' => 101,
                'peserta_id' => 30,
                'sign' => NULL,
                'slug' => 'TUx7GpRsIrFaQYtyEJq1',
                'created_at' => '2024-01-23 07:03:18',
                'updated_at' => '2024-01-23 07:03:18',
            ),
            469 => 
            array (
                'id' => 1559,
                'presensi_id' => 101,
                'peserta_id' => 29,
                'sign' => NULL,
                'slug' => 'S6v5cvaTPiRvkMDalvX3',
                'created_at' => '2024-01-23 07:03:24',
                'updated_at' => '2024-01-23 07:03:24',
            ),
            470 => 
            array (
                'id' => 1560,
                'presensi_id' => 101,
                'peserta_id' => 31,
                'sign' => '65af65e2772da.png',
                'slug' => 'I3smEAQNDCyginH9lm6n',
                'created_at' => '2024-01-23 07:04:09',
                'updated_at' => '2024-01-23 07:08:18',
            ),
            471 => 
            array (
                'id' => 1561,
                'presensi_id' => 101,
                'peserta_id' => 110,
                'sign' => '65af64ff63316.png',
                'slug' => 'KzfV44T4buAUajXcAEOw',
                'created_at' => '2024-01-23 07:04:16',
                'updated_at' => '2024-01-23 07:04:31',
            ),
            472 => 
            array (
                'id' => 1562,
                'presensi_id' => 101,
                'peserta_id' => 103,
                'sign' => '65af653e59eb0.png',
                'slug' => 'ZbbidLofuLqTsUsLV8Pp',
                'created_at' => '2024-01-23 07:04:21',
                'updated_at' => '2024-01-23 07:05:34',
            ),
            473 => 
            array (
                'id' => 1563,
                'presensi_id' => 101,
                'peserta_id' => 97,
                'sign' => '65af65f39cc9d.png',
                'slug' => 'KKYyCinql9Fh5g4l4BHu',
                'created_at' => '2024-01-23 07:07:13',
                'updated_at' => '2024-01-23 07:08:35',
            ),
            474 => 
            array (
                'id' => 1564,
                'presensi_id' => 101,
                'peserta_id' => 26,
                'sign' => NULL,
                'slug' => '8qPfCcqm1y4jm2GLvZMb',
                'created_at' => '2024-01-23 07:12:32',
                'updated_at' => '2024-01-23 07:12:32',
            ),
            475 => 
            array (
                'id' => 1565,
                'presensi_id' => 101,
                'peserta_id' => 44,
                'sign' => '65af696091ebc.png',
                'slug' => 'bpY3bQw2UpjVom8Xh66A',
                'created_at' => '2024-01-23 07:16:20',
                'updated_at' => '2024-01-23 07:23:12',
            ),
            476 => 
            array (
                'id' => 1566,
                'presensi_id' => 101,
                'peserta_id' => 61,
                'sign' => NULL,
                'slug' => 'jKR4hHSANoDy7cAjr8HL',
                'created_at' => '2024-01-23 07:25:32',
                'updated_at' => '2024-01-23 07:25:32',
            ),
            477 => 
            array (
                'id' => 1567,
                'presensi_id' => 101,
                'peserta_id' => 51,
                'sign' => NULL,
                'slug' => 'vZcBqVHG2E4zIM2ovEwr',
                'created_at' => '2024-01-23 07:41:56',
                'updated_at' => '2024-01-23 07:41:56',
            ),
            478 => 
            array (
                'id' => 1568,
                'presensi_id' => 101,
                'peserta_id' => 28,
                'sign' => NULL,
                'slug' => '2KOk3Rnyb3H3Gq8nvfA4',
                'created_at' => '2024-01-23 07:43:19',
                'updated_at' => '2024-01-23 07:43:19',
            ),
            479 => 
            array (
                'id' => 1569,
                'presensi_id' => 101,
                'peserta_id' => 25,
                'sign' => '65afad286665f.png',
                'slug' => 'dXvy8YsF8sxIrVhss8oc',
                'created_at' => '2024-01-23 07:57:04',
                'updated_at' => '2024-01-23 12:12:24',
            ),
            480 => 
            array (
                'id' => 1570,
                'presensi_id' => 101,
                'peserta_id' => 55,
                'sign' => NULL,
                'slug' => 'RvZNYMfO3SAaqsy3eixX',
                'created_at' => '2024-01-23 08:40:47',
                'updated_at' => '2024-01-23 08:40:47',
            ),
            481 => 
            array (
                'id' => 1571,
                'presensi_id' => 101,
                'peserta_id' => 9,
                'sign' => '65af831b83581.png',
                'slug' => '2mhByQs7r5GLfyiDFAyT',
                'created_at' => '2024-01-23 09:03:54',
                'updated_at' => '2024-01-23 09:12:59',
            ),
            482 => 
            array (
                'id' => 1572,
                'presensi_id' => 102,
                'peserta_id' => 5,
                'sign' => '65b885d765fb1.png',
                'slug' => '27FqfK9kE8eKB62gEzd0',
                'created_at' => '2024-01-30 03:13:45',
                'updated_at' => '2024-01-30 05:15:03',
            ),
            483 => 
            array (
                'id' => 1573,
                'presensi_id' => 102,
                'peserta_id' => 6,
                'sign' => '65b88fe085bbb.png',
                'slug' => 'plAZsCMIGg5KQULhzmOS',
                'created_at' => '2024-01-30 03:17:28',
                'updated_at' => '2024-01-30 05:57:52',
            ),
            484 => 
            array (
                'id' => 1574,
                'presensi_id' => 102,
                'peserta_id' => 9,
                'sign' => '65b8a0142a62f.png',
                'slug' => 'EFgFX2oHxAxZFW1P8LvP',
                'created_at' => '2024-01-30 03:17:35',
                'updated_at' => '2024-01-30 07:07:00',
            ),
            485 => 
            array (
                'id' => 1575,
                'presensi_id' => 102,
                'peserta_id' => 52,
                'sign' => '65b9d2fb2e608.png',
                'slug' => 'zXcrgFDwOVItyVLn8S1H',
                'created_at' => '2024-01-30 03:18:06',
                'updated_at' => '2024-01-31 04:56:27',
            ),
            486 => 
            array (
                'id' => 1576,
                'presensi_id' => 102,
                'peserta_id' => 10,
                'sign' => '65b87b145571b.png',
                'slug' => '8aVXYyWBribEGJZhMcmS',
                'created_at' => '2024-01-30 03:18:11',
                'updated_at' => '2024-01-30 04:29:08',
            ),
            487 => 
            array (
                'id' => 1577,
                'presensi_id' => 102,
                'peserta_id' => 85,
                'sign' => '65b87b4ac9ac1.png',
                'slug' => 'Yk3S6FT3cXjuN79z3N2k',
                'created_at' => '2024-01-30 03:18:24',
                'updated_at' => '2024-01-30 04:30:02',
            ),
            488 => 
            array (
                'id' => 1578,
                'presensi_id' => 102,
                'peserta_id' => 12,
                'sign' => '65b87ac3d8136.png',
                'slug' => 'S6bKQtr2V0O8uvaoLyxm',
                'created_at' => '2024-01-30 03:18:29',
                'updated_at' => '2024-01-30 04:27:47',
            ),
            489 => 
            array (
                'id' => 1579,
                'presensi_id' => 102,
                'peserta_id' => 107,
                'sign' => '65b87b5883350.png',
                'slug' => 'gaIBbCH0BiTK6fzTDFiv',
                'created_at' => '2024-01-30 03:18:34',
                'updated_at' => '2024-01-30 04:30:16',
            ),
            490 => 
            array (
                'id' => 1580,
                'presensi_id' => 102,
                'peserta_id' => 108,
                'sign' => '65b88ff3281fc.png',
                'slug' => 'RVlKfhkhKE7hEcGIZq5m',
                'created_at' => '2024-01-30 03:18:43',
                'updated_at' => '2024-01-30 05:58:11',
            ),
            491 => 
            array (
                'id' => 1581,
                'presensi_id' => 102,
                'peserta_id' => 109,
                'sign' => '65b87d5e142df.png',
                'slug' => 'FvStrF7E98W6NwF0ZPUT',
                'created_at' => '2024-01-30 03:18:50',
                'updated_at' => '2024-01-30 04:38:54',
            ),
            492 => 
            array (
                'id' => 1582,
                'presensi_id' => 102,
                'peserta_id' => 21,
                'sign' => '65b87aee3ba90.png',
                'slug' => 'KmGiyA4GFGRrQGXjCm68',
                'created_at' => '2024-01-30 03:18:54',
                'updated_at' => '2024-01-30 04:28:30',
            ),
            493 => 
            array (
                'id' => 1583,
                'presensi_id' => 102,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'GLVy6gGkmswTp4P5jWfO',
                'created_at' => '2024-01-30 03:19:40',
                'updated_at' => '2024-01-30 03:19:40',
            ),
            494 => 
            array (
                'id' => 1584,
                'presensi_id' => 102,
                'peserta_id' => 38,
                'sign' => '65b8fe4b209a9.png',
                'slug' => 'bx2qjm0vmqnB5E12N4LZ',
                'created_at' => '2024-01-30 03:19:45',
                'updated_at' => '2024-01-30 13:48:59',
            ),
            495 => 
            array (
                'id' => 1585,
                'presensi_id' => 102,
                'peserta_id' => 89,
                'sign' => '65b87b2b684cd.png',
                'slug' => 'L3Y9OfMIrIOGOQ7plnJM',
                'created_at' => '2024-01-30 03:19:55',
                'updated_at' => '2024-01-30 04:29:31',
            ),
            496 => 
            array (
                'id' => 1586,
                'presensi_id' => 102,
                'peserta_id' => 86,
                'sign' => '65b87d2604eb4.png',
                'slug' => 'pSvNYuq98amdjEi1sbMs',
                'created_at' => '2024-01-30 03:20:05',
                'updated_at' => '2024-01-30 04:37:58',
            ),
            497 => 
            array (
                'id' => 1587,
                'presensi_id' => 102,
                'peserta_id' => 26,
                'sign' => NULL,
                'slug' => 'm8pMApTdzWMLexjGcTUL',
                'created_at' => '2024-01-30 03:20:10',
                'updated_at' => '2024-01-30 03:20:10',
            ),
            498 => 
            array (
                'id' => 1588,
                'presensi_id' => 102,
                'peserta_id' => 111,
                'sign' => '65b8969a5181b.png',
                'slug' => 'IKQPqyq3DJajHC7d6BuX',
                'created_at' => '2024-01-30 04:38:40',
                'updated_at' => '2024-01-30 06:26:34',
            ),
            499 => 
            array (
                'id' => 1589,
                'presensi_id' => 102,
                'peserta_id' => 151,
                'sign' => '65b88f668a353.png',
                'slug' => '6XKyxQftMhi3fH56geEm',
                'created_at' => '2024-01-30 04:38:46',
                'updated_at' => '2024-01-30 05:55:50',
            ),
        ));
        \DB::table('kehadirans')->insert(array (
            0 => 
            array (
                'id' => 1590,
                'presensi_id' => 103,
                'peserta_id' => 5,
                'sign' => '65b9a71c74e9f.png',
                'slug' => 'VBfk6FLtzEeoc5cE9fzG',
                'created_at' => '2024-01-31 01:32:32',
                'updated_at' => '2024-01-31 01:49:16',
            ),
            1 => 
            array (
                'id' => 1591,
                'presensi_id' => 103,
                'peserta_id' => 6,
                'sign' => '65b9bd4bf1afb.png',
                'slug' => 'CG9ydmFUbETUTH7zre2a',
                'created_at' => '2024-01-31 01:32:47',
                'updated_at' => '2024-01-31 03:23:55',
            ),
            2 => 
            array (
                'id' => 1592,
                'presensi_id' => 103,
                'peserta_id' => 9,
                'sign' => '65b9a58010293.png',
                'slug' => 'qEujNm1G2GchfWRMxPAE',
                'created_at' => '2024-01-31 01:32:52',
                'updated_at' => '2024-01-31 01:42:24',
            ),
            3 => 
            array (
                'id' => 1593,
                'presensi_id' => 103,
                'peserta_id' => 10,
                'sign' => '65b9d2b6da00f.png',
                'slug' => '8SwJzFn9OMAXbjefMwpv',
                'created_at' => '2024-01-31 01:32:57',
                'updated_at' => '2024-01-31 04:55:18',
            ),
            4 => 
            array (
                'id' => 1594,
                'presensi_id' => 103,
                'peserta_id' => 52,
                'sign' => '65b9d31592f3c.png',
                'slug' => '43rCZGopG2i2M1BKE7hZ',
                'created_at' => '2024-01-31 01:33:02',
                'updated_at' => '2024-01-31 04:56:53',
            ),
            5 => 
            array (
                'id' => 1595,
                'presensi_id' => 103,
                'peserta_id' => 85,
                'sign' => '65b9b6fe63dc9.png',
                'slug' => 'AVmfCXXE9yAknLOvC8OV',
                'created_at' => '2024-01-31 01:33:06',
                'updated_at' => '2024-01-31 02:57:02',
            ),
            6 => 
            array (
                'id' => 1596,
                'presensi_id' => 103,
                'peserta_id' => 12,
                'sign' => '65b9a598bb1b8.png',
                'slug' => 'RMjifs0tYBGDjX19GirE',
                'created_at' => '2024-01-31 01:33:13',
                'updated_at' => '2024-01-31 01:42:48',
            ),
            7 => 
            array (
                'id' => 1597,
                'presensi_id' => 103,
                'peserta_id' => 107,
                'sign' => '65b9a5b75a5ac.png',
                'slug' => 'NUCtDUyTKgcVf83j51uh',
                'created_at' => '2024-01-31 01:33:16',
                'updated_at' => '2024-01-31 01:43:19',
            ),
            8 => 
            array (
                'id' => 1598,
                'presensi_id' => 103,
                'peserta_id' => 108,
                'sign' => '65b9bd57dab74.png',
                'slug' => '5zNRtxDgNfomJEleitja',
                'created_at' => '2024-01-31 01:33:20',
                'updated_at' => '2024-01-31 03:24:07',
            ),
            9 => 
            array (
                'id' => 1599,
                'presensi_id' => 103,
                'peserta_id' => 109,
                'sign' => '65b9d2a77c635.png',
                'slug' => 'sQgJRNSWZXLyg2Bur0OJ',
                'created_at' => '2024-01-31 01:33:25',
                'updated_at' => '2024-01-31 04:55:03',
            ),
            10 => 
            array (
                'id' => 1600,
                'presensi_id' => 103,
                'peserta_id' => 21,
                'sign' => '65b9a5a26b669.png',
                'slug' => '2HEQiGvaG8BLSczuJMRF',
                'created_at' => '2024-01-31 01:33:30',
                'updated_at' => '2024-01-31 01:42:58',
            ),
            11 => 
            array (
                'id' => 1601,
                'presensi_id' => 103,
                'peserta_id' => 22,
                'sign' => '65cae107c6c12.png',
                'slug' => '1P8p0EO56pfKJPdKxCMl',
                'created_at' => '2024-01-31 01:34:16',
                'updated_at' => '2024-02-13 03:24:55',
            ),
            12 => 
            array (
                'id' => 1602,
                'presensi_id' => 103,
                'peserta_id' => 38,
                'sign' => '65b9d2057d4aa.png',
                'slug' => 'uQPlOjrBxfaDxgZaYM5f',
                'created_at' => '2024-01-31 01:34:20',
                'updated_at' => '2024-01-31 04:52:21',
            ),
            13 => 
            array (
                'id' => 1603,
                'presensi_id' => 103,
                'peserta_id' => 92,
                'sign' => '65b9aad7418c3.png',
                'slug' => 'dPlTttr4L2uG3IkykVbn',
                'created_at' => '2024-01-31 01:34:25',
                'updated_at' => '2024-01-31 02:05:11',
            ),
            14 => 
            array (
                'id' => 1604,
                'presensi_id' => 103,
                'peserta_id' => 25,
                'sign' => '65b9be9bbab51.png',
                'slug' => '38WX9kKcjQ5SjubbzbuF',
                'created_at' => '2024-01-31 01:34:41',
                'updated_at' => '2024-01-31 03:29:31',
            ),
            15 => 
            array (
                'id' => 1605,
                'presensi_id' => 103,
                'peserta_id' => 98,
                'sign' => '65b9a671df175.png',
                'slug' => 'LF5FyWjiyHq3WM4019gG',
                'created_at' => '2024-01-31 01:34:47',
                'updated_at' => '2024-01-31 01:46:25',
            ),
            16 => 
            array (
                'id' => 1606,
                'presensi_id' => 103,
                'peserta_id' => 218,
                'sign' => '65b9be59ebe6d.png',
                'slug' => 'YELAlFUKu1E8BNaJtIfO',
                'created_at' => '2024-01-31 01:34:52',
                'updated_at' => '2024-01-31 03:28:25',
            ),
            17 => 
            array (
                'id' => 1607,
                'presensi_id' => 103,
                'peserta_id' => 11,
                'sign' => '65b9bd8b72a7f.png',
                'slug' => 'MUt8C7URB4kGoFGxwH0n',
                'created_at' => '2024-01-31 01:34:57',
                'updated_at' => '2024-01-31 03:24:59',
            ),
            18 => 
            array (
                'id' => 1608,
                'presensi_id' => 104,
                'peserta_id' => 5,
                'sign' => '65caccbf0a704.png',
                'slug' => 'VA4vk69M1qbLVRmRfs8b',
                'created_at' => '2024-02-13 00:52:19',
                'updated_at' => '2024-02-13 01:58:23',
            ),
            19 => 
            array (
                'id' => 1609,
                'presensi_id' => 104,
                'peserta_id' => 6,
                'sign' => '65cb207c443c3.png',
                'slug' => 'be3fMEttawFgCfQlQOlC',
                'created_at' => '2024-02-13 00:53:01',
                'updated_at' => '2024-02-13 07:55:40',
            ),
            20 => 
            array (
                'id' => 1610,
                'presensi_id' => 104,
                'peserta_id' => 9,
                'sign' => '65cacf53a4e94.png',
                'slug' => 'fD41bdRnsnm4aZ7Hmofv',
                'created_at' => '2024-02-13 00:53:17',
                'updated_at' => '2024-02-13 02:09:23',
            ),
            21 => 
            array (
                'id' => 1611,
                'presensi_id' => 104,
                'peserta_id' => 10,
                'sign' => '65cae7da4f8ce.png',
                'slug' => 'O5OWzFnZQ0w0iizkFd9E',
                'created_at' => '2024-02-13 00:53:22',
                'updated_at' => '2024-02-13 03:54:02',
            ),
            22 => 
            array (
                'id' => 1612,
                'presensi_id' => 104,
                'peserta_id' => 11,
                'sign' => '65cb20cfbd132.png',
                'slug' => '4s7XfUrVUEb6p4LC4rge',
                'created_at' => '2024-02-13 00:53:27',
                'updated_at' => '2024-02-13 07:57:03',
            ),
            23 => 
            array (
                'id' => 1613,
                'presensi_id' => 104,
                'peserta_id' => 52,
                'sign' => '65cae0d5ad694.png',
                'slug' => 'OQekut1gXEU9lVFMMFDT',
                'created_at' => '2024-02-13 00:53:35',
                'updated_at' => '2024-02-13 03:24:05',
            ),
            24 => 
            array (
                'id' => 1614,
                'presensi_id' => 104,
                'peserta_id' => 85,
                'sign' => '65cae07503180.png',
                'slug' => 'xpOkMmxtvcrOYkeNM41s',
                'created_at' => '2024-02-13 00:53:40',
                'updated_at' => '2024-02-13 03:22:29',
            ),
            25 => 
            array (
                'id' => 1615,
                'presensi_id' => 104,
                'peserta_id' => 12,
                'sign' => '65cae134055d1.png',
                'slug' => 'iUblhwROTJvDzMyWirk9',
                'created_at' => '2024-02-13 00:53:44',
                'updated_at' => '2024-02-13 03:25:40',
            ),
            26 => 
            array (
                'id' => 1616,
                'presensi_id' => 104,
                'peserta_id' => 107,
                'sign' => '65caced7402e1.png',
                'slug' => 'DuCvnNFUR31cVixal3TF',
                'created_at' => '2024-02-13 00:54:16',
                'updated_at' => '2024-02-13 02:07:19',
            ),
            27 => 
            array (
                'id' => 1617,
                'presensi_id' => 104,
                'peserta_id' => 109,
                'sign' => '65cad599a186b.png',
                'slug' => 'ckyjAabQJ1NvglaySUR9',
                'created_at' => '2024-02-13 00:54:21',
                'updated_at' => '2024-02-13 02:36:09',
            ),
            28 => 
            array (
                'id' => 1618,
                'presensi_id' => 104,
                'peserta_id' => 108,
                'sign' => '65cb20d8eb5da.png',
                'slug' => 'zPFlMBkFAuPfV537nIzE',
                'created_at' => '2024-02-13 00:54:25',
                'updated_at' => '2024-02-13 07:57:12',
            ),
            29 => 
            array (
                'id' => 1619,
                'presensi_id' => 104,
                'peserta_id' => 21,
                'sign' => '65cae4b9e0a90.png',
                'slug' => 'juNvSlCzuUSh5Y7TnEV3',
                'created_at' => '2024-02-13 00:54:36',
                'updated_at' => '2024-02-13 03:40:41',
            ),
            30 => 
            array (
                'id' => 1620,
                'presensi_id' => 104,
                'peserta_id' => 22,
                'sign' => '65cae0eaa5092.png',
                'slug' => 'OhLtdYG1nxB1iaDXuP76',
                'created_at' => '2024-02-13 00:54:41',
                'updated_at' => '2024-02-13 03:24:26',
            ),
            31 => 
            array (
                'id' => 1621,
                'presensi_id' => 104,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'Wy04g9WYUL4IWCvCmIQ6',
                'created_at' => '2024-02-13 00:54:45',
                'updated_at' => '2024-02-13 00:54:45',
            ),
            32 => 
            array (
                'id' => 1622,
                'presensi_id' => 104,
                'peserta_id' => 89,
                'sign' => '65cae80a635c4.png',
                'slug' => 'mz9W0hRGqBCMHAk8YF05',
                'created_at' => '2024-02-13 00:55:21',
                'updated_at' => '2024-02-13 03:54:50',
            ),
            33 => 
            array (
                'id' => 1623,
                'presensi_id' => 104,
                'peserta_id' => 86,
                'sign' => NULL,
                'slug' => 'yD4QextCxSve0bpEZGlX',
                'created_at' => '2024-02-13 00:55:26',
                'updated_at' => '2024-02-13 00:55:26',
            ),
            34 => 
            array (
                'id' => 1624,
                'presensi_id' => 104,
                'peserta_id' => 26,
                'sign' => '65cad0055dfba.png',
                'slug' => 'BIpNZED5H7DrY0t4aQeO',
                'created_at' => '2024-02-13 00:55:30',
                'updated_at' => '2024-02-13 02:12:21',
            ),
            35 => 
            array (
                'id' => 1625,
                'presensi_id' => 104,
                'peserta_id' => 111,
                'sign' => '65cae646e498c.png',
                'slug' => 'XvQuVoLSdlCcmcN3DbLM',
                'created_at' => '2024-02-13 00:55:35',
                'updated_at' => '2024-02-13 03:47:18',
            ),
            36 => 
            array (
                'id' => 1626,
                'presensi_id' => 104,
                'peserta_id' => 151,
                'sign' => '65cacdb0003fe.png',
                'slug' => 'YwGkFlMnLhyJztG4kZmX',
                'created_at' => '2024-02-13 00:56:07',
                'updated_at' => '2024-02-13 02:02:24',
            ),
            37 => 
            array (
                'id' => 1627,
                'presensi_id' => 104,
                'peserta_id' => 92,
                'sign' => '65cace8795531.png',
                'slug' => '8OupppRLAQoBb9fwXIgF',
                'created_at' => '2024-02-13 00:56:27',
                'updated_at' => '2024-02-13 02:05:59',
            ),
            38 => 
            array (
                'id' => 1628,
                'presensi_id' => 104,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'hk2MzePaXhU2smoo6f19',
                'created_at' => '2024-02-13 00:56:32',
                'updated_at' => '2024-02-13 00:56:32',
            ),
            39 => 
            array (
                'id' => 1629,
                'presensi_id' => 104,
                'peserta_id' => 98,
                'sign' => '65cacdc09577c.png',
                'slug' => 'yEjOiqz4fUaqxqk04z0a',
                'created_at' => '2024-02-13 00:56:43',
                'updated_at' => '2024-02-13 02:02:40',
            ),
            40 => 
            array (
                'id' => 1630,
                'presensi_id' => 104,
                'peserta_id' => 218,
                'sign' => '65cace9c10f3a.png',
                'slug' => 'hsXxzfDAfNxMMazCFTks',
                'created_at' => '2024-02-13 00:56:48',
                'updated_at' => '2024-02-13 02:06:20',
            ),
            41 => 
            array (
                'id' => 1631,
                'presensi_id' => 104,
                'peserta_id' => 40,
                'sign' => '65cb210069c49.png',
                'slug' => 'QHLgp1cBxU3Pc3XoO9rP',
                'created_at' => '2024-02-13 00:57:09',
                'updated_at' => '2024-02-13 07:57:52',
            ),
            42 => 
            array (
                'id' => 1632,
                'presensi_id' => 104,
                'peserta_id' => 27,
                'sign' => '65caf72a8e667.png',
                'slug' => '1ULuuJo04ysHCjNCcien',
                'created_at' => '2024-02-13 00:57:14',
                'updated_at' => '2024-02-13 04:59:22',
            ),
            43 => 
            array (
                'id' => 1633,
                'presensi_id' => 104,
                'peserta_id' => 105,
                'sign' => '65cadf935ceae.png',
                'slug' => 'lXOnTlFieSFr80PDvdef',
                'created_at' => '2024-02-13 00:57:23',
                'updated_at' => '2024-02-13 03:18:43',
            ),
            44 => 
            array (
                'id' => 1634,
                'presensi_id' => 104,
                'peserta_id' => 100,
                'sign' => '65cae9638a59d.png',
                'slug' => '410DTuE5HbmD2KL323K7',
                'created_at' => '2024-02-13 00:57:28',
                'updated_at' => '2024-02-13 04:00:35',
            ),
            45 => 
            array (
                'id' => 1635,
                'presensi_id' => 104,
                'peserta_id' => 152,
                'sign' => '65cacf00851bf.png',
                'slug' => 'ZsT86YGkqv9Ng81IWfo0',
                'created_at' => '2024-02-13 00:58:32',
                'updated_at' => '2024-02-13 02:08:00',
            ),
            46 => 
            array (
                'id' => 1636,
                'presensi_id' => 104,
                'peserta_id' => 102,
                'sign' => '65caef32e6921.png',
                'slug' => 'jijLtfOpPWqifNBK0Ain',
                'created_at' => '2024-02-13 00:58:38',
                'updated_at' => '2024-02-13 04:25:22',
            ),
            47 => 
            array (
                'id' => 1637,
                'presensi_id' => 104,
                'peserta_id' => 38,
                'sign' => '65cae11839d68.png',
                'slug' => 'COSxwXSKxIq4MrLkNfhB',
                'created_at' => '2024-02-13 02:03:03',
                'updated_at' => '2024-02-13 03:25:12',
            ),
            48 => 
            array (
                'id' => 1638,
                'presensi_id' => 105,
                'peserta_id' => 5,
                'sign' => '65cff1f3cecef.png',
                'slug' => '30Yf7LuxfwTc50eZSjzq',
                'created_at' => '2024-02-16 05:08:15',
                'updated_at' => '2024-02-16 23:38:27',
            ),
            49 => 
            array (
                'id' => 1639,
                'presensi_id' => 105,
                'peserta_id' => 6,
                'sign' => '65cef7470ae36.png',
                'slug' => 'UcuFsrYvKkLifB46GDQr',
                'created_at' => '2024-02-16 05:25:58',
                'updated_at' => '2024-02-16 05:48:55',
            ),
            50 => 
            array (
                'id' => 1640,
                'presensi_id' => 105,
                'peserta_id' => 9,
                'sign' => '65cef915d87d7.png',
                'slug' => '2zDDJgu2JzGrRdzV7rMN',
                'created_at' => '2024-02-16 05:26:03',
                'updated_at' => '2024-02-16 05:56:37',
            ),
            51 => 
            array (
                'id' => 1641,
                'presensi_id' => 105,
                'peserta_id' => 52,
                'sign' => '65cffaa403d74.png',
                'slug' => '8bvIwAmKTtutc9qNyXDy',
                'created_at' => '2024-02-16 05:26:12',
                'updated_at' => '2024-02-17 00:15:32',
            ),
            52 => 
            array (
                'id' => 1642,
                'presensi_id' => 105,
                'peserta_id' => 85,
                'sign' => '65cf019901920.png',
                'slug' => 'w0WWdIEDBhKnwSDcckAA',
                'created_at' => '2024-02-16 05:26:17',
                'updated_at' => '2024-02-16 06:32:57',
            ),
            53 => 
            array (
                'id' => 1643,
                'presensi_id' => 105,
                'peserta_id' => 10,
                'sign' => '65cf01b7e63f3.png',
                'slug' => 'qNWi7DkHB6XWLP3kGpTF',
                'created_at' => '2024-02-16 05:26:22',
                'updated_at' => '2024-02-16 06:33:27',
            ),
            54 => 
            array (
                'id' => 1644,
                'presensi_id' => 105,
                'peserta_id' => 12,
                'sign' => '65cef7aa3c0c0.png',
                'slug' => 'dAyEd4W0EnDpphzXOfBz',
                'created_at' => '2024-02-16 05:26:38',
                'updated_at' => '2024-02-16 05:50:34',
            ),
            55 => 
            array (
                'id' => 1645,
                'presensi_id' => 105,
                'peserta_id' => 107,
                'sign' => '65cef7737c965.png',
                'slug' => 'lHW6b0A7GiX71JebDoUm',
                'created_at' => '2024-02-16 05:26:44',
                'updated_at' => '2024-02-16 05:49:39',
            ),
            56 => 
            array (
                'id' => 1646,
                'presensi_id' => 105,
                'peserta_id' => 108,
                'sign' => '65cef77c1845b.png',
                'slug' => '2pEWwQFheuiS98WqfTHV',
                'created_at' => '2024-02-16 05:26:49',
                'updated_at' => '2024-02-16 05:49:48',
            ),
            57 => 
            array (
                'id' => 1647,
                'presensi_id' => 105,
                'peserta_id' => 109,
                'sign' => '65cef7d2726c4.png',
                'slug' => '12JhyrENBsyiwu0QDpD2',
                'created_at' => '2024-02-16 05:26:54',
                'updated_at' => '2024-02-16 05:51:14',
            ),
            58 => 
            array (
                'id' => 1648,
                'presensi_id' => 105,
                'peserta_id' => 21,
                'sign' => '65cefa666e833.png',
                'slug' => 'Uc5ZM9XaS8Ll0knYkrOT',
                'created_at' => '2024-02-16 05:26:59',
                'updated_at' => '2024-02-16 06:02:14',
            ),
            59 => 
            array (
                'id' => 1649,
                'presensi_id' => 105,
                'peserta_id' => 22,
                'sign' => '65cef7c956ecd.png',
                'slug' => 'FcYggvFFk64yGvaccTn4',
                'created_at' => '2024-02-16 05:27:05',
                'updated_at' => '2024-02-16 05:51:05',
            ),
            60 => 
            array (
                'id' => 1650,
                'presensi_id' => 105,
                'peserta_id' => 38,
                'sign' => '65cef8b341e44.png',
                'slug' => 'sW9WgZUpVjyOqnqn4t1H',
                'created_at' => '2024-02-16 05:27:10',
                'updated_at' => '2024-02-16 05:54:59',
            ),
            61 => 
            array (
                'id' => 1651,
                'presensi_id' => 105,
                'peserta_id' => 111,
                'sign' => '65cf013c51758.png',
                'slug' => 'wNsHyUVeOkZrJZKr46I3',
                'created_at' => '2024-02-16 05:27:16',
                'updated_at' => '2024-02-16 06:31:24',
            ),
            62 => 
            array (
                'id' => 1652,
                'presensi_id' => 105,
                'peserta_id' => 151,
                'sign' => '65cefc5c058d6.png',
                'slug' => 'veaxI05AZHZtX4Dik8UZ',
                'created_at' => '2024-02-16 05:27:23',
                'updated_at' => '2024-02-16 06:10:36',
            ),
            63 => 
            array (
                'id' => 1653,
                'presensi_id' => 105,
                'peserta_id' => 86,
                'sign' => '65cefbbf27b1e.png',
                'slug' => '0h29sA5WF1lRMKi840lP',
                'created_at' => '2024-02-16 05:27:30',
                'updated_at' => '2024-02-16 06:07:59',
            ),
            64 => 
            array (
                'id' => 1654,
                'presensi_id' => 105,
                'peserta_id' => 89,
                'sign' => '65cef8566aca0.png',
                'slug' => 'xeV1OQlEapvlJzHbE7dR',
                'created_at' => '2024-02-16 05:27:35',
                'updated_at' => '2024-02-16 05:53:26',
            ),
            65 => 
            array (
                'id' => 1655,
                'presensi_id' => 105,
                'peserta_id' => 26,
                'sign' => '65cefb0d871e2.png',
                'slug' => 'QbpXlGRogvJOPyIu2pTC',
                'created_at' => '2024-02-16 05:27:41',
                'updated_at' => '2024-02-16 06:05:01',
            ),
            66 => 
            array (
                'id' => 1656,
                'presensi_id' => 105,
                'peserta_id' => 218,
                'sign' => '65cef7e80dfcf.png',
                'slug' => 'lzV7jPlYgl7bbXMltF2j',
                'created_at' => '2024-02-16 05:27:45',
                'updated_at' => '2024-02-16 05:51:36',
            ),
            67 => 
            array (
                'id' => 1657,
                'presensi_id' => 105,
                'peserta_id' => 98,
                'sign' => '65cef8024f021.png',
                'slug' => 'STlKLiwGKKZNovlMcTSQ',
                'created_at' => '2024-02-16 05:27:51',
                'updated_at' => '2024-02-16 05:52:02',
            ),
            68 => 
            array (
                'id' => 1658,
                'presensi_id' => 105,
                'peserta_id' => 92,
                'sign' => '65cef922ccdeb.png',
                'slug' => 'vimMx7XDCxgEp6IKBN8s',
                'created_at' => '2024-02-16 05:27:59',
                'updated_at' => '2024-02-16 05:56:50',
            ),
            69 => 
            array (
                'id' => 1659,
                'presensi_id' => 105,
                'peserta_id' => 25,
                'sign' => '65cefb8b3d2bc.png',
                'slug' => 'ON3qfRXTLsgAKfErGDsK',
                'created_at' => '2024-02-16 05:28:05',
                'updated_at' => '2024-02-16 06:07:07',
            ),
            70 => 
            array (
                'id' => 1660,
                'presensi_id' => 106,
                'peserta_id' => 5,
                'sign' => '65d59215d7a04.png',
                'slug' => 'kSXneqrqKrC5dOAbTnWE',
                'created_at' => '2024-02-21 04:48:39',
                'updated_at' => '2024-02-21 06:03:01',
            ),
            71 => 
            array (
                'id' => 1661,
                'presensi_id' => 106,
                'peserta_id' => 6,
                'sign' => '65d5f10cf1b72.png',
                'slug' => 'JsjAfd1fkwaAUEQqkNiN',
                'created_at' => '2024-02-21 04:49:13',
                'updated_at' => '2024-02-21 12:48:12',
            ),
            72 => 
            array (
                'id' => 1662,
                'presensi_id' => 106,
                'peserta_id' => 9,
                'sign' => '65d58ced3a1c6.png',
                'slug' => 'KozjhkHtNBU6PTA6cQmQ',
                'created_at' => '2024-02-21 04:49:39',
                'updated_at' => '2024-02-21 05:41:01',
            ),
            73 => 
            array (
                'id' => 1663,
                'presensi_id' => 106,
                'peserta_id' => 10,
                'sign' => '65d58d33b3642.png',
                'slug' => 'ku05sEtkMH6WiyFfQfZy',
                'created_at' => '2024-02-21 04:49:51',
                'updated_at' => '2024-02-21 05:42:11',
            ),
            74 => 
            array (
                'id' => 1664,
                'presensi_id' => 106,
                'peserta_id' => 52,
                'sign' => '65d592bc4235c.png',
                'slug' => 'WaEHpzkOX1NzcW5UztmF',
                'created_at' => '2024-02-21 04:50:02',
                'updated_at' => '2024-02-21 06:05:48',
            ),
            75 => 
            array (
                'id' => 1665,
                'presensi_id' => 106,
                'peserta_id' => 85,
                'sign' => '65d59308df844.png',
                'slug' => 'T450FqoZFnMEgNLmOIBM',
                'created_at' => '2024-02-21 04:50:06',
                'updated_at' => '2024-02-21 06:07:04',
            ),
            76 => 
            array (
                'id' => 1666,
                'presensi_id' => 106,
                'peserta_id' => 12,
                'sign' => '65d590de6a80c.png',
                'slug' => '7LYQnEYCXbSmOrqeHEh0',
                'created_at' => '2024-02-21 04:50:22',
                'updated_at' => '2024-02-21 05:57:50',
            ),
            77 => 
            array (
                'id' => 1667,
                'presensi_id' => 106,
                'peserta_id' => 107,
                'sign' => '65d5818b3395a.png',
                'slug' => 'pIdvfbCFJ1e0Jrba3v6R',
                'created_at' => '2024-02-21 04:50:27',
                'updated_at' => '2024-02-21 04:52:27',
            ),
            78 => 
            array (
                'id' => 1668,
                'presensi_id' => 106,
                'peserta_id' => 108,
                'sign' => '65d58d64e294d.png',
                'slug' => '71H6kwUf8XP3H6pgmNaH',
                'created_at' => '2024-02-21 04:50:40',
                'updated_at' => '2024-02-21 05:43:00',
            ),
            79 => 
            array (
                'id' => 1669,
                'presensi_id' => 106,
                'peserta_id' => 109,
                'sign' => '65d581850d349.png',
                'slug' => 'mCllzOAPnKp562lLKd5l',
                'created_at' => '2024-02-21 04:50:45',
                'updated_at' => '2024-02-21 04:52:21',
            ),
            80 => 
            array (
                'id' => 1670,
                'presensi_id' => 106,
                'peserta_id' => 21,
                'sign' => '65d58d91bb1db.png',
                'slug' => 'FDTuGWdc2xcW5JgVVbhu',
                'created_at' => '2024-02-21 04:50:51',
                'updated_at' => '2024-02-21 05:43:45',
            ),
            81 => 
            array (
                'id' => 1671,
                'presensi_id' => 106,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'r8WC2dA8xObx7LJmyC7c',
                'created_at' => '2024-02-21 04:50:56',
                'updated_at' => '2024-02-21 04:50:56',
            ),
            82 => 
            array (
                'id' => 1672,
                'presensi_id' => 106,
                'peserta_id' => 38,
                'sign' => '65d596b56b1f3.png',
                'slug' => 'ZsYusmmOjANgxgZS526V',
                'created_at' => '2024-02-21 04:51:00',
                'updated_at' => '2024-02-21 06:22:45',
            ),
            83 => 
            array (
                'id' => 1673,
                'presensi_id' => 106,
                'peserta_id' => 105,
                'sign' => '65d590e8def80.png',
                'slug' => 'edIdonKvqR6llcBiZXWo',
                'created_at' => '2024-02-21 04:51:17',
                'updated_at' => '2024-02-21 05:58:00',
            ),
            84 => 
            array (
                'id' => 1674,
                'presensi_id' => 106,
                'peserta_id' => 100,
                'sign' => '65d58e6a3b9bc.png',
                'slug' => 'wf63W3XpQmgwbAuoe9Jq',
                'created_at' => '2024-02-21 04:51:23',
                'updated_at' => '2024-02-21 05:47:22',
            ),
            85 => 
            array (
                'id' => 1675,
                'presensi_id' => 106,
                'peserta_id' => 40,
                'sign' => '65d58eeb7f383.png',
                'slug' => 'agFiddtmoIOkltf7wfLA',
                'created_at' => '2024-02-21 04:51:34',
                'updated_at' => '2024-02-21 05:49:31',
            ),
            86 => 
            array (
                'id' => 1676,
                'presensi_id' => 106,
                'peserta_id' => 27,
                'sign' => '65d5924738c5f.png',
                'slug' => '4UFcEmy8SmhYHiSijOva',
                'created_at' => '2024-02-21 04:51:47',
                'updated_at' => '2024-02-21 06:03:51',
            ),
            87 => 
            array (
                'id' => 1677,
                'presensi_id' => 106,
                'peserta_id' => 11,
                'sign' => '65d58dd550b84.png',
                'slug' => '9kdDd8dsqTugXrsHkcOQ',
                'created_at' => '2024-02-21 04:51:52',
                'updated_at' => '2024-02-21 05:44:53',
            ),
            88 => 
            array (
                'id' => 1678,
                'presensi_id' => 107,
                'peserta_id' => 114,
                'sign' => NULL,
                'slug' => 'xwd4JPJ1aal8OrBZnBCf',
                'created_at' => '2024-02-27 02:21:00',
                'updated_at' => '2024-02-27 02:21:00',
            ),
            89 => 
            array (
                'id' => 1679,
                'presensi_id' => 107,
                'peserta_id' => 19,
                'sign' => '65dd6bcb50820.png',
                'slug' => 'pO6jDJpQQdkdYx4sT91I',
                'created_at' => '2024-02-27 02:21:22',
                'updated_at' => '2024-02-27 04:57:47',
            ),
            90 => 
            array (
                'id' => 1680,
                'presensi_id' => 107,
                'peserta_id' => 16,
                'sign' => NULL,
                'slug' => 'Fcnuc1kvqmoOulRuZc7g',
                'created_at' => '2024-02-27 02:21:29',
                'updated_at' => '2024-02-27 02:21:29',
            ),
            91 => 
            array (
                'id' => 1681,
                'presensi_id' => 107,
                'peserta_id' => 62,
                'sign' => NULL,
                'slug' => 'a82IT5KdQkwEAOENXwoM',
                'created_at' => '2024-02-27 02:22:02',
                'updated_at' => '2024-02-27 02:22:02',
            ),
            92 => 
            array (
                'id' => 1682,
                'presensi_id' => 107,
                'peserta_id' => 24,
                'sign' => NULL,
                'slug' => 'IZMvzPZKxnOTZ72yE6Sa',
                'created_at' => '2024-02-27 02:22:08',
                'updated_at' => '2024-02-27 02:22:08',
            ),
            93 => 
            array (
                'id' => 1683,
                'presensi_id' => 107,
                'peserta_id' => 1,
                'sign' => NULL,
                'slug' => '0I4Ias4owLXv3p7KRGyz',
                'created_at' => '2024-02-27 02:22:20',
                'updated_at' => '2024-02-27 02:22:20',
            ),
            94 => 
            array (
                'id' => 1684,
                'presensi_id' => 107,
                'peserta_id' => 4,
                'sign' => NULL,
                'slug' => 'bsjk0alj4DAvIAAs2rUZ',
                'created_at' => '2024-02-27 02:22:30',
                'updated_at' => '2024-02-27 02:22:30',
            ),
            95 => 
            array (
                'id' => 1685,
                'presensi_id' => 107,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'ivExmw7g77OrhPCToY39',
                'created_at' => '2024-02-27 02:22:37',
                'updated_at' => '2024-02-27 02:22:37',
            ),
            96 => 
            array (
                'id' => 1686,
                'presensi_id' => 107,
                'peserta_id' => 18,
                'sign' => NULL,
                'slug' => 'PD8WVnWEeEg0onxVIYT6',
                'created_at' => '2024-02-27 02:22:45',
                'updated_at' => '2024-02-27 02:22:45',
            ),
            97 => 
            array (
                'id' => 1687,
                'presensi_id' => 107,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'Y9fhSJBoxdrysB5pA8RL',
                'created_at' => '2024-02-27 02:22:54',
                'updated_at' => '2024-02-27 02:22:54',
            ),
            98 => 
            array (
                'id' => 1688,
                'presensi_id' => 107,
                'peserta_id' => 77,
                'sign' => NULL,
                'slug' => 'tgdEGZRINKxSWqZJURcX',
                'created_at' => '2024-02-27 02:23:04',
                'updated_at' => '2024-02-27 02:23:04',
            ),
            99 => 
            array (
                'id' => 1689,
                'presensi_id' => 107,
                'peserta_id' => 33,
                'sign' => '65dd656fea669.png',
                'slug' => '6S01o3joZB2cfNVvGEWl',
                'created_at' => '2024-02-27 02:23:09',
                'updated_at' => '2024-02-27 04:30:39',
            ),
            100 => 
            array (
                'id' => 1690,
                'presensi_id' => 107,
                'peserta_id' => 20,
                'sign' => NULL,
                'slug' => 'TbOXl2kl6xSjG06MStvr',
                'created_at' => '2024-02-27 02:23:15',
                'updated_at' => '2024-02-27 02:23:15',
            ),
            101 => 
            array (
                'id' => 1691,
                'presensi_id' => 107,
                'peserta_id' => 27,
                'sign' => NULL,
                'slug' => 'aFobzirl0cR8r6v7OCui',
                'created_at' => '2024-02-27 02:23:21',
                'updated_at' => '2024-02-27 02:23:21',
            ),
            102 => 
            array (
                'id' => 1692,
                'presensi_id' => 107,
                'peserta_id' => 82,
                'sign' => NULL,
                'slug' => 'N9wkIrN4nKJgPPVKE4QI',
                'created_at' => '2024-02-27 02:23:29',
                'updated_at' => '2024-02-27 02:23:29',
            ),
            103 => 
            array (
                'id' => 1693,
                'presensi_id' => 107,
                'peserta_id' => 13,
                'sign' => NULL,
                'slug' => '3QMn0UNMlXpqcgKfP3w3',
                'created_at' => '2024-02-27 02:23:41',
                'updated_at' => '2024-02-27 02:23:41',
            ),
            104 => 
            array (
                'id' => 1694,
                'presensi_id' => 107,
                'peserta_id' => 56,
                'sign' => NULL,
                'slug' => 'mbdqprJrVeAXhRdLBzI7',
                'created_at' => '2024-02-27 02:23:54',
                'updated_at' => '2024-02-27 02:23:54',
            ),
            105 => 
            array (
                'id' => 1696,
                'presensi_id' => 107,
                'peserta_id' => 75,
                'sign' => NULL,
                'slug' => 'f64CoHk23od8VENNp6Od',
                'created_at' => '2024-02-27 02:24:10',
                'updated_at' => '2024-02-27 02:24:10',
            ),
            106 => 
            array (
                'id' => 1697,
                'presensi_id' => 107,
                'peserta_id' => 26,
                'sign' => NULL,
                'slug' => 'w5kj0zNMEKFWFFaA49Np',
                'created_at' => '2024-02-27 02:24:17',
                'updated_at' => '2024-02-27 02:24:17',
            ),
            107 => 
            array (
                'id' => 1698,
                'presensi_id' => 107,
                'peserta_id' => 32,
                'sign' => '65dd672d00707.png',
                'slug' => 'hsOftd65zYlWxFcPU5IS',
                'created_at' => '2024-02-27 02:24:23',
                'updated_at' => '2024-02-27 04:38:05',
            ),
            108 => 
            array (
                'id' => 1699,
                'presensi_id' => 107,
                'peserta_id' => 76,
                'sign' => NULL,
                'slug' => 'k8dckzaZGNp8cO1tX2r4',
                'created_at' => '2024-02-27 02:24:29',
                'updated_at' => '2024-02-27 02:24:29',
            ),
            109 => 
            array (
                'id' => 1700,
                'presensi_id' => 107,
                'peserta_id' => 66,
                'sign' => '65dd66a88fc40.png',
                'slug' => '7uj6RSY1HYvoc00OGMCu',
                'created_at' => '2024-02-27 02:25:01',
                'updated_at' => '2024-02-27 04:35:52',
            ),
            110 => 
            array (
                'id' => 1701,
                'presensi_id' => 107,
                'peserta_id' => 141,
                'sign' => NULL,
                'slug' => 'nxYYSXPeskxpNSCf4V7J',
                'created_at' => '2024-02-27 02:25:11',
                'updated_at' => '2024-02-27 02:25:11',
            ),
            111 => 
            array (
                'id' => 1702,
                'presensi_id' => 107,
                'peserta_id' => 15,
                'sign' => '65dd659675d53.png',
                'slug' => 'ltYriArDdXVL4y6H2z3o',
                'created_at' => '2024-02-27 04:23:17',
                'updated_at' => '2024-02-27 04:31:18',
            ),
            112 => 
            array (
                'id' => 1703,
                'presensi_id' => 107,
                'peserta_id' => 40,
                'sign' => '65dd64eee0163.png',
                'slug' => 'jgjDT6dZcdkUSqySgWy3',
                'created_at' => '2024-02-27 04:23:23',
                'updated_at' => '2024-02-27 04:28:30',
            ),
            113 => 
            array (
                'id' => 1704,
                'presensi_id' => 107,
                'peserta_id' => 38,
                'sign' => '65dd64c1c9797.png',
                'slug' => 'pfgTjXdIb5WxjYzFHRe0',
                'created_at' => '2024-02-27 04:24:48',
                'updated_at' => '2024-02-27 04:27:45',
            ),
            114 => 
            array (
                'id' => 1705,
                'presensi_id' => 107,
                'peserta_id' => 79,
                'sign' => '65dd64dc649bf.png',
                'slug' => 'JKzXNYclMk6aeC9QrRe8',
                'created_at' => '2024-02-27 04:24:54',
                'updated_at' => '2024-02-27 04:28:12',
            ),
            115 => 
            array (
                'id' => 1706,
                'presensi_id' => 108,
                'peserta_id' => 5,
                'sign' => '65e68923a0c78.png',
                'slug' => '7Z4qaQ664yojzRsYMWbN',
                'created_at' => '2024-03-05 01:18:43',
                'updated_at' => '2024-03-05 02:53:23',
            ),
            116 => 
            array (
                'id' => 1707,
                'presensi_id' => 108,
                'peserta_id' => 6,
                'sign' => '65e6a288cb7a3.png',
                'slug' => 'PPjqwL6TJMFTl9gkjTWR',
                'created_at' => '2024-03-05 01:19:06',
                'updated_at' => '2024-03-05 04:41:44',
            ),
            117 => 
            array (
                'id' => 1708,
                'presensi_id' => 108,
                'peserta_id' => 9,
                'sign' => '65e68d3539963.png',
                'slug' => 'sNsdVj4cmxcMNzyhJgMc',
                'created_at' => '2024-03-05 01:19:11',
                'updated_at' => '2024-03-05 03:10:45',
            ),
            118 => 
            array (
                'id' => 1709,
                'presensi_id' => 108,
                'peserta_id' => 10,
                'sign' => '65e6a23dec82c.png',
                'slug' => '1GOY3jsnbJYVj9dAt044',
                'created_at' => '2024-03-05 01:23:20',
                'updated_at' => '2024-03-05 04:40:29',
            ),
            119 => 
            array (
                'id' => 1710,
                'presensi_id' => 108,
                'peserta_id' => 52,
                'sign' => '65e6a01d95bad.png',
                'slug' => 'SQP92Akrgeox5F7zRucR',
                'created_at' => '2024-03-05 01:23:27',
                'updated_at' => '2024-03-05 04:31:25',
            ),
            120 => 
            array (
                'id' => 1711,
                'presensi_id' => 108,
                'peserta_id' => 85,
                'sign' => '65e69c6a9077b.png',
                'slug' => 'ypjVWKwf94TBbvzp1rz6',
                'created_at' => '2024-03-05 01:23:32',
                'updated_at' => '2024-03-05 04:15:38',
            ),
            121 => 
            array (
                'id' => 1712,
                'presensi_id' => 108,
                'peserta_id' => 12,
                'sign' => '65e6a0196b300.png',
                'slug' => 'QgDMkXlwvOUMfCtFZDK6',
                'created_at' => '2024-03-05 01:23:47',
                'updated_at' => '2024-03-05 04:31:21',
            ),
            122 => 
            array (
                'id' => 1713,
                'presensi_id' => 108,
                'peserta_id' => 107,
                'sign' => '65e68a2a7148f.png',
                'slug' => '4oMCsF1DZPokxfU6mH8I',
                'created_at' => '2024-03-05 01:23:53',
                'updated_at' => '2024-03-05 02:57:46',
            ),
            123 => 
            array (
                'id' => 1714,
                'presensi_id' => 108,
                'peserta_id' => 108,
                'sign' => '65e6a29613af2.png',
                'slug' => 'Uf4bXqxdObOOLtJOYbqG',
                'created_at' => '2024-03-05 01:23:57',
                'updated_at' => '2024-03-05 04:41:58',
            ),
            124 => 
            array (
                'id' => 1715,
                'presensi_id' => 108,
                'peserta_id' => 109,
                'sign' => '65e68a0eb835b.png',
                'slug' => '1MPPTeslK61aVGOWu7nM',
                'created_at' => '2024-03-05 01:24:02',
                'updated_at' => '2024-03-05 02:57:18',
            ),
            125 => 
            array (
                'id' => 1716,
                'presensi_id' => 108,
                'peserta_id' => 21,
                'sign' => '65e68c13ecfaf.png',
                'slug' => 'G9HNVkCYbpldWbSsNOIa',
                'created_at' => '2024-03-05 01:24:33',
                'updated_at' => '2024-03-05 03:05:55',
            ),
            126 => 
            array (
                'id' => 1717,
                'presensi_id' => 108,
                'peserta_id' => 38,
                'sign' => '65e692cae0c1d.png',
                'slug' => 'SQuh7VwiUfbm8bzEjkHR',
                'created_at' => '2024-03-05 01:24:39',
                'updated_at' => '2024-03-05 03:34:34',
            ),
            127 => 
            array (
                'id' => 1718,
                'presensi_id' => 108,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'xVDV5i1vZ8zvOhGwQiwg',
                'created_at' => '2024-03-05 01:24:55',
                'updated_at' => '2024-03-05 01:24:55',
            ),
            128 => 
            array (
                'id' => 1719,
                'presensi_id' => 108,
                'peserta_id' => 89,
                'sign' => '65e6898e3860a.png',
                'slug' => 'frJhuwovo9v6PA3IWRUD',
                'created_at' => '2024-03-05 01:25:02',
                'updated_at' => '2024-03-05 02:55:10',
            ),
            129 => 
            array (
                'id' => 1720,
                'presensi_id' => 108,
                'peserta_id' => 86,
                'sign' => '65e6898262e89.png',
                'slug' => 'HQW1Ov5kAPgrSIqjtewo',
                'created_at' => '2024-03-05 01:25:09',
                'updated_at' => '2024-03-05 02:54:58',
            ),
            130 => 
            array (
                'id' => 1721,
                'presensi_id' => 108,
                'peserta_id' => 91,
                'sign' => NULL,
                'slug' => 'vPQF0ljaOKQY96YzaSgK',
                'created_at' => '2024-03-05 01:25:15',
                'updated_at' => '2024-03-05 01:25:15',
            ),
            131 => 
            array (
                'id' => 1722,
                'presensi_id' => 108,
                'peserta_id' => 57,
                'sign' => '65e68a54449fa.png',
                'slug' => 'NRpGos5FUud55xnOm30j',
                'created_at' => '2024-03-05 01:25:20',
                'updated_at' => '2024-03-05 02:58:28',
            ),
            132 => 
            array (
                'id' => 1723,
                'presensi_id' => 108,
                'peserta_id' => 119,
                'sign' => NULL,
                'slug' => 'g63HCpNz0dSwQkaVFW34',
                'created_at' => '2024-03-05 01:25:28',
                'updated_at' => '2024-03-05 01:25:28',
            ),
            133 => 
            array (
                'id' => 1724,
                'presensi_id' => 108,
                'peserta_id' => 16,
                'sign' => '65e6a3fdcc7e6.png',
                'slug' => '4DUf9lVzQ4MxptWgzNsG',
                'created_at' => '2024-03-05 01:25:34',
                'updated_at' => '2024-03-05 04:47:57',
            ),
            134 => 
            array (
                'id' => 1725,
                'presensi_id' => 108,
                'peserta_id' => 8,
                'sign' => NULL,
                'slug' => 'DIEgRQI558MdI1cH6inF',
                'created_at' => '2024-03-05 01:25:41',
                'updated_at' => '2024-03-05 01:25:41',
            ),
            135 => 
            array (
                'id' => 1726,
                'presensi_id' => 108,
                'peserta_id' => 32,
                'sign' => '65e6996630e9f.png',
                'slug' => '6revAPjmhejAeTEBdK8L',
                'created_at' => '2024-03-05 01:25:47',
                'updated_at' => '2024-03-05 04:02:46',
            ),
            136 => 
            array (
                'id' => 1727,
                'presensi_id' => 108,
                'peserta_id' => 111,
                'sign' => '65e68e90e6c71.png',
                'slug' => '7YFN6pcdjBlsmjZMpSkj',
                'created_at' => '2024-03-05 01:28:07',
                'updated_at' => '2024-03-05 03:16:32',
            ),
            137 => 
            array (
                'id' => 1728,
                'presensi_id' => 108,
                'peserta_id' => 151,
                'sign' => '65e689f8c5ada.png',
                'slug' => 'ZQiEOgy7VM7szIgebINh',
                'created_at' => '2024-03-05 01:28:44',
                'updated_at' => '2024-03-05 02:56:56',
            ),
            138 => 
            array (
                'id' => 1729,
                'presensi_id' => 108,
                'peserta_id' => 100,
                'sign' => '65e68a4a61f1f.png',
                'slug' => 'vQkPDTtafDCDs4MMZXaD',
                'created_at' => '2024-03-05 01:30:10',
                'updated_at' => '2024-03-05 02:58:18',
            ),
            139 => 
            array (
                'id' => 1730,
                'presensi_id' => 108,
                'peserta_id' => 105,
                'sign' => '65e68a0b7abda.png',
                'slug' => 'OIFirNV8gfhy7Slw8k3w',
                'created_at' => '2024-03-05 01:30:16',
                'updated_at' => '2024-03-05 02:57:15',
            ),
            140 => 
            array (
                'id' => 1731,
                'presensi_id' => 109,
                'peserta_id' => 5,
                'sign' => '65e9699a0bb3b.png',
                'slug' => 'VgohCtVS7LeJD7guNUKK',
                'created_at' => '2024-03-06 03:08:45',
                'updated_at' => '2024-03-07 07:15:38',
            ),
            141 => 
            array (
                'id' => 1732,
                'presensi_id' => 109,
                'peserta_id' => 6,
                'sign' => '65e7fe192a416.png',
                'slug' => 'hnbXFdzUsMNEKkjAm6WL',
                'created_at' => '2024-03-06 03:08:56',
                'updated_at' => '2024-03-06 05:24:41',
            ),
            142 => 
            array (
                'id' => 1733,
                'presensi_id' => 109,
                'peserta_id' => 9,
                'sign' => '65e813ae1220a.png',
                'slug' => 'HLNq1SyCEF4d3A1xuitZ',
                'created_at' => '2024-03-06 03:09:02',
                'updated_at' => '2024-03-06 06:56:46',
            ),
            143 => 
            array (
                'id' => 1734,
                'presensi_id' => 109,
                'peserta_id' => 10,
                'sign' => '65e8045c7fb1a.png',
                'slug' => 'XOLhzpIY4fk7JknA7Kl0',
                'created_at' => '2024-03-06 03:09:07',
                'updated_at' => '2024-03-06 05:51:24',
            ),
            144 => 
            array (
                'id' => 1735,
                'presensi_id' => 109,
                'peserta_id' => 85,
                'sign' => '65e807c341dd9.png',
                'slug' => 'yxZffbVwhhEgASK9kBty',
                'created_at' => '2024-03-06 03:09:12',
                'updated_at' => '2024-03-06 06:05:55',
            ),
            145 => 
            array (
                'id' => 1736,
                'presensi_id' => 109,
                'peserta_id' => 52,
                'sign' => '65e8085252c75.png',
                'slug' => '1Geyit6j3j922sta05TX',
                'created_at' => '2024-03-06 03:09:44',
                'updated_at' => '2024-03-06 06:08:18',
            ),
            146 => 
            array (
                'id' => 1737,
                'presensi_id' => 109,
                'peserta_id' => 12,
                'sign' => '65e810ae1446a.png',
                'slug' => 'pCMSwHkW7PmsdPaACgz4',
                'created_at' => '2024-03-06 03:09:58',
                'updated_at' => '2024-03-06 06:43:58',
            ),
            147 => 
            array (
                'id' => 1738,
                'presensi_id' => 109,
                'peserta_id' => 107,
                'sign' => '65e7fe0a1f317.png',
                'slug' => '7W1PJeJCnfqE4pq0tYsH',
                'created_at' => '2024-03-06 03:10:03',
                'updated_at' => '2024-03-06 05:24:26',
            ),
            148 => 
            array (
                'id' => 1739,
                'presensi_id' => 109,
                'peserta_id' => 108,
                'sign' => '65e7fe225c8b0.png',
                'slug' => 'lAiEl12rxZa7QHCxMtss',
                'created_at' => '2024-03-06 03:10:08',
                'updated_at' => '2024-03-06 05:24:50',
            ),
            149 => 
            array (
                'id' => 1740,
                'presensi_id' => 109,
                'peserta_id' => 109,
                'sign' => '65e7fe1cd4672.png',
                'slug' => 'RnWa1bDaDYufX6lCBMlj',
                'created_at' => '2024-03-06 03:10:12',
                'updated_at' => '2024-03-06 05:24:44',
            ),
            150 => 
            array (
                'id' => 1741,
                'presensi_id' => 109,
                'peserta_id' => 11,
                'sign' => '65e7fe4dbd26d.png',
                'slug' => 'tD7V5wyzuBMfKfA71QkQ',
                'created_at' => '2024-03-06 03:10:16',
                'updated_at' => '2024-03-06 05:25:33',
            ),
            151 => 
            array (
                'id' => 1742,
                'presensi_id' => 109,
                'peserta_id' => 21,
                'sign' => '65e802bbdad46.png',
                'slug' => 'Q58uzQ6TrEuMVZxF5Ykm',
                'created_at' => '2024-03-06 03:10:21',
                'updated_at' => '2024-03-06 05:44:27',
            ),
            152 => 
            array (
                'id' => 1743,
                'presensi_id' => 109,
                'peserta_id' => 38,
                'sign' => NULL,
                'slug' => 'qD7iCBVIOVw58SNpazCe',
                'created_at' => '2024-03-06 03:10:25',
                'updated_at' => '2024-03-06 03:10:25',
            ),
            153 => 
            array (
                'id' => 1744,
                'presensi_id' => 109,
                'peserta_id' => 22,
                'sign' => '65e8003d58b29.png',
                'slug' => 'w5izXPjllMXSFBKV6Yps',
                'created_at' => '2024-03-06 03:10:29',
                'updated_at' => '2024-03-06 05:33:49',
            ),
            154 => 
            array (
                'id' => 1745,
                'presensi_id' => 109,
                'peserta_id' => 144,
                'sign' => '65e800e3ac826.png',
                'slug' => 'fjhLQPn4J1xXB0dU3V8x',
                'created_at' => '2024-03-06 03:10:35',
                'updated_at' => '2024-03-06 05:36:35',
            ),
            155 => 
            array (
                'id' => 1746,
                'presensi_id' => 109,
                'peserta_id' => 122,
                'sign' => '65e7ff67cf43b.png',
                'slug' => 'T1qApf3bJCuMoufHBbPM',
                'created_at' => '2024-03-06 03:10:45',
                'updated_at' => '2024-03-06 05:30:15',
            ),
            156 => 
            array (
                'id' => 1747,
                'presensi_id' => 109,
                'peserta_id' => 120,
                'sign' => NULL,
                'slug' => 'yDNc6KDPJxIKy4oGMaXt',
                'created_at' => '2024-03-06 03:10:49',
                'updated_at' => '2024-03-06 03:10:49',
            ),
            157 => 
            array (
                'id' => 1748,
                'presensi_id' => 109,
                'peserta_id' => 100,
                'sign' => NULL,
                'slug' => 'CHk2qlbToWSq2cxXD3bj',
                'created_at' => '2024-03-06 03:10:54',
                'updated_at' => '2024-03-06 03:10:54',
            ),
            158 => 
            array (
                'id' => 1749,
                'presensi_id' => 109,
                'peserta_id' => 105,
                'sign' => '65e80293343a0.png',
                'slug' => '7PKL6lYQwc8czjBMXuHd',
                'created_at' => '2024-03-06 03:10:59',
                'updated_at' => '2024-03-06 05:43:47',
            ),
            159 => 
            array (
                'id' => 1750,
                'presensi_id' => 109,
                'peserta_id' => 111,
                'sign' => '65e7fe8c427d7.png',
                'slug' => 'QXVeUWECPeIoqkksQ5EB',
                'created_at' => '2024-03-06 03:11:30',
                'updated_at' => '2024-03-06 05:26:36',
            ),
            160 => 
            array (
                'id' => 1751,
                'presensi_id' => 110,
                'peserta_id' => 25,
                'sign' => '65e9340248c8c.png',
                'slug' => 'RdeqDuBP4l7FscNtUCGk',
                'created_at' => '2024-03-07 03:20:46',
                'updated_at' => '2024-03-07 03:26:58',
            ),
            161 => 
            array (
                'id' => 1752,
                'presensi_id' => 110,
                'peserta_id' => 26,
                'sign' => '65e933d3c505b.png',
                'slug' => 'fCIZ5qcG5AhPCT7ugouj',
                'created_at' => '2024-03-07 03:21:29',
                'updated_at' => '2024-03-07 03:26:11',
            ),
            162 => 
            array (
                'id' => 1753,
                'presensi_id' => 110,
                'peserta_id' => 110,
                'sign' => '65e933386dfa9.png',
                'slug' => 'sUQ1agDJINAeCVTIoEHE',
                'created_at' => '2024-03-07 03:21:35',
                'updated_at' => '2024-03-07 03:23:36',
            ),
            163 => 
            array (
                'id' => 1754,
                'presensi_id' => 110,
                'peserta_id' => 31,
                'sign' => '65e93cdd26bcc.png',
                'slug' => 'ecbNAicFfuwGNQBuIUVu',
                'created_at' => '2024-03-07 03:21:43',
                'updated_at' => '2024-03-07 04:04:45',
            ),
            164 => 
            array (
                'id' => 1755,
                'presensi_id' => 110,
                'peserta_id' => 103,
                'sign' => '65e93387d326b.png',
                'slug' => 'X31NSobaVvRvsce6RInP',
                'created_at' => '2024-03-07 03:21:51',
                'updated_at' => '2024-03-07 03:24:55',
            ),
            165 => 
            array (
                'id' => 1756,
                'presensi_id' => 110,
                'peserta_id' => 29,
                'sign' => NULL,
                'slug' => 'zVUTcyQYdY1dfWd2VwfK',
                'created_at' => '2024-03-07 03:21:57',
                'updated_at' => '2024-03-07 03:21:57',
            ),
            166 => 
            array (
                'id' => 1757,
                'presensi_id' => 110,
                'peserta_id' => 97,
                'sign' => '65e9340163053.png',
                'slug' => 'LpR1PyNfEC5OSbFeM0Em',
                'created_at' => '2024-03-07 03:26:25',
                'updated_at' => '2024-03-07 03:26:57',
            ),
            167 => 
            array (
                'id' => 1758,
                'presensi_id' => 111,
                'peserta_id' => 5,
                'sign' => '65e9696fd1e6f.png',
                'slug' => 'awpqMlKerJPPSc4QoVL5',
                'created_at' => '2024-03-07 06:58:04',
                'updated_at' => '2024-03-07 07:14:55',
            ),
            168 => 
            array (
                'id' => 1759,
                'presensi_id' => 111,
                'peserta_id' => 6,
                'sign' => '65e9697fa671a.png',
                'slug' => 'gwwTy88iVk3XwK4SIh3P',
                'created_at' => '2024-03-07 06:58:11',
                'updated_at' => '2024-03-07 07:15:11',
            ),
            169 => 
            array (
                'id' => 1760,
                'presensi_id' => 111,
                'peserta_id' => 9,
                'sign' => '65e9696dc6700.png',
                'slug' => 'Ld6nEixZidXPenScdIDt',
                'created_at' => '2024-03-07 06:58:16',
                'updated_at' => '2024-03-07 07:14:53',
            ),
            170 => 
            array (
                'id' => 1761,
                'presensi_id' => 111,
                'peserta_id' => 10,
                'sign' => '65e96bbd1f8af.png',
                'slug' => 'LoOrT8ViLPG4EZWbPKUB',
                'created_at' => '2024-03-07 06:58:23',
                'updated_at' => '2024-03-07 07:24:45',
            ),
            171 => 
            array (
                'id' => 1762,
                'presensi_id' => 111,
                'peserta_id' => 85,
                'sign' => '65e96cea01901.png',
                'slug' => 'kxIhKIUsgOjxtMlvF5Vk',
                'created_at' => '2024-03-07 06:58:27',
                'updated_at' => '2024-03-07 07:29:46',
            ),
            172 => 
            array (
                'id' => 1763,
                'presensi_id' => 111,
                'peserta_id' => 52,
                'sign' => '65e96c6f3d48c.png',
                'slug' => '4mhj34rzDAscemtfRfSL',
                'created_at' => '2024-03-07 06:58:31',
                'updated_at' => '2024-03-07 07:27:43',
            ),
            173 => 
            array (
                'id' => 1764,
                'presensi_id' => 111,
                'peserta_id' => 12,
                'sign' => '65e969cab0f4c.png',
                'slug' => '2XGJmmUFoe04I7hJ3a48',
                'created_at' => '2024-03-07 06:58:39',
                'updated_at' => '2024-03-07 07:16:26',
            ),
            174 => 
            array (
                'id' => 1765,
                'presensi_id' => 111,
                'peserta_id' => 107,
                'sign' => '65e968ddd37d5.png',
                'slug' => 'O5IvMhjYKVFg1dfhe2lt',
                'created_at' => '2024-03-07 06:58:44',
                'updated_at' => '2024-03-07 07:12:29',
            ),
            175 => 
            array (
                'id' => 1766,
                'presensi_id' => 111,
                'peserta_id' => 108,
                'sign' => '65e96988cb343.png',
                'slug' => 'Yjl1TjamXuQVVrAhasWj',
                'created_at' => '2024-03-07 06:58:48',
                'updated_at' => '2024-03-07 07:15:20',
            ),
            176 => 
            array (
                'id' => 1767,
                'presensi_id' => 111,
                'peserta_id' => 109,
                'sign' => '65e96c892f416.png',
                'slug' => 'daHKN0Se7ji8ohQC8AHX',
                'created_at' => '2024-03-07 06:58:52',
                'updated_at' => '2024-03-07 07:28:09',
            ),
            177 => 
            array (
                'id' => 1768,
                'presensi_id' => 111,
                'peserta_id' => 21,
                'sign' => '65e96946d4212.png',
                'slug' => 'ccFMGpbIL8f3LKTgd7nV',
                'created_at' => '2024-03-07 06:58:57',
                'updated_at' => '2024-03-07 07:14:14',
            ),
            178 => 
            array (
                'id' => 1769,
                'presensi_id' => 111,
                'peserta_id' => 38,
                'sign' => '65e96c139214b.png',
                'slug' => 'uRuwaIrnJzlq6yagwTdX',
                'created_at' => '2024-03-07 06:59:01',
                'updated_at' => '2024-03-07 07:26:11',
            ),
            179 => 
            array (
                'id' => 1770,
                'presensi_id' => 111,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'kNeOvgLYKy4oyOB7muMD',
                'created_at' => '2024-03-07 06:59:05',
                'updated_at' => '2024-03-07 06:59:05',
            ),
            180 => 
            array (
                'id' => 1771,
                'presensi_id' => 111,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'gI7QIku1dAmgyfbVu5oJ',
                'created_at' => '2024-03-07 06:59:14',
                'updated_at' => '2024-03-07 06:59:14',
            ),
            181 => 
            array (
                'id' => 1772,
                'presensi_id' => 111,
                'peserta_id' => 175,
                'sign' => '65e9772cead00.png',
                'slug' => '3xBliZloNBVwQMQZ6jTl',
                'created_at' => '2024-03-07 06:59:19',
                'updated_at' => '2024-03-07 08:13:32',
            ),
            182 => 
            array (
                'id' => 1773,
                'presensi_id' => 111,
                'peserta_id' => 15,
                'sign' => '65e9710fac415.png',
                'slug' => 'FWsQFY0mgWq8EqxSl4Fc',
                'created_at' => '2024-03-07 07:02:35',
                'updated_at' => '2024-03-07 07:47:27',
            ),
            183 => 
            array (
                'id' => 1774,
                'presensi_id' => 111,
                'peserta_id' => 112,
                'sign' => '65e96b86c4f68.png',
                'slug' => 'Od6f1n6zBHIwd7ewZiWK',
                'created_at' => '2024-03-07 07:02:41',
                'updated_at' => '2024-03-07 07:23:50',
            ),
            184 => 
            array (
                'id' => 1775,
                'presensi_id' => 111,
                'peserta_id' => 98,
                'sign' => '65e96ed6da6c1.png',
                'slug' => 'fJBDHtJLbU4PPwvIsweU',
                'created_at' => '2024-03-07 07:02:51',
                'updated_at' => '2024-03-07 07:37:58',
            ),
            185 => 
            array (
                'id' => 1776,
                'presensi_id' => 111,
                'peserta_id' => 218,
                'sign' => '65e969b2335e4.png',
                'slug' => 'pKqh4M1beDqLy241GV1U',
                'created_at' => '2024-03-07 07:02:55',
                'updated_at' => '2024-03-07 07:16:02',
            ),
            186 => 
            array (
                'id' => 1777,
                'presensi_id' => 111,
                'peserta_id' => 105,
                'sign' => '65e96b14e2f13.png',
                'slug' => 'psuqAlCgCVbO8QDhZPcV',
                'created_at' => '2024-03-07 07:03:00',
                'updated_at' => '2024-03-07 07:21:56',
            ),
            187 => 
            array (
                'id' => 1778,
                'presensi_id' => 111,
                'peserta_id' => 100,
                'sign' => '65e968d52d1d1.png',
                'slug' => 'yrRyIUcqWfXAIEeb0bag',
                'created_at' => '2024-03-07 07:03:09',
                'updated_at' => '2024-03-07 07:12:21',
            ),
            188 => 
            array (
                'id' => 1779,
                'presensi_id' => 111,
                'peserta_id' => 221,
                'sign' => NULL,
                'slug' => 'JjceDkb5jypjDF3LR5IO',
                'created_at' => '2024-03-07 07:08:34',
                'updated_at' => '2024-03-07 07:08:34',
            ),
            189 => 
            array (
                'id' => 1780,
                'presensi_id' => 111,
                'peserta_id' => 11,
                'sign' => '65e969d4d2792.png',
                'slug' => 'Tu54MnUSeOgk3CHnvnbp',
                'created_at' => '2024-03-07 07:14:36',
                'updated_at' => '2024-03-07 07:16:36',
            ),
            190 => 
            array (
                'id' => 1781,
                'presensi_id' => 112,
                'peserta_id' => 5,
                'sign' => '65f157f7e8ba3.png',
                'slug' => 'o1KRtJKS00LJ04qjsT2E',
                'created_at' => '2024-03-13 05:59:09',
                'updated_at' => '2024-03-13 07:38:31',
            ),
            191 => 
            array (
                'id' => 1782,
                'presensi_id' => 112,
                'peserta_id' => 6,
                'sign' => '65f157df3d20e.png',
                'slug' => 'L1as8bnNfxaYmH7i9ArI',
                'created_at' => '2024-03-13 05:59:49',
                'updated_at' => '2024-03-13 07:38:07',
            ),
            192 => 
            array (
                'id' => 1783,
                'presensi_id' => 112,
                'peserta_id' => 9,
                'sign' => '65f15bfb15bdf.png',
                'slug' => 'VY7dCheWYMgMnnl9psDB',
                'created_at' => '2024-03-13 05:59:53',
                'updated_at' => '2024-03-13 07:55:39',
            ),
            193 => 
            array (
                'id' => 1784,
                'presensi_id' => 112,
                'peserta_id' => 10,
                'sign' => '65f15896883c2.png',
                'slug' => 'RKbV9LacLaEvGvhNzHqW',
                'created_at' => '2024-03-13 05:59:59',
                'updated_at' => '2024-03-13 07:41:10',
            ),
            194 => 
            array (
                'id' => 1785,
                'presensi_id' => 112,
                'peserta_id' => 85,
                'sign' => '65f15684729bd.png',
                'slug' => 'D9aubxW3Y1se9ntkpXzy',
                'created_at' => '2024-03-13 06:00:03',
                'updated_at' => '2024-03-13 07:32:20',
            ),
            195 => 
            array (
                'id' => 1786,
                'presensi_id' => 112,
                'peserta_id' => 52,
                'sign' => '65f156de5c7af.png',
                'slug' => 'ir3m3RnwnMnhJKU8gFly',
                'created_at' => '2024-03-13 06:00:07',
                'updated_at' => '2024-03-13 07:33:50',
            ),
            196 => 
            array (
                'id' => 1787,
                'presensi_id' => 112,
                'peserta_id' => 12,
                'sign' => '65f156876ed18.png',
                'slug' => 'UJx4jHMWq5y6wghHpdpi',
                'created_at' => '2024-03-13 06:00:12',
                'updated_at' => '2024-03-13 07:32:23',
            ),
            197 => 
            array (
                'id' => 1788,
                'presensi_id' => 112,
                'peserta_id' => 107,
                'sign' => '65f1568feb230.png',
                'slug' => 'Zn8GN1IOYDGfSDbO3TYU',
                'created_at' => '2024-03-13 06:00:16',
                'updated_at' => '2024-03-13 07:32:31',
            ),
            198 => 
            array (
                'id' => 1789,
                'presensi_id' => 112,
                'peserta_id' => 109,
                'sign' => '65f15690855fd.png',
                'slug' => '3TeLBFXgOMufL7D0SWRS',
                'created_at' => '2024-03-13 06:00:20',
                'updated_at' => '2024-03-13 07:32:32',
            ),
            199 => 
            array (
                'id' => 1790,
                'presensi_id' => 112,
                'peserta_id' => 40,
                'sign' => '65f156f9d3c4e.png',
                'slug' => 'djbcllW1XLxJOD49DsUS',
                'created_at' => '2024-03-13 06:00:56',
                'updated_at' => '2024-03-13 07:34:17',
            ),
            200 => 
            array (
                'id' => 1791,
                'presensi_id' => 112,
                'peserta_id' => 103,
                'sign' => '65f156d8b6228.png',
                'slug' => '9DMclFnqvRpv0WHzGgGz',
                'created_at' => '2024-03-13 06:01:05',
                'updated_at' => '2024-03-13 07:33:44',
            ),
            201 => 
            array (
                'id' => 1792,
                'presensi_id' => 112,
                'peserta_id' => 98,
                'sign' => '65f16185b4afc.png',
                'slug' => 'CABnyC10zV1eEIZhfVU1',
                'created_at' => '2024-03-13 06:01:15',
                'updated_at' => '2024-03-13 08:19:17',
            ),
            202 => 
            array (
                'id' => 1793,
                'presensi_id' => 112,
                'peserta_id' => 105,
                'sign' => '65f157433d141.png',
                'slug' => 'Q1Jairh08JxRbdlTkElC',
                'created_at' => '2024-03-13 06:01:20',
                'updated_at' => '2024-03-13 07:35:31',
            ),
            203 => 
            array (
                'id' => 1794,
                'presensi_id' => 113,
                'peserta_id' => 5,
                'sign' => '6625ec7a43192.png',
                'slug' => 'CXuHn8swkfQ5u9ndVhyg',
                'created_at' => '2024-03-19 07:03:18',
                'updated_at' => '2024-04-22 04:50:02',
            ),
            204 => 
            array (
                'id' => 1795,
                'presensi_id' => 113,
                'peserta_id' => 10,
                'sign' => '6625ec8ef328c.png',
                'slug' => 'NyeWvkUpNwtIUKVs1ong',
                'created_at' => '2024-03-19 07:03:31',
                'updated_at' => '2024-04-22 04:50:22',
            ),
            205 => 
            array (
                'id' => 1796,
                'presensi_id' => 113,
                'peserta_id' => 52,
                'sign' => '6625ecc3bc77e.png',
                'slug' => 'SiRTKtZLYHIXl1kY6NZS',
                'created_at' => '2024-03-19 07:03:38',
                'updated_at' => '2024-04-22 04:51:15',
            ),
            206 => 
            array (
                'id' => 1797,
                'presensi_id' => 113,
                'peserta_id' => 12,
                'sign' => '6625ecb43ebb1.png',
                'slug' => 'zZP1V5lhicyusYvwRtet',
                'created_at' => '2024-03-19 07:04:12',
                'updated_at' => '2024-04-22 04:51:00',
            ),
            207 => 
            array (
                'id' => 1798,
                'presensi_id' => 113,
                'peserta_id' => 9,
                'sign' => '6625ec9dafc6b.png',
                'slug' => 'Gg8bLWyRnq6zEhgXVNFE',
                'created_at' => '2024-03-19 07:04:16',
                'updated_at' => '2024-04-22 04:50:37',
            ),
            208 => 
            array (
                'id' => 1799,
                'presensi_id' => 113,
                'peserta_id' => 107,
                'sign' => '6625ecd503601.png',
                'slug' => '2JhYYzTeTIZlJM1utysw',
                'created_at' => '2024-03-19 07:04:21',
                'updated_at' => '2024-04-22 04:51:33',
            ),
            209 => 
            array (
                'id' => 1800,
                'presensi_id' => 113,
                'peserta_id' => 109,
                'sign' => '6625eca97fed3.png',
                'slug' => '7mG2itJQm94pbAuAKqOY',
                'created_at' => '2024-03-19 07:05:50',
                'updated_at' => '2024-04-22 04:50:49',
            ),
            210 => 
            array (
                'id' => 1801,
                'presensi_id' => 113,
                'peserta_id' => 98,
                'sign' => '6625ed43b67a8.png',
                'slug' => '77NkCCa5l0oYgWhpbsv5',
                'created_at' => '2024-03-19 07:05:58',
                'updated_at' => '2024-04-22 04:53:23',
            ),
            211 => 
            array (
                'id' => 1802,
                'presensi_id' => 113,
                'peserta_id' => 218,
                'sign' => '6625ed61ca1a2.png',
                'slug' => 'uVi7yIUqt4eaKWG0QEGK',
                'created_at' => '2024-03-19 07:06:28',
                'updated_at' => '2024-04-22 04:53:53',
            ),
            212 => 
            array (
                'id' => 1803,
                'presensi_id' => 114,
                'peserta_id' => 5,
                'sign' => '65fa5671a0ee7.png',
                'slug' => 'luzORhEB2q9GEor597qj',
                'created_at' => '2024-03-20 03:09:38',
                'updated_at' => '2024-03-20 03:22:25',
            ),
            213 => 
            array (
                'id' => 1804,
                'presensi_id' => 114,
                'peserta_id' => 52,
                'sign' => '65fa562a193e0.png',
                'slug' => 'SJ9eevcnHM62admlZHFc',
                'created_at' => '2024-03-20 03:18:18',
                'updated_at' => '2024-03-20 03:21:14',
            ),
            214 => 
            array (
                'id' => 1805,
                'presensi_id' => 114,
                'peserta_id' => 10,
                'sign' => '65fa562ac7328.png',
                'slug' => 'oOY1Fx4j7sqdSkNla6QT',
                'created_at' => '2024-03-20 03:18:23',
                'updated_at' => '2024-03-20 03:21:14',
            ),
            215 => 
            array (
                'id' => 1806,
                'presensi_id' => 114,
                'peserta_id' => 12,
                'sign' => '65fa56412b28d.png',
                'slug' => 'xxTIT5epteaN6Xeztkd7',
                'created_at' => '2024-03-20 03:18:27',
                'updated_at' => '2024-03-20 03:21:37',
            ),
            216 => 
            array (
                'id' => 1807,
                'presensi_id' => 114,
                'peserta_id' => 107,
                'sign' => '65fa5634413b5.png',
                'slug' => 'yFQTL2AngbQOp2qfqp83',
                'created_at' => '2024-03-20 03:18:32',
                'updated_at' => '2024-03-20 03:21:24',
            ),
            217 => 
            array (
                'id' => 1808,
                'presensi_id' => 114,
                'peserta_id' => 109,
                'sign' => '65fa5a40dcb5e.png',
                'slug' => 'nyyK4IY6vTokRtMM3ijH',
                'created_at' => '2024-03-20 03:18:37',
                'updated_at' => '2024-03-20 03:38:40',
            ),
            218 => 
            array (
                'id' => 1809,
                'presensi_id' => 114,
                'peserta_id' => 38,
                'sign' => '65fa85d568dca.png',
                'slug' => '6Bj3UKlexBsqD06zQkM6',
                'created_at' => '2024-03-20 03:18:41',
                'updated_at' => '2024-03-20 06:44:37',
            ),
            219 => 
            array (
                'id' => 1810,
                'presensi_id' => 114,
                'peserta_id' => 40,
                'sign' => '65fa5911b40ef.png',
                'slug' => 'SX9U2hDw5SONvw2X7Z4o',
                'created_at' => '2024-03-20 03:18:49',
                'updated_at' => '2024-03-20 03:33:37',
            ),
            220 => 
            array (
                'id' => 1811,
                'presensi_id' => 114,
                'peserta_id' => 47,
                'sign' => '65fa5b7dcddbd.png',
                'slug' => '18qYRMYsgInQjZ1J6Dvr',
                'created_at' => '2024-03-20 03:18:53',
                'updated_at' => '2024-03-20 03:43:57',
            ),
            221 => 
            array (
                'id' => 1812,
                'presensi_id' => 114,
                'peserta_id' => 48,
                'sign' => '65fa721ce8bb2.png',
                'slug' => 'Z0PlFkrk2iTlY8zIWNU3',
                'created_at' => '2024-03-20 03:18:58',
                'updated_at' => '2024-03-20 05:20:28',
            ),
            222 => 
            array (
                'id' => 1813,
                'presensi_id' => 114,
                'peserta_id' => 158,
                'sign' => '65fa5b5988108.png',
                'slug' => 'gRXhkYxibU5QcIifG3wU',
                'created_at' => '2024-03-20 03:19:05',
                'updated_at' => '2024-03-20 03:43:21',
            ),
            223 => 
            array (
                'id' => 1814,
                'presensi_id' => 114,
                'peserta_id' => 49,
                'sign' => '65fa58b17a80e.png',
                'slug' => 'jzvtx9HDv0bWhbY1Uap5',
                'created_at' => '2024-03-20 03:27:37',
                'updated_at' => '2024-03-20 03:32:01',
            ),
            224 => 
            array (
                'id' => 1815,
                'presensi_id' => 114,
                'peserta_id' => 9,
                'sign' => '65fa6806b14c7.png',
                'slug' => 'IePo8sFB6a4EwfigycnE',
                'created_at' => '2024-03-20 04:36:46',
                'updated_at' => '2024-03-20 04:37:26',
            ),
            225 => 
            array (
                'id' => 1816,
                'presensi_id' => 115,
                'peserta_id' => 5,
                'sign' => '65fbd2a027656.png',
                'slug' => 'FPREXTnJfFPWomd5tvao',
                'created_at' => '2024-03-21 03:51:14',
                'updated_at' => '2024-03-21 06:24:32',
            ),
            226 => 
            array (
                'id' => 1817,
                'presensi_id' => 115,
                'peserta_id' => 52,
                'sign' => '65fbd2cc384f6.png',
                'slug' => '7pYDVmeycZavWHu44vaw',
                'created_at' => '2024-03-21 03:52:26',
                'updated_at' => '2024-03-21 06:25:16',
            ),
            227 => 
            array (
                'id' => 1818,
                'presensi_id' => 115,
                'peserta_id' => 12,
                'sign' => '65fbd30f7901e.png',
                'slug' => 'TOsaaGG6ZANSNA2vx4pQ',
                'created_at' => '2024-03-21 03:53:23',
                'updated_at' => '2024-03-21 06:26:23',
            ),
            228 => 
            array (
                'id' => 1819,
                'presensi_id' => 115,
                'peserta_id' => 107,
                'sign' => '65fbd2db9f6be.png',
                'slug' => 'DppR1rdhlw3UaIdZ4pzd',
                'created_at' => '2024-03-21 03:53:29',
                'updated_at' => '2024-03-21 06:25:31',
            ),
            229 => 
            array (
                'id' => 1820,
                'presensi_id' => 115,
                'peserta_id' => 109,
                'sign' => '65fbda773d540.png',
                'slug' => 'tSWQVxroZfCJ6yDMv1UM',
                'created_at' => '2024-03-21 03:53:35',
                'updated_at' => '2024-03-21 06:57:59',
            ),
            230 => 
            array (
                'id' => 1821,
                'presensi_id' => 115,
                'peserta_id' => 98,
                'sign' => '65fbe141b6a30.png',
                'slug' => 'pUMsCTqR3mtvaTSFIdcR',
                'created_at' => '2024-03-21 03:54:10',
                'updated_at' => '2024-03-21 07:26:57',
            ),
            231 => 
            array (
                'id' => 1822,
                'presensi_id' => 115,
                'peserta_id' => 218,
                'sign' => '65fbd339f0a11.png',
                'slug' => 'gXUWkefsKnZvP5oA6vIl',
                'created_at' => '2024-03-21 03:54:16',
                'updated_at' => '2024-03-21 06:27:05',
            ),
            232 => 
            array (
                'id' => 1823,
                'presensi_id' => 115,
                'peserta_id' => 83,
                'sign' => '660227a2b14ef.png',
                'slug' => 'CQiWDvjeXodgAfelFjEf',
                'created_at' => '2024-03-21 03:54:21',
                'updated_at' => '2024-03-26 01:40:50',
            ),
            233 => 
            array (
                'id' => 1824,
                'presensi_id' => 115,
                'peserta_id' => 77,
                'sign' => NULL,
                'slug' => 'f1pUgUXUZcEIb54Eja6V',
                'created_at' => '2024-03-21 03:54:27',
                'updated_at' => '2024-03-21 03:54:27',
            ),
            234 => 
            array (
                'id' => 1825,
                'presensi_id' => 115,
                'peserta_id' => 105,
                'sign' => '65fbe6a1b1b69.png',
                'slug' => 'tBHwsVTwBtDLthyeqC4w',
                'created_at' => '2024-03-21 03:54:33',
                'updated_at' => '2024-03-21 07:49:53',
            ),
            235 => 
            array (
                'id' => 1826,
                'presensi_id' => 115,
                'peserta_id' => 9,
                'sign' => '65fbd45ae6d97.png',
                'slug' => 'gOFDRpJZI9a2JDxPXaMV',
                'created_at' => '2024-03-21 06:24:41',
                'updated_at' => '2024-03-21 06:31:54',
            ),
            236 => 
            array (
                'id' => 1827,
                'presensi_id' => 116,
                'peserta_id' => 5,
                'sign' => '65fcf7f52f1d6.png',
                'slug' => 'Ium65r1y5T9aKB9suPV0',
                'created_at' => '2024-03-22 02:37:50',
                'updated_at' => '2024-03-22 03:16:05',
            ),
            237 => 
            array (
                'id' => 1828,
                'presensi_id' => 116,
                'peserta_id' => 9,
                'sign' => '65fcf7eebc01f.png',
                'slug' => 'zagWdMwGBSOkIlvpw6Ei',
                'created_at' => '2024-03-22 02:38:52',
                'updated_at' => '2024-03-22 03:15:58',
            ),
            238 => 
            array (
                'id' => 1829,
                'presensi_id' => 116,
                'peserta_id' => 10,
                'sign' => '65fcf815af1c3.png',
                'slug' => 'famaJ8SgJErmVeprxo3D',
                'created_at' => '2024-03-22 02:57:14',
                'updated_at' => '2024-03-22 03:16:37',
            ),
            239 => 
            array (
                'id' => 1830,
                'presensi_id' => 116,
                'peserta_id' => 12,
                'sign' => '65fcfb50325d8.png',
                'slug' => '1mMlpyUmPnf0nZvdF5mx',
                'created_at' => '2024-03-22 02:57:20',
                'updated_at' => '2024-03-22 03:30:24',
            ),
            240 => 
            array (
                'id' => 1831,
                'presensi_id' => 116,
                'peserta_id' => 107,
                'sign' => '65fcf88370b14.png',
                'slug' => 'GaWEqlkP6jSOk3w4eU7Q',
                'created_at' => '2024-03-22 02:57:24',
                'updated_at' => '2024-03-22 03:18:27',
            ),
            241 => 
            array (
                'id' => 1832,
                'presensi_id' => 116,
                'peserta_id' => 109,
                'sign' => '65fd084f66010.png',
                'slug' => 'EQqNPYrfw2JEqx8iv5HP',
                'created_at' => '2024-03-22 02:57:29',
                'updated_at' => '2024-03-22 04:25:51',
            ),
            242 => 
            array (
                'id' => 1833,
                'presensi_id' => 116,
                'peserta_id' => 81,
                'sign' => '65fd0955a2536.png',
                'slug' => 'wa6e0cViXOthNe40D1bv',
                'created_at' => '2024-03-22 03:01:13',
                'updated_at' => '2024-03-22 04:30:13',
            ),
            243 => 
            array (
                'id' => 1834,
                'presensi_id' => 116,
                'peserta_id' => 151,
                'sign' => '65fcf901ea1c1.png',
                'slug' => 'vTmGD3gopFYfeK01zCSE',
                'created_at' => '2024-03-22 03:01:20',
                'updated_at' => '2024-03-22 03:20:33',
            ),
            244 => 
            array (
                'id' => 1835,
                'presensi_id' => 116,
                'peserta_id' => 111,
                'sign' => '65fcf8dc4960b.png',
                'slug' => 'qoqbcc0DPDhTCXP2aWlU',
                'created_at' => '2024-03-22 03:01:25',
                'updated_at' => '2024-03-22 03:19:56',
            ),
            245 => 
            array (
                'id' => 1836,
                'presensi_id' => 116,
                'peserta_id' => 98,
                'sign' => '65fcf877ab089.png',
                'slug' => 'q97UIp6tsTlg516KzMdW',
                'created_at' => '2024-03-22 03:01:31',
                'updated_at' => '2024-03-22 03:18:15',
            ),
            246 => 
            array (
                'id' => 1837,
                'presensi_id' => 116,
                'peserta_id' => 100,
                'sign' => '65fcf8dfa5f1b.png',
                'slug' => 'kXNOAuby5mzj13C2gghJ',
                'created_at' => '2024-03-22 03:01:37',
                'updated_at' => '2024-03-22 03:19:59',
            ),
            247 => 
            array (
                'id' => 1838,
                'presensi_id' => 116,
                'peserta_id' => 13,
                'sign' => NULL,
                'slug' => 'QOK6ViqZpUSjOuz84LC9',
                'created_at' => '2024-03-22 03:04:59',
                'updated_at' => '2024-03-22 03:04:59',
            ),
            248 => 
            array (
                'id' => 1839,
                'presensi_id' => 116,
                'peserta_id' => 75,
                'sign' => '65fd19ae0bbed.png',
                'slug' => 'PEp2EoNbNqkrphXV8HJw',
                'created_at' => '2024-03-22 03:05:05',
                'updated_at' => '2024-03-22 05:39:58',
            ),
            249 => 
            array (
                'id' => 1840,
                'presensi_id' => 116,
                'peserta_id' => 105,
                'sign' => '65fcf98ca4848.png',
                'slug' => 'rdfk5RJmJHEdN7gp6rYC',
                'created_at' => '2024-03-22 03:05:12',
                'updated_at' => '2024-03-22 03:22:52',
            ),
            250 => 
            array (
                'id' => 1841,
                'presensi_id' => 116,
                'peserta_id' => 85,
                'sign' => '65fcf8b2b69b1.png',
                'slug' => 'WQFGWRFB8OWl3cbqm1qY',
                'created_at' => '2024-03-22 03:17:45',
                'updated_at' => '2024-03-22 03:19:14',
            ),
            251 => 
            array (
                'id' => 1842,
                'presensi_id' => 116,
                'peserta_id' => 218,
                'sign' => '65fcf8a2ef24f.png',
                'slug' => 'dZkbdqqpsyHx4VIEKPEP',
                'created_at' => '2024-03-22 03:18:09',
                'updated_at' => '2024-03-22 03:18:58',
            ),
            252 => 
            array (
                'id' => 1843,
                'presensi_id' => 117,
                'peserta_id' => 5,
                'sign' => '66052af65e70c.png',
                'slug' => 'PgTBilYlFyFBbrYFrPJi',
                'created_at' => '2024-03-28 05:30:53',
                'updated_at' => '2024-03-28 08:31:50',
            ),
            253 => 
            array (
                'id' => 1844,
                'presensi_id' => 117,
                'peserta_id' => 9,
                'sign' => '660525d702688.png',
                'slug' => 'XQfGQ42UhkafBFDI6ol6',
                'created_at' => '2024-03-28 08:06:28',
                'updated_at' => '2024-03-28 08:09:59',
            ),
            254 => 
            array (
                'id' => 1845,
                'presensi_id' => 117,
                'peserta_id' => 10,
                'sign' => '660559ab9575c.png',
                'slug' => 'ni7JosmCuziCCQtCO92C',
                'created_at' => '2024-03-28 08:06:33',
                'updated_at' => '2024-03-28 11:51:07',
            ),
            255 => 
            array (
                'id' => 1846,
                'presensi_id' => 117,
                'peserta_id' => 12,
                'sign' => '660526ba9d1cb.png',
                'slug' => '1TG2BdK0we79m2vw2jX8',
                'created_at' => '2024-03-28 08:06:37',
                'updated_at' => '2024-03-28 08:13:46',
            ),
            256 => 
            array (
                'id' => 1847,
                'presensi_id' => 117,
                'peserta_id' => 52,
                'sign' => '66052659b58ac.png',
                'slug' => 'etIiFeIyM6gWO0F4TVHA',
                'created_at' => '2024-03-28 08:06:44',
                'updated_at' => '2024-03-28 08:12:09',
            ),
            257 => 
            array (
                'id' => 1848,
                'presensi_id' => 117,
                'peserta_id' => 85,
                'sign' => '660528373bbed.png',
                'slug' => 'pFTlKXPWZ4R3TyOBeZy5',
                'created_at' => '2024-03-28 08:06:50',
                'updated_at' => '2024-03-28 08:20:07',
            ),
            258 => 
            array (
                'id' => 1849,
                'presensi_id' => 117,
                'peserta_id' => 107,
                'sign' => '660525d66fcd5.png',
                'slug' => 'LSHkQO6iZdUJV5vMkIVn',
                'created_at' => '2024-03-28 08:06:54',
                'updated_at' => '2024-03-28 08:09:58',
            ),
            259 => 
            array (
                'id' => 1850,
                'presensi_id' => 117,
                'peserta_id' => 109,
                'sign' => '6605268f1b5de.png',
                'slug' => 'JQrW1ugWhsIS6BhdiSeO',
                'created_at' => '2024-03-28 08:06:59',
                'updated_at' => '2024-03-28 08:13:03',
            ),
            260 => 
            array (
                'id' => 1851,
                'presensi_id' => 117,
                'peserta_id' => 98,
                'sign' => '660527dbba642.png',
                'slug' => 'JBpvef7bznEn10f4EUVG',
                'created_at' => '2024-03-28 08:07:14',
                'updated_at' => '2024-03-28 08:18:35',
            ),
            261 => 
            array (
                'id' => 1852,
                'presensi_id' => 117,
                'peserta_id' => 218,
                'sign' => '6605294dad86f.png',
                'slug' => 'sp0NsP8p6netdKRt3TrM',
                'created_at' => '2024-03-28 08:07:25',
                'updated_at' => '2024-03-28 08:24:45',
            ),
            262 => 
            array (
                'id' => 1853,
                'presensi_id' => 117,
                'peserta_id' => 105,
                'sign' => NULL,
                'slug' => 'POD7TbSlheEWIAUGJDQg',
                'created_at' => '2024-03-28 08:07:34',
                'updated_at' => '2024-03-28 08:07:34',
            ),
            263 => 
            array (
                'id' => 1854,
                'presensi_id' => 117,
                'peserta_id' => 100,
                'sign' => '66052cc745652.png',
                'slug' => 'vqSDJ46ykrYQopkeb3yk',
                'created_at' => '2024-03-28 08:07:38',
                'updated_at' => '2024-03-28 08:39:35',
            ),
            264 => 
            array (
                'id' => 1855,
                'presensi_id' => 117,
                'peserta_id' => 4,
                'sign' => '660528be65b5c.png',
                'slug' => '0F3KjB5ngHR0i84HzxIj',
                'created_at' => '2024-03-28 08:07:43',
                'updated_at' => '2024-03-28 08:22:22',
            ),
            265 => 
            array (
                'id' => 1856,
                'presensi_id' => 117,
                'peserta_id' => 123,
                'sign' => NULL,
                'slug' => 'C5BAcmouFPNsORcpY2Cx',
                'created_at' => '2024-03-28 08:07:47',
                'updated_at' => '2024-03-28 08:07:47',
            ),
            266 => 
            array (
                'id' => 1857,
                'presensi_id' => 117,
                'peserta_id' => 126,
                'sign' => '66052a0c2c3a8.png',
                'slug' => 'RfGfNbVFVoKnOM0Shx5d',
                'created_at' => '2024-03-28 08:07:54',
                'updated_at' => '2024-03-28 08:27:56',
            ),
            267 => 
            array (
                'id' => 1858,
                'presensi_id' => 117,
                'peserta_id' => 124,
                'sign' => NULL,
                'slug' => 'OQ1ysDQMfja0B5iGNrf1',
                'created_at' => '2024-03-28 08:07:58',
                'updated_at' => '2024-03-28 08:07:58',
            ),
            268 => 
            array (
                'id' => 1859,
                'presensi_id' => 118,
                'peserta_id' => 5,
                'sign' => '660a2a9317c32.png',
                'slug' => 'LJ8zgu0iLnFVCPk4DXwY',
                'created_at' => '2024-04-01 03:14:11',
                'updated_at' => '2024-04-01 03:31:31',
            ),
            269 => 
            array (
                'id' => 1860,
                'presensi_id' => 118,
                'peserta_id' => 52,
                'sign' => '660a29de9699d.png',
                'slug' => 'xOOq5lKmMr7edHDwQASm',
                'created_at' => '2024-04-01 03:16:00',
                'updated_at' => '2024-04-01 03:28:30',
            ),
            270 => 
            array (
                'id' => 1861,
                'presensi_id' => 118,
                'peserta_id' => 85,
                'sign' => '660a345b538b8.png',
                'slug' => '4BRZ4zjlcpHwc1DFFMrO',
                'created_at' => '2024-04-01 03:16:03',
                'updated_at' => '2024-04-01 04:13:15',
            ),
            271 => 
            array (
                'id' => 1862,
                'presensi_id' => 118,
                'peserta_id' => 107,
                'sign' => '660a27728495a.png',
                'slug' => '4pKCgOWMYCUMKWGWhQUs',
                'created_at' => '2024-04-01 03:16:08',
                'updated_at' => '2024-04-01 03:18:10',
            ),
            272 => 
            array (
                'id' => 1863,
                'presensi_id' => 118,
                'peserta_id' => 109,
                'sign' => '660a3447cdab2.png',
                'slug' => 'IGwGhH6llKgb5vyhgx7n',
                'created_at' => '2024-04-01 03:16:11',
                'updated_at' => '2024-04-01 04:12:55',
            ),
            273 => 
            array (
                'id' => 1864,
                'presensi_id' => 118,
                'peserta_id' => 151,
                'sign' => '660a2e88d7f33.png',
                'slug' => 'qiCyF0w4QqCYwCPBdq4c',
                'created_at' => '2024-04-01 03:16:17',
                'updated_at' => '2024-04-01 03:48:24',
            ),
            274 => 
            array (
                'id' => 1865,
                'presensi_id' => 118,
                'peserta_id' => 111,
                'sign' => '660a343c2f814.png',
                'slug' => 'xTZYEwxMhQ0SJmITYWAf',
                'created_at' => '2024-04-01 03:16:22',
                'updated_at' => '2024-04-01 04:12:44',
            ),
            275 => 
            array (
                'id' => 1866,
                'presensi_id' => 118,
                'peserta_id' => 10,
                'sign' => '660a32290c8f0.png',
                'slug' => 'tn367HSg2hePu4Gx5Ia8',
                'created_at' => '2024-04-01 03:47:28',
                'updated_at' => '2024-04-01 04:03:53',
            ),
            276 => 
            array (
                'id' => 1867,
                'presensi_id' => 118,
                'peserta_id' => 9,
                'sign' => '660a352ee5b58.png',
                'slug' => 'lBGlBbwb1PpECQ8jdz3A',
                'created_at' => '2024-04-01 04:00:19',
                'updated_at' => '2024-04-01 04:16:46',
            ),
            277 => 
            array (
                'id' => 1868,
                'presensi_id' => 119,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => '5cl1cFzmcelrPN9zy1QX',
                'created_at' => '2024-04-02 03:24:25',
                'updated_at' => '2024-04-02 03:24:25',
            ),
            278 => 
            array (
                'id' => 1869,
                'presensi_id' => 119,
                'peserta_id' => 9,
                'sign' => '660b7baead7b9.png',
                'slug' => 'SNPBOJiSZrxIHaTAFky8',
                'created_at' => '2024-04-02 03:24:38',
                'updated_at' => '2024-04-02 03:29:50',
            ),
            279 => 
            array (
                'id' => 1870,
                'presensi_id' => 119,
                'peserta_id' => 10,
                'sign' => '660b832de3656.png',
                'slug' => 'jB69dHfrr3G3tyo1TSxT',
                'created_at' => '2024-04-02 03:24:48',
                'updated_at' => '2024-04-02 04:01:49',
            ),
            280 => 
            array (
                'id' => 1871,
                'presensi_id' => 119,
                'peserta_id' => 85,
                'sign' => '660b8da204c49.png',
                'slug' => 'B9JCqVjSw8dHHFdlhRjs',
                'created_at' => '2024-04-02 03:24:53',
                'updated_at' => '2024-04-02 04:46:26',
            ),
            281 => 
            array (
                'id' => 1872,
                'presensi_id' => 119,
                'peserta_id' => 107,
                'sign' => '660b7ae859aaa.png',
                'slug' => 'hWKTiu97Xz1SXWLXwAWt',
                'created_at' => '2024-04-02 03:24:58',
                'updated_at' => '2024-04-02 03:26:32',
            ),
            282 => 
            array (
                'id' => 1873,
                'presensi_id' => 119,
                'peserta_id' => 109,
                'sign' => '660b8c3e0b260.png',
                'slug' => 'UoxuyG8jspzRStSsIf2T',
                'created_at' => '2024-04-02 03:25:02',
                'updated_at' => '2024-04-02 04:40:30',
            ),
            283 => 
            array (
                'id' => 1874,
                'presensi_id' => 119,
                'peserta_id' => 105,
                'sign' => '660b7ae3c3513.png',
                'slug' => 'RwiW3PbEP6h78Ug8GUSe',
                'created_at' => '2024-04-02 03:25:08',
                'updated_at' => '2024-04-02 03:26:27',
            ),
            284 => 
            array (
                'id' => 1875,
                'presensi_id' => 119,
                'peserta_id' => 100,
                'sign' => '660b7ae77651c.png',
                'slug' => '11P7b1MWIGphd4FFXAgi',
                'created_at' => '2024-04-02 03:25:15',
                'updated_at' => '2024-04-02 03:26:31',
            ),
            285 => 
            array (
                'id' => 1876,
                'presensi_id' => 119,
                'peserta_id' => 12,
                'sign' => '660b7b68c0310.png',
                'slug' => 'RBH2ZErc98jwOah2DHPa',
                'created_at' => '2024-04-02 03:26:10',
                'updated_at' => '2024-04-02 03:28:40',
            ),
            286 => 
            array (
                'id' => 1877,
                'presensi_id' => 120,
                'peserta_id' => 5,
                'sign' => '660cd5c33f08e.png',
                'slug' => 'Uc4yIjHkgHvwiPygmYJG',
                'created_at' => '2024-04-03 02:59:23',
                'updated_at' => '2024-04-03 04:06:27',
            ),
            287 => 
            array (
                'id' => 1878,
                'presensi_id' => 120,
                'peserta_id' => 52,
                'sign' => '660cd61da743c.png',
                'slug' => '6yFwNBId5Fefi64KFoUA',
                'created_at' => '2024-04-03 02:59:39',
                'updated_at' => '2024-04-03 04:07:57',
            ),
            288 => 
            array (
                'id' => 1879,
                'presensi_id' => 120,
                'peserta_id' => 12,
                'sign' => '660cd60cdab8c.png',
                'slug' => '3NfhHn1XbQ5dGsIpF7Zu',
                'created_at' => '2024-04-03 02:59:44',
                'updated_at' => '2024-04-03 04:07:40',
            ),
            289 => 
            array (
                'id' => 1880,
                'presensi_id' => 120,
                'peserta_id' => 107,
                'sign' => '660cd5df640d3.png',
                'slug' => 'wBls893Zm9Zv6G3FqSYx',
                'created_at' => '2024-04-03 02:59:48',
                'updated_at' => '2024-04-03 04:06:55',
            ),
            290 => 
            array (
                'id' => 1881,
                'presensi_id' => 120,
                'peserta_id' => 98,
                'sign' => '660cc660a519c.png',
                'slug' => 'BHLmHUYrFUT4R0DnzTBn',
                'created_at' => '2024-04-03 02:59:53',
                'updated_at' => '2024-04-03 03:00:48',
            ),
            291 => 
            array (
                'id' => 1882,
                'presensi_id' => 120,
                'peserta_id' => 85,
                'sign' => '660cd6cd71076.png',
                'slug' => 'CH9eMguYdnnU1H6E9pJJ',
                'created_at' => '2024-04-03 04:06:20',
                'updated_at' => '2024-04-03 04:10:53',
            ),
            292 => 
            array (
                'id' => 1883,
                'presensi_id' => 120,
                'peserta_id' => 10,
                'sign' => '660cd5f9dd987.png',
                'slug' => 'lrTfodCyCaYAtDEVayHW',
                'created_at' => '2024-04-03 04:06:27',
                'updated_at' => '2024-04-03 04:07:21',
            ),
            293 => 
            array (
                'id' => 1884,
                'presensi_id' => 120,
                'peserta_id' => 218,
                'sign' => '660cda4e7ddeb.png',
                'slug' => 'ripmZiNr6LmdtDJHCYfV',
                'created_at' => '2024-04-03 04:06:31',
                'updated_at' => '2024-04-03 04:25:50',
            ),
            294 => 
            array (
                'id' => 1885,
                'presensi_id' => 121,
                'peserta_id' => 5,
                'sign' => '6625dc38a7fc9.png',
                'slug' => 'j7Jafz69BCAqgI0z3tv4',
                'created_at' => '2024-04-22 02:18:53',
                'updated_at' => '2024-04-22 03:40:40',
            ),
            295 => 
            array (
                'id' => 1886,
                'presensi_id' => 121,
                'peserta_id' => 9,
                'sign' => '662703a1c39ce.png',
                'slug' => '4G7jRrvi5lmoUba9IsMF',
                'created_at' => '2024-04-22 02:19:32',
                'updated_at' => '2024-04-23 00:41:05',
            ),
            296 => 
            array (
                'id' => 1887,
                'presensi_id' => 121,
                'peserta_id' => 6,
                'sign' => '6625d7e8b0fcf.png',
                'slug' => 't6oEfsQtBBqseyuj9Bim',
                'created_at' => '2024-04-22 02:19:38',
                'updated_at' => '2024-04-22 03:22:16',
            ),
            297 => 
            array (
                'id' => 1888,
                'presensi_id' => 121,
                'peserta_id' => 52,
                'sign' => '6625ddb91bd0a.png',
                'slug' => 'rGZrRxfCeQ5drXxSlswS',
                'created_at' => '2024-04-22 02:19:43',
                'updated_at' => '2024-04-22 03:47:05',
            ),
            298 => 
            array (
                'id' => 1889,
                'presensi_id' => 121,
                'peserta_id' => 10,
                'sign' => '6625d16e90b71.png',
                'slug' => 'eljJ5C8iN6sH607rNLsz',
                'created_at' => '2024-04-22 02:19:50',
                'updated_at' => '2024-04-22 02:54:38',
            ),
            299 => 
            array (
                'id' => 1890,
                'presensi_id' => 121,
                'peserta_id' => 85,
                'sign' => '6625cf2856464.png',
                'slug' => 'SI2phkCZdXUE4CSs3Dlm',
                'created_at' => '2024-04-22 02:20:02',
                'updated_at' => '2024-04-22 02:44:56',
            ),
            300 => 
            array (
                'id' => 1891,
                'presensi_id' => 121,
                'peserta_id' => 12,
                'sign' => '6625cb13bce23.png',
                'slug' => 'sLWObbImFiqSDcw8oQA1',
                'created_at' => '2024-04-22 02:20:11',
                'updated_at' => '2024-04-22 02:27:31',
            ),
            301 => 
            array (
                'id' => 1892,
                'presensi_id' => 121,
                'peserta_id' => 107,
                'sign' => '6625c9c3c400e.png',
                'slug' => 'Dg5jo5QoJOshpJALps3H',
                'created_at' => '2024-04-22 02:20:21',
                'updated_at' => '2024-04-22 02:21:55',
            ),
            302 => 
            array (
                'id' => 1893,
                'presensi_id' => 121,
                'peserta_id' => 109,
                'sign' => '6625cc96dc831.png',
                'slug' => 'KYwueEFOUhyT1gSZVdOk',
                'created_at' => '2024-04-22 02:20:26',
                'updated_at' => '2024-04-22 02:33:58',
            ),
            303 => 
            array (
                'id' => 1894,
                'presensi_id' => 121,
                'peserta_id' => 108,
                'sign' => '6625d7e1923d1.png',
                'slug' => 'McopPbQvWRowtUc7jcaf',
                'created_at' => '2024-04-22 02:20:30',
                'updated_at' => '2024-04-22 03:22:09',
            ),
            304 => 
            array (
                'id' => 1895,
                'presensi_id' => 121,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'IDUCQVmLdZ5P4oGpnrMK',
                'created_at' => '2024-04-22 02:20:33',
                'updated_at' => '2024-04-22 02:20:33',
            ),
            305 => 
            array (
                'id' => 1896,
                'presensi_id' => 121,
                'peserta_id' => 22,
                'sign' => '6625ff2199ca3.png',
                'slug' => 'EmUIDe5unPzPtrSfCOoh',
                'created_at' => '2024-04-22 02:20:42',
                'updated_at' => '2024-04-22 06:09:37',
            ),
            306 => 
            array (
                'id' => 1897,
                'presensi_id' => 121,
                'peserta_id' => 38,
                'sign' => '6625cb503b888.png',
                'slug' => 'TeIKSqO82HGSaZ9YrWC2',
                'created_at' => '2024-04-22 02:20:46',
                'updated_at' => '2024-04-22 02:28:32',
            ),
            307 => 
            array (
                'id' => 1898,
                'presensi_id' => 121,
                'peserta_id' => 102,
                'sign' => '6625fbab22236.png',
                'slug' => '1uDBmVi8jdEooGC5qC2Z',
                'created_at' => '2024-04-22 02:20:51',
                'updated_at' => '2024-04-22 05:54:51',
            ),
            308 => 
            array (
                'id' => 1899,
                'presensi_id' => 121,
                'peserta_id' => 152,
                'sign' => '6625cd754a2b5.png',
                'slug' => 'htwQDsBl7uviw8065amt',
                'created_at' => '2024-04-22 02:20:57',
                'updated_at' => '2024-04-22 02:37:41',
            ),
            309 => 
            array (
                'id' => 1900,
                'presensi_id' => 113,
                'peserta_id' => 85,
                'sign' => '6625ecedd5221.png',
                'slug' => 'C5OeSBnTHirfjcVsBfXr',
                'created_at' => '2024-04-22 04:45:30',
                'updated_at' => '2024-04-22 04:51:57',
            ),
            310 => 
            array (
                'id' => 1901,
                'presensi_id' => 114,
                'peserta_id' => 85,
                'sign' => '6625edd9902d0.png',
                'slug' => '6lEcG1j3Bis0RbXB38gI',
                'created_at' => '2024-04-22 04:55:31',
                'updated_at' => '2024-04-22 04:55:53',
            ),
            311 => 
            array (
                'id' => 1902,
                'presensi_id' => 115,
                'peserta_id' => 85,
                'sign' => '6625f1e0518a9.png',
                'slug' => 'vNx8Cxrk9EDHa81TVKXY',
                'created_at' => '2024-04-22 05:11:55',
                'updated_at' => '2024-04-22 05:13:04',
            ),
            312 => 
            array (
                'id' => 1903,
                'presensi_id' => 115,
                'peserta_id' => 10,
                'sign' => '6625f1f295e68.png',
                'slug' => 'raniW6kOSOJQeBBDsOD1',
                'created_at' => '2024-04-22 05:12:00',
                'updated_at' => '2024-04-22 05:13:22',
            ),
            313 => 
            array (
                'id' => 1904,
                'presensi_id' => 116,
                'peserta_id' => 52,
                'sign' => '6625f2f99ae4a.png',
                'slug' => 'rvLi1k2ffkDHAQuU5hOT',
                'created_at' => '2024-04-22 05:17:05',
                'updated_at' => '2024-04-22 05:17:45',
            ),
            314 => 
            array (
                'id' => 1905,
                'presensi_id' => 118,
                'peserta_id' => 12,
                'sign' => '6625f533e4115.png',
                'slug' => '7vYsYqTw4PEp01yGnNnA',
                'created_at' => '2024-04-22 05:26:49',
                'updated_at' => '2024-04-22 05:27:15',
            ),
            315 => 
            array (
                'id' => 1906,
                'presensi_id' => 119,
                'peserta_id' => 52,
                'sign' => '6625f6774d74c.png',
                'slug' => 'VGexOyTNxVmpjpoDn9Cs',
                'created_at' => '2024-04-22 05:31:59',
                'updated_at' => '2024-04-22 05:32:39',
            ),
            316 => 
            array (
                'id' => 1907,
                'presensi_id' => 120,
                'peserta_id' => 109,
                'sign' => '6625f6f1170ec.png',
                'slug' => 'nWbmkv2U9B7StjdpxM6g',
                'created_at' => '2024-04-22 05:34:15',
                'updated_at' => '2024-04-22 05:34:41',
            ),
            317 => 
            array (
                'id' => 1908,
                'presensi_id' => 120,
                'peserta_id' => 9,
                'sign' => '6625f7b0e78dc.png',
                'slug' => 'Cx6iNi2ShhkzJy39XBtd',
                'created_at' => '2024-04-22 05:34:19',
                'updated_at' => '2024-04-22 05:37:52',
            ),
            318 => 
            array (
                'id' => 1909,
                'presensi_id' => 122,
                'peserta_id' => 6,
                'sign' => '66278795c436d.png',
                'slug' => 'wG9fKnA8PEJnTvFebxzo',
                'created_at' => '2024-04-23 07:47:12',
                'updated_at' => '2024-04-23 10:04:05',
            ),
            319 => 
            array (
                'id' => 1910,
                'presensi_id' => 122,
                'peserta_id' => 52,
                'sign' => '662768be9f13d.png',
                'slug' => '6DErO4O860AdL8rJJF11',
                'created_at' => '2024-04-23 07:47:49',
                'updated_at' => '2024-04-23 07:52:30',
            ),
            320 => 
            array (
                'id' => 1911,
                'presensi_id' => 122,
                'peserta_id' => 103,
                'sign' => '66276874da0ef.png',
                'slug' => 'L2xKYcy1FJXmiKvGaeSY',
                'created_at' => '2024-04-23 07:48:02',
                'updated_at' => '2024-04-23 07:51:16',
            ),
            321 => 
            array (
                'id' => 1912,
                'presensi_id' => 122,
                'peserta_id' => 18,
                'sign' => NULL,
                'slug' => 'mY3SxRrkG0fRDeo0MrBl',
                'created_at' => '2024-04-23 07:48:18',
                'updated_at' => '2024-04-23 07:48:18',
            ),
            322 => 
            array (
                'id' => 1913,
                'presensi_id' => 122,
                'peserta_id' => 40,
                'sign' => '66276dbba9517.png',
                'slug' => 'Ypke9rVXBKC5Bs8pBUh5',
                'created_at' => '2024-04-23 07:48:33',
                'updated_at' => '2024-04-23 08:13:47',
            ),
            323 => 
            array (
                'id' => 1914,
                'presensi_id' => 122,
                'peserta_id' => 155,
                'sign' => '66277187ad593.png',
                'slug' => '25B7JkiomWe97tcl4ZVP',
                'created_at' => '2024-04-23 07:48:54',
                'updated_at' => '2024-04-23 08:29:59',
            ),
            324 => 
            array (
                'id' => 1915,
                'presensi_id' => 122,
                'peserta_id' => 14,
                'sign' => '666162d6d494f.png',
                'slug' => 'QIRAuHzYE93IuzRWoOfZ',
                'created_at' => '2024-04-23 07:49:07',
                'updated_at' => '2024-06-06 07:18:46',
            ),
            325 => 
            array (
                'id' => 1916,
                'presensi_id' => 122,
                'peserta_id' => 154,
                'sign' => '66276ac023f9c.png',
                'slug' => 'qQJyX5fgokMxHM3bw0Mx',
                'created_at' => '2024-04-23 07:49:18',
                'updated_at' => '2024-04-23 08:01:04',
            ),
            326 => 
            array (
                'id' => 1917,
                'presensi_id' => 123,
                'peserta_id' => 25,
                'sign' => '6633a859282b9.png',
                'slug' => 'quXvMGapQl5zjN9GggLn',
                'created_at' => '2024-05-02 08:21:35',
                'updated_at' => '2024-05-02 14:51:05',
            ),
            327 => 
            array (
                'id' => 1918,
                'presensi_id' => 123,
                'peserta_id' => 1,
                'sign' => NULL,
                'slug' => 'pRfjCH9LlVpBT9HxCLXm',
                'created_at' => '2024-05-02 08:21:50',
                'updated_at' => '2024-05-02 08:21:50',
            ),
            328 => 
            array (
                'id' => 1919,
                'presensi_id' => 123,
                'peserta_id' => 110,
                'sign' => '6633503ff17aa.png',
                'slug' => '6EfvBj6Hcx2HtNvjy1Ab',
                'created_at' => '2024-05-02 08:23:17',
                'updated_at' => '2024-05-02 08:35:11',
            ),
            329 => 
            array (
                'id' => 1920,
                'presensi_id' => 123,
                'peserta_id' => 38,
                'sign' => '66334ed8ba617.png',
                'slug' => 'oUEaktbWhLgq0abxC0Zd',
                'created_at' => '2024-05-02 08:23:24',
                'updated_at' => '2024-05-02 08:29:12',
            ),
            330 => 
            array (
                'id' => 1921,
                'presensi_id' => 123,
                'peserta_id' => 92,
                'sign' => '663352b9b3ab4.png',
                'slug' => 'MvJ9oc9fESgRSCluym75',
                'created_at' => '2024-05-02 08:23:29',
                'updated_at' => '2024-05-02 08:45:45',
            ),
            331 => 
            array (
                'id' => 1922,
                'presensi_id' => 123,
                'peserta_id' => 217,
                'sign' => '663353a796006.png',
                'slug' => 'DfznzmlVEphyFGf8MvAl',
                'created_at' => '2024-05-02 08:23:35',
                'updated_at' => '2024-05-02 08:49:43',
            ),
            332 => 
            array (
                'id' => 1923,
                'presensi_id' => 123,
                'peserta_id' => 26,
                'sign' => '66334ef2951b8.png',
                'slug' => 'RWza260pYBQJdtHB3dtN',
                'created_at' => '2024-05-02 08:23:42',
                'updated_at' => '2024-05-02 08:29:38',
            ),
            333 => 
            array (
                'id' => 1924,
                'presensi_id' => 123,
                'peserta_id' => 86,
                'sign' => '66336a3094920.png',
                'slug' => 'y9rRU1fydZPql8j3Vo4W',
                'created_at' => '2024-05-02 08:23:50',
                'updated_at' => '2024-05-02 10:25:52',
            ),
            334 => 
            array (
                'id' => 1925,
                'presensi_id' => 123,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => '4ZZcz0Qmd4myPVdTswrv',
                'created_at' => '2024-05-02 08:23:55',
                'updated_at' => '2024-05-02 08:23:55',
            ),
            335 => 
            array (
                'id' => 1926,
                'presensi_id' => 123,
                'peserta_id' => 52,
                'sign' => '66334fe63a5a0.png',
                'slug' => 'mnLncnyDNToHEGdU1axc',
                'created_at' => '2024-05-02 08:24:01',
                'updated_at' => '2024-05-02 08:33:42',
            ),
            336 => 
            array (
                'id' => 1927,
                'presensi_id' => 123,
                'peserta_id' => 13,
                'sign' => '66335213dedc1.png',
                'slug' => 'pXT8kMixfLorr4dhfc5I',
                'created_at' => '2024-05-02 08:24:08',
                'updated_at' => '2024-05-02 08:42:59',
            ),
            337 => 
            array (
                'id' => 1928,
                'presensi_id' => 123,
                'peserta_id' => 21,
                'sign' => '663350a04dfed.png',
                'slug' => 'IC8YWIWpHRsshJHiXPAr',
                'created_at' => '2024-05-02 08:24:12',
                'updated_at' => '2024-05-02 08:36:48',
            ),
            338 => 
            array (
                'id' => 1929,
                'presensi_id' => 123,
                'peserta_id' => 18,
                'sign' => '66335f59a4a7a.png',
                'slug' => 'xRQlj9kDyo0IoH9BzTHN',
                'created_at' => '2024-05-02 08:24:18',
                'updated_at' => '2024-05-02 09:39:37',
            ),
            339 => 
            array (
                'id' => 1930,
                'presensi_id' => 123,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => '2YoxoeGGfOMU6AjNuso3',
                'created_at' => '2024-05-02 08:24:27',
                'updated_at' => '2024-05-02 08:24:27',
            ),
            340 => 
            array (
                'id' => 1931,
                'presensi_id' => 123,
                'peserta_id' => 23,
                'sign' => '66336b0f5dc98.png',
                'slug' => 'ZaykiIK8LQfrnNuFxsIM',
                'created_at' => '2024-05-02 08:24:33',
                'updated_at' => '2024-05-02 10:29:35',
            ),
            341 => 
            array (
                'id' => 1932,
                'presensi_id' => 123,
                'peserta_id' => 27,
                'sign' => '66335f701beed.png',
                'slug' => '6BVH0xnQF8QceUXPJWwK',
                'created_at' => '2024-05-02 08:24:40',
                'updated_at' => '2024-05-02 09:40:00',
            ),
            342 => 
            array (
                'id' => 1933,
                'presensi_id' => 123,
                'peserta_id' => 79,
                'sign' => '663350c231bf1.png',
                'slug' => 'MkkyGAFOlZc4BmkqUp44',
                'created_at' => '2024-05-02 08:24:47',
                'updated_at' => '2024-05-02 08:37:22',
            ),
            343 => 
            array (
                'id' => 1934,
                'presensi_id' => 123,
                'peserta_id' => 14,
                'sign' => '66335c2b85ca1.png',
                'slug' => 'ZqfFaZGfPPd4fQyZ54F3',
                'created_at' => '2024-05-02 08:25:08',
                'updated_at' => '2024-05-02 09:26:03',
            ),
            344 => 
            array (
                'id' => 1935,
                'presensi_id' => 123,
                'peserta_id' => 91,
                'sign' => '66345002d5e36.png',
                'slug' => 'TshPjWnPLV5EAbHg5S0Z',
                'created_at' => '2024-05-02 08:25:15',
                'updated_at' => '2024-05-03 02:46:26',
            ),
            345 => 
            array (
                'id' => 1936,
                'presensi_id' => 123,
                'peserta_id' => 85,
                'sign' => '663350b365850.png',
                'slug' => 'apwDpV1EfLLy1m5912dd',
                'created_at' => '2024-05-02 08:25:22',
                'updated_at' => '2024-05-02 08:37:07',
            ),
            346 => 
            array (
                'id' => 1937,
                'presensi_id' => 123,
                'peserta_id' => 40,
                'sign' => '6633539bcd82f.png',
                'slug' => 'YWOgCssJ3yf9bGWu80Er',
                'created_at' => '2024-05-02 08:25:29',
                'updated_at' => '2024-05-02 08:49:31',
            ),
            347 => 
            array (
                'id' => 1938,
                'presensi_id' => 123,
                'peserta_id' => 97,
                'sign' => '663352c1829b3.png',
                'slug' => 'aP3YWUWweRXIRv98SEU9',
                'created_at' => '2024-05-02 08:25:36',
                'updated_at' => '2024-05-02 08:45:53',
            ),
            348 => 
            array (
                'id' => 1939,
                'presensi_id' => 123,
                'peserta_id' => 155,
                'sign' => '66335ca1c31d6.png',
                'slug' => 'eBGdkPnwDambzQTduRGb',
                'created_at' => '2024-05-02 08:25:41',
                'updated_at' => '2024-05-02 09:28:01',
            ),
            349 => 
            array (
                'id' => 1940,
                'presensi_id' => 123,
                'peserta_id' => 22,
                'sign' => '663384b7a24e7.png',
                'slug' => 'DUxxKDsNuv3U4R1SiHqk',
                'created_at' => '2024-05-02 08:25:46',
                'updated_at' => '2024-05-02 12:19:03',
            ),
            350 => 
            array (
                'id' => 1941,
                'presensi_id' => 123,
                'peserta_id' => 31,
                'sign' => '66335302d04f8.png',
                'slug' => '2b9nwZnp00OvXnZbQE8I',
                'created_at' => '2024-05-02 08:25:53',
                'updated_at' => '2024-05-02 08:46:58',
            ),
            351 => 
            array (
                'id' => 1942,
                'presensi_id' => 123,
                'peserta_id' => 81,
                'sign' => '663351b4a83cf.png',
                'slug' => '8gWjsiFGW9mbQkmnTxKb',
                'created_at' => '2024-05-02 08:26:00',
                'updated_at' => '2024-05-02 08:41:24',
            ),
            352 => 
            array (
                'id' => 1943,
                'presensi_id' => 123,
                'peserta_id' => 10,
                'sign' => '663377c2193fa.png',
                'slug' => 'Wd7mH0xYnz7AwHHwExlx',
                'created_at' => '2024-05-02 08:26:05',
                'updated_at' => '2024-05-02 11:23:46',
            ),
            353 => 
            array (
                'id' => 1944,
                'presensi_id' => 123,
                'peserta_id' => 83,
                'sign' => '663369bbbfd59.png',
                'slug' => '7gPi23DGbnSugsLR2rVF',
                'created_at' => '2024-05-02 08:26:10',
                'updated_at' => '2024-05-02 10:23:55',
            ),
            354 => 
            array (
                'id' => 1945,
                'presensi_id' => 123,
                'peserta_id' => 119,
                'sign' => NULL,
                'slug' => 'pJaRKThQzxc6BRNWvzY0',
                'created_at' => '2024-05-02 08:26:18',
                'updated_at' => '2024-05-02 08:26:18',
            ),
            355 => 
            array (
                'id' => 1946,
                'presensi_id' => 123,
                'peserta_id' => 158,
                'sign' => '663352c7ed607.png',
                'slug' => 'qvFIPtamMRrlvnaWkjOs',
                'created_at' => '2024-05-02 08:26:24',
                'updated_at' => '2024-05-02 08:45:59',
            ),
            356 => 
            array (
                'id' => 1947,
                'presensi_id' => 123,
                'peserta_id' => 39,
                'sign' => '66616281b88d1.png',
                'slug' => 'tmDhkN9vt5ao8TIMwEeL',
                'created_at' => '2024-05-02 08:26:29',
                'updated_at' => '2024-06-06 07:17:21',
            ),
            357 => 
            array (
                'id' => 1948,
                'presensi_id' => 123,
                'peserta_id' => 103,
                'sign' => '663352c3387ad.png',
                'slug' => 'oxHnSOP6PJ6PEXLVVU2n',
                'created_at' => '2024-05-02 08:26:45',
                'updated_at' => '2024-05-02 08:45:55',
            ),
            358 => 
            array (
                'id' => 1949,
                'presensi_id' => 123,
                'peserta_id' => 156,
                'sign' => '66335d5121c90.png',
                'slug' => 'WPCvlb6Ir22f5vckz25h',
                'created_at' => '2024-05-02 08:27:02',
                'updated_at' => '2024-05-02 09:30:57',
            ),
            359 => 
            array (
                'id' => 1950,
                'presensi_id' => 123,
                'peserta_id' => 57,
                'sign' => '663359dec9145.png',
                'slug' => 'DWyRU3i7WqHMX9HGSNc7',
                'created_at' => '2024-05-02 08:46:55',
                'updated_at' => '2024-05-02 09:16:14',
            ),
            360 => 
            array (
                'id' => 1951,
                'presensi_id' => 123,
                'peserta_id' => 4,
                'sign' => '663392cae86da.png',
                'slug' => '80Zy22Tpp6oklRtpFa5o',
                'created_at' => '2024-05-02 08:47:05',
                'updated_at' => '2024-05-02 13:19:06',
            ),
            361 => 
            array (
                'id' => 1952,
                'presensi_id' => 123,
                'peserta_id' => 76,
                'sign' => '663354065b033.png',
                'slug' => '6ypnofixDYNaX5G24Ve1',
                'created_at' => '2024-05-02 08:47:18',
                'updated_at' => '2024-05-02 08:51:18',
            ),
            362 => 
            array (
                'id' => 1953,
                'presensi_id' => 124,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'XW8YwpVKR8y0mT06szhH',
                'created_at' => '2024-05-13 01:29:57',
                'updated_at' => '2024-05-13 01:29:57',
            ),
            363 => 
            array (
                'id' => 1954,
                'presensi_id' => 124,
                'peserta_id' => 6,
                'sign' => '6642a27dd220a.png',
                'slug' => 'tHV7BiOyNHGYs4CIo8JW',
                'created_at' => '2024-05-13 01:30:34',
                'updated_at' => '2024-05-13 23:30:05',
            ),
            364 => 
            array (
                'id' => 1955,
                'presensi_id' => 124,
                'peserta_id' => 52,
                'sign' => '6641c50177d89.png',
                'slug' => '3H5rgD4lldsEXAoT1S8i',
                'created_at' => '2024-05-13 01:30:39',
                'updated_at' => '2024-05-13 07:45:05',
            ),
            365 => 
            array (
                'id' => 1956,
                'presensi_id' => 124,
                'peserta_id' => 10,
                'sign' => '66418fecb6207.png',
                'slug' => 'YvSwaCc3b0diBRngfggS',
                'created_at' => '2024-05-13 01:30:43',
                'updated_at' => '2024-05-13 03:58:36',
            ),
            366 => 
            array (
                'id' => 1957,
                'presensi_id' => 124,
                'peserta_id' => 85,
                'sign' => '664184f53c554.png',
                'slug' => 'C7AY4dsmxv7eOiM4xY9X',
                'created_at' => '2024-05-13 01:30:47',
                'updated_at' => '2024-05-13 03:11:49',
            ),
            367 => 
            array (
                'id' => 1958,
                'presensi_id' => 124,
                'peserta_id' => 9,
                'sign' => '6641782c7dda7.png',
                'slug' => 'P1y3SyFY5pifD5RZQPOp',
                'created_at' => '2024-05-13 01:30:52',
                'updated_at' => '2024-05-13 02:17:16',
            ),
            368 => 
            array (
                'id' => 1959,
                'presensi_id' => 124,
                'peserta_id' => 12,
                'sign' => '66416f2148e48.png',
                'slug' => '94p307ZFZp76dBLqylUR',
                'created_at' => '2024-05-13 01:30:58',
                'updated_at' => '2024-05-13 01:38:41',
            ),
            369 => 
            array (
                'id' => 1960,
                'presensi_id' => 124,
                'peserta_id' => 107,
                'sign' => '66416e378c5e8.png',
                'slug' => 'o7cmRbOqoW1kfhIL9bJp',
                'created_at' => '2024-05-13 01:31:02',
                'updated_at' => '2024-05-13 01:34:47',
            ),
            370 => 
            array (
                'id' => 1961,
                'presensi_id' => 124,
                'peserta_id' => 108,
                'sign' => '6642a2857ef5d.png',
                'slug' => '7BqM1zTX0zVnwCHhYZRB',
                'created_at' => '2024-05-13 01:31:07',
                'updated_at' => '2024-05-13 23:30:13',
            ),
            371 => 
            array (
                'id' => 1962,
                'presensi_id' => 124,
                'peserta_id' => 109,
                'sign' => '66418fda907df.png',
                'slug' => 'gedfvaoLr5UMVk2a004q',
                'created_at' => '2024-05-13 01:31:12',
                'updated_at' => '2024-05-13 03:58:18',
            ),
            372 => 
            array (
                'id' => 1963,
                'presensi_id' => 124,
                'peserta_id' => 21,
                'sign' => '6641739ce65e4.png',
                'slug' => 'o800kpB0l5asteRLhQy6',
                'created_at' => '2024-05-13 01:31:19',
                'updated_at' => '2024-05-13 01:57:48',
            ),
            373 => 
            array (
                'id' => 1964,
                'presensi_id' => 124,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '8dpWMIMvxdVkLhXBP2hB',
                'created_at' => '2024-05-13 01:31:24',
                'updated_at' => '2024-05-13 01:31:24',
            ),
            374 => 
            array (
                'id' => 1965,
                'presensi_id' => 124,
                'peserta_id' => 38,
                'sign' => '6641714ee0abc.png',
                'slug' => '3RN0RnRMpc87QMlnBbo0',
                'created_at' => '2024-05-13 01:31:31',
                'updated_at' => '2024-05-13 01:47:58',
            ),
            375 => 
            array (
                'id' => 1966,
                'presensi_id' => 124,
                'peserta_id' => 100,
                'sign' => '66416e80d792c.png',
                'slug' => '7bNLgEFOg4cg14W45mSV',
                'created_at' => '2024-05-13 01:31:40',
                'updated_at' => '2024-05-13 01:36:00',
            ),
            376 => 
            array (
                'id' => 1967,
                'presensi_id' => 124,
                'peserta_id' => 105,
                'sign' => '66417a103c139.png',
                'slug' => '6CQyoxPEwwvHS2KRHH3b',
                'created_at' => '2024-05-13 01:31:45',
                'updated_at' => '2024-05-13 02:25:20',
            ),
            377 => 
            array (
                'id' => 1968,
                'presensi_id' => 124,
                'peserta_id' => 212,
                'sign' => '66416f06e2b52.png',
                'slug' => 'Et3GiUdD9UVqEB9mNfFx',
                'created_at' => '2024-05-13 01:31:51',
                'updated_at' => '2024-05-13 01:38:14',
            ),
            378 => 
            array (
                'id' => 1969,
                'presensi_id' => 125,
                'peserta_id' => 5,
                'sign' => '66430717e9c5d.png',
                'slug' => 'sx6KHBeJez812xeXxhRe',
                'created_at' => '2024-05-14 05:46:25',
                'updated_at' => '2024-05-14 06:39:19',
            ),
            379 => 
            array (
                'id' => 1970,
                'presensi_id' => 125,
                'peserta_id' => 6,
                'sign' => '6643076d8bbb4.png',
                'slug' => '9XH5xfb20PfSnDvMWG9o',
                'created_at' => '2024-05-14 05:46:34',
                'updated_at' => '2024-05-14 06:40:45',
            ),
            380 => 
            array (
                'id' => 1971,
                'presensi_id' => 125,
                'peserta_id' => 9,
                'sign' => '66430e35973f2.png',
                'slug' => 'xtzyRa0NRbez6kUq97i8',
                'created_at' => '2024-05-14 05:46:39',
                'updated_at' => '2024-05-14 07:09:41',
            ),
            381 => 
            array (
                'id' => 1972,
                'presensi_id' => 125,
                'peserta_id' => 85,
                'sign' => '66430f5c7ba35.png',
                'slug' => 'Ft7NP0eTfLrtEAhsRXft',
                'created_at' => '2024-05-14 05:46:44',
                'updated_at' => '2024-05-14 07:14:36',
            ),
            382 => 
            array (
                'id' => 1973,
                'presensi_id' => 125,
                'peserta_id' => 10,
                'sign' => '664306d14ce66.png',
                'slug' => 'kBHreub6McvDccyGiILJ',
                'created_at' => '2024-05-14 05:46:49',
                'updated_at' => '2024-05-14 06:38:09',
            ),
            383 => 
            array (
                'id' => 1974,
                'presensi_id' => 125,
                'peserta_id' => 52,
                'sign' => '6643209c1b5d4.png',
                'slug' => 'Jl7Q37qn5DfpU1hKZ7OJ',
                'created_at' => '2024-05-14 05:46:54',
                'updated_at' => '2024-05-14 08:28:12',
            ),
            384 => 
            array (
                'id' => 1975,
                'presensi_id' => 125,
                'peserta_id' => 12,
                'sign' => '6643084d3fbe9.png',
                'slug' => 'TZwxdCmdpef98QoDRfCq',
                'created_at' => '2024-05-14 05:47:03',
                'updated_at' => '2024-05-14 06:44:29',
            ),
            385 => 
            array (
                'id' => 1976,
                'presensi_id' => 125,
                'peserta_id' => 107,
                'sign' => '66430785057bb.png',
                'slug' => 'GC5OHa3z2r7TaTDae2jg',
                'created_at' => '2024-05-14 05:47:06',
                'updated_at' => '2024-05-14 06:41:09',
            ),
            386 => 
            array (
                'id' => 1977,
                'presensi_id' => 125,
                'peserta_id' => 108,
                'sign' => '6643078eed85c.png',
                'slug' => '3N16jbDbrUuyKtOfJkZQ',
                'created_at' => '2024-05-14 05:47:11',
                'updated_at' => '2024-05-14 06:41:18',
            ),
            387 => 
            array (
                'id' => 1978,
                'presensi_id' => 125,
                'peserta_id' => 109,
                'sign' => '6643f368e2c61.png',
                'slug' => '6wxI540M6zmFIZkpDXYd',
                'created_at' => '2024-05-14 05:47:16',
                'updated_at' => '2024-05-14 23:27:36',
            ),
            388 => 
            array (
                'id' => 1979,
                'presensi_id' => 125,
                'peserta_id' => 21,
                'sign' => '664308b60da72.png',
                'slug' => 'GbWKdzwfMGhMV0pJ4iYi',
                'created_at' => '2024-05-14 05:47:21',
                'updated_at' => '2024-05-14 06:46:14',
            ),
            389 => 
            array (
                'id' => 1980,
                'presensi_id' => 125,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'c5SLnVbmvERIIOGqNXgA',
                'created_at' => '2024-05-14 05:47:29',
                'updated_at' => '2024-05-14 05:47:29',
            ),
            390 => 
            array (
                'id' => 1981,
                'presensi_id' => 125,
                'peserta_id' => 38,
                'sign' => '66430792bcdd8.png',
                'slug' => 'G6vLHHsLL6PyWz2Vnt6y',
                'created_at' => '2024-05-14 05:47:33',
                'updated_at' => '2024-05-14 06:41:22',
            ),
            391 => 
            array (
                'id' => 1982,
                'presensi_id' => 125,
                'peserta_id' => 151,
                'sign' => '6643094f5edda.png',
                'slug' => 'Pt2gZKdD7ykGa8nD9lBN',
                'created_at' => '2024-05-14 05:47:38',
                'updated_at' => '2024-05-14 06:48:47',
            ),
            392 => 
            array (
                'id' => 1983,
                'presensi_id' => 125,
                'peserta_id' => 111,
                'sign' => '664315ab0ea6e.png',
                'slug' => 'fU6CoeSXXExOA2Sg38J7',
                'created_at' => '2024-05-14 05:47:43',
                'updated_at' => '2024-05-14 07:41:31',
            ),
            393 => 
            array (
                'id' => 1984,
                'presensi_id' => 126,
                'peserta_id' => 5,
                'sign' => '66442009e0751.png',
                'slug' => 'rYVM1YTnxzhVsuiha28x',
                'created_at' => '2024-05-15 00:56:03',
                'updated_at' => '2024-05-15 02:38:01',
            ),
            394 => 
            array (
                'id' => 1985,
                'presensi_id' => 126,
                'peserta_id' => 9,
                'sign' => '6644220c22727.png',
                'slug' => 'yQyxBveJB44BNQU0Z09n',
                'created_at' => '2024-05-15 00:56:10',
                'updated_at' => '2024-05-15 02:46:36',
            ),
            395 => 
            array (
                'id' => 1986,
                'presensi_id' => 126,
                'peserta_id' => 10,
                'sign' => '66441ffa6b732.png',
                'slug' => 'QcKwM9LiA9mnyk3pPbQ0',
                'created_at' => '2024-05-15 00:56:16',
                'updated_at' => '2024-05-15 02:37:46',
            ),
            396 => 
            array (
                'id' => 1987,
                'presensi_id' => 126,
                'peserta_id' => 85,
                'sign' => '664423190a767.png',
                'slug' => 'svnF66G2C04WE9z4bonk',
                'created_at' => '2024-05-15 00:56:20',
                'updated_at' => '2024-05-15 02:51:05',
            ),
            397 => 
            array (
                'id' => 1988,
                'presensi_id' => 126,
                'peserta_id' => 52,
                'sign' => '66442025b9b72.png',
                'slug' => 'dDO8f3EdfBCY4psdvtSf',
                'created_at' => '2024-05-15 00:56:27',
                'updated_at' => '2024-05-15 02:38:29',
            ),
            398 => 
            array (
                'id' => 1989,
                'presensi_id' => 126,
                'peserta_id' => 6,
                'sign' => '664420432ee6c.png',
                'slug' => '4UTuAv7PdChsu1pV7Ve5',
                'created_at' => '2024-05-15 00:56:36',
                'updated_at' => '2024-05-15 02:38:59',
            ),
            399 => 
            array (
                'id' => 1990,
                'presensi_id' => 126,
                'peserta_id' => 12,
                'sign' => '66445014a58d4.png',
                'slug' => 'DmkRWkPN9dbFvoaavlU9',
                'created_at' => '2024-05-15 00:56:41',
                'updated_at' => '2024-05-15 06:03:00',
            ),
            400 => 
            array (
                'id' => 1991,
                'presensi_id' => 126,
                'peserta_id' => 107,
                'sign' => '6644205282329.png',
                'slug' => 'lyqCN7jMWZKcWpFNLMyq',
                'created_at' => '2024-05-15 00:56:46',
                'updated_at' => '2024-05-15 02:39:14',
            ),
            401 => 
            array (
                'id' => 1992,
                'presensi_id' => 126,
                'peserta_id' => 108,
                'sign' => '6644204a69ec1.png',
                'slug' => 'YUTBnrdVgd0w7Pd8tVun',
                'created_at' => '2024-05-15 00:56:50',
                'updated_at' => '2024-05-15 02:39:06',
            ),
            402 => 
            array (
                'id' => 1993,
                'presensi_id' => 126,
                'peserta_id' => 109,
                'sign' => '66441fe8cfbe3.png',
                'slug' => 'nOfbkA4BEDfu3poB78hb',
                'created_at' => '2024-05-15 00:56:55',
                'updated_at' => '2024-05-15 02:37:28',
            ),
            403 => 
            array (
                'id' => 1994,
                'presensi_id' => 126,
                'peserta_id' => 21,
                'sign' => '66442edc69eec.png',
                'slug' => 'EnJ26s6xj4z2iNTbX6gz',
                'created_at' => '2024-05-15 00:57:00',
                'updated_at' => '2024-05-15 03:41:16',
            ),
            404 => 
            array (
                'id' => 1995,
                'presensi_id' => 126,
                'peserta_id' => 22,
                'sign' => '664427b9d2eee.png',
                'slug' => 'Dz1mSA5AKPv29SzUqwpS',
                'created_at' => '2024-05-15 00:57:05',
                'updated_at' => '2024-05-15 03:10:49',
            ),
            405 => 
            array (
                'id' => 1996,
                'presensi_id' => 126,
                'peserta_id' => 38,
                'sign' => '6644219b08ac8.png',
                'slug' => 'Xv7KjCgVyHi3K1fh2fep',
                'created_at' => '2024-05-15 00:57:11',
                'updated_at' => '2024-05-15 02:44:43',
            ),
            406 => 
            array (
                'id' => 1997,
                'presensi_id' => 126,
                'peserta_id' => 98,
                'sign' => '66442259815b1.png',
                'slug' => '1hALijry1b1dv4oaz69w',
                'created_at' => '2024-05-15 00:57:15',
                'updated_at' => '2024-05-15 02:47:53',
            ),
            407 => 
            array (
                'id' => 1998,
                'presensi_id' => 126,
                'peserta_id' => 218,
                'sign' => '6644231e42120.png',
                'slug' => 'JY6lbnqsMf2iWaH9CXaO',
                'created_at' => '2024-05-15 00:57:20',
                'updated_at' => '2024-05-15 02:51:10',
            ),
            408 => 
            array (
                'id' => 1999,
                'presensi_id' => 127,
                'peserta_id' => 5,
                'sign' => '66542508d5763.png',
                'slug' => 'kOYVLvDakrw81neNxOkP',
                'created_at' => '2024-05-27 05:41:26',
                'updated_at' => '2024-05-27 06:15:36',
            ),
            409 => 
            array (
                'id' => 2000,
                'presensi_id' => 127,
                'peserta_id' => 9,
                'sign' => '665425a33a4bd.png',
                'slug' => 'iNjXGdlWq8U0fK4wlOnu',
                'created_at' => '2024-05-27 05:41:33',
                'updated_at' => '2024-05-27 06:18:11',
            ),
            410 => 
            array (
                'id' => 2001,
                'presensi_id' => 127,
                'peserta_id' => 52,
                'sign' => '665442c2e049c.png',
                'slug' => 'vUJZzs30btGmS68dbINA',
                'created_at' => '2024-05-27 05:41:38',
                'updated_at' => '2024-05-27 08:22:26',
            ),
            411 => 
            array (
                'id' => 2002,
                'presensi_id' => 127,
                'peserta_id' => 10,
                'sign' => '6654421591770.png',
                'slug' => 'jnmchrvgdhEUYX4mIQlf',
                'created_at' => '2024-05-27 05:41:43',
                'updated_at' => '2024-05-27 08:19:33',
            ),
            412 => 
            array (
                'id' => 2003,
                'presensi_id' => 127,
                'peserta_id' => 12,
                'sign' => '6654255ea2f44.png',
                'slug' => 'q6DhE8yM40EMIQHMI5d5',
                'created_at' => '2024-05-27 05:41:47',
                'updated_at' => '2024-05-27 06:17:02',
            ),
            413 => 
            array (
                'id' => 2004,
                'presensi_id' => 127,
                'peserta_id' => 107,
                'sign' => '6654229f04239.png',
                'slug' => 'qEsTNjZAvTkz2OjnAkJw',
                'created_at' => '2024-05-27 05:41:52',
                'updated_at' => '2024-05-27 06:05:19',
            ),
            414 => 
            array (
                'id' => 2005,
                'presensi_id' => 127,
                'peserta_id' => 85,
                'sign' => '6654317e15886.png',
                'slug' => 'JW1QvZfA7TwwcBBigd8x',
                'created_at' => '2024-05-27 05:42:05',
                'updated_at' => '2024-05-27 07:08:46',
            ),
            415 => 
            array (
                'id' => 2006,
                'presensi_id' => 127,
                'peserta_id' => 108,
                'sign' => '665422cc06503.png',
                'slug' => 'RjyM7dNt1a5jBmWG5uM6',
                'created_at' => '2024-05-27 05:42:10',
                'updated_at' => '2024-05-27 06:06:04',
            ),
            416 => 
            array (
                'id' => 2007,
                'presensi_id' => 127,
                'peserta_id' => 109,
                'sign' => '6654234d6351a.png',
                'slug' => 'C0gx8n7fuo642jxQPs1s',
                'created_at' => '2024-05-27 05:42:42',
                'updated_at' => '2024-05-27 06:08:13',
            ),
            417 => 
            array (
                'id' => 2008,
                'presensi_id' => 127,
                'peserta_id' => 6,
                'sign' => '665422ec70ff6.png',
                'slug' => 'Y4Z3IYwhdHWmOSq9hrEa',
                'created_at' => '2024-05-27 05:42:46',
                'updated_at' => '2024-05-27 06:06:36',
            ),
            418 => 
            array (
                'id' => 2009,
                'presensi_id' => 127,
                'peserta_id' => 11,
                'sign' => '665424707b585.png',
                'slug' => 'xEZtwqzAAQtNka8TayQX',
                'created_at' => '2024-05-27 05:42:49',
                'updated_at' => '2024-05-27 06:13:04',
            ),
            419 => 
            array (
                'id' => 2010,
                'presensi_id' => 127,
                'peserta_id' => 21,
                'sign' => '665423aae9391.png',
                'slug' => 'se6WZaMBFljk8EOLfY8r',
                'created_at' => '2024-05-27 05:42:54',
                'updated_at' => '2024-05-27 06:09:46',
            ),
            420 => 
            array (
                'id' => 2011,
                'presensi_id' => 127,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'yVzHTdh2TePaH101be6l',
                'created_at' => '2024-05-27 05:42:58',
                'updated_at' => '2024-05-27 05:42:58',
            ),
            421 => 
            array (
                'id' => 2012,
                'presensi_id' => 127,
                'peserta_id' => 38,
                'sign' => '66542510abad6.png',
                'slug' => 'QRm4awATs36jLKBlTlaQ',
                'created_at' => '2024-05-27 05:43:02',
                'updated_at' => '2024-05-27 06:15:44',
            ),
            422 => 
            array (
                'id' => 2013,
                'presensi_id' => 127,
                'peserta_id' => 102,
                'sign' => '6654251fbabe6.png',
                'slug' => 'xf15HlUs0D2Xn8sWNahn',
                'created_at' => '2024-05-27 05:43:22',
                'updated_at' => '2024-05-27 06:15:59',
            ),
            423 => 
            array (
                'id' => 2014,
                'presensi_id' => 127,
                'peserta_id' => 152,
                'sign' => '665424f7aa50a.png',
                'slug' => 'brBPceYeue4eDLNw5mPn',
                'created_at' => '2024-05-27 05:43:27',
                'updated_at' => '2024-05-27 06:15:19',
            ),
            424 => 
            array (
                'id' => 2015,
                'presensi_id' => 127,
                'peserta_id' => 212,
                'sign' => '6654241ed473e.png',
                'slug' => 'fEw08NFfXH2RSiqcqYoe',
                'created_at' => '2024-05-27 06:11:29',
                'updated_at' => '2024-05-27 06:11:42',
            ),
            425 => 
            array (
                'id' => 2016,
                'presensi_id' => 128,
                'peserta_id' => 5,
                'sign' => '6655ac25a3f46.png',
                'slug' => 'lfzwXHR5yOw3vPaELjPe',
                'created_at' => '2024-05-28 09:57:09',
                'updated_at' => '2024-05-28 10:04:21',
            ),
            426 => 
            array (
                'id' => 2017,
                'presensi_id' => 128,
                'peserta_id' => 6,
                'sign' => '6655ac14ad62e.png',
                'slug' => '42AfAvR3bOWthwl5gMe6',
                'created_at' => '2024-05-28 09:57:27',
                'updated_at' => '2024-05-28 10:04:04',
            ),
            427 => 
            array (
                'id' => 2018,
                'presensi_id' => 128,
                'peserta_id' => 9,
                'sign' => '6655ad47d4757.png',
                'slug' => 'ZOax5twMhaHYcRigfczZ',
                'created_at' => '2024-05-28 09:57:32',
                'updated_at' => '2024-05-28 10:09:11',
            ),
            428 => 
            array (
                'id' => 2019,
                'presensi_id' => 128,
                'peserta_id' => 10,
                'sign' => '6655ad453540a.png',
                'slug' => 'WKQTRHsENDxmOkXPDyqS',
                'created_at' => '2024-05-28 09:57:39',
                'updated_at' => '2024-05-28 10:09:09',
            ),
            429 => 
            array (
                'id' => 2020,
                'presensi_id' => 128,
                'peserta_id' => 85,
                'sign' => '6655ae7037a9f.png',
                'slug' => 'YhWI2oSUMV8CBrIg0m75',
                'created_at' => '2024-05-28 09:57:47',
                'updated_at' => '2024-05-28 10:14:08',
            ),
            430 => 
            array (
                'id' => 2021,
                'presensi_id' => 128,
                'peserta_id' => 52,
                'sign' => '6655b2b9b5074.png',
                'slug' => 'XbwLDE237BIIKb9Kx219',
                'created_at' => '2024-05-28 09:57:51',
                'updated_at' => '2024-05-28 10:32:25',
            ),
            431 => 
            array (
                'id' => 2022,
                'presensi_id' => 128,
                'peserta_id' => 12,
                'sign' => '6655b1d16b7a9.png',
                'slug' => 'vlzwUO6DxkuZUtaRoxcy',
                'created_at' => '2024-05-28 09:57:59',
                'updated_at' => '2024-05-28 10:28:33',
            ),
            432 => 
            array (
                'id' => 2024,
                'presensi_id' => 128,
                'peserta_id' => 107,
                'sign' => '6655ae7c415aa.png',
                'slug' => '1c8cWhWFd7H03zoS4jYp',
                'created_at' => '2024-05-28 09:58:08',
                'updated_at' => '2024-05-28 10:14:20',
            ),
            433 => 
            array (
                'id' => 2025,
                'presensi_id' => 128,
                'peserta_id' => 108,
                'sign' => '6655acca273ff.png',
                'slug' => 'f1pWpqeqVLoddawGLD80',
                'created_at' => '2024-05-28 09:58:13',
                'updated_at' => '2024-05-28 10:07:06',
            ),
            434 => 
            array (
                'id' => 2026,
                'presensi_id' => 128,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'HaRxUBnRXRODwYYRtF9V',
                'created_at' => '2024-05-28 09:58:18',
                'updated_at' => '2024-05-28 09:58:18',
            ),
            435 => 
            array (
                'id' => 2027,
                'presensi_id' => 128,
                'peserta_id' => 21,
                'sign' => '6655b054b3aa3.png',
                'slug' => 'b3nHzx6KelBenul0OIgJ',
                'created_at' => '2024-05-28 09:58:22',
                'updated_at' => '2024-05-28 10:22:12',
            ),
            436 => 
            array (
                'id' => 2028,
                'presensi_id' => 128,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => '4XOK1RfqUOS45h3cTT9Y',
                'created_at' => '2024-05-28 09:58:27',
                'updated_at' => '2024-05-28 09:58:27',
            ),
            437 => 
            array (
                'id' => 2029,
                'presensi_id' => 128,
                'peserta_id' => 38,
                'sign' => '6655adc54660d.png',
                'slug' => 'DvRszHdww7lAkhkURi2P',
                'created_at' => '2024-05-28 09:58:32',
                'updated_at' => '2024-05-28 10:11:17',
            ),
            438 => 
            array (
                'id' => 2030,
                'presensi_id' => 128,
                'peserta_id' => 102,
                'sign' => '6655afb3e8764.png',
                'slug' => 'DKPEpBbDs1D16OkKX2Uh',
                'created_at' => '2024-05-28 09:58:38',
                'updated_at' => '2024-05-28 10:19:31',
            ),
            439 => 
            array (
                'id' => 2031,
                'presensi_id' => 128,
                'peserta_id' => 152,
                'sign' => '6655af239dd42.png',
                'slug' => 'RsLJdKrOECzDGkdZVuoy',
                'created_at' => '2024-05-28 09:58:47',
                'updated_at' => '2024-05-28 10:17:07',
            ),
            440 => 
            array (
                'id' => 2032,
                'presensi_id' => 129,
                'peserta_id' => 6,
                'sign' => '6661669133c5d.png',
                'slug' => 'Fm1khMjQjLcpBS269CE6',
                'created_at' => '2024-06-06 05:17:30',
                'updated_at' => '2024-06-06 07:34:41',
            ),
            441 => 
            array (
                'id' => 2033,
                'presensi_id' => 129,
                'peserta_id' => 18,
                'sign' => '66616905d45c8.png',
                'slug' => 'Vop5h83IsuZRKmnkLLyU',
                'created_at' => '2024-06-06 07:11:05',
                'updated_at' => '2024-06-06 07:45:09',
            ),
            442 => 
            array (
                'id' => 2034,
                'presensi_id' => 129,
                'peserta_id' => 103,
                'sign' => '6661620b57ef2.png',
                'slug' => 'FAxnfCCApMWk3ZWTbxyK',
                'created_at' => '2024-06-06 07:11:46',
                'updated_at' => '2024-06-06 07:15:23',
            ),
            443 => 
            array (
                'id' => 2035,
                'presensi_id' => 129,
                'peserta_id' => 39,
                'sign' => '666162565785f.png',
                'slug' => 'gMeK9qGwLmnqOJKGGq0P',
                'created_at' => '2024-06-06 07:11:56',
                'updated_at' => '2024-06-06 07:16:38',
            ),
            444 => 
            array (
                'id' => 2036,
                'presensi_id' => 129,
                'peserta_id' => 27,
                'sign' => '666161f070d6d.png',
                'slug' => 'OPGdkbT50Ox2eCjZOAwP',
                'created_at' => '2024-06-06 07:12:07',
                'updated_at' => '2024-06-06 07:14:56',
            ),
            445 => 
            array (
                'id' => 2037,
                'presensi_id' => 129,
                'peserta_id' => 52,
                'sign' => '6661749ad7b0c.png',
                'slug' => 'K25YR0XTYKkbPV28OvLn',
                'created_at' => '2024-06-06 07:12:40',
                'updated_at' => '2024-06-06 08:34:34',
            ),
            446 => 
            array (
                'id' => 2038,
                'presensi_id' => 129,
                'peserta_id' => 14,
                'sign' => '6661621350639.png',
                'slug' => '664SWD8MEUiGykSSsGXW',
                'created_at' => '2024-06-06 07:13:36',
                'updated_at' => '2024-06-06 07:15:31',
            ),
            447 => 
            array (
                'id' => 2039,
                'presensi_id' => 130,
                'peserta_id' => 5,
                'sign' => '666bc308990fd.png',
                'slug' => 'xnufzYzLGjpLrwvcHCga',
                'created_at' => '2024-06-14 03:04:00',
                'updated_at' => '2024-06-14 04:11:52',
            ),
            448 => 
            array (
                'id' => 2040,
                'presensi_id' => 130,
                'peserta_id' => 6,
                'sign' => '666bb5b1ce7f7.png',
                'slug' => 'ZsOq4bc1MFmwSEcfioSW',
                'created_at' => '2024-06-14 03:04:58',
                'updated_at' => '2024-06-14 03:14:57',
            ),
            449 => 
            array (
                'id' => 2041,
                'presensi_id' => 130,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'MQnTgzIDcMfkcRKka822',
                'created_at' => '2024-06-14 03:05:03',
                'updated_at' => '2024-06-14 03:05:03',
            ),
            450 => 
            array (
                'id' => 2042,
                'presensi_id' => 130,
                'peserta_id' => 10,
                'sign' => '666bbaab4b91f.png',
                'slug' => '1VWihq7BNSMFVZTSHarD',
                'created_at' => '2024-06-14 03:05:10',
                'updated_at' => '2024-06-14 03:36:11',
            ),
            451 => 
            array (
                'id' => 2043,
                'presensi_id' => 130,
                'peserta_id' => 85,
                'sign' => '666bc38e72cd2.png',
                'slug' => 'B0rsnlpDzJPWrhjwQDh9',
                'created_at' => '2024-06-14 03:05:15',
                'updated_at' => '2024-06-14 04:14:06',
            ),
            452 => 
            array (
                'id' => 2044,
                'presensi_id' => 130,
                'peserta_id' => 52,
                'sign' => '666bb6395abe8.png',
                'slug' => 'izCVCF8ALIzVxuxawaOj',
                'created_at' => '2024-06-14 03:05:20',
                'updated_at' => '2024-06-14 03:17:13',
            ),
            453 => 
            array (
                'id' => 2045,
                'presensi_id' => 130,
                'peserta_id' => 12,
                'sign' => '666bb52c9efbb.png',
                'slug' => 'uhzSKxIidLCKu74nWjMT',
                'created_at' => '2024-06-14 03:05:27',
                'updated_at' => '2024-06-14 03:12:44',
            ),
            454 => 
            array (
                'id' => 2046,
                'presensi_id' => 130,
                'peserta_id' => 107,
                'sign' => '666bb57ea7969.png',
                'slug' => 'VbaelhkbwwQTSfK5QA95',
                'created_at' => '2024-06-14 03:05:31',
                'updated_at' => '2024-06-14 03:14:06',
            ),
            455 => 
            array (
                'id' => 2047,
                'presensi_id' => 130,
                'peserta_id' => 108,
                'sign' => '666bb5b9f0955.png',
                'slug' => 'KWyxbJ4YbylnMTOIITnv',
                'created_at' => '2024-06-14 03:05:36',
                'updated_at' => '2024-06-14 03:15:05',
            ),
            456 => 
            array (
                'id' => 2048,
                'presensi_id' => 130,
                'peserta_id' => 109,
                'sign' => '666bc40cc996e.png',
                'slug' => 'LXhXaNIv0VjnzJLtVUF8',
                'created_at' => '2024-06-14 03:05:42',
                'updated_at' => '2024-06-14 04:16:12',
            ),
            457 => 
            array (
                'id' => 2049,
                'presensi_id' => 130,
                'peserta_id' => 21,
                'sign' => '666bb4cb22acf.png',
                'slug' => '9HkqYtBimbFNQfDhIGQg',
                'created_at' => '2024-06-14 03:05:47',
                'updated_at' => '2024-06-14 03:11:07',
            ),
            458 => 
            array (
                'id' => 2050,
                'presensi_id' => 130,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'AsZ2TgaE0BzYYdpR9ETp',
                'created_at' => '2024-06-14 03:05:53',
                'updated_at' => '2024-06-14 03:05:53',
            ),
            459 => 
            array (
                'id' => 2051,
                'presensi_id' => 130,
                'peserta_id' => 38,
                'sign' => '666bc38d3bdbc.png',
                'slug' => 'NNDhk9zpOn3Lc28aXWBg',
                'created_at' => '2024-06-14 03:05:57',
                'updated_at' => '2024-06-14 04:14:05',
            ),
            460 => 
            array (
                'id' => 2052,
                'presensi_id' => 130,
                'peserta_id' => 111,
                'sign' => '666bb516724dc.png',
                'slug' => 'A3s6vtWi4jbjCzHegUQ8',
                'created_at' => '2024-06-14 03:06:02',
                'updated_at' => '2024-06-14 03:12:22',
            ),
            461 => 
            array (
                'id' => 2053,
                'presensi_id' => 130,
                'peserta_id' => 151,
                'sign' => '666bc0e2cf2db.png',
                'slug' => 'Gih6qfbVUjHcqILQ1bfi',
                'created_at' => '2024-06-14 03:06:07',
                'updated_at' => '2024-06-14 04:02:42',
            ),
            462 => 
            array (
                'id' => 2054,
                'presensi_id' => 131,
                'peserta_id' => 5,
                'sign' => '66872cbd5f763.png',
                'slug' => 'AYfv0ylIZTkaJXhRBN8S',
                'created_at' => '2024-07-04 23:10:46',
                'updated_at' => '2024-07-04 23:14:05',
            ),
            463 => 
            array (
                'id' => 2055,
                'presensi_id' => 131,
                'peserta_id' => 10,
                'sign' => '66872f95b75ca.png',
                'slug' => 't1mimfjEmt8VKe5Z2XOs',
                'created_at' => '2024-07-04 23:10:56',
                'updated_at' => '2024-07-04 23:26:13',
            ),
            464 => 
            array (
                'id' => 2056,
                'presensi_id' => 131,
                'peserta_id' => 9,
                'sign' => '66873de40383d.png',
                'slug' => 'dXv3tmrcvxwDPKP8dNxP',
                'created_at' => '2024-07-04 23:11:01',
                'updated_at' => '2024-07-05 00:27:16',
            ),
            465 => 
            array (
                'id' => 2057,
                'presensi_id' => 131,
                'peserta_id' => 85,
                'sign' => '66873e7d3ab29.png',
                'slug' => 'wTYQ7DazKQ2wnFjfLUxB',
                'created_at' => '2024-07-04 23:11:06',
                'updated_at' => '2024-07-05 00:29:49',
            ),
            466 => 
            array (
                'id' => 2058,
                'presensi_id' => 131,
                'peserta_id' => 52,
                'sign' => '66873e9091750.png',
                'slug' => 'y1oLHRWXf5gFGM8h053q',
                'created_at' => '2024-07-04 23:11:11',
                'updated_at' => '2024-07-05 00:30:08',
            ),
            467 => 
            array (
                'id' => 2059,
                'presensi_id' => 131,
                'peserta_id' => 12,
                'sign' => '66872f92f3311.png',
                'slug' => 'JLU1s3qSSfLQS35VtZu9',
                'created_at' => '2024-07-04 23:11:18',
                'updated_at' => '2024-07-04 23:26:11',
            ),
            468 => 
            array (
                'id' => 2060,
                'presensi_id' => 131,
                'peserta_id' => 107,
                'sign' => '66872ce336553.png',
                'slug' => '8OpdHWIllNPY3rodUSjc',
                'created_at' => '2024-07-04 23:11:23',
                'updated_at' => '2024-07-04 23:14:43',
            ),
            469 => 
            array (
                'id' => 2061,
                'presensi_id' => 131,
                'peserta_id' => 109,
                'sign' => '66872de6d7afd.png',
                'slug' => 'ZjAVdhhBdOIsrIfONQP3',
                'created_at' => '2024-07-04 23:11:29',
                'updated_at' => '2024-07-04 23:19:02',
            ),
            470 => 
            array (
                'id' => 2062,
                'presensi_id' => 131,
                'peserta_id' => 108,
                'sign' => '66872d034eaf0.png',
                'slug' => 'SSuySyARlZqLWCnvPecs',
                'created_at' => '2024-07-04 23:11:37',
                'updated_at' => '2024-07-04 23:15:15',
            ),
            471 => 
            array (
                'id' => 2063,
                'presensi_id' => 131,
                'peserta_id' => 11,
                'sign' => NULL,
                'slug' => 'bpoaUYQuvfYdOzlKaZNy',
                'created_at' => '2024-07-04 23:11:43',
                'updated_at' => '2024-07-04 23:11:43',
            ),
            472 => 
            array (
                'id' => 2064,
                'presensi_id' => 132,
                'peserta_id' => 5,
                'sign' => '66981e3169e27.png',
                'slug' => 'Q7o7rhtlcgvNkMOwjbZt',
                'created_at' => '2024-07-17 19:06:07',
                'updated_at' => '2024-07-17 19:40:33',
            ),
            473 => 
            array (
                'id' => 2065,
                'presensi_id' => 132,
                'peserta_id' => 9,
                'sign' => '66981ed104be1.png',
                'slug' => 'lRbLTfjMNyi1FZzpY4cn',
                'created_at' => '2024-07-17 19:06:44',
                'updated_at' => '2024-07-17 19:43:13',
            ),
            474 => 
            array (
                'id' => 2066,
                'presensi_id' => 132,
                'peserta_id' => 52,
                'sign' => '66981e88dc40e.png',
                'slug' => 'IE2bOrPdTUBBXzQStsO8',
                'created_at' => '2024-07-17 19:06:52',
                'updated_at' => '2024-07-17 19:42:00',
            ),
            475 => 
            array (
                'id' => 2067,
                'presensi_id' => 132,
                'peserta_id' => 10,
                'sign' => '66981e7b1df2b.png',
                'slug' => 'HXNT4ujp0UhlCulEycMa',
                'created_at' => '2024-07-17 19:06:58',
                'updated_at' => '2024-07-17 19:41:47',
            ),
            476 => 
            array (
                'id' => 2068,
                'presensi_id' => 132,
                'peserta_id' => 85,
                'sign' => '669823beb247a.png',
                'slug' => 'y3AtcfJB3Ra9pZhx98Jz',
                'created_at' => '2024-07-17 19:07:03',
                'updated_at' => '2024-07-17 20:04:14',
            ),
            477 => 
            array (
                'id' => 2070,
                'presensi_id' => 132,
                'peserta_id' => 12,
                'sign' => '6698224e9fd8c.png',
                'slug' => 'f2Pnwq6KodwRvHhyWKyl',
                'created_at' => '2024-07-17 19:07:14',
                'updated_at' => '2024-07-17 19:58:06',
            ),
            478 => 
            array (
                'id' => 2071,
                'presensi_id' => 132,
                'peserta_id' => 107,
                'sign' => '66981fc733861.png',
                'slug' => 'hZPi3cIwd4jNtJ4XLJYk',
                'created_at' => '2024-07-17 19:07:18',
                'updated_at' => '2024-07-17 19:47:19',
            ),
            479 => 
            array (
                'id' => 2072,
                'presensi_id' => 132,
                'peserta_id' => 108,
                'sign' => '66981fced3092.png',
                'slug' => 'xTCnJvKTsc1CvuRt6ivw',
                'created_at' => '2024-07-17 19:07:23',
                'updated_at' => '2024-07-17 19:47:26',
            ),
            480 => 
            array (
                'id' => 2073,
                'presensi_id' => 132,
                'peserta_id' => 109,
                'sign' => '669822dd54b5f.png',
                'slug' => 'lGXPGqi2NannQmM2IDY8',
                'created_at' => '2024-07-17 19:07:27',
                'updated_at' => '2024-07-17 20:00:29',
            ),
            481 => 
            array (
                'id' => 2078,
                'presensi_id' => 132,
                'peserta_id' => 152,
                'sign' => '66982166ca205.png',
                'slug' => 'm6SUR3pblIe4KrgQmIA8',
                'created_at' => '2024-07-17 19:08:05',
                'updated_at' => '2024-07-17 19:54:14',
            ),
            482 => 
            array (
                'id' => 2079,
                'presensi_id' => 132,
                'peserta_id' => 102,
                'sign' => '669826c88bac2.png',
                'slug' => 'Pm2iqwC4zqMBOcfKJ7Ue',
                'created_at' => '2024-07-17 19:08:09',
                'updated_at' => '2024-07-17 20:17:12',
            ),
            483 => 
            array (
                'id' => 2080,
                'presensi_id' => 132,
                'peserta_id' => 6,
                'sign' => '66981ffcf283c.png',
                'slug' => 'B104URC9tRH4yaS4JzGY',
                'created_at' => '2024-07-17 19:47:53',
                'updated_at' => '2024-07-17 19:48:12',
            ),
            484 => 
            array (
                'id' => 2081,
                'presensi_id' => 133,
                'peserta_id' => 25,
                'sign' => NULL,
                'slug' => 'pRInW5poLKp7EJO5OfVu',
                'created_at' => '2024-08-01 22:21:57',
                'updated_at' => '2024-08-01 22:21:57',
            ),
            485 => 
            array (
                'id' => 2082,
                'presensi_id' => 133,
                'peserta_id' => 26,
                'sign' => NULL,
                'slug' => 'bHHZNYoxIOZ3Spm3kUto',
                'created_at' => '2024-08-01 22:22:21',
                'updated_at' => '2024-08-01 22:22:21',
            ),
            486 => 
            array (
                'id' => 2083,
                'presensi_id' => 133,
                'peserta_id' => 31,
                'sign' => NULL,
                'slug' => 'VsWjnra7xdo9SbLxCABZ',
                'created_at' => '2024-08-01 22:22:29',
                'updated_at' => '2024-08-01 22:22:29',
            ),
            487 => 
            array (
                'id' => 2084,
                'presensi_id' => 133,
                'peserta_id' => 110,
                'sign' => NULL,
                'slug' => 'D1fHp6ocUbAuVOv6tACH',
                'created_at' => '2024-08-01 22:22:35',
                'updated_at' => '2024-08-01 22:22:35',
            ),
            488 => 
            array (
                'id' => 2085,
                'presensi_id' => 133,
                'peserta_id' => 97,
                'sign' => NULL,
                'slug' => '3VEbVhwgYaotoB5UjZjO',
                'created_at' => '2024-08-01 22:22:40',
                'updated_at' => '2024-08-01 22:22:40',
            ),
            489 => 
            array (
                'id' => 2086,
                'presensi_id' => 133,
                'peserta_id' => 103,
                'sign' => NULL,
                'slug' => 'fhCKHR04viDUyQUc0skm',
                'created_at' => '2024-08-01 22:22:45',
                'updated_at' => '2024-08-01 22:22:45',
            ),
            490 => 
            array (
                'id' => 2087,
                'presensi_id' => 133,
                'peserta_id' => 23,
                'sign' => NULL,
                'slug' => 'isppH9G6sRIEVtuyqust',
                'created_at' => '2024-08-01 22:22:51',
                'updated_at' => '2024-08-01 22:22:51',
            ),
            491 => 
            array (
                'id' => 2089,
                'presensi_id' => 134,
                'peserta_id' => 5,
                'sign' => '66ce59181a1f7.png',
                'slug' => 'OwaAwkoE8oMlX7kDI4se',
                'created_at' => '2024-08-27 19:32:31',
                'updated_at' => '2024-08-27 22:54:16',
            ),
            492 => 
            array (
                'id' => 2090,
                'presensi_id' => 134,
                'peserta_id' => 9,
                'sign' => '66ce5b045b855.png',
                'slug' => 'PUwpP3J2mQUqtmxGt7Jw',
                'created_at' => '2024-08-27 22:14:37',
                'updated_at' => '2024-08-27 23:02:28',
            ),
            493 => 
            array (
                'id' => 2091,
                'presensi_id' => 134,
                'peserta_id' => 52,
                'sign' => '66ce5b2243f61.png',
                'slug' => '2ojwYTxglnYTCMajGh1i',
                'created_at' => '2024-08-27 22:14:45',
                'updated_at' => '2024-08-27 23:02:58',
            ),
            494 => 
            array (
                'id' => 2092,
                'presensi_id' => 134,
                'peserta_id' => 10,
                'sign' => '66ce5a438c194.png',
                'slug' => 'amdkF0VcFyQ1YpkLbQt7',
                'created_at' => '2024-08-27 22:14:50',
                'updated_at' => '2024-08-27 22:59:15',
            ),
            495 => 
            array (
                'id' => 2093,
                'presensi_id' => 134,
                'peserta_id' => 85,
                'sign' => '66ce680a7c766.png',
                'slug' => 'sFg6KVUHlhkt5nMM9be3',
                'created_at' => '2024-08-27 22:14:54',
                'updated_at' => '2024-08-27 23:58:02',
            ),
            496 => 
            array (
                'id' => 2094,
                'presensi_id' => 134,
                'peserta_id' => 12,
                'sign' => '66ce59b916035.png',
                'slug' => 'X2J1ONHZOfMQbBaU1BU8',
                'created_at' => '2024-08-27 22:15:02',
                'updated_at' => '2024-08-27 22:56:57',
            ),
            497 => 
            array (
                'id' => 2095,
                'presensi_id' => 134,
                'peserta_id' => 107,
                'sign' => '66ce57a922b30.png',
                'slug' => 'qqLK1bwevn1UPz2o2OXv',
                'created_at' => '2024-08-27 22:15:07',
                'updated_at' => '2024-08-27 22:48:09',
            ),
            498 => 
            array (
                'id' => 2096,
                'presensi_id' => 134,
                'peserta_id' => 109,
                'sign' => '66ce5ac38d666.png',
                'slug' => '9LSsF4JDHk55R0ZZHgiA',
                'created_at' => '2024-08-27 22:15:13',
                'updated_at' => '2024-08-27 23:01:23',
            ),
            499 => 
            array (
                'id' => 2098,
                'presensi_id' => 134,
                'peserta_id' => 21,
                'sign' => '66ce721ee886b.png',
                'slug' => 'PatnUCl7D50N7EkIxtvZ',
                'created_at' => '2024-08-27 22:16:52',
                'updated_at' => '2024-08-28 00:41:02',
            ),
        ));
        \DB::table('kehadirans')->insert(array (
            0 => 
            array (
                'id' => 2099,
                'presensi_id' => 134,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'B4ImkIf3VQFHiFE49Zkk',
                'created_at' => '2024-08-27 22:16:56',
                'updated_at' => '2024-08-27 22:16:56',
            ),
            1 => 
            array (
                'id' => 2100,
                'presensi_id' => 134,
                'peserta_id' => 38,
                'sign' => '66ce5b3758b9f.png',
                'slug' => 'ASUkW0oOGTX7CXNQ0ZhL',
                'created_at' => '2024-08-27 22:17:01',
                'updated_at' => '2024-08-27 23:03:19',
            ),
            2 => 
            array (
                'id' => 2101,
                'presensi_id' => 134,
                'peserta_id' => 119,
                'sign' => NULL,
                'slug' => 'U3fLB2WUv9NWJj16mMbo',
                'created_at' => '2024-08-27 22:17:10',
                'updated_at' => '2024-08-27 22:17:10',
            ),
            3 => 
            array (
                'id' => 2102,
                'presensi_id' => 134,
                'peserta_id' => 151,
                'sign' => '66ce5f7e2221b.png',
                'slug' => '4ms4hRTkJqdsfr5nmamZ',
                'created_at' => '2024-08-27 22:17:22',
                'updated_at' => '2024-08-27 23:21:34',
            ),
            4 => 
            array (
                'id' => 2103,
                'presensi_id' => 134,
                'peserta_id' => 111,
                'sign' => '66ce635bd5b27.png',
                'slug' => 'NJnQzNAPxIVHZEeeVGJQ',
                'created_at' => '2024-08-27 22:17:27',
                'updated_at' => '2024-08-27 23:38:03',
            ),
            5 => 
            array (
                'id' => 2104,
                'presensi_id' => 134,
                'peserta_id' => 91,
                'sign' => '66ce621c3c5e3.png',
                'slug' => '9DiXA5iM5XaYxfrNnMd8',
                'created_at' => '2024-08-27 22:17:31',
                'updated_at' => '2024-08-27 23:32:44',
            ),
            6 => 
            array (
                'id' => 2105,
                'presensi_id' => 134,
                'peserta_id' => 89,
                'sign' => '66ce5b6ae2e79.png',
                'slug' => 'ElWf5g8sgIyCF6pvSZMu',
                'created_at' => '2024-08-27 22:17:36',
                'updated_at' => '2024-08-27 23:04:10',
            ),
            7 => 
            array (
                'id' => 2106,
                'presensi_id' => 134,
                'peserta_id' => 86,
                'sign' => '66ce5ae74feef.png',
                'slug' => 'FrAdsWz7Ud1c343vLTVD',
                'created_at' => '2024-08-27 22:17:42',
                'updated_at' => '2024-08-27 23:01:59',
            ),
            8 => 
            array (
                'id' => 2107,
                'presensi_id' => 134,
                'peserta_id' => 32,
                'sign' => '66ce59c143df2.png',
                'slug' => 'CJFuvT4SmxLlz2ndHsUz',
                'created_at' => '2024-08-27 22:17:48',
                'updated_at' => '2024-08-27 22:57:05',
            ),
            9 => 
            array (
                'id' => 2108,
                'presensi_id' => 134,
                'peserta_id' => 218,
                'sign' => '66ce5aa010f4d.png',
                'slug' => '0ShLLFsLMqPQhWyaZ72G',
                'created_at' => '2024-08-27 22:17:53',
                'updated_at' => '2024-08-27 23:00:48',
            ),
            10 => 
            array (
                'id' => 2109,
                'presensi_id' => 134,
                'peserta_id' => 98,
                'sign' => '66ce596234e44.png',
                'slug' => '6rcWCEKFoNFwpUos3WYO',
                'created_at' => '2024-08-27 22:17:58',
                'updated_at' => '2024-08-27 22:55:30',
            ),
            11 => 
            array (
                'id' => 2110,
                'presensi_id' => 134,
                'peserta_id' => 105,
                'sign' => '66ce5c43e09a2.png',
                'slug' => '7jPpsD0Y5qxemaQv34bG',
                'created_at' => '2024-08-27 22:18:02',
                'updated_at' => '2024-08-27 23:07:47',
            ),
            12 => 
            array (
                'id' => 2111,
                'presensi_id' => 134,
                'peserta_id' => 212,
                'sign' => '66ce59b350d8f.png',
                'slug' => 'rXG9BnrrmU8nHrdY7GXc',
                'created_at' => '2024-08-27 22:18:07',
                'updated_at' => '2024-08-27 22:56:51',
            ),
            13 => 
            array (
                'id' => 2112,
                'presensi_id' => 134,
                'peserta_id' => 6,
                'sign' => '66ce59b5e67a1.png',
                'slug' => 'NX8OJAAoVmfHNwqstRof',
                'created_at' => '2024-08-27 22:19:15',
                'updated_at' => '2024-08-27 22:56:53',
            ),
            14 => 
            array (
                'id' => 2113,
                'presensi_id' => 134,
                'peserta_id' => 108,
                'sign' => '66ce59c18db2c.png',
                'slug' => 'WjHC6vtaSUPSlxQQJaCY',
                'created_at' => '2024-08-27 22:19:21',
                'updated_at' => '2024-08-27 22:57:05',
            ),
            15 => 
            array (
                'id' => 2115,
                'presensi_id' => 134,
                'peserta_id' => 57,
                'sign' => '66ce5f730879a.png',
                'slug' => '0CKRn6qXp5m1ozfZKGIw',
                'created_at' => '2024-08-27 22:19:34',
                'updated_at' => '2024-08-27 23:21:23',
            ),
            16 => 
            array (
                'id' => 2116,
                'presensi_id' => 134,
                'peserta_id' => 16,
                'sign' => '66ce5a6540441.png',
                'slug' => 's7pHEXCpDo27pgqrQioE',
                'created_at' => '2024-08-27 22:57:53',
                'updated_at' => '2024-08-27 22:59:49',
            ),
            17 => 
            array (
                'id' => 2117,
                'presensi_id' => 135,
                'peserta_id' => 5,
                'sign' => '66d5061d91d6e.png',
                'slug' => 'peMpLNqq6kuhLCrJKIwj',
                'created_at' => '2024-09-01 22:57:55',
                'updated_at' => '2024-09-02 00:26:05',
            ),
            18 => 
            array (
                'id' => 2118,
                'presensi_id' => 135,
                'peserta_id' => 52,
                'sign' => '66d50aea21d24.png',
                'slug' => 't5fOCY7taR4JJFNIkTgI',
                'created_at' => '2024-09-01 22:58:06',
                'updated_at' => '2024-09-02 00:46:34',
            ),
            19 => 
            array (
                'id' => 2119,
                'presensi_id' => 135,
                'peserta_id' => 85,
                'sign' => '66d5099ebc960.png',
                'slug' => 'anICtSga6DYDKuVIsz2F',
                'created_at' => '2024-09-01 22:58:10',
                'updated_at' => '2024-09-02 00:41:02',
            ),
            20 => 
            array (
                'id' => 2120,
                'presensi_id' => 135,
                'peserta_id' => 12,
                'sign' => '66d509e75913e.png',
                'slug' => 'DMGqekd68xaVXiSLiLA6',
                'created_at' => '2024-09-01 22:58:18',
                'updated_at' => '2024-09-02 00:42:15',
            ),
            21 => 
            array (
                'id' => 2121,
                'presensi_id' => 135,
                'peserta_id' => 21,
                'sign' => '66d5152d40bda.png',
                'slug' => 'aHSKZ5x2vhtUJWW6IPi2',
                'created_at' => '2024-09-01 22:58:24',
                'updated_at' => '2024-09-02 01:30:21',
            ),
            22 => 
            array (
                'id' => 2122,
                'presensi_id' => 135,
                'peserta_id' => 107,
                'sign' => '66d50f51b07c1.png',
                'slug' => '8ayI3Ui9BLZFvsDA13LX',
                'created_at' => '2024-09-01 22:58:30',
                'updated_at' => '2024-09-02 01:05:21',
            ),
            23 => 
            array (
                'id' => 2123,
                'presensi_id' => 135,
                'peserta_id' => 20,
                'sign' => NULL,
                'slug' => 'SnwPTiz4YSAoqa8S2Upc',
                'created_at' => '2024-09-02 00:15:52',
                'updated_at' => '2024-09-02 00:15:52',
            ),
            24 => 
            array (
                'id' => 2124,
                'presensi_id' => 135,
                'peserta_id' => 15,
                'sign' => '66d5448122443.png',
                'slug' => 'ZzruNsyzaKM5XwtlcMSj',
                'created_at' => '2024-09-02 00:15:57',
                'updated_at' => '2024-09-02 04:52:17',
            ),
            25 => 
            array (
                'id' => 2125,
                'presensi_id' => 135,
                'peserta_id' => 112,
                'sign' => '66d5764458d62.png',
                'slug' => 'r0oLJsfCW4koesucK00u',
                'created_at' => '2024-09-02 00:16:02',
                'updated_at' => '2024-09-02 08:24:36',
            ),
            26 => 
            array (
                'id' => 2126,
                'presensi_id' => 135,
                'peserta_id' => 98,
                'sign' => '66d50bb451cb6.png',
                'slug' => 'ZcA1NqHQ5gzDppC1XFkj',
                'created_at' => '2024-09-02 00:16:09',
                'updated_at' => '2024-09-02 00:49:56',
            ),
            27 => 
            array (
                'id' => 2127,
                'presensi_id' => 135,
                'peserta_id' => 218,
                'sign' => '66d508a850b83.png',
                'slug' => '2Vuj8SWhGss1kbLwxqu0',
                'created_at' => '2024-09-02 00:16:13',
                'updated_at' => '2024-09-02 00:36:56',
            ),
            28 => 
            array (
                'id' => 2128,
                'presensi_id' => 135,
                'peserta_id' => 9,
                'sign' => '66d50860a0461.png',
                'slug' => 'qH81xUBcQJQ7tadDlVtt',
                'created_at' => '2024-09-02 00:16:19',
                'updated_at' => '2024-09-02 00:35:44',
            ),
            29 => 
            array (
                'id' => 2129,
                'presensi_id' => 135,
                'peserta_id' => 212,
                'sign' => '66d50af7bc995.png',
                'slug' => 'cQL3WJlfW9nMZVXB7L9k',
                'created_at' => '2024-09-02 00:16:25',
                'updated_at' => '2024-09-02 00:46:47',
            ),
            30 => 
            array (
                'id' => 2130,
                'presensi_id' => 135,
                'peserta_id' => 105,
                'sign' => '66d50ceb55aba.png',
                'slug' => 'S875ZBg8IvLkgS5W8qvO',
                'created_at' => '2024-09-02 00:16:30',
                'updated_at' => '2024-09-02 00:55:07',
            ),
            31 => 
            array (
                'id' => 2131,
                'presensi_id' => 135,
                'peserta_id' => 10,
                'sign' => '66d50fbaad440.png',
                'slug' => 'FZfhfcjB4ImYJLa6kY28',
                'created_at' => '2024-09-02 00:16:36',
                'updated_at' => '2024-09-02 01:07:06',
            ),
            32 => 
            array (
                'id' => 2132,
                'presensi_id' => 135,
                'peserta_id' => 109,
                'sign' => '66d50b4cbc3ba.png',
                'slug' => 'ABgg6tlCWbbrV5opO0C0',
                'created_at' => '2024-09-02 00:16:42',
                'updated_at' => '2024-09-02 00:48:12',
            ),
            33 => 
            array (
                'id' => 2133,
                'presensi_id' => 135,
                'peserta_id' => 108,
                'sign' => '66d50f5938f8b.png',
                'slug' => '5bsEBhQpYSWn9EUHZNZ6',
                'created_at' => '2024-09-02 00:21:13',
                'updated_at' => '2024-09-02 01:05:29',
            ),
            34 => 
            array (
                'id' => 2135,
                'presensi_id' => 135,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'CroREj0r2HY8PrFSnFEG',
                'created_at' => '2024-09-02 00:21:29',
                'updated_at' => '2024-09-02 00:21:29',
            ),
            35 => 
            array (
                'id' => 2136,
                'presensi_id' => 135,
                'peserta_id' => 38,
                'sign' => NULL,
                'slug' => '3sfF2ljpobkLsvokWoi2',
                'created_at' => '2024-09-02 00:21:35',
                'updated_at' => '2024-09-02 00:21:35',
            ),
            36 => 
            array (
                'id' => 2137,
                'presensi_id' => 135,
                'peserta_id' => 6,
                'sign' => '66d50f886b994.png',
                'slug' => 'curRRnzoxwWRd4Ao7Ls9',
                'created_at' => '2024-09-02 01:05:49',
                'updated_at' => '2024-09-02 01:06:16',
            ),
            37 => 
            array (
                'id' => 2138,
                'presensi_id' => 136,
                'peserta_id' => 5,
                'sign' => '66d65ceb4ea79.png',
                'slug' => 'V5GUAlqqQaXEYB51MDNM',
                'created_at' => '2024-09-02 20:44:19',
                'updated_at' => '2024-09-03 00:48:43',
            ),
            38 => 
            array (
                'id' => 2139,
                'presensi_id' => 136,
                'peserta_id' => 6,
                'sign' => '66d62ea03d415.png',
                'slug' => 'iEhEaXGsVyVfETHc4B28',
                'created_at' => '2024-09-02 20:44:25',
                'updated_at' => '2024-09-02 21:31:12',
            ),
            39 => 
            array (
                'id' => 2140,
                'presensi_id' => 136,
                'peserta_id' => 9,
                'sign' => '66d65dd2164a5.png',
                'slug' => 'M6boi1PMNIDmrflrwXT8',
                'created_at' => '2024-09-02 20:44:29',
                'updated_at' => '2024-09-03 00:52:34',
            ),
            40 => 
            array (
                'id' => 2141,
                'presensi_id' => 136,
                'peserta_id' => 10,
                'sign' => '66d65e7e3910f.png',
                'slug' => 'Gi6HrSPJa6oLjdNHmeVX',
                'created_at' => '2024-09-02 20:44:32',
                'updated_at' => '2024-09-03 00:55:26',
            ),
            41 => 
            array (
                'id' => 2142,
                'presensi_id' => 136,
                'peserta_id' => 85,
                'sign' => '66d65dfc0cf51.png',
                'slug' => '4SoTK759hiNsYqJoxas8',
                'created_at' => '2024-09-02 20:44:36',
                'updated_at' => '2024-09-03 00:53:16',
            ),
            42 => 
            array (
                'id' => 2143,
                'presensi_id' => 136,
                'peserta_id' => 52,
                'sign' => '66d65d4380c77.png',
                'slug' => 'tt1hX94niSBWFvL3dcj3',
                'created_at' => '2024-09-02 20:44:51',
                'updated_at' => '2024-09-03 00:50:11',
            ),
            43 => 
            array (
                'id' => 2144,
                'presensi_id' => 136,
                'peserta_id' => 12,
                'sign' => '66d65d74a21d9.png',
                'slug' => '61u9CrkREx8Sfz12jM58',
                'created_at' => '2024-09-02 20:44:59',
                'updated_at' => '2024-09-03 00:51:00',
            ),
            44 => 
            array (
                'id' => 2145,
                'presensi_id' => 136,
                'peserta_id' => 107,
                'sign' => '66d62e96b5abe.png',
                'slug' => 'brcLGwLMTxhEwsdTHxhD',
                'created_at' => '2024-09-02 20:45:03',
                'updated_at' => '2024-09-02 21:31:02',
            ),
            45 => 
            array (
                'id' => 2146,
                'presensi_id' => 136,
                'peserta_id' => 109,
                'sign' => '66d6258e03237.png',
                'slug' => 'LRRKIvDfP34QK4ldewQw',
                'created_at' => '2024-09-02 20:45:08',
                'updated_at' => '2024-09-02 20:52:30',
            ),
            46 => 
            array (
                'id' => 2147,
                'presensi_id' => 136,
                'peserta_id' => 22,
                'sign' => '66d65f9f939fa.png',
                'slug' => 'qqXoSpA6ufRPTzfYEDu7',
                'created_at' => '2024-09-02 20:45:15',
                'updated_at' => '2024-09-03 01:00:15',
            ),
            47 => 
            array (
                'id' => 2148,
                'presensi_id' => 136,
                'peserta_id' => 98,
                'sign' => '66d65e65e72a3.png',
                'slug' => 'tSUV6qarnbxpYe5sdNQT',
                'created_at' => '2024-09-02 20:45:20',
                'updated_at' => '2024-09-03 00:55:01',
            ),
            48 => 
            array (
                'id' => 2149,
                'presensi_id' => 136,
                'peserta_id' => 218,
                'sign' => '66d65ecca7d24.png',
                'slug' => 'MDsppPoCpYXKHaGuG5iz',
                'created_at' => '2024-09-02 20:45:25',
                'updated_at' => '2024-09-03 00:56:44',
            ),
            49 => 
            array (
                'id' => 2150,
                'presensi_id' => 136,
                'peserta_id' => 105,
                'sign' => NULL,
                'slug' => 'CuPIBfQh9URjXivxH7Xo',
                'created_at' => '2024-09-02 20:45:30',
                'updated_at' => '2024-09-02 20:45:30',
            ),
            50 => 
            array (
                'id' => 2151,
                'presensi_id' => 136,
                'peserta_id' => 212,
                'sign' => '66d65e0053c04.png',
                'slug' => 'PqmUfDgLNuLNwTtHmeyo',
                'created_at' => '2024-09-02 20:45:35',
                'updated_at' => '2024-09-03 00:53:20',
            ),
            51 => 
            array (
                'id' => 2152,
                'presensi_id' => 136,
                'peserta_id' => 83,
                'sign' => '66d662a208d1b.png',
                'slug' => 'LxGggK9Rt7o32RE2L8Jw',
                'created_at' => '2024-09-02 20:45:41',
                'updated_at' => '2024-09-03 01:13:06',
            ),
            52 => 
            array (
                'id' => 2153,
                'presensi_id' => 136,
                'peserta_id' => 77,
                'sign' => '66d65f5a07c38.png',
                'slug' => 'Ggdr73HbbXbnKZeeFprQ',
                'created_at' => '2024-09-02 20:45:45',
                'updated_at' => '2024-09-03 00:59:06',
            ),
            53 => 
            array (
                'id' => 2154,
                'presensi_id' => 137,
                'peserta_id' => 5,
                'sign' => '66d7b57f7ac03.png',
                'slug' => 'Udj2ku5ZDxkSile7gaDc',
                'created_at' => '2024-09-03 20:20:14',
                'updated_at' => '2024-09-04 01:18:55',
            ),
            54 => 
            array (
                'id' => 2155,
                'presensi_id' => 137,
                'peserta_id' => 9,
                'sign' => '66d7b40e0ad1e.png',
                'slug' => 'WnYszqDilGHtaIUpRRxg',
                'created_at' => '2024-09-03 20:20:23',
                'updated_at' => '2024-09-04 01:12:46',
            ),
            55 => 
            array (
                'id' => 2156,
                'presensi_id' => 137,
                'peserta_id' => 10,
                'sign' => '66d7b571b6d33.png',
                'slug' => 'dSJzNFucsaKjJppKvAAD',
                'created_at' => '2024-09-03 20:20:27',
                'updated_at' => '2024-09-04 01:18:41',
            ),
            56 => 
            array (
                'id' => 2157,
                'presensi_id' => 137,
                'peserta_id' => 52,
                'sign' => '66d7b541f0baf.png',
                'slug' => 'w0Ww8IbiKYu7Q46tFUbJ',
                'created_at' => '2024-09-03 20:20:31',
                'updated_at' => '2024-09-04 01:17:53',
            ),
            57 => 
            array (
                'id' => 2158,
                'presensi_id' => 137,
                'peserta_id' => 85,
                'sign' => '66d7be2bc46d1.png',
                'slug' => '8by7mx4e6UdSzbQRhshN',
                'created_at' => '2024-09-03 20:20:35',
                'updated_at' => '2024-09-04 01:55:55',
            ),
            58 => 
            array (
                'id' => 2159,
                'presensi_id' => 137,
                'peserta_id' => 12,
                'sign' => '66d7b43b74227.png',
                'slug' => '3YS4fk2xaIUqjDVMx212',
                'created_at' => '2024-09-03 20:20:39',
                'updated_at' => '2024-09-04 01:13:31',
            ),
            59 => 
            array (
                'id' => 2160,
                'presensi_id' => 137,
                'peserta_id' => 108,
                'sign' => '66d7b5a1d07ed.png',
                'slug' => 'wXZZoNuyiCBu7PTBsCgR',
                'created_at' => '2024-09-03 20:20:43',
                'updated_at' => '2024-09-04 01:19:29',
            ),
            60 => 
            array (
                'id' => 2161,
                'presensi_id' => 137,
                'peserta_id' => 107,
                'sign' => '66d7b55231c36.png',
                'slug' => 'B9JmxgjmTvlaf20NekfR',
                'created_at' => '2024-09-03 20:20:47',
                'updated_at' => '2024-09-04 01:18:10',
            ),
            61 => 
            array (
                'id' => 2162,
                'presensi_id' => 137,
                'peserta_id' => 109,
                'sign' => '66d7b44c544e8.png',
                'slug' => '6N6Fkf0WmhkA4UCsqvom',
                'created_at' => '2024-09-03 20:20:51',
                'updated_at' => '2024-09-04 01:13:48',
            ),
            62 => 
            array (
                'id' => 2163,
                'presensi_id' => 137,
                'peserta_id' => 21,
                'sign' => '66d7b8186eea1.png',
                'slug' => 'fYaoirZfcl9ydMHeAXlR',
                'created_at' => '2024-09-03 20:20:56',
                'updated_at' => '2024-09-04 01:30:00',
            ),
            63 => 
            array (
                'id' => 2164,
                'presensi_id' => 137,
                'peserta_id' => 81,
                'sign' => '66d7b999c5d58.png',
                'slug' => 'SWGUDhw1zGNX2DMnRwRi',
                'created_at' => '2024-09-03 20:21:06',
                'updated_at' => '2024-09-04 01:36:25',
            ),
            64 => 
            array (
                'id' => 2165,
                'presensi_id' => 137,
                'peserta_id' => 13,
                'sign' => '66d7b4731f2b7.png',
                'slug' => 'A6tHyDiL0RturFvwHmCx',
                'created_at' => '2024-09-03 20:21:12',
                'updated_at' => '2024-09-04 01:14:27',
            ),
            65 => 
            array (
                'id' => 2166,
                'presensi_id' => 137,
                'peserta_id' => 80,
                'sign' => NULL,
                'slug' => 'uFtYlaEN2waEn7KGkoiQ',
                'created_at' => '2024-09-03 20:21:17',
                'updated_at' => '2024-09-03 20:21:17',
            ),
            66 => 
            array (
                'id' => 2167,
                'presensi_id' => 137,
                'peserta_id' => 75,
                'sign' => '66d7e5ff24822.png',
                'slug' => 'PF0Tiz8GL4BKwbsUZGqe',
                'created_at' => '2024-09-03 20:21:22',
                'updated_at' => '2024-09-04 04:45:51',
            ),
            67 => 
            array (
                'id' => 2168,
                'presensi_id' => 137,
                'peserta_id' => 151,
                'sign' => NULL,
                'slug' => 'NgJ4HJjSDSgjpVaLCGHV',
                'created_at' => '2024-09-03 20:21:34',
                'updated_at' => '2024-09-03 20:21:34',
            ),
            68 => 
            array (
                'id' => 2169,
                'presensi_id' => 137,
                'peserta_id' => 111,
                'sign' => '66d7b87ec041d.png',
                'slug' => 'jOW39XWznKQIbTiYnnhk',
                'created_at' => '2024-09-03 20:21:38',
                'updated_at' => '2024-09-04 01:31:42',
            ),
            69 => 
            array (
                'id' => 2170,
                'presensi_id' => 137,
                'peserta_id' => 218,
                'sign' => '66d7b503d93d6.png',
                'slug' => 'K3cfeaxW2CFRD6O6iTxR',
                'created_at' => '2024-09-03 20:21:43',
                'updated_at' => '2024-09-04 01:16:51',
            ),
            70 => 
            array (
                'id' => 2171,
                'presensi_id' => 137,
                'peserta_id' => 98,
                'sign' => '66d7bb7cda089.png',
                'slug' => 'HSgNlvCsE7yWfSiY98K1',
                'created_at' => '2024-09-03 20:21:47',
                'updated_at' => '2024-09-04 01:44:28',
            ),
            71 => 
            array (
                'id' => 2172,
                'presensi_id' => 137,
                'peserta_id' => 105,
                'sign' => '66d7b55fdb441.png',
                'slug' => 'Gieb2vhR5IVzMUO66YgP',
                'created_at' => '2024-09-03 20:21:51',
                'updated_at' => '2024-09-04 01:18:23',
            ),
            72 => 
            array (
                'id' => 2173,
                'presensi_id' => 137,
                'peserta_id' => 212,
                'sign' => '66d7b54a4ae48.png',
                'slug' => '6gU1TATj9KuxMqmh4qvr',
                'created_at' => '2024-09-03 20:21:56',
                'updated_at' => '2024-09-04 01:18:02',
            ),
            73 => 
            array (
                'id' => 2174,
                'presensi_id' => 137,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'AzGGgpbKLOJQQ5Pc30ax',
                'created_at' => '2024-09-03 20:22:08',
                'updated_at' => '2024-09-03 20:22:08',
            ),
            74 => 
            array (
                'id' => 2175,
                'presensi_id' => 137,
                'peserta_id' => 102,
                'sign' => '66de559a34567.png',
                'slug' => 'LH4ZnqpGKXvVU9VHdeBF',
                'created_at' => '2024-09-03 20:22:14',
                'updated_at' => '2024-09-09 01:55:38',
            ),
            75 => 
            array (
                'id' => 2176,
                'presensi_id' => 138,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'dnqRwpm7U2Ko9e1otPEa',
                'created_at' => '2024-09-03 22:32:26',
                'updated_at' => '2024-09-03 22:32:26',
            ),
            76 => 
            array (
                'id' => 2177,
                'presensi_id' => 138,
                'peserta_id' => 40,
                'sign' => NULL,
                'slug' => 'OYRM4q4T2papK5VT4TE3',
                'created_at' => '2024-09-03 22:33:10',
                'updated_at' => '2024-09-03 22:33:10',
            ),
            77 => 
            array (
                'id' => 2178,
                'presensi_id' => 138,
                'peserta_id' => 27,
                'sign' => NULL,
                'slug' => 'oOWQLtF6dk2k3dtUpoum',
                'created_at' => '2024-09-03 22:33:50',
                'updated_at' => '2024-09-03 22:33:50',
            ),
            78 => 
            array (
                'id' => 2179,
                'presensi_id' => 138,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => '4rO8JkPj05iNmJsGHl1t',
                'created_at' => '2024-09-03 22:34:25',
                'updated_at' => '2024-09-03 22:34:25',
            ),
            79 => 
            array (
                'id' => 2180,
                'presensi_id' => 139,
                'peserta_id' => 5,
                'sign' => '66d93ff7a6c0f.png',
                'slug' => 'xxr8thiqBvqNxIm1GP6S',
                'created_at' => '2024-09-04 19:55:52',
                'updated_at' => '2024-09-05 05:21:59',
            ),
            80 => 
            array (
                'id' => 2181,
                'presensi_id' => 139,
                'peserta_id' => 9,
                'sign' => '66d8ee2f96f06.png',
                'slug' => '0awfBmAU0STFpc6ljRpo',
                'created_at' => '2024-09-04 19:55:59',
                'updated_at' => '2024-09-04 23:33:03',
            ),
            81 => 
            array (
                'id' => 2182,
                'presensi_id' => 139,
                'peserta_id' => 10,
                'sign' => '66d8ebdf667aa.png',
                'slug' => 'yOhb3Ism9MhBARqKZlUj',
                'created_at' => '2024-09-04 19:56:03',
                'updated_at' => '2024-09-04 23:23:11',
            ),
            82 => 
            array (
                'id' => 2183,
                'presensi_id' => 139,
                'peserta_id' => 52,
                'sign' => '66d8e5cb5e000.png',
                'slug' => 'apwYhBNfsmHUbH2LfRR9',
                'created_at' => '2024-09-04 19:56:07',
                'updated_at' => '2024-09-04 22:57:15',
            ),
            83 => 
            array (
                'id' => 2184,
                'presensi_id' => 139,
                'peserta_id' => 85,
                'sign' => '66d8f542c4a9a.png',
                'slug' => 'gKVcfQzaFEphF3UeD1zv',
                'created_at' => '2024-09-04 19:56:12',
                'updated_at' => '2024-09-05 00:03:14',
            ),
            84 => 
            array (
                'id' => 2185,
                'presensi_id' => 139,
                'peserta_id' => 12,
                'sign' => '66d8e69b7da84.png',
                'slug' => 'maBNQWGOwnhNwADKx3Eb',
                'created_at' => '2024-09-04 19:56:17',
                'updated_at' => '2024-09-04 23:00:43',
            ),
            85 => 
            array (
                'id' => 2186,
                'presensi_id' => 139,
                'peserta_id' => 107,
                'sign' => '66d8ea4a8f558.png',
                'slug' => 'IVTyDC46PbNbyKShUkgV',
                'created_at' => '2024-09-04 19:56:21',
                'updated_at' => '2024-09-04 23:16:26',
            ),
            86 => 
            array (
                'id' => 2187,
                'presensi_id' => 139,
                'peserta_id' => 108,
                'sign' => '66d8ea50f12ff.png',
                'slug' => 'GAOP8lcCEJR4iUpDjMt5',
                'created_at' => '2024-09-04 19:56:27',
                'updated_at' => '2024-09-04 23:16:32',
            ),
            87 => 
            array (
                'id' => 2188,
                'presensi_id' => 139,
                'peserta_id' => 109,
                'sign' => '66d8efc031edb.png',
                'slug' => 'BHkvmVrHQjUMxfokFvJI',
                'created_at' => '2024-09-04 19:56:32',
                'updated_at' => '2024-09-04 23:39:44',
            ),
            88 => 
            array (
                'id' => 2189,
                'presensi_id' => 139,
                'peserta_id' => 21,
                'sign' => '66d8ff1ecd3ab.png',
                'slug' => 'yRSgT98wIA8IVZ9CHAOa',
                'created_at' => '2024-09-04 19:56:37',
                'updated_at' => '2024-09-05 00:45:18',
            ),
            89 => 
            array (
                'id' => 2191,
                'presensi_id' => 139,
                'peserta_id' => 143,
                'sign' => '66d8e6a8aba43.png',
                'slug' => 'ThshZznUkXZ9OSSnYTtx',
                'created_at' => '2024-09-04 19:56:55',
                'updated_at' => '2024-09-04 23:00:56',
            ),
            90 => 
            array (
                'id' => 2192,
                'presensi_id' => 139,
                'peserta_id' => 142,
                'sign' => '66d919376d97f.png',
                'slug' => 'J2W3vvYKEDcuQrfkjqc4',
                'created_at' => '2024-09-04 19:57:00',
                'updated_at' => '2024-09-05 02:36:39',
            ),
            91 => 
            array (
                'id' => 2193,
                'presensi_id' => 139,
                'peserta_id' => 98,
                'sign' => '66d8e6c76d31c.png',
                'slug' => 'DAxTix147vLbVBy3Riyq',
                'created_at' => '2024-09-04 19:57:14',
                'updated_at' => '2024-09-04 23:01:27',
            ),
            92 => 
            array (
                'id' => 2194,
                'presensi_id' => 139,
                'peserta_id' => 218,
                'sign' => NULL,
                'slug' => 'fzCxwmerwEdOdtumBTll',
                'created_at' => '2024-09-04 19:57:18',
                'updated_at' => '2024-09-04 19:57:18',
            ),
            93 => 
            array (
                'id' => 2195,
                'presensi_id' => 139,
                'peserta_id' => 105,
                'sign' => '66d8e6cb4c380.png',
                'slug' => 'zgqeZYyKdyvwYtWjaIKc',
                'created_at' => '2024-09-04 19:57:23',
                'updated_at' => '2024-09-04 23:01:31',
            ),
            94 => 
            array (
                'id' => 2196,
                'presensi_id' => 139,
                'peserta_id' => 212,
                'sign' => '66d8efc68ffd6.png',
                'slug' => 'TaDTRzzmiuO7blheqXXI',
                'created_at' => '2024-09-04 19:57:30',
                'updated_at' => '2024-09-04 23:39:50',
            ),
            95 => 
            array (
                'id' => 2197,
                'presensi_id' => 139,
                'peserta_id' => 6,
                'sign' => '66d8eb9d0eb87.png',
                'slug' => '3Aa7j3UxgrwCeS23HvOK',
                'created_at' => '2024-09-04 23:21:55',
                'updated_at' => '2024-09-04 23:22:05',
            ),
            96 => 
            array (
                'id' => 2198,
                'presensi_id' => 140,
                'peserta_id' => 5,
                'sign' => '66da3f19ebbaa.png',
                'slug' => 'jZhMatxWR2D1vwOJ5ikC',
                'created_at' => '2024-09-05 22:13:26',
                'updated_at' => '2024-09-05 23:30:33',
            ),
            97 => 
            array (
                'id' => 2200,
                'presensi_id' => 140,
                'peserta_id' => 6,
                'sign' => '66da611a3db40.png',
                'slug' => 'n9XR74xZi4SsG0BRjvAr',
                'created_at' => '2024-09-05 22:15:26',
                'updated_at' => '2024-09-06 01:55:38',
            ),
            98 => 
            array (
                'id' => 2201,
                'presensi_id' => 140,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'PaVSi7UbNwgcgV1nCphT',
                'created_at' => '2024-09-05 22:15:31',
                'updated_at' => '2024-09-05 22:15:31',
            ),
            99 => 
            array (
                'id' => 2202,
                'presensi_id' => 140,
                'peserta_id' => 10,
                'sign' => '66da4f8e40cf0.png',
                'slug' => 'LC2mtJNOb5lSsEgQJYaZ',
                'created_at' => '2024-09-05 22:15:36',
                'updated_at' => '2024-09-06 00:40:46',
            ),
            100 => 
            array (
                'id' => 2203,
                'presensi_id' => 140,
                'peserta_id' => 52,
                'sign' => '66da50d3b2f50.png',
                'slug' => 'QeDPQaK77d59W43WIuxn',
                'created_at' => '2024-09-05 22:15:40',
                'updated_at' => '2024-09-06 00:46:11',
            ),
            101 => 
            array (
                'id' => 2204,
                'presensi_id' => 140,
                'peserta_id' => 85,
                'sign' => '66da513b5c107.png',
                'slug' => 'NYZVwPNZAfv6ANRKDNHn',
                'created_at' => '2024-09-05 22:15:47',
                'updated_at' => '2024-09-06 00:47:55',
            ),
            102 => 
            array (
                'id' => 2205,
                'presensi_id' => 140,
                'peserta_id' => 12,
                'sign' => '66da503d9de51.png',
                'slug' => 'kHa2OebcCjsNcud3G2Qr',
                'created_at' => '2024-09-05 22:15:56',
                'updated_at' => '2024-09-06 00:43:41',
            ),
            103 => 
            array (
                'id' => 2206,
                'presensi_id' => 140,
                'peserta_id' => 107,
                'sign' => '66da4fa2ab293.png',
                'slug' => '6HBK9bDbcZfhjreGm63V',
                'created_at' => '2024-09-05 22:16:01',
                'updated_at' => '2024-09-06 00:41:06',
            ),
            104 => 
            array (
                'id' => 2207,
                'presensi_id' => 140,
                'peserta_id' => 108,
                'sign' => '66da4faaeb945.png',
                'slug' => 'GmVBYMa1JkkZBl6FbBO9',
                'created_at' => '2024-09-05 22:16:05',
                'updated_at' => '2024-09-06 00:41:14',
            ),
            105 => 
            array (
                'id' => 2208,
                'presensi_id' => 140,
                'peserta_id' => 109,
                'sign' => '66da54c2dfac2.png',
                'slug' => 'pNhi29VMlrYRxhkVhMZc',
                'created_at' => '2024-09-05 22:16:27',
                'updated_at' => '2024-09-06 01:02:58',
            ),
            106 => 
            array (
                'id' => 2209,
                'presensi_id' => 140,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'cN0B5ggKzZnMTiHNIrY3',
                'created_at' => '2024-09-05 22:17:46',
                'updated_at' => '2024-09-05 22:17:46',
            ),
            107 => 
            array (
                'id' => 2210,
                'presensi_id' => 140,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'Cd9knHIhv0ZBKygIGHeJ',
                'created_at' => '2024-09-05 22:17:50',
                'updated_at' => '2024-09-05 22:17:50',
            ),
            108 => 
            array (
                'id' => 2211,
                'presensi_id' => 140,
                'peserta_id' => 38,
                'sign' => NULL,
                'slug' => 'A1xwCZGo9maS7zVzP3Vq',
                'created_at' => '2024-09-05 22:17:54',
                'updated_at' => '2024-09-05 22:17:54',
            ),
            109 => 
            array (
                'id' => 2212,
                'presensi_id' => 140,
                'peserta_id' => 98,
                'sign' => '66da52e21b285.png',
                'slug' => 'xAOiynL6uQCxCqSRUMHW',
                'created_at' => '2024-09-05 22:17:59',
                'updated_at' => '2024-09-06 00:54:58',
            ),
            110 => 
            array (
                'id' => 2214,
                'presensi_id' => 140,
                'peserta_id' => 212,
                'sign' => '66da551b3b52d.png',
                'slug' => 'm5o8zJG9dfgKeFcMxE5E',
                'created_at' => '2024-09-05 22:18:09',
                'updated_at' => '2024-09-06 01:04:27',
            ),
            111 => 
            array (
                'id' => 2215,
                'presensi_id' => 140,
                'peserta_id' => 105,
                'sign' => '66da5fc147a6e.png',
                'slug' => '5Ch63TezXvgjVmXQ83wb',
                'created_at' => '2024-09-05 22:18:14',
                'updated_at' => '2024-09-06 01:49:53',
            ),
            112 => 
            array (
                'id' => 2216,
                'presensi_id' => 140,
                'peserta_id' => 152,
                'sign' => '66da505ec39af.png',
                'slug' => 'th0qEX6T06P4YEeZrcAA',
                'created_at' => '2024-09-05 22:18:18',
                'updated_at' => '2024-09-06 00:44:14',
            ),
            113 => 
            array (
                'id' => 2217,
                'presensi_id' => 140,
                'peserta_id' => 102,
                'sign' => NULL,
                'slug' => 'XiDuauDpTgQN9ZwPJOXt',
                'created_at' => '2024-09-05 22:18:22',
                'updated_at' => '2024-09-05 22:18:22',
            ),
            114 => 
            array (
                'id' => 2218,
                'presensi_id' => 140,
                'peserta_id' => 27,
                'sign' => '66da5231c77e8.png',
                'slug' => 'oWRFBBhtMq1xtft1n0tu',
                'created_at' => '2024-09-05 22:18:29',
                'updated_at' => '2024-09-06 00:52:01',
            ),
            115 => 
            array (
                'id' => 2219,
                'presensi_id' => 140,
                'peserta_id' => 103,
                'sign' => '66da50c3d6228.png',
                'slug' => 'uEnxkOd44ALfAOzCVtXG',
                'created_at' => '2024-09-05 22:18:34',
                'updated_at' => '2024-09-06 00:45:55',
            ),
            116 => 
            array (
                'id' => 2220,
                'presensi_id' => 140,
                'peserta_id' => 18,
                'sign' => NULL,
                'slug' => 'Kj7b5fasVtCuS8WN5aKV',
                'created_at' => '2024-09-05 22:18:54',
                'updated_at' => '2024-09-05 22:18:54',
            ),
            117 => 
            array (
                'id' => 2221,
                'presensi_id' => 140,
                'peserta_id' => 40,
                'sign' => NULL,
                'slug' => 'd0PeOjAV46y5bjrAbJl8',
                'created_at' => '2024-09-05 22:18:59',
                'updated_at' => '2024-09-05 22:18:59',
            ),
            118 => 
            array (
                'id' => 2222,
                'presensi_id' => 140,
                'peserta_id' => 154,
                'sign' => NULL,
                'slug' => 'FV5Gsw7jrgio8CkQUR2q',
                'created_at' => '2024-09-05 22:19:23',
                'updated_at' => '2024-09-05 22:19:23',
            ),
            119 => 
            array (
                'id' => 2223,
                'presensi_id' => 140,
                'peserta_id' => 100,
                'sign' => '66da5261f2a95.png',
                'slug' => 'xl6wNVDjqE03xiUoecni',
                'created_at' => '2024-09-06 00:42:36',
                'updated_at' => '2024-09-06 00:52:49',
            ),
            120 => 
            array (
                'id' => 2224,
                'presensi_id' => 141,
                'peserta_id' => 5,
                'sign' => '66de4ed978d9c.png',
                'slug' => 'kMxdUJrYlu5t8VRU2qDd',
                'created_at' => '2024-09-08 22:19:03',
                'updated_at' => '2024-09-09 01:26:49',
            ),
            121 => 
            array (
                'id' => 2225,
                'presensi_id' => 141,
                'peserta_id' => 6,
                'sign' => '66de4b2e6fec5.png',
                'slug' => 'oLAbj4j8DAj8zTEpjeId',
                'created_at' => '2024-09-08 22:19:10',
                'updated_at' => '2024-09-09 01:11:10',
            ),
            122 => 
            array (
                'id' => 2226,
                'presensi_id' => 141,
                'peserta_id' => 9,
                'sign' => '66de5ccb52a55.png',
                'slug' => 'vK8YOoHkCeH2SlWTXw0T',
                'created_at' => '2024-09-08 22:19:15',
                'updated_at' => '2024-09-09 02:26:19',
            ),
            123 => 
            array (
                'id' => 2227,
                'presensi_id' => 141,
                'peserta_id' => 10,
                'sign' => '66de4c64437cd.png',
                'slug' => 'dXaoutcrKhnftKxwYog3',
                'created_at' => '2024-09-08 22:23:46',
                'updated_at' => '2024-09-09 01:16:20',
            ),
            124 => 
            array (
                'id' => 2228,
                'presensi_id' => 141,
                'peserta_id' => 85,
                'sign' => '66de4c8b696d4.png',
                'slug' => 'av8xZfF8GuHBEw6u5TK0',
                'created_at' => '2024-09-08 22:23:52',
                'updated_at' => '2024-09-09 01:16:59',
            ),
            125 => 
            array (
                'id' => 2229,
                'presensi_id' => 141,
                'peserta_id' => 52,
                'sign' => '66de4c2957f8e.png',
                'slug' => 'GSjzglqjSgOZ8GNPF1u2',
                'created_at' => '2024-09-08 22:23:57',
                'updated_at' => '2024-09-09 01:15:21',
            ),
            126 => 
            array (
                'id' => 2230,
                'presensi_id' => 141,
                'peserta_id' => 12,
                'sign' => '66de4cf295d5c.png',
                'slug' => 'JxFxtSeYT79oLoCqD7i7',
                'created_at' => '2024-09-08 22:24:03',
                'updated_at' => '2024-09-09 01:18:42',
            ),
            127 => 
            array (
                'id' => 2231,
                'presensi_id' => 141,
                'peserta_id' => 107,
                'sign' => '66de4be7e0c1a.png',
                'slug' => '6xm1m8mT9ciJ1sFHjX6c',
                'created_at' => '2024-09-08 22:25:16',
                'updated_at' => '2024-09-09 01:14:15',
            ),
            128 => 
            array (
                'id' => 2232,
                'presensi_id' => 141,
                'peserta_id' => 109,
                'sign' => '66de4c6144b41.png',
                'slug' => 'tWmt2rIlSekP2FL178RX',
                'created_at' => '2024-09-08 22:25:20',
                'updated_at' => '2024-09-09 01:16:17',
            ),
            129 => 
            array (
                'id' => 2233,
                'presensi_id' => 141,
                'peserta_id' => 21,
                'sign' => '66de60e9a31f3.png',
                'slug' => 'liFma1EkN62mfAW4HrKx',
                'created_at' => '2024-09-08 22:25:28',
                'updated_at' => '2024-09-09 02:43:53',
            ),
            130 => 
            array (
                'id' => 2234,
                'presensi_id' => 141,
                'peserta_id' => 152,
                'sign' => '66df6033dccbe.png',
                'slug' => 'pfH6d7mhK3A5iRSp0unA',
                'created_at' => '2024-09-08 22:25:34',
                'updated_at' => '2024-09-09 20:53:07',
            ),
            131 => 
            array (
                'id' => 2235,
                'presensi_id' => 141,
                'peserta_id' => 98,
                'sign' => '66df60457aa71.png',
                'slug' => 'k2JKWy0Z57CUaEhldYdJ',
                'created_at' => '2024-09-08 22:25:39',
                'updated_at' => '2024-09-09 20:53:25',
            ),
            132 => 
            array (
                'id' => 2236,
                'presensi_id' => 141,
                'peserta_id' => 105,
                'sign' => '66df604f4dac9.png',
                'slug' => 'BHBm8N6Ptp09tX9zIO1p',
                'created_at' => '2024-09-08 22:26:14',
                'updated_at' => '2024-09-09 20:53:35',
            ),
            133 => 
            array (
                'id' => 2237,
                'presensi_id' => 141,
                'peserta_id' => 212,
                'sign' => '66de50a33652d.png',
                'slug' => 'PT6lhazYAl1FSKxjaJF8',
                'created_at' => '2024-09-08 22:26:19',
                'updated_at' => '2024-09-09 01:34:27',
            ),
            134 => 
            array (
                'id' => 2238,
                'presensi_id' => 141,
                'peserta_id' => 102,
                'sign' => '66de55acb852b.png',
                'slug' => 'x2vddvfSAB2a7zapvdA4',
                'created_at' => '2024-09-08 22:32:12',
                'updated_at' => '2024-09-09 01:55:56',
            ),
            135 => 
            array (
                'id' => 2240,
                'presensi_id' => 141,
                'peserta_id' => 137,
                'sign' => '66de4dff18eaa.png',
                'slug' => 't7t0JV3IFsbv9qo5zpZp',
                'created_at' => '2024-09-08 22:43:49',
                'updated_at' => '2024-09-09 01:23:11',
            ),
            136 => 
            array (
                'id' => 2241,
                'presensi_id' => 141,
                'peserta_id' => 56,
                'sign' => '66de4eb518bf2.png',
                'slug' => 'zkf05ulhgKhAzjsUAsb7',
                'created_at' => '2024-09-08 22:43:56',
                'updated_at' => '2024-09-09 01:26:13',
            ),
            137 => 
            array (
                'id' => 2242,
                'presensi_id' => 141,
                'peserta_id' => 92,
                'sign' => '66de58f7d78f9.png',
                'slug' => 'QhMWpZuowUjFITkR2NVl',
                'created_at' => '2024-09-08 22:44:02',
                'updated_at' => '2024-09-09 02:09:59',
            ),
            138 => 
            array (
                'id' => 2243,
                'presensi_id' => 141,
                'peserta_id' => 74,
                'sign' => NULL,
                'slug' => 'xOe4R4R2Nn4luTOr3LFM',
                'created_at' => '2024-09-08 22:44:06',
                'updated_at' => '2024-09-08 22:44:06',
            ),
            139 => 
            array (
                'id' => 2244,
                'presensi_id' => 141,
                'peserta_id' => 32,
                'sign' => '66de4dbd5a2f3.png',
                'slug' => 'sUAwMCvDsJwfNrY7pD9j',
                'created_at' => '2024-09-08 22:44:12',
                'updated_at' => '2024-09-09 01:22:05',
            ),
            140 => 
            array (
                'id' => 2245,
                'presensi_id' => 141,
                'peserta_id' => 33,
                'sign' => '66de59c26504f.png',
                'slug' => 'u9Vr7t2H8CoBEs2jhhYI',
                'created_at' => '2024-09-08 22:45:21',
                'updated_at' => '2024-09-09 02:13:22',
            ),
            141 => 
            array (
                'id' => 2246,
                'presensi_id' => 141,
                'peserta_id' => 135,
                'sign' => '66de5235ee8ce.png',
                'slug' => 'IOS2CJJbKmyk86QsozK4',
                'created_at' => '2024-09-08 22:45:27',
                'updated_at' => '2024-09-09 01:41:09',
            ),
            142 => 
            array (
                'id' => 2247,
                'presensi_id' => 141,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'vS86l8t3Z8k1lo7iWBtw',
                'created_at' => '2024-09-09 01:15:04',
                'updated_at' => '2024-09-09 01:15:04',
            ),
            143 => 
            array (
                'id' => 2248,
                'presensi_id' => 142,
                'peserta_id' => 5,
                'sign' => '66df89715bb53.png',
                'slug' => 'Je2uHVUZf0oPG8THw3SC',
                'created_at' => '2024-09-09 21:05:22',
                'updated_at' => '2024-09-09 23:49:05',
            ),
            144 => 
            array (
                'id' => 2249,
                'presensi_id' => 142,
                'peserta_id' => 9,
                'sign' => '66df89f857318.png',
                'slug' => 'goaf5zs2kDLpWDYwyPE9',
                'created_at' => '2024-09-09 21:05:34',
                'updated_at' => '2024-09-09 23:51:20',
            ),
            145 => 
            array (
                'id' => 2250,
                'presensi_id' => 142,
                'peserta_id' => 52,
                'sign' => '66df893f6231f.png',
                'slug' => 'nSrBG5tShX2EKUlv7Wy4',
                'created_at' => '2024-09-09 21:05:39',
                'updated_at' => '2024-09-09 23:48:15',
            ),
            146 => 
            array (
                'id' => 2251,
                'presensi_id' => 142,
                'peserta_id' => 10,
                'sign' => '66df87d270804.png',
                'slug' => '4EcqH7OF4t7dqvMUgzV8',
                'created_at' => '2024-09-09 21:05:43',
                'updated_at' => '2024-09-09 23:42:10',
            ),
            147 => 
            array (
                'id' => 2252,
                'presensi_id' => 142,
                'peserta_id' => 85,
                'sign' => '66df8b58b7acc.png',
                'slug' => 'lVGOPKui8Knxn8CWF9eL',
                'created_at' => '2024-09-09 21:05:47',
                'updated_at' => '2024-09-09 23:57:12',
            ),
            148 => 
            array (
                'id' => 2253,
                'presensi_id' => 142,
                'peserta_id' => 12,
                'sign' => '66df87f5486c2.png',
                'slug' => 'ghXM0DOnCGUgxDrYe5EP',
                'created_at' => '2024-09-09 21:05:52',
                'updated_at' => '2024-09-09 23:42:45',
            ),
            149 => 
            array (
                'id' => 2254,
                'presensi_id' => 142,
                'peserta_id' => 107,
                'sign' => '66df87ee73bbe.png',
                'slug' => 'bkmZMKLU59uvZL2ZgYUm',
                'created_at' => '2024-09-09 21:05:59',
                'updated_at' => '2024-09-09 23:42:38',
            ),
            150 => 
            array (
                'id' => 2255,
                'presensi_id' => 142,
                'peserta_id' => 108,
                'sign' => '66df87f76ae0c.png',
                'slug' => 'boVYhlX64OmsjQtzBE8I',
                'created_at' => '2024-09-09 21:06:04',
                'updated_at' => '2024-09-09 23:42:47',
            ),
            151 => 
            array (
                'id' => 2256,
                'presensi_id' => 142,
                'peserta_id' => 109,
                'sign' => '66df883683828.png',
                'slug' => 'hUI2k9pURZcFBMo6cVtf',
                'created_at' => '2024-09-09 21:06:08',
                'updated_at' => '2024-09-09 23:43:50',
            ),
            152 => 
            array (
                'id' => 2257,
                'presensi_id' => 142,
                'peserta_id' => 21,
                'sign' => '66df88b6ea2dc.png',
                'slug' => 'kcMsrBHHAsuWmaffVqUi',
                'created_at' => '2024-09-09 21:06:13',
                'updated_at' => '2024-09-09 23:45:58',
            ),
            153 => 
            array (
                'id' => 2258,
                'presensi_id' => 142,
                'peserta_id' => 98,
                'sign' => '66df8b2b9eced.png',
                'slug' => 'ZgJzQURIUaplbIqdjq9C',
                'created_at' => '2024-09-09 21:06:21',
                'updated_at' => '2024-09-09 23:56:27',
            ),
            154 => 
            array (
                'id' => 2259,
                'presensi_id' => 142,
                'peserta_id' => 152,
                'sign' => '66df8b51d20a8.png',
                'slug' => 'ZQ22WzKNzwsymde4SUgv',
                'created_at' => '2024-09-09 21:06:25',
                'updated_at' => '2024-09-09 23:57:05',
            ),
            155 => 
            array (
                'id' => 2260,
                'presensi_id' => 142,
                'peserta_id' => 102,
                'sign' => '66df8a63ea3c0.png',
                'slug' => 'eUBbfxqasvqqy15M0r6m',
                'created_at' => '2024-09-09 21:06:31',
                'updated_at' => '2024-09-09 23:53:07',
            ),
            156 => 
            array (
                'id' => 2261,
                'presensi_id' => 142,
                'peserta_id' => 100,
                'sign' => '66df8bb25d426.png',
                'slug' => 'difYk3nm6rvyY8LW0vJa',
                'created_at' => '2024-09-09 21:06:35',
                'updated_at' => '2024-09-09 23:58:42',
            ),
            157 => 
            array (
                'id' => 2262,
                'presensi_id' => 142,
                'peserta_id' => 176,
                'sign' => '66df8a4b56bf1.png',
                'slug' => '764cPommvdjLxDyzEKfJ',
                'created_at' => '2024-09-09 21:07:12',
                'updated_at' => '2024-09-09 23:52:43',
            ),
            158 => 
            array (
                'id' => 2263,
                'presensi_id' => 142,
                'peserta_id' => 177,
                'sign' => '66df8afd1ae0a.png',
                'slug' => 'fyQSFJXIP6XGT3VxwzwK',
                'created_at' => '2024-09-09 21:07:17',
                'updated_at' => '2024-09-09 23:55:41',
            ),
            159 => 
            array (
                'id' => 2264,
                'presensi_id' => 142,
                'peserta_id' => 178,
                'sign' => NULL,
                'slug' => 'RygKaoE6GxvSQ07ojwyC',
                'created_at' => '2024-09-09 21:07:22',
                'updated_at' => '2024-09-09 21:07:22',
            ),
            160 => 
            array (
                'id' => 2265,
                'presensi_id' => 142,
                'peserta_id' => 179,
                'sign' => NULL,
                'slug' => 'KF7NPmWtAk52LVcR0e9L',
                'created_at' => '2024-09-09 21:07:31',
                'updated_at' => '2024-09-09 21:07:31',
            ),
            161 => 
            array (
                'id' => 2266,
                'presensi_id' => 142,
                'peserta_id' => 180,
                'sign' => NULL,
                'slug' => 'FblRIn0gHv17lfYzhHYh',
                'created_at' => '2024-09-09 21:07:37',
                'updated_at' => '2024-09-09 21:07:37',
            ),
            162 => 
            array (
                'id' => 2267,
                'presensi_id' => 142,
                'peserta_id' => 181,
                'sign' => '66df8a9c98530.png',
                'slug' => 'c0I2oLW3Wpr8XBNicLZK',
                'created_at' => '2024-09-09 21:07:41',
                'updated_at' => '2024-09-09 23:54:04',
            ),
            163 => 
            array (
                'id' => 2268,
                'presensi_id' => 143,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'lKmbonndNK8n7a36oLFU',
                'created_at' => '2024-09-11 00:38:09',
                'updated_at' => '2024-09-11 00:38:09',
            ),
            164 => 
            array (
                'id' => 2269,
                'presensi_id' => 143,
                'peserta_id' => 9,
                'sign' => '66e0e92277bd3.png',
                'slug' => 'zfQl8kWhLw6sOepDD3kw',
                'created_at' => '2024-09-11 00:38:24',
                'updated_at' => '2024-09-11 00:49:38',
            ),
            165 => 
            array (
                'id' => 2270,
                'presensi_id' => 143,
                'peserta_id' => 10,
                'sign' => '66e0ea72226a1.png',
                'slug' => '14uJOiGj09JPKglj3lbl',
                'created_at' => '2024-09-11 00:38:28',
                'updated_at' => '2024-09-11 00:55:14',
            ),
            166 => 
            array (
                'id' => 2271,
                'presensi_id' => 143,
                'peserta_id' => 52,
                'sign' => '66e0e97bc7dd4.png',
                'slug' => 'DbmPg6E9nfsQwdTV3to4',
                'created_at' => '2024-09-11 00:38:33',
                'updated_at' => '2024-09-11 00:51:07',
            ),
            167 => 
            array (
                'id' => 2272,
                'presensi_id' => 143,
                'peserta_id' => 85,
                'sign' => '66e0ea9f97671.png',
                'slug' => 'YsrTEYLvoY538yQSFpw3',
                'created_at' => '2024-09-11 00:38:37',
                'updated_at' => '2024-09-11 00:55:59',
            ),
            168 => 
            array (
                'id' => 2273,
                'presensi_id' => 143,
                'peserta_id' => 12,
                'sign' => '66e0e9665813e.png',
                'slug' => '6P3IyqI7449iDWC4slDd',
                'created_at' => '2024-09-11 00:38:42',
                'updated_at' => '2024-09-11 00:50:46',
            ),
            169 => 
            array (
                'id' => 2275,
                'presensi_id' => 143,
                'peserta_id' => 107,
                'sign' => '66e0e93a519ba.png',
                'slug' => 'VB3UNSFMd06AVuUmdew8',
                'created_at' => '2024-09-11 00:38:53',
                'updated_at' => '2024-09-11 00:50:02',
            ),
            170 => 
            array (
                'id' => 2276,
                'presensi_id' => 143,
                'peserta_id' => 109,
                'sign' => '66e0e989f0ba5.png',
                'slug' => '9Ex5RNzx6MWQ7JHYbvHE',
                'created_at' => '2024-09-11 00:39:10',
                'updated_at' => '2024-09-11 00:51:21',
            ),
            171 => 
            array (
                'id' => 2277,
                'presensi_id' => 143,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'utR5qJVCPZAPU7hXzo0x',
                'created_at' => '2024-09-11 00:39:15',
                'updated_at' => '2024-09-11 00:39:15',
            ),
            172 => 
            array (
                'id' => 2278,
                'presensi_id' => 143,
                'peserta_id' => 151,
                'sign' => '66e0ea2f33d4e.png',
                'slug' => 'Pmq4YQ89xo6b4pxqQ3sV',
                'created_at' => '2024-09-11 00:39:33',
                'updated_at' => '2024-09-11 00:54:07',
            ),
            173 => 
            array (
                'id' => 2279,
                'presensi_id' => 143,
                'peserta_id' => 111,
                'sign' => '66e1339631ae7.png',
                'slug' => 'ZcwLJ8RFufDmQWykm9Cu',
                'created_at' => '2024-09-11 00:39:38',
                'updated_at' => '2024-09-11 06:07:18',
            ),
            174 => 
            array (
                'id' => 2280,
                'presensi_id' => 143,
                'peserta_id' => 166,
                'sign' => '66e0ebd43c804.png',
                'slug' => 'H0cslaMcunwZFsGm30XU',
                'created_at' => '2024-09-11 00:39:57',
                'updated_at' => '2024-09-11 01:01:08',
            ),
            175 => 
            array (
                'id' => 2281,
                'presensi_id' => 143,
                'peserta_id' => 167,
                'sign' => NULL,
                'slug' => 'eywialpNIFIsLWpP1mJM',
                'created_at' => '2024-09-11 00:41:40',
                'updated_at' => '2024-09-11 00:41:40',
            ),
            176 => 
            array (
                'id' => 2282,
                'presensi_id' => 143,
                'peserta_id' => 230,
                'sign' => NULL,
                'slug' => 'UGMQAtrAkZy3hNymZGE0',
                'created_at' => '2024-09-11 00:41:45',
                'updated_at' => '2024-09-11 00:41:45',
            ),
            177 => 
            array (
                'id' => 2283,
                'presensi_id' => 143,
                'peserta_id' => 165,
                'sign' => '66e0f1093f173.png',
                'slug' => 'WoJS5yhFXIqnTfo8hpXK',
                'created_at' => '2024-09-11 00:42:42',
                'updated_at' => '2024-09-11 01:23:21',
            ),
            178 => 
            array (
                'id' => 2284,
                'presensi_id' => 143,
                'peserta_id' => 98,
                'sign' => '66e10b0305715.png',
                'slug' => '0n8dGqGerCJOY0Z5uXKa',
                'created_at' => '2024-09-11 00:44:30',
                'updated_at' => '2024-09-11 03:14:11',
            ),
            179 => 
            array (
                'id' => 2285,
                'presensi_id' => 143,
                'peserta_id' => 152,
                'sign' => '66e0f37269486.png',
                'slug' => 'yJgQIomvL0zTBvkLeGRE',
                'created_at' => '2024-09-11 00:44:34',
                'updated_at' => '2024-09-11 01:33:38',
            ),
            180 => 
            array (
                'id' => 2286,
                'presensi_id' => 143,
                'peserta_id' => 105,
                'sign' => '66e0f50011f95.png',
                'slug' => 'v4PSyvKuKDAA3SzqIp4W',
                'created_at' => '2024-09-11 00:44:38',
                'updated_at' => '2024-09-11 01:40:16',
            ),
            181 => 
            array (
                'id' => 2287,
                'presensi_id' => 143,
                'peserta_id' => 212,
                'sign' => '66e100e8d11b6.png',
                'slug' => 'fXZH3TucwYqHUa26G45w',
                'created_at' => '2024-09-11 00:44:42',
                'updated_at' => '2024-09-11 02:31:04',
            ),
            182 => 
            array (
                'id' => 2288,
                'presensi_id' => 143,
                'peserta_id' => 102,
                'sign' => '66e10b11e9db1.png',
                'slug' => 'r70P0IIRMlvMxzz2bY26',
                'created_at' => '2024-09-11 00:44:47',
                'updated_at' => '2024-09-11 03:14:25',
            ),
            183 => 
            array (
                'id' => 2289,
                'presensi_id' => 143,
                'peserta_id' => 100,
                'sign' => '66e0f448c96ab.png',
                'slug' => 'dOOKaosZDQ1orqA6UO5E',
                'created_at' => '2024-09-11 00:44:51',
                'updated_at' => '2024-09-11 01:37:12',
            ),
            184 => 
            array (
                'id' => 2290,
                'presensi_id' => 143,
                'peserta_id' => 4,
                'sign' => NULL,
                'slug' => 'leVsMIyME3C4JfI6MmKt',
                'created_at' => '2024-09-11 00:45:03',
                'updated_at' => '2024-09-11 00:45:03',
            ),
            185 => 
            array (
                'id' => 2291,
                'presensi_id' => 143,
                'peserta_id' => 123,
                'sign' => NULL,
                'slug' => 'VsI4FK4UNYxQB02XpZkb',
                'created_at' => '2024-09-11 00:45:07',
                'updated_at' => '2024-09-11 00:45:07',
            ),
            186 => 
            array (
                'id' => 2292,
                'presensi_id' => 143,
                'peserta_id' => 127,
                'sign' => NULL,
                'slug' => 'cqUk1w7ZHnr53lCrRv8E',
                'created_at' => '2024-09-11 00:45:12',
                'updated_at' => '2024-09-11 00:45:12',
            ),
            187 => 
            array (
                'id' => 2293,
                'presensi_id' => 143,
                'peserta_id' => 125,
                'sign' => NULL,
                'slug' => 'rm1PtE8SDOdl5Ww3hhjt',
                'created_at' => '2024-09-11 00:45:27',
                'updated_at' => '2024-09-11 00:45:27',
            ),
            188 => 
            array (
                'id' => 2294,
                'presensi_id' => 143,
                'peserta_id' => 126,
                'sign' => NULL,
                'slug' => 'LJenO9s41P7Jr0QJ9J19',
                'created_at' => '2024-09-11 00:45:33',
                'updated_at' => '2024-09-11 00:45:33',
            ),
            189 => 
            array (
                'id' => 2295,
                'presensi_id' => 143,
                'peserta_id' => 173,
                'sign' => '66e0f4db40fbc.png',
                'slug' => 'yNm8Ll547iSZERPxaLs7',
                'created_at' => '2024-09-11 00:46:04',
                'updated_at' => '2024-09-11 01:39:39',
            ),
            190 => 
            array (
                'id' => 2296,
                'presensi_id' => 143,
                'peserta_id' => 124,
                'sign' => NULL,
                'slug' => 'H0j46jK4g4VO73tEcyBQ',
                'created_at' => '2024-09-11 00:51:41',
                'updated_at' => '2024-09-11 00:51:41',
            ),
            191 => 
            array (
                'id' => 2297,
                'presensi_id' => 144,
                'peserta_id' => 5,
                'sign' => '66e248051f351.png',
                'slug' => '7Kzbc4VuKnDqAVppyTwU',
                'created_at' => '2024-09-11 22:54:51',
                'updated_at' => '2024-09-12 01:46:45',
            ),
            192 => 
            array (
                'id' => 2298,
                'presensi_id' => 144,
                'peserta_id' => 9,
                'sign' => '66e248103eac0.png',
                'slug' => 'JvgvdbwaNdq2zZng5kZG',
                'created_at' => '2024-09-11 22:54:58',
                'updated_at' => '2024-09-12 01:46:56',
            ),
            193 => 
            array (
                'id' => 2299,
                'presensi_id' => 144,
                'peserta_id' => 52,
                'sign' => '66e24c92d9dbb.png',
                'slug' => '7zUoNkntswVopDlusl9O',
                'created_at' => '2024-09-11 23:54:24',
                'updated_at' => '2024-09-12 02:06:10',
            ),
            194 => 
            array (
                'id' => 2300,
                'presensi_id' => 144,
                'peserta_id' => 10,
                'sign' => '66e2488359dd3.png',
                'slug' => 'MBskbegTZaYO4wYRvmcI',
                'created_at' => '2024-09-11 23:54:29',
                'updated_at' => '2024-09-12 01:48:51',
            ),
            195 => 
            array (
                'id' => 2301,
                'presensi_id' => 144,
                'peserta_id' => 85,
                'sign' => '66e24a499b39a.png',
                'slug' => 'qDg5xpFi2qcdKqqmleyS',
                'created_at' => '2024-09-11 23:54:33',
                'updated_at' => '2024-09-12 01:56:25',
            ),
            196 => 
            array (
                'id' => 2302,
                'presensi_id' => 144,
                'peserta_id' => 12,
                'sign' => '66e24a3d05600.png',
                'slug' => 'wIb3s12vFI9yloiTgNfc',
                'created_at' => '2024-09-11 23:54:38',
                'updated_at' => '2024-09-12 01:56:13',
            ),
            197 => 
            array (
                'id' => 2303,
                'presensi_id' => 144,
                'peserta_id' => 107,
                'sign' => '66e2486a471aa.png',
                'slug' => 'QoNuXJWRtpEhlbzdL9P1',
                'created_at' => '2024-09-11 23:54:45',
                'updated_at' => '2024-09-12 01:48:26',
            ),
            198 => 
            array (
                'id' => 2304,
                'presensi_id' => 144,
                'peserta_id' => 109,
                'sign' => '66e24c6ae3f05.png',
                'slug' => 'eXrgb8sXUXYnD1Bsikhv',
                'created_at' => '2024-09-11 23:54:51',
                'updated_at' => '2024-09-12 02:05:30',
            ),
            199 => 
            array (
                'id' => 2305,
                'presensi_id' => 144,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'GiuNCBP4hWSozIt815Mj',
                'created_at' => '2024-09-11 23:54:55',
                'updated_at' => '2024-09-11 23:54:55',
            ),
            200 => 
            array (
                'id' => 2306,
                'presensi_id' => 144,
                'peserta_id' => 98,
                'sign' => '66e249bb88388.png',
                'slug' => 'oX8oc4x3vcgQn8okQ2cb',
                'created_at' => '2024-09-11 23:55:02',
                'updated_at' => '2024-09-12 01:54:03',
            ),
            201 => 
            array (
                'id' => 2307,
                'presensi_id' => 144,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'mtHVF8RZ8qiGCxiE3kQG',
                'created_at' => '2024-09-11 23:55:07',
                'updated_at' => '2024-09-11 23:55:07',
            ),
            202 => 
            array (
                'id' => 2308,
                'presensi_id' => 144,
                'peserta_id' => 212,
                'sign' => '66e248d82fa5b.png',
                'slug' => 'X0ulzlVVVlt9EpkL2bt9',
                'created_at' => '2024-09-12 00:09:35',
                'updated_at' => '2024-09-12 01:50:16',
            ),
            203 => 
            array (
                'id' => 2309,
                'presensi_id' => 144,
                'peserta_id' => 105,
                'sign' => '66e2493ef398b.png',
                'slug' => 'fYQ0HKxzQ1JgSh8iriNG',
                'created_at' => '2024-09-12 00:09:40',
                'updated_at' => '2024-09-12 01:51:59',
            ),
            204 => 
            array (
                'id' => 2310,
                'presensi_id' => 144,
                'peserta_id' => 100,
                'sign' => '66e24ab195e24.png',
                'slug' => 'QjCEV3Z6oEuCQ3ABiVoR',
                'created_at' => '2024-09-12 00:09:46',
                'updated_at' => '2024-09-12 01:58:09',
            ),
            205 => 
            array (
                'id' => 2311,
                'presensi_id' => 144,
                'peserta_id' => 102,
                'sign' => '66e33f3b22867.png',
                'slug' => 'zWhHtkKvedBAYotjwGG0',
                'created_at' => '2024-09-12 00:09:51',
                'updated_at' => '2024-09-12 19:21:31',
            ),
            206 => 
            array (
                'id' => 2312,
                'presensi_id' => 144,
                'peserta_id' => 232,
                'sign' => '66e2633a60c37.png',
                'slug' => 'dq2nUzWj99MBO4wKMqNC',
                'created_at' => '2024-09-12 00:46:48',
                'updated_at' => '2024-09-12 03:42:50',
            ),
            207 => 
            array (
                'id' => 2313,
                'presensi_id' => 144,
                'peserta_id' => 233,
                'sign' => NULL,
                'slug' => 'NUz8DuFrkhNawCnlQyZL',
                'created_at' => '2024-09-12 00:46:54',
                'updated_at' => '2024-09-12 00:46:54',
            ),
            208 => 
            array (
                'id' => 2314,
                'presensi_id' => 144,
                'peserta_id' => 234,
                'sign' => '66e2547cb4fa3.png',
                'slug' => 'BmWkSANP2OiixJFMG0l7',
                'created_at' => '2024-09-12 00:47:06',
                'updated_at' => '2024-09-12 02:39:56',
            ),
            209 => 
            array (
                'id' => 2315,
                'presensi_id' => 144,
                'peserta_id' => 235,
                'sign' => NULL,
                'slug' => 'shhfPfcR4EL5CK2I1UDZ',
                'created_at' => '2024-09-12 00:47:12',
                'updated_at' => '2024-09-12 00:47:12',
            ),
            210 => 
            array (
                'id' => 2316,
                'presensi_id' => 144,
                'peserta_id' => 236,
                'sign' => '66e253a612b28.png',
                'slug' => '0DhacuZqitDhZvfufb1F',
                'created_at' => '2024-09-12 00:47:36',
                'updated_at' => '2024-09-12 02:36:22',
            ),
            211 => 
            array (
                'id' => 2317,
                'presensi_id' => 144,
                'peserta_id' => 6,
                'sign' => '66e24948a794d.png',
                'slug' => 'lS07aY6uxOta3TyN5aak',
                'created_at' => '2024-09-12 01:32:59',
                'updated_at' => '2024-09-12 01:52:08',
            ),
            212 => 
            array (
                'id' => 2318,
                'presensi_id' => 144,
                'peserta_id' => 108,
                'sign' => '66e2495408b9b.png',
                'slug' => '2eYpp4uIgcwV0blFB7NK',
                'created_at' => '2024-09-12 01:33:04',
                'updated_at' => '2024-09-12 01:52:20',
            ),
            213 => 
            array (
                'id' => 2319,
                'presensi_id' => 144,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'Vq6DEgqqJgYkSBx9mOzw',
                'created_at' => '2024-09-12 01:51:56',
                'updated_at' => '2024-09-12 01:51:56',
            ),
            214 => 
            array (
                'id' => 2320,
                'presensi_id' => 145,
                'peserta_id' => 5,
                'sign' => '66e381a596ba4.png',
                'slug' => '4Le5Uyia701aygEPimE7',
                'created_at' => '2024-09-12 23:46:08',
                'updated_at' => '2024-09-13 00:04:53',
            ),
            215 => 
            array (
                'id' => 2321,
                'presensi_id' => 145,
                'peserta_id' => 6,
                'sign' => '66e38401ecf4d.png',
                'slug' => '91SVLfdQJiZeN96hU4lC',
                'created_at' => '2024-09-12 23:46:33',
                'updated_at' => '2024-09-13 00:14:57',
            ),
            216 => 
            array (
                'id' => 2322,
                'presensi_id' => 145,
                'peserta_id' => 9,
                'sign' => '66e38144a1d9e.png',
                'slug' => '8nNvoaa5lKD42C0Tr9KW',
                'created_at' => '2024-09-12 23:46:37',
                'updated_at' => '2024-09-13 00:03:16',
            ),
            217 => 
            array (
                'id' => 2323,
                'presensi_id' => 145,
                'peserta_id' => 10,
                'sign' => '66e3817ec292b.png',
                'slug' => 'geFlYNX4ULWQ44YjFNxG',
                'created_at' => '2024-09-12 23:46:43',
                'updated_at' => '2024-09-13 00:04:14',
            ),
            218 => 
            array (
                'id' => 2324,
                'presensi_id' => 145,
                'peserta_id' => 52,
                'sign' => '66e385208b745.png',
                'slug' => 'svDB2g2ctg46NXOFFGgC',
                'created_at' => '2024-09-12 23:46:47',
                'updated_at' => '2024-09-13 00:19:44',
            ),
            219 => 
            array (
                'id' => 2325,
                'presensi_id' => 145,
                'peserta_id' => 85,
                'sign' => '66e3865875c02.png',
                'slug' => '39hEjD62o86DbJUyLXoZ',
                'created_at' => '2024-09-12 23:46:52',
                'updated_at' => '2024-09-13 00:24:56',
            ),
            220 => 
            array (
                'id' => 2326,
                'presensi_id' => 145,
                'peserta_id' => 12,
                'sign' => '66e381c10e692.png',
                'slug' => 'kEWDgt6sBM80Ov3rX5Vg',
                'created_at' => '2024-09-12 23:46:56',
                'updated_at' => '2024-09-13 00:05:21',
            ),
            221 => 
            array (
                'id' => 2327,
                'presensi_id' => 145,
                'peserta_id' => 107,
                'sign' => '66e38408f030f.png',
                'slug' => 'PnWgu0b9NDWecD5bvEIk',
                'created_at' => '2024-09-12 23:47:00',
                'updated_at' => '2024-09-13 00:15:04',
            ),
            222 => 
            array (
                'id' => 2328,
                'presensi_id' => 145,
                'peserta_id' => 109,
                'sign' => '66e383dd3e3c9.png',
                'slug' => 'SvzV5TkrfMBOTR9dYeSH',
                'created_at' => '2024-09-12 23:47:04',
                'updated_at' => '2024-09-13 00:14:21',
            ),
            223 => 
            array (
                'id' => 2329,
                'presensi_id' => 145,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'hOZCr3hmJpiu26IxWJFq',
                'created_at' => '2024-09-12 23:47:11',
                'updated_at' => '2024-09-12 23:47:11',
            ),
            224 => 
            array (
                'id' => 2330,
                'presensi_id' => 145,
                'peserta_id' => 98,
                'sign' => '66e38289cb7c2.png',
                'slug' => 'wKXsGLaD8P4pGyfSUEjR',
                'created_at' => '2024-09-12 23:47:41',
                'updated_at' => '2024-09-13 00:08:41',
            ),
            225 => 
            array (
                'id' => 2331,
                'presensi_id' => 145,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'AMPpqNUTubsx5V8OrpI2',
                'created_at' => '2024-09-12 23:47:49',
                'updated_at' => '2024-09-12 23:47:49',
            ),
            226 => 
            array (
                'id' => 2332,
                'presensi_id' => 145,
                'peserta_id' => 102,
                'sign' => '66e382623dac9.png',
                'slug' => 'hZCMGgoqKIOZ22vdzsMe',
                'created_at' => '2024-09-12 23:47:56',
                'updated_at' => '2024-09-13 00:08:02',
            ),
            227 => 
            array (
                'id' => 2333,
                'presensi_id' => 145,
                'peserta_id' => 100,
                'sign' => '66e382f035dec.png',
                'slug' => 'douqf4vKNG61nHFxFJV6',
                'created_at' => '2024-09-12 23:48:03',
                'updated_at' => '2024-09-13 00:10:24',
            ),
            228 => 
            array (
                'id' => 2334,
                'presensi_id' => 145,
                'peserta_id' => 168,
                'sign' => NULL,
                'slug' => 'GHyP9hF93yO2CjyJ8Qte',
                'created_at' => '2024-09-12 23:54:19',
                'updated_at' => '2024-09-12 23:54:19',
            ),
            229 => 
            array (
                'id' => 2335,
                'presensi_id' => 145,
                'peserta_id' => 169,
                'sign' => '66e3843117279.png',
                'slug' => 'I8iFK5ORJ2CAuTWYUEQo',
                'created_at' => '2024-09-12 23:54:24',
                'updated_at' => '2024-09-13 00:15:45',
            ),
            230 => 
            array (
                'id' => 2336,
                'presensi_id' => 145,
                'peserta_id' => 170,
                'sign' => NULL,
                'slug' => 'aqq8hSJG4Za2gBGEnb42',
                'created_at' => '2024-09-12 23:54:30',
                'updated_at' => '2024-09-12 23:54:30',
            ),
            231 => 
            array (
                'id' => 2337,
                'presensi_id' => 145,
                'peserta_id' => 237,
                'sign' => '66e4700493c80.png',
                'slug' => 'GKPjf5FP7ppbDckyUpWX',
                'created_at' => '2024-09-12 23:54:35',
                'updated_at' => '2024-09-13 17:01:56',
            ),
            232 => 
            array (
                'id' => 2353,
                'presensi_id' => 147,
                'peserta_id' => 5,
                'sign' => '66f09d79283d8.png',
                'slug' => 'x0W5QsRoqW5K8nSVQ0T4',
                'created_at' => '2024-09-22 22:22:32',
                'updated_at' => '2024-09-22 22:43:05',
            ),
            233 => 
            array (
                'id' => 2354,
                'presensi_id' => 147,
                'peserta_id' => 9,
                'sign' => '66f09e6f1f08e.png',
                'slug' => 'eoV9sV0aLXD10LQ3ZXgU',
                'created_at' => '2024-09-22 22:23:06',
                'updated_at' => '2024-09-22 22:47:11',
            ),
            234 => 
            array (
                'id' => 2355,
                'presensi_id' => 147,
                'peserta_id' => 52,
                'sign' => '66f09e1587446.png',
                'slug' => 'U8eBNJ7LdaXbVOW8Tda6',
                'created_at' => '2024-09-22 22:23:14',
                'updated_at' => '2024-09-22 22:45:41',
            ),
            235 => 
            array (
                'id' => 2356,
                'presensi_id' => 147,
                'peserta_id' => 10,
                'sign' => '66f0a9eaed03c.png',
                'slug' => 'yfNwEBWsXheD2DEwyXxK',
                'created_at' => '2024-09-22 22:23:21',
                'updated_at' => '2024-09-22 23:36:10',
            ),
            236 => 
            array (
                'id' => 2357,
                'presensi_id' => 147,
                'peserta_id' => 85,
                'sign' => '66f0a56d29774.png',
                'slug' => 'QWPsgUmE9DKm5UEN01mI',
                'created_at' => '2024-09-22 22:23:31',
                'updated_at' => '2024-09-22 23:17:01',
            ),
            237 => 
            array (
                'id' => 2358,
                'presensi_id' => 147,
                'peserta_id' => 12,
                'sign' => '66f09fd158e50.png',
                'slug' => 'eRnWCG5Fy7QHNGFWqnL0',
                'created_at' => '2024-09-22 22:23:47',
                'updated_at' => '2024-09-22 22:53:05',
            ),
            238 => 
            array (
                'id' => 2359,
                'presensi_id' => 147,
                'peserta_id' => 107,
                'sign' => '66f09f65e81e1.png',
                'slug' => 'dvncxb8sMMTdDZnvZ3ui',
                'created_at' => '2024-09-22 22:24:03',
                'updated_at' => '2024-09-22 22:51:17',
            ),
            239 => 
            array (
                'id' => 2360,
                'presensi_id' => 147,
                'peserta_id' => 108,
                'sign' => '66f09f6eeb350.png',
                'slug' => 'JBC76TgVfn2cb1oI4mDW',
                'created_at' => '2024-09-22 22:24:19',
                'updated_at' => '2024-09-22 22:51:26',
            ),
            240 => 
            array (
                'id' => 2361,
                'presensi_id' => 147,
                'peserta_id' => 109,
                'sign' => '66f09fed99064.png',
                'slug' => 'vZiN043Tt37Blj30iMNQ',
                'created_at' => '2024-09-22 22:24:32',
                'updated_at' => '2024-09-22 22:53:33',
            ),
            241 => 
            array (
                'id' => 2362,
                'presensi_id' => 147,
                'peserta_id' => 21,
                'sign' => '66f0a024f0a55.png',
                'slug' => 'c3NrGR6kFD1uaLqKrrDF',
                'created_at' => '2024-09-22 22:24:43',
                'updated_at' => '2024-09-22 22:54:28',
            ),
            242 => 
            array (
                'id' => 2363,
                'presensi_id' => 147,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'EgSQINCN68znBv6fZs65',
                'created_at' => '2024-09-22 22:24:51',
                'updated_at' => '2024-09-22 22:24:51',
            ),
            243 => 
            array (
                'id' => 2364,
                'presensi_id' => 147,
                'peserta_id' => 38,
                'sign' => '66f0a0385834e.png',
                'slug' => 'uBp3n5UuoWhPQdj3AisG',
                'created_at' => '2024-09-22 22:24:57',
                'updated_at' => '2024-09-22 22:54:48',
            ),
            244 => 
            array (
                'id' => 2365,
                'presensi_id' => 147,
                'peserta_id' => 1,
                'sign' => NULL,
                'slug' => 'QpIlNm9akepZskrAgzGU',
                'created_at' => '2024-09-22 22:25:09',
                'updated_at' => '2024-09-22 22:25:09',
            ),
            245 => 
            array (
                'id' => 2366,
                'presensi_id' => 147,
                'peserta_id' => 26,
                'sign' => '66f0a62c75eb4.png',
                'slug' => 'FWCUzqiNyfR37Myeghvw',
                'created_at' => '2024-09-22 22:25:17',
                'updated_at' => '2024-09-22 23:20:12',
            ),
            246 => 
            array (
                'id' => 2367,
                'presensi_id' => 147,
                'peserta_id' => 144,
                'sign' => '66f0b06f00496.png',
                'slug' => 'IbgzFECSXEGQX5o1Rc7g',
                'created_at' => '2024-09-22 22:25:24',
                'updated_at' => '2024-09-23 00:03:59',
            ),
            247 => 
            array (
                'id' => 2368,
                'presensi_id' => 147,
                'peserta_id' => 82,
                'sign' => '66f0a5ebc7bc8.png',
                'slug' => 'Kzs6JYeq5W32AIscrhsU',
                'created_at' => '2024-09-22 22:25:33',
                'updated_at' => '2024-09-22 23:19:07',
            ),
            248 => 
            array (
                'id' => 2369,
                'presensi_id' => 147,
                'peserta_id' => 151,
                'sign' => '66f0a08343c1e.png',
                'slug' => 'IjCBHWPFxEiD4KFVbgTK',
                'created_at' => '2024-09-22 22:25:45',
                'updated_at' => '2024-09-22 22:56:03',
            ),
            249 => 
            array (
                'id' => 2370,
                'presensi_id' => 147,
                'peserta_id' => 111,
                'sign' => '66f0a203dfc49.png',
                'slug' => 'LGbPUvQDB1WJh0nyMvr2',
                'created_at' => '2024-09-22 22:25:52',
                'updated_at' => '2024-09-22 23:02:27',
            ),
            250 => 
            array (
                'id' => 2371,
                'presensi_id' => 147,
                'peserta_id' => 98,
                'sign' => '66f0a8b636a13.png',
                'slug' => 'DqKGu8NmRvpDs07h9OEE',
                'created_at' => '2024-09-22 22:25:58',
                'updated_at' => '2024-09-22 23:31:02',
            ),
            251 => 
            array (
                'id' => 2372,
                'presensi_id' => 147,
                'peserta_id' => 152,
                'sign' => '66f0a56d7069a.png',
                'slug' => 'I0urxWM2VDRbFPgeFEdG',
                'created_at' => '2024-09-22 22:26:03',
                'updated_at' => '2024-09-22 23:17:01',
            ),
            252 => 
            array (
                'id' => 2373,
                'presensi_id' => 147,
                'peserta_id' => 212,
                'sign' => '66f0a24cf3043.png',
                'slug' => 'dKOwRMXwmLdTCmtfXLnu',
                'created_at' => '2024-09-22 22:26:10',
                'updated_at' => '2024-09-22 23:03:41',
            ),
            253 => 
            array (
                'id' => 2374,
                'presensi_id' => 147,
                'peserta_id' => 105,
                'sign' => '66f0c936d71a8.png',
                'slug' => 'BthwcKOxeMcKf3ZlfUuA',
                'created_at' => '2024-09-22 22:26:16',
                'updated_at' => '2024-09-23 01:49:42',
            ),
            254 => 
            array (
                'id' => 2375,
                'presensi_id' => 147,
                'peserta_id' => 100,
                'sign' => '66f0a1c91eb14.png',
                'slug' => '1v3bUKbo85CiPooc4iZs',
                'created_at' => '2024-09-22 22:26:21',
                'updated_at' => '2024-09-22 23:01:29',
            ),
            255 => 
            array (
                'id' => 2376,
                'presensi_id' => 147,
                'peserta_id' => 102,
                'sign' => '66f0a088673d8.png',
                'slug' => 'HUKbw9ufp6iqJxESjtit',
                'created_at' => '2024-09-22 22:26:27',
                'updated_at' => '2024-09-22 22:56:08',
            ),
            256 => 
            array (
                'id' => 2377,
                'presensi_id' => 147,
                'peserta_id' => 40,
                'sign' => '66f0a58666e54.png',
                'slug' => '37VfC2ecOm4UPghEGitC',
                'created_at' => '2024-09-22 22:26:34',
                'updated_at' => '2024-09-22 23:17:26',
            ),
            257 => 
            array (
                'id' => 2378,
                'presensi_id' => 147,
                'peserta_id' => 47,
                'sign' => '66f0ab0d32608.png',
                'slug' => 'DYMleJDHmya0Y5ujjQtr',
                'created_at' => '2024-09-22 22:26:43',
                'updated_at' => '2024-09-22 23:41:01',
            ),
            258 => 
            array (
                'id' => 2379,
                'presensi_id' => 147,
                'peserta_id' => 48,
                'sign' => '66f0c6ff1e974.png',
                'slug' => '7hIHh9BSOQyGeRdQbBSe',
                'created_at' => '2024-09-22 22:26:51',
                'updated_at' => '2024-09-23 01:40:15',
            ),
            259 => 
            array (
                'id' => 2380,
                'presensi_id' => 147,
                'peserta_id' => 49,
                'sign' => '66f0a1fa2370b.png',
                'slug' => 'ronfgCGrWiMcNSo2DLxA',
                'created_at' => '2024-09-22 22:27:00',
                'updated_at' => '2024-09-22 23:02:18',
            ),
            260 => 
            array (
                'id' => 2381,
                'presensi_id' => 148,
                'peserta_id' => 5,
                'sign' => '66f1c974f1ca0.png',
                'slug' => 'zwqo8H7tC9uEJTmrxG4D',
                'created_at' => '2024-09-23 19:18:31',
                'updated_at' => '2024-09-23 20:03:00',
            ),
            261 => 
            array (
                'id' => 2382,
                'presensi_id' => 148,
                'peserta_id' => 9,
                'sign' => '66f1c9b66a913.png',
                'slug' => 'vutrHNdMIuRxvFRWY8PJ',
                'created_at' => '2024-09-23 19:19:02',
                'updated_at' => '2024-09-23 20:04:06',
            ),
            262 => 
            array (
                'id' => 2383,
                'presensi_id' => 148,
                'peserta_id' => 52,
                'sign' => '66f1c9d5933a0.png',
                'slug' => '5azazroImyJYl9ICGGuU',
                'created_at' => '2024-09-23 19:19:18',
                'updated_at' => '2024-09-23 20:04:37',
            ),
            263 => 
            array (
                'id' => 2384,
                'presensi_id' => 148,
                'peserta_id' => 85,
                'sign' => '66f1f73821439.png',
                'slug' => 'JtebJuM4VehKaz6go3vC',
                'created_at' => '2024-09-23 19:19:22',
                'updated_at' => '2024-09-23 23:18:16',
            ),
            264 => 
            array (
                'id' => 2385,
                'presensi_id' => 148,
                'peserta_id' => 10,
                'sign' => '66f1d54362644.png',
                'slug' => '566whMwMb319KojdoQMo',
                'created_at' => '2024-09-23 19:19:30',
                'updated_at' => '2024-09-23 20:53:23',
            ),
            265 => 
            array (
                'id' => 2386,
                'presensi_id' => 148,
                'peserta_id' => 12,
                'sign' => '66f1ca54a1177.png',
                'slug' => 'oeVp5KL37IrHeHLrIj7J',
                'created_at' => '2024-09-23 19:19:33',
                'updated_at' => '2024-09-23 20:06:44',
            ),
            266 => 
            array (
                'id' => 2387,
                'presensi_id' => 148,
                'peserta_id' => 107,
                'sign' => '66f1ce8a3ba92.png',
                'slug' => 'PX3tmpUq4ehCJwBaPdGY',
                'created_at' => '2024-09-23 19:19:37',
                'updated_at' => '2024-09-23 20:24:42',
            ),
            267 => 
            array (
                'id' => 2388,
                'presensi_id' => 148,
                'peserta_id' => 108,
                'sign' => '66f1ce929eab5.png',
                'slug' => 'v0snT0sD3lPpVG5Ftup9',
                'created_at' => '2024-09-23 19:19:42',
                'updated_at' => '2024-09-23 20:24:50',
            ),
            268 => 
            array (
                'id' => 2389,
                'presensi_id' => 148,
                'peserta_id' => 109,
                'sign' => '66f1d709b46ea.png',
                'slug' => 'EXRmsjtlZLt0avlmUJYj',
                'created_at' => '2024-09-23 19:19:46',
                'updated_at' => '2024-09-23 21:00:57',
            ),
            269 => 
            array (
                'id' => 2390,
                'presensi_id' => 148,
                'peserta_id' => 21,
                'sign' => '66f1cc15971db.png',
                'slug' => 'hFPZdJl7op6DNjefmDmo',
                'created_at' => '2024-09-23 19:19:50',
                'updated_at' => '2024-09-23 20:14:13',
            ),
            270 => 
            array (
                'id' => 2391,
                'presensi_id' => 148,
                'peserta_id' => 22,
                'sign' => NULL,
                'slug' => 'Q586fVQoFX7gq1VDrMb0',
                'created_at' => '2024-09-23 19:19:55',
                'updated_at' => '2024-09-23 19:19:55',
            ),
            271 => 
            array (
                'id' => 2392,
                'presensi_id' => 148,
                'peserta_id' => 98,
                'sign' => '66f1cc00a61fb.png',
                'slug' => 'M8J94uUDjcKCpYeIDtHe',
                'created_at' => '2024-09-23 19:19:59',
                'updated_at' => '2024-09-23 20:13:52',
            ),
            272 => 
            array (
                'id' => 2393,
                'presensi_id' => 148,
                'peserta_id' => 152,
                'sign' => '66f1cb1ce5ff7.png',
                'slug' => 'x3AUahvtt9xkJXDRvU6h',
                'created_at' => '2024-09-23 19:20:03',
                'updated_at' => '2024-09-23 20:10:04',
            ),
            273 => 
            array (
                'id' => 2394,
                'presensi_id' => 148,
                'peserta_id' => 105,
                'sign' => '66f1caedabb74.png',
                'slug' => 'y5FAmcqLUMC9XF9C0BBT',
                'created_at' => '2024-09-23 19:20:10',
                'updated_at' => '2024-09-23 20:09:17',
            ),
            274 => 
            array (
                'id' => 2395,
                'presensi_id' => 148,
                'peserta_id' => 212,
                'sign' => '66f1caea99e65.png',
                'slug' => 'a5ioSkUbvnOoRWf4ZOQN',
                'created_at' => '2024-09-23 19:20:14',
                'updated_at' => '2024-09-23 20:09:14',
            ),
            275 => 
            array (
                'id' => 2396,
                'presensi_id' => 148,
                'peserta_id' => 100,
                'sign' => '66f1caf749ff9.png',
                'slug' => 'uA5geJEDPlyMdGfAwXya',
                'created_at' => '2024-09-23 19:20:19',
                'updated_at' => '2024-09-23 20:09:27',
            ),
            276 => 
            array (
                'id' => 2397,
                'presensi_id' => 148,
                'peserta_id' => 102,
                'sign' => '66f1cfad195cf.png',
                'slug' => 'oULhoLzlsaN333lc2c8L',
                'created_at' => '2024-09-23 19:20:23',
                'updated_at' => '2024-09-23 20:29:33',
            ),
            277 => 
            array (
                'id' => 2398,
                'presensi_id' => 148,
                'peserta_id' => 238,
                'sign' => '66f1d0e65fb41.png',
                'slug' => 'AuWXnkbFqYrWh37J3Fyn',
                'created_at' => '2024-09-23 20:01:47',
                'updated_at' => '2024-09-23 20:34:46',
            ),
            278 => 
            array (
                'id' => 2399,
                'presensi_id' => 148,
                'peserta_id' => 38,
                'sign' => '66f1d009076ec.png',
                'slug' => 'PL5fw1MUnvMiZxfutsmi',
                'created_at' => '2024-09-23 20:01:53',
                'updated_at' => '2024-09-23 20:31:05',
            ),
            279 => 
            array (
                'id' => 2400,
                'presensi_id' => 149,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'D4qhJ2tVsL0dhduNslXW',
                'created_at' => '2024-10-01 22:40:56',
                'updated_at' => '2024-10-01 22:40:56',
            ),
            280 => 
            array (
                'id' => 2401,
                'presensi_id' => 149,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'vsMH6mgI1pTzATAkzGyw',
                'created_at' => '2024-10-01 22:42:20',
                'updated_at' => '2024-10-01 22:42:20',
            ),
            281 => 
            array (
                'id' => 2402,
                'presensi_id' => 149,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'swwGemRo2gk21n18l4NC',
                'created_at' => '2024-10-01 22:42:25',
                'updated_at' => '2024-10-01 22:42:25',
            ),
            282 => 
            array (
                'id' => 2403,
                'presensi_id' => 149,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => 'mn3em9ciUlYX4EsYTfHs',
                'created_at' => '2024-10-01 22:42:31',
                'updated_at' => '2024-10-01 22:42:31',
            ),
            283 => 
            array (
                'id' => 2404,
                'presensi_id' => 149,
                'peserta_id' => 85,
                'sign' => NULL,
                'slug' => 'fU5Zp0dNDnY5bVmoIp9V',
                'created_at' => '2024-10-01 22:42:36',
                'updated_at' => '2024-10-01 22:42:36',
            ),
            284 => 
            array (
                'id' => 2405,
                'presensi_id' => 149,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'YtTtb5TBR27wUyo0euuq',
                'created_at' => '2024-10-01 22:42:42',
                'updated_at' => '2024-10-01 22:42:42',
            ),
            285 => 
            array (
                'id' => 2406,
                'presensi_id' => 149,
                'peserta_id' => 107,
                'sign' => NULL,
                'slug' => '9tkGxhNlUR0HQeqiTe9z',
                'created_at' => '2024-10-01 22:42:46',
                'updated_at' => '2024-10-01 22:42:46',
            ),
            286 => 
            array (
                'id' => 2407,
                'presensi_id' => 149,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'OMM8VBLgC1t7kzYIKIOh',
                'created_at' => '2024-10-01 22:42:51',
                'updated_at' => '2024-10-01 22:42:51',
            ),
            287 => 
            array (
                'id' => 2408,
                'presensi_id' => 149,
                'peserta_id' => 98,
                'sign' => NULL,
                'slug' => 'HWqBo2yD8isQXrvt94pw',
                'created_at' => '2024-10-01 22:42:58',
                'updated_at' => '2024-10-01 22:42:58',
            ),
            288 => 
            array (
                'id' => 2409,
                'presensi_id' => 149,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 't3kjmLRUHfGIfV577DDs',
                'created_at' => '2024-10-01 22:43:02',
                'updated_at' => '2024-10-01 22:43:02',
            ),
            289 => 
            array (
                'id' => 2410,
                'presensi_id' => 149,
                'peserta_id' => 105,
                'sign' => NULL,
                'slug' => 'sXP9O3FuMWQvA5sMhbnN',
                'created_at' => '2024-10-01 22:43:09',
                'updated_at' => '2024-10-01 22:43:09',
            ),
            290 => 
            array (
                'id' => 2411,
                'presensi_id' => 149,
                'peserta_id' => 212,
                'sign' => NULL,
                'slug' => 'E4mASmomzQaEJ4gScfTn',
                'created_at' => '2024-10-01 22:43:31',
                'updated_at' => '2024-10-01 22:43:31',
            ),
            291 => 
            array (
                'id' => 2412,
                'presensi_id' => 150,
                'peserta_id' => 5,
                'sign' => '66fdeba115f13.png',
                'slug' => 'ELUqOdtYaJ478W6wJq1G',
                'created_at' => '2024-10-02 21:28:47',
                'updated_at' => '2024-10-03 00:56:01',
            ),
            292 => 
            array (
                'id' => 2413,
                'presensi_id' => 150,
                'peserta_id' => 9,
                'sign' => '66fdc04172ac1.png',
                'slug' => 'sFkWn1Q77fYf5g9Nszg4',
                'created_at' => '2024-10-02 21:30:11',
                'updated_at' => '2024-10-02 21:50:57',
            ),
            293 => 
            array (
                'id' => 2414,
                'presensi_id' => 150,
                'peserta_id' => 10,
                'sign' => '66fde294ad3e8.png',
                'slug' => 'ARepMxf8PLtdLuyAAMcv',
                'created_at' => '2024-10-02 21:30:16',
                'updated_at' => '2024-10-03 00:17:24',
            ),
            294 => 
            array (
                'id' => 2415,
                'presensi_id' => 150,
                'peserta_id' => 52,
                'sign' => '66fdddab4f865.png',
                'slug' => '9ONKIW6cqz0O3Mwzhcpv',
                'created_at' => '2024-10-02 21:30:20',
                'updated_at' => '2024-10-02 23:56:27',
            ),
            295 => 
            array (
                'id' => 2416,
                'presensi_id' => 150,
                'peserta_id' => 85,
                'sign' => '66fdc7152c36b.png',
                'slug' => 'p6Ea75IuqeZ2zlgtA7qn',
                'created_at' => '2024-10-02 21:30:27',
                'updated_at' => '2024-10-02 22:20:05',
            ),
            296 => 
            array (
                'id' => 2417,
                'presensi_id' => 150,
                'peserta_id' => 12,
                'sign' => '66fdd19bcf686.png',
                'slug' => '34y61Hk1E5FQuM8gMdAY',
                'created_at' => '2024-10-02 21:30:35',
                'updated_at' => '2024-10-02 23:04:59',
            ),
            297 => 
            array (
                'id' => 2418,
                'presensi_id' => 150,
                'peserta_id' => 107,
                'sign' => '66fdc256e1be2.png',
                'slug' => 'WmgchJOa6iHD2DqQneg5',
                'created_at' => '2024-10-02 21:30:39',
                'updated_at' => '2024-10-02 21:59:50',
            ),
            298 => 
            array (
                'id' => 2419,
                'presensi_id' => 150,
                'peserta_id' => 109,
                'sign' => '66fdc2035ba33.png',
                'slug' => '6tIjJ0niIEi0oxYltxvK',
                'created_at' => '2024-10-02 21:30:43',
                'updated_at' => '2024-10-02 21:58:27',
            ),
            299 => 
            array (
                'id' => 2420,
                'presensi_id' => 150,
                'peserta_id' => 108,
                'sign' => '66fdc25e9994d.png',
                'slug' => 'zrw3DQQijiwFNIPDduX1',
                'created_at' => '2024-10-02 21:30:51',
                'updated_at' => '2024-10-02 21:59:58',
            ),
            300 => 
            array (
                'id' => 2421,
                'presensi_id' => 150,
                'peserta_id' => 102,
                'sign' => '66fdc27306ba7.png',
                'slug' => 'ImEZi25TV4elfgYc3mPh',
                'created_at' => '2024-10-02 21:30:59',
                'updated_at' => '2024-10-02 22:00:19',
            ),
            301 => 
            array (
                'id' => 2422,
                'presensi_id' => 150,
                'peserta_id' => 100,
                'sign' => '66fdc62e7e3fd.png',
                'slug' => 'XybCbavpaIron80wTBTf',
                'created_at' => '2024-10-02 21:31:04',
                'updated_at' => '2024-10-02 22:16:14',
            ),
            302 => 
            array (
                'id' => 2423,
                'presensi_id' => 151,
                'peserta_id' => 5,
                'sign' => '6702e3bb5478e.png',
                'slug' => '10xqsbW65UQBJt0Pmyzu',
                'created_at' => '2024-10-06 18:54:33',
                'updated_at' => '2024-10-06 19:23:39',
            ),
            303 => 
            array (
                'id' => 2424,
                'presensi_id' => 151,
                'peserta_id' => 9,
                'sign' => '67030980e03b2.png',
                'slug' => 'qRAF1AX5VnsCYqJlpWIX',
                'created_at' => '2024-10-06 18:54:42',
                'updated_at' => '2024-10-06 22:04:48',
            ),
            304 => 
            array (
                'id' => 2425,
                'presensi_id' => 151,
                'peserta_id' => 85,
                'sign' => '6702f4497869e.png',
                'slug' => 'BqCbLmHvOCA32NnGAtqP',
                'created_at' => '2024-10-06 18:54:47',
                'updated_at' => '2024-10-06 20:34:17',
            ),
            305 => 
            array (
                'id' => 2426,
                'presensi_id' => 151,
                'peserta_id' => 52,
                'sign' => '6702e55227730.png',
                'slug' => 'uAn8BLBeMhF7je4brtQa',
                'created_at' => '2024-10-06 18:54:52',
                'updated_at' => '2024-10-06 19:30:26',
            ),
            306 => 
            array (
                'id' => 2427,
                'presensi_id' => 151,
                'peserta_id' => 12,
                'sign' => '6702e55a55dc6.png',
                'slug' => 'yzfu35rzZr1ZpJkWYQ6D',
                'created_at' => '2024-10-06 18:54:56',
                'updated_at' => '2024-10-06 19:30:34',
            ),
            307 => 
            array (
                'id' => 2428,
                'presensi_id' => 151,
                'peserta_id' => 107,
                'sign' => '6702e829eaf6e.png',
                'slug' => 'i3dDyD8LuoEEI6naoqYR',
                'created_at' => '2024-10-06 18:55:39',
                'updated_at' => '2024-10-06 19:42:33',
            ),
            308 => 
            array (
                'id' => 2429,
                'presensi_id' => 151,
                'peserta_id' => 111,
                'sign' => '6702e67cea69c.png',
                'slug' => 'g4o2oS1g2YoG3GzRKfO0',
                'created_at' => '2024-10-06 18:55:49',
                'updated_at' => '2024-10-06 19:35:24',
            ),
            309 => 
            array (
                'id' => 2430,
                'presensi_id' => 151,
                'peserta_id' => 151,
                'sign' => '6702eb610d798.png',
                'slug' => 'RRo6zCD6y8Tnu4SY6AG6',
                'created_at' => '2024-10-06 18:55:54',
                'updated_at' => '2024-10-06 19:56:17',
            ),
            310 => 
            array (
                'id' => 2431,
                'presensi_id' => 151,
                'peserta_id' => 109,
                'sign' => '67030a4e66c4a.png',
                'slug' => 'Iso20FE2fiqOVabFjY23',
                'created_at' => '2024-10-06 18:56:01',
                'updated_at' => '2024-10-06 22:08:14',
            ),
            311 => 
            array (
                'id' => 2432,
                'presensi_id' => 151,
                'peserta_id' => 10,
                'sign' => '6702e5e79bd7d.png',
                'slug' => 'aAnIvmqEXFXjE2z2PAlV',
                'created_at' => '2024-10-06 18:56:06',
                'updated_at' => '2024-10-06 19:32:55',
            ),
            312 => 
            array (
                'id' => 2433,
                'presensi_id' => 151,
                'peserta_id' => 6,
                'sign' => '6702e8ba1b585.png',
                'slug' => 'XXWbls4OPZNKwAk8ly2u',
                'created_at' => '2024-10-06 19:44:34',
                'updated_at' => '2024-10-06 19:44:58',
            ),
            313 => 
            array (
                'id' => 2434,
                'presensi_id' => 98,
                'peserta_id' => 6,
                'sign' => '670459ee60a25.png',
                'slug' => 'U32aSBuwI6U7cJ5WXUbE',
                'created_at' => '2024-10-07 21:57:02',
                'updated_at' => '2024-10-07 22:00:14',
            ),
            314 => 
            array (
                'id' => 2435,
                'presensi_id' => 98,
                'peserta_id' => 14,
                'sign' => '67045a39b8243.png',
                'slug' => '2CnB9SrjysFq6M83UYcy',
                'created_at' => '2024-10-07 22:01:26',
                'updated_at' => '2024-10-07 22:01:29',
            ),
            315 => 
            array (
                'id' => 2436,
                'presensi_id' => 98,
                'peserta_id' => 39,
                'sign' => '67045a51b36b6.png',
                'slug' => 'ZMhbaJcrLmNJSkgviWk6',
                'created_at' => '2024-10-07 22:01:50',
                'updated_at' => '2024-10-07 22:01:53',
            ),
            316 => 
            array (
                'id' => 2437,
                'presensi_id' => 152,
                'peserta_id' => 5,
                'sign' => '672a9a8423269.png',
                'slug' => '3EtKahL6us1YUiTOE1Ti',
                'created_at' => '2024-11-05 22:17:11',
                'updated_at' => '2024-11-05 22:21:56',
            ),
            317 => 
            array (
                'id' => 2438,
                'presensi_id' => 152,
                'peserta_id' => 9,
                'sign' => '672a9a752a28a.png',
                'slug' => 'vgaN1MhO2L4tQpDG8P2Y',
                'created_at' => '2024-11-05 22:17:23',
                'updated_at' => '2024-11-05 22:21:41',
            ),
            318 => 
            array (
                'id' => 2439,
                'presensi_id' => 152,
                'peserta_id' => 52,
                'sign' => '672a9b905080b.png',
                'slug' => 'V21mkqQDCn0nL32GPght',
                'created_at' => '2024-11-05 22:17:27',
                'updated_at' => '2024-11-05 22:26:24',
            ),
            319 => 
            array (
                'id' => 2440,
                'presensi_id' => 152,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => 'wEF8uqqCcmI9aAF5UU9J',
                'created_at' => '2024-11-05 22:17:32',
                'updated_at' => '2024-11-05 22:17:32',
            ),
            320 => 
            array (
                'id' => 2441,
                'presensi_id' => 152,
                'peserta_id' => 85,
                'sign' => '672aa3e81336c.png',
                'slug' => 'ucMLrWEHyyZMHJS3West',
                'created_at' => '2024-11-05 22:17:36',
                'updated_at' => '2024-11-05 23:02:00',
            ),
            321 => 
            array (
                'id' => 2442,
                'presensi_id' => 152,
                'peserta_id' => 12,
                'sign' => '672a9b4c2dfe1.png',
                'slug' => 'xubUltKT8gphEyDq3YvE',
                'created_at' => '2024-11-05 22:17:40',
                'updated_at' => '2024-11-05 22:25:16',
            ),
            322 => 
            array (
                'id' => 2443,
                'presensi_id' => 152,
                'peserta_id' => 109,
                'sign' => '672a9d536fe56.png',
                'slug' => '94TaDj3Hu3KbFPdOia1z',
                'created_at' => '2024-11-05 22:17:50',
                'updated_at' => '2024-11-05 22:33:55',
            ),
            323 => 
            array (
                'id' => 2444,
                'presensi_id' => 152,
                'peserta_id' => 21,
                'sign' => '672acb1fa3b35.png',
                'slug' => 'zlLKw6WWJ9PkuWodtYZp',
                'created_at' => '2024-11-05 22:17:55',
                'updated_at' => '2024-11-06 01:49:19',
            ),
            324 => 
            array (
                'id' => 2445,
                'presensi_id' => 152,
                'peserta_id' => 111,
                'sign' => '672aa057271b4.png',
                'slug' => 'hJax0VHLxaNe9RVtmYu9',
                'created_at' => '2024-11-05 22:19:51',
                'updated_at' => '2024-11-05 22:46:47',
            ),
            325 => 
            array (
                'id' => 2446,
                'presensi_id' => 152,
                'peserta_id' => 99,
                'sign' => '672a9becb6b06.png',
                'slug' => 'sC17SMKAY9Uf5NxE7ANY',
                'created_at' => '2024-11-05 22:19:56',
                'updated_at' => '2024-11-05 22:27:56',
            ),
            326 => 
            array (
                'id' => 2447,
                'presensi_id' => 152,
                'peserta_id' => 107,
                'sign' => '672a9c690fee7.png',
                'slug' => 'HJMqiZAULIQz7K9zY4H4',
                'created_at' => '2024-11-05 22:29:28',
                'updated_at' => '2024-11-05 22:30:01',
            ),
            327 => 
            array (
                'id' => 2448,
                'presensi_id' => 152,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'UYWwSQSkbyFz60HD3q8r',
                'created_at' => '2024-11-05 22:29:32',
                'updated_at' => '2024-11-05 22:29:32',
            ),
            328 => 
            array (
                'id' => 2449,
                'presensi_id' => 152,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'TPphROT4iBpjTWQVnQQm',
                'created_at' => '2024-11-05 22:29:45',
                'updated_at' => '2024-11-05 22:29:45',
            ),
            329 => 
            array (
                'id' => 2450,
                'presensi_id' => 153,
                'peserta_id' => 5,
                'sign' => '6731544ea750f.png',
                'slug' => '2FURs2Tcfh5vAe78na2d',
                'created_at' => '2024-11-10 21:30:51',
                'updated_at' => '2024-11-11 00:48:14',
            ),
            330 => 
            array (
                'id' => 2451,
                'presensi_id' => 153,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'ePKULerkeAMswdMQJhVJ',
                'created_at' => '2024-11-10 21:31:01',
                'updated_at' => '2024-11-10 21:31:01',
            ),
            331 => 
            array (
                'id' => 2452,
                'presensi_id' => 153,
                'peserta_id' => 9,
                'sign' => '67313d34ac8fa.png',
                'slug' => 'VDnf8PgCp6q5Rj8cyrOm',
                'created_at' => '2024-11-10 21:31:05',
                'updated_at' => '2024-11-10 23:09:40',
            ),
            332 => 
            array (
                'id' => 2453,
                'presensi_id' => 153,
                'peserta_id' => 10,
                'sign' => '67313ef5ba245.png',
                'slug' => '5toGMJi406d4BKHRBwmM',
                'created_at' => '2024-11-10 21:31:09',
                'updated_at' => '2024-11-10 23:17:09',
            ),
            333 => 
            array (
                'id' => 2454,
                'presensi_id' => 153,
                'peserta_id' => 52,
                'sign' => '67313fcd3b481.png',
                'slug' => 'M66peh2PbnXj1zq5Omd2',
                'created_at' => '2024-11-10 21:31:13',
                'updated_at' => '2024-11-10 23:20:45',
            ),
            334 => 
            array (
                'id' => 2455,
                'presensi_id' => 153,
                'peserta_id' => 85,
                'sign' => '67313ec450b68.png',
                'slug' => 'ld9EEbI0aI06cR1POZUY',
                'created_at' => '2024-11-10 21:31:18',
                'updated_at' => '2024-11-10 23:16:20',
            ),
            335 => 
            array (
                'id' => 2456,
                'presensi_id' => 153,
                'peserta_id' => 12,
                'sign' => '673171569a616.png',
                'slug' => 'n4nU0ahDrtmPA7sgg1Ok',
                'created_at' => '2024-11-10 21:31:24',
                'updated_at' => '2024-11-11 02:52:06',
            ),
            336 => 
            array (
                'id' => 2457,
                'presensi_id' => 153,
                'peserta_id' => 107,
                'sign' => '67313e50eb6cd.png',
                'slug' => '9taO3x5KmBgGqEyri8Te',
                'created_at' => '2024-11-10 21:32:02',
                'updated_at' => '2024-11-10 23:14:24',
            ),
            337 => 
            array (
                'id' => 2458,
                'presensi_id' => 153,
                'peserta_id' => 108,
                'sign' => '67313e5e83ddb.png',
                'slug' => 'duyXSvFEu2AXKIsny4IB',
                'created_at' => '2024-11-10 21:32:06',
                'updated_at' => '2024-11-10 23:14:38',
            ),
            338 => 
            array (
                'id' => 2459,
                'presensi_id' => 153,
                'peserta_id' => 109,
                'sign' => '6731545cc7518.png',
                'slug' => '8aKahVQgXpMqUXaHEYGr',
                'created_at' => '2024-11-10 21:32:12',
                'updated_at' => '2024-11-11 00:48:28',
            ),
            339 => 
            array (
                'id' => 2460,
                'presensi_id' => 153,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'hl1C9qayZxD4SBk76JEu',
                'created_at' => '2024-11-10 21:32:16',
                'updated_at' => '2024-11-10 21:32:16',
            ),
            340 => 
            array (
                'id' => 2461,
                'presensi_id' => 153,
                'peserta_id' => 105,
                'sign' => '673142333af5e.png',
                'slug' => 'qEMgzB5GjQyYQbu0Qm4I',
                'created_at' => '2024-11-10 21:32:21',
                'updated_at' => '2024-11-10 23:30:59',
            ),
            341 => 
            array (
                'id' => 2462,
                'presensi_id' => 153,
                'peserta_id' => 212,
                'sign' => '6731401b998ad.png',
                'slug' => 'IS7seG8ZvJ2HcbBPXx5x',
                'created_at' => '2024-11-10 21:32:25',
                'updated_at' => '2024-11-10 23:22:03',
            ),
            342 => 
            array (
                'id' => 2463,
                'presensi_id' => 154,
                'peserta_id' => 5,
                'sign' => '6733f85535b53.png',
                'slug' => 'WzYN7uz1geoddkDTJJYJ',
                'created_at' => '2024-11-12 22:43:08',
                'updated_at' => '2024-11-13 00:52:37',
            ),
            343 => 
            array (
                'id' => 2464,
                'presensi_id' => 154,
                'peserta_id' => 9,
                'sign' => '6733f7033247b.png',
                'slug' => 'oCADgXNWp4S59ZzS7ryl',
                'created_at' => '2024-11-12 22:43:22',
                'updated_at' => '2024-11-13 00:46:59',
            ),
            344 => 
            array (
                'id' => 2465,
                'presensi_id' => 154,
                'peserta_id' => 10,
                'sign' => '6733fb7215b3c.png',
                'slug' => 'M95dn8kViWfTwZc7JODZ',
                'created_at' => '2024-11-12 22:43:35',
                'updated_at' => '2024-11-13 01:05:54',
            ),
            345 => 
            array (
                'id' => 2466,
                'presensi_id' => 154,
                'peserta_id' => 85,
                'sign' => '6733f967cac60.png',
                'slug' => 'XnUlqwOCWeYxgGi2aGUv',
                'created_at' => '2024-11-12 22:43:39',
                'updated_at' => '2024-11-13 00:57:11',
            ),
            346 => 
            array (
                'id' => 2467,
                'presensi_id' => 154,
                'peserta_id' => 52,
                'sign' => '6733fa382b28c.png',
                'slug' => 'IuxjEYnq2Ji5gvKrL95q',
                'created_at' => '2024-11-12 22:43:46',
                'updated_at' => '2024-11-13 01:00:40',
            ),
            347 => 
            array (
                'id' => 2468,
                'presensi_id' => 154,
                'peserta_id' => 12,
                'sign' => '6733f94e5bb38.png',
                'slug' => 'hRTE8bg0tj4LUiNIkL5c',
                'created_at' => '2024-11-12 22:43:51',
                'updated_at' => '2024-11-13 00:56:46',
            ),
            348 => 
            array (
                'id' => 2469,
                'presensi_id' => 154,
                'peserta_id' => 107,
                'sign' => '6733f7de75e59.png',
                'slug' => 'NaHYSIqpOYZyb6ILS5jh',
                'created_at' => '2024-11-12 22:43:54',
                'updated_at' => '2024-11-13 00:50:38',
            ),
            349 => 
            array (
                'id' => 2470,
                'presensi_id' => 154,
                'peserta_id' => 108,
                'sign' => '6733f7ea1da0c.png',
                'slug' => 'RROIpMqQCLDhrODPrYAW',
                'created_at' => '2024-11-12 22:43:59',
                'updated_at' => '2024-11-13 00:50:50',
            ),
            350 => 
            array (
                'id' => 2471,
                'presensi_id' => 154,
                'peserta_id' => 109,
                'sign' => '6733ff84b7fc4.png',
                'slug' => 'bZkBfp6cRr0khUL2XvoL',
                'created_at' => '2024-11-12 22:44:04',
                'updated_at' => '2024-11-13 01:23:16',
            ),
            351 => 
            array (
                'id' => 2472,
                'presensi_id' => 154,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'u9mcfzr7wxrnp30ZpB0L',
                'created_at' => '2024-11-12 22:44:09',
                'updated_at' => '2024-11-12 22:44:09',
            ),
            352 => 
            array (
                'id' => 2473,
                'presensi_id' => 154,
                'peserta_id' => 6,
                'sign' => '6733f7f216b0a.png',
                'slug' => '6aqqxHdYmtWWa75qrSN8',
                'created_at' => '2024-11-12 22:44:15',
                'updated_at' => '2024-11-13 00:50:58',
            ),
            353 => 
            array (
                'id' => 2474,
                'presensi_id' => 154,
                'peserta_id' => 98,
                'sign' => '67340293d79af.png',
                'slug' => '3gUSvbt8WsaAxLxNIGCO',
                'created_at' => '2024-11-12 22:44:21',
                'updated_at' => '2024-11-13 01:36:19',
            ),
            354 => 
            array (
                'id' => 2475,
                'presensi_id' => 154,
                'peserta_id' => 152,
                'sign' => '6733f88a7a9fc.png',
                'slug' => 'gt61ZbSoyEboaIKDdLqK',
                'created_at' => '2024-11-12 22:44:25',
                'updated_at' => '2024-11-13 00:53:30',
            ),
            355 => 
            array (
                'id' => 2476,
                'presensi_id' => 98,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => '8yq2WvIFvflWyZGEw7rC',
                'created_at' => '2024-12-19 04:02:49',
                'updated_at' => '2024-12-19 04:02:49',
            ),
            356 => 
            array (
                'id' => 2477,
                'presensi_id' => 155,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'HKGWgHKYmLMspGWiOIg1',
                'created_at' => '2024-12-19 05:56:18',
                'updated_at' => '2024-12-19 05:56:18',
            ),
            357 => 
            array (
                'id' => 2478,
                'presensi_id' => 156,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'zBPbLRYnsBrMNqjSz6Sv',
                'created_at' => '2024-12-19 05:57:01',
                'updated_at' => '2024-12-19 05:57:01',
            ),
            358 => 
            array (
                'id' => 2479,
                'presensi_id' => 155,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'CLPdXK40DdvdRgTO84la',
                'created_at' => '2024-12-19 05:57:15',
                'updated_at' => '2024-12-19 05:57:15',
            ),
            359 => 
            array (
                'id' => 2480,
                'presensi_id' => 155,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'julsaIB79fi0MnwSxERb',
                'created_at' => '2024-12-19 05:57:20',
                'updated_at' => '2024-12-19 05:57:20',
            ),
            360 => 
            array (
                'id' => 2481,
                'presensi_id' => 155,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => 'NsnbcC9S7I20vuqef11U',
                'created_at' => '2024-12-19 05:57:28',
                'updated_at' => '2024-12-19 05:57:28',
            ),
            361 => 
            array (
                'id' => 2482,
                'presensi_id' => 155,
                'peserta_id' => 85,
                'sign' => NULL,
                'slug' => 'QrwxJ6nDcZQmEAC1YsrN',
                'created_at' => '2024-12-19 05:57:33',
                'updated_at' => '2024-12-19 05:57:33',
            ),
            362 => 
            array (
                'id' => 2483,
                'presensi_id' => 155,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'f7P8HIxw1xBWKTZJoiSy',
                'created_at' => '2024-12-19 05:57:45',
                'updated_at' => '2024-12-19 05:57:45',
            ),
            363 => 
            array (
                'id' => 2484,
                'presensi_id' => 155,
                'peserta_id' => 107,
                'sign' => NULL,
                'slug' => 'TIAzbdeLzyjjmW8QBEEY',
                'created_at' => '2024-12-19 05:57:50',
                'updated_at' => '2024-12-19 05:57:50',
            ),
            364 => 
            array (
                'id' => 2485,
                'presensi_id' => 155,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => '62OqIdVaTEQmoNY32h4g',
                'created_at' => '2024-12-19 05:57:56',
                'updated_at' => '2024-12-19 05:57:56',
            ),
            365 => 
            array (
                'id' => 2486,
                'presensi_id' => 155,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'zBIhKulWEDVCfxCc51cn',
                'created_at' => '2024-12-19 05:58:00',
                'updated_at' => '2024-12-19 05:58:00',
            ),
            366 => 
            array (
                'id' => 2487,
                'presensi_id' => 155,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => '3eQdpJhjJdZ5xd6fUX02',
                'created_at' => '2024-12-19 05:58:08',
                'updated_at' => '2024-12-19 05:58:08',
            ),
            367 => 
            array (
                'id' => 2488,
                'presensi_id' => 155,
                'peserta_id' => 105,
                'sign' => NULL,
                'slug' => 'TuYwVBKq1Be5QLDPvtK5',
                'created_at' => '2024-12-19 05:58:18',
                'updated_at' => '2024-12-19 05:58:18',
            ),
            368 => 
            array (
                'id' => 2489,
                'presensi_id' => 155,
                'peserta_id' => 212,
                'sign' => NULL,
                'slug' => 'eXxMqzPuussOtRCBX40c',
                'created_at' => '2024-12-19 05:58:23',
                'updated_at' => '2024-12-19 05:58:23',
            ),
            369 => 
            array (
                'id' => 2490,
                'presensi_id' => 155,
                'peserta_id' => 18,
                'sign' => NULL,
                'slug' => 'jWWgyj4UswGStE2TCjyU',
                'created_at' => '2024-12-19 05:58:29',
                'updated_at' => '2024-12-19 05:58:29',
            ),
            370 => 
            array (
                'id' => 2491,
                'presensi_id' => 155,
                'peserta_id' => 19,
                'sign' => NULL,
                'slug' => '126zHAE722F0pdesV2op',
                'created_at' => '2024-12-19 05:58:33',
                'updated_at' => '2024-12-19 05:58:33',
            ),
            371 => 
            array (
                'id' => 2492,
                'presensi_id' => 156,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'FJuNQ6CgQHw85JS4wzfp',
                'created_at' => '2024-12-19 06:03:16',
                'updated_at' => '2024-12-19 06:03:16',
            ),
            372 => 
            array (
                'id' => 2493,
                'presensi_id' => 156,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'mR1WwMIfzkORLXoYDk9s',
                'created_at' => '2024-12-19 06:03:23',
                'updated_at' => '2024-12-19 06:03:23',
            ),
            373 => 
            array (
                'id' => 2494,
                'presensi_id' => 156,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'jNuBkQ4wLe1EsHAd2eY5',
                'created_at' => '2024-12-19 06:03:29',
                'updated_at' => '2024-12-19 06:03:29',
            ),
            374 => 
            array (
                'id' => 2495,
                'presensi_id' => 156,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => '7EnYvqGbXZezdyXpkc7r',
                'created_at' => '2024-12-19 06:03:34',
                'updated_at' => '2024-12-19 06:03:34',
            ),
            375 => 
            array (
                'id' => 2496,
                'presensi_id' => 156,
                'peserta_id' => 85,
                'sign' => NULL,
                'slug' => '14peog7uE6tFk1Cfws9C',
                'created_at' => '2024-12-19 06:03:40',
                'updated_at' => '2024-12-19 06:03:40',
            ),
            376 => 
            array (
                'id' => 2497,
                'presensi_id' => 156,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'TJ3YCelgsLo88RnKBKJm',
                'created_at' => '2024-12-19 06:03:48',
                'updated_at' => '2024-12-19 06:03:48',
            ),
            377 => 
            array (
                'id' => 2498,
                'presensi_id' => 156,
                'peserta_id' => 107,
                'sign' => NULL,
                'slug' => 'RU6GOahZ4TU95HOGv5ji',
                'created_at' => '2024-12-19 06:03:54',
                'updated_at' => '2024-12-19 06:03:54',
            ),
            378 => 
            array (
                'id' => 2499,
                'presensi_id' => 156,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => '9gcDtg3061vpICvgnBx1',
                'created_at' => '2024-12-19 06:03:58',
                'updated_at' => '2024-12-19 06:03:58',
            ),
            379 => 
            array (
                'id' => 2500,
                'presensi_id' => 156,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'TgLUhCbhPnY9Hpuskqfh',
                'created_at' => '2024-12-19 06:04:03',
                'updated_at' => '2024-12-19 06:04:03',
            ),
            380 => 
            array (
                'id' => 2501,
                'presensi_id' => 156,
                'peserta_id' => 111,
                'sign' => NULL,
                'slug' => 'R4gH81KgTX4a9uthDCZt',
                'created_at' => '2024-12-19 06:04:27',
                'updated_at' => '2024-12-19 06:04:27',
            ),
            381 => 
            array (
                'id' => 2502,
                'presensi_id' => 156,
                'peserta_id' => 99,
                'sign' => NULL,
                'slug' => 'DkNkWveLiSYOwVuOUvlc',
                'created_at' => '2024-12-19 06:04:34',
                'updated_at' => '2024-12-19 06:04:34',
            ),
            382 => 
            array (
                'id' => 2503,
                'presensi_id' => 157,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'YHqB65Zs1u5JMNSOoJsR',
                'created_at' => '2024-12-20 04:08:15',
                'updated_at' => '2024-12-20 04:08:15',
            ),
            383 => 
            array (
                'id' => 2504,
                'presensi_id' => 157,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'w2Sd7B4skVVM7vJXVgj4',
                'created_at' => '2024-12-20 04:08:32',
                'updated_at' => '2024-12-20 04:08:32',
            ),
            384 => 
            array (
                'id' => 2505,
                'presensi_id' => 157,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'IoAEp0YfedKNfpjK3BQe',
                'created_at' => '2024-12-20 04:08:36',
                'updated_at' => '2024-12-20 04:08:36',
            ),
            385 => 
            array (
                'id' => 2506,
                'presensi_id' => 157,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => 'JyunTtpIkwE5gUcZszW7',
                'created_at' => '2024-12-20 04:08:43',
                'updated_at' => '2024-12-20 04:08:43',
            ),
            386 => 
            array (
                'id' => 2507,
                'presensi_id' => 157,
                'peserta_id' => 85,
                'sign' => NULL,
                'slug' => 'nzOa2IvwbDSbIKc4sTJX',
                'created_at' => '2024-12-20 04:08:48',
                'updated_at' => '2024-12-20 04:08:48',
            ),
            387 => 
            array (
                'id' => 2508,
                'presensi_id' => 157,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'oqxFoIxL9FZpMVH4tjNY',
                'created_at' => '2024-12-20 04:08:52',
                'updated_at' => '2024-12-20 04:08:52',
            ),
            388 => 
            array (
                'id' => 2509,
                'presensi_id' => 157,
                'peserta_id' => 107,
                'sign' => NULL,
                'slug' => 'EQeRUVrgr2Ac4STmh1YH',
                'created_at' => '2024-12-20 04:08:56',
                'updated_at' => '2024-12-20 04:08:56',
            ),
            389 => 
            array (
                'id' => 2510,
                'presensi_id' => 157,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'ACfdG1w95NFh9iDOraZg',
                'created_at' => '2024-12-20 04:09:00',
                'updated_at' => '2024-12-20 04:09:00',
            ),
            390 => 
            array (
                'id' => 2511,
                'presensi_id' => 157,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'HdG3L687CSLhRqm6rqKg',
                'created_at' => '2024-12-20 04:09:27',
                'updated_at' => '2024-12-20 04:09:27',
            ),
            391 => 
            array (
                'id' => 2512,
                'presensi_id' => 157,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'X8AwGcDdU9d9yPvSgScc',
                'created_at' => '2024-12-20 04:09:41',
                'updated_at' => '2024-12-20 04:09:41',
            ),
            392 => 
            array (
                'id' => 2513,
                'presensi_id' => 157,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'bmhjfaP4sGF35EXGudya',
                'created_at' => '2024-12-20 04:09:45',
                'updated_at' => '2024-12-20 04:09:45',
            ),
            393 => 
            array (
                'id' => 2514,
                'presensi_id' => 157,
                'peserta_id' => 98,
                'sign' => NULL,
                'slug' => 'QVkIRsX5wKnheEcqLVog',
                'created_at' => '2024-12-20 04:09:49',
                'updated_at' => '2024-12-20 04:09:49',
            ),
            394 => 
            array (
                'id' => 2515,
                'presensi_id' => 157,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'uzW8EQ2HyPZm6MO8pLQX',
                'created_at' => '2024-12-20 04:09:55',
                'updated_at' => '2024-12-20 04:09:55',
            ),
            395 => 
            array (
                'id' => 2516,
                'presensi_id' => 158,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'wu0APgrAI4jzte00XRjG',
                'created_at' => '2025-02-18 07:14:22',
                'updated_at' => '2025-02-18 07:14:22',
            ),
            396 => 
            array (
                'id' => 2517,
                'presensi_id' => 158,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'F6C4dvCgsnATZvL2iVpx',
                'created_at' => '2025-02-18 07:15:09',
                'updated_at' => '2025-02-18 07:15:09',
            ),
            397 => 
            array (
                'id' => 2518,
                'presensi_id' => 158,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => 'MBzmObOaBwtcQplqPw56',
                'created_at' => '2025-02-18 07:15:17',
                'updated_at' => '2025-02-18 07:15:17',
            ),
            398 => 
            array (
                'id' => 2519,
                'presensi_id' => 158,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'lUgoLcVWB9q0BDdZVjuu',
                'created_at' => '2025-02-18 07:15:22',
                'updated_at' => '2025-02-18 07:15:22',
            ),
            399 => 
            array (
                'id' => 2520,
                'presensi_id' => 158,
                'peserta_id' => 85,
                'sign' => NULL,
                'slug' => 'mvmGLTjph1K5y0fe25Ho',
                'created_at' => '2025-02-18 07:15:27',
                'updated_at' => '2025-02-18 07:15:27',
            ),
            400 => 
            array (
                'id' => 2521,
                'presensi_id' => 158,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'wsJ0yuc0LS2ScyhExQ5F',
                'created_at' => '2025-02-18 07:15:35',
                'updated_at' => '2025-02-18 07:15:35',
            ),
            401 => 
            array (
                'id' => 2522,
                'presensi_id' => 158,
                'peserta_id' => 107,
                'sign' => NULL,
                'slug' => 'spowYiVSIBm3qef5viux',
                'created_at' => '2025-02-18 07:15:40',
                'updated_at' => '2025-02-18 07:15:40',
            ),
            402 => 
            array (
                'id' => 2523,
                'presensi_id' => 158,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'JI9vbLKgIUTDL57AHxJm',
                'created_at' => '2025-02-18 07:15:49',
                'updated_at' => '2025-02-18 07:15:49',
            ),
            403 => 
            array (
                'id' => 2524,
                'presensi_id' => 158,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'BfYCjFZndcx5DSU7ayqQ',
                'created_at' => '2025-02-18 07:15:56',
                'updated_at' => '2025-02-18 07:15:56',
            ),
            404 => 
            array (
                'id' => 2526,
                'presensi_id' => 158,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'AB9aTp90P5oBvuXCpNNa',
                'created_at' => '2025-02-18 07:16:07',
                'updated_at' => '2025-02-18 07:16:07',
            ),
            405 => 
            array (
                'id' => 2527,
                'presensi_id' => 158,
                'peserta_id' => 98,
                'sign' => NULL,
                'slug' => 'D6cmoUR4JRh53Hyz2TSw',
                'created_at' => '2025-02-18 07:16:52',
                'updated_at' => '2025-02-18 07:16:52',
            ),
            406 => 
            array (
                'id' => 2528,
                'presensi_id' => 158,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'IUYVu9CyTbsf4k2gbgnA',
                'created_at' => '2025-02-18 07:16:58',
                'updated_at' => '2025-02-18 07:16:58',
            ),
            407 => 
            array (
                'id' => 2529,
                'presensi_id' => 158,
                'peserta_id' => 141,
                'sign' => NULL,
                'slug' => 'DaF1eMpnJxx6g674P5v1',
                'created_at' => '2025-02-18 07:19:22',
                'updated_at' => '2025-02-18 07:19:22',
            ),
            408 => 
            array (
                'id' => 2530,
                'presensi_id' => 158,
                'peserta_id' => 143,
                'sign' => NULL,
                'slug' => 'OATEkIaPNdHchACIXaE1',
                'created_at' => '2025-02-18 07:21:33',
                'updated_at' => '2025-02-18 07:21:33',
            ),
            409 => 
            array (
                'id' => 2531,
                'presensi_id' => 158,
                'peserta_id' => 142,
                'sign' => NULL,
                'slug' => 'euGUsVJZ2M1Msfi9TIAH',
                'created_at' => '2025-02-18 07:21:38',
                'updated_at' => '2025-02-18 07:21:38',
            ),
            410 => 
            array (
                'id' => 2532,
                'presensi_id' => 158,
                'peserta_id' => 240,
                'sign' => NULL,
                'slug' => 'B4ryYqg8vPECa6sufCaz',
                'created_at' => '2025-02-18 07:29:44',
                'updated_at' => '2025-02-18 07:29:44',
            ),
            411 => 
            array (
                'id' => 2533,
                'presensi_id' => 159,
                'peserta_id' => 5,
                'sign' => NULL,
                'slug' => 'FtH9C2WCqgzYuwzVqgIF',
                'created_at' => '2025-02-20 05:26:16',
                'updated_at' => '2025-02-20 05:26:16',
            ),
            412 => 
            array (
                'id' => 2534,
                'presensi_id' => 159,
                'peserta_id' => 9,
                'sign' => NULL,
                'slug' => 'b3bn6B4abbPgbApmbWYi',
                'created_at' => '2025-02-20 05:26:25',
                'updated_at' => '2025-02-20 05:26:25',
            ),
            413 => 
            array (
                'id' => 2535,
                'presensi_id' => 159,
                'peserta_id' => 10,
                'sign' => NULL,
                'slug' => '467hj0qx3WCYQvGZOjmv',
                'created_at' => '2025-02-20 05:26:29',
                'updated_at' => '2025-02-20 05:26:29',
            ),
            414 => 
            array (
                'id' => 2536,
                'presensi_id' => 159,
                'peserta_id' => 52,
                'sign' => NULL,
                'slug' => 'xCTbHpLo7D1QamsxkoXR',
                'created_at' => '2025-02-20 05:26:34',
                'updated_at' => '2025-02-20 05:26:34',
            ),
            415 => 
            array (
                'id' => 2537,
                'presensi_id' => 159,
                'peserta_id' => 85,
                'sign' => NULL,
                'slug' => 'BNX952I3bnareUbkXCf0',
                'created_at' => '2025-02-20 05:26:39',
                'updated_at' => '2025-02-20 05:26:39',
            ),
            416 => 
            array (
                'id' => 2538,
                'presensi_id' => 159,
                'peserta_id' => 12,
                'sign' => NULL,
                'slug' => 'vD3CtedZHXu4xvY6zKXN',
                'created_at' => '2025-02-20 05:26:43',
                'updated_at' => '2025-02-20 05:26:43',
            ),
            417 => 
            array (
                'id' => 2539,
                'presensi_id' => 159,
                'peserta_id' => 107,
                'sign' => NULL,
                'slug' => 'afLBBIivpTX4WmoHfLaj',
                'created_at' => '2025-02-20 05:26:47',
                'updated_at' => '2025-02-20 05:26:47',
            ),
            418 => 
            array (
                'id' => 2540,
                'presensi_id' => 159,
                'peserta_id' => 109,
                'sign' => NULL,
                'slug' => 'iiF3fxYvLmzXdQ9EWeLo',
                'created_at' => '2025-02-20 05:27:33',
                'updated_at' => '2025-02-20 05:27:33',
            ),
            419 => 
            array (
                'id' => 2541,
                'presensi_id' => 159,
                'peserta_id' => 108,
                'sign' => NULL,
                'slug' => 'fL0eHLecr8ZV6Pqq9OW4',
                'created_at' => '2025-02-20 05:27:38',
                'updated_at' => '2025-02-20 05:27:38',
            ),
            420 => 
            array (
                'id' => 2542,
                'presensi_id' => 159,
                'peserta_id' => 21,
                'sign' => NULL,
                'slug' => 'Q0MkxpZuLfIqACn5yTNW',
                'created_at' => '2025-02-20 05:27:42',
                'updated_at' => '2025-02-20 05:27:42',
            ),
            421 => 
            array (
                'id' => 2544,
                'presensi_id' => 159,
                'peserta_id' => 99,
                'sign' => NULL,
                'slug' => 'TidT3msp2S1iVXGOhk5z',
                'created_at' => '2025-02-20 05:27:57',
                'updated_at' => '2025-02-20 05:27:57',
            ),
            422 => 
            array (
                'id' => 2545,
                'presensi_id' => 159,
                'peserta_id' => 111,
                'sign' => NULL,
                'slug' => 'I1jo3Z6oQStnNi1N3ZNz',
                'created_at' => '2025-02-20 05:28:04',
                'updated_at' => '2025-02-20 05:28:04',
            ),
            423 => 
            array (
                'id' => 2546,
                'presensi_id' => 159,
                'peserta_id' => 152,
                'sign' => NULL,
                'slug' => 'rKLwRD3co8pvc7Tmu9cj',
                'created_at' => '2025-02-20 05:28:10',
                'updated_at' => '2025-02-20 05:28:10',
            ),
            424 => 
            array (
                'id' => 2547,
                'presensi_id' => 159,
                'peserta_id' => 98,
                'sign' => NULL,
                'slug' => '5loBDnrXNSmGVvt50xTl',
                'created_at' => '2025-02-20 05:28:14',
                'updated_at' => '2025-02-20 05:28:14',
            ),
            425 => 
            array (
                'id' => 2548,
                'presensi_id' => 159,
                'peserta_id' => 105,
                'sign' => NULL,
                'slug' => 'FBIlHLnrnsNA4DmbMfDJ',
                'created_at' => '2025-02-20 05:28:20',
                'updated_at' => '2025-02-20 05:28:20',
            ),
            426 => 
            array (
                'id' => 2549,
                'presensi_id' => 159,
                'peserta_id' => 212,
                'sign' => NULL,
                'slug' => 'XBZyWxgQhPaGehc8Nswh',
                'created_at' => '2025-02-20 05:28:24',
                'updated_at' => '2025-02-20 05:28:24',
            ),
            427 => 
            array (
                'id' => 2550,
                'presensi_id' => 159,
                'peserta_id' => 81,
                'sign' => NULL,
                'slug' => 'oFPtteVWn16foEQ9CsJ5',
                'created_at' => '2025-02-20 05:28:29',
                'updated_at' => '2025-02-20 05:28:29',
            ),
            428 => 
            array (
                'id' => 2551,
                'presensi_id' => 159,
                'peserta_id' => 80,
                'sign' => NULL,
                'slug' => '2EK47uApIN48YCgIIS9L',
                'created_at' => '2025-02-20 05:28:34',
                'updated_at' => '2025-02-20 05:28:34',
            ),
            429 => 
            array (
                'id' => 2552,
                'presensi_id' => 159,
                'peserta_id' => 13,
                'sign' => NULL,
                'slug' => 'Ggsbq9gPC65wdrjwB40v',
                'created_at' => '2025-02-20 05:28:41',
                'updated_at' => '2025-02-20 05:28:41',
            ),
            430 => 
            array (
                'id' => 2553,
                'presensi_id' => 159,
                'peserta_id' => 75,
                'sign' => NULL,
                'slug' => 'rHre6bRHB42uAkYNeNcE',
                'created_at' => '2025-02-20 05:28:45',
                'updated_at' => '2025-02-20 05:28:45',
            ),
            431 => 
            array (
                'id' => 2554,
                'presensi_id' => 159,
                'peserta_id' => 150,
                'sign' => NULL,
                'slug' => 'LWdy0XKXApiBxc15Gr4I',
                'created_at' => '2025-02-20 05:28:52',
                'updated_at' => '2025-02-20 05:28:52',
            ),
            432 => 
            array (
                'id' => 2555,
                'presensi_id' => 159,
                'peserta_id' => 218,
                'sign' => NULL,
                'slug' => 'u3T89HMie3CMkZn6HkHE',
                'created_at' => '2025-02-20 05:29:03',
                'updated_at' => '2025-02-20 05:29:03',
            ),
            433 => 
            array (
                'id' => 2556,
                'presensi_id' => 159,
                'peserta_id' => 6,
                'sign' => NULL,
                'slug' => 'osLOb3WlNB1xUrG4hRaZ',
                'created_at' => '2025-02-20 05:54:08',
                'updated_at' => '2025-02-20 05:54:08',
            ),
        ));
        
        
    }
}