<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Coonacel</title>
        <link rel="stylesheet" href="/css/app.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        @yield('styles')

    </head>

    <body class="hold-transition sidebar-mini">
        @include('sweetalert::alert')`
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
                <!-- Left navbar links -->
                {{--<ul class="navbar-nav">--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item d-none d-sm-inline-block">--}}
                {{--<a href="index3.html" class="nav-link">Home</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item d-none d-sm-inline-block">--}}
                {{--<a href="#" class="nav-link">Contact</a>--}}
                {{--</li>--}}
                {{--</ul>--}}

                <!-- SEARCH FORM -->
                {{--<form class="form-inline ml-3">--}}
                {{--<div class="input-group input-group-sm">--}}
                {{--<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<div class="input-group-append">--}}
                {{--<button class="btn btn-navbar" type="submit">--}}
                {{--<i class="fa fa-search"></i>--}}
                {{--</button>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}

                <!-- Right navbar links -->

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">CRM Coonacel</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('images/user.png')}}" class="img-circle elevation-2" alt="">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{auth()->user()->name}} - {{auth()->user()->role}}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'master')
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        Administrador
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="{{route('conferencias.index')}}" class="nav-link">
                                            <i class="fa fa-microphone"></i>
                                            <p>
                                                Conferencias
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('conferencistas.index')}}" class="nav-link">
                                            <i class="fa fa-headphones-alt"></i>
                                            <p>
                                                Conferencistas
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('relacionistas.index')}}" class="nav-link">
                                            <i class="fa fa-users"></i>
                                            <p>
                                                Relacionistas
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('industries.index')}}" class="nav-link">
                                            <i class="fa fa-industry"></i>
                                            <p>
                                                Industrias
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('books.index')}}" class="nav-link">
                                            <i class="fa fa-book-open"></i>
                                            <p>
                                                Colecciones
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link ">
                                            <i class="fa fa-file-alt"></i>
                                            <p class="text-white">Informes</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'relacionista' || auth()->user()->role ==
                        'master')
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        Call Center
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="{{route('conferenceSchedules.index')}}" class="nav-link">
                                            <i class="fa fa-calendar-alt"></i>
                                            <p class="text-white">
                                                Agendar Conferencia
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('Empresas.index')}}" class="nav-link ">
                                            <i class="fa fa-industry"></i>
                                            <p class="text-white">Empresas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link ">
                                            <i class="fa fa-file-alt"></i>
                                            <p class="text-white">Informes</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'director' ||
                        \Illuminate\Support\Facades\Auth::user()->role == 'master' )
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        Capacitación
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="{{route('conferenceSchedules.index')}}" class="nav-link">
                                            <i class="fa fa-comment-alt"></i>
                                            <p class="text-white">
                                                Asignar Conferencista
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link ">
                                            <i class="fa fa-file-alt"></i>
                                            <p class="text-white">Informes</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        @endif



                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'logistica' ||
                        \Illuminate\Support\Facades\Auth::user()->role == 'master' )
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        Aprobación y Despacho
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="{{route('bills.index')}}" class="nav-link">
                                            <i class="fa fa-comment-alt"></i>
                                            <p class="text-white">
                                                Aprobar Referenciacion
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('Empresas.index')}}" class="nav-link ">
                                            <i class="fa fa-industry"></i>
                                            <p class="text-white">Verificar Documentos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('Empresas.index')}}" class="nav-link ">
                                            <i class="fa fa-industry"></i>
                                            <p class="text-white">Verificar Pagos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('Empresas.index')}}" class="nav-link ">
                                            <i class="fa fa-industry"></i>
                                            <p class="text-white">Aprobar para Facturación</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        @endif
                        @if(auth()->user()->role == 'master')
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        Talento Humano
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="{{route('conferenceSchedules.index')}}" class="nav-link">
                                            <i class="fa fa-comment-alt"></i>
                                            <p class="text-white">
                                                Verificacion de Facturación
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('Empresas.index')}}" class="nav-link ">
                                            <i class="fa fa-industry"></i>
                                            <p class="text-white">Liquidar Comision</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        @endif
                        @if(auth()->user()->role == 'master' || auth()->user()->role == 'conferencista')
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>Libranzas y pedidos
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="{{route('libra.index')}}" class="nav-link ">
                                            <i class="fa fa-file-alt"></i>
                                            <p class="text-white">Libranzas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('libra.index','pedidos')}}" class="nav-link ">
                                            <i class="fa fa-file-alt"></i>
                                            <p class="text-white">Pedidos</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        @endif
                        @if(auth()->user()->role == 'master')
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        Informes Generales
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            <i class="fa fa-file-alt"></i>
                                            <p class="text-white">Informes Generales</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                        @endif
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off" style="color: red"></i> {{ __('Logout') }}

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <!-- /.content-header -->

                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <script src="/js/app.js"></script>
        <script>
            $(document).ready(function () {

            });

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        @yield('scripts')
    </body>

</html>
