@extends('layouts.admin')

@section('title', 'Kelola Event - Admin Dashboard')
@section('page_title', 'Kelola Event & Acara')

@section('admin_content')
<div x-data="{ search: '' }">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <div>
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Daftar Agenda Kegiatan & Festival Desa</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
            <!-- Search Bar -->
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" x-model="search" placeholder="Cari Event..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-xs transition-all bg-white font-semibold text-slate-700">
            </div>

            <a href="{{ route('admin.event.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Event Baru
            </a>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-xxs font-extrabold uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Nama Event</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Frekuensi</th>
                        <th class="px-6 py-4">Jadwal Pelaksanaan</th>
                        <th class="px-6 py-4">Lokasi</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($events as $e)
                        <tr class="hover:bg-slate-50/50 transition-colors"
                            x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())"
                            x-transition>
                            <td class="px-6 py-4 font-bold text-slate-900">{{ $e->name }}</td>
                            <td class="px-6 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wide">{{ $e->category }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $badgeColor = match($e->frequency) {
                                        'tahunan' => 'bg-indigo-50 text-indigo-700 border-indigo-100',
                                        'bulanan' => 'bg-teal-50 text-teal-700 border-teal-100',
                                        'mingguan' => 'bg-amber-50 text-amber-700 border-amber-100',
                                        default => 'bg-rose-50 text-rose-700 border-rose-100',
                                    };
                                @endphp
                                <span class="inline-block px-2.5 py-1 text-xxs font-bold uppercase tracking-wider rounded-md border {{ $badgeColor }}">
                                    {{ $e->frequency }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-700 font-medium">{{ $e->schedule }}</td>
                            <td class="px-6 py-4 text-xs text-slate-500">{{ $e->location ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.event.edit', $e->id) }}" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.event.destroy', $e->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-rose-50 hover:text-rose-700 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr x-show="search === ''">
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                                    <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 mb-4 border border-slate-100">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-800 mb-1">Belum Ada Event / Acara</h3>
                                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Jadwalkan festival adat Bersih Desa, pengajian akbar, atau kegiatan PKK mingguan di Desa Kepyar.</p>
                                    <a href="{{ route('admin.event.create') }}" class="px-4 py-2 rounded-xl text-xs font-bold text-emerald-600 bg-emerald-50 hover:bg-emerald-100 transition-colors border border-emerald-100">
                                        Buat Event Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    <!-- No search results row -->
                    <tr x-show="search !== '' && !Array.from($el.parentNode.children).filter(el => !el.classList.contains('no-results-row') && !el.classList.contains('empty-row')).some(el => el.innerText.toLowerCase().includes(search.toLowerCase()))" class="no-results-row" x-cloak>
                        <td colspan="6" class="px-6 py-12 text-center text-xs text-slate-400 font-medium bg-slate-50/30">
                            Tidak ada event/acara yang cocok dengan pencarian "<span class="font-bold text-slate-700" x-text="search"></span>".
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
