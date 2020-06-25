<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('applicant_id');
            $table->string('dob');
            $table->string('age');
            $table->string('discord');
            $table->longText('join_reason');
            $table->longText('previous_community');
            $table->unsignedBigInteger('division_id');
            $table->timestamps();
        });

        Schema::table('application_forms', function (Blueprint $table) {
            $table->foreign('applicant_id')->references('id')->on('applicants');
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
        Schema::dropIfExists('application_forms');
    }
}
