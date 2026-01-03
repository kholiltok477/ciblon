@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Add Competition Result</h2>
                <p class="text-gray-500 text-sm">Assign a rank and time to a verified participant.</p>
            </div>
            <a href="{{ route('admin.results.index') }}"
                class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center">
                <i class="bi bi-arrow-left mr-1"></i> Back to List
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('admin.results.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <!-- Participant -->
                    <div>
                        <label for="participant_id" class="block text-sm font-medium text-gray-700 mb-2">Verified
                            Participant</label>
                        <select name="participant_id" id="participant_id" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                            <option value="">Select a participant...</option>
                            @foreach($participants as $p)
                                <option value="{{ $p->id }}" {{ old('participant_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->full_name }} ({{ $p->category?->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Position -->
                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Position /
                                Rank</label>
                            <input type="text" name="position" id="position" value="{{ old('position') }}" required
                                placeholder="e.g. Champion 1, Runner Up"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                            @error('position')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Time -->
                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-700 mb-2">Time (Optional)</label>
                            <input type="text" name="time" id="time" value="{{ old('time') }}" placeholder="e.g. 00:45.32"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                            @error('time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Internal Notes
                            (Optional)</label>
                        <textarea name="notes" id="notes" rows="3"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-xl shadow hover:bg-blue-700 transition transform hover:-translate-y-0.5">
                        Save Result
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection