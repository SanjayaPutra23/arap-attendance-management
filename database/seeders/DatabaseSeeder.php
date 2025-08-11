<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(PesertaSeeder::class);
        $this->call(PoolsTableSeeder::class);

        $this->call(AbsensisTableCustSeeder::class);
        $this->call(DetailAbsensTableCustSeeder::class);
        $this->call(FailedJobsTableCustSeeder::class);
        $this->call(KehadiransTableCustSeeder::class);
        $this->call(LibursTableCustSeeder::class);
        $this->call(MesinsTableCustSeeder::class);
        $this->call(MigrationsTableCustSeeder::class);
        $this->call(NotulensisTableCustSeeder::class);
        $this->call(OptionsTableCustSeeder::class);
        $this->call(PasswordResetsTableCustSeeder::class);
        $this->call(PesertasTableCustSeeder::class);
        $this->call(PesertasOldTableCustSeeder::class);
        $this->call(PodsTableCustSeeder::class);
        $this->call(PoolsTableCustSeeder::class);
        $this->call(PresensisTableCustSeeder::class);
        $this->call(RolesTableCustSeeder::class);
        $this->call(RoleUserTableCustSeeder::class);
        $this->call(SettingsTableCustSeeder::class);
        $this->call(UsersTableCustSeeder::class);
    }
}
