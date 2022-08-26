@extends('adminlte::page')

@section('title', 'Editar producto')

@section('content_header')
    {{-- codigo --}}
@endsection

@section('content')
    <div class="row pt-3">

        <div class="col-md-6">

            <h3>Editar producto</h3>
            <div class="card">
                <div class="card-body">

                    @include('partials.validacion')


                    <form action="{{ route('producto.update',$producto) }}" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required value="{{ old('nombre',$producto->nombre) }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion" required value="{{ old('descripcion',$producto->descripcion) }}" >
                        </div>


                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="text" class="form-control" name="precio" required value="{{ old('precio',$producto->precio) }}" >
                        </div>


                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="text" class="form-control" name="stock" required value="{{ old('stock',$producto->stock) }}" >
                        </div>

                        
                        <div class="form-group">
                            <label for="">Imagen de producto</label>
                            <input type="file" name="imagen">
                        </div>
                        

                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('¿Está seguro de actualizar los datos?')" >Editar producto</button>
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
