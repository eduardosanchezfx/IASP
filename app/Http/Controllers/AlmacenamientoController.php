<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\almacen;
use App\Http\Controllers\ContadorController;
use App\almacen_product;
use App\almacen_user;
use App\storage;
use Carbon\Carbon;
class AlmacenamientoController extends Controller
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
    public function index()
    {
        $contador= new ContadorController;
        $almacenes=DB::table('almacens')
                ->where('tipo','S')
                ->join('users','users.id','almacens.encargado_id')
                ->select('almacens.*','users.name as username')
                ->get();
        return view('almacenamientos.read',['almacenes'=>$almacenes,'contador'=>$contador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($almacen)
    {
         $contador= new ContadorController;
     $products=DB::table('products')
                    ->get();   
     $almacens=DB::table('almacens')
                    ->where('almacens.id',$almacen)
                    ->join('users','users.id','almacens.encargado_id')
                    ->select('users.name as uname','almacens.id as aid','almacens.nombre as anombre','almacens.numero_almacen as anumero')
                    ->get();
     $storage=DB::table('storages')
             ->where('almacen_id',$almacen)
             ->join('almacens','almacens.id','storages.almacen_id')
             ->join('products','products.id','storages.product_id')
             ->select('products.Nombre as pname','products.StockTotal as pstock','products.unidad as punidad','products.tipo_moneda as pmoneda','storages.stock as sstock','products.precio as pprecio','storages.created_at as screated','storages.updated_at as supdated','storages.deleted_at as sdeleted','storages.id as id')
             ->get();
      return view('almacenamientos.create',['contador'=>$contador,'products'=>$products,'almacens'=>$almacens,'storage'=>$storage]);
          
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
        $consuta= DB::table('products')->where('id','=',$request->product_id)
                ->get();
        foreach($consuta as $consulta){
        $validator=$request->validate([
            'stock'=>'numeric|required|min:1|max:'.$consulta->StockTotal
        ]);
        }
            DB::table('storages')->insert(['almacen_id'=>$request->almacen_id,'product_id'=>$request->product_id,'stock'=>$request->stock,'stockinit'=>$request->stock,'created_at'=> $date,'updated_at'=>$date]);
           /* $store=storage::findOrFail($request->product_id);
            $store->producto()->create([
                'stock'=>$request->stock,
                'almacen_id'=>$request->almacen_id
            ]);*/
            $updatep=DB::table('products')->where('id','=',$request->product_id)->get();
                     foreach($updatep as $u){
                         DB::table('products')->where('id','=',$u->id)->update(['StockTotal'=>($u->StockTotal)-($request->stock)]);
                     }
                     
            return response()->json([
            'success'=>true,  
        ]);
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
        $contador= new ContadorController;
        $check=DB::table('storages')
                ->where('id','=',$id)
                ->get();
        foreach($check as $ch){
        if($ch->deleted_at!=null){
           $restore= storage::where('id',$id)->withTrashed();
           $restore->restore();
            return back()->with('success','Se ha restablecido permanentemente');
        }
        if($ch->deleted_at==null){
            $almacens=DB::table('almacens')
                    ->where('almacens.id',$id)
                    ->join('users','users.id','almacens.encargado_id')
                    ->select('users.name as uname','almacens.id as aid','almacens.nombre as anombre','almacens.numero_almacen as anumero')
                    ->get();
     $storage=DB::table('storages')
             ->where('almacen_id',$id)
             ->join('almacens','almacens.id','storages.almacen_id')
             ->join('products','products.id','storages.product_id')
             ->select('products.Nombre as pname','products.StockTotal as pstock','products.unidad as punidad','products.tipo_moneda as pmoneda','storages.stock as sstock','products.precio as pprecio','storages.created_at as screated','storages.updated_at as supdated','storages.deleted_at as sdeleted','storages.id as id')
             ->get();
            return view('almacenamientos.edit',['contador'=>$contador,'almacens'=>$almacens,'storage'=>$storage]);
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
        $check=DB::table('storages')
                ->where('id','=',$id)
                ->get();
        foreach($check as $ch){
        if($ch->deleted_at!=null){
            $updatep=DB::table('products')->where('id','=',$ch->product_id)->get();
                     foreach($updatep as $u){
                         DB::table('products')->where('id','=',$ch->product_id)->update(['StockTotal'=>($u->StockTotal)+($ch->stock)]);
                     }
            storage::where('id',$id)->forceDelete();
            return back()->with('success','Se ha eliminado permanentemente');
        }
        else{
            storage::destroy($id);
             return back()->with('success','Se ha eliminado correctamente');
            }
                                }
    }
}
