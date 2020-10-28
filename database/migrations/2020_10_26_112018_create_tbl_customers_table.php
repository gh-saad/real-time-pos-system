<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name');
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->string('email');
            $table->string('contact',20);
            $table->string('alt_contact');
            $table->string('address');
            $table->string('area');
            $table->tinyInteger('is_active');
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
        Schema::drop('tbl_customers');
    }
}
