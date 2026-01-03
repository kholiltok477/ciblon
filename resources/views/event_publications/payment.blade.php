@extends('layouts.app')

@section('title', 'Pembayaran Event - Ciblón Wonosobo')

@section('content')
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 pt-32">
        <div class="sm:mx-auto sm:w-full sm:max-w-4xl">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <p class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Langkah Terakhir</p>
                <h2 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                    Selesaikan Pembayaran
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Amankan slot publikasi event Anda sekarang juga.
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all hover:shadow-3xl">
                <div class="md:flex">
                    <!-- Order Summary Side -->
                    <div
                        class="bg-gradient-to-br from-blue-900 to-slate-900 p-8 md:w-5/12 text-white relative overflow-hidden">
                        <!-- Decorative Circle -->
                        <div
                            class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-blue-500 opacity-20 blur-2xl">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 -ml-8 -mb-8 w-40 h-40 rounded-full bg-cyan-500 opacity-10 blur-3xl">
                        </div>

                        <h2 class="text-xl font-bold mb-8 border-b border-white/20 pb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            Ringkasan Pesanan
                        </h2>

                        <div class="space-y-6 relative z-10">
                            <div>
                                <label class="text-xs uppercase text-blue-300 font-bold tracking-widest">Nama Event</label>
                                <p class="font-bold text-xl mt-1 leading-snug">{{ $publication->organizer_name }}</p>
                            </div>

                            <div>
                                <label class="text-xs uppercase text-blue-300 font-bold tracking-widest">Paket
                                    Dipilih</label>
                                <div class="flex items-center gap-2 mt-1">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $publication->package_name }}
                                    </span>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-white/10">
                                <label class="text-xs uppercase text-blue-300 font-bold tracking-widest">Total
                                    Tagihan</label>
                                <p class="font-bold text-4xl mt-1 text-orange-400">Rp
                                    {{ number_format($publication->package_price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-12 text-xs text-blue-300/60 font-mono">
                            ID: {{ 'PMT-' . str_pad($publication->id, 6, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="p-8 md:w-7/12" x-data="{ previewUrl: null }">
                        <h2 class="text-2xl font-extrabold text-gray-900 mb-6 font-display">Konfirmasi Pembayaran</h2>

                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 mb-8">
                            <h3 class="text-blue-800 font-bold mb-3 flex items-center gap-2">
                                <i class="bi bi-bank text-xl"></i> Rekening Pembayaran
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-600">Bank BCA</span>
                                    <span class="font-mono font-bold text-gray-900 tracking-tighter">1234-567-890</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-600">Atas Nama</span>
                                    <span class="font-bold text-gray-900">Admin Ciblón</span>
                                </div>
                            </div>
                            <p class="mt-4 text-xs text-blue-600 italic">*Silakan transfer tepat sesuai total tagihan agar
                                verifikasi lebih cepat.</p>
                        </div>

                        <form action="{{ route('publications.processPayment', $publication->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-8">
                                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-widest">Unggah
                                    Bukti Pembayaran</label>

                                <div x-show="previewUrl" class="mb-4 relative group">
                                    <img :src="previewUrl"
                                        class="w-full h-48 object-cover rounded-2xl shadow-lg border-2 border-blue-200">
                                    <button @click="previewUrl = null; $refs.fileInput.value = ''" type="button"
                                        class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full shadow-md hover:bg-red-600 transition-colors">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>

                                <div x-show="!previewUrl"
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-2xl hover:border-blue-400 transition-colors group cursor-pointer"
                                    @click="$refs.fileInput.click()">
                                    <div class="space-y-1 text-center">
                                        <i
                                            class="bi bi-cloud-arrow-up text-4xl text-gray-400 group-hover:text-blue-500 transition-colors"></i>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <span class="font-bold text-blue-600 hover:text-blue-500">Pilih File
                                                Gambar</span>
                                            <input id="payment_proof" name="payment_proof" type="file" class="hidden"
                                                x-ref="fileInput" required
                                                @change="const file = $event.target.files[0]; if (file) { previewUrl = URL.createObjectURL(file); }">
                                            <p class="pl-1 text-gray-500">atau tarik ke sini</p>
                                        </div>
                                        <p class="text-xs text-gray-400">JPG, PNG (Maks. 2MB)</p>
                                    </div>
                                </div>
                                @error('payment_proof')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold py-4 px-6 text-lg rounded-2xl hover:from-blue-700 hover:to-indigo-800 transition duration-300 shadow-xl shadow-blue-500/30 transform hover:-translate-y-1 flex items-center justify-center gap-3">
                                <i class="bi bi-send-fill text-xl"></i>
                                Kirim Konfirmasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('dashboard') }}"
                    class="text-gray-500 hover:text-gray-900 text-sm font-medium transition-colors">Batal dan Kembali ke
                    Dashboard</a>
            </div>
        </div>
    </div>
@endsection