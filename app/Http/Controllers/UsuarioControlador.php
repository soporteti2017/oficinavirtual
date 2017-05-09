<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_Usuario;
use App\User;
use App\Solicitud;
use App\Autoriza_solicitud;
use Laracasts\Flash\Flash;
use App\Http\Requests\UsuarioRequest;


class UsuarioControlador extends Controller
{	

	public function index(Request $request){
		$usuarios = User::search($request->usuario)->orderBy('id', 'ASC')->paginate(15);

		return view('intranet.usuarios.index')->with('usuarios', $usuarios)->with('ver', 'usuarios');
	}

	public function create(){
        $tipos_usuarios = Tipo_Usuario::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
		return view('intranet.usuarios.create')->with('ver', 'usuarios')->with('tipos_usuarios', $tipos_usuarios);
	}

	public function show(){

	}

	public function store(UsuarioRequest $request){

		$usuario = new User($request->all());
		$usuario->password = bcrypt($request->password);
		$usuario->save();
		flash('Usuario ' .$usuario->usuario. ' se ha registrado correctamente', 'success');	
		return redirect()->route('usuarios.index');
		//dd($usuario);

	}

    public function view($id){
    	$usuario = User::find($id);
    	dd($usuario);
    }

    public function destroy($id){
    	$usuario = User::find($id);
    	$usuario->delete();

    	flash('Usuario ' .$usuario->usuario. ' ha sido borrado', 'danger');
    	return redirect()->route('usuarios.index');
    }

    public function edit($id){

    	$usuario = User::find($id);
    	return view('intranet.usuarios.edit')->with('usuarios', $usuario)->with('ver', 'usuarios');

    }

    public function update(Request $request, $id){

    	$usuario = User::find($id);
    	$usuario->fill($request->all());
    	// $usuario->usuario = $request->usuario;
    	// $usuario->rut = $request->rut;
    	// $usuario->nombre = $request->nombre;
    	// $usuario->correo = $request->correo;
    	// $usuario->externo = $request->externo;
    	$usuario->save();

    	flash('Usuario ' .$usuario->usuario. ' ha sido editado', 'success');
    	return redirect()->route('usuarios.index');


    }

    public function versolicitudes($id){
        //$pdf = \App::make('dompdf.wrapper');
        $solicitudes = Solicitud::getsolicitud($id);
        $solicitudes->each(function($solicitudes){
            $solicitudes->usuario;
            $solicitudes->empresa;
            $solicitudes->tipo_solicitud;
            $solicitudes->contrato;
            $solicitudes->autoriza_solicitud;
            });
        $pdf = \PDF::loadView('intranet.usuarios.solicitudes.versolicitudes', ['solicitudes' => $solicitudes]);
        return $pdf->stream('solicitud.pdf');

    }


}
