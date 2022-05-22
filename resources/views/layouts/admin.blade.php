<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GB News Admin @section('title') @show</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .wrapper{
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .top{
            flex-grow: 1;
        }

        footer .container{
            padding: 0;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
<x-admin.header></x-admin.header>

<div class="container-fluid">
    <div class="row">
        <x-admin.sidebar></x-admin.sidebar>
        <div class="wrapper">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 top">
                @yield('content')
            </main>
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <x-footer></x-footer>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
@stack('js')
</body>
</html>
