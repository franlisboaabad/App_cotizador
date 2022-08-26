@extends('adminlte::page')

@section('title', 'Editar venta')
@section('plugins.Select2', true)
@section('content_header')
    {{-- codigo --}}
@endsection

@section('content')
    <div class="row pt-3">

        <div class="col-md-6">

            <h3>Editar venta</h3>
            <div class="card">
                <div class="card-body">

                   @include('partials.validacion')

                    <form action="{{ route('venta.update', $venta) }}" method="POST">


                        <div class="form-group">
                            <label for="">Seleccionar cliente</label>
                            <select name="cliente_id" class="form-control js-example-basic-single">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ $cliente->id == $venta->cliente_id ? ' selected="selected"' : '' }}>
                                        {{ $cliente->nombre }} - {{ $cliente->apellidos }}
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
                                            <option value="{{ $producto->id }}" {{ $producto->id == $venta->producto_id ? ' selected="selected"' : '' }} > {{ $producto->nombre }} - stock
                                                {{ $producto->stock }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Precio</label>
                                    <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio', $venta->precio ) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="text" name="cantidad" class="form-control" id="cantidad"
                                value="{{ old('cantidad', $venta->cantidad) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Monto Total</label>
                            <input type="text" name="total_venta" class="form-control" id="total_venta"
                                value="{{ old('total_venta', $venta->total_venta) }}">
                        </div>

                        <div class="form-group">
                            <label for="">Tipo de pago</label>
                            <select name="metodo_id" class="form-control js-example-basic-single">
                                @foreach ($metodos_pago as $metodo)
                                    <option value="{{ $metodo->id }}" {{ $metodo->id == $venta->metodo_id ? 'selected="selected"' : '' }}  > {{ $metodo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm"  onclick="return confirm('¿Está seguro de actualizar los datos?')" >Editar Venta</button>
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
                    data: {
                        _token: _token
                    },
                    dataType: "json",
                    success: function(result) {

                        if (result) {
                            $('#precio').val(result.precio);
                            cantidad_precio();
                        }
                    }
                });

            });


            //calcular onchage
            $('#cantidad').on('change', () => {
                cantidad_precio();
            });

            function cantidad_precio() {

                let cantidad = $('#cantidad').val();
                let precio = $('#precio').val();
                let total_venta = cantidad * precio;
                $('#total_venta').val(total_venta);

            }


        });
    </script>

@stop
