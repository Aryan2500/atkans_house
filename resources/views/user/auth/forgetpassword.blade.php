<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Federo&family=Barlow:wght@100..900&display=swap');

        .font-federo {
            font-family: 'Federo', sans-serif;
        }

        .font-barlow {
            font-family: 'Barlow', sans-serif;
        }

        .bg-gradient-fashion {
            background: linear-gradient(135deg, rgba(17, 24, 39, 0.95) 0%, rgba(31, 41, 55, 0.95) 50%, rgba(55, 65, 81, 0.95) 100%);
        }

        .studio-background {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><rect width="1200" height="800" fill="%23111827"/><g opacity="0.1"><rect x="50" y="100" width="300" height="400" fill="%23374151" rx="10"/><rect x="400" y="150" width="250" height="350" fill="%23374151" rx="10"/><rect x="700" y="120" width="280" height="380" fill="%23374151" rx="10"/><circle cx="200" cy="50" r="30" fill="%236B7280"/><circle cx="600" cy="60" r="25" fill="%236B7280"/><circle cx="900" cy="40" r="35" fill="%236B7280"/><rect x="100" y="600" width="200" height="100" fill="%23374151" rx="5"/><rect x="400" y="580" width="150" height="120" fill="%23374151" rx="5"/><rect x="700" y="620" width="180" height="80" fill="%23374151" rx="5"/></g><text x="1050" y="750" font-family="serif" font-size="24" fill="%23374151" opacity="0.3">STUDIO</text></svg>');
            background-size: cover;
            background-position: center;
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(17, 24, 39, 0.8);
            border: 1px solid rgba(75, 85, 99, 0.3);
        }

        .floating-animation {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .input-glow:focus {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
        }

        .btn-hover {
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #1f2937, #374151);
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
            background: linear-gradient(45deg, #374151, #4b5563);
        }
    </style>
</head>

<body class="min-h-screen bg-gray-900 studio-background font-barlow relative">
    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Studio lighting effects -->
        <div class="absolute top-10 left-20 w-64 h-64 bg-blue-500 opacity-5 rounded-full blur-3xl"></div>
        <div class="absolute top-32 right-32 w-48 h-48 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div
            class="absolute bottom-20 left-10 w-32 h-32 bg-gray-400 opacity-15 rounded-full blur-xl floating-animation">
        </div>
        <div class="absolute bottom-40 right-20 w-40 h-40 bg-slate-300 opacity-10 rounded-full blur-2xl floating-animation"
            style="animation-delay: 1s;"></div>
    </div>

    <!-- Overlay for better contrast -->
    <div class="fixed inset-0 bg-gradient-fashion pointer-events-none"></div>

    <!-- Forgot Password Screen -->
    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">

            <!-- Brand Header -->
            <div class="text-center mt-4">
                <h1 class="font-federo text-4xl md:text-5xl font-normal text-white mb-2">{{ env('APP_NAME') }}</h1>
                <p class="text-gray-300 text-sm md:text-base font-light">Reset your password securely</p>
            </div>

            <!-- Error Alert -->
            @if (session('error'))
                <div id="errorAlert"
                    class="max-w-md mx-auto my-4 bg-red-500 border border-red-700 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button onclick="dismissAlert('errorAlert')" class="text-white font-bold">&times;</button>
                </div>
            @endif

            <!-- Success Alert -->
            @if (session('success'))
                <div id="successAlert"
                    class="max-w-md mx-auto my-4 bg-green-500 border border-green-700 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="dismissAlert('successAlert')" class="text-white font-bold">&times;</button>
                </div>
            @endif

            <div class="glass-effect rounded-2xl shadow-2xl p-8 md:p-10">

                <!-- Form Heading -->
                <div class="mb-8">
                    <h2 class="font-federo text-2xl md:text-3xl font-normal text-white text-center mb-2">
                        Forgot Your Password?
                    </h2>
                    <p class="text-gray-300 text-center text-sm">Enter your email address and we’ll send you a reset
                        link.</p>
                </div>

                <form class="space-y-6" method="POST" action="{{ route('user.sendNewPassword') }}">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <input id="email" name="email" type="email" required
                                class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                placeholder="you@example.com" value="{{ old('email') }}">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="btn-hover w-full flex justify-center py-3 px-4 border border-gray-600 rounded-lg text-sm font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10.293 15.707a1 1 0 001.414 0l7-7a1 1 0 00-1.414-1.414L11 12.586V3a1 1 0 00-2 0v9.586L4.707 7.293A1 1 0 103.293 8.707l7 7z"
                                        clip-rule="evenodd" />
                                </svg>
                                Send Reset Link
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Back to Login -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400">
                        Remember your password?
                        <a href="{{ route('user.login') }}"
                            class="font-medium text-blue-400 hover:text-blue-300 transition duration-300 underline">
                            Back to Sign In
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-xs text-gray-500 opacity-75">
                    © 2025 {{ env('APP_NAME') }}. All rights reserved.
                </p>
            </div>
        </div>
    </div>


    <script>
        function dismissAlert(id) {
            const alert = document.getElementById(id);
            if (alert) {
                alert.classList.add('opacity-0', 'translate-y-[-10px]');
                setTimeout(() => alert.remove(), 300);
            }
        }
    </script>

</body>





</html>
