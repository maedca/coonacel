@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-2">Programación de Conferencia</h1>
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
                    <form action="{{route('conferenceSchedules.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fecha_registro">Día de Programación</label>
                                <input type="text" class="form-control form-control-sm" id="fecha_registro"
                                       name="fecha_registro" value="{{today()}}" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="conferencia">Conferencia</label>
                                <select name="conferencia_id" id="" class="form-control form-control-sm select2">
                                    <option value="" selected>Seleccione</option>
                                    @foreach($conferencias as $conferencia)
                                        <option value="{{$conferencia->id}}">{{$conferencia->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="empresa">Empresa</label>
                                <select name="empresa_id" id="" class="form-control form-control-sm select2">
                                    <option value="" selected>Seleccione</option>
                                    @foreach($empresas as $empresa)
                                        <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">


                            <div class="form-group col-md-4">
                                <label for="course_date">Fecha Capacitación</label>
                                <input type="date" class="form-control form-control-sm" id="calle" name="course_date">
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



                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="morning_assistant">Asistentes Mañana</label>
                                <input type="text" class="form-control form-control-sm" id="morning_assistant"
                                       name="morning_assistant">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="morning_time">Hora Mañana</label>
                                <input type="time" class="form-control form-control-sm" id="morning_time"
                                       name="morning_time">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="afternoon_assistant">Asistentes Tarde</label>
                                <input type="text" class="form-control form-control-sm" id="afternoon_assistant"
                                       name="afternoon_assistant">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="afternoon_time">Hora Tarde</label>
                                <input type="time" class="form-control form-control-sm" id="afternoon_time"
                                       name="afternoon_time">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="night_assistant">Asistentes noche</label>
                                <input type="text" class="form-control form-control-sm" id="night_assistant"
                                       name="night_assistant">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="night_time">Hora Noche</label>
                                <input type="time" class="form-control form-control-sm" id="night_time"
                                       name="night_time">
                            </div>
                        </div>
                        <div class="form-row">
                            {{--<div class="form-group col-md-4">--}}
                                {{--<label for="night_assistant">Asistentes Noche</label>--}}
                                {{--<input type="text" id="night_assistant" name="night_assistant"--}}
                                       {{--class="form-control-sm form-control">--}}
                            {{--</div>--}}
                            <div class="form-group col-md-4">
                                <label for="VideoBeam">Uso de Video Beam</label>
                                <select name="videoBeam" id="" class="form-control form-control-sm">

                                        <option value="" selected>Selecciona una Opcion</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>

                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Gurardar</button>
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
    </script>
@endsection
