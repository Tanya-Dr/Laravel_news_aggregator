<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand me-0 px-3" href="{{ route('info') }}" style="background-color: inherit; box-shadow: none;">GB News</a>
    <div class="bg-dark text-white d-flex flex-wrap justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('info') }}" class="nav-link px-2 @if(request()->routeIs('info')) text-white @else text-secondary @endif">Home</a></li>
            <li><a href="{{ route('news.index') }}" class="nav-link px-2 @if(request()->routeIs('news.*')) text-white @else text-secondary @endif">News</a></li>
            <li><a href="{{ route('admin.index') }}" class="nav-link px-2 @if(request()->routeIs('admin.*')) text-white @else text-secondary @endif">Admin</a></li>
            <li><a href="{{ route('reviews') }}" class="nav-link px-2 @if(request()->routeIs('reviews')) text-white @else text-secondary @endif">Reviews</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-2 @if(request()->routeIs('user.feedback') || request()->routeIs('user.dataUpload')) text-white @else text-secondary @endif" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: rgba(255, 255, 255, 0.55)">
                    Contact us
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('user.feedback') }}">Leave a feedback</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.dataUpload') }}">Make an order</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3 @if(request()->routeIs('user.auth')) text-white @else text-secondary @endif" href="{{ route('user.auth') }}">Sign in</a>
        </div>
    </div>
</header>
