<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Solicita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script defer="defer" src="//barra.brasil.gov.br/barra_2.0.js" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('js/jquery-mask-plugin.js')}}"></script>
    <link rel="stylesheet" href="{{ asset ('css/styles/var.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/stylelmts.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/app.css') }}">
    <link href="{{ asset('css/field-animation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

    <style type="text/css">


        .td-align {
            text-align: center; /* alinhamento horizontal */
            vertical-align: middle; /* alinhamento vertical */
        }

        .bloco {
            background-color: #edf0f5;
        }

        .glyphicon {
            font-size: 16px;
        }

        .panel-default > .panel-heading {
            color: #fff;
            background-color: #1B2E4F;
            border-color: #d3e0e9;
        }

        /* Select2 Selects CSS - Start */
        .select2-container--bootstrap .select2-selection--single .select2-selection__placeholder {
            color: #555;
        }

        .select2-container--bootstrap .select2-results__option {
            color: #555;
            background-color: #fff;
        }

        .select2-container--bootstrap .select2-results__option--highlighted[aria-selected] {
            color: #fff;
            background-color: #bbb;
        }

        .select2-container--bootstrap .select2-selection--single {
            height: 36px;
            padding: 6px 18px;
            margin-left: 0px;
        }

        /* Select2 Selects CSS - End */
        #termo {
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        .navbar-default .navbar-nav > .dropdown > a:focus, .navbar-default .navbar-nav > .dropdown > a:hover {
            color: #fff;
            background-color: #1B2E4F;
        }

        .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            color: #000;
            background-color: #fff;
        }

        .navbar-default .navbar-nav > a, .navbar-default .navbar-nav > li > a {
            color: #fff;
        }

        .navbar-default .navbar-nav > li > a:hover, {
            color: #fff;
            background-color: #fff;
        }

        .dropdown-menu > li > a:hover {
            background-color: #cccccc;
        }

        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-text {
            color: #000;
            background-color: #fff;
        }

        #footer-brasil {
            background: none repeat scroll 0% 0% #1B2E4F;
            min-width: 100%;
            position: absolute;
            bottom: 0;
            width: 100%;
            display: none;
        }

        #page-container {
            position: relative;
            min-height: 100vh;
        }

        #content-wrap {
            padding-bottom: 2.5rem; /* Footer height */
        }

        @media (max-width: 1024px) {
            #barra-logos {
                display: none;
            }

            .btn-toggle {
                display: block;
            }
        }

        @media only screen and (max-width: 1024px) {
            /* Force table to not be like tables anymore */
            #tabela table,
            #tabela thead,
            #tabela tbody,
            #tabela tfoot,
            #tabela th,
            #tabela td,
            #tabela tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            #tabela thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #tabela tr {
                border: 1px solid #ccc;
            }

            #tabela td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
                white-space: normal;
                text-align: left;
            }

            #tabela td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }

            /*
            Label the data
            */
            #tabela td:before {
                content: attr(data-title);
            }
        }

        .dropbtn {
            background-color: #3097D1;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtndisabled {
            background-color: #8eb4cb;;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #8eb4cb;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3097D1;
        }

        .separador-lmts { /*       Separador de navbar2.blade.php */
            color: white;
            font-weight: bold;
            font-size: 20;
            margin-top: 6px;
        }

        /* Botão com cor padrão do lmts */
        .btn-primary-lmts {
            background-color: #1B2E4F;
            border-color: #d3e0e9;
            color: white;
        }

        .btn-primary-lmts:disabled {
            background-color: #1B2E4F;
            border-color: #d3e0e9;
            color: white;
        }

        .btn-primary-lmts:hover {
            background-color: #2c4e8a;
            border-color: #d3e0e9;
            color: white;
        }

        /* badge lmts */
        .badge-lmts {
            padding: 5px;
            color: white;
            font-size: 13px;
            background-color: #67748B;
            margin-left: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body style="background-color: var(--background)">
    <!-- Barra Brasil -->
    <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
        <ul id="menu-barra-temp" style="list-style:none;">
            <li
                style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
                <a href="http://brasil.gov.br"
                    style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal
                    do Governo Brasileiro</a>
            </li>
        </ul>
    </div>
    {{-- <div id="content-wrap">
    </div> --}}
    @include('layouts.navbar2')

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @elseif(session('fail'))
        <div class="alert alert-danger text-center">
            {{ session('fail') }}
        </div>
    @endif

    <!-- barra de menu -->
    <div class="min-h-screen py-5">
        @yield('conteudo')
    </div>
    <!-- rodape -->
    @include('layouts.footer')
    <!--x rodape x-->

    @stack('scripts')
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/prevent-submit.js')}}"></script>
<script src="{{ asset('js/ckeditor.js') }}"></script>
<!-- Latest compiled JavaScript -->

<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>


</html>
