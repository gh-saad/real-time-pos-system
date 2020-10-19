<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->string('email')->unique();
            $table->string('contact_no',20);
            $table->date('date_of_birth');
            $table->string('current_address');
            $table->string('permanent_address2');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_user_infos');
    }
}
