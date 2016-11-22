<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('patient_name')->length(255)->unique();
          $table->string('patient_gender')->length(10);
          $table->integer('patient_phone')->length(20);
          $table->string('patient_blood')->length(10)->nullable();
          $table->string('patient_address')->length(255)->nullable();
          $table->date('patient_birthday');
          $table->longText('patient_diseases')->nullable();
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
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }
}
