<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Reset Password - {{ config('app.name') }}</title>
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
                <div class="text-center"><b>Admin Reset Password</b></div>

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

                <form method="POST" action="{{ route('password.update') }}"
                    class="row row-eq-height lockscreen mt-2 mb-5">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="lock-image col-12 col-sm-5"></div>
                    <div class="login-form col-12 col-sm-7">
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required
                                placeholder="admin@example.com" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                placeholder="Enter new password" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" required placeholder="Confirm new password" />
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success w-100">Reset Password</button>
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
