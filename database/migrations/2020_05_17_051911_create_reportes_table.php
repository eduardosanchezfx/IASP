<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reporte');//numero de reporte
            $table->string('fecha');//fecha de reporte
            $table->string('entrada');//dinero de entrada
            $table->string('perdida');//dinero de perdida
            $table->string('ganancia');//dinero de ganancia
            $table->string('producto_entrada');//producto de inicial
            $table->string('producto_salida');//producto a corte
            $table->enum('estatus',['T','F']);//estatus
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('almacen_id')->unsigned();
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade');
            $table->bigInteger('storage_id')->unsigned();
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
        Schema::dropIfExists('reportes');
    }
}
