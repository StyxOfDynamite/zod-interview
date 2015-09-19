<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            //candidates details
            $table->increments('id');
            $table->string('forename', 20);
            $table->string('surname', 20);
            $table->string('email', 50);
            $table->char('password', 60);
            $table->string('contact_number', 20);
            $table->boolean('right_to_work');
            $table->boolean('alerts');
            //timestamps
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
        Schema::drop('candidates');
    }
}
