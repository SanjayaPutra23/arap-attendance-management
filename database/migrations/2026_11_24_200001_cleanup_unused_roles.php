<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('roles')) {
            return;
        }

        // 1. Pastikan role aktif v2 tersedia: Ultraman, Officer, User
        $ultraman = Role::firstOrCreate(['name' => 'Ultraman']);
        $officer = Role::firstOrCreate(['name' => 'Officer']);
        $userRole = Role::firstOrCreate(['name' => 'User']);

        $unusedNames = ['Tamu', 'Umum', 'Akademik'];
        $unusedRoles = Role::whereIn('name', $unusedNames)->get();

        if ($unusedRoles->isNotEmpty()) {
            $unusedIds = $unusedRoles->pluck('id')->all();

            // 2. Re-assign user yang memiliki role 'Umum' ke 'Ultraman'
            $umumRole = $unusedRoles->firstWhere('name', 'Umum');
            if ($umumRole) {
                $umumUserIds = DB::table('role_user')
                    ->where('role_id', $umumRole->id)
                    ->pluck('user_id');

                foreach ($umumUserIds as $uid) {
                    $u = User::find($uid);
                    if ($u && ! $u->roles()->where('roles.id', $ultraman->id)->exists()) {
                        $u->roles()->attach($ultraman->id);
                    }
                }
            }

            // 3. Re-assign user yang hanya memiliki role 'Tamu' atau 'Akademik' ke 'User'
            $otherUnusedIds = $unusedRoles->whereIn('name', ['Tamu', 'Akademik'])->pluck('id')->all();
            if (! empty($otherUnusedIds)) {
                $affectedUserIds = DB::table('role_user')
                    ->whereIn('role_id', $otherUnusedIds)
                    ->pluck('user_id')
                    ->unique();

                foreach ($affectedUserIds as $uid) {
                    $u = User::find($uid);
                    if ($u) {
                        $remainingRolesCount = $u->roles()->whereNotIn('roles.id', $unusedIds)->count();
                        if ($remainingRolesCount === 0) {
                            $u->roles()->attach($userRole->id);
                        }
                    }
                }
            }

            // 4. Hapus relasi pivot role_user untuk role yang dinonaktifkan
            DB::table('role_user')->whereIn('role_id', $unusedIds)->delete();

            // 5. Hapus role tidak terpakai dari tabel roles
            Role::whereIn('id', $unusedIds)->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('roles')) {
            return;
        }

        foreach (['Tamu', 'Umum', 'Akademik'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }
    }
};
