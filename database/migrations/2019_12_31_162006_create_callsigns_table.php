<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callsigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('callsign');
            $table->string('name');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->timestamps();
        });

        Schema::table('callsigns', function (Blueprint $table) {
            $table->foreign('division_id')->references('id')->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('callsigns');
    }
}
