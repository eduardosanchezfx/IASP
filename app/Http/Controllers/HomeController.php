<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\ContadorController;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contador= new ContadorController;
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $date = $date->format('l jS \\of F Y');
        $envios= \App\envio::where('estado','Pendiente')->distinct('numero_guia')->count('numero_guia');//obtener toda la informacion de los envio
        $enviosFail= \App\envio::where('estado','=','Fallido')->distinct('numero_guia')->count('numero_guia');//obtener toda la informacion de los envio
        $enviosSuccess= \App\envio::where('estado','=','Completado')->distinct('numero_guia')->count('numero_guia');//obtener toda la informacion de los envio
        $envioslist= \App\envio::with('storages.products','users','storages.almacen','almacens')->where('estado','=','Pendiente')->distinct('numero_guia')->latest()->take(10)->get();//obtener toda la informacion de los envio
      /*  foreach($envioslist as $id=>$item){
        dd($item->numero_guia);
    }*/
        return view('home',['contador'=>$contador,'date'=>$date,'envios'=>$envios,'enviosFail'=>$enviosFail,'enviosSuccess'=>$enviosSuccess,'envioslist'=>$envioslist])->with('info','Se añadiran nuevas caracteristicas');
    }
}
