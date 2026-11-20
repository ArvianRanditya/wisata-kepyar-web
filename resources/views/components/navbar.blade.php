<nav x-data="{ openMobile: false, openProfile: false }" 
     class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100 shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Brand/Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 transition-transform">
                        <span class="text-white font-bold text-lg font-display">K</span>
                    </div>
                    <div>
                        <span class="block text-lg font-extrabold text-slate-900 tracking-tight group-hover:text-emerald-600 transition-colors">Desa Kepyar</span>
                        <span class="block text-xs text-slate-500 font-medium tracking-wider uppercase">Purwantoro, Wonogiri</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('home') ? 'text-emerald-600 bg-emerald-50/50' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-50' }} transition-all">
                    Beranda
                </a>

                <!-- Profil Dropdown -->
                <div class="relative" @click.away="openProfile = false">
                    <button @click="openProfile = !openProfile" class="flex items-center space-x-1 px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('profil') ? 'text-emerald-600 bg-emerald-50/50' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-50' }} transition-all focus:outline-none">
                        <span>Profil Desa</span>
                        <svg class="w-4 h-4 transform transition-transform duration-200" :class="openProfile ? 'rotate-180 text-emerald-600' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Panel -->
                    <div x-show="openProfile"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                         class="absolute right-0 mt-2 w-56 rounded-xl bg-white border border-slate-100 shadow-xl shadow-slate-100/40 py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('profil') }}#identitas" @click="openProfile = false" class="block px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium">Profil & Demografi</a>
                        <a href="{{ route('profil') }}#sejarah" @click="openProfile = false" class="block px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium">Sejarah & Visi Misi</a>
                        <a href="{{ route('profil') }}#geografis" @click="openProfile = false" class="block px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium">Geografis</a>
                        <a href="{{ route('profil') }}#pemerintahan" @click="openProfile = false" class="block px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium">Struktur Pemerintahan</a>
                    </div>
                </div>

                <a href="{{ route('wisata') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('wisata') ? 'text-emerald-600 bg-emerald-50/50' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-50' }} transition-all">
                    Wisata Alam
                </a>
                
                <a href="{{ route('budaya') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('budaya') ? 'text-emerald-600 bg-emerald-50/50' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-50' }} transition-all">
                    Seni & Budaya
                </a>

                <a href="{{ route('umkm') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('umkm') ? 'text-emerald-600 bg-emerald-50/50' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-50' }} transition-all">
                    UMKM & Produk
                </a>

                <a href="{{ route('event') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('event') ? 'text-emerald-600 bg-emerald-50/50' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-50' }} transition-all">
                    Event
                </a>

                <a href="{{ route('berita') }}" class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('berita*') ? 'text-emerald-600 bg-emerald-50/50' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-50' }} transition-all">
                    Berita
                </a>

                <a href="{{ route('galeri-kontak') }}" class="ml-2 inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 shadow-md shadow-emerald-500/10 hover:shadow-lg hover:shadow-emerald-500/20 active:scale-95 transition-all">
                    Hubungi Kami
                </a>
            </div>

            <!-- Hamburger Button for Mobile -->
            <div class="flex items-center md:hidden">
                <button @click="openMobile = !openMobile" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-emerald-600 hover:bg-slate-50 focus:outline-none transition-all">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!openMobile" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="openMobile" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="openMobile"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden border-b border-slate-100 bg-white"
         style="display: none;">
        <div class="px-2 pt-2 pb-4 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('home') ? 'text-emerald-600 bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }}">
                Beranda
            </a>

            <!-- Mobile Dropdown Group -->
            <div class="space-y-1">
                <div class="px-3 py-2 text-xs font-bold text-slate-400 uppercase tracking-wider">
                    Profil Desa
                </div>
                <a href="{{ route('profil') }}#identitas" @click="openMobile = false" class="block pl-6 pr-3 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50">Identitas & Demografi</a>
                <a href="{{ route('profil') }}#sejarah" @click="openMobile = false" class="block pl-6 pr-3 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50">Sejarah & Visi Misi</a>
                <a href="{{ route('profil') }}#geografis" @click="openMobile = false" class="block pl-6 pr-3 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50">Geografis</a>
                <a href="{{ route('profil') }}#pemerintahan" @click="openMobile = false" class="block pl-6 pr-3 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50">Struktur Pemerintahan</a>
            </div>

            <div class="border-t border-slate-100 my-2"></div>

            <a href="{{ route('wisata') }}" class="block px-3 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('wisata') ? 'text-emerald-600 bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }}">
                Wisata Alam
            </a>
            
            <a href="{{ route('budaya') }}" class="block px-3 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('budaya') ? 'text-emerald-600 bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }}">
                Seni & Budaya
            </a>

            <a href="{{ route('umkm') }}" class="block px-3 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('umkm') ? 'text-emerald-600 bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }}">
                UMKM & Produk
            </a>

            <a href="{{ route('event') }}" class="block px-3 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('event') ? 'text-emerald-600 bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }}">
                Event
            </a>

            <a href="{{ route('berita') }}" class="block px-3 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('berita*') ? 'text-emerald-600 bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }}">
                Berita
            </a>

            <a href="{{ route('galeri-kontak') }}" class="block px-3 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('galeri-kontak') ? 'text-emerald-600 bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }}">
                Galeri & Kontak
            </a>
        </div>
    </div>
</nav>
