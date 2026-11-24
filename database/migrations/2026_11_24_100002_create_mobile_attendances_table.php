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
        if (! Schema::hasTable('mobile_attendances')) {
            Schema::create('mobile_attendances', function (Blueprint $table) {
                $table->id();
                $table->foreignId('peserta_id')->constrained('pesertas')->cascadeOnDelete();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->foreignId('attendance_location_id')->nullable()->constrained('attendance_locations')->nullOnDelete();
                $table->date('attendance_date');
                $table->timestamp('check_in_at')->nullable();
                $table->timestamp('check_out_at')->nullable();
                $table->decimal('check_in_lat', 10, 7)->nullable();
                $table->decimal('check_in_lng', 10, 7)->nullable();
                $table->decimal('check_in_distance_meters', 8, 2)->nullable();
                $table->decimal('check_in_accuracy_meters', 8, 2)->nullable();
                $table->decimal('check_out_lat', 10, 7)->nullable();
                $table->decimal('check_out_lng', 10, 7)->nullable();
                $table->decimal('check_out_distance_meters', 8, 2)->nullable();
                $table->decimal('check_out_accuracy_meters', 8, 2)->nullable();
                $table->string('status', 30)->default('hadir');
                $table->decimal('score', 3, 2)->default(0.00);
                $table->string('source', 20)->default('mobile');
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->unique(['peserta_id', 'attendance_date']);
                $table->index(['attendance_date', 'status']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_attendances');
    }
};
