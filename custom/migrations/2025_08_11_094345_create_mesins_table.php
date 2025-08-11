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
        Schema::create('mesins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tipe');
            $table->string('ip')->nullable();
            $table->string('port')->nullable();
            $table->unsignedBigInteger('maker_id');
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();
            $table->integer('grup');

            $table->primary(['id', 'grup']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesins');
    }
};
