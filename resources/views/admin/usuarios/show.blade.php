@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('content_header')
<h1>Dashboard</h1>

@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-6">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        {{-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}
                    </div>
                    <h3 class="profile-username text-center">{{ $usuario->name }}</h3>
                    <p class="text-muted text-center">Software Engineer</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>E-mail</b> <a class="float-right">{{ $usuario->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Contraseña</b> <a class="float-right">{{ $usuario->password }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de creación</b> <a class="float-right">{{ $usuario->created_at }}</a>
                        </li>
                    </ul>
                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}

                    <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-sm"> Lista de usuarios</a> 
                </div>

            </div>


        </div>
    </div>
</section>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
{{-- <script> console.log('hi!')  </script> --}}
@stop
