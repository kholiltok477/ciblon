@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Review Event</h2>
                <p class="text-gray-500 text-sm">Review details and update status for {{ $event->organizer_name }}.</p>
            </div>
            <a href="{{ route('admin.events.index') }}"
                class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center">
                <i class="bi bi-arrow-left mr-1"></i> Back to List
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Event Information</h3>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Event
                                Name</label>
                            <p class="text-gray-900 font-medium">{{ $event->organizer_name }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Category</label>
                                <p class="text-gray-900">{{ $event->category ?? '-' }}</p>
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Activity
                                    Level</label>
                                <p class="text-gray-900">{{ $event->activity_level ?? '-' }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Target
                                Audience</label>
                            <p class="text-gray-900">{{ $event->target_audience ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Links & Resources</h3>
                    <div class="space-y-4">
                        @if($event->website)
                            <a href="{{ $event->website }}" target="_blank"
                                class="flex items-center text-blue-600 hover:underline">
                                <i class="bi bi-globe mr-2"></i> Website
                            </a>
                        @endif
                        @if($event->registration_link)
                            <a href="{{ $event->registration_link }}" target="_blank"
                                class="flex items-center text-blue-600 hover:underline">
                                <i class="bi bi-pencil-square mr-2"></i> Registration Link
                            </a>
                        @endif
                        @if($event->guidebook_link)
                            <a href="{{ $event->guidebook_link }}" target="_blank"
                                class="flex items-center text-blue-600 hover:underline">
                                <i class="bi bi-book mr-2"></i> Guidebook
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar / Actions -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Publication Status</h3>

                    <form action="{{ route('admin.events.update', $event) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <select name="status"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="pending" {{ $event->status === 'pending' ? 'selected' : '' }}>Pending Review
                                </option>
                                <option value="pending_payment" {{ $event->status === 'pending_payment' ? 'selected' : '' }}>
                                    Pending Payment</option>
                                <option value="approved" {{ $event->status === 'approved' ? 'selected' : '' }}>Approved
                                    (Published)</option>
                                <option value="rejected" {{ $event->status === 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full py-2.5 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition">
                            Update Status
                        </button>
                    </form>
                </div>

                <!-- Package Card -->
                <div
                    class="bg-slate-900 rounded-2xl shadow-lg border border-slate-800 p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-4 -mt-4 w-20 h-20 rounded-full bg-blue-500 opacity-20"></div>
                    <h3 class="text-sm font-bold text-blue-300 mb-2 uppercase tracking-wider">Package Details</h3>
                    <p class="text-2xl font-bold">{{ ucfirst($event->package_name) }}</p>
                    <p class="text-3xl text-orange-400 font-bold mt-2">Rp
                        {{ number_format($event->package_price, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Posters -->
                @if($event->poster_path)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
                        <h3 class="text-xs font-bold text-gray-500 mb-3 uppercase tracking-wider">Event Poster</h3>
                        <img src="{{ Storage::url($event->poster_path) }}" class="w-full rounded-lg">
                    </div>
                @endif

                <!-- Payment Proof -->
                @if($event->payment_proof_path)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
                        <h3 class="text-xs font-bold text-gray-500 mb-3 uppercase tracking-wider text-orange-600">Bukti
                            Pembayaran</h3>
                        <a href="{{ Storage::url($event->payment_proof_path) }}" target="_blank">
                            <img src="{{ Storage::url($event->payment_proof_path) }}"
                                class="w-full rounded-lg border-2 border-orange-100 hover:border-orange-300 transition-colors">
                        </a>
                        <p class="mt-2 text-xs text-gray-400 text-center uppercase tracking-tighter">Klik gambar untuk
                            memperbesar</p>
                    </div>
                @else
                    <div class="bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 p-6 text-center">
                        <i class="bi bi-cash-stack text-3xl text-gray-300 mb-2 block"></i>
                        <p class="text-sm text-gray-400 font-medium tracking-tight">Belum ada bukti pembayaran diunggah.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection