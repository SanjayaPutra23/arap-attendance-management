<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotulensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presensi_id');
            $table->foreignId('maker_id');
            $table->text('slug');
            $table->text('kesimpulan')->nullable();
            $table->text('tindaklanjut')->nullable();
            $table->foreignId('notulis_id')->nullable();
            $table->foreignId('pimpinan_id');
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
}
