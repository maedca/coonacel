@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        @if (request()->has('pedido'))
        <h1 class="mt-2">Pedido</h1>

        @else
        <h1 class="mt-2">Libranza</h1>
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
            @if (request()->has('pedido'))
            <form action="{{route('libra.store','pedido')}}" method="post" enctype="multipart/form-data">

                @else
                <form action="{{route('libra.store')}}" method="post" enctype="multipart/form-data">
                    @endif
                    {{csrf_field()}}
                    <input type="hidden" name="conferencista_id" id="conferencista_id">
                    <div class="row">
                        <div class="form-group col-md-4">
                            @if (request()->has('pedido'))
                            <label for="nro_libranza">Nro. Pedido</label>
                            @else
                            <label for="nro_libranza">Nro. Libranza</label>

                            @endif
                            <input type="number" class="form-control form-control-sm" id="nro_libranza" name="nro_libranza"
                                value="{{old('nro_libranza')}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Nombre y Apellido</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{old('name')}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cc">C.C</label>
                            <input type="text" name="cc" class="form-control form-control-sm" value="{{old('cc')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" class="form-control form-control-sm" value="{{old('address')}}">
                        </div>
                    </div>
                    <div class="form-row">


                        <div class="form-group col-md-3">
                            <label for="neighborhood">Barrio</label>
                            <input type="text" class="form-control form-control-sm" id="neighborhood" name="neighborhood"
                                value="{{old('neighborhood')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="city">Ciudad</label>
                            <input type="text" class="form-control form-control-sm" id="city" name="city" value="{{old('city')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone">Teléfono</label>
                            <input type="text" class="form-control form-control-sm" id="city" name="phone" value="{{old('phone')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control-sm form-control" value="{{old('email')}}">
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
                            <input type="text" id="empresa" name="empresa" class="form-control-sm form-control"
                                readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="conferencia">Conferencia</label>
                            <select name="conferencia" id="conferencia" class="form-control">
                                <option value="">Seleccione una conferencia</option>
                                @foreach($conferencias as $conferencia)
                                <option value="{{$conferencia->id}}">{{$conferencia->conferencia->name}}
                                    [{{$conferencia->empresa->name}}]
                                </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="phone">Teléfono Fijo</label>
                            <input type="text" id="phone" name="phone_f" class="form-control-sm form-control" value="{{old('phone')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cellphone">Celular</label>
                            <input type="text" id="cellphone" name="cellphone" class="form-control-sm form-control"
                                value="{{old('cellphone')}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="empresa_adress">Direccion empresa</label>
                            <input type="text" id="empresa_address" name="empresa_address" class="form-control-sm form-control"
                                value="{{old('empresa_address')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="charge">Cargo</label>
                            <input type="text" id="charge" name="charge" class="form-control-sm form-control" value="{{old('charge')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="birthday">Fecha de nacimiento</label>
                            <input type="date" id="birthday" name="birthday" class="form-control-sm form-control" value="{{old('birthday')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="entrega">Entrega en</label>
                            <select name="entrega" id="" class="form-control form-control-sm">

                                <option value="" selected>Selecciona una Opcion</option>
                                <option value="1">Casa</option>
                                <option value="0">Empresa</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="receiver_name">Nombre quien recibe mercancia</label>
                            <input type="text" id="receiver_name" name="receiver_name" class="form-control-sm form-control"
                                value="{{old('receiver_name')}}">
                        </div>
                    </div>
                    <h3>Referencias</h3>
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="referal_name1">Nombre</label>
                            <input type="text" id="referal_name1" name="referal_name1" class="form-control-sm form-control"
                                value="{{old('referal_name1')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="referal_ptco1">Parentesco</label>
                            <input type="text" id="referal_ptco1" name="referal_ptco1" class="form-control-sm form-control"
                                value="{{old('referal_ptco1')}}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="referal_ofi_phone1">Telefono de oficina</label>
                            <input type="number" id="referal_ofi_phone1" name="referal_ofi_phone1" class="form-control-sm form-control"
                                value="{{old('referal_ofi_phone1')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="referal_res_phone1">Telefono de residencia</label>
                            <input type="text" id="referal_res_phone1" name="referal_res_phone1" class="form-control-sm form-control"
                                value="{{old('referal_res_phone1')}}">
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="referal_name">Nombre</label>
                            <input type="text" id="referal_name2" name="referal_name2" class="form-control-sm form-control"
                                value="{{old('referal_name2')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="referal_ptco2">Parentesco</label>
                            <input type="text" id="referal_ptco2" name="referal_ptco2" class="form-control-sm form-control"
                                value="{{old('referal_ptco2')}}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="referal_ofi_phone1">Telefono de oficina</label>
                            <input type="number" id="referal_ofi_phone2" name="referal_ofi_phone2" class="form-control-sm form-control"
                                value="{{old('referal_ofi_phone2')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="referal_res_phone2">Telefono de residencia</label>
                            <input type="text" id="referal_res_phone2" name="referal_res_phone2" class="form-control-sm form-control"
                                value="{{old('referal_res_phone2')}}">
                        </div>

                    </div>
                    <h3>Obras</h3>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="collection_1">Coleccion</label>
                            <select name="collection_1" id="" class="form-control form-control-sm select2">
                                <option value="" selected>Selecciona una Coleccion</option>
                                @foreach($books as $book)
                                <option value="{{$book->name}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price_1">Precio</label>
                            <input type="number" id="price_1" name="price_1" class="form-control-sm form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pin_1">Pin</label>
                            <input type="number" id="pin_1" name="pin_1" class="form-control-sm form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="collection_2">Coleccion</label>
                            <select name="collection_2" id="" class="form-control form-control-sm select2">
                                <option value="" selected>Selecciona una Coleccion</option>
                                @foreach($books as $book)
                                <option value="{{$book->name}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price_2">Precio</label>
                            <input type="number" id="price_2" name="price_2" class="form-control-sm form-control" value="{{old('price_2')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pin_2">Pin</label>
                            <input type="number" id="pin_2" name="pin_2" class="form-control-sm form-control">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="collection_3">Coleccion</label>
                            <select name="collection_3" id="" class="form-control form-control-sm select2">
                                <option value="" selected>Selecciona una Coleccion</option>
                                @foreach($books as $book)
                                <option value="{{$book->name}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price_3">Precio</label>
                            <input type="number" id="price_3" name="price_3" class="form-control-sm form-control" value="{{old('price_3')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pin_3">Pin</label>
                            <input type="number" id="pin_3" name="pin_3" class="form-control-sm form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="collection_4">Coleccion</label>
                            <select name="collection_4" id="" class="form-control form-control-sm select2">
                                <option value="" selected>Selecciona una Coleccion</option>
                                @foreach($books as $book)
                                <option value="{{$book->name}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price_4">Precio</label>
                            <input type="number" id="price_4" name="price_4" class="form-control-sm form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pin_4">Pin</label>
                            <input type="number" id="pin_4" name="pin_4" class="form-control-sm form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="collection_5">Coleccion</label>
                            <select name="collection_5" id="" class="form-control form-control-sm select2">
                                <option value="" selected>Selecciona una Coleccion</option>
                                @foreach($books as $book)
                                <option value="{{$book->name}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price_5">Precio</label>
                            <input type="number" id="price_5" name="price_5" class="form-control-sm form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pin_5">Pin</label>
                            <input type="number" id="pin_5" name="pin_5" class="form-control-sm form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="collection_6">Coleccion</label>
                            <select name="collection_6" id="" class="form-control form-control-sm select2">
                                <option value="" selected>Selecciona una Coleccion</option>
                                @foreach($books as $book)
                                <option value="{{$book->name}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price_6">Precio</label>
                            <input type="number" id="price_6" name="price_6" class="form-control-sm form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pin_6">Pin</label>
                            <input type="number" id="pin_6" name="pin_6" class="form-control-sm form-control">
                        </div>
                    </div>
                    {{--<div class="form-row">--}}
                    {{--<div class="col-md-4"></div>--}}
                    {{--<div class="form-group input-group col-md-3">--}}
                    {{--<label for="total">Total &nbsp</label>--}}
                    {{--<input type="text" id="total" name="total"--}}
                    {{--class="form-control-sm form-control-plaintext" readonly>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="cuotas">Nro. Cuotas</label>
                            <input type="text" id="cuotas" name="cuotas" class="form-control-sm form-control" value="{{old('cutoas')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="vr_cuotas">Vr. Cuotas</label>
                            <input type="text" id="vr_cuotas" name="vr_cuotas" class="form-control-sm form-control"
                                value="{{old('vr_cuotas')}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="plazo">Plazos</label>
                            <input type="text" id="plazo" name="plazo" class="form-control-sm form-control" value="{{old('plazos')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="relacionista">Relacionista</label>
                            <input type="text" id="relacionista" name="relacionista" class="form-control-sm form-control"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="conferencista">Conferencista</label>
                            <input type="text" id="conferencista" name="conferencista" class="form-control-sm form-control"
                                readonly>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="file">Subir archivo</label>
                            <input type="file" id="file" name="file" class="">
                        </div>

                    </div>
                    @if(auth()->user()->role == 'logistica' || auth()->user()->role == 'master')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="observation">Observación</label>
                            <textarea name="observation" id="" cols="30" rows="10"></textarea>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="analyst_status">Estatus</label>
                            <select name="analyst_status" id="">
                                <option value="Cliente no contactado">Cliente no contactado</option>
                                <option value="Cliente no desea tomar">Cliente no desea tomar</option>
                                <option value="Referencias no aprobadas">Referencias no aprobadas</option>
                                <option value="Pedido mal diligenciado">Pedido mal diligenciado</option>
                                <option value="Conferencista cancela pedido">Conferencista cancela pedido</option>
                                <option value="Documentacion incompleta">Documentacion incompleta</option>
                                <option value="Referenciacion aprobada">Referenciacion aprobada</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status_fact">Estatus</label>
                            <select name="status_fact" id="">
                                <option value="1">Facturado</option>
                                <option value="0">Mo facturado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Estatus de Referenciacion</label>
                            <select name="status" id="">
                                <option value="Refernciacion Aprobada">Refernciacion Aprobada</option>
                                <option value="Refernciacion Aprobada">Refernciacion No Aprobada</option>
                            </select>
                        </div>


                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
