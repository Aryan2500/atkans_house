<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Forgot Password - {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('dist/images/favicon.ico') }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/flags-icon/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/social-button/bootstrap-social.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}" />
</head>

<body id="main-container" class="default">
    <div class="container">
        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">
                <div class="text-center"><b>{{ config('app.name') }}</b></div>
                <div class="text-center"><b>Admin Forgot Password</b></div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}"
                    class="row row-eq-height lockscreen mt-2 mb-5">
                    @csrf
                    <div class="lock-image col-12 col-sm-5"></div>
                    <div class="login-form col-12 col-sm-7">
                        <div class="form-group mb-3">
                            <label for="email">Enter your Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required
                                placeholder="admin@example.com" />
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('login.page') }}" class="text-muted">← Back to Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/vendors/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
</body>

</html>
