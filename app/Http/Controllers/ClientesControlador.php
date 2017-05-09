<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Cliente;  
use Laracasts\Flash\Flash;  

class ClientesControlador extends Controller
{
   public function index(Request $request)
    {
        $clientes = Cliente::Search($request->name)->orderBy('id')->paginate(5);
        //$clientes = Cliente::orderBy('id')->paginate(5);
        return view('intranet.clientes.index')->with('clientes',$clientes);
    }

    public function show()
    {
        /*$clientes = Cliente::orderBy('id')->paginate(5);
        return view('clientes.index')->with('clientes',$clientes);*/
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('intranet.clientes.edit')->with('cliente',$cliente);
    }

    public function create()
    {
        return view('intranet.clientes.create');
    }


    public function store(ClienteRequest $request)
    {
        $cliente = new Cliente($request->all());
        $cliente->save();

        Flash::success("Cliente ingresado correctamente");

        return redirect()->route('clientes.index');
        
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        Flash::error("Cliente eliminado del sistema");
        return redirect()->route('clientes.index');
    }

    public function update(request $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->nombres = $request->nombres;
        $cliente->rut = $request->rut;
        $cliente->paterno = $request->paterno;
        $cliente->materno = $request->materno;
        $cliente->nacionalidad = $request->nacionalidad;
        $cliente->telefono1 = $request->telefono1;
        $cliente->telefono2 = $request->telefono2;
        $cliente->email = $request->email;
        $cliente->save();

        Flash::warning('Cliente modificado correctamente');
        return redirect()->route('clientes.index');
    }

    public function contratopdf(request $request){
        //dd($request);
    }
}
