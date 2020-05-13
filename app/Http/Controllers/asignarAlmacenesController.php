<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContadorController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\almacen;
use Illuminate\Database\Migrations;

class asignarAlmacenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
            $this->middleware('auth');
            $this->middleware('SuperMiddleware');


     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($almacen)
    {
                
     $contador= new ContadorController;     
     $almacens=DB::table('almacens')
                    ->where('almacens.id',$almacen)
                    ->join('users','users.id','almacens.encargado_id')
                    ->select('almacens.id as almacenid','almacens.Nombre as nombre','users.name as username','users.*')
                    ->get();
    $almacencount=DB::table('almacen_user')
                    ->where('almacen_id',$almacen)
                    ->join('users','users.id','almacen_user.user_id')
                    ->count('almacen_user.user_id');  
          
      
      $almacenasignacion= DB::table('almacen_user')
                        ->where('almacen_id',$almacen)
                       //->join('almacens','almacens.id','almacen_user.almacen_id')
                       ->join('users','users.id','almacen_user.user_id')
                        ->select('users.name as uname','users.id as uid')
                        ->get();
      
      $demo= almacen::find($almacen); //metodo que consulta a la tabla pivote n->n mediante la variable 
     $userid=$demo->users()->pluck('users.id as uid'); //ubica la funcion usuarios del modelo almacen para seleccionar usuarios con id y nombre
    // $ask=$demo->users()->pluck('users.name as uname','users.id as uid');
   // dd((array)$userid);
     
     if($almacencount==null){   //cuenta cuantos usuarios hay en la tabla pivote
         $m=DB::table('users')  //consulta la tabla usuarios en el nivel 'M'
              ->where('level','M')
              ->get();
     }
     else{  
    for($i=0;$i<count($userid);$i++){   //hace un barrido de todos los usuarios de la tabla pivote
        $m=DB::table('users')       
              ->where('level','M')      //consulta la tabla usuarios en el nivel 'M'
              ->whereNotIn('id',$userid)    //quita los usuarios que ya se registraron 
              ->get();
    }   
     }
      return view('asignaciones.create',['contador'=>$contador,'almacens'=>$almacens,'almacenasignacion'=>$almacenasignacion,'almacencount'=>$almacencount,'m'=>$m]);
                        
                
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacenes= almacen::find($request->number_id); //inserta el id del almacen en la tabla pivote
        $almacenes->users()->sync($request->empleados); //inserta los usuarios que registraron no repetidos
        return back()->with('success','Asignacion Correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
