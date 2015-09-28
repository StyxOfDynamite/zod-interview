<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertSalaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_salaries', function (Blueprint $table) {
            //salary details
            $table->increments('id');
            $table->string('currency', 4);
            $table->float('salary');
            $table->enum('interval', ['hour', 'week', 'month', 'year']);

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
        Schema::drop('alert_salaries');
    }
}
