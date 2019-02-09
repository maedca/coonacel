@extends('layouts.master')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-2">Editar Relacionista - {{$relacionista->name}}</h1>
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
                    <form action="{{route('relacionistas.update',$relacionista)}}" method="post">
                        {{csrf_field()}}
                        @method('put')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control form-control-sm" id="nombre"
                                       placeholder="Nombre " name="name" value="{{old('name',$relacionista->name)}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nit">Cedula</label>
                                <input type="text" class="form-control form-control-sm" id="nit" placeholder="CI"
                                       name="ci" value="{{old('ci', $relacionista->ci)}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="web">Correo</label>
                                <input type="email" class="form-control form-control-sm" id="web" placeholder="Email"
                                       name="email" value="{{old('email', $relacionista->email)}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="industria">Telefono</label>
                                <input type="text" class="form-control form-control-sm" id="web" placeholder="Teléfono"
                                       name="phone" value="{{old('phone', $relacionista->phone)}}">

                            </div>

                        </div>




                        <button type="submit" class="btn btn-primary">Gurardar</button>
                    </form>
                </div>
        </div>

@endsection