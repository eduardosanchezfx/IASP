<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\User;
use App\almacen;
use App\storage;
class envio extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $fillable = ['comentario','numero_guia','almacen_id','product_id','estado','cantidad_inicial','cantidad_final','user_id','almacen_id','storage_id'];

     public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function almacens()
    {
        return $this->belongsTo(almacen::class,'almacen_id');
    }
    public function storages()
    {
        return $this->belongsTo(storage::class,'storage_id');
    }


    
}
