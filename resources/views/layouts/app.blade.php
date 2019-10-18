<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aquitetura Padrao') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js')}}" defer></script>
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.smartWizard.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery-mask-plugin/jquery.mask.min.js') }}" defer></script>
    <script src="{{ asset('js/maskmoney.min.js') }}" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    <script src="{{ asset('js/vue-resource.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo_cliente_red.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/modal_comunicacao.css') }}" rel="stylesheet">
    <link href="{{ asset('css/banco.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materia.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customizacao.css') }}" rel="stylesheet">
    <link href="{{ asset('css/smart_wizard.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="{{ asset('js/jquery-datatables.js') }}"></script>
</head>
<body class="sidebar-mini sidebar-open">
<div id="app" class="wrapper">
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom" 
        style="padding-top: 0px;padding-bottom: 4px;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    @auth
                        {{Auth::user()->name}}
                    @endauth
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">My Info</a>
                    <div class="dropdown-divider"></div>
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="dropdown-item dropdown-footer">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">

            <div class="d-flex justify-content-center">
                <img src="{{url('/')}}/img/logo_cliente.png" alt="" height="32px">
            </div>
<!--            <span class="brand-text font-weight-light">Arquitetura Padrao</span> -->
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- /.navbar -->
    <div class="content-wrapper" style="padding-top:15px!important;">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
</div>
<div id="loading" class="loading" style="z-index: 9999;" >Loading&#8230;</div>
@yield('scripts')
<script>
    $(document).ready(function(){
        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo &eacute; obrigatório.",
            email: "Por favor, forneça um endereço válido.",
            date: "Por favor, forneça uma data válida.",
            number: "Por favor, forneça um número válido.",
            digits: "Por favor, forneça somente d&iacute;gitos.",
            equalTo: "Por favor, forneça o mesmo valor novamente.",
        });

        var tam = $(window).width();
        
        if (tam <=991){

            $(".sidebar-mini").removeClass('sidebar-open');
        }

        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".nav-treeview > .nav-item > .nav-link").click(function(){
            $("#loading").show(); 
        });

        setTimeout(() => {
            $("#loading").hide();    
        }, 500);
    });
</script>

</body>
</html>


<!-- <ul class="navbar-nav ml-auto">
