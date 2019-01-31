@extends('layouts.master')
@section('content')
<div class="content mt-4">
    <div class="container-fluid">

        <table class="table table-hover" id="table">
            <thead>

                <tr>
                    <th>Conferencia Agendad</th>

                    <th>Acciones</th>
                </tr>

            </thead>
            <tbody>
                @foreach( $conferenceSchedules as $conferenceSchedule)
                <tr>

                    <td>{{$conferenceSchedule->conferencia()->first()->name}}</td>


                    <td>
                        <form action="{{route('conferencias.destroy', $conferenceSchedule)}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{route('conferencias.edit', $conferenceSchedule)}}"> <i class="fa fa-edit"></i></a>
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
