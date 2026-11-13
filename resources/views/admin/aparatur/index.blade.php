@extends('layouts.admin')

@section('title', 'Aparatur Desa - Admin Dashboard')
@section('page_title', 'Struktur Pemerintahan Desa')

@section('admin_content')
<div x-data="{ search: '' }" class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Kelola Kepala Desa, Perangkat Desa, & Struktur Tata Kelola</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
            <!-- Search Bar -->
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" x-model="search" placeholder="Cari nama atau jabatan..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-xs transition-all bg-white font-semibold text-slate-700">
            </div>

            <a href="{{ route('admin.aparatur.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Aparatur
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
                        <th class="px-6 py-4">Nama Lengkap</th>
                        <th class="px-6 py-4">Jabatan</th>
                        <th class="px-6 py-4 text-center">Urutan</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($aparaturs as $a)
                        <tr class="hover:bg-slate-50/50 transition-colors"
                            x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())"
                            x-transition>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $a->image ?: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80' }}" alt="{{ $a->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-emerald-500/20 shadow-xs">
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-900">{{ $a->name }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block text-xxs font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 px-2.5 py-1 rounded-md uppercase tracking-wide">
                                    {{ $a->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-slate-500">{{ $a->order }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($a->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xxs font-bold bg-emerald-100 text-emerald-800">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xxs font-bold bg-slate-100 text-slate-600">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.aparatur.edit', $a->id) }}" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.aparatur.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aparatur desa ini?')">
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
                                Belum ada data aparatur desa. Silakan klik tombol "Tambah Aparatur" di atas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- BPD Configuration Card -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
        <div>
            <h4 class="text-base font-bold text-slate-900 font-display">Keterangan Badan Permusyawaratan Desa (BPD)</h4>
            <p class="text-xs text-slate-500 font-medium mt-1">
                Keterangan ini tampil tepat di bawah daftar kartu aparatur pemerintahan desa pada halaman Profil.
            </p>
        </div>

        <form action="{{ route('admin.aparatur.bpd.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Judul Lembaga</label>
                    <input type="text" name="bpd_title" value="{{ $bpdTitle }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700" required>
                </div>
                <div class="space-y-1.5">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Teks Badge / Tag Status</label>
                    <input type="text" name="bpd_badge" value="{{ $bpdBadge }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700" required>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Deskripsi Peran BPD</label>
                <textarea name="bpd_description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700" required>{{ $bpdDescription }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition-all shadow-sm">
                    Simpan Perubahan BPD
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

