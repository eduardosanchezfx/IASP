<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('numero_guia');
            $table->string('comentario');
            $table->enum('estado',['F','S','W']);//Status [F] Fallido; [S] Completado; [W] Algun error
            $table->string('cantidad_inicial');//cantidad que envia
            $table->string('cantidad_final');//cantidad que retorna 
            $table->bigInteger('user_id')->unsigned();//persona que envia
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('almacen_id')->unsigned();//almacen que envia
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade');
            $table->bigInteger('storage_id')->unsigned();//productos que sale
            $table->foreign('storage_id')->references('id')->on('storages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envios');
    }
}
