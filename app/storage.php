<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\product;
use App\envio;

class storage extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $fillable = ['stock','precio','almacen_id','product_id'];

    public function almacen()
    {
        return $this->belongsTo(almacen::class,'almacen_id');
    }
        public function products()
    {
        return $this->belongsTo(product::class,'product_id');
    }
        public function envios()
    {
        return $this->hasMany(envio::class);
    }
}
