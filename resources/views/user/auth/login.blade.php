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

    <!-- Main Content -->
    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo/Brand Section -->
            <div class="text-center mt-4">
                <h1 class="font-federo text-4xl md:text-5xl font-normal text-white mb-2">{{ env('APP_NAME') }}</h1>
                <p class="text-gray-300 text-sm md:text-base font-light">Your gateway to the house</p>
            </div>

            <!-- Login Form -->
            <div class="glass-effect rounded-2xl shadow-2xl p-8 md:p-10">

                <!-- Error Alert -->
                @if (session('error'))
                    <div
                        class="max-w-md mx-auto my-4 bg-red-500 border border-red-700 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <!-- Icon -->
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span>{{ session('error') }}</span>
                        </div>
                        <button class="text-white font-bold">&times;</button>
                    </div>
                @endif

                <div class="mb-8">
                    <h2 class="font-federo text-2xl md:text-3xl font-normal text-white text-center mb-2">Welcome Back
                    </h2>
                    <p class="text-gray-300 text-center text-sm">Sign in to your account</p>
                </div>

                <form class="space-y-6" action="{{ route('user.doLogin') }}" method="POST">
                    @csrf

                    <div class="space-y-4">
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <input id="email" name="email" type="email" required value="arunmaurya2500@gmail.com"
                                    class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    placeholder="model@example.com">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input id="password" name="password" type="password" required
                                    class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                    placeholder="••••••••">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Remember me & Forgot password -->
                    <div class="flex items-center justify-between">

                        <div class="text-sm">
                            <a href="#"
                                class="text-blue-400 hover:text-blue-300 transition duration-300 underline">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit"
                            class="btn-hover w-full flex justify-center py-3 px-4 border border-gray-600 rounded-lg text-sm font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Sign In
                            </span>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-purple-300 border-opacity-30"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-transparent text-purple-200">Or continue with</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Login -->
                    <div class="mt-6 grid grid-cols-1 gap-3">
                        {{-- <button
                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-600 rounded-md shadow-sm bg-gray-800 bg-opacity-50 text-sm font-medium text-white hover:bg-opacity-70 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M19.99 10.187c0-.82-.069-1.417-.216-2.037H10.2v3.698h5.62c-.113.876-.608 2.058-1.775 2.888l-.069.448 2.585 1.99.18.017c1.64-1.501 2.592-3.713 2.592-6.004z" />
                                <path
                                    d="M10.2 19.931c2.347 0 4.312-.768 5.749-2.087l-2.696-2.455c-.769.51-1.683.784-3.053.784-2.297 0-4.31-1.471-5.017-3.472l-.448.035-2.676 2.059-.035.446c1.452 2.865 4.365 4.69 8.176 4.69z" />
                                <path
                                    d="M5.183 11.701c-.198-.51-.308-1.025-.308-1.514s.11-1.004.308-1.514l-.037-.464-2.728-2.137-.446.017C.69 7.314 0 8.869 0 10.187c0 1.318.69 2.873 1.972 4.014l2.765-2.137.446-.363z" />
                                <path
                                    d="M10.2 4.688c1.518 0 2.786.656 3.422 1.215l2.45-2.313C14.498 1.915 12.53.069 10.2.069c-3.811 0-6.724 1.825-8.176 4.69L4.8 6.897c.708-2.002 2.72-3.472 5.017-3.472z" />
                            </svg>
                        </button> --}}

                        <div class="mt-4">
                            <button id="phoneOtpBtn"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-600 rounded-md shadow-sm bg-gray-800 bg-opacity-50 text-sm font-medium text-white hover:bg-opacity-70 transition duration-300">
                                Continue with Phone Number & OTP
                            </button>
                        </div>

                    </div>
                </form>

                <!-- Sign up link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400">
                        Don't have an account?
                        <a href="{{ route('user.register') }}"
                            class="font-medium text-blue-400 hover:text-blue-300 transition duration-300 underline">
                            Join our agency
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
</body>


<script>
    const form = document.querySelector('form');
    const phoneOtpBtn = document.getElementById('phoneOtpBtn');

    phoneOtpBtn.addEventListener('click', (e) => {
        e.preventDefault();

        // Replace form with phone login form
        form.innerHTML = `
            <div class="space-y-4">
                <!-- Phone Number Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">
                        Phone Number
                    </label>
                    <input id="phone" name="phone" type="tel" required
                        class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                        placeholder="+91 9876543210">
                </div>

                <!-- OTP Field (hidden initially) -->
                <div id="otpContainer" class="hidden">
                    <label for="otp" class="block text-sm font-medium text-gray-300 mb-2">
                        OTP
                    </label>
                    <input id="otp" name="otp" type="text"
                        class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                        placeholder="Enter OTP">
                </div>
            </div>

            <!-- Send OTP Button -->
            <div class="mt-4">
                <button id="sendOtpBtn" type="button"
                    class="btn-hover w-full flex justify-center py-3 px-4 border border-gray-600 rounded-lg text-sm font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Send OTP
                </button>
            </div>

            <!-- Back to Email Login -->
            <div class="flex justify-between mt-2">
                <button id="backToEmail" class="text-blue-400 hover:text-blue-300 text-sm underline">
                    Back to Email Login
                </button>
            </div>
        `;

        const sendOtpBtn = document.getElementById('sendOtpBtn');
        const otpContainer = document.getElementById('otpContainer');

        // Show OTP field when Send OTP is clicked
        sendOtpBtn.addEventListener('click', () => {
            const phoneInput = document.getElementById('phone').value.trim();
            if (phoneInput === "") {
                alert("Please enter your phone number!");
                return;
            }

            // Here you can trigger OTP sending logic (API call)
            console.log("Sending OTP to:", phoneInput);

            // Show OTP input and change button text
            otpContainer.classList.remove('hidden');
            sendOtpBtn.textContent = "Verify OTP";
        });

        // Back to email/password form
        document.getElementById('backToEmail').addEventListener('click', (ev) => {
            ev.preventDefault();
            location.reload(); // Simple way to restore original form
        });
    });
</script>


</html>
