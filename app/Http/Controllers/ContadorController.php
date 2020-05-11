<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class ContadorController extends Controller
{
    public $contadorAlmacenes;
    public $contadorEnvios;
    public $contadorUsuarios;
    public $contadorProductos;

    public function __construct()
    {
        if(auth()->user()->level=='S'){
        $this->contadorUsuarios=$contadorUsuarios=DB::table('users')->count();
        $this->contadorAlmacenes=$contadorAlmacenes=DB::table('almacens')->count();
        $this->contadorEnvios=$contadorEnvios=DB::table('envios')->count();
        $this->contadorProductos=$contadorProductos=DB::table('products')->count();
         return ['cu'=>$contadorUsuarios,'contadorAlmacenes'=>$contadorAlmacenes,'contadorEnvios'=>$contadorEnvios,'contadorProductos'=>$contadorProductos];
        }
        if(auth()->user()->level==='A'){
        $this->contadorUsuarios=$contadorUsuarios=DB::table('users')->count();
        $this->contadorAlmacenes=$contadorAlmacenes=DB::table('almacens')->where('encargado_id',auth()->user()->id)->count();
        $this->contadorEnvios=$contadorEnvios=DB::table('envios')->count();
        $this->contadorProductos=$contadorProductos=DB::table('products')->count();
         return ['cu'=>$contadorUsuarios,'contadorAlmacenes'=>$contadorAlmacenes,'contadorEnvios'=>$contadorEnvios,'contadorProductos'=>$contadorProductos];
        }
        if(auth()->user()->level=='M'){
            $this->contadorUsuarios=$contadorUsuarios=DB::table('users')->count();
        $this->contadorAlmacenes=$contadorAlmacenes=DB::table('almacen_user')->where('user_id',auth()->user()->id)->count();
        $this->contadorEnvios=$contadorEnvios=DB::table('envios')->count();
        $this->contadorProductos=$contadorProductos=DB::table('products')->count();
        return ['cu'=>$contadorUsuarios,'contadorAlmacenes'=>$contadorAlmacenes,'contadorEnvios'=>$contadorEnvios,'contadorProductos'=>$contadorProductos];
        }
         
        }

    public function contadores(){
     
     }
     
    
    
    }


