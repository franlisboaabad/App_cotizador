@extends('adminlte::page')

@section('title', 'Metodo de pago  - Editar')

@section('content_header')
    {{-- codigo --}}
@endsection

@section('content')
    <div class="row pt-3">

        <div class="col-md-6">

            <h3>Editar </h3>
            <div class="card">
                <div class="card-body">

                    @include('partials.validacion')

                    <form action="{{ route('metodos_pago.update', $metodo ) }}" method="POST">

                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <input type="text" class="form-control" required name="descripcion" value="{{ old('descripcion', $metodo->descripcion ) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Cuenta</label>
                            <input type="text" class="form-control"  name="numero" value="{{ old('numero',$metodo->numero) }}">
                        </div>
                
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('¿Esta seguro de actualizar los datos?')" >Editar metodo</button>
                            <a href="{{ route('metodos_pago.index') }}" class="btn btn-info btn-sm">Lista de ingresos</a>
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
