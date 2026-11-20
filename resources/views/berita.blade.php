@extends('layouts.app')

@section('title', 'Kabar & Berita Desa Kepyar - Informasi Terkini & Kegiatan Warga')
@section('meta_description', 'Simak kabar terkini, liputan pembangunan, kegiatan warga, dan pengumuman resmi Pemerintah Desa Kepyar, Kecamatan Purwantoro, Kabupaten Wonogiri.')
@section('meta_keywords', 'Berita Desa Kepyar, Kabar Kepyar Wonogiri, Pembangunan Kepyar, Pengumuman Desa Kepyar, Informasi Purwantoro')

@section('content')
<!-- Header Page Banner -->
<section class="relative bg-slate-900 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-slate-950/80 z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('banner_berita', 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=1200') }}" alt="Berita Desa Kepyar" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block text-xxs font-bold text-emerald-300 uppercase tracking-widest bg-emerald-500/20 px-3.5 py-1.5 rounded-full border border-emerald-500/30 mb-4">
            Kabar & Publikasi Resmi
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold font-display tracking-tight text-white mb-4">
            Warta & Informasi Desa Kepyar
        </h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
            Menyajikan perkembangan pembangunan dusun, geliat UMKM warga, pelestarian adat budaya, serta pengumuman layanan masyarakat secara transparan.
        </p>

        <!-- Search Form -->
        <div class="mt-8 max-w-xl mx-auto">
            <form action="{{ route('berita') }}" method="GET" class="relative">
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <div class="relative flex items-center">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul atau topik berita..." 
                           class="w-full pl-12 pr-28 py-3.5 rounded-2xl bg-white/95 text-slate-800 placeholder-slate-400 font-medium text-sm focus:outline-none focus:ring-4 focus:ring-emerald-500/30 transition-all shadow-lg shadow-black/20">
                    <button type="submit" class="absolute right-2 px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition-all">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Main Content Area -->
<section class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter Chips -->
        <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-12">
            <a href="{{ route('berita', array_filter(['q' => request('q')])) }}" 
               class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold border transition-all {{ !request('kategori') || request('kategori') === 'semua' ? 'bg-emerald-600 border-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-100' }}">
                Semua Kategori
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('berita', array_filter(['kategori' => $cat, 'q' => request('q')])) }}" 
                   class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold border transition-all {{ request('kategori') === $cat ? 'bg-emerald-600 border-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-100' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        @if(request('q') || request('kategori'))
            <div class="mb-8 flex items-center justify-between bg-white px-5 py-3.5 rounded-2xl border border-slate-200 text-xs text-slate-600">
                <div>
                    Menampilkan hasil 
                    @if(request('q')) untuk pencarian <span class="font-bold text-slate-900">"{{ request('q') }}"</span> @endif
                    @if(request('kategori')) pada kategori <span class="font-bold text-emerald-600">{{ request('kategori') }}</span> @endif
                    ({{ $beritaList->total() }} berita ditemukan)
                </div>
                <a href="{{ route('berita') }}" class="font-bold text-rose-600 hover:text-rose-700 underline">Reset Filter</a>
            </div>
        @endif

        @if($beritaList->count() > 0)
            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beritaList as $berita)
                    <article class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:border-emerald-500/20 transition-all duration-300 flex flex-col group">
                        <!-- Image Container -->
                        <div class="relative h-52 sm:h-56 overflow-hidden bg-slate-100">
                            @if($berita->image)
                                <img src="{{ $berita->image }}" alt="{{ $berita->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-tr from-emerald-800 to-teal-700 text-white/50">
                                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-md text-emerald-800 text-xxs font-extrabold uppercase tracking-wider rounded-lg shadow-sm border border-emerald-100">
                                {{ $berita->category }}
                            </span>
                            <span class="absolute bottom-3 right-4 px-2.5 py-1 bg-slate-900/70 backdrop-blur-sm text-white text-xxs font-semibold rounded-md flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                {{ number_format($berita->views) }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center text-slate-400 text-xxs font-semibold space-x-3 mb-2.5">
                                    <span class="flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $berita->published_at ? $berita->published_at->format('d M Y') : $berita->created_at->format('d M Y') }}
                                    </span>
                                    <span>•</span>
                                    <span>{{ $berita->reading_time }} mnt baca</span>
                                </div>
                                <h2 class="text-lg font-bold font-display text-slate-900 group-hover:text-emerald-600 transition-colors line-clamp-2 mb-2 leading-snug">
                                    <a href="{{ route('berita.detail', $berita->slug) }}">
                                        {{ $berita->title }}
                                    </a>
                                </h2>
                                <p class="text-xs sm:text-sm text-slate-500 line-clamp-3 leading-relaxed mb-4">
                                    {{ $berita->excerpt }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xxs font-medium text-slate-400 truncate max-w-[150px]">
                                    Oleh: <strong class="text-slate-600">{{ $berita->author }}</strong>
                                </span>
                                <a href="{{ route('berita.detail', $berita->slug) }}" class="inline-flex items-center text-xs font-bold text-emerald-600 group-hover:text-emerald-700 transition-colors">
                                    <span>Baca</span>
                                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $beritaList->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 max-w-lg mx-auto shadow-sm">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800 font-display mb-1">Belum Ada Berita</h3>
                <p class="text-xs sm:text-sm text-slate-500 mb-6">
                    Tidak ditemukan berita dengan kata kunci atau kategori yang Anda pilih. Silakan gunakan kata kunci lain.
                </p>
                <a href="{{ route('berita') }}" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-emerald-600 text-white font-bold text-xs shadow-md hover:bg-emerald-700 transition-all">
                    Lihat Semua Berita
                </a>
            </div>
        @endif

    </div>
</section>
@endsection
