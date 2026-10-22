<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkapoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('akapools')) {
            Schema::create('akapools', function (Blueprint $table) {
                $table->id();
                $table->integer('uid');
                $table->integer('iduser');
                $table->integer('state');
                $table->date('date')->nullable();
                $table->time('time')->nullable();
                $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
                $table->integer('type');
                $table->smallInteger('year')->nullable();
                $table->unsignedTinyInteger('month')->nullable();
                $table->unsignedBigInteger('mesin_id');
                $table->timestamps();

                $table->index(['iduser', 'date', 'type'], 'pools_iduser_date_type_idx');
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
        Schema::dropIfExists('akapools');
    }
}
