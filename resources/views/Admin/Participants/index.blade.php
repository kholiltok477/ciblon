@extends('layouts.admin')

@section('content')
  <div class="mb-6 flex justify-between items-center">
    <div>
      <h2 class="text-2xl font-bold text-gray-800">Participants List</h2>
      <p class="text-gray-500 text-sm">Manage registered participants for competitions.</p>
    </div>
    <div class="flex space-x-2">
      <a href="{{ route('admin.participants.export.excel') }}"
        class="px-4 py-2 bg-green-600 text-white rounded-xl text-sm font-semibold shadow hover:bg-green-700 transition flex items-center">
        <i class="bi bi-file-earmark-excel mr-2"></i> Export Excel
      </a>
      <a href="{{ route('admin.participants.export.pdf') }}"
        class="px-4 py-2 bg-red-600 text-white rounded-xl text-sm font-semibold shadow hover:bg-red-700 transition flex items-center">
        <i class="bi bi-file-earmark-pdf mr-2"></i> Export PDF
      </a>
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
          <tr class="bg-gray-50 text-xs uppercase text-gray-500 font-semibold tracking-wider border-b border-gray-100">
            <th class="px-6 py-4">#</th>
            <th class="px-6 py-4">Full Name</th>
            <th class="px-6 py-4">Category</th>
            <th class="px-6 py-4">Status</th>
            <th class="px-6 py-4">Registered Date</th>
            <th class="px-6 py-4 text-right">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($participants as $p)
            <tr class="hover:bg-gray-50 transition-colors group">
              <td class="px-6 py-4 text-gray-500 text-sm">{{ $loop->iteration }}</td>
              <td class="px-6 py-4 font-medium text-gray-900">{{ $p->full_name }}</td>
              <td class="px-6 py-4 text-gray-600 text-sm">{{ $p->category?->name ?? '-' }}</td>
              <td class="px-6 py-4">
                @if($p->status === 'verified')
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">Verified</span>
                @elseif($p->status === 'rejected')
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">Rejected</span>
                @else
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">{{ ucfirst($p->status) }}</span>
                @endif
              </td>
              <td class="px-6 py-4 text-gray-500 text-sm">{{ $p->created_at->format('d M Y') }}</td>
              <td class="px-6 py-4 text-right">
                <a href="{{ route('admin.participants.show', $p) }}"
                  class="text-blue-600 hover:underline text-sm font-medium">
                  Review
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-6 py-8 text-center text-gray-500">No participants found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100">
      {{ $participants->links() }}
    </div>
  </div>
@endsection