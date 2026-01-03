@extends('layouts.app')

@section('title', 'Sejarah Kami - Ciblón Wonosobo')

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-24 overflow-hidden bg-slate-900">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-30"
                src="https://images.unsplash.com/photo-1519315901367-f34ff9154487?q=80&w=2070&auto=format&fit=crop"
                alt="Swimming Pool History">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight mb-6">
                Sejarah <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Perjalanan
                    Kami</span>
            </h1>
            <p class="max-w-2xl mx-auto text-lg text-slate-300">
                Dari kolam sederhana hingga menjadi panggung prestasi renang terbesar di Wonosobo. Ini adalah cerita
                dedikasi kami untuk olahraga air.
            </p>
        </div>
    </div>

    <!-- Story Section -->
    <div class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg prose-blue mx-auto text-gray-600">
                <p class="lead text-xl text-gray-800 font-medium mb-8">
                    Ciblón Wonosobo didirikan dengan satu visi sederhana: <span class="text-blue-600">Memberikan wadah bagi
                        talenta muda untuk bersinar.</span>
                </p>
                <p>
                    Berawal dari kegelisahan akan minimnya kompetisi renang yang profesional di daerah Wonosobo, sekelompok
                    pelatih dan pecinta renang berkumpul pada tahun 2015. Kami menyadari bahwa banyak potensi atlet muda
                    yang layu sebelum berkembang karena kurangnya jam terbang kompetisi.
                </p>
                <p>
                    Nama <strong>"Ciblón"</strong> diambil dari istilah lokal yang berarti bermain air. Kami ingin
                    mengembalikan kegembiraan dalam berenang, namun dengan standar kompetisi yang serius dan profesional.
                </p>
            </div>
        </div>
    </div>

    <!-- Timeline Section -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Jejak Langkah</h2>

            <div class="relative">
                <!-- Vertical Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-blue-200"></div>

                <!-- Timeline Item 1 -->
                <div class="relative mb-12">
                    <div class="flex items-center justify-between w-full">
                        <div class="w-5/12 text-right pr-8">
                            <h3 class="text-xl font-bold text-blue-600">2015</h3>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Awal Mula</h4>
                            <p class="text-gray-600 text-sm">Ciblón resmi didirikan sebagai komunitas kecil pecinta renang
                                di Wonosobo yang rutin mengadakan latihan bersama.</p>
                        </div>
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-blue-500 border-4 border-white shadow-lg">
                        </div>
                        <div class="w-5/12 pl-8"></div>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="relative mb-12">
                    <div class="flex items-center justify-between w-full">
                        <div class="w-5/12 pr-8"></div>
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-cyan-400 border-4 border-white shadow-lg">
                        </div>
                        <div class="w-5/12 text-left pl-8">
                            <h3 class="text-xl font-bold text-cyan-500">2018</h3>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Kompetisi Pertama</h4>
                            <p class="text-gray-600 text-sm">Menyelenggarakan "Ciblón Cup I" yang diikuti oleh 200 peserta
                                dari berbagai sekolah dasar di Wonosobo.</p>
                        </div>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="relative mb-12">
                    <div class="flex items-center justify-between w-full">
                        <div class="w-5/12 text-right pr-8">
                            <h3 class="text-xl font-bold text-blue-600">2021</h3>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Bangkit Pasca Pandemi</h4>
                            <p class="text-gray-600 text-sm">Mengadopsi sistem pendaftaran digital dan protokol kesehatan
                                ketat, menjadi pelopor event olahraga aman.</p>
                        </div>
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-blue-500 border-4 border-white shadow-lg">
                        </div>
                        <div class="w-5/12 pl-8"></div>
                    </div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="relative">
                    <div class="flex items-center justify-between w-full">
                        <div class="w-5/12 pr-8"></div>
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-cyan-400 border-4 border-white shadow-lg">
                        </div>
                        <div class="w-5/12 text-left pl-8">
                            <h3 class="text-xl font-bold text-cyan-500">2025</h3>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Era Baru</h4>
                            <p class="text-gray-600 text-sm">Kini melayani ribuan atlet dengan fasilitas standar nasional
                                dan sistem manajemen modern berbasis teknologi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600 py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Tim Pengembangan</h2>
            <p class="text-blue-100 mb-8 text-lg">Kenali tim yang berdedikasi membangun dan mengembangkan platform Ciblón.
            </p>
            <a href="{{ route('development-team') }}"
                class="inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition shadow-lg transform hover:-translate-y-1">
                Lihat Tim
            </a>
        </div>
    </div>
@endsection