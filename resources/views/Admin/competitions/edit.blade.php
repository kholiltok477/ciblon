@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Competition</h2>
                <p class="text-gray-500 text-sm">Update official swimming event details.</p>
            </div>
            <a href="{{ route('admin.competitions.index') }}"
                class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center transition-colors">
                <i class="bi bi-arrow-left mr-1"></i> Back to List
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 shadow-blue-900/5">
            <form action="{{ route('admin.competitions.update', $competition) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title"
                            class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Competition
                            Name</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $competition->title) }}" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-lg transition-all">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Date -->
                        <div>
                            <label for="start_date"
                                class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Date</label>
                            <input type="date" name="start_date" id="start_date"
                                value="{{ old('start_date', $competition->start_date ? $competition->start_date->format('Y-m-d') : '') }}"
                                required
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all">
                        </div>
                        <!-- Location -->
                        <div>
                            <label for="location"
                                class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Location</label>
                            <input type="text" name="location" id="location"
                                value="{{ old('location', $competition->location) }}" required
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Fee -->
                        <div>
                            <label for="registration_fee"
                                class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Registration
                                Fee</label>
                            <input type="text" name="registration_fee" id="registration_fee"
                                value="{{ old('registration_fee', $competition->registration_fee) }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all"
                                placeholder="e.g. Gratis / Rp 50.000">
                        </div>
                        <!-- Link -->
                        <div>
                            <label for="registration_link"
                                class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Registration Link
                                (URL)</label>
                            <input type="url" name="registration_link" id="registration_link"
                                value="{{ old('registration_link', $competition->registration_link) }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all"
                                placeholder="https://...">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description"
                            class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                        <textarea name="description" id="description" rows="5" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all">{{ old('description', $competition->description) }}</textarea>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Banner /
                            Poster</label>
                        @if($competition->image)
                            <div class="mb-4">
                                <img src="{{ Storage::url($competition->image) }}"
                                    class="w-full h-48 object-cover rounded-xl shadow-md border border-gray-100">
                            </div>
                        @endif
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-blue-400 transition-colors">
                            <div class="space-y-1 text-center font-medium">
                                <i class="bi bi-calendar2-event text-4xl text-gray-400 mb-2 block"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="image"
                                        class="relative cursor-pointer bg-white rounded-md font-semibold text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Change poster</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100">
                        <button type="submit"
                            class="w-full py-4 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition transform hover:-translate-y-1 uppercase tracking-widest">
                            Update Competition
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection