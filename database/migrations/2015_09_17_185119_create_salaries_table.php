<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            //salary details
            $table->increments('id');
            $table->string('currency', 4);
            $table->integer('salary');
            $table->string('interval', 15);

            //link on foreign key
            $table->integer('candidate_id')->unsigned();
            
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
        Schema::drop('salaries');
    }
}
