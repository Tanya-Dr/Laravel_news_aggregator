<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GB News @section('title') @show</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .top {
            flex-grow: 1;
            background-color: rgba(var(--bs-light-rgb));
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <div class="top">
                <x-header></x-header>
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
            <x-footer></x-footer>
        </div>
    </div>
</body>
</html>
