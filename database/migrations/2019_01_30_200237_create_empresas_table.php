<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('relacionista_id')->nullable();
            $table->foreign('relacionista_id')->references('id')->on('users');
            $table->unsignedInteger('industry_id')->nullable();
            $table->foreign('industry_id')->references('id')->on('industries');
            $table->string('name');
            $table->bigInteger('nit');
            $table->string('url')->nullable();
            $table->integer('empleados');
            $table->bigInteger('tel_ofi');
            $table->bigInteger('cel');
            $table->string('contacto_1');
            $table->string('cargo_1');
            $table->bigInteger('tel_1');
            $table->string('contacto_2')->nullable();
            $table->string('cargo_2')->nullable();
            $table->bigInteger('tel_2')->nullable();
            $table->longText('descripcion');
            $table->string('email');
            $table->string('calle');
            $table->string('ciudad');
            $table->string('municipio');
            $table->string('barrio');
            $table->string('pais');
            $table->softDeletes();




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
        Schema::dropIfExists('empresas');
    }
}
