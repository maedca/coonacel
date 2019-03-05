@extends('layouts.master')

@section('content')
<div class="content mt-4">
    <h1>Listado de libranzas y pedidos</h1>
    <div class="container-fluid">
        <a href="{{route('bills.create')}}"> <button class="btn btn-success"><i class="fa fa-plus    "></i></button></a>
        <br>
        <br>
        <table class="table table-hover" id="table">
            <thead>

                <tr>
                    <th>Nro</th>
                    <th>Tipo</th>
                    <th>Conferencista</th>
                    <th>Empresa </th>
                    {{--<th>Estado del proceso</th>--}}
                    <th>Total COP</th>
                    <th>Est. analista</th>
                    <th>Est. de facturacion</th>
                    <th>Est. de referenciación</th>
                    <th>Acciones</th>
                </tr>

            </thead>
            <tbody>
                @foreach( $libranzas as $libra)
                <tr>

                    <td>{{$libra->nro_libranza}}</td>
                    <td>{{$libra->type}}</td>
                    <td>{{$libra->conferencista}}</td>
                    <td>{{$libra->empresa}}</td>
                    <td>{{$libra->total}} </td>
                    <td>{{$libra->real_analyst_status}} </td>
                    @if ($libra->status_fact == 0)
                    <td class="text-center"> <i class="fas fa-check-square" style="color: 	red;"></i>
                        @else
                    <td class="text-center"> <i class="fas fa-check-square" style="color: 	green;"></i>
                        @endif
                        @if ($libra->status == '1')
                    <td class="text-center"> <i class="fas fa-check-square" style="color: 	green;"></i>
                    </td>
                    @else
                    <td class="text-center"> <i class="fas fa-check-square" style="color: 	red;"></i>

                        @endif


                    <td>


                        <form action="{{ url('libra/'.$libra->id .'?bill' )}}" method="post">
                            @csrf
                            @method('delete')
                            @if ($libra->type == 'pedido')
                            <a href="{{  url('libra/'. $libra->id. '?pedido')}}"><i class="fa fa-eye"></i></a>

                            @else
                            <a href="{{route('libra.show', $libra)}}"><i class="fa fa-eye"></i></a>
                            @endif
                            {{--<input type="submit" value="" class="btn btn-link form-inline">--}}
                            @if (auth()->user()->role == 'master' )

                            <button class="btn" type="submit"><i class="fa fa-trash" style="color: red "> </i></button>
                            @endif
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
