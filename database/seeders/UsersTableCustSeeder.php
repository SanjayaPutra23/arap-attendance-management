<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableCustSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mas It',
                'email' => 'it@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$PJPZ7DtJtZTn9zA/5Ix3nu5cZrORrs17lJxKlg/vosdlfrpQC9JPW',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'admin.png',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'vxoj5JFU3LNqBoRvC6M6tpdK3lXNFwc9U7dul6AfbKnKAzot7lmsMW6gk93b',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2024-01-29 04:08:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kepala Tata Usaha',
                'email' => 'ktu@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iTDcM76r/ApRvX35mXUdj.G9UoUmozSv5wLtcZLJjZ8CID/6RwpAe',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'AykMR9SsWLqXAT8S7mAEfYli8wF6s83QyPfs8gZaXLJ2fP2mIdq1NTARvVzR',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Bagian UMUM',
                'email' => 'umum@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Wo7T0SdTlIGmF/ZMHbaEiudKdtGiG7j8mWPCEo0fTKhZqjs3MrXwq',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => '2Xo99stj6cbesWQJJgZmsTPmnLNTVkF0HSisCVLJYhwikvb7EFmLEDhvxPu4',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Medical Education Unit',
                'email' => 'meu@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$XgXKKVINTRO1PJIT5ZdpjOa7iMbJ2UHpcx4cnqxsaeBfJ24lH9Z8q',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'ITkjfaAKv4l7idhtzrDNHAtaBVssB78sPe3xig2xhxOzTaIi3aJGEjslKhjf',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Prodi Pendidikan Kedokteran',
                'email' => 'pspk@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$NY61nha9SduTDVu0Y2dld.FSWF4IMUWGZYz5CMr5vaZM4Tg01zY5G',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'hLN2Lmydbv',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Prodi Pendidikan Dokter',
                'email' => 'pspd@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$VgJ8NA7dlQS9/7x/VOrNBOZS5Z9e3Hf2whhe3jd6gDJ2Y6yQUt8pK',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'x7ggJOrlwh6BlCvGqsSp2NYnCLciXDfnyLGBNATWGCLbPX1OqS9beJu9Oubf',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Laboratorium Biomedis',
                'email' => 'biomedis@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QtbqAPPwZEQuKaL6lO1TSOGExU1t3wtbXr9t517I5bwJY1nWxppHm',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'mia0VgWWXQ',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Laboratorium Skills Lab',
                'email' => 'sl@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3AWFX79CG5NXApzuDbj1QeNra1CUThpYJJ/.SyjuTJHdb60POeHUa',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'rKHQ95nMCnxYljXQ1ZyJfFw7E7jVw8VIfC6MZAKaXgjFt6fyZ0qIVcalgAht',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Bagian Akademik',
                'email' => 'akademik@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$bWR6.o.nsZeet22ikJQYUeEp0U9GWiFhMcmPDGsngTQ2Je3XVnGWm',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'HTPICHIfBq',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-09-28 06:48:04',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'PKKPM',
                'email' => 'pkkpm@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3.9uAJaQZGpLp7fieEBQMutG2/KxhA7SlmQZlkc84SuoFrmpPLjqG',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => '3Jsv9EkbPA',
                'created_at' => '2022-09-28 06:48:04',
                'updated_at' => '2022-11-19 06:29:55',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Bagian Keuangan',
                'email' => 'keuangan@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$KA5x3v1sn17W4VBH58WuN.QaIpbxNwBx8LCTCSvwKkrP8EjIzlAUi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => '6roMFHviLp',
                'created_at' => '2022-09-28 06:48:05',
                'updated_at' => '2023-02-21 01:31:11',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'UPM',
                'email' => 'upm@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xtMHmN27XHR./oFKUK3a0uAwhrzWmMhaRqENN/zlZpnV0ohAOTxty',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'boss.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => 'OVhEejJZTnjaeNTffdo9pEiD8EsUYILQpWwDWCLQI5dcuFFEjwfrsn5SbkYW',
                'created_at' => '2022-09-28 06:48:05',
                'updated_at' => '2023-02-21 01:31:37',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'KEPK',
                'email' => 'kepk@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$VgJ8NA7dlQS9/7x/VOrNBOZS5Z9e3Hf2whhe3jd6gDJ2Y6yQUt8pK',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'devuser.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => NULL,
                'created_at' => '2022-11-25 06:22:12',
                'updated_at' => '2022-11-25 06:22:12',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Deprtemen IKM',
                'email' => 'ikm@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$wmlgkZrGGLeWDfq1.l/hyOKg5Ky.tX0axT6wKD6unXQNEj/K06ydu',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'devuser.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-11-24 04:15:25',
                'updated_at' => '2023-11-24 04:15:25',
            ),
            14 => 
            array (
                'id' => 17,
                'name' => 'Ronald',
                'email' => 'ronald@fk.ugj',
                'email_verified_at' => NULL,
                'password' => '$2y$10$j5B3EVOnfdabEoeUdpsqbuMTUusz2KVtNUn0bbbYJiYF6VKcfbHLC',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'avatar' => 'devuser.jpg',
                'telp' => NULL,
                'tchat' => NULL,
                'remember_token' => NULL,
                'created_at' => '2025-06-16 07:59:10',
                'updated_at' => '2025-06-16 07:59:10',
            ),
        ));
        
        
    }
}