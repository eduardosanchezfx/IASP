<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cantidad_final');//producto que se queda en el sistema 
            $table->string('issue');
            $table->bigInteger('user_id')->unsigned();//persona que recibe
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();//puede que no llego 
            $table->bigInteger('almacen_id')->unsigned();//almacen que recibe
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade')->nullable();//puede que no llego
            $table->bigInteger('storage_id')->unsigned();//productos que recibe
            $table->foreign('storage_id')->references('id')->on('storages')->onDelete('cascade');
            $table->bigInteger('envios_id')->unsigned();
            $table->foreign('envios_id')->references('id')->on('envios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas');
    }
}
