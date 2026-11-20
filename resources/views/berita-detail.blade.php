@extends('layouts.app')

@section('title', $berita->title . ' - Kabar Desa Kepyar')
@section('meta_description', Str::limit(strip_tags($berita->excerpt), 160))
@section('meta_keywords', 'Berita ' . $berita->category . ', Desa Kepyar, Wonogiri, ' . $berita->title)

@section('content')
<!-- Editorial Article Section -->
<article class="bg-white min-h-screen">
    <!-- Header & Meta Area -->
    <header class="pt-10 pb-8 border-b border-slate-100 bg-gradient-to-b from-slate-50/70 to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs font-semibold text-slate-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-emerald-600 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('berita') }}" class="hover:text-emerald-600 transition-colors">Kabar & Berita</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-600 font-bold truncate max-w-[200px]">{{ $berita->category }}</span>
            </nav>

            <!-- Meta Badges: Category, Reading Time, Views -->
            <div class="flex flex-wrap items-center gap-2.5 sm:gap-3 mb-5">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200/60 shadow-xs">
                    {{ $berita->category }}
                </span>
                <span class="inline-flex items-center text-xs font-semibold text-slate-500 bg-slate-100 px-3 py-1 rounded-full">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $berita->reading_time }} menit baca
                </span>
                <span class="inline-flex items-center text-xs font-semibold text-slate-500 bg-slate-100 px-3 py-1 rounded-full">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ number_format($berita->views) }} dilihat
                </span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-display text-slate-900 tracking-tight leading-[1.2] mb-6">
                {{ $berita->title }}
            </h1>

            <!-- Author & Publish Date Row with Quick Share -->
            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4" x-data="{ copied: false }">
                <!-- Author Info -->
                <div class="flex items-center space-x-3.5">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-500 text-white font-extrabold flex items-center justify-center text-base shadow-md shadow-emerald-500/20">
                        {{ strtoupper(substr($berita->author, 0, 1)) }}
                    </div>
                    <div>
                        <div class="flex items-center space-x-1.5">
                            <span class="text-sm font-extrabold text-slate-900">{{ $berita->author }}</span>
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-xs text-slate-500 font-medium">
                            Diterbitkan {{ $berita->published_at ? $berita->published_at->isoFormat('D MMMM Y') : $berita->created_at->isoFormat('D MMMM Y') }}
                        </span>
                    </div>
                </div>

                <!-- Quick Share Bar -->
                <div class="flex items-center space-x-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Bagikan:</span>
                    <!-- WhatsApp -->
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->title . ' - ' . url()->current()) }}" target="_blank" 
                       class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition-all duration-200 shadow-xs" title="Bagikan ke WhatsApp">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                    </a>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" 
                       class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-all duration-200 shadow-xs" title="Bagikan ke Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/>
                        </svg>
                    </a>
                    <!-- Copy Link -->
                    <button @click="navigator.clipboard.writeText('{{ url()->current() }}'); copied = true; setTimeout(() => copied = false, 2000)" 
                            class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold flex items-center space-x-1.5 transition-all duration-200 shadow-xs">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                        <span x-text="copied ? 'Tersalin!' : 'Salin'"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Article Body -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Featured Image Card -->
        @if($berita->image)
            <div class="mb-10 rounded-3xl overflow-hidden shadow-lg border border-slate-100 aspect-video bg-slate-100 relative group">
                <img src="{{ $berita->image }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/60 to-transparent p-4 sm:p-6 text-white text-xs font-medium opacity-90">
                    <span class="block">Dokumentasi Liputan &bull; Desa Kepyar, Kec. Purwantoro</span>
                </div>
            </div>
        @endif

        <!-- Content Container -->
        <div class="max-w-3xl mx-auto">
            <!-- Excerpt Lead Box -->
            <div class="p-6 sm:p-7 rounded-2xl bg-emerald-50/70 border-l-4 border-emerald-500 text-emerald-950 font-medium text-base sm:text-lg leading-relaxed mb-8 shadow-xs">
                {{ $berita->excerpt }}
            </div>

            <!-- Full Body Text -->
            <div class="prose prose-slate lg:prose-lg max-w-none text-slate-800 leading-relaxed text-base sm:text-lg font-normal space-y-6">
                {!! nl2br($berita->content) !!}
            </div>

            <!-- Author Box Card -->
            <div class="mt-14 p-6 sm:p-8 rounded-3xl bg-slate-50 border border-slate-100 flex flex-col sm:flex-row items-center sm:items-start gap-5">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-500 text-white font-black text-2xl flex items-center justify-center shadow-md shrink-0">
                    {{ strtoupper(substr($berita->author, 0, 1)) }}
                </div>
                <div class="text-center sm:text-left space-y-1">
                    <div class="flex items-center justify-center sm:justify-start space-x-2">
                        <h4 class="font-bold text-slate-900 text-base">{{ $berita->author }}</h4>
                        <span class="px-2 py-0.5 rounded-full text-xxs font-extrabold uppercase bg-emerald-100 text-emerald-800">Resmi</span>
                    </div>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Artikel ini diterbitkan secara resmi melalui Sistem Informasi Desa (SID) Kepyar untuk mendukung transparansi publik dan penyebarluasan potensi desa.
                    </p>
                </div>
            </div>

            <!-- Bottom Navigation Bar -->
            <div class="mt-10 pt-8 border-t border-slate-100 flex items-center justify-between">
                <a href="{{ route('berita') }}" class="inline-flex items-center text-sm font-bold text-slate-600 hover:text-emerald-600 transition-colors group">
                    <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Semua Berita</span>
                </a>

                <a href="{{ route('home') }}" class="text-xs font-bold text-slate-400 hover:text-slate-600 transition-colors">
                    Halaman Beranda &rarr;
                </a>
            </div>
        </div>

        <!-- Related News Section -->
        @if($relatedBeritas->count() > 0)
            <div class="mt-20 pt-12 border-t border-slate-200">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <span class="text-xxs font-extrabold uppercase tracking-widest text-emerald-600 block mb-1">Rekomendasi Terkait</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold font-display text-slate-900">Kabar Lainnya dari Desa Kepyar</h3>
                    </div>
                    <a href="{{ route('berita') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 hidden sm:inline-block">
                        Lihat Semua Berita &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedBeritas as $rel)
                        <a href="{{ route('berita.detail', $rel->slug) }}" class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:border-emerald-500/20 transition-all duration-300 group flex flex-col">
                            <div class="h-44 bg-slate-100 overflow-hidden relative">
                                @if($rel->image)
                                    <img src="{{ $rel->image }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-tr from-emerald-800 to-teal-700 flex items-center justify-center text-white/40">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                                <span class="absolute top-3 left-3 px-2.5 py-1 bg-white/95 backdrop-blur-sm text-emerald-800 text-xxs font-extrabold uppercase tracking-wider rounded-lg shadow-xs">
                                    {{ $rel->category }}
                                </span>
                            </div>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="block text-xxs text-slate-400 font-semibold mb-1.5">
                                        {{ $rel->published_at ? $rel->published_at->format('d M Y') : $rel->created_at->format('d M Y') }} &bull; {{ $rel->reading_time }} mnt baca
                                    </span>
                                    <h4 class="text-sm font-bold text-slate-900 group-hover:text-emerald-600 line-clamp-2 leading-snug transition-colors">
                                        {{ $rel->title }}
                                    </h4>
                                </div>
                                <span class="inline-flex items-center text-xs font-bold text-emerald-600 mt-4 group-hover:translate-x-0.5 transition-transform">
                                    Baca artikel &rarr;
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</article>
@endsection
