<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GB News @section('title') @show</title>

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
<div class="wrapper">
    <div class="top">
        <x-admin.header></x-admin.header>
        @isset($categoriesList)
        <x-categoriesNavBar :categoriesList="$categoriesList"></x-categoriesNavBar>
        @endisset
        <main>
            <div class="album py-5 bg-light">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <x-footer></x-footer>
</div>



<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


</body>
</html>

