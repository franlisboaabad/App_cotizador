@extends('adminlte::page')

@section('title', 'Venta')
@section('plugins.Datatables',true)
@section('content_header')
<div class="row">
    <div class="col">
        <h1>Venta</h1>
    </div>
    
</div>
@endsection

@section('content')
<section>
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Fecha de registro: {{ $venta->created_at }} </p> <hr>
                    <p>User: {{ $venta->user->name }} </p> <hr>
                    <p>Cliente: {{ $venta->cliente->nombre}}  {{ $venta->cliente->apellidos }} </p> <hr>
                    <p>Producto: {{ $venta->producto->nombre }}  </p> <hr>
                    <p>Cantidad: {{ $venta->cantidad }}  </p> <hr>
                    <p>Total Venta: {{ $venta->total_venta }}  </p> <hr>

                    

                    <a href="{{ route('venta.index') }}" class="btn btn-info btn-sm">Lista de ventas</a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop


@section('css')

@stop

@section('js')

@stop

