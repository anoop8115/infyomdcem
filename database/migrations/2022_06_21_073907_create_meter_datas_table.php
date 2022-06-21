<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterDatasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_datas', function (Blueprint $table) {
            $table->id('id');
            $table->integer('device_id');
            $table->integer('cf1');
            $table->integer('cf2');
            $table->integer('cf3');
            $table->integer('cf4');
            $table->integer('cf5');
            $table->integer('cf6');
            $table->integer('cf7');
            $table->integer('cf8');
            $table->integer('cf9');
            $table->integer('cf10');
            $table->integer('cf11');
            $table->integer('cf12');
            $table->integer('cf13');
            $table->integer('cf14');
            $table->integer('cf15');
            $table->integer('cf16');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meter_datas');
    }
}
