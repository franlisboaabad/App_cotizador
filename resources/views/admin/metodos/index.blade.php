@extends('adminlte::page')

@section('title', 'Metodos de pago')
@section('plugins.Datatables',true)
@section('content_header')
<div class="row">
    <div class="col">
        <h1>Metodos de pago</h1>
    </div>
    <div class="col">
        <a href="{{ route('metodos_pago.create') }}" class="btn btn-info btn-sm float-right"> <i class="fa fa-plus"> </i> Nuevo</a>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table_metodos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Descripcion</th>
                        <th>Numero</th>
                        <th>Estado</th>
                        <th>Config</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($metodospago as $metodo)
                    
                    @if($metodo->estado == 0)
                    <tr>
                       <td>{{ $metodo->id }}</td>
                       <td>{{ $metodo->descripcion }}</td>
                       <td>{{ $metodo->numero }}</td>
                       <td> <span class="badge badge-danger">Eliminado</span> </td>
                        <td>
                            <form action="{{ route('metodos_pago.destroy', $metodo ) }}"  method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="linea btn btn-success btn-xs" onclick="return confirm('¿Esta seguro de habilitar?')" title="Habilitar"><i class="fas fa-check"></i></button>
                            </form>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ $metodo->id }}</td>
                        <td>{{ $metodo->descripcion }}</td>
                        <td>{{ $metodo->numero }}</td>
                        <td> <span class="badge badge-success">Activo</span> </td>
                         <td>
                             <form action="{{ route('metodos_pago.destroy', $metodo ) }}" method="POST">
                             @csrf
                             @method('delete')
                             <a href="{{ route('metodos_pago.edit', $metodo->id ) }}" class="linea btn btn-warning btn-xs" title="Editar" > <i class="fas fa-edit"></i> </a>
                             <button type="submit" class="linea btn btn-danger btn-xs" onclick="return confirm('¿Esta seguro de eliminar?')" title="Eliminar"><i class="fas fa-trash"></i></button>
                             </form>
                         </td>
                     </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@stop


@section('css')

@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table_metodos').DataTable();
    });
</script>
@stop

