@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        @if (request()->has('pedido'))
        <h1 class="mt-2">Pedido {{ $libra->nro_libranza }}</h1>
        @else
        <h1 class="mt-2">Libranza {{ $libra->nro_libranza }}</h1>
        @endif
        @if($errors->any())

        <div class="container is-fluid box is-radiusless">

            <p><strong>
                    Corrige estos errores para continuar
                </strong></p>
            <ul>
                @foreach($errors->all() as $errors)
                <li>{{ $errors }}</li>
                @endforeach
            </ul>

        </div>
        @endif


        @if (request()->has('pedido'))
        <form action="{{ url('libra/'. $libra->id . '?pedido') }}" method="POST">

            @else
            <form action="{{ route('libra.update',$libra) }}" method="POST">

                @endif

                @csrf
                @method('PUT')

                @if(auth()->user()->role == 'logistica' || auth()->user()->role == 'master')
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="analyst_status">Estatus de analista</label>
                        <select name="analyst_status" id="" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="1" @if ($libra->analyst_status == '1')
                                selected
                                @endif>Cliente no contactado</option>
                            <option value="2" @if ($libra->analyst_status == "2")
                                selected
                                @endif>Cliente no lo desea tomar</option>
                            <option value="3" @if ($libra->analyst_status == "3")
                                selected
                                @endif>Referencias no aprobadas</option>
                            <option value="4" @if ($libra->analyst_status == "4")
                                selected
                                @endif>Referencias aprobadas</option>
                            <option value="5" @if ($libra->analyst_status == "5")
                                selected
                                @endif>Pedido mal diligenciado</option>
                            <option value="6" @if ($libra->analyst_status == "6")
                                selected
                                @endif>Conferencista cancela pedido</option>
                            <option value="7" @if ($libra->analyst_status == "7")
                                selected
                                @endif>Documentacion incompleta</option>
                            <option value="8" @if ($libra->analyst_status == "8")
                                selected
                                @endif>Referenciacion aprobada</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status_fact">Estatus de facturacion</label>
                        <select name="status_fact" id="" class="form-control">

                            <option value="1" @if ($libra->status_fact == 1)
                                selected
                                @endif>Facturado</option>
                            <option value="0" @if ($libra->status_fact == 0)
                                selected
                                @endif>No facturado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status">Estatus de Referenciacion</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="1" @if ($libra->status == '1')
                                selected
                                @endif>Referenciacion Aprobada</option>
                            <option value="2" @if ($libra->status == '2')
                                selected
                                @endif>Referenciacion No Aprobada</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="observation">Observación</label>
                        <textarea name="observation" id="" class="form-control" cols="5" rows="5"> {{ old('observation',$libra->observation) }}</textarea>

                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-11"></div>
                    <div class="col-md-1"> <button type="submit" class="btn btn-primary">Guardar</button></div>
                </div>

            </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

    $(function () {
        $('#conferencia').on('change', function () {
            var id = $('#conferencia').val();
            var client_name_options;
            // var url = 'api/sunat';
            $.ajax({
                type: 'GET',
                url: '/searchConferencia',
                data: 'id=' + id,
                success: function (datos) {
                    var datos = eval(datos);
                    var nada = 'nada';
                    if (datos[0] == nada) {
                        alert('Conferencia no válida');
                    } else {
                        //console.log(datos);

                        $('#conferencista_id').val(datos.conferencista_id);
                        $('#conferencista').val(datos.conferencista);
                        $('#relacionista').val(datos.relacionista);
                        $('#empresa').val(datos.empresa);
                        //  $('#client_email').val(datos[1]);
                        //  $('#client_adress').val(datos[2]);
                        // $('#client_name').val(datos[0]);
                        //   client_name_options += '<option value="' + datos[0] +
                        //     '">' +
                        //   datos[0] + '</option>';
                        // $('#client_name').html(client_name_options);
                    }
                }
            });
            return false;
        });
    });

</script>

@endsection
