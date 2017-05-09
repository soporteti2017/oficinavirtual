<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado_conexion;
use App\Http\Requests\EstadoConexionRequest;

class EstadoConexionControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estados_conexiones = Estado_conexion::search($request->descripcion)->orderBy('id', 'ASC')->paginate(15);
        return view('intranet.estados_conexiones.index')->with('estados_conexiones', $estados_conexiones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intranet.estados_conexiones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoConexionRequest $request)
    {
        $estado_conexion = new Estado_conexion($request->all());
        $estado_conexion->save();
        flash('Estado conexión  ' .$estado_conexion->descripcion. ' agregado correctamente', 'success');
        return redirect()->route('estados_conexiones.index');
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
        $estado_conexion = Estado_conexion::find($id);
        return view('intranet.estados_conexiones.edit')->with('estado_conexion', $estado_conexion);
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
        $estado_conexion = Estado_conexion::find($id);
        $estado_conexion->fill($request->all());
        $estado_conexion->save();    
        
        flash('Estado de conexión ' .$estado_conexion->descripcion. ' ha sido editado', 'success');
        return redirect()->route('estados_conexiones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_conexion = Estado_conexion::find($id);
        $estado_conexion->delete();
        flash('Estado Conexión ' .$estado_conexion->descripcion. ' ha sido borrado', 'danger');
        return redirect()->route('estados_conexiones.index');
    }
}
