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
          $table->string('patient_gender')->nullable();
          $table->integer('patient_phone')->nullable();
          $table->string('patient_blood')->nullable();
          $table->string('patient_address')->nullable();
          $table->date('patient_birthday')->nullable();
          $table->longText('patient_diseases')->nullable();

          $table->integer('categorie_id')->unsigned();
          $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

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
