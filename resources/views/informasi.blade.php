@extends('layouts.app')

@section('title', 'Informasi Lomba - Ciblón Wonosobo')

@section('content')
<div class="py-24 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-blue-900 sm:text-4xl">Informasi Lomba Ciblon</h2>
            <p class="mt-4 text-lg text-gray-500">Temukan jadwal, peraturan, dan informasi terbaru seputar kompetisi renang.</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 mx-auto max-w-3xl rounded shadow-sm" role="alert">
                <p class="font-bold">Sukses!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if($publications->isEmpty())
             <div class="text-center py-12">
                <div class="bg-white rounded-xl shadow-sm p-8 max-w-2xl mx-auto">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" alt="No Data" class="w-48 h-48 mx-auto mb-4 opacity-75">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Informasi Lomba</h3>
                    <p class="text-gray-500">Saat ini belum ada lomba atau acara yang dipublikasikan. Cek kembali nanti!</p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($publications as $event)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                        <!-- Poster -->
                        <div class="relative h-64 overflow-hidden bg-gray-200 group">
                            @if($event->poster_path)
                                <img src="{{ Storage::url($event->poster_path) }}" alt="{{ $event->organizer_name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-0 right-0 m-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-sm">
                                {{ $event->category }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="flex items-center gap-2 mb-3">
                                @if($event->logo_path)
                                    <img src="{{ Storage::url($event->logo_path) }}" class="w-8 h-8 rounded-full object-cover border border-gray-200" alt="Logo">
                                @endif
                                <span class="text-sm font-medium text-gray-600 truncate">{{ $event->organizer_name }}</span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $event->organizer_name }} Event</h3>
                            
                             <div class="space-y-2 mb-6 text-sm text-gray-600">
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>
                                        @if(is_array($event->registration_periods) && count($event->registration_periods) > 0)
                                            {{ \Carbon\Carbon::parse($event->registration_periods[0]['start_date'])->format('d M') }} - {{ \Carbon\Carbon::parse($event->registration_periods[count($event->registration_periods)-1]['end_date'])->format('d M Y') }}
                                        @else
                                            Jadwal belum ditentukan
                                        @endif
                                    </span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="line-clamp-1">{{ $event->organizer_address }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-auto grid grid-cols-2 gap-3">
                                <a href="{{ $event->guidebook_link }}" target="_blank" class="flex items-center justify-center px-4 py-2 border border-blue-600 text-blue-600 rounded-lg text-sm font-semibold hover:bg-blue-50 transition-colors group">
                                    <svg class="w-4 h-4 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Panduan
                                </a>
                                <a href="{{ $event->registration_link }}" target="_blank" class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg">
                                    Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-12">
                {{ $publications->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
