@extends('layouts.master')
@section('content')
<div class="content mt-4">
    <h1>Conferencias Agendadas</h1>
    <div class="container-fluid">
        <a href="{{route('conferenceSchedules.create')}}"> <button class="btn btn-success"><i class="fa fa-plus    "></i></button></a>
        <table class="table table-hover" id="table">
            <thead>

                <tr>
                    <th>Conferencia Agendada</th>
                    <th>Empresa</th>
                    <th>Relacionista</th>
                    <th>Conferencista</th>
                    <th>Activa</th>
                    <th>Acciones</th>
                </tr>

            </thead>
            <tbody>
                @foreach( $conferenceSchedules as $conferenceSchedule)
                <tr>
                    <td>{{$conferenceSchedule->conferencia()->first()->name}}</td>
                    <td>{{$conferenceSchedule->empresa()->first()->name}}</td>

                    @if($conferenceSchedule->empresa()->first()->relacionista()->first() !=null)
                        <td>{{$conferenceSchedule->empresa()->first()->relacionista()->first()->name}}</td>
                        @else
                        <td></td>
                        @endif
                    @if($conferenceSchedule->conferencista()->first() !=null)
                        <td>{{$conferenceSchedule->conferencista()->first()->name}}</td>
                        @else
                        <td></td>
                        @endif

                    <td>@if($conferenceSchedule->state == 1)
                            <h4><span class="badge badge-success"> Sí</span></h4>
                           @else
                            <h4><span class="badge badge-danger">No</span></h4>
                            @endif
                        </td>

                    <td>
                        <form action="{{route('conferenceSchedules.destroy', $conferenceSchedule)}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{route('conferenceSchedules.show', $conferenceSchedule)}}"> <i class="fa fa-eye"></i></a>
                            <button class="btn" type="submit"><i class="fa fa-trash" style="color:red"></i></button>
                            {{--<input type="submit" value="Eliminar" class="btn btn-link form-inline">--}}
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('styles')
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('scripts')
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable();

    });

</script>
@endsection
