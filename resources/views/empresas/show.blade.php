@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">

        <h1 class="mt-2">Empresa - {{$empresa->name}}</h1>
        <a href="{{route('Empresas.edit', $empresa->id)}}"> <button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
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
            <form action="" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="nombre" placeholder="Nombre de la Empresa"
                            name="name" value="{{$empresa->name}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nit">Nit</label>
                        <input type="text" class="form-control form-control-sm" id="nit" placeholder="NIT" name="nit"
                            value="{{$empresa->nit}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="web">Web</label>
                        <input type="url" class="form-control form-control-sm" id="web" placeholder="Web" name="url"
                            value="{{$empresa->url}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="industria">Industria</label>
                        {{--<select id="industria" class="form-control form-control-sm" name="industria">--}}
                        {{--<option selected>Choose...</option>--}}
                        {{--<option value="industria1">industria 1</option>--}}
                        {{--</select>--}}
                        <input type="text" class="form-control form-control-sm" id="web" placeholder="Web" name="url"
                            value="{{$empresa->industry->name}}" readonly>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="empleados">Empleados</label>
                        <input type="text" class="form-control form-control-sm" id="empleados" placeholder="Número de empleados"
                            name="empleados" value="{{$empresa->empleados}}" readonly>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tel_ofi">Tel. Oficina</label>
                        <input type="tel" class="form-control form-control-sm" id="tel_ofi" placeholder="Teléfono de oficina"
                            name="tel_ofi" value="{{$empresa->tel_ofi}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cel">Celular</label>
                        <input type="cel" class="form-control form-control-sm" id="cel" placeholder="Teléfono Celular"
                            name="cel" value="{{$empresa->cel}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="contacto_1">Contacto 1</label>
                        <input type="contacto_1" class="form-control form-control-sm" id="contacto_1" placeholder=""
                            name="contacto_1" value="{{$empresa->contacto_1}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cargo_1">Cargo 1</label>
                        <input type="cargo_1" class="form-control form-control-sm" id="cargo_1" placeholder="" name="cargo_1"
                            value="{{$empresa->cargo_1}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tel_1">Teléfono 1</label>
                        <input type="tel_1" class="form-control form-control-sm" id="tel_1" placeholder="" name="tel_1"
                            value="{{$empresa->tel_1}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="contacto_2">Contacto 2</label>
                        <input type="contacto_2" class="form-control form-control-sm" id="contacto_2" placeholder=""
                            name="contacto_2" value="{{$empresa->contacto_2}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cargo_2">Cargo 2</label>
                        <input type="cargo_2" class="form-control form-control-sm" id="cargo_2" placeholder="" name="cargo_2"
                            value="{{$empresa->cargo_2}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tel_2">Teléfono 2</label>
                        <input type="tel_2" class="form-control form-control-sm" id="tel_2" placeholder="" name="tel_2"
                            value="{{$empresa->tel_2}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{$empresa->email}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control form-control-sm" id="descripcion" rows="3" name="descripcion"
                            readonly>{{$empresa->descripcion}}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="calle">Calle</label>
                        <input type="text" class="form-control form-control-sm" id="calle" name="calle" value="{{$empresa->calle}}"
                            readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control form-control-sm" id="ciudad" name="ciudad" value="{{$empresa->ciudad}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="municipio">Municipio</label>
                        <input type="text" class="form-control form-control-sm" id="municipio" name="municipio" value="{{$empresa->municipio}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="barrio">Barrio</label>
                        <input type="text" id="barrio" name="barrio" class="form-control-sm form-control" value="{{$empresa->barrio}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pais">pais</label>
                        <input type="text" id="pais" name="pais" class="form-control-sm form-control" value="{{$empresa->pais}}"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pais">Relacionista</label>
                        <input type="text" id="relacionista_id" name="relacionista_id" class="form-control-sm form-control"
                            value="{{$empresa->relacionista->name}}" readonly>
                        {{--<select name="relacionista" id="" class="form-control form-control-sm">--}}
                        {{--@foreach($relacionistas as $relacionista)--}}
                        {{--<option value="{{$relacionista->id}}">{{$relacionista->name}}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Gurardar</button>
            </form>
        </div>
    </div>

    @endsection
