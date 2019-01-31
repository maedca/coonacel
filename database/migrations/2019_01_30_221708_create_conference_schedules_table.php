<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_schedules', function (Blueprint $table) {
            $table->increments('id');
//            $table->unsignedInteger('industry_id');
//            $table->foreign('industry_id')->references('id')->on('industries');
            $table->unsignedInteger('conferencia_id');
            $table->foreign('conferencia_id')->references('id')->on('conferencias');
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
//            $table->unsignedInteger('relacionista_id');
//            $table->foreign('relacionista_id')->references('id')->on('relacionistas');
            $table->date('course_date');
            $table->integer('morning_assistant')->nullable();
            $table->integer('afternoon_assistant')->nullable();
            $table->integer('night_assistant')->nullable();



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
        Schema::dropIfExists('conference_schedules');
    }
}
