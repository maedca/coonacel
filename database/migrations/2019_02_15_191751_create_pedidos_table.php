<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conferencista');
            $table->string('conferencista_id');
            $table->string('relacionista');
            $table->string('empresa');
            $table->string('conferencia');

            $table->string('name');
            $table->bigInteger('nro_libranza');
            $table->string('cc');
            $table->longText('address');
            $table->longText('empresa_address');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('phone');
            $table->string('phone_f');
            $table->string('cellphone');
            $table->string('email');
            $table->string('birthday');
            $table->boolean('entrega');
            $table->string('charge');
            $table->string('receiver_name');
            $table->string('referal_name1')->nullable();
            $table->string('referal_name2')->nullable();
            $table->string('referal_ofi_phone1')->nullable();
            $table->string('referal_res_phone1')->nullable();
            $table->string('referal_ofi_phone2')->nullable();
            $table->string('referal_res_phone2')->nullable();
            $table->string('referal_ptco1')->nullable();
            $table->string('referal_ptco2')->nullable();
            $table->string('collection_1')->nullable();
            $table->string('collection_2')->nullable();
            $table->string('collection_3')->nullable();
            $table->string('collection_4')->nullable();
            $table->string('collection_5')->nullable();
            $table->string('collection_6')->nullable();
            $table->integer('price_1')->nullable();
            $table->integer('price_2')->nullable();
            $table->integer('price_3')->nullable();
            $table->integer('price_4')->nullable();
            $table->integer('price_5')->nullable();
            $table->integer('price_6')->nullable();
            $table->integer('total')->nullable();
            $table->integer('cuotas')->nullable();
            $table->integer('vr_cuotas')->nullable();
            $table->integer('plazo')->nullable();
            $table->string('file');
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
        Schema::dropIfExists('pedidos');
    }
}
