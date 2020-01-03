<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCADSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('caller_id');
            $table->string('location');
            $table->string('response_level');
            $table->string('inc_channel')->nullable();
            $table->longText('description');
            $table->timestamps();
        });

        Schema::table('cads', function (Blueprint $table) {
            $table->foreign('caller_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_a_d_s');
    }
}
