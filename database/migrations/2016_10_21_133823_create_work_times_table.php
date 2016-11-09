<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_times', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');

            $table->integer('shift_id')->unsigned();
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade');

            $table->integer('divisions_times_start_id')->unsigned();
            $table->foreign('divisions_times_start_id')->references('id')->on('divisions_times')->onDelete('cascade');

            $table->integer('divisions_times_end_id')->unsigned();
            $table->foreign('divisions_times_end_id')->references('id')->on('divisions_times')->onDelete('cascade');

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
        Schema::dropIfExists('work_times');
    }
}
