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
        return view('home',['contador'=>$contador,'date'=>$date])->with('info','Se añadiran nuevas caracteristicas');
    }
}
