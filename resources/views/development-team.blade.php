@extends('layouts.app')

@section('title', 'Tim Pengembangan - Ciblón Wonosobo')

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-24 overflow-hidden bg-slate-900">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-20"
                src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=2070&q=80"
                alt="Team work">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight mb-6">
                Tim <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Pengembangan</span>
            </h1>
            <p class="max-w-2xl mx-auto text-lg text-slate-300">
                Bertemu dengan para visioner dan kreator di balik platform Ciblón.
            </p>
        </div>
    </div>

    <!-- Team Section -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Kontributor Utama</h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Kami bekerja keras untuk memberikan pengalaman terbaik bagi
                    komunitas renang Wonosobo.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($teamMembers as $member)
                    <!-- Team Member Card -->
                    <div
                        class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
                        <div class="h-32 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
                        <div class="px-6 pb-8 -mt-16 text-center">
                            <div
                                class="w-32 h-32 mx-auto rounded-full border-4 border-white shadow-lg overflow-hidden bg-gray-200">
                                @if($member->image)
                                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&background=0D8ABC&color=fff"
                                        alt="{{ $member->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <h3 class="mt-4 text-xl font-bold text-gray-900">{{ $member->name }}</h3>
                            <p class="text-blue-600 font-medium">{{ $member->role }}</p>
                            <p class="mt-4 text-gray-500 text-sm">{{ $member->bio }}</p>

                            <div class="mt-6 flex justify-center space-x-4">
                                @if($member->github_link)
                                    <a href="{{ $member->github_link }}" target="_blank"
                                        class="text-gray-400 hover:text-blue-500 transition"><i class="bi bi-github"></i></a>
                                @endif
                                @if($member->linkedin_link)
                                    <a href="{{ $member->linkedin_link }}" target="_blank"
                                        class="text-gray-400 hover:text-blue-500 transition"><i class="bi bi-linkedin"></i></a>
                                @endif
                                @if($member->instagram_link)
                                    <a href="{{ $member->instagram_link }}" target="_blank"
                                        class="text-gray-400 hover:text-blue-500 transition"><i class="bi bi-instagram"></i></a>
                                @endif
                                @if($member->twitter_link)
                                    <a href="{{ $member->twitter_link }}" target="_blank"
                                        class="text-gray-400 hover:text-blue-500 transition"><i class="bi bi-twitter"></i></a>
                                @endif
                                @if($member->dribbble_link)
                                    <a href="{{ $member->dribbble_link }}" target="_blank"
                                        class="text-gray-400 hover:text-blue-500 transition"><i class="bi bi-dribbble"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection