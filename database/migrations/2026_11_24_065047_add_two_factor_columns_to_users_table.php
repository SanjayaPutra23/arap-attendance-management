<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $hasSecret = Schema::hasColumn('users', 'two_factor_secret');
        $hasRecovery = Schema::hasColumn('users', 'two_factor_recovery_codes');
        $hasConfirmed = Schema::hasColumn('users', 'two_factor_confirmed_at');

        if (! $hasSecret || ! $hasRecovery || ! $hasConfirmed) {
            Schema::table('users', function (Blueprint $table) use ($hasSecret, $hasRecovery, $hasConfirmed) {
                if (! $hasSecret) {
                    $table->text('two_factor_secret')
                        ->after('password')
                        ->nullable();
                }

                if (! $hasRecovery) {
                    $table->text('two_factor_recovery_codes')
                        ->after('two_factor_secret')
                        ->nullable();
                }

                if (! $hasConfirmed) {
                    $table->timestamp('two_factor_confirmed_at')
                        ->after('two_factor_recovery_codes')
                        ->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = array_filter(
                ['two_factor_confirmed_at', 'two_factor_recovery_codes', 'two_factor_secret'],
                fn ($col) => Schema::hasColumn('users', $col)
            );

            if (! empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
