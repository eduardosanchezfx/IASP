<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContadorController;
use App\product;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
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
        $products=DB::table('products')
        ->get();

        return view('productos.read',['products'=>$products,'contador'=>$contador]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contador= new ContadorController;
        return view('productos.create',['contador'=>$contador]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos= new product();
        $productos->Nombre=$request->nombre_producto;
        $productos->Descripcion=$request->descripcion;
        $productos->StockTotal=$request->StockTotal;
        $productos->Precio=$request->precio;
        $productos->unidad=$request->unidad;
        $productos->tipo_moneda=$request->divisa;
        $productos->save();
        return redirect('/Lista_producto')->with('success','Producto Creado correctamente');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($productos)
    {
        $contador= new ContadorController;
        $p=DB::table('products')
        ->where('id','=',$productos)
        ->get();
        return view('productos.edit',['productos'=>$productos,'p'=>$p,'contador'=>$contador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $p)
    {
        $productos= product::findOrFail($p);
        $productos->Nombre=$request->nombre_producto;
        $productos->Descripcion=$request->descripcion;
        $productos->StockTotal=$request->StockTotal;
        $productos->Precio=$request->precio;
        $productos->unidad=$request->unidad;
        $productos->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::destroy($id);
        return redirect('Lista_producto')->with('success','Se ha eliminado correctamente');
    }
}
