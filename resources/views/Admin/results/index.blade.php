@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Tournament Results</h2>
            <p class="text-gray-500 text-sm">Manage and publish competition results.</p>
        </div>
        <a href="{{ route('admin.results.create') }}"
            class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-semibold shadow hover:bg-blue-700 transition flex items-center">
            <i class="bi bi-plus-lg mr-2"></i> Add Result
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="bi bi-check-circle-fill text-green-400 text-xl"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr
                        class="bg-gray-50 text-xs uppercase text-gray-500 font-semibold tracking-wider border-b border-gray-100">
                        <th class="px-6 py-4">Participant</th>
                        <th class="px-6 py-4">Position</th>
                        <th class="px-6 py-4">Time</th>
                        <th class="px-6 py-4">Notes</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($results as $result)
                        <tr class="hover:bg-gray-50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-9 w-9 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold border border-blue-100">
                                        {{ substr($result->participant->full_name, 0, 1) }}
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $result->participant->full_name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 font-bold">{{ $result->position }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $result->time ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $result->notes ?? '-' }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Add edit/delete if implemented later -->
                                    <span class="text-xs text-gray-400 italic">Saved</span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">No results found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection