<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('forename', 20);
            $table->string('surname', 20);
            $table->string('email', 50);
            $table->char('password', 60);
            $table->string('contact_number', 11);
            $table->boolean('right_to_work');
            $table->string('country', 30);
            $table->boolean('alerts');
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
        Schema::drop('users');
    }
}
