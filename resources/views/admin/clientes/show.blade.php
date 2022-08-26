@extends('adminlte::page')

@section('title', 'Clientes')
@section('plugins.Datatables',true)
@section('content_header')
<div class="row">
    <div class="col">
        <h1>Cliente</h1>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <p>Nombre:{{ $cliente->nombre }} - Apellidos: {{ $cliente->apellidos }}</p> <hr>
                    <p>Numero de documento: {{ $cliente->documento }}</p> <hr>
                    <p>Dirección: {{ $cliente->direccion }}</p> <hr>
                    <p>Telefono: {{ $cliente->telefono }} - Email: {{ $cliente->email }}</p>


                    <a href="{{ route('cliente.index') }}" class="btn btn-info btn-sm">Lista de clientes</a>
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

