<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ContadorController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EnviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
            $this->middleware('auth');
            
            
     }
    public function index($almacen)
    {
        $contador= new ContadorController;
        /*encuentra info desde el modelo envio a las relaciones storage que conecta a products y almacen*/
        //$envios= \App\almacen::findOrFail($almacen)->with('storages.envios.users','storages.envios.almacens','storages.products')->get();
        $envios= \App\envio::with('storages.products','users','storages.almacen','almacens')->distinct('numero_guia')->get();//obtener toda la informacion de los envio
        return view('envios.read',['contador'=>$contador,'envios'=>$envios,'almacen'=>$almacen]);
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
                    ->select('users.name as uname','almacens.id as aid','almacens.nombre as anombre','almacens.numero_almacen as anumero')
                    ->get();
     $storage=DB::table('storages')
             ->where('almacen_id',$almacen)
             ->join('almacens','almacens.id','storages.almacen_id')
             ->join('products','products.id','storages.product_id')
             ->select('products.Nombre as pname','products.StockTotal as pstock','products.unidad as punidad','products.tipo_moneda as pmoneda','storages.stock as sstock','products.precio as pprecio','storages.created_at as screated','storages.updated_at as supdated','storages.deleted_at as sdeleted','storages.id as id','storages.product_id as sproduct')
             ->get();
        $guia = Carbon::now()->format('dmyhi');
        $almacenes= \App\almacen::all()->where('id',$almacen);
        
        return view('envios.create',['contador'=>$contador,'storage'=>$storage,'almacens'=>$almacens,'guia'=>$guia,'almacenes'=>$almacenes,'almacen'=>$almacen]);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $consuta= DB::table('storages')->where('id','=',$request->storage_id)
                ->get();
        foreach($consuta as $consulta){
        $validator=$request->validate([
            'cantidad_inicial'=>'numeric|required|min:1|max:'.$consulta->stock
        ]);
        }
            DB::table('envios')->insert(['numero_guia'=>$request->numero_guia,'user_id'=>$request->user_id,'almacen_id'=>$request->almacen_id,'storage_id'=>$request->storage_id,'cantidad_inicial'=>$request->cantidad_inicial,'cantidad_final'=>$request->cantidad_inicial,'comentario'=>$request->comentario,'estado'=>'Pendiente','created_at'=> $date,'updated_at'=>$date,'precio_salida'=>$request->cantidad_inicial]);
            
            $updatep=DB::table('storages')->where('id','=',$request->storage_id)->get();
                     foreach($updatep as $u){
                         DB::table('storages')->where('id',$request->storage_id)->update(['stock'=>(($u->stock)-($request->cantidad_inicial)),'updated_at'=>$date]);
                     }
                     
            return response()->json([
            'success'=>true,  
        ]);
    }
     public function resultado(Request $request,$almacen){
         
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
    public function listaenvios(){
     $contador= new ContadorController;
     $auth=auth()->user()->id;
     if(auth()->user()->level=='S'){
     $envios= \App\envio::with('storages.products','users','storages.almacen','almacens')
             ->groupBy('numero_guia')
             ->get();//obtener toda la informacion de los envio
     }
     if(auth()->user()->level=='A'){
         $check= \App\almacen::where('encargado_id',$auth)->get('id');
         $check->storage;
         dd($check);
         
     }
     if(auth()->user()->level=='M'){ 
         $demo= \App\User::find($auth); 
         $check=$demo->almacens()->pluck('almacens.id as aid');
     $envios=\App\envio::with('users','storages.almacen','almacens',['storages.products'=>fucntion])
             ->groupBy('numero_guia')  
             ->get();//obtener toda la informacion de los envio
         dd($check);
         
     }   
     return view('envios.lista',['envios'=>$envios,'contador'=>$contador]);
    }
}
