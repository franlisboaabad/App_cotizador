@extends('adminlte::page')

@section('title', 'Nuevo producto')

@section('content_header')
    {{-- codigo --}}
@endsection

@section('content')
    <div class="row pt-3">

        <div class="col-md-6">

            <h3>Nuevo producto</h3>
            <div class="card">
                <div class="card-body">

                    @include('partials.validacion')

                    <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required value="{{ old('nombre') }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion" required value="{{ old('descripcion') }}" >
                        </div>


                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="text" class="form-control" name="precio" required value="{{ old('precio') }}" >
                        </div>


                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="text" class="form-control" name="stock" required value="{{ old('stock') }}" >
                        </div>


                        <div class="form-group">
                            <label for="">Imagen de producto</label>
                            <input type="file" name="imagen">
                        </div>

                        <div class="form-group">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Registrar producto</button>
                            <a href="{{ route('producto.index') }}" class="btn btn-info btn-sm">Lista de productos</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')

@stop

@section('js')

@stop
