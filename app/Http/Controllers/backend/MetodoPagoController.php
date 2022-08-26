<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\MetodoPago;
use App\MetodosPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodospago = MetodoPago::all();
        return view('admin.metodos.index', compact('metodospago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.metodos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        MetodosPago::create($request->all());
        return back()->with('success', 'Metodo de pago registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function show(MetodoPago $metodoPago)
    {
        // return view('admin.metodos.create', compact('metodoPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function edit(MetodoPago $metodo)
    {
        return view('admin.metodos.edit', compact('metodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetodoPago $metodo)
    {
        $metodo->update($request->all());
        return back()->with('success', 'Metodo de pago editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetodoPago $metodo)
    {
        if ($metodo->estado == 1) {
            $metodo->estado = 0;
            $metodo->update();
            return back();
        } else {

            $metodo->estado = 1;
            $metodo->update();
            return back();
        }
    }
}
