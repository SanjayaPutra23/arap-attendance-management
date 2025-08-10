<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->integer('iduser');
            $table->integer('state');
            $table->string('date');
            $table->string('time');
            $table->timestamp('timestamp');
            $table->integer('type');
            $table->string('year');
            $table->string('month');
            $table->foreignId('mesin_id');
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
        Schema::dropIfExists('pools');
    }
}
