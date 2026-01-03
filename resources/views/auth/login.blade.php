<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Ciblon Wonosobo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-white">
    <div class="flex min-h-screen">
        <!-- Left Side - Image -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&q=80&w=1920');">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-blue-900/60 backdrop-blur-[2px]"></div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center px-16 text-white h-full">
                <div class="mb-6">
                    <span
                        class="bg-blue-500/20 text-blue-100 py-1 px-3 rounded-full text-sm font-medium border border-blue-400/30">
                        Event Renang 2025
                    </span>
                </div>
                <h1 class="text-6xl font-bold mb-6 leading-tight">
                    Welcome to <br>
                    <span class="text-blue-300">Ciblón Club</span>
                </h1>
                <p class="text-lg text-blue-100 max-w-md leading-relaxed mb-8">
                    Platform resmi pendaftaran dan informasi lomba renang Ciblón Wonosobo. Bergabunglah bersama para
                    juara.
                </p>

                <!-- Stats/Feature (Optional) -->
                <div class="flex gap-8 mt-4 pt-8 border-t border-white/10">
                    <div>
                        <p class="text-3xl font-bold">500+</p>
                        <p class="text-sm text-blue-200">Peserta</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">20+</p>
                        <p class="text-sm text-blue-200">Sekolah</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">100%</p>
                        <p class="text-sm text-blue-200">Professional</p>
                    </div>
                </div>
            </div>

            <!-- Pattern/Decoration -->
            <div
                class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-blue-900/50 to-transparent pointer-events-none">
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-white">
            <div class="w-full max-w-[480px]">
                <!-- Header -->
                <div class="mb-10 text-center lg:text-left">
                    <img src="{{ asset('images/logo.png') }}" class="h-12 mx-auto lg:mx-0 mb-6" alt="Ciblon Logo"
                        onerror="this.style.display='none'">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali!</h2>
                    <p class="text-gray-500">Masuk untuk mengelola pendaftaran turnamen Anda.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-red-600 font-medium">{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-sm font-semibold text-gray-700 ml-1">Email Anda</label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all font-medium"
                                placeholder="nama@email.com">
                            <div class="absolute left-0 top-0 bottom-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center ml-1">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <input id="password" type="password" name="password" required
                                class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all font-medium"
                                placeholder="••••••••">
                            <div class="absolute left-0 top-0 bottom-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center ml-1">
                        <label class="flex items-center cursor-pointer relative">
                            <input type="checkbox" name="remember"
                                class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition-colors cursor-pointer">
                            <span class="ml-2 text-sm text-gray-600 font-medium">Ingat saya</span>
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full py-4 px-6 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-[0_4px_14px_0_rgb(37,99,235,0.39)] hover:shadow-[0_6px_20px_rgba(37,99,235,0.23)] hover:-translate-y-[1px] transition-all duration-200">
                        Masuk Sekarang
                    </button>

                    <!-- Divider -->
                    <div class="relative py-2">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-100"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-white px-4 text-sm text-gray-500">Atau masuk dengan</span>
                        </div>
                    </div>

                    <!-- Google Button -->
                    <a href="{{ route('google.login') }}"
                        class="flex items-center justify-center w-full py-3.5 px-4 bg-white border-2 border-gray-100 rounded-xl text-gray-700 font-bold hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 group">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                            class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform" alt="Google">
                        Google Account
                    </a>

                    <!-- Register Link -->
                    <p class="text-center text-sm text-gray-600 pt-4">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                            class="font-bold text-blue-600 hover:text-blue-700 hover:underline">
                            Daftar Disini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>