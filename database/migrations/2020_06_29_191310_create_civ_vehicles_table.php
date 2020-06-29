<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCivVehiclesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('civ_vehicles', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('vrm');
      $table->string('make');
      $table->string('model');
      $table->string('insurer');
      $table->string('policy_number');
      $table->string('from');
      $table->string('to');
      $table->string('other_vehicles');
      $table->integer('civ_id');
      $table->string('permitted_drivers')->nullable();
      $table->string('use');
      $table->json('named_drivers')->nullable();
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
    Schema::dropIfExists('civ_vehicle');
  }
}
