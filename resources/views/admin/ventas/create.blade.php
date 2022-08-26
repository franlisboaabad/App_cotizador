@extends('adminlte::page')

@section('title', 'Nueva venta')
@section('plugins.Select2', true)
@section('content_header')
    {{-- codigo --}}
@endsection

@section('content')
    <div class="row pt-3">

        <div class="col-md-6">

            <h3>Nueva venta</h3>
            <div class="card">
                <div class="card-body">

                    @include('partials.validacion')


                    <form action="{{ route('venta.store') }}" method="POST">


                        <div class="form-group">
                            <label for="">Seleccionar cliente</label>
                            <select name="cliente_id" class="form-control js-example-basic-single">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"> {{ $cliente->nombre }} - {{ $cliente->apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                           <div class="row">
                            <div class="col-md-7">
                                <label for="">Seleccionar producto</label>
                                <select name="producto_id" class="form-control js-example-basic-single" id="producto">
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}"> {{ $producto->nombre }}   - stock {{ $producto->stock }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="">Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control" value="0">
                            </div>
                           </div>
                        </div>

                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="text" name="cantidad" class="form-control" id="cantidad">
                        </div>

                        <div class="form-group">
                            <label for="">Monto Total</label>
                            <input type="text" name="total_venta" class="form-control" id="total_venta">
                        </div>

                        <div class="form-group">
                            <label for="">Metodo de pago</label>
                            <select name="metodo_id" class="form-control js-example-basic-single">
                                @foreach ($metodos_pago as $metodo)
                                    <option value="{{ $metodo->id }}"> {{ $metodo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Registrar Venta</button>
                            <a href="{{ route('venta.index') }}" class="btn btn-info btn-sm">Lista de ventas</a>
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

    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2({
                placeholder: 'Select an option'
            });


            $('#producto').on('change', () => {

                var valor_id = $("#producto option:selected").val();
                let _url = `/productoPrice/${valor_id}`;
                let _token = "{{ csrf_token() }}";

                // console.log(valor_id);
                $.ajax({
                    type: "GET",
                    url: _url,
                    data: { _token: _token },
                    dataType: "json",
                    success: function(result) {

                        if(result){
                            $('#precio').val(result.precio);
                        }
                    }
                });

            });

            
            //calcular onchage
            $('#cantidad').on('change', () => {
                let cantidad = $('#cantidad').val();
                let precio = $('#precio').val();
                let total_venta = cantidad * precio;
                $('#total_venta').val(total_venta);
            });


        });
    </script>

@stop
