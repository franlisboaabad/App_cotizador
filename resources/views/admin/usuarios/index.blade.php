@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

<div class="row">
    <div class="col">
        <h1>Lista de usuarios</h1>
    </div>
    <div class="col">
        <a href="{{ route('usuarios.create') }}" class="btn btn-info btn-sm float-right"> <i class="fa fa-plus"></i> Nuevo</a>
    </div>
</div>

@endsection

@section('content')
<section>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table_paquetes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Fecha de creación</th>

                        <th>Config</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id  }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->created_at }}</td>
                        <td>
                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('usuarios.show', $usuario) }}" class="linea btn btn-success btn-xs "> <i class="fas fa-eye"></i> </a>
                                <a href="{{ route('usuarios.edit', $usuario) }}" class="linea btn btn-warning btn-xs "> <i class="fas fa-edit"></i> </a>
                                <button type="submit" class="linea btn btn-danger btn-xs " onclick="return confirm('¿Esta seguro de eliminar?')"><i class="fas fa-trash "></i></button>
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
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table_usuarios').DataTable();
    });

</script>
@stop
