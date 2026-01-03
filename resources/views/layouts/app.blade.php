<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ciblón Wonosobo - Event Renang Terbaik')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Check for dark mode preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 antialiased overflow-x-hidden">

    <!-- Navbar -->
    <nav x-data="{ 
            open: false, 
            scrolled: false, 
            isHome: {{ request()->routeIs('home') || request()->routeIs('dashboard') ? 'true' : 'false' }} 
         }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{ 'glass-nav shadow-sm': scrolled || !isHome, 'bg-transparent': !scrolled && isHome }"
         class="fixed w-full z-50 transition-all duration-300 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <a href="{{ url('/') }}" class="group flex items-center gap-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:scale-105 transition-transform">
                            C
                        </div>
                        <span class="font-bold text-2xl tracking-tight transition-colors duration-300"
                              :class="{ 'text-slate-800': scrolled || !isHome, 'text-white': !scrolled && isHome }">
                            Ciblón<span class="text-blue-500">.</span>
                        </span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    @foreach([
                        ['label' => 'Beranda', 'url' => url('/')],
                        ['label' => 'Tentang Kami', 'url' => url('/#about')],
                        ['label' => 'Lomba', 'url' => url('/informasi')],
                        ['label' => 'Berita', 'url' => url('/#berita')],
                        ['label' => 'Hasil Kejuaraan', 'url' => url('/#hasil')],
                    ] as $link)
                    <a href="{{ $link['url'] }}" 
                       class="text-sm font-medium transition-colors duration-300 hover:text-blue-500"
                       :class="{ 'text-gray-600': scrolled || !isHome, 'text-white/90 hover:text-white': !scrolled && isHome }">
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                    <a href="{{ route('pricing') }}" 
                       class="px-4 py-2 text-sm font-bold text-white bg-gradient-to-r from-orange-500 to-red-500 rounded-full shadow-lg hover:from-orange-600 hover:to-red-600 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                        Selenggarakan Lomba
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="px-3 py-1 text-xs font-bold text-white bg-slate-800 rounded-md hover:bg-slate-900 shadow-md transition-colors mr-2">
                                Admin Panel
                            </a>
                        @endif
                        <!-- User Profile Link (Direct) -->
                        <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 group">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold border-2 border-white shadow-md group-hover:border-blue-200 transition-all">
                                @if(Auth::user()->avatar)
                                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-full h-full rounded-full object-cover">
                                @else
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                @endif
                            </div>
                            <span class="text-sm font-medium transition-colors duration-300 group-hover:text-blue-500"
                                  :class="{ 'text-gray-700': scrolled || !isHome, 'text-white': !scrolled && isHome }">
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-sm font-semibold transition-colors duration-300 hover:text-blue-500"
                           :class="{ 'text-gray-600': scrolled || !isHome, 'text-white': !scrolled && isHome }">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-full shadow-lg shadow-blue-500/30 hover:bg-blue-700 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all duration-200">
                            Mulai Daftar
                        </a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="focus:outline-none transition-colors duration-300"
                            :class="{ 'text-gray-600 hover:text-blue-600': scrolled || !isHome, 'text-white hover:text-blue-200': !scrolled && isHome }">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>


        <!-- Mobile Menu -->
        <div x-show="open" 
             x-transition
             class="md:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="px-4 pt-2 pb-4 space-y-1">
                @foreach([
                    ['label' => 'Beranda', 'url' => url('/')],
                    ['label' => 'Tentang Kami', 'url' => url('/#about')],
                    ['label' => 'Lomba', 'url' => url('/informasi')],
                    ['label' => 'Berita', 'url' => url('/#berita')],
                    ['label' => 'Hasil Kejuaraan', 'url' => url('/#hasil')],
                ] as $link)
                <a href="{{ $link['url'] }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">
                    {{ $link['label'] }}
                </a>
                @endforeach
                <a href="{{ route('pricing') }}" class="block px-3 py-2 rounded-md text-base font-bold text-orange-600 hover:bg-orange-50 bg-orange-50/50 mt-2">
                    Selenggarakan Lomba
                </a>
                
                @auth
                    <div class="border-t border-gray-100 my-2 pt-2">
                        <div class="px-3 flex items-center space-x-3 mb-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Profile Saya</a>
                        <a href="{{ url('/dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="border-t border-gray-100 my-2 pt-2 flex flex-col space-y-2 px-3">
                        <a href="{{ route('login') }}" class="block text-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100">Masuk</a>
                        <a href="{{ route('register') }}" class="block text-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700">Mulai Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-0 min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">C</span>
                        Ciblón.
                    </h3>
                    <p class="text-slate-400 leading-relaxed max-w-sm">
                        Platform resmi event renang terbesar di Wonosobo. Kami berkomitmen memajukan olahraga renang dan mencetak atlet masa depan yang berprestasi.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4 text-white">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/') }}" class="text-slate-400 hover:text-blue-400 transition-colors">Beranda</a></li>
                        <li><a href="{{ url('/informasi') }}" class="text-slate-400 hover:text-blue-400 transition-colors">Informasi Lomba</a></li>
                        <li><a href="{{ url('/register') }}" class="text-slate-400 hover:text-blue-400 transition-colors">Pendaftaran</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-blue-400 transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4 text-white">Hubungi Kami</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-slate-400">
                            <i class="bi bi-geo-alt mt-1"></i>
                            <span>Kolam Renang Mangli,<br>Wonosobo, Jawa Tengah</span>
                        </li>
                        <li class="flex items-center gap-3 text-slate-400">
                            <i class="bi bi-envelope"></i>
                            <span>halo@ciblon.id</span>
                        </li>
                        <li class="flex items-center gap-3 text-slate-400">
                            <i class="bi bi-whatsapp"></i>
                            <span>+62 812-3456-7890</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-slate-500">
                <p>&copy; 2025 Ciblón Wonosobo. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-blue-400"><i class="bi bi-instagram text-lg"></i></a>
                    <a href="#" class="hover:text-blue-400"><i class="bi bi-facebook text-lg"></i></a>
                    <a href="#" class="hover:text-blue-400"><i class="bi bi-youtube text-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>