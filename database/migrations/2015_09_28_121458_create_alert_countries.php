<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_countries', function (Blueprint $table) {
            //country details
            $table->increments('id');
            $table->string('country', 30);

            //link on foreign key
            $table->integer('alert_id')->unsigned();

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
        Schema::drop('alert_countries');
    }
}
