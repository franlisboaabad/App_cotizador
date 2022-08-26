@extends('adminlte::page')

@section('title', 'Editar cliente')

@section('content_header')
    {{-- codigo --}}
@endsection

@section('content')
    <div class="row pt-3">

        <div class="col-md-6">

            <h3>Editar cliente</h3>
            <div class="card">
                <div class="card-body">

                    @include('partials.validacion')



                    <form action="{{ route('cliente.update',$cliente) }}" method="POST">

                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" name="nombre" required value="{{ old('nombre',$cliente->nombre) }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" required value="{{ old('apellidos',$cliente->apellidos) }}" >
                        </div>

                        <div class="form-group">
                            <label for="">N° documento</label>
                            <input type="text" class="form-control" name="documento" required value="{{ old('documento',$cliente->documento) }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Dirección - Ubicación</label>
                            <input type="text" class="form-control" name="direccion" required value="{{ old('direccion',$cliente->direccion) }}" >
                        </div>

                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Telefono / celular</label>
                                    <input type="text" class="form-control" name="telefono"  value="{{ old('telefono',$cliente->telefono) }}" >
                                </div>
                                <div class="col">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email"  value="{{ old('email',$cliente->email) }}" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm">Editar cliente</button>
                            <a href="{{ route('cliente.index') }}" class="btn btn-info btn-sm">Lista de clientes</a>
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
