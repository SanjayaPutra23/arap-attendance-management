<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'user')->first();
        User::whereNotIn('email',[
                "it@fk.ugj",
            "ktu@fk.ugj",
    ])->each(function($user) use ($role){
            $user->roles()->attach($role->id);
        });
        $rolit = Role::where('name', 'Ultraman')->first();
        $userit = User::where ('email', 'it@fk.ugj')->first();
        $userit->roles()->attach($rolit->id);

        $rolumum = Role::where('name', 'Umum')->first()->id;

        $usarumum = User::where ('email', 'ktu@fk.ugj')->first();
        $usarumum->roles()->attach($rolumum);
        $usarumu = User::where ('email', 'umum@fk.ugj')->first();
        $usarumu->roles()->attach($rolumum);
    }
}
