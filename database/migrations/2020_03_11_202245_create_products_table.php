<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('Nombre');
            $table->String('Descripcion');
            $table->float('Precio');
            $table->float('StockTotal');
            $table->float('StockInicial');
            $table->enum('unidad',['M','CM','KM','PZ','TN','M2','M3']);
            $table->enum('tipo_moneda',['EUR','DUS','YEN','NMX','DCA','LIE','YUA']);//Euro, Dolar US, Yen, Peso Mexicano,Dolar Canada, Libra Esterlina,Yuan
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
