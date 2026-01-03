@extends('layouts.app')

@section('title', 'Selenggarakan Lomba - Ciblón Wonosobo')

@section('content')
    <div class="bg-gray-900 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="text-base font-semibold leading-7 text-blue-400">Selenggarakan Lomba</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl">Publikasikan Event Renang Anda</p>
            </div>
            <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-300">
                Jangkau ribuan atlet renang potensial di Wonosobo dan sekitarnya dengan paket publikasi yang terjangkau.
            </p>

            <div
                class="isolate mx-auto mt-16 grid max-w-md grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                <!-- Paket Minggu -->
                <div
                    class="flex flex-col justify-between rounded-3xl bg-white/5 p-8 ring-1 ring-white/10 xl:p-10 hover:bg-white/10 transition-colors">
                    <div>
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-weekly" class="text-lg font-semibold leading-8 text-white">Mingguan</h3>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-300">Cocok untuk publikasi event skala kecil atau
                            deadline dekat.</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">Rp 5.000</span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/minggu</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Tayang selama 7 hari
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Listing di halaman Lomba
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                1x Instagram Story Share
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('publications.create', ['package' => 'weekly']) }}" aria-describedby="tier-weekly"
                        class="mt-8 block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Pilih
                        Paket ini</a>
                </div>

                <!-- Paket Bulanan -->
                <div
                    class="flex flex-col justify-between rounded-3xl bg-white/5 p-8 ring-1 ring-white/10 xl:p-10 hover:bg-white/10 transition-colors relative">
                    <div
                        class="absolute -top-4 left-0 right-0 mx-auto w-32 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 py-1 text-center text-xs font-bold text-white shadow">
                        TERPOPULER</div>
                    <div>
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-monthly" class="text-lg font-semibold leading-8 text-white">Bulanan</h3>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-300">Pilihan terbaik untuk menjangkau audiens yang lebih
                            luas.</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">Rp 17.000</span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/bulan</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Tayang selama 30 hari
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Prioritas Listing di halaman Lomba
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                1x Post Feed Instagram
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                2x Instagram Story Share
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('publications.create', ['package' => 'monthly']) }}" aria-describedby="tier-monthly"
                        class="mt-8 block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Pilih
                        Paket ini</a>
                </div>

                <!-- Paket 2 Bulan -->
                <div
                    class="flex flex-col justify-between rounded-3xl bg-white/5 p-8 ring-1 ring-white/10 xl:p-10 hover:bg-white/10 transition-colors">
                    <div>
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-extended" class="text-lg font-semibold leading-8 text-white">2 Bulan - Premium</h3>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-300">Maksimalkan eksposur untuk event besar Anda.</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">Rp 37.000</span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/2 bulan</span>
                        </p>
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Tayang selama 60 hari
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Top Listing (Featured)
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                4x Post Feed Instagram
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Weekly Story Share
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('publications.create', ['package' => 'premium']) }}" aria-describedby="tier-extended"
                        class="mt-8 block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Pilih
                        Paket ini</a>
                </div>
            </div>
        </div>
    </div>
@endsection