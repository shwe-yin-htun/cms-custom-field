<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCflGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfl_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name');
            $table->string('cf_name1');
            $table->integer('cf_type1');
            $table->string('cf_name2');
            $table->integer('cf_type2');
            $table->string('cf_name3');
            $table->integer('cf_type3');
            $table->string('cf_name4');
            $table->integer('cf_type4');
            $table->string('cf_name5');
            $table->integer('cf_type5');
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
        Schema::dropIfExists('cfl_group');
    }
}
