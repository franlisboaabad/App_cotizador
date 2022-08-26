<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = Producto::create($request->all());

        if ($request->file('imagen')) {

            $producto->imagen = $request->file('imagen')->store('productos', 'public');
            $producto->save();
        }

        return back()->with('success', 'Producto registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        if ($request->file('imagen')) {

            Storage::disk('public')->delete($producto->imagen); // eliminar la imagen para reemplazar

            $producto->update(
                [
                    'imagen' => $request->file('imagen')->store('productos', 'public')
                ] + $request->all()
            );

        } else {
            $producto->update($request->all());    
        }

        return back()->with('success', 'Producto editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if ($producto->estado == '0') {
            $producto->estado = 1;
            $producto->update();
            return back();
        } else {
            $producto->estado = 0;
            $producto->update();
            return back();
        }
    }


    /**
     * Busqueda de producto por ID para selector y extraer precio.
     */

    public function productoPrice($valor_id)
    {
        $producto = Producto::find($valor_id);
        return response()->json(['precio' => $producto->precio]);
    }
}
