<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid px-6">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" class="logo-img" alt="">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('photoshoot') ? 'active' : '' }}"
                        href="{{ route('photoshoot') }}">Photoshoot</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('models', 'profile') ? 'active' : '' }}"
                        href="{{ route('models') }}">Hire A Model</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('rampwalk') ? 'active' : '' }}"
                        href="{{ route('rampwalk') }}">Rampwalk Registration</a>
                </li>

                <!-- Events Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::routeIs('events', 'gallery') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        Events <i class="ti-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('events') }}" class="dropdown-item">Upcoming Events</a></li>
                        <li><a href="{{ route('gallery') }}" class="dropdown-item">Photo Gallery</a></li>
                    </ul>
                </li>

                <!-- Get Involved Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::routeIs('sponsorship') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        Get Involved <i class="ti-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('sponsorship') }}" class="dropdown-item">Sponsorship</a></li>
                    </ul>
                </li>

                <!-- Auth Links -->
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-auto-close="outside">
                            Account <i class="ti-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                            <li><a href="{{ route('user.login') }}" class="dropdown-item">Login</a></li>
                            <li><a href="{{ route('user.register') }}" class="dropdown-item">Register</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-auto-close="outside">
                            Account <i class="ti-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                            <li>
                                <form method="Get"
                                    action="{{ auth()->user()->role == 'admin' ? route('logout') : route('user.logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="nav-link btn btn-link text-white text-decoration-none">Logout</button>
                                </form>
                            </li>
                            @if (Auth::user()->role == 'admin')
                                <li><a href="{{ route('admin.dashboard') }}" class="dropdown-item">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('user.events') }}" class="dropdown-item">Dashboard</a></li>
                            @endif
                        </ul>
                    </li>



                @endguest

                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('contact.index') ? 'active' : '' }}"
                        href="{{ route('contact.index') }}">Contact Us</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
