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
        if (! Schema::hasTable('pesertas')) {
            Schema::create('pesertas', function (Blueprint $table) {
                $table->id();
                $table->integer('uid')->nullable()->index();
                $table->string('name');
                $table->string('nik')->nullable();
                $table->string('type')->nullable();
                $table->string('jabatan');
                $table->boolean('is_active')->default(true);
                $table->string('telp', 200)->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('mesins')) {
            Schema::create('mesins', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('tipe');
                $table->string('ip')->nullable();
                $table->string('port')->nullable();
                $table->unsignedBigInteger('maker_id')->default(1);
                $table->timestamp('last_sync')->nullable();
                $table->integer('grup')->default(6);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('pools')) {
            Schema::create('pools', function (Blueprint $table) {
                $table->id();
                $table->integer('uid')->default(0);
                $table->integer('iduser')->index();
                $table->integer('state')->default(0);
                $table->date('date')->nullable();
                $table->time('time')->nullable();
                $table->timestamp('timestamp')->useCurrent();
                $table->integer('type')->default(0);
                $table->smallInteger('year')->nullable();
                $table->unsignedTinyInteger('month')->nullable();
                $table->unsignedBigInteger('mesin_id')->default(12);
                $table->timestamps();

                $table->index(['iduser', 'date', 'type']);
            });
        }

        if (! Schema::hasTable('absensis')) {
            Schema::create('absensis', function (Blueprint $table) {
                $table->id();
                $table->string('type');
                $table->dateTime('tgl_mulai')->nullable();
                $table->dateTime('tgl_selesai')->nullable();
                $table->smallInteger('thn')->nullable();
                $table->unsignedTinyInteger('bln')->nullable();
                $table->unsignedBigInteger('maker')->default(1);
                $table->tinyInteger('peg')->default(1);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('detail_absens')) {
            Schema::create('detail_absens', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_absen')->index();
                $table->unsignedBigInteger('id_peserta')->index();
                $table->string('data_peserta');
                $table->text('presensi');
                $table->timestamps();

                $table->index(['id_absen', 'id_peserta']);
            });
        }

        if (! Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('value');
                $table->integer('grup')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('liburs')) {
            Schema::create('liburs', function (Blueprint $table) {
                $table->id();
                $table->string('tanggal')->index();
                $table->string('ket');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('permohonan_izins')) {
            Schema::create('permohonan_izins', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                $table->foreignId('peserta_id')->nullable()->constrained('pesertas')->nullOnDelete();
                $table->string('jenis');
                $table->date('tgl_mulai');
                $table->date('tgl_selesai');
                $table->text('alasan');
                $table->string('surat_dokter')->nullable();
                $table->string('status')->default('menunggu');
                $table->text('catatan_admin')->nullable();
                $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamp('approved_at')->nullable();
                $table->timestamps();

                $table->index(['user_id', 'status']);
                $table->index(['tgl_mulai', 'tgl_selesai']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_izins');
        Schema::dropIfExists('liburs');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('detail_absens');
        Schema::dropIfExists('absensis');
        Schema::dropIfExists('pools');
        Schema::dropIfExists('mesins');
        Schema::dropIfExists('pesertas');
    }
};
