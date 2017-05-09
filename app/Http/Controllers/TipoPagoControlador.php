<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_pago;
use App\Http\Requests\TipoPagoRequest;

class TipoPagoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipos_pagos = Tipo_pago::search($request->descripcion)->orderBy('id', 'ASC')->paginate(15);
        return view('intranet.tipos_pagos.index')->with('tipos_pagos', $tipos_pagos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intranet.tipos_pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPagoRequest $request)
    {
        $tipo_pago = new Tipo_pago($request->all());
        $tipo_pago->save();
        flash('Tipo de pago  ' .$tipo_pago->descripcion. ' agregado correctamente', 'success');
        return redirect()->route('tipos_pagos.index');
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
        $tipo_pago = Tipo_pago::find($id);
        return view('intranet.tipos_pagos.edit')->with('tipo_pago', $tipo_pago);
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
        $tipo_pago = Tipo_pago::find($id);
        $tipo_pago->fill($request->all());
        $tipo_pago->save();    
        
        flash('Tipo de pago ' .$tipo_pago->descripcion. ' ha sido editado', 'success');
        return redirect()->route('tipos_pagos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_pago = Tipo_pago::find($id);
        $tipo_pago->delete();
        flash('Tipo de pago ' .$tipo_pago->descripcion. ' ha sido borrado', 'danger');
        return redirect()->route('tipos_pagos.index');
    }
}
