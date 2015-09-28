<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table)
        {
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
        Schema::table('sectors', function (Blueprint $table)
        {
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
        Schema::table('countries', function (Blueprint $table)
        {
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
        Schema::table('regions', function (Blueprint $table)
        {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
        Schema::table('salaries', function (Blueprint $table)
        {
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
        Schema::table('sectors', function (Blueprint $table)
        {
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
