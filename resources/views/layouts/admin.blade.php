<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard - Desa Kepyar')</title>

    <!-- Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ \App\Models\SiteSetting::getValue('site_favicon', '/favicon.ico') }}">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-slate-50 text-slate-800 antialiased flex min-h-screen" x-data="{ sidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false" 
         class="fixed inset-0 z-40 bg-slate-900/40 backdrop-blur-sm lg:hidden"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         style="display: none;">
    </div>

    <!-- Sidebar Navigation -->
    <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-400 flex flex-col justify-between transform transition-transform duration-300 lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div>
            <!-- Sidebar Header -->
            <div class="h-20 flex items-center px-6 border-b border-slate-800 justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500 flex items-center justify-center shadow-md">
                        <span class="text-white font-bold text-sm">K</span>
                    </div>
                    <div>
                        <span class="block text-sm font-extrabold text-white tracking-wide">Admin Portal</span>
                        <span class="block text-xxs text-slate-500 font-medium">Desa Kepyar</span>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar Navigation Links -->
            <nav class="p-4 space-y-1.5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Ringkasan</span>
                </a>
                <a href="{{ route('admin.wisata.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.wisata.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Kelola Wisata</span>
                </a>
                <a href="{{ route('admin.umkm.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.umkm.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Kelola UMKM</span>
                </a>
                <a href="{{ route('admin.event.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.event.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Kelola Event</span>
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.gallery.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Kelola Galeri</span>
                </a>
                <a href="{{ route('admin.faq.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.faq.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Kelola FAQ</span>
                </a>
                <a href="{{ route('admin.aparatur.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.aparatur.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Aparatur Desa</span>
                </a>
                <a href="{{ route('admin.dusun.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.dusun.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Wilayah Dusun</span>
                </a>
                <a href="{{ route('admin.testimonial.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.testimonial.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                        <span>Moderasi Ulasan</span>
                    </div>
                    @php
                        $pendingCount = \App\Models\Testimonial::where('status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <span class="px-2 py-0.5 text-xxs font-extrabold bg-amber-500 text-white rounded-full leading-none">{{ $pendingCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.messages.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Kotak Masuk</span>
                    </div>
                    @php
                        $unreadCount = \App\Models\ContactMessage::where('status', 'unread')->count();
                    @endphp
                    @if($unreadCount > 0)
                        <span class="px-2 py-0.5 text-xxs font-extrabold bg-rose-500 text-white rounded-full leading-none">{{ $unreadCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Pengaturan Tampilan</span>
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.profile.*') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'hover:bg-slate-800 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Pengaturan Profil</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer & Logout -->
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-4 py-2.5 rounded-xl text-xs font-bold text-slate-400 hover:bg-slate-800 hover:text-white mb-2 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                <span>Lihat Website</span>
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2.5 rounded-xl text-xs font-bold text-rose-400 hover:bg-rose-950/20 hover:text-rose-300 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Keluar (Logout)</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-h-screen overflow-x-hidden lg:pl-64">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-100 px-6 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <button @click="sidebarOpen = true" class="p-2 rounded-lg hover:bg-slate-50 text-slate-500 lg:hidden focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h2 class="text-lg font-bold text-slate-800">@yield('page_title', 'Ringkasan')</h2>
            </div>
            
            <a href="{{ route('admin.profile.edit') }}" class="flex items-center space-x-3 group hover:opacity-85 transition-opacity">
                <div class="text-right hidden sm:block">
                    <span class="block text-sm font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">{{ Auth::user()->name }}</span>
                    <span class="block text-xxs font-medium text-slate-400 uppercase tracking-wide">Administrator</span>
                </div>
                <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm group-hover:bg-emerald-200 transition-colors">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </a>
        </header>

        <!-- Dynamic Content Body -->
        <main class="p-6 sm:p-8 flex-grow">
            <!-- Global Floating Toast Notification -->
            @if(session('success'))
                <div x-data="{ show: true }"
                     x-show="show"
                     x-init="setTimeout(() => show = false, 4000)"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:translate-x-4"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed bottom-6 right-6 z-50 flex items-center space-x-3 p-4 bg-slate-900 text-white rounded-2xl shadow-2xl max-w-sm border border-slate-800"
                     x-cloak>
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-grow pr-4">
                        <p class="text-xs font-bold text-white mb-0.5">Sukses</p>
                        <p class="text-xxs font-medium text-slate-400 leading-normal">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-slate-500 hover:text-white transition-colors focus:outline-none shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif

            @yield('admin_content')
        </main>
    </div>

</body>
</html>
