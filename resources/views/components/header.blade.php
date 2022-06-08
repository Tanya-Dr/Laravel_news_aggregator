<header class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('info') }}" style="background-color: inherit; box-shadow: none;">GB News</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item"><a href="{{ route('info') }}" class="nav-link @if(request()->routeIs('info')) text-white @endif">Home</a></li>
                <li class="nav-item"><a href="{{ route('news.index') }}" class="nav-link @if(request()->routeIs('news.*')) text-white @endif">News</a></li>
                @if(Auth::user() && Auth::user()->is_admin)
                    <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link @if(request()->routeIs('admin.*')) text-white @endif">Admin</a></li>
                @endif
                <li class="nav-item"><a href="{{ route('reviews.index') }}" class="nav-link @if(request()->routeIs('reviews.index')) text-white @endif">Reviews</a></li>
                @if(Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(request()->routeIs('reviews.make') || request()->routeIs('order.make')) text-white @endif" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" v-pre>
                            Contact us
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink" style="margin-top: 0px;">
                            <li><a class="dropdown-item" href="{{ route('reviews.make') }}">Leave a review</a></li>
                            <li><a class="dropdown-item" href="{{ route('order.make') }}">Make an order</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('login')) text-white @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('register')) text-white @endif" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle @if(request()->routeIs('account.*')) text-white @endif" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="margin-top: 0px;">
                            <li>
                                <a class="dropdown-item" href="{{ route('account.index') }}">Account</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>
