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
        Schema::create('pesertas_old', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid')->nullable();
            $table->string('name');
            $table->string('nik')->nullable();
            $table->string('type')->nullable();
            $table->string('jabatan');
            $table->timestamps();
            $table->string('telp', 200)->nullable();
        });
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
};
