<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_pago;
use App\Formas_pagos;

class FormaPagoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $formas_pagos = Formas_pagos::search($request->descripcion)->orderBy('id', 'ASC')->paginate(15);
        $formas_pagos->each(function($formas_pagos){
            $formas_pagos->tipo_pago;
        });
        return view('intranet.formas_pagos.index')->with('formas_pagos', $formas_pagos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_pagos = Tipo_pago::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id');
        return view('intranet.formas_pagos.create')->with('tipos_pagos', $tipos_pagos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forma_pago = new Formas_pagos($request->all());
       // dd($forma_pago);
        $forma_pago->save();
        flash('Forma de pago ' .$forma_pago->descripcion. ' agregada correctamente', 'success');
        return redirect()->route('formas_pagos.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
