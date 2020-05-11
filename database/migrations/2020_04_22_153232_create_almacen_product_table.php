<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_product', function (Blueprint $table) {
            $table->id();
            $table->float('StockAlmacen');  
            $table->timestamps();
            $table->softDeletes();
             $table->biginteger('almacen_id')->unsigned();
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacen_product');
    }
}
