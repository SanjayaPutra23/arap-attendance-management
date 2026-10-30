<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddOfficerWorkingHoursSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = now();
        $officerSettings = [
            [
                'name' => 'jam_datang_officer',
                'value' => '08:00:00',
                'grup' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'jam_pulang_officer',
                'value' => '17:00:00',
                'grup' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($officerSettings as $setting) {
            $exists = DB::table('settings')->where('name', $setting['name'])->exists();
            if (!$exists) {
                DB::table('settings')->insert($setting);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('settings')->whereIn('name', ['jam_datang_officer', 'jam_pulang_officer'])->delete();
    }
}
