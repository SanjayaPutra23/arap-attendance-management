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
        if (! Schema::hasTable('attendance_photos')) {
            Schema::create('attendance_photos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('mobile_attendance_id')->constrained('mobile_attendances')->cascadeOnDelete();
                $table->string('type', 20);
                $table->string('disk', 50)->default('attendance_photos');
                $table->string('path', 255);
                $table->string('mime_type', 50);
                $table->unsignedInteger('file_size_bytes');
                $table->timestamp('captured_at');
                $table->char('sha256_hash', 64);
                $table->timestamps();

                $table->index(['mobile_attendance_id', 'type']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_photos');
    }
};
