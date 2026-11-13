@extends('layouts.admin')

@section('title', 'Wilayah Dusun - Admin Dashboard')
@section('page_title', 'Wilayah Administrasi Dusun')

@section('admin_content')
<div x-data="{ search: '' }" class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Kelola Daftar Dusun, Kepala Dusun, dan Pilar Potensi Desa</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
            <!-- Search Bar -->
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" x-model="search" placeholder="Cari nama dusun atau kadus..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-xs transition-all bg-white font-semibold text-slate-700">
            </div>

            <a href="{{ route('admin.dusun.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Dusun
            </a>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-xxs font-extrabold uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Nama Dusun</th>
                        <th class="px-6 py-4">Kepala Dusun (Kadus)</th>
                        <th class="px-6 py-4">Jumlah KK</th>
                        <th class="px-6 py-4">Pilar Keunggulan</th>
                        <th class="px-6 py-4 text-center">Urutan</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($dusuns as $d)
                        <tr class="hover:bg-slate-50/50 transition-colors"
                            x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())"
                            x-transition>
                            <td class="px-6 py-4 font-bold text-slate-900">{{ $d->name }}</td>
                            <td class="px-6 py-4 text-slate-600 font-semibold">{{ $d->kadus }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block text-xxs font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 px-2.5 py-0.5 rounded-md">
                                    {{ $d->kk }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-slate-500">{{ $d->pilar }}</td>
                            <td class="px-6 py-4 text-center font-bold text-slate-500">{{ $d->order }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.dusun.edit', $d->id) }}" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.dusun.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dusun ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-rose-50 hover:text-rose-700 transition-colors" title="Hapus">
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
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400 text-xs">
                                Belum ada data wilayah dusun. Silakan klik tombol "Tambah Dusun" di atas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

