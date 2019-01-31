@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-2">Crear Relacionista</h1>
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
                    <form action="/relacionistas" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control form-control-sm" id="nombre"
                                       placeholder="Nombre " name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nit">Cedula</label>
                                <input type="text" class="form-control form-control-sm" id="nit" placeholder="CI"
                                       name="ci" value="{{old('ci')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="web">Correo</label>
                                <input type="email" class="form-control form-control-sm" id="web" placeholder="Email"
                                       name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="industria">Telefono</label>
                                <input type="text" class="form-control form-control-sm" id="web" placeholder="Teléfono"
                                       name="phone" value="{{old('phone')}}">

                            </div>

                        </div>




                        <button type="submit" class="btn btn-primary">Gurardar</button>
                    </form>
                </div>
        </div>

@endsection