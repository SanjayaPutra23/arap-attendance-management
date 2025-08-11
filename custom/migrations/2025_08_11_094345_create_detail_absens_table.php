<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_absens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_absen');
            $table->unsignedBigInteger('id_peserta');
            $table->string('data_peserta');
            $table->text('presensi');
            $table->timestamps();

            $table->index(['id_absen', 'id_peserta'], 'detail_absens_absen_peserta_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_absens');
    }
};
