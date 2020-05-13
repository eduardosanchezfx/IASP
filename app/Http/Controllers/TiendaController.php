<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContadorController;
use Illuminate\Support\Facades\DB;
use App\almacen;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\almacen_user;

class TiendaController extends Controller
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
        $auth=Auth::user()->level; //encuentra su tipo de usuario autenticad
        $userid=Auth::user()->id;//encuentra id usuario autenticado
        if($auth=='S'){
        $almacenes=DB::table('almacens')
                ->where('tipo','T')
                ->join('users','users.id','almacens.encargado_id')
                ->select('almacens.*','users.name as username')
         ->get();
        return view('tiendas.read',['almacenes'=>$almacenes,'contador'=>$contador]);
         }
         if($auth=='A'){
             $almacenes=DB::table('almacens')
                ->where('tipo','T')
                ->where('encargado_id',$userid)
                ->join('users','users.id','almacens.encargado_id')
                ->select('almacens.*','users.name as username')
                ->get();
             return view('tiendas.read',['almacenes'=>$almacenes,'contador'=>$contador]);
         }
         if($auth=='M'){
             $consulta= User::find($userid);
                   $almacen=$consulta->almacens()->pluck('almacens.id');
             for($i=0;$i<count($almacen);$i++){
              $almacenes=DB::table('almacens')
                ->whereIn('almacens.id',$almacen)
                ->where('tipo','T')
                ->join('users','users.id','almacens.encargado_id')
                ->select('almacens.*','users.name as username')
                ->get();
              
             }
            return view('tiendas.read',['almacenes'=>$almacenes,'contador'=>$contador]);   
         }
                     
        
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
        return view('tiendas.create',['contador'=>$contador,'date'=>$date,'usuarios'=>$usuarios,'usuariosm'=>$usuariosm]);
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
                $almacenes->tipo='T';
                $almacenes->numero_almacen=$request->number_id;
                $almacenes->nombre=$request->name;
                $almacenes->estado=$request->estado;
                $almacenes->pais=$request->pais;
                $almacenes->direccion=$request->direccion;
                $almacenes->telefono=$request->telefono;
                $almacenes->codigo_postal=$request->cp;
                $almacenes->encargado_id=$request->usuario_admin;
                $almacenes->save();

        return redirect('Lista_Tienda')->with('success','Tienda Creado correctamente');
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
                $al=DB::table('almacens')
                    ->where('almacens.id',$almacen)
                    ->join('users','users.id','almacens.encargado_id')
                    ->select('users.name as uname','almacens.id as aid','almacens.nombre as anombre','almacens.numero_almacen as anumero','users.id as uid','almacens.codigo_postal as acp','almacens.pais as apais','almacens.telefono as atelefono','almacens.direccion as adireccion','almacens.estado as aestado')
                    ->get();
                $chkdsk=DB::table('almacens')
                ->where('almacens.id','=',$almacen)
                ->pluck('encargado_id');
                $usr=DB::table('users')
                        ->whereNotIn('id',(array)$chkdsk)
                        ->where('level','=','A')
                        ->get();
            return view('tiendas.edit',['almacen'=>$almacen,'al'=>$al,'contador'=>$contador,'usr'=>$usr]); 
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
    public function update(Request $request, $almacen)
    {
        $almacens= almacen::findOrFail($almacen);
        $almacens->numero_almacen=$request->anumero;
        $almacens->nombre=$request->anombre;
        $almacens->estado=$request->aestado;
        $almacens->pais=$request->apais;
        $almacens->direccion=$request->adireccion;
        $almacens->telefono=$request->atelefono;
        $almacens->codigo_postal=$request->acp;
        $almacens->encargado_id=$request->uid;
        $almacens->save();
        return redirect('/Lista_Tienda')->with('success','Tienda Actualizado Correctamente');
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
            return redirect('Lista_Tienda')->with('success','Se ha eliminado permanentemente');
        }
        else{
        almacen::destroy($id);
        return redirect('Lista_Tienda')->with('success','Se ha eliminado correctamente');
        }
        }
    }
}
