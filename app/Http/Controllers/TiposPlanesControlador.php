<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Tipo_plan;
use Laracasts\Flash\Flash;

class TiposPlanesControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipos_planes = Tipo_plan::search($request->descripcion)->orderBy('id', 'ASC')->paginate(15);
        $tipos_planes->each(function($tipos_planes){
            $tipos_planes->servicio;
        });
        //dd($tipos_planes);
        return view('intranet.tipos_planes.index')->with('ver', 'tipos_planes')->with('tipos_planes', $tipos_planes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        //dd($servicios);
       return view('intranet.tipos_planes.create')->with('ver', 'tipos_planes')->with('servicios', $servicios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_plan = new Tipo_plan($request->all());
        $tipo_plan->save();
        flash('Tipo plan ' .$tipo_plan->descripcion. ' agregado correctamente', 'success');
        return redirect()->route('tipos_planes.index');
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
        $tipo_plan = Tipo_plan::find($id);
        $tipo_plan->servicio();
        $servicios = Servicio::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        return view('intranet.tipos_planes.edit')->with('ver', 'tipos_planes')
                ->with('tipo_plan', $tipo_plan)
                ->with('servicios', $servicios);    
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
        $tipo_plan = Tipo_plan::find($id);
        $tipo_plan->fill($request->all());
        $tipo_plan->save();    
        
        flash('Tipo de plan ' .$tipo_plan->descripcion. ' ha sido editado', 'success');
        return redirect()->route('tipos_planes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_plan = Tipo_plan::find($id);
        $tipo_plan->delete();

        flash('Servicio ' .$tipo_plan->descripcion. ' ha sido borrado', 'danger');
        return redirect()->route('tipos_planes.index');    
    }
}