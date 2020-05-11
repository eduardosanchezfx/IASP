<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContadorController;
use Illuminate\Support\Facades\DB;
use App\almacen;
use App\User;
use Carbon\Carbon;


class AlmacenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
            $this->middleware('auth');
            $this->middleware('SuperMiddleware')->except('index');

     }

    public function index()
    {
        $contador= new ContadorController;
        $almacenes=DB::table('almacens')
                ->where('tipo','S')
                ->join('users','users.id','almacens.encargado_id')
                ->select('almacens.*','users.name as username')
                ->get();
                
                  
        return view('almacenes.read',['almacenes'=>$almacenes,'contador'=>$contador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contador= new ContadorController;
        $usuarios=DB::table('users')
                    ->where('level','=','A')
                    ->get();
        $usuariosm=DB::table('users')
                    ->where('level','!=','M')
                    ->get();
        $date = carbon::now()->format('Y_d_m_h_i');
        return view('almacenes.create',['contador'=>$contador,'date'=>$date,'usuarios'=>$usuarios,'usuariosm'=>$usuariosm]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $almacenes= new almacen();
                $almacenes->tipo='S';
                $almacenes->numero_almacen=$request->number_id;
                $almacenes->nombre=$request->name;
                $almacenes->estado=$request->estado;
                $almacenes->pais=$request->pais;
                $almacenes->direccion=$request->direccion;
                $almacenes->telefono=$request->telefono;
                $almacenes->codigo_postal=$request->cp;
                $almacenes->encargado_id=$request->usuario_admin;
                $almacenes->save();

        return redirect('Lista_Almacen')->with('success','Almacen Creado correctamente');
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
    public function edit($almacen)
    {
        $contador= new ContadorController;
        $check=DB::table('almacens')
        ->where('id','=',$almacen)
        ->get();
        foreach($check as $ch){
            if($ch->deleted_at!=null){
                $almacenes = almacen::withTrashed()->where('id', '=', $almacen)->first();
                //Restauramos el registro
                $almacenes->restore();
                $almacenes='';
                return back()->with('success','Se ha recuperado correctamente');
            }
            else{
                $a= DB::table('almacens')
                ->where('id','=',$almacen)
                ->get();
            return view('editarusuario',['almacen'=>$almacen,'a'=>$a,'contador'=>$contador]); 
            }

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $a)
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
        $check=DB::table('almacens')
        ->where('id','=',$id)
        ->get();
        foreach($check as $ch){
        if($ch->deleted_at!=null){
            almacen::where('id',$id)->forceDelete();
            return redirect('Lista_Almacen')->with('success','Se ha eliminado permanentemente');
        }
        else{
        almacen::destroy($id);
        return redirect('Lista_Almacen')->with('success','Se ha eliminado correctamente');
        }
        }
    }
    
}
