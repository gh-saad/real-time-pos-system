<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit_name');
            $table->string('unit_short_name');
            $table->tinyInteger('allow_decimal');
            $table->integer('base_unit_id');
            $table->integer('base_unit_mutiplier');
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
        Schema::drop('tbl_units');
    }
}
