<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Toastr JS -->

    <title>{{ env('APP_NAME') }} - Registration</title>
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

            <!-- Registration Form -->
            <div class="glass-effect rounded-2xl shadow-2xl p-8 md:p-10 max-w-md mx-auto mt-10">
                <div class="mb-8 text-center">
                    <h2 class="font-federo text-2xl md:text-3xl font-normal text-white mb-2">Join Our Agency</h2>
                    <p class="text-gray-300 text-sm">Create your account</p>
                </div>

                <form id="registrationForm" class="space-y-6" action="{{ route('user.doRegistration') }}">
                    <!-- Name Fields -->
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-300 mb-2">First
                                Name</label>
                            <input id="firstName" name="firstName" type="text" required
                                class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                placeholder="John">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-300 mb-2">Last Name</label>
                            <input id="lastName" name="lastName" type="text" required
                                class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                placeholder="Doe">
                        </div>
                    </div>

                    <!-- Email or Phone for OTP -->
                    <div>
                        <label for="contact" class="block text-sm font-medium text-gray-300 mb-2">Email or
                            Phone</label>
                        <input id="contact" name="contact" type="text" required
                            class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            placeholder="email@example.com or +91 9876543210">
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="dob" class="block text-sm font-medium text-gray-300 mb-2">Date of Birth</label>
                        <input id="dob" name="dob" type="date"
                            class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-300 mb-2">Gender
                            (Optional)</label>
                        <select id="gender" name="gender"
                            class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- City/State -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-300 mb-2">City /
                            State</label>
                        <input id="location" name="location" type="text"
                            class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            placeholder="City, State">
                    </div>



                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                        <input id="password" name="password" type="password" required
                            class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            placeholder="Enter Password">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            placeholder="Confirm Password">
                    </div>


                    <!-- Consent Checkbox -->
                    <div class="flex items-start mt-4">
                        <div class="flex items-center h-5">
                            <input id="consent" name="consent" type="checkbox"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-600 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="consent" class="text-gray-300">
                                I agree to receive updates, offers, and news from <span
                                    class="font-semibold text-white">{{ env('APP_NAME') }}</span>
                            </label>
                        </div>
                    </div>

                    <!-- Send OTP / Submit -->
                    <div class="mt-4">
                        <button id="sendOtpBtn" type="button"
                            class="btn-hover w-full flex justify-center py-3 px-4 border border-gray-600 rounded-lg text-sm font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Send OTP
                        </button>
                    </div>



                    <!-- OTP Field (Hidden initially) -->
                    <div id="otpContainer" class="hidden mt-4">
                        <label for="otp" class="block text-sm font-medium text-gray-300 mb-2">OTP</label>
                        <input id="otp" name="otp" type="text"
                            class="input-glow w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            placeholder="Enter OTP">
                        <p class="text-white text-sm">Did'nt receive OTP? <a href="#" type="button"
                                id="resendOtp" class="text-sm text-white"> Resend Otp</a></p>
                    </div>


                    <!-- Submit Registration -->
                    <div class="mt-4">
                        <button id="registerBtn" type="submit"
                            class="btn-hover w-full flex justify-center py-3 px-4 border border-gray-600 rounded-lg text-sm font-semibold text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hidden">
                            Complete Registration
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-purple-300 border-opacity-30"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-transparent text-purple-200"></span>
                        </div>
                    </div>
                </div>

                <!--   Login link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400">
                        Already have an account?
                        <a href="{{ route('user.login') }}"
                            class="font-medium text-blue-400 hover:text-blue-300 transition duration-300 underline">
                            Login
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    const sendOtpBtn = document.getElementById('sendOtpBtn');
    const otpContainer = document.getElementById('otpContainer');
    const registerBtn = document.getElementById('registerBtn');
    const resendOtp = document.getElementById('resendOtp');

    [sendOtpBtn, resendOtp].forEach(button => {
        button.addEventListener('click', () => {
            const contact = document.getElementById('contact').value.trim();
            if (!contact) {
                alert('Please enter your email or phone!');
                return;
            }

            // Call your OTP API here
            console.log('Sending OTP to:', contact);

            $.ajax({
                url: '{{ route('otp.email-verification') }}',
                method: 'POST',
                data: {
                    contact: contact,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success("OTP sent successfully", "Success");
                    // Show OTP input and submit button
                    otpContainer.classList.remove('hidden');
                    registerBtn.classList.remove('hidden');
                    // Hide Send OTP button
                    sendOtpBtn.classList.add('hidden');
                },
                error: function(xhr, status, error) {
                    toastr.error("Error sending OTP", "Error");
                }
            });

        });
    })




    $("#registrationForm").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('user.doRegistration') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message);

                    // Reset form after success
                    $("#registrationForm")[0].reset();
                    $("#otpContainer").addClass("hidden");
                    $("#registerBtn").addClass("hidden");
                    // $("#sendOtpBtn").prop("disabled", false).text("Send OTP");
                    sendOtpBtn.classList.remove('hidden');

                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, function(key, val) {
                        toastr.error(val[0]);
                    });
                } else {
                    errorJson = xhr.responseJSON;
                    toastr.error(errorJson.message);
                }
            }
        });
    });
</script>


</html>
