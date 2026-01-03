<nav class="bg-blue-600 text-white fixed w-full top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Kiri: Logo + Nama -->
            <div class="flex items-center space-x-3">
                {{-- ================================
                    GANTI LOGO DI SINI
                    Contoh: <img src="{{ asset('images/ciblon-logo.png') }}" alt="Ciblón Logo" class="h-8">
                ================================= --}}
                <img src="#" alt="Logo Ciblón" class="h-8 opacity-60">
                <span class="font-semibold text-lg">Ciblón</span>
            </div>

            <!-- Tengah: Menu Navigasi -->
            <div class="hidden md:flex space-x-6 text-sm font-medium items-center">
                <a href="{{ route('home') }}" class="hover:text-yellow-300 transition">Beranda</a>
                <a href="{{ route('informasi') }}" class="hover:text-yellow-300 transition">Informasi</a>
                <a href="{{ route('participants.create') }}" class="hover:text-yellow-300 transition">Pendaftaran</a>
                <a href="#kontak" class="hover:text-yellow-300 transition">Kontak</a>
            </div>

            <!-- Kanan: Login / Dashboard / Logout -->
            <div class="hidden md:flex items-center space-x-4">
                @guest
                    <!-- Jika belum login -->
                    <a href="{{ route('login') }}"
                       class="text-white font-semibold hover:text-yellow-300 transition">
                        Login
                    </a>
                @endguest

                @auth
                    <!-- Jika sudah login -->
                    <div class="relative group">
                        <button class="text-yellow-300 font-semibold hover:text-white transition">
                            {{ Auth::user()->name }}
                        </button>

                        <div
                            class="absolute right-0 mt-2 w-40 bg-white text-gray-700 rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Spacer agar konten tidak ketutupan navbar -->
<div class="h-16"></div>
