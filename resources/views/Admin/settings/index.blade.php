@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Landing Page Content</h2>
        <p class="text-gray-500 text-sm">Customize the visuals and statistics of your homepage.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded shadow-sm flex items-center">
            <i class="bi bi-check-circle-fill text-green-500 mr-3 text-lg"></i>
            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Hero Section -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-slate-50 border-b border-gray-100">
                        <h3 class="font-bold text-gray-800 flex items-center">
                            <i class="bi bi-layout-text-window-reverse mr-2 text-blue-500"></i> Hero Section
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        @foreach($settings['hero'] ?? [] as $setting)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">
                                    {{ str_replace('_', ' ', str_replace('hero_', '', $setting->key)) }}
                                </label>

                                @if($setting->type === 'image')
                                    <div class="flex items-start gap-4">
                                        <div class="w-32 h-20 rounded-lg overflow-hidden border border-gray-200 bg-gray-50">
                                            @if($setting->value)
                                                <img src="{{ filter_var($setting->value, FILTER_VALIDATE_URL) ? $setting->value : Storage::url($setting->value) }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-gray-300"><i
                                                        class="bi bi-image"></i></div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <input type="file" name="{{ $setting->key }}"
                                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors">
                                            <p class="mt-1 text-xs text-gray-400">Resolution: 1920x1080 recommended.</p>
                                        </div>
                                    </div>
                                @elseif($setting->type === 'longtext')
                                    <textarea name="{{ $setting->key }}" rows="4"
                                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $setting->value }}</textarea>
                                @else
                                    <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}"
                                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Statistics & Others -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-slate-50 border-b border-gray-100">
                        <h3 class="font-bold text-gray-800 flex items-center">
                            <i class="bi bi-bar-chart-fill mr-2 text-orange-500"></i> Homepage Statistics
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-6">
                            @foreach($settings['stats'] ?? [] as $setting)
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 mb-2 uppercase tracking-wide">
                                        {{ str_replace('_', ' ', str_replace('stat_', '', $setting->key)) }}
                                    </label>
                                    <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}"
                                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-lg font-bold text-gray-800">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-blue-600 rounded-2xl p-8 shadow-lg shadow-blue-200 text-white relative overflow-hidden">
                    <i class="bi bi-info-circle absolute -right-4 -bottom-4 text-9xl opacity-10"></i>
                    <h4 class="text-xl font-bold mb-2">Live Preview Note</h4>
                    <p class="text-blue-100 text-sm leading-relaxed">Changes made here will reflect immediately on the
                        landing page for all visitors. Make sure to use high quality images for the hero section.</p>
                    <div class="mt-6">
                        <button type="submit"
                            class="px-8 py-3 bg-white text-blue-600 font-bold rounded-xl shadow-md hover:bg-blue-50 transition transform hover:-translate-y-1">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection