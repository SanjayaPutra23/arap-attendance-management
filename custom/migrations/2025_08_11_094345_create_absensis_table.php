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
        Schema::create('absensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->dateTime('tgl_mulai')->nullable();
            $table->dateTime('tgl_selesai')->nullable();
            $table->smallInteger('thn')->nullable();
            $table->unsignedTinyInteger('bln')->nullable();
            $table->unsignedBigInteger('maker');
            $table->boolean('peg')->nullable()->default(true);
            $table->timestamps();

            $table->index(['type', 'thn', 'bln', 'peg'], 'absensis_type_thn_bln_peg_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
};
