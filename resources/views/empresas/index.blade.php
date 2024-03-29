@extends('layouts.master')

@section('content')
    <div class="content mt-4">
        <div class="container-fluid">
            <a href="{{route('Empresas.create')}}"> <button class="btn btn-success"><i class="fa fa-plus    "></i></button></a>
            <br><br>
            <table class="table table-hover" id="table" >
                <thead>
                <tr>
                    <th>Empresa</th>
                    <th>nit</th>
                    <th>industria</th>
                    <th>tel Oficina</th>
                    <th>email</th>
                    <th>Acciones</th>
                </tr>

                </thead>
                <tbody>
                @foreach( $empresas as $empresa)
                    <tr>
                        <td>{{$empresa->name}}</td>
                        <td>{{$empresa->nit}}</td>
                        <td>{{$empresa->industry()->first()->name}}</td>
                        <td>{{$empresa->tel_ofi}}</td>
                        <td>{{$empresa->email}}</td>
                     <td><form action="{{route('Empresas.destroy', $empresa->id)}}" method="post">
                             @csrf
                             @method('delete')
                             <a href="{{route('Empresas.show', $empresa->id)}}"><i class="fa fa-eye"></i></a>
                             {{--<input type="submit" value="" class="btn btn-link form-inline">--}}
                             <button class="btn" type="submit"><i class="fa fa-trash" style="color: red"> </i></button>
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
