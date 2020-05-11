<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\almacen;
use App\product;

class almacen_product extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $fillable = ['StockAlmacen'];
    public function almacen()
    {
        return $this->belongsToMany(almacen::class,'almacen_product');
    }
    public function almacenInProducts()
    {
        return $this->belongsToMany(product::class,'almacen_product');
    }
}
