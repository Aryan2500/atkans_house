<!-- Dashboard Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo / Dashboard Home -->
        <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">
            <img src="{{ asset('img/logo.png') }}" class="logo-img" alt="Logo" style="height:40px;">

        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dashboardNavbar"
            aria-controls="dashboardNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="dashboardNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <!-- Dashboard Home -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('user.dashboard') ? 'active' : '' }}"
                        href="{{ route('user.dashboard') }}">
                        <i class="fa-solid fa-chart-line me-1"></i> Dashboard
                    </a>
                </li>

                <!-- My Events -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('user.events') ? 'active' : '' }}"
                        href="{{ route('user.events') }}">
                        <i class="fa-solid fa-calendar-check me-1"></i> My Events
                    </a>
                </li>

                <!-- Bookings -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('user.bookings') ? 'active' : '' }}"
                        href="{{ route('user.bookings') }}">
                        <i class="fa-solid fa-clipboard-list me-1"></i> My Bookings
                    </a>
                </li>

                <!-- Notifications -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('user.notifications') ? 'active' : '' }}"
                        href="{{ route('user.notifications') }}">
                        <i class="fa-solid fa-bell me-1"></i> Notifications
                    </a>
                </li>

                <!-- Account Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        Account <i class="ti-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                        <li><a href="{{ route('user.profile') }}" class="dropdown-item">Profile</a></li>
                        <li><a href="{{ route('user.logout') }}" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
