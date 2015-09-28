<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToAlerts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alert_sectors', function (Blueprint $table)
        {
            $table->foreign('alert_id')->references('id')->on('alerts')->onDelete('cascade');
        });
        Schema::table('alert_countries', function (Blueprint $table)
        {
            $table->foreign('alert_id')->references('id')->on('alerts')->onDelete('cascade');
        });
        Schema::table('alert_regions', function (Blueprint $table)
        {
            $table->foreign('alert_id')->references('id')->on('alerts')->onDelete('cascade');
        });
        Schema::table('alert_salaries', function (Blueprint $table)
        {
            $table->foreign('alert_id')->references('id')->on('alerts')->onDelete('cascade');
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