<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('callsign_id');
            $table->integer('state');
            $table->unsignedBigInteger('assigned_cad');
            $table->timestamps();
        });

        Schema::table('units', function (Blueprint $table) {
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('callsign_id')->references('id')->on('callsigns')->onDelete('cascade');
            $table->foreign('assigned_cad')->references('id')->on('cads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
