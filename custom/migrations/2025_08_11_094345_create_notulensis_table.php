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
        Schema::create('notulensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('presensi_id');
            $table->unsignedBigInteger('maker_id');
            $table->text('slug');
            $table->text('kesimpulan')->nullable();
            $table->text('tindaklanjut')->nullable();
            $table->unsignedBigInteger('notulis_id')->nullable();
            $table->unsignedBigInteger('pimpinan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notulensis');
    }
};
