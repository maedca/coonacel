@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-2">Crear Colección</h1>
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
                    <form action="{{route('books.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">Nombre de la Colección</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                       placeholder="Nombre " name="name" value="{{old('name')}}">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Gurardar</button>
                    </form>
                </div>
        </div>
    </div>

@endsection