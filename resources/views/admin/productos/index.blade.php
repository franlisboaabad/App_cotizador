@extends('adminlte::page')

@section('title', 'Productos')
@section('plugins.Datatables',true)
@section('content_header')
<div class="row">
    <div class="col">
        <h1>Productos</h1>
    </div>
    <div class="col">
        <a href="{{ route('producto.create') }}" class="btn btn-info btn-sm float-right"> <i class="fa fa-plus"> </i> Nuevo</a>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table_productos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th>Config</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($productos as $producto)
                    
                    @if($producto->estado == 0)
                    <tr>
                       <td>{{ $producto->id }}</td>
                       <td>{{ $producto->nombre }}</td>
                       <td>{{ $producto->descripcion }}</td>
                       <td>{{ $producto->precio }}</td>
                       <td>{{ $producto->stock }}</td>
                       <td>
                            <a href="{{ $producto->get_imagen }}" target="_Blank"> Url imagen </a>
                       </td>
                       
                       <td> <span class="badge badge-danger">Eliminado</span> </td>
                        <td>
                            <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="linea btn btn-success btn-xs" onclick="return confirm('¿Esta seguro de habilitar?')" title="Habilitar"><i class="fas fa-check"></i></button>
                            </form>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <a href="{{ $producto->get_imagen }}" target="_Blank"> Url imagen </a>
                       </td>
                        <td> <span class="badge badge-success">Activo</span> </td>
                         <td>
                             <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                             @csrf
                             @method('delete')
                             <a href="{{ route('producto.show', $producto) }}" class="linea btn btn-info btn-xs" title="Ver producto" > <i class="fas fa-eye"></i> </a>
                             <a href="{{ route('producto.edit', $producto) }}" class="linea btn btn-warning btn-xs" title="Editar" > <i class="fas fa-edit"></i> </a>
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
        $('#table_productos').DataTable();
    });
</script>
@stop

