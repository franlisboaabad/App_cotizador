<?php

namespace App\Http\Controllers\backend;

use App\Caja;
use App\Venta;
use App\Cliente;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MetodosPago;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all()->where('estado', 1);
        return view('admin.ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $metodos_pago = MetodosPago::all();
        return view('admin.ventas.create', compact('clientes', 'productos', 'metodos_pago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([ 'metodo_id'=> 'required' ,'producto_id' => 'required', 'precio' => 'required', 'cantidad'=> 'required','total_venta'=> 'required' ]);
        $venta = new Venta();
        $caja = Caja::where('estado', 1)->first();
        $producto = Producto::find($request->producto_id);


        if (isset($caja)) {
            $venta->user_id = 

            Venta::create(
                [
                    'user_id' => auth()->user()->id,
                    'caja_id' => $caja->id,
                ] + $request->all()
             );

            $caja->monto_total += $request->total_venta;
            $producto->stock -= $request->cantidad;

            $producto->update();
            $caja->update();
            

            return back()->with('success', 'Venta registrada con éxito');
        } else {
            return back()->with('error', 'Debe aperturar caja para realizar ventas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return view('admin.ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $metodos_pago = MetodosPago::all();
        return view('admin.ventas.edit', compact('clientes', 'productos', 'metodos_pago', 'venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        // dd($request->all());
        $request->validate([ 'metodo_id'=> 'required' ,'producto_id' => 'required', 'precio' => 'required', 'cantidad'=> 'required','total_venta'=> 'required' ]);

        $caja = Caja::where('estado', 1)->first();
        $producto = Producto::find($request->producto_id);

        if (isset($caja)) {

            if ($request->cantidad < $venta->cantidad) {

                $producto->stock  += $venta->cantidad;
                $producto->stock -= $request->cantidad;

                $caja->monto_total -= $venta->total_venta;
                $caja->monto_total += $request->total_venta;

                $producto->update();
                $caja->update();

            } else {

                $producto->stock  += $venta->cantidad;
                $producto->stock -= $request->cantidad;

                $caja->monto_total -= $venta->total_venta;
                $caja->monto_total += $request->total_venta;

                $producto->update();
                $caja->update();
            }

            $venta->update(
                [
                    'user_id' => auth()->user()->id,
                    'caja_id' => $caja->id
                ] + $request->all()
            );

            return back()->with('success', 'Venta editada con éxito');
        } else {
            return back()->with('error', 'Debe aperturar caja para actualizar la venta');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $caja = Caja::where('estado', 1)->first();
        $producto = Producto::find($venta->producto_id);
        if (isset($caja)) {
            
            $producto->stock += $venta->cantidad; // sumo la cantidad vendidad al stock del producto
            $caja->monto_total -= $venta->total_venta; // resto el monto total de la venta a la caja
            
            $producto->update();
            $caja->update();
            $venta->delete();

            return back();
        }
    }
}
