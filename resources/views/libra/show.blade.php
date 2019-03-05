@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        @if (request()->has('pedido'))
        <h1 class="mt-2">Pedido</h1>

        @else
        <h1 class="mt-2">Libranza</h1>
        @endif

        @if (auth()->user()->role == 'master' ||auth()->user()->role == 'logistica')

        @if (request()->has('pedido'))
        <a href="{{ url('libra/'.$libra->id . '/edit?pedido') }}"> <button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
        @else
        <a href="{{route('libra.edit', $libra->id)}}"> <button class="btn btn-success"><i class="fa fa-edit"></i></button></a>

        @endif
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
            @endif
            <form action="{{route('libra.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <div class="form-group col-md-4">
                        @if (request()->has('pedido'))
                        <label for="nro_libranza">Nro. Pedido</label>

                        @else
                        <label for="nro_libranza">Nro. Libranza</label>
                        @endif
                        <input type="number" class="form-control form-control-sm" id="nro_libranza" name="nro_libranza"
                            value="{{old('nro_libranza', $libra->nro_libranza)}}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Nombre y Apellido</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{old('name', $libra->name)}}"
                            readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="cc">C.C</label>
                        <input type="text" name="cc" class="form-control form-control-sm" value="{{old('cc', $libra->cc)}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">Direccion</label>
                        <input readonly type="text" name="address" class="form-control form-control-sm" value="{{old('address', $libra->address)}}">
                    </div>
                </div>
                <div class="form-row">


                    <div class="form-group col-md-3">
                        <label for="neighborhood">Barrio</label>
                        <input type="text" class="form-control form-control-sm" id="neighborhood" name="neighborhood"
                            value="{{old('neighborhood', $libra->neighborhood)}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control form-control-sm" id="city" name="city" value="{{old('city', $libra->city)}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control form-control-sm" id="city" name="phone" value="{{old('phone', $libra->phone)}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control-sm form-control" value="{{old('email', $libra->email)}}"
                            readonly>
                    </div>
                    {{--<div class="form-group col-md-4">--}}
                    {{--<label for="course_date">Conferencista</label>--}}
                    {{--<select name="conferencista_id" id="" class="form-control form-control-sm select2">--}}
                    {{--@foreach($conferencistas as $conferencista)--}}
                    {{--<option value="" selected>Selecciona uno</option>--}}
                    {{--<option value="{{$conferencista->id}}" >{{$conferencista->name}}</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--</div>--}}

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="empresa">Nombre Entidad</label>
                        <input type="text" id="empresa" name="empresa" class="form-control-sm form-control" value="{{old('empresa', $libra->empresa)}}"
                            readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="conferencia">Conferencia</label>
                        <input type="text" id="conferencia" name="conferencia" class="form-control-sm form-control"
                            readonly value="{{old('conferencia', $libra->conferencia)}}">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="phone">Teléfono Fijo</label>
                        <input type="text" id="phone" name="phone_f" class="form-control-sm form-control" value="{{old('phone_f', $libra->phone_f)}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cellphone">Celular</label>
                        <input type="text" id="cellphone" name="cellphone" class="form-control-sm form-control" value="{{old('cellphone', $libra->cellphone)}}"
                            readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="empresa_adress">Direccion empresa</label>
                        <input type="text" id="empresa_address" name="empresa_address" class="form-control-sm form-control"
                            value="{{old('empresa_address', $libra->empresa_address)}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="charge">Cargo</label>
                        <input type="text" id="charge" name="charge" class="form-control-sm form-control" value="{{old('charge', $libra->charge)}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="birthday">Fecha de nacimiento</label>
                        <input type="date" id="birthday" name="birthday" class="form-control-sm form-control" value="{{old('birthday', $libra->birthday)}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="entrega">Entrega en</label>
                        <input type="text" readonly value="{{old('entrega', $libra->entrega_name)}}" class="form-control-sm form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="receiver_name">Nombre quien recibe mercancia</label>
                        <input type="text" id="receiver_name" name="receiver_name" class="form-control-sm form-control"
                            value="{{old('receiver_name', $libra->receiver_name)}}" readonly>
                    </div>
                </div>
                <h3>Referencias</h3>
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="referal_name1">Nombre</label>
                        <input type="text" id="referal_name" name="referal_name" class="form-control-sm form-control"
                            value="{{old('referal_name1', $libra->referal_name1)}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="referal_ptco1">Parentesco</label>
                        <input type="text" id="referal_ptco1" name="referal_ptco1" class="form-control-sm form-control"
                            value="{{old('referal_ptco1', $libra->referal_ptco1)}}" readonly>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="referal_ofi_phone1">Telefono de oficina</label>
                        <input type="number" id="referal_ofi_phone1" name="referal_ofi_phone1" class="form-control-sm form-control"
                            value="{{old('referal_ofi_phone1', $libra->referal_ofi_phone1)}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="referal_res_phone1">Telefono de residencia</label>
                        <input type="text" id="referal_res_phone1" name="referal_res_phone1" class="form-control-sm form-control"
                            value="{{old('referal_res_phone1', $libra->referal_res_phone1)}}" readonly>
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="referal_name">Nombre</label>
                        <input type="text" id="referal_name2" name="referal_name2" class="form-control-sm form-control"
                            value="{{old('referal_name2', $libra->referal_name2)}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="referal_ptco2">Parentesco</label>
                        <input type="text" id="referal_ptco2" name="referal_ptco2" class="form-control-sm form-control"
                            value="{{old('referal_ptco2', $libra->referal_ptco2)}}" readonly>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="referal_ofi_phone1">Telefono de oficina</label>
                        <input type="number" id="referal_ofi_phone2" name="referal_ofi_phone2" class="form-control-sm form-control"
                            value="{{old('referal_ofi_phone2', $libra->referal_ofi_phone2)}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="referal_res_phone2">Telefono de residencia</label>
                        <input type="text" id="referal_res_phone2" name="referal_res_phone2" class="form-control-sm form-control"
                            value="{{old('referal_res_phone2', $libra->referal_res_phone2)}}" readonly>
                    </div>

                </div>
                <h3>Obras</h3>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collection_1">Coleccion</label>
                        <input type="text" id="collection_1" name="collection_1" class="form-control-sm form-control"
                            value="{{old('collection_1', $libra->collection_1)}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="VideoBeam">Precio</label>
                        <input type="number" id="price_1" name="price_1" class="form-control-sm form-control" value="{{old('price_1',$libra->price_1)}}"
                            readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collection_2">Coleccion</label>
                        <input type="text" id="collection_2" name="collection_2" class="form-control-sm form-control"
                            value="{{old('collection_2', $libra->collection_2)}}" readonly>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="price_2">Precio</label>
                        <input type="number" id="price_2" name="price_2" class="form-control-sm form-control" value="{{old('price_2',$libra->price_2)}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collection_3">Coleccion</label>
                        <input type="text" id="collection_3" name="collection_3" class="form-control-sm form-control"
                            value="{{old('collection_3', $libra->collection_3)}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price_3">Precio</label>
                        <input type="number" id="price_3" name="price_3" class="form-control-sm form-control" value="{{old('price_3',$libra->price_3)}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collection_4">Coleccion</label>
                        <input type="text" id="collection_4" name="colection_4" class="form-control-sm form-control"
                            value="{{old('collection_4', $libra->collection_4)}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price_4">Precio</label>
                        <input type="number" id="price_4" name="price_4" class="form-control-sm form-control" value="{{old('price_4',$libra->price_4)}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collection_5">Coleccion</label>
                        <input type="text" id="collection_5" name="collection_5" class="form-control-sm form-control"
                            value="{{old('collection_5', $libra->collection_5)}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price_5">Precio</label>
                        <input type="number" id="price_5" name="price_5" class="form-control-sm form-control" value="{{old('price_5',$libra->price_5)}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collection_6">Coleccion</label>
                        <input type="text" id="collection_6" name="collection_6" class="form-control-sm form-control"
                            value="{{old('collection_6', $libra->collection_6)}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price_6">Precio</label>
                        <input type="number" id="price_6" name="price_6" class="form-control-sm form-control" value="{{old('price_6',$libra->price_6)}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4"></div>
                    <div class="form-group input-group col-md-3">
                        <label for="total">Total &nbsp</label>
                        <input type="text" id="total" name="total" class="form-control-sm form-control-plaintext" value="{{$libra->total}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="cuotas">Nro. Cuotas</label>
                        <input type="text" id="cuotas" name="cuotas" class="form-control-sm form-control" value="{{old('coutoas',$libra->cuotas)}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="vr_cuotas">Vr. Cuotas</label>
                        <input type="text" id="vr_cuotas" name="vr_cuotas" class="form-control-sm form-control" value="{{old('vr_cuotas',$libra->vr_cuotas)}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="plazo">Plazos</label>
                        <input type="text" id="plazo" name="plazo" class="form-control-sm form-control" value="{{old('plazo',$libra->plazo)}}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="relacionista">Relacionista</label>
                        <input type="text" id="relacionista" name="relacionista" class="form-control-sm form-control"
                            value="{{$libra->relacionista}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="conferencista">Conferencista</label>
                        <input type="text" id="conferencista" name="conferencista" class="form-control-sm form-control"
                            value="{{$libra->conferencista}}" readonly>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        {{--<label for="file">Subir archivo</label>--}}
                        {{--<input type="file" id="file" name="file"--}}
                        {{--class="">--}}

                        <label for="file">Archivo</label>
                        <a href="{{ asset('libranza/'. $libra->file) }}" target="_blank">
                            Ver Archivo
                        </a>
                    </div>

                </div>

                {{--<button type="submit" class="btn btn-primary">Guardar</button>--}}
            </form>
        </div>
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
                        console.log(datos);

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
