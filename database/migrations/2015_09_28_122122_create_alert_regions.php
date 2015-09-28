<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_regions', function (Blueprint $table) {
            //region details
            $table->increments('id');
            $table->string('region');

            //link on foreign key
            $table->integer('alert_country_id')->unsigned();
            
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
        Schema::drop('alert_regions');
    }
}
