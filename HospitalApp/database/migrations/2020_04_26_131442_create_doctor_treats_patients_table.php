<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTreatsPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_treats_patients', function (Blueprint $table) {
            $table->integer('t_id')->autoIncrement();
            $table->integer('d_id');
            $table->integer('p_id');
            $table->timestamps();
        });



        Schema::table('doctor_treats_patients', function (Blueprint $table) {

            $table->foreign('p_id')->
            references('p_id')->
            on('patients');

            $table->foreign('d_id')->
            references('d_id')->
            on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_treats_patients');
    }
}
