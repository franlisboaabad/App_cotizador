<?php

namespace App\Http\Controllers\backend;

use Log;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Validator;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required | max: 100',
                'apellidos' => 'required | max: 200',
                'documento' => 'required | max: 10 | unique:clientes',
                'direccion' => 'required | max: 255',
            ]
        );

        Cliente::create($request->all());
        return back()->with('success', 'Cliente registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('admin.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return back()->with('success', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if ($cliente->id != 1) {
            $cliente->delete();
            return back();
        }

        return back();
    }


    /* 
        * Envio de datos por modal - ajax juery
    */

    public function nuevoClienteModal(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required | max: 100',
                'apellidos' => 'required | max: 200',
                'documento' => 'required | max: 10 | unique:clientes',
                'direccion' => 'required | max: 255',
                'telefono' => 'required | max: 10  | unique:clientes' 
            ]
        );

        if ($validator->getMessageBag()->toArray()) {
            return response()->json(array(
                'success' => false,
                'message' => 'There are incorect values in the form!',
                'errors' => $validator->getMessageBag()->toArray()
            ), 422);
        }

        $cliente = Cliente::create($request->all());
        return response()->json(['success'=> true, 'message' => 'Cliente registrado con éxito', 'data'=> $cliente ]);
    }
}
