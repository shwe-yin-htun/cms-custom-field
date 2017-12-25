<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCflValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfl_value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cfl_group_id');
            $table->integer('post_id');
            $table->string('cf_value1');
            $table->string('cf_value2');
            $table->string('cf_value3');
            $table->string('cf_value4');
            $table->string('cf_value5');
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
        Schema::dropIfExists('cfl_value');
    }
}
