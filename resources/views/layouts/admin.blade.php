<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ciblón Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .custom-scrollbar:hover::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
        }

        main.overflow-y-auto::-webkit-scrollbar {
            width: 8px;
        }

        main.overflow-y-auto::-webkit-scrollbar-track {
            background: transparent;
        }

        main.overflow-y-auto::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        main.overflow-y-auto:hover::-webkit-scrollbar-thumb {
            background: #cbd5e1;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transition-transform duration-300 ease-in-out transform lg:static lg:translate-x-0 flex flex-col h-screen"
            :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            <div class="flex-shrink-0 flex items-center justify-center h-20 bg-slate-950 border-b border-slate-800">
                <h1 class="text-2xl font-bold tracking-wider">Ciblón<span class="text-blue-500">.</span></h1>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto mt-4 px-4 pb-10 space-y-2 custom-scrollbar">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-speedometer2 text-xl mr-3 {{ request()->routeIs('admin.dashboard') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <p class="px-4 mt-8 pb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Management</p>

                <a href="{{ route('admin.events.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.events.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-calendar-event text-xl mr-3 {{ request()->routeIs('admin.events.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Events</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-people text-xl mr-3 {{ request()->routeIs('admin.users.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Users</span>
                </a>

                <a href="{{ route('admin.participants.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.participants.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-person-check text-xl mr-3 {{ request()->routeIs('admin.participants.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Participants</span>
                </a>

                <a href="{{ route('admin.results.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.results.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-trophy text-xl mr-3 {{ request()->routeIs('admin.results.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Match Results</span>
                </a>

                <a href="{{ route('admin.team.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.team.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-people-fill text-xl mr-3 {{ request()->routeIs('admin.team.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Team Members</span>
                </a>

                <p class="px-4 mt-8 pb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Content</p>

                <a href="{{ route('admin.news.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.news.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-newspaper text-xl mr-3 {{ request()->routeIs('admin.news.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">News / Berita</span>
                </a>

                <a href="{{ route('admin.competitions.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.competitions.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-calendar-check text-xl mr-3 {{ request()->routeIs('admin.competitions.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Organize Lomba</span>
                </a>

                <a href="{{ route('admin.settings.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-colors group {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-slate-100 shadow-lg shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <i
                        class="bi bi-pencil-square text-xl mr-3 {{ request()->routeIs('admin.settings.*') ? '' : 'group-hover:text-blue-400' }}"></i>
                    <span class="font-medium">Landing Page CRUD</span>
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-colors group">
                    <i class="bi bi-wallet2 text-xl mr-3 group-hover:text-blue-400"></i>
                    <span class="font-medium">Payments</span>
                </a>

                <p class="px-4 mt-8 pb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">System</p>

                <a href="{{ route('home') }}"
                    class="flex items-center px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-colors group">
                    <i class="bi bi-box-arrow-up-right text-xl mr-3 group-hover:text-green-400"></i>
                    <span class="font-medium">View Website</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Topbar -->
            <header class="bg-white shadow-sm h-20 flex items-center justify-between px-6 lg:px-8 z-40">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="text-gray-500 hover:text-gray-900 focus:outline-none lg:hidden">
                    <i class="bi bi-list text-3xl"></i>
                </button>

                <h2 class="text-xl font-semibold text-gray-800 hidden lg:block">Admin Dashboard</h2>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">Welcome, {{ auth()->user()->name }}</span>
                    <div
                        class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold border border-blue-200">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Content Body -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6 lg:p-8">
                @yield('content')
            </main>
        </div>

        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 lg:hidden"></div>
    </div>
</body>

</html>