<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\User;
use App\product;
use App\storage;
use App\envio;

class almacen extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $fillable = [
        'numero_almacen', 'nombre', 'estado','ubicacion','telefono','tipo','encargado_id','user_id'
    ];

    public function users()//usuarios asignados a un almacen
    {
        return $this->belongsToMany(User::class,'almacen_user');
    }
    public function storages()//->conecta a storages que a su vez conecta a products & envios
    {
        return $this->hasMany(storage::class);
    }
    public function envios()//destino de envio
    {
        return $this->hasMany(envio::class);
    }
        
    
}
