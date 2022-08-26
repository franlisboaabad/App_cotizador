@extends('adminlte::page')

@section('title', 'Ventas')
@section('plugins.Datatables',true)
@section('content_header')
<div class="row">
    <div class="col">
        <h1>Ventas</h1>
    </div>
    <div class="col">
        <a href="{{ route('venta.create') }}" class="btn btn-info btn-sm float-right"> <i class="fa fa-plus"> </i> Nueva venta</a>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table_ventas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total venta</th>
                        <th>Estado</th>
                        <th>Config</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($ventas as $venta)
                    
                    @if($venta->estado == 0)
                    <tr>
                       <td>{{ $venta->id }}</td>
                       <td>{{ $venta->user->email }}</td>
                       <td>{{ $venta->cliente->nombre }}</td>
                       <td>{{ $venta->producto->nombre }}</td>
                       <td>{{ $venta->cantidad }}</td>
                       <td>{{ $venta->producto->precio }}</td>
                       <td>{{ $venta->total_venta }}</td>
                       <td> <span class="badge badge-danger">Eliminado</span> </td>
                        <td>
                            <form action="{{ route('venta.destroy', $venta) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="linea btn btn-success btn-xs" onclick="return confirm('¿Esta seguro de habilitar?')" title="Habilitar"><i class="fas fa-check"></i></button>
                            </form>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->user->email }}</td>
                        <td>{{ $venta->cliente->nombre }}</td>
                        <td>{{ $venta->producto->nombre }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>{{ $venta->producto->precio }}</td>
                        <td>{{ $venta->total_venta }}</td>
                        <td> <span class="badge badge-success">Activo</span> </td>
                         <td>
                             <form action="{{ route('venta.destroy', $venta) }}" method="POST">
                             @csrf
                             @method('delete')
                             <a href="{{ route('venta.show', $venta) }}" class="linea btn btn-info btn-xs" title="Ver venta" > <i class="fas fa-eye"></i> </a>
                             <a href="{{ route('venta.edit', $venta) }}" class="linea btn btn-warning btn-xs" title="Editar" > <i class="fas fa-edit"></i> </a>
                             <button type="submit" class="linea btn btn-danger btn-xs" onclick="return confirm('¿Esta seguro de eliminar?')" title="Eliminar"><i class="fas fa-trash "></i></button>
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
        $('#table_ventas').DataTable();
    });
</script>
@stop

