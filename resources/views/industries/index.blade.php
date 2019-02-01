@extends('layouts.master')

@section('content')
    <div class="content mt-4">
        <div class="container-fluid">
            <a href="{{route('industries.create')}}"> <button class="btn btn-success"><i class="fa fa-plus    "></i></button></a>
            <br>
            <br>
            <table class="table table-hover" id="table" >
                <thead>

                <tr>
                    <th>Industria</th>
                    <th>Acciones</th>
                </tr>

                </thead>
                <tbody>
                @foreach( $industries as $industry)
                    <tr>

                        <td>{{$industry->name}}</td>


                        <td>
                            <form action="{{route('industries.destroy', $industry)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('industries.edit', $industry)}}"><i class="fa fa-edit"></i></a>
                                {{--<input type="submit" value="" class="btn btn-link form-inline">--}}
                                <button class="btn" type="submit"><i class="fa fa-trash" style="color: red"> </i></button>
                            </form>
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