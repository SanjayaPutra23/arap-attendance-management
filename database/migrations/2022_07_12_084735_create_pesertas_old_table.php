<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasOldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pesertas_old')) {
            Schema::create('pesertas_old', function (Blueprint $table) {
                $table->id();
                $table->integer('uid')->nullable();
                $table->string('name');
                $table->string('nik')->nullable();
                $table->string('type')->nullable();
                $table->string('jabatan');
                $table->string('telp', 200)->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('pesertas_old');
    }
}
