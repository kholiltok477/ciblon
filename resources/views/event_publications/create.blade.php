@extends('layouts.app')

@section('title', 'Form Publikasi Event')

@section('content')
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl p-10 md:p-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-8 border-b pb-4">Publikasikan Event Anda</h2>

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan pada isian form:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data" x-data="{
                                    periods: [{
                                        id: 1,
                                        name: 'GELOMBANG 1',
                                        start_date: '',
                                        end_date: ''
                                    }],
                                    addPeriod() {
                                        this.periods.push({
                                            id: Date.now(),
                                            name: 'GELOMBANG ' + (this.periods.length + 1),
                                            start_date: '',
                                            end_date: ''
                                        });
                                    },
                                    removePeriod(index) {
                                        this.periods.splice(index, 1);
                                        // Re-index names
                                        this.periods.forEach((p, i) => {
                                            p.name = 'GELOMBANG ' + (i + 1);
                                        });
                                    }
                                }">
                    @csrf
                    <input type="hidden" name="package_type" value="{{ $packageDetails['type'] }}">

                    <!-- Paket -->
                    <div class="mb-6">
                        <label class="block text-base font-bold text-gray-700 mb-2">Paket<span
                                class="text-red-500">*</span></label>
                        <input type="text" value="{{ $packageDetails['name'] }} - {{ $packageDetails['price'] }}" readonly
                            class="w-full bg-gray-100 border border-gray-300 rounded-lg py-3 px-4 text-base text-gray-500 cursor-not-allowed">
                    </div>

                    <!-- Nama Penyelenggara -->
                    <div class="mb-6">
                        <label for="organizer_name" class="block text-base font-bold text-gray-700 mb-2">Nama
                            Penyelenggara<span class="text-red-500">*</span></label>
                        <input type="text" id="organizer_name" name="organizer_name"
                            placeholder="Masukkan nama penyelenggara"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base"
                            required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-6">
                        <label for="organizer_address" class="block text-base font-bold text-gray-700 mb-2">Alamat<span
                                class="text-red-500">*</span></label>
                        <textarea id="organizer_address" name="organizer_address" rows="3"
                            placeholder="Alamat penyelenggara..."
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base"
                            required></textarea>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="mb-6">
                        <label for="organizer_description" class="block text-base font-bold text-gray-700 mb-2">Deskripsi
                            Singkat Penyelenggara<span class="text-red-500">*</span></label>
                        <textarea id="organizer_description" name="organizer_description" rows="4"
                            placeholder="Deskripsi singkat penyelenggara..."
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base"
                            required></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Media Sosial Instagram -->
                        <div>
                            <label for="instagram" class="block text-base font-bold text-gray-700 mb-2">Media Sosial
                                Instagram<span class="text-red-500">*</span></label>
                            <input type="text" id="instagram" name="instagram" placeholder="@MediaSosial"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base"
                                required>
                        </div>

                        <!-- Website -->
                        <div>
                            <label for="website" class="block text-base font-bold text-gray-700 mb-2">Website</label>
                            <input type="url" id="website" name="website" placeholder="Website"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                        </div>
                    </div>

                    <!-- Logo Penyelenggara -->
                    <div class="mb-8">
                        <label for="logo" class="block text-base font-bold text-gray-700 mb-2">Logo Penyelenggara (max.
                            500KB)<span class="text-red-500">*</span></label>
                        <input type="file" id="logo" name="logo" accept="image/*"
                            class="block w-full text-base text-gray-500 file:mr-5 file:py-3 file:px-5 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                            required>
                    </div>

                    <hr class="my-8 border-gray-200">

                    <!-- MASA PENDAFTARAN -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <label class="block text-base font-bold text-gray-700">Masa Pendaftaran<span
                                    class="text-red-500">*</span></label>
                            <button type="button" @click="addPeriod"
                                class="bg-blue-900 text-white text-sm font-bold py-2 px-5 rounded-full hover:bg-blue-800 transition shadow-md">
                                + Tambah Masa Pendaftaran
                            </button>
                        </div>

                        <template x-for="(period, index) in periods" :key="period.id">
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-bold text-base text-gray-700 uppercase" x-text="period.name"></span>
                                    <button type="button" @click="removePeriod(index)" x-show="periods.length > 1"
                                        class="text-red-500 text-sm font-bold hover:underline">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                                <input type="hidden" :name="'registration_periods[' + index + '][name]'"
                                    :value="period.name">
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="date" :name="'registration_periods[' + index + '][start_date]'" required
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-gray-500">s/d</span>
                                        <input type="date" :name="'registration_periods[' + index + '][end_date]'" required
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- DETAILS -->
                    <div class="mb-6">
                        <label class="block text-base font-bold text-gray-700 mb-2">Pembayaran<span
                                class="text-red-500">*</span></label>
                        <select name="payment_type" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                            <option value="Gratis">Gratis</option>
                            <option value="Berbayar">Berbayar</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-base font-bold text-gray-700 mb-2">Kategori<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="category" required
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                        </div>
                        <div>
                            <label class="block text-base font-bold text-gray-700 mb-2">Sasaran Peserta<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="target_audience" required
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <input type="hidden" name="activity_type" value="Offline">
                        </div>
                        <div>
                            <label class="block text-base font-bold text-gray-700 mb-2">Tingkatan Kegiatan<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="activity_level" required
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-base font-bold text-gray-700 mb-2">Link Pendaftaran<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="registration_link" placeholder="Masukkan link pendaftaran" required
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                        </div>
                        <div>
                            <label class="block text-base font-bold text-gray-700 mb-2">Link Panduan<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="guidebook_link" placeholder="Masukkan link panduan" required
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-base font-bold text-gray-700 mb-2">Nomor WA<span
                                class="text-red-500">*</span></label>
                        <p class="text-xs text-gray-500 mb-2">(Nomor panitia untuk konfirmasi dengan pihak Ciblón. Tidak
                            akan
                            ditampilkan di website.)</p>
                        <input type="text" name="whatsapp_number" placeholder="Masukkan nomor whatsapp" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-base">
                    </div>

                    <div class="mb-8">
                        <label class="block text-base font-bold text-gray-700 mb-2">Upload Poster (max. 2MB & 2000 px)<span
                                class="text-red-500">*</span></label>
                        <input type="file" name="poster" accept="image/*" required
                            class="block w-full text-base text-gray-500 file:mr-5 file:py-3 file:px-5 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>


                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-blue-900 text-white font-bold py-4 px-6 text-lg rounded-full hover:bg-blue-800 transition duration-300 shadow-lg">
                        Selanjutnya
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection