@extends('layouts.admin')

@section('title', 'Kelola Berita & Artikel - Admin Dashboard')
@section('page_title', 'Kelola Berita & Artikel Desa')

@section('admin_content')
<div x-data="{ search: '' }">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <div>
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Publikasi Informasi, Berita & Kegiatan Desa</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
            <!-- Search Bar -->
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" x-model="search" placeholder="Cari judul berita..." 
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-xs transition-all bg-white font-semibold text-slate-700">
            </div>

            <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tulis Berita Baru
            </a>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-xxs font-extrabold uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Foto</th>
                        <th class="px-6 py-4">Judul & Ringkasan</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Penulis</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Dilihat</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($beritas as $b)
                        <tr class="hover:bg-slate-50/50 transition-colors"
                            x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())"
                            x-transition>
                            <td class="px-6 py-4">
                                @if($b->image)
                                    <img src="{{ $b->image }}" alt="{{ $b->title }}" class="w-14 h-14 object-cover rounded-xl shadow-xs border border-slate-100">
                                @else
                                    <div class="w-14 h-14 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 max-w-xs sm:max-w-md">
                                <span class="block font-bold text-slate-900 line-clamp-1 text-sm">{{ $b->title }}</span>
                                <span class="block text-xxs text-slate-400 line-clamp-2 mt-0.5">{{ $b->excerpt }}</span>
                                <span class="block text-xxs text-slate-400 font-mono mt-1">/berita/{{ $b->slug }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-1 text-xxs font-bold uppercase tracking-wider rounded-md border bg-emerald-50 text-emerald-700 border-emerald-100">
                                    {{ $b->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-slate-600">
                                {{ $b->author }}
                            </td>
                            <td class="px-6 py-4">
                                @if($b->is_published)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xxs font-bold bg-emerald-100 text-emerald-800">
                                        Tayang
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xxs font-bold bg-amber-100 text-amber-800">
                                        Draf
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs font-bold text-slate-600">
                                {{ number_format($b->views) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('berita.detail', $b->slug) }}" target="_blank" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-sky-50 hover:text-sky-700 transition-colors" title="Lihat di Web">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.berita.edit', $b->id) }}" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors" title="Edit Berita">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-rose-50 hover:text-rose-700 transition-colors" title="Hapus Berita">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-slate-400 font-medium text-xs">
                                Belum ada data berita. Silakan klik "Tulis Berita Baru" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
