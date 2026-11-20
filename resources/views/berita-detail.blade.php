@extends('layouts.app')

@section('title', $berita->title . ' - Desa Kepyar')
@section('meta_description', Str::limit(strip_tags($berita->excerpt), 160))
@section('meta_keywords', 'Berita ' . $berita->category . ', Desa Kepyar, Wonogiri, ' . $berita->title)

@section('content')
<!-- Detail Header & Breadcrumb -->
<section class="bg-slate-900 text-white pt-12 pb-20 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-xxs font-bold text-slate-400 uppercase tracking-wider mb-6">
            <a href="{{ route('home') }}" class="hover:text-emerald-400 transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita') }}" class="hover:text-emerald-400 transition-colors">Kabar & Berita</a>
            <span>/</span>
            <span class="text-emerald-400 truncate max-w-[200px]">{{ $berita->category }}</span>
        </nav>

        <!-- Category & Badges -->
        <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="px-3.5 py-1 bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-xxs font-extrabold uppercase tracking-widest rounded-full">
                {{ $berita->category }}
            </span>
            <span class="text-xxs text-slate-400 font-medium flex items-center">
                <svg class="w-3.5 h-3.5 mr-1 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $berita->reading_time }} menit membaca
            </span>
            <span class="text-xxs text-slate-400 font-medium flex items-center">
                <svg class="w-3.5 h-3.5 mr-1 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                {{ number_format($berita->views) }} kali dibaca
            </span>
        </div>

        <!-- Title -->
        <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold font-display leading-tight text-white mb-6">
            {{ $berita->title }}
        </h1>

        <!-- Author & Date -->
        <div class="flex items-center space-x-4 pt-4 border-t border-slate-800">
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center font-bold text-white text-sm shadow-md">
                {{ substr($berita->author, 0, 1) }}
            </div>
            <div>
                <span class="block text-sm font-bold text-white">{{ $berita->author }}</span>
                <span class="block text-xxs text-slate-400 font-medium">
                    Diterbitkan {{ $berita->published_at ? $berita->published_at->isoFormat('D MMMM Y') : $berita->created_at->isoFormat('D MMMM Y') }}
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content Body -->
<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Featured Image Card -->
        @if($berita->image)
            <div class="-mt-20 mb-10 rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 aspect-video">
                <img src="{{ $berita->image }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Content Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-12 shadow-sm border border-slate-100">
            <!-- Excerpt Highlight -->
            <div class="p-5 rounded-2xl bg-emerald-50/60 border border-emerald-100/80 text-emerald-900 font-medium text-sm sm:text-base leading-relaxed mb-8">
                {{ $berita->excerpt }}
            </div>

            <!-- Full Article Body -->
            <div class="prose prose-slate prose-emerald max-w-none text-slate-700 leading-relaxed text-sm sm:text-base">
                {!! nl2br($berita->content) !!}
            </div>

            <!-- Share & Back Section -->
            <div class="mt-12 pt-8 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4" x-data="{ copied: false }">
                <div class="flex items-center space-x-3">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Bagikan:</span>
                    <!-- WhatsApp Share -->
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->title . ' ' . url()->current()) }}" target="_blank" class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition-colors" title="Bagikan ke WhatsApp">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                    </a>
                    <!-- Facebook Share -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-colors" title="Bagikan ke Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/>
                        </svg>
                    </a>
                    <!-- Copy Link -->
                    <button @click="navigator.clipboard.writeText('{{ url()->current() }}'); copied = true; setTimeout(() => copied = false, 2000)" 
                            class="px-3 py-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-bold flex items-center space-x-1.5 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                        <span x-text="copied ? 'Tersalin!' : 'Salin Tautan'"></span>
                    </button>
                </div>

                <a href="{{ route('berita') }}" class="inline-flex items-center text-xs font-bold text-slate-600 hover:text-emerald-600 transition-colors">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Semua Berita
                </a>
            </div>
        </div>

        <!-- Related News Section -->
        @if($relatedBeritas->count() > 0)
            <div class="mt-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <span class="text-xxs font-extrabold uppercase tracking-widest text-emerald-600 block">Rekomendasi Bacaan</span>
                        <h3 class="text-xl sm:text-2xl font-bold font-display text-slate-900">Kabar Lainnya dari Desa Kepyar</h3>
                    </div>
                    <a href="{{ route('berita') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Lihat Semua &rarr;</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedBeritas as $rel)
                        <a href="{{ route('berita.detail', $rel->slug) }}" class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all group flex flex-col">
                            <div class="h-40 bg-slate-100 overflow-hidden relative">
                                @if($rel->image)
                                    <img src="{{ $rel->image }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full bg-gradient-to-tr from-emerald-800 to-teal-700 flex items-center justify-center text-white/40">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                                <span class="absolute top-2.5 left-2.5 px-2 py-0.5 bg-white/90 backdrop-blur-sm text-emerald-800 text-xxs font-extrabold uppercase tracking-wider rounded">
                                    {{ $rel->category }}
                                </span>
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <h4 class="text-sm font-bold text-slate-900 group-hover:text-emerald-600 line-clamp-2 leading-snug mb-2 transition-colors">
                                    {{ $rel->title }}
                                </h4>
                                <span class="text-xxs text-slate-400 font-medium">
                                    {{ $rel->published_at ? $rel->published_at->format('d M Y') : $rel->created_at->format('d M Y') }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection
