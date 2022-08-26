@extends('adminlte::page')

@section('title', 'Producto')
@section('plugins.Datatables',true)
@section('content_header')
<div class="row">
    <div class="col">
        <h1>Producto</h1>
    </div>
    
</div>
@endsection

@section('content')
<section>
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Fecha de registro: {{ $producto->created_at }} </p> <hr>
                    <p>Producto: {{ $producto->nombre}} </p> <hr>
                    <p>Descripcion: {{ $producto->descripcion }} </p> <hr>
                    <p>Precio: {{ $producto->precio }} </p> <hr>
                    <p>Cantidad: {{ $producto->stock }} </p> <hr>

                    <a href="{{ route('producto.index') }}" class="btn btn-info btn-sm">Lista de productos</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
           <div class="card">
            <div class="card-body">
                <img src="{{ $producto->get_imagen }}" class="img-fluid" width="50%" height="50%">
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

