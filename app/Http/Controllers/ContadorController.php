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
    public $contadorTiendas;
    public $contadorAlmacenes;
    public $contadorEnvios;
    public $contadorUsuarios;
    public $contadorProductos;
    public $contadorAeropuertos;
 

    public function __construct(){
        if(auth()->user()->level=='S'){
        $this->contadorUsuarios=$contadorUsuarios=DB::table('users')->count();
        $this->contadorAlmacenes=$contadorAlmacenes=DB::table('almacens')->where('tipo','S')->count();
        $this->contadorEnvios=$contadorEnvios=DB::table('envios')->where('estado','Pendiente')->distinct('numero_guia')->count('numero_guia');
        $this->contadorProductos=$contadorProductos=DB::table('products')->count();
        $this->contadorTiendas=$contadorTiendas=DB::table('almacens')->where('tipo','T')->count();
        $this->contadorAeropuertos=$contadorAeropuertos=DB::table('almacens')->where('tipo','A')->count();
         return ['cu'=>$contadorUsuarios,'contadorAlmacenes'=>$contadorAlmacenes,'contadorEnvios'=>$contadorEnvios,'contadorProductos'=>$contadorProductos,'ct'=>$contadorTiendas,'ca'=>$contadorAeropuertos];}
        if(auth()->user()->level==='A'){
        $this->contadorUsuarios=$contadorUsuarios=DB::table('users')->count();
        $this->contadorAlmacenes=$contadorAlmacenes=DB::table('almacens')->where('tipo','S')->where('encargado_id',auth()->user()->id)->count();
        $this->contadorEnvios=$contadorEnvios=DB::table('envios')->where('estado','Pendiente')->distinct('numero_guia')->count('numero_guia');
        $this->contadorProductos=$contadorProductos=DB::table('products')->count();
        $this->contadorTiendas=$contadorTiendas=DB::table('almacens')->where('tipo','T')->where('encargado_id',auth()->user()->id)->count();
        $this->contadorAeropuertos=$contadorAeropuertos=DB::table('almacens')->where('tipo','A')->where('encargado_id',auth()->user()->id)->count();
         return ['cu'=>$contadorUsuarios,'contadorAlmacenes'=>$contadorAlmacenes,'contadorEnvios'=>$contadorEnvios,'contadorProductos'=>$contadorProductos,'ct'=>$contadorTiendas,'ca'=>$contadorAeropuertos];}
        if(auth()->user()->level=='M'){
        $this->contadorUsuarios=$contadorUsuarios=DB::table('users')->count();
        $consulta= User::find(auth()->user()->id);
        $almacen=$consulta->almacens()->pluck('almacens.id');
        $this->contadorEnvios=$contadorEnvios=DB::table('envios')->where('estado','Pendiente')->distinct('numero_guia')->count('numero_guia');
        $this->contadorProductos=$contadorProductos=DB::table('products')->count();
        for($i=0;$i<count($almacen);$i++){
        $this->contadorTiendas=$contadorTiendas=DB::table('almacens')->where('tipo','T')->whereIn('almacens.id',$almacen)->count();
        $this->contadorAlmacenes=$contadorAlmacenes=DB::table('almacens')->where('tipo','S')->whereIn('almacens.id',$almacen)->count();
        $this->contadorAeropuertos=$contadorAeropuertos=DB::table('almacens')->where('tipo','A')->whereIn('almacens.id',$almacen)->count();
        return ['cu'=>$contadorUsuarios,'contadorAlmacenes'=>$contadorAlmacenes,'contadorEnvios'=>$contadorEnvios,'contadorProductos'=>$contadorProductos,'ct'=>$contadorTiendas,'ca'=>$contadorAeropuertos];
        }        
        }
        }
    }


