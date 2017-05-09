<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function inicio(){
        return view('/');
    }

    public function verMenuUsuario(){
        return view('layouts.Menu.index')->with('ver', 'usuarios');
    }

    public function verMenuCliente(){
        return view('layouts.Menu.index')->with('ver', 'clientes');
    }

    public function verMenuCuenta(){
        return view('layouts.Menu.index')->with('ver', 'cuentas');
    }

    public function verMenuGestion(){
        return view('layouts.Menu.index')->with('ver', 'gestion');
    }

}
