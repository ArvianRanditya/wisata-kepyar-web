@extends('layouts.admin')

@section('title', 'Admin Dashboard - Desa Kepyar')
@section('page_title', 'Ringkasan Portal')

@section('admin_content')
<!-- Welcome Card -->
<div class="bg-gradient-to-br from-slate-900 to-slate-950 rounded-3xl p-8 text-white relative overflow-hidden shadow-lg mb-8">
    <div class="absolute right-0 bottom-0 opacity-10 translate-x-6 translate-y-6">
        <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-6H9v-2h4v8zm0-10h-2V7h2v2z" />
        </svg>
    </div>
    <div class="relative z-10 space-y-3">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xxs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 uppercase tracking-widest">
            Sistem Informasi Desa (SID)
        </span>
        <h3 class="text-2xl sm:text-3xl font-extrabold font-display leading-tight">Selamat Datang, Administrator!</h3>
        <p class="text-xs sm:text-sm text-slate-400 max-w-2xl leading-relaxed">
            Ini adalah panel kontrol mandiri untuk Desa Kepyar. Anda dapat memperbarui informasi paket wisata alam, katalog produk UMKM lokal, jadwal event keagamaan dan adat bulanan/tahunan, serta galeri dokumentasi foto.
        </p>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <!-- Wisata Stat Card -->
    <a href="{{ route('admin.wisata.index') }}" class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-500/10 transition-all flex flex-col justify-between group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <span class="text-xxs font-extrabold text-slate-400 uppercase tracking-wider">Kelola</span>
        </div>
        <div>
            <span class="block text-3xl font-extrabold text-slate-900 font-display">{{ $stats['wisata'] }}</span>
            <span class="block text-xs font-bold text-slate-500 mt-1">Paket Wisata</span>
        </div>
    </a>

    <!-- UMKM Stat Card -->
    <a href="{{ route('admin.umkm.index') }}" class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-500/10 transition-all flex flex-col justify-between group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <span class="text-xxs font-extrabold text-slate-400 uppercase tracking-wider">Kelola</span>
        </div>
        <div>
            <span class="block text-3xl font-extrabold text-slate-900 font-display">{{ $stats['umkm'] }}</span>
            <span class="block text-xs font-bold text-slate-500 mt-1">Produk UMKM</span>
        </div>
    </a>

    <!-- Event Stat Card -->
    <a href="{{ route('admin.event.index') }}" class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-500/10 transition-all flex flex-col justify-between group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <span class="text-xxs font-extrabold text-slate-400 uppercase tracking-wider">Kelola</span>
        </div>
        <div>
            <span class="block text-3xl font-extrabold text-slate-900 font-display">{{ $stats['event'] }}</span>
            <span class="block text-xs font-bold text-slate-500 mt-1">Event Acara</span>
        </div>
    </a>

    <!-- Gallery Stat Card -->
    <a href="{{ route('admin.gallery.index') }}" class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-500/10 transition-all flex flex-col justify-between group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <span class="text-xxs font-extrabold text-slate-400 uppercase tracking-wider">Kelola</span>
        </div>
        <div>
            <span class="block text-3xl font-extrabold text-slate-900 font-display">{{ $stats['gallery'] }}</span>
            <span class="block text-xs font-bold text-slate-500 mt-1">Foto Galeri</span>
        </div>
    </a>

    <!-- Berita Stat Card -->
    <a href="{{ route('admin.berita.index') }}" class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-500/10 transition-all flex flex-col justify-between group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <span class="text-xxs font-extrabold text-slate-400 uppercase tracking-wider">Kelola</span>
        </div>
        <div>
            <span class="block text-3xl font-extrabold text-slate-900 font-display">{{ $stats['berita'] ?? 0 }}</span>
            <span class="block text-xs font-bold text-slate-500 mt-1">Berita & Artikel</span>
        </div>
    </a>

    <!-- Aparatur Stat Card -->
    <a href="{{ route('admin.aparatur.index') }}" class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-500/10 transition-all flex flex-col justify-between group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <span class="text-xxs font-extrabold text-slate-400 uppercase tracking-wider">Kelola</span>
        </div>
        <div>
            <span class="block text-3xl font-extrabold text-slate-900 font-display">{{ $stats['aparatur'] ?? 0 }}</span>
            <span class="block text-xs font-bold text-slate-500 mt-1">Aparatur Desa</span>
        </div>
    </a>

    <!-- Dusun Stat Card -->
    <a href="{{ route('admin.dusun.index') }}" class="bg-white border border-slate-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-500/10 transition-all flex flex-col justify-between group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <span class="text-xxs font-extrabold text-slate-400 uppercase tracking-wider">Kelola</span>
        </div>
        <div>
            <span class="block text-3xl font-extrabold text-slate-900 font-display">{{ $stats['dusun'] ?? 0 }}</span>
            <span class="block text-xs font-bold text-slate-500 mt-1">Wilayah Dusun</span>
        </div>
    </a>
</div>

<!-- Recent Activities Section -->
<div class="mt-12 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-bold text-slate-800 font-display">Aktivitas Konten Terbaru</h3>
        <p class="text-slate-400 text-xxs font-extrabold uppercase tracking-widest">5 Perubahan Terakhir</p>
    </div>

    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm">
        <div class="divide-y divide-slate-100">
            @forelse($activities as $act)
                <div class="py-4 first:pt-0 last:pb-0 flex items-center justify-between space-x-4">
                    <div class="flex items-center space-x-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md border text-xxs font-bold uppercase tracking-wider {{ $act['badge'] }}">
                            {{ $act['type'] }}
                        </span>
                        <div>
                            <span class="block text-sm font-bold text-slate-800">{{ $act['title'] }}</span>
                            <span class="block text-xxs text-slate-400 font-medium mt-0.5">Konten telah {{ $act['action'] }}</span>
                        </div>
                    </div>
                    <div class="text-right whitespace-nowrap">
                        <span class="block text-xs font-semibold text-slate-500">{{ $act['time']->diffForHumans() }}</span>
                        <span class="block text-xxs text-slate-400 font-medium mt-0.5">{{ $act['time']->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            @empty
                <div class="py-6 text-center text-slate-400 font-medium text-sm">
                    Belum ada riwayat aktivitas konten baru-baru ini.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
