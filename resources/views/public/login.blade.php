<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8" />
    <title>Pick Admin - Login</title>
    <link rel="shortcut icon" href="{{ asset('dist/images/favicon.ico') }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/flags-icon/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/social-button/bootstrap-social.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}" />
    <!-- END: Custom CSS-->

</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Main Content-->
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">{{ config('app.name') }}</h3>
                    <p class="text-muted">Admin Login</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <form class="card p-4 shadow" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email address</label>
                        <input type="email" name="email" id="emailaddress" class="form-control"
                            placeholder="admin@example.com" required autofocus value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password" required >
                        <div class="text-end mt-1">
                            <a href="{{ route('password.request') }}" class="small text-muted">Forgot Password?</a>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Log In</button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="btn btn-link text-muted">Reset Password</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- START: Template JS-->
    <script src="{{ asset('dist/vendors/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <!-- END: Template JS-->
</body>
<!-- END: Body-->

</html>
