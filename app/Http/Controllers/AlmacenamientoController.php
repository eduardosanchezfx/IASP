<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\almacen;
use App\Http\Controllers\ContadorController;
use App\almacen_product;
use App\almacen_user;

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
      return view('almacenamientos.create',['contador'=>$contador,'products'=>$products,'almacens'=>$almacens]);
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd((array)$request->productoid ,(array)$request->agregar);
        $array1=(array)$request->agregar;
        $array2=(array)$request->productoid;
        //dd($array2);
       /* dd($array1);
        for($i=0;$i<count($array2);$i++){
        $array3=array_fill(0, count($request->agregar), ['StockAlmacen' =>$array2[$i]]);
        }
        $combinar=array_combine($array1,$array3);*/
        $almacenes=new almacen_product();
        $almacenes->StockAlmacen=$array2;
        
        $almacenes= almacen::find($request->number_id);
        $almacenes->almacenInProducts()->sync(1);
        $almacenes->save();
        
        

        return redirect('/Lista_Almacen')->with('success','Asignacion de producto a almacen correctamente');
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
