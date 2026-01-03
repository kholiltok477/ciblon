@extends('layouts.app')

@section('title', 'Profile - Ciblón Wonosobo')

@section('content')
    <div class="py-32 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 px-4">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                <!-- Profile Header -->
                <div class="relative h-48 bg-gradient-to-r from-blue-600 to-cyan-500">
                    <div class="absolute -bottom-16 left-8">
                        <div class="relative">
                            @if ($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="h-32 w-32 rounded-full object-cover ring-4 ring-white shadow-lg bg-white">
                            @else
                                <div class="h-32 w-32 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-4xl ring-4 ring-white shadow-lg">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="pt-20 px-8 pb-8">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                            <p class="text-gray-500 text-lg">{{ $user->email }}</p>
                        </div>
                        
                         <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Sign Out
                            </button>
                        </form>
                    </div>

                    <div class="border-t border-gray-100 pt-8">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="border-t border-gray-100 mt-12 pt-12">
                         <header class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Security</h2>
                            <p class="mt-1 text-sm text-gray-600">Ensure your account is using a long, random password to stay secure.</p>
                        </header>
                        @include('profile.partials.update-password-form')
                    </div>
                    
                    <div class="border-t border-gray-100 mt-12 pt-12">
                         <header class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900 text-red-600">Danger Zone</h2>
                        </header>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection