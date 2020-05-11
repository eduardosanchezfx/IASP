<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User as user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ContadorController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Middleware\Authenticate;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as AuthUser;
use Dompdf\Adapter\PDFLib;

class ListasuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('SuperMiddleware')->except('show');
        }
    public function index()
    {   
        $contador= new ContadorController; //instanciamos controlador contador de los almacenes 
       
        $user=DB::table('users')
            //->select('updated_at',date('Y-m-d-g-A'))
            ->get();
        return view('listausuarios',['user'=>$user,'contador'=>$contador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $contador= new ContadorController;
        
        return view('crearusuario',['contador'=>$contador])->with('info','Rellene los campos correctamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios= new user;
        $usuarios->name=$request->name;
        $usuarios->email=$request->mail;
        $usuarios->password= Hash::make($request['password']);;
        $usuarios->level=$request->level;
        $usuarios->save();

        return redirect('/Crear_Usuario')->with('success','Usuario Creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $contador= new ContadorController;
        $user=DB::table('users')
             ->get();
        $almacenes=DB::table('almacens')
            ->where('almacens.user_id','=',Auth::id())
            ->join('users','users.id','=','almacens.user_id')
            ->select('users.name');
        
        return view('perfil',['user'=>$user,'contador'=>$contador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($usuarios)
    {
        $contador= new ContadorController;
        $check=DB::table('users')
        ->where('id','=',$usuarios)
        ->get();
        foreach($check as $ch){
            if($ch->deleted_at!=null){
                $usuario = User::withTrashed()->where('id', '=', $usuarios)->first();
                //Restauramos el registro
                $usuario->restore();
                return back()->with('success','Se ha recuperado correctamente');
            }
            else{
                $u= DB::table('users')
                ->where('id','=',$usuarios)
                ->get();
            return view('editarusuario',['usuarios'=>$usuarios,'u'=>$u,'contador'=>$contador]); 
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
    public function update(Request $request, $u)
    {
        $usuarios= user::findOrFail($u);
        $usuarios->name=$request->name;
        $usuarios->email=$request->mail;
        $usuarios->password= Hash::make($request['password']);;
        $usuarios->level=$request->level;
        $usuarios->save();
          return redirect('Lista_Usuarios')->with('warning','Usuario modificado');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $check=DB::table('users')
        ->where('id','=',$id)
        ->get();
        foreach($check as $ch){
        if($ch->deleted_at!=null){
            User::where('id',$id)->forceDelete();

            return redirect('Lista_Usuarios')->with('success','Se ha eliminado permanentemente');
        }
        else{
            User::destroy($id);
             return redirect('Lista_Usuarios')->with('success','Se ha eliminado correctamente');
            }
                                }
        }

    
}
