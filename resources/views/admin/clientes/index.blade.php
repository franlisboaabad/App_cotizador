@extends('adminlte::page')

@section('title', 'Clientes')
@section('plugins.Datatables',true)
@section('content_header')
<div class="row">
    <div class="col">
        <h1>Clientes</h1>
    </div>
    <div class="col">
        <a href="{{ route('cliente.create') }}" class="btn btn-info btn-sm float-right"> <i class="fa fa-plus"> </i> Nuevo</a>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table_clientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>N°Documento</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Config</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($clientes as $cliente)
                    
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellidos }}</td>
                        <td>{{ $cliente->documento }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td> <span class="badge badge-success">Activo</span> </td>
                         <td>
                             <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
                             @csrf
                             @method('delete')
                             <a href="{{ route('cliente.show', $cliente) }}" class="linea btn btn-info btn-xs" title="Ver cliente" > <i class="fas fa-eye"></i> </a>
                             <a href="{{ route('cliente.edit', $cliente) }}" class="linea btn btn-warning btn-xs" title="Editar" > <i class="fas fa-edit"></i> </a>
                             <button type="submit" class="linea btn btn-danger btn-xs" onclick="return confirm('¿Esta seguro de eliminar?')" title="Eliminar"><i class="fas fa-trash "></i></button>
                             </form>
                         </td>
                     </tr>
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
        $('#table_clientes').DataTable();
    });
</script>
@stop

