<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanIzinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('permohonan_izins')) {
            Schema::create('permohonan_izins', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('peserta_id')->nullable();
                $table->enum('jenis', ['izin', 'sakit']);
                $table->date('tgl_mulai');
                $table->date('tgl_selesai');
                $table->text('alasan');
                $table->string('surat_dokter')->nullable();
                $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
                $table->text('catatan_admin')->nullable();
                $table->unsignedBigInteger('approved_by')->nullable();
                $table->timestamp('approved_at')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('peserta_id')->references('id')->on('pesertas')->onDelete('set null');
                $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');

                $table->index(['user_id', 'status']);
                $table->index(['tgl_mulai', 'tgl_selesai']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_izins');
    }
}
