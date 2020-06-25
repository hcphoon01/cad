<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('shoulder_number', 4)->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->timestamp('last_patrol')->nullable();
            $table->boolean('cc_commendation')->nullable()->default(false);
            $table->timestamps();
        });

        Schema::table('user_data', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
