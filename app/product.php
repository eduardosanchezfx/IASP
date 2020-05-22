<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\almacen;
use App\storage;

use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class product extends Model
{
    use SoftDeletes; //Implementamos 
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    
    public function almacen()
    {
        return $this->belongsToMany(almacen::class,'almacen_product');
    }
    public function storages()
    {
        return $this->hasMany(storage::class);
    }
}
