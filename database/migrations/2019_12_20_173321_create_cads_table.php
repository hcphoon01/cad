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
            $table->string('caller_name');
            $table->string('location');
            $table->string('response_level');
            $table->string('display_name');
            $table->string('inc_channel')->nullable();
            $table->longText('description');
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
        Schema::dropIfExists('cads');
    }
}
