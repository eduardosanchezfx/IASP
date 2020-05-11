<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\User;
use App\product;

class almacen extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $fillable = [
        'numero_almacen', 'nombre', 'estado','ubicacion','telefono','tipo','encargado_id','user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'almacen_user');
    }
    public function almacenInProducts()
    {
        return $this->belongsToMany(product::class,'almacen_product');
    }
}
