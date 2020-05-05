<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->integer('r_id')->autoIncrement();
            $table->integer('p_id');
            $table->integer('d_id');
            $table->longText('notes');
            $table->longText('drugs');
            $table->timestamps();
        });

        Schema::table('medical_records', function (Blueprint $table) {
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
        Schema::dropIfExists('medical_records');
    }
}
