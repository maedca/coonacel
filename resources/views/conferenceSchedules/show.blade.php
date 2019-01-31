@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-2">Detalles de la Conferencia {{$conferenceSchedule->conferencia()->first()->name}}</h1>
            <a href="{{route('conferenceSchedules.edit' , $conferenceSchedule)}}"> <button class="btn btn-success"><i class="fa fa-edit    "></i></button></a>
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
                                       name="fecha_registro" value="{{\Carbon\Carbon::parse($conferenceSchedule->created_at)->format('l j F Y') }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="industry">Fecha Registro</label>
                                <input type="text" class="form-control form-control-sm" id="industry"
                                       name="industry" value="{{$conferenceSchedule->empresa()->first()->industry()->first()->name}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="conferencia">Conferencia</label>
                                <input type="text" class="form-control form-control-sm" id="conferencia"
                                       name="conferencia" value="{{$conferenceSchedule->conferencia()->first()->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Empresa">Empresa</label>
                                <input type="text" class="form-control form-control-sm" id="empresa"
                                       name="empresa" value="{{$conferenceSchedule->empresa()->first()->name}}" readonly>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="contacto_1">Contacto 1</label>
                                <input type="text" class="form-control form-control-sm" id="contacto_1"
                                       name="empresa" value="{{$conferenceSchedule->empresa()->first()->contacto_1}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cargo_1">Cargo 1</label>
                                <input type="text" class="form-control form-control-sm" id="cargo_1"
                                       name="cargo_1" value="{{$conferenceSchedule->empresa()->first()->cargo_1}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tel_1">Teléfono 1</label>
                                <input type="text" class="form-control form-control-sm" id="tel_1"
                                       name="tel_1" value="{{$conferenceSchedule->empresa()->first()->tel_1}}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="contacto_2">Contacto 2</label>
                                <input type="text" class="form-control form-control-sm" id="contacto_2"
                                       name="contacto_2" value="{{$conferenceSchedule->empresa()->first()->contacto_2}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cargo_2">Cargo 2</label>
                                <input type="text" class="form-control form-control-sm" id="cargo_2"
                                       name="cargo_2" value="{{$conferenceSchedule->empresa()->first()->cargo_2}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tel_2">Teléfono 2</label>
                                <input type="text" class="form-control form-control-sm" id="tel_2"
                                       name="tel_2" value="{{$conferenceSchedule->empresa()->first()->tel_2}}" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="calle">Direccion</label>
                                <input type="text" class="form-control form-control-sm" id="calle" name="calle" value="{{$conferenceSchedule->empresa()->first()->calle}}" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" class="form-control form-control-sm" id="ciudad"
                                       name="ciudad" value="{{$conferenceSchedule->empresa()->first()->ciudad}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control form-control-sm" id="celular"
                                       name="celular" value="{{$conferenceSchedule->empresa()->first()->tel_ofi}}" readonly>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="course_date">Fecha Capacitación</label>
                                <input type="text" id="course_date" name="course_date"
                                       class="form-control-sm form-control" readonly value="{{\Carbon\Carbon::parse($conferenceSchedule->course_date)->format('l j F Y')}}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="VideoBeam">Uso de Video Beam</label>
                                @if($conferenceSchedule->videoBeam == 1)
                                    <input type="text" id="videoBeam" name="videoBeam"
                                           class="form-control-sm form-control" value="Sí" readonly>
                                @else
                                    <input type="text" id="videoBeam" name="videoBeam"
                                           class="form-control-sm form-control" value="No" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            @if($conferenceSchedule->night_assitant == null)
                                @else
                                <div class="form-group col-md-4">
                                    <label for="night_assistant">Asistentes Noche</label>
                                    <input type="text" id="night_assistant" name="night_assistant"
                                           class="form-control-sm form-control" readonly value="{{$conferenceSchedule->night_assistant}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="night_time">Hora Noche</label>
                                    <input type="text" id="night_time" name="night_time"
                                           class="form-control-sm form-control" readonly value="{{$conferenceSchedule->night_time}}">
                                </div>
                                @endif

                        </div>
                        <div class="form-row">

                            @if($conferenceSchedule->morning_assistant == null)
                                @else
                                <div class="form-group col-md-4">
                                    <label for="morning_assistant">Asistentes Mañana</label>
                                    <input type="text" id="morning_assistant" name="morning_assistant"
                                           class="form-control-sm form-control" readonly value="{{$conferenceSchedule->morning_assistant}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="night_time">Hora Mañana</label>
                                    <input type="text" id="morning_time" name="morning_time"
                                           class="form-control-sm form-control" readonly value="{{$conferenceSchedule->morning_time}}">
                                </div>
                                @endif

                        </div>
                        <div class="form-row">
                            @if($conferenceSchedule->night_assistant == null)
                                @else
                                <div class="form-group col-md-4">
                                    <label for="night_assistant">Asistentes Noche</label>
                                    <input type="text" id="night_assistant" name="night_assistant"
                                           class="form-control-sm form-control" readonly value="{{$conferenceSchedule->night_assistant}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="night_time">Hora Noche</label>
                                    <input type="text" id="night_time" name="night_time"
                                           class="form-control-sm form-control" readonly value="{{$conferenceSchedule->night_time}}">
                                </div>
                                @endif

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="relacionista_id">Relacionista</label>
                                <input type="text" id="relacionista_id" name="relacionista_id"
                                       class="form-control-sm form-control" readonly value="{{$conferenceSchedule->empresa()->first()->relacionista()->first()->name}}">
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
