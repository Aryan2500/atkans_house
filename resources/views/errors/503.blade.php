<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atkans House - Under Maintenance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black min-h-screen flex items-center justify-center p-4 font-sans">
    <!-- Animated neon grid background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 opacity-5"
            style="background-image: linear-gradient(0deg, transparent 24%, rgba(168, 255, 0, 0.1) 25%, rgba(168, 255, 0, 0.1) 26%, transparent 27%, transparent 74%, rgba(168, 255, 0, 0.1) 75%, rgba(168, 255, 0, 0.1) 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, rgba(168, 255, 0, 0.1) 25%, rgba(168, 255, 0, 0.1) 26%, transparent 27%, transparent 74%, rgba(168, 255, 0, 0.1) 75%, rgba(168, 255, 0, 0.1) 76%, transparent 77%, transparent); background-size: 50px 50px;">
        </div>

        <!-- Neon glows -->
        <div
            class="absolute top-1/3 left-1/4 w-80 h-80 bg-yellow-300 rounded-full mix-blend-screen filter blur-3xl opacity-15 animate-pulse">
        </div>
        <div class="absolute top-1/2 right-1/4 w-80 h-80 bg-green-400 rounded-full mix-blend-screen filter blur-3xl opacity-15 animate-pulse"
            style="animation-delay: 1.5s;"></div>
        <div class="absolute bottom-1/4 left-1/2 w-80 h-80 bg-yellow-300 rounded-full mix-blend-screen filter blur-3xl opacity-15 animate-pulse"
            style="animation-delay: 3s;"></div>
    </div>

    <!-- Main content -->
    <div class="relative z-10 max-w-2xl mx-auto text-center">
        <!-- Logo/Brand -->
        <div class="mb-8">
            <h1 class="text-7xl font-black text-yellow-300 mb-2 tracking-tight"
                style="text-shadow: 0 0 20px rgba(253, 224, 71, 0.6), 0 0 40px rgba(168, 255, 0, 0.3);">
                ATKANS HOUSE
            </h1>
            <p class="text-lg tracking-widest font-bold text-green-400"
                style="text-shadow: 0 0 10px rgba(74, 222, 128, 0.4);">
                ⚡ MODEL AGENCY ⚡
            </p>
        </div>

        <!-- Neon maintenance icon -->
        <div class="mb-8 flex justify-center">
            <div class="relative w-28 h-28">
                <div class="absolute inset-0 border-2 border-yellow-300 rounded-full opacity-30 animate-spin"
                    style="animation-duration: 3s; box-shadow: 0 0 20px rgba(253, 224, 71, 0.4);"></div>
                <div class="absolute inset-2 border-2 border-green-400 rounded-full opacity-20 animate-spin"
                    style="animation-duration: 5s; animation-direction: reverse; box-shadow: 0 0 20px rgba(74, 222, 128, 0.3);">
                </div>
                <svg class="w-28 h-28 text-yellow-300 relative z-10" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" style="filter: drop-shadow(0 0 8px rgba(253, 224, 71, 0.6));">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Main message -->
        <div class="mb-8">
            <h2 class="text-5xl font-black text-yellow-300 mb-4 tracking-tight"
                style="text-shadow: 0 0 15px rgba(253, 224, 71, 0.5);">
                SYSTEM UPGRADE
            </h2>
            <p class="text-xl text-green-300 leading-relaxed mb-3 font-medium">
                Our platform is undergoing elite enhancement protocols.
            </p>
            <p class="text-lg text-gray-300 font-light">
                The next generation experience is loading. Stay tuned.
            </p>
        </div>

        <!-- Status box with neon border -->
        <div class="bg-black/50 backdrop-blur-md border-2 border-yellow-300 rounded-lg p-8 mb-8"
            style="box-shadow: 0 0 25px rgba(253, 224, 71, 0.3), inset 0 0 15px rgba(253, 224, 71, 0.05);">
            <p class="text-green-400 text-xs mb-3 font-bold tracking-widest">⌚ ESTIMATED RETURN</p>
            <p class="text-4xl font-black text-yellow-300" style="text-shadow: 0 0 12px rgba(253, 224, 71, 0.5);">
                COMING SOON
            </p>
            <div class="mt-4 w-full bg-gray-800 h-1 rounded-full overflow-hidden">
                <div class="bg-gradient-to-r from-yellow-300 to-green-400 h-full w-3/4 animate-pulse"
                    style="box-shadow: 0 0 10px rgba(253, 224, 71, 0.6);"></div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-12 pt-8 border-t border-yellow-300/30">
            <p class="text-yellow-300/70 text-sm font-mono">
                © 2025 ATKANS HOUSE
            </p>
        </div>
    </div>

    <!-- Neon lines -->
    <div class="fixed top-10 left-1/2 transform -translate-x-1/2 w-64 h-px bg-gradient-to-r from-transparent via-yellow-300 to-transparent opacity-30 pointer-events-none"
        style="box-shadow: 0 0 15px rgba(253, 224, 71, 0.4);"></div>
    <div class="fixed bottom-10 left-1/2 transform -translate-x-1/2 w-64 h-px bg-gradient-to-r from-transparent via-green-400 to-transparent opacity-30 pointer-events-none"
        style="box-shadow: 0 0 15px rgba(74, 222, 128, 0.3);"></div>
</body>

</html>
