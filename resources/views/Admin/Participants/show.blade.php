@extends('layouts.admin')

@section('content')
  <div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
      <div>
        <h2 class="text-2xl font-bold text-gray-800">Participant Detail</h2>
        <p class="text-gray-500 text-sm">Review participant information and payment status.</p>
      </div>
      <a href="{{ route('admin.participants.index') }}"
        class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center">
        <i class="bi bi-arrow-left mr-1"></i> Back to List
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

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Main Info -->
      <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
          <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Personal Information</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Full Name</label>
              <p class="text-gray-900 font-medium text-lg">{{ $participant->full_name }}</p>
            </div>
            <div>
              <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Category</label>
              <p class="text-gray-900 font-medium">{{ $participant->category?->name ?? 'N/A' }}</p>
            </div>
            <div>
              <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Email</label>
              <p class="text-gray-900">{{ $participant->email }}</p>
            </div>
            <div>
              <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Phone</label>
              <p class="text-gray-900">{{ $participant->phone }}</p>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
          <h3 class="text-lg font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Verification Actions</h3>

          <div class="flex items-center gap-4">
            <form action="{{ route('admin.participants.verify', $participant) }}" method="POST">
              @csrf
              <button type="submit"
                class="px-6 py-2.5 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition shadow-md hover:shadow-lg">
                <i class="bi bi-check-lg mr-2"></i> Verify Participant
              </button>
            </form>

            <div x-data="{ open: false }">
              <button @click="open = !open"
                class="px-6 py-2.5 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition shadow-md hover:shadow-lg">
                <i class="bi bi-x-lg mr-2"></i> Reject
              </button>

              <div x-show="open" x-transition class="mt-4 p-4 border border-red-100 rounded-xl bg-red-50">
                <form action="{{ route('admin.participants.reject', $participant) }}" method="POST">
                  @csrf
                  <textarea name="notes"
                    class="w-full rounded-lg border-red-200 focus:border-red-500 focus:ring-red-500 text-sm"
                    placeholder="Reason for rejection..." required></textarea>
                  <div class="mt-2 flex justify-end">
                    <button type="submit"
                      class="px-4 py-2 bg-red-600 text-white text-sm font-bold rounded-lg hover:bg-red-700">
                      Confirm Rejection
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar Info -->
      <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">
          <h3 class="text-xs font-bold text-gray-500 mb-4 uppercase tracking-wider">Profile Photo</h3>
          <div class="mx-auto w-32 h-32 rounded-2xl overflow-hidden bg-gray-100 border-4 border-white shadow-sm mb-4">
            @if($participant->photoUrl())
              <img src="{{ $participant->photoUrl() }}" alt="foto" class="w-full h-full object-cover">
            @else
              <div class="w-full h-full flex items-center justify-center text-gray-300">
                <i class="bi bi-person-fill text-5xl"></i>
              </div>
            @endif
          </div>
          <p class="text-sm font-medium text-gray-900">{{ $participant->full_name }}</p>
          <p class="text-xs text-gray-500">Registered: {{ $participant->created_at->format('d M Y') }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
          <h3 class="text-xs font-bold text-gray-500 mb-4 uppercase tracking-wider">Payment Status</h3>
          <div class="mb-4">
            @if($participant->status === 'verified')
              <span
                class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-green-100 text-green-800 border border-green-200 w-full justify-center">
                <i class="bi bi-check-circle-fill mr-2"></i> Verified
              </span>
            @elseif($participant->status === 'rejected')
              <span
                class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-red-100 text-red-800 border border-red-200 w-full justify-center">
                <i class="bi bi-x-circle-fill mr-2"></i> Rejected
              </span>
            @else
              <span
                class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800 border border-yellow-200 w-full justify-center">
                <i class="bi bi-hourglass-split mr-2"></i> Pending
              </span>
            @endif
          </div>

          @if($participant->paymentUrl())
            <a href="{{ $participant->paymentUrl() }}" target="_blank"
              class="flex items-center justify-center w-full px-4 py-2 bg-blue-50 text-blue-600 rounded-xl text-sm font-bold border border-blue-100 hover:bg-blue-100 transition">
              <i class="bi bi-file-earmark-image mr-2"></i> View Payment Proof
            </a>
          @else
            <p class="text-xs text-center text-gray-400 italic">No payment proof uploaded</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection