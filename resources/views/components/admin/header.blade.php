<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
{{--    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">GB News</a>--}}
    <a class="navbar-brand me-0 px-3" href="#" style="background-color: inherit; box-shadow: none;">GB News</a>
    <div class="bg-dark text-white d-flex flex-wrap justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('info') }}" class="nav-link px-2 text-secondary">Info</a></li>
            <li><a href="{{ route('news') }}" class="nav-link px-2 text-white">News</a></li>
            <li><a href="{{ route('admin.index') }}" class="nav-link px-2 text-white">Admin</a></li>
        </ul>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="{{ route('auth') }}">Sign out</a>
        </div>
    </div>
</header>
