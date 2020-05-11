<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use App\almacen;
use App\User;

class almacen_user extends Model
{
    //
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    public function almacens()
    {
        return $this->belongsToMany(almacen::class,'almacen_user');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'almacen_user');
    }
}
