@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Events Management</h2>
            <p class="text-gray-500 text-sm">Review, approve, and manage event submissions.</p>
        </div>
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
                        <th class="px-6 py-4">Event</th>
                        <th class="px-6 py-4">Details</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Submitted By</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($events as $event)
                        <tr class="hover:bg-gray-50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($event->poster_path)
                                        <img src="{{ Storage::url($event->poster_path) }}"
                                            class="w-16 h-20 object-cover rounded-lg shadow-sm">
                                    @else
                                        <div
                                            class="w-16 h-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                            <i class="bi bi-image text-2xl"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $event->organizer_name }}</h4>
                                        <span
                                            class="text-xs text-gray-500 uppercase tracking-wide">{{ $event->category ?? 'General' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div class="flex flex-col gap-1">
                                    <span class="flex items-center gap-2"><i class="bi bi-tag text-blue-400"></i>
                                        {{ ucfirst($event->package_name) }}</span>
                                    <span class="flex items-center gap-2"><i class="bi bi-cash text-green-400"></i> Rp
                                        {{ number_format($event->package_price, 0, ',', '.') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($event->status === 'approved')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                        <i class="bi bi-patch-check-fill mr-1"></i> Approved
                                    </span>
                                @elseif($event->status === 'pending')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200 animate-pulse">
                                        <i class="bi bi-clock-history mr-1"></i> Pending Review
                                    </span>
                                @elseif($event->status === 'pending_payment')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                        <i class="bi bi-wallet2 mr-1"></i> Waiting Proof
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200 uppercase tracking-tighter">
                                        {{ $event->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $event->user->name ?? 'Unknown' }}<br>
                                <span class="text-xs text-gray-400">{{ $event->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors border border-blue-100 shadow-sm"
                                        title="Review & Edit Status">
                                        <i class="bi bi-pencil-square mr-1"></i> <span class="text-xs font-bold">Review</span>
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors border border-red-50"
                                            title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-100">
            {{ $events->links() }}
        </div>
    </div>
@endsection