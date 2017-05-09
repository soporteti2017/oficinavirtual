<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_plan;
use App\Plan;
use Laracasts\Flash\Flash;

class PlanesControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $planes = Plan::search($request->descripcion)->orderBy('id', 'ASC')->paginate(15);
        $planes->each(function($planes){
            $planes->tipo_plan;
        });
        return view('intranet.planes.index')->with('ver', 'planes')->with('planes', $planes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_planes = Tipo_plan::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        //dd($tipos_planes);
        return view('intranet.planes.create')->with('ver', 'planes')->with('tipos_planes', $tipos_planes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = new Plan($request->all());
        $plan->save();
        flash('Plan ' .$plan->descripcion. ' agregado correctamente', 'success');
        return redirect()->route('planes.index');
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
        $plan = Plan::find($id);
        $plan->tipo_plan();
        $tipos_planes = Tipo_plan::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        //dd($plan->tipo_plan());
        return view('intranet.planes.edit')->with('ver', 'planes')
                ->with('plan', $plan)
                ->with('tipos_planes', $tipos_planes);  
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
        $plan = Plan::find($id);
        $plan->fill($request->all());
        $plan->save();    
        
        flash('Plan ' .$plan->descripcion. ' ha sido editado', 'success');
        return redirect()->route('planes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();

        flash('Plan ' .$plan->descripcion. ' ha sido borrado', 'danger');
        return redirect()->route('planes.index');
    }
}
