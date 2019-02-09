@extends('layouts.master')

@section('content')
    <div class="content mt-4">
        <div class="container-fluid">
            <a href="{{route('conferencistas.create')}}"> <button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
            <br>
            <br>
            <table class="table table-hover" id="table" >
                <thead>
                
                <tr>
                    <th>Conferencista</th>
                    <th>Cedula</th>

                    <th>tel </th>
                    <th>email</th>
                    <th>Acciones</th>
                </tr>

                </thead>
                <tbody>
                @foreach( $conferencistas as $conferencista)
                    <tr>

                        <td>{{$conferencista->name}}</td>
                        <td>{{$conferencista->ci}}</td>
                        <td>{{$conferencista->phone}}</td>
                        <td>{{$conferencista->email}}</td>

                        <td><a href="{{route('conferencistas.edit', $conferencista)}}"> Editar</a>|
                            <form action="{{route('conferencistas.destroy', $conferencista)}}" method="post">
                              @csrf
                                @method('delete')
                                <input type="submit" value="Eliminar" class="btn btn-link form-inline">
                            </form></td>
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
            $('#table').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
            });

        });
    </script>
@endsection