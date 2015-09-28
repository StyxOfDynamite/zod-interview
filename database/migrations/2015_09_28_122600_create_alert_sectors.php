<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertSectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_sectors', function (Blueprint $table) {
            //sector details
            $table->increments('id');
            $table->string('sector', 20);

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
        Schema::drop('alert_sectors');
    }
}
