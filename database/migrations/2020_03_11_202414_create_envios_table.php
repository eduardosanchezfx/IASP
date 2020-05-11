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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('numero_envio');
            $table->enum('tipo',['A','T','S']);//Almacen Tienda Sucursal
            $table->string('fecha_recibo')->nullable();
            $table->string('fecha_salida');
            $table->string('detalles');
            $table->string('comprobante')->nullable();
            $table->string('cantidad');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->bigInteger('euser_id')->unsigned();
            $table->foreign('euser_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('ruser_id')->unsigned()->nullable();
            $table->foreign('ruser_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('emisor_id')->unsigned();
            $table->foreign('emisor_id')->references('id')->on('almacens')->onDelete('cascade');  
            $table->bigInteger('receptor_id')->unsigned();
            $table->foreign('receptor_id')->references('id')->on('almacens')->onDelete('cascade'); 
            $table->bigInteger('productos_id')->unsigned();
            $table->foreign('productos_id')->references('id')->on('products')->onDelete('cascade');
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
