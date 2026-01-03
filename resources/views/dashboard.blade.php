@extends('layouts.app')

@section('title', 'Ciblón - Kompetisi Renang Pelajar Wonosobo 2025')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ isset($settings['hero_image']) ? (filter_var($settings['hero_image'], FILTER_VALIDATE_URL) ? $settings['hero_image'] : Storage::url($settings['hero_image'])) : 'https://images.unsplash.com/photo-1530549387789-4c1017266635?auto=format&fit=crop&q=80&w=2070' }}"
                alt="Swimming Pool" class="w-full h-full object-cover">
            <div
                class="absolute inset-0 bg-gradient-to-b from-blue-900/80 via-blue-900/40 to-slate-900/90 mix-blend-multiply">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 text-center">
            <div
                class="inline-block mb-6 px-4 py-1.5 rounded-full border border-blue-400/30 bg-blue-500/10 backdrop-blur-md">
                <span class="text-blue-200 font-medium tracking-wide text-sm uppercase">Pendaftaran Dibuka Hingga 10 Nov
                    2025</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight tracking-tight drop-shadow-lg">
                {!! $settings['hero_title'] ?? 'Raih Prestasimu di <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Ciblón Wonosobo</span>' !!}
            </h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10 leading-relaxed font-light">
                {{ $settings['hero_subtitle'] ?? 'Ajang kompetisi renang pelajar terbesar se-Wonosobo. Tunjukkan bakatmu, pecahkan rekor, dan jadilah juara masa depan.' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}"
                    class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg shadow-blue-600/30 transition-all hover:-translate-y-1 hover:shadow-xl text-lg">
                    Daftar Sekarang
                </a>
                <a href="#about"
                    class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-full transition-all hover:-translate-y-1 text-lg flex items-center gap-2">
                    <i class="bi bi-play-circle"></i> Lihat Video
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce text-white/50">
            <i class="bi bi-arrow-down-circle text-3xl"></i>
        </div>
    </section>

    <!-- Stats Section -->
    <section
        class="py-10 bg-white border-b border-gray-100 relative z-20 -mt-20 mx-4 md:mx-auto max-w-7xl rounded-2xl shadow-xl">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-gray-100">
            <div class="text-center p-4">
                <div class="text-4xl font-bold text-blue-600 mb-1">{{ $settings['stat_peserta'] ?? '500+' }}</div>
                <div class="text-sm text-gray-500 font-medium uppercase tracking-wider">Peserta</div>
            </div>
            <div class="text-center p-4">
                <div class="text-4xl font-bold text-blue-600 mb-1">{{ $settings['stat_sekolah'] ?? '25' }}</div>
                <div class="text-sm text-gray-500 font-medium uppercase tracking-wider">Sekolah</div>
            </div>
            <div class="text-center p-4">
                <div class="text-4xl font-bold text-blue-600 mb-1">{{ $settings['stat_nomor_lomba'] ?? '50' }}</div>
                <div class="text-sm text-gray-500 font-medium uppercase tracking-wider">Nomor Lomba</div>
            </div>
            <div class="text-center p-4">
                <div class="text-4xl font-bold text-blue-600 mb-1">{{ $settings['stat_total_hadiah'] ?? '10Jt+' }}</div>
                <div class="text-sm text-gray-500 font-medium uppercase tracking-wider">Total Hadiah</div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami (About) -->
    <section id="about" class="py-24 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&q=80&w=800"
                            alt="Tentang Ciblon" class="rounded-3xl shadow-2xl z-10 relative">
                        <!-- Decorative Element -->
                        <div class="absolute -bottom-10 -left-10 w-full h-full bg-blue-100 rounded-3xl -z-0"></div>
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-yellow-400 rounded-full blur-3xl opacity-20">
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Tentang Kami</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 font-display">Mencetak Juara Dari Kolam
                        Renang</h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        <span class="font-bold text-gray-800">Ciblón Wonosobo</span> bukan sekadar lomba renang biasa. Ini
                        adalah panggung bagi para perenang muda untuk menguji mental, fisik, dan sportifitas mereka.
                    </p>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Didukung oleh fasilitas standar nasional dan tim juri profesional, kami menjamin kompetisi yang
                        adil, aman, dan berkesan bagi setiap peserta.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <i class="bi bi-check-circle-fill text-blue-500 text-xl"></i>
                            <span class="text-gray-700 font-medium">Wasit Berlisensi PRSI</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="bi bi-check-circle-fill text-blue-500 text-xl"></i>
                            <span class="text-gray-700 font-medium">Kolam Standar Olympic</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="bi bi-check-circle-fill text-blue-500 text-xl"></i>
                            <span class="text-gray-700 font-medium">Sistem Waktu Elektronik</span>
                        </li>
                    </ul>
                    <a href="{{ route('sejarah') }}"
                        class="text-blue-600 font-bold hover:text-blue-800 flex items-center gap-2 group">
                        Pelajari Sejarah Kami <i
                            class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Lomba (Categories) -->
    <section id="lomba" class="py-24 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Kategori Lomba</span>
                <h2 class="text-4xl font-bold text-gray-900">Siapkan Dirimu</h2>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Kami membuka berbagai kategori usia dan gaya renang untuk
                    mengakomodasi seluruh talenta muda Wonosobo.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=600"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 bg-gray-200">
                        <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/20 transition-colors"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">SD/MI (Pemula)</h3>
                        <p class="text-gray-600 mb-6">Kategori khusus untuk siswa sekolah dasar. Fokus pada pengembangan
                            teknik dasar dan keberanian.</p>
                        <a href="{{ route('participants.create') }}"
                            class="inline-flex items-center justify-center w-full px-4 py-3 bg-gray-50 text-blue-600 font-bold rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            Daftar Kategori Ini
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 md:-mt-4">
                    <div class="h-48 overflow-hidden relative">
                        <div
                            class="absolute top-4 right-4 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-full z-10 shadow">
                            TERPOPULER</div>
                        <img src="https://images.unsplash.com/photo-1565958011705-44e21157bba4?auto=format&fit=crop&w=600"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 bg-gray-200">
                        <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/20 transition-colors"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-blue-600 mb-3">SMP/MTs (Junior)</h3>
                        <p class="text-gray-600 mb-6">Persaingan ketat untuk tingkat menengah pertama. Uji kecepatan dan
                            daya tahanmu di sini.</p>
                        <a href="{{ route('participants.create') }}"
                            class="inline-flex items-center justify-center w-full px-4 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:bg-blue-700 transition-colors">
                            Daftar Kategori Ini
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 bg-gray-200">
                        <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/20 transition-colors"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">SMA/SMK (Senior)</h3>
                        <p class="text-gray-600 mb-6">Kategori bergengsi untuk tingkat atas. Tempat lahirnya para atlet
                            renang profesional daerah.</p>
                        <a href="{{ route('participants.create') }}"
                            class="inline-flex items-center justify-center w-full px-4 py-3 bg-gray-50 text-blue-600 font-bold rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            Daftar Kategori Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section id="berita" class="py-24 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">Update Terbaru</span>
                    <h2 class="text-4xl font-bold text-gray-900">Berita & Artikel</h2>
                </div>
                <a href="#" class="hidden md:flex items-center gap-2 text-gray-500 font-medium hover:text-blue-600">
                    Lihat Semua Berita <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @forelse($news as $article)
                    @if($loop->first)
                        <!-- News 1 (Large) -->
                        <div class="md:col-span-2 relative group rounded-2xl overflow-hidden shadow-lg h-80 md:h-96">
                            @if($article->image)
                                <img src="{{ Storage::url($article->image) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <img src="https://images.unsplash.com/photo-1590080875837-23c31a92f76c?auto=format&fit=crop&w=800"
                                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent p-8 flex flex-col justify-end">
                                <span class="bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded w-fit mb-3">Terbaru</span>
                                <h3 class="text-2xl text-white font-bold mb-2 group-hover:text-blue-300 transition-colors">
                                    {{ $article->title }}
                                </h3>
                                <p class="text-gray-300 text-sm line-clamp-2">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 100) }}</p>
                            </div>
                        </div>
                    @else
                        <!-- News Card -->
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all flex flex-col">
                            <div class="text-gray-400 text-xs font-bold mb-3 uppercase tracking-wider">Berita</div>
                            <h3 class="text-lg font-bold text-gray-900 mb-3 hover:text-blue-600 cursor-pointer line-clamp-2">{{ $article->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 80) }}</p>
                            <a href="#" class="mt-auto text-blue-600 text-sm font-bold flex items-center gap-1">Baca Selengkapnya <i class="bi bi-chevron-right text-xs"></i></a>
                        </div>
                    @endif
                @empty
                    <div class="md:col-span-4 text-center py-12 text-gray-400">
                        <i class="bi bi-newspaper text-5xl mb-4 block"></i>
                        Belum ada berita terbaru.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Hasil Kejuaraan CTA (Hasil) -->
    <section id="hasil" class="py-24 bg-blue-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl opacity-20 -mr-20 -mt-20"></div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Siapakah Juara Berikutnya?</h2>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto mb-10">
                Pantau hasil pertandingan secara real-time dan lihat siapa yang berhasil memecahkan rekor tahun ini.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#"
                    class="px-8 py-4 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 font-bold rounded-full shadow-lg transition-all hover:scale-105">
                    <i class="bi bi-trophy-fill mr-2"></i> Lihat Hasil Sementara
                </a>
                <a href="#"
                    class="px-8 py-4 bg-transparent border border-white text-white font-bold rounded-full hover:bg-white/10 transition-all">
                    Download Buku Panduan
                </a>
            </div>
        </div>
    </section>

@endsection