@extends('layouts.admin')

@section('title', 'Moderasi Testimoni - Admin Dashboard')
@section('page_title', 'Moderasi Ulasan Wisatawan')

@section('admin_content')
<div x-data="{ search: '', statusFilter: 'all' }">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <div>
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Kelola & Moderasi Ulasan Pengunjung Halaman Utama</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
            <!-- Filter Status -->
            <select x-model="statusFilter" class="px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-xs transition-all bg-white font-semibold text-slate-700">
                <option value="all">Semua Status</option>
                <option value="pending">Tertunda (Pending)</option>
                <option value="approved">Disetujui (Approved)</option>
                <option value="rejected">Ditolak (Rejected)</option>
            </select>

            <!-- Search Bar -->
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" x-model="search" placeholder="Cari Nama / Ulasan..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-xs transition-all bg-white font-semibold text-slate-700">
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-xxs font-extrabold uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Nama & Peran</th>
                        <th class="px-6 py-4">Isi Ulasan</th>
                        <th class="px-6 py-4">Tanggal Kirim</th>
                        <th class="px-6 py-4 text-center">Aksi Moderasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($testimonials as $t)
                        <tr class="hover:bg-slate-50/50 transition-colors"
                            x-show="(statusFilter === 'all' || '{{ $t->status }}' === statusFilter) && (search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase()))"
                            x-transition>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusColor = match($t->status) {
                                        'pending' => 'bg-amber-50 text-amber-700 border-amber-100',
                                        'approved' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                        'rejected' => 'bg-rose-50 text-rose-700 border-rose-100',
                                    };
                                @endphp
                                <span class="inline-block px-2.5 py-1 text-xxs font-bold uppercase tracking-wider rounded-md border {{ $statusColor }}">
                                    {{ strtoupper($t->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-bold text-slate-900">{{ $t->name }}</div>
                                <div class="text-xxs font-medium text-slate-400 mt-0.5">{{ $t->role }}</div>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-slate-650 max-w-sm leading-relaxed">
                                "{{ $t->quote }}"
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-500 whitespace-nowrap">{{ $t->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    @if($t->status !== 'approved')
                                        <!-- Approve Button -->
                                        <form action="{{ route('admin.testimonial.approve', $t->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" title="Setujui & Tampilkan" class="p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif

                                    @if($t->status !== 'rejected')
                                        <!-- Reject Button -->
                                        <form action="{{ route('admin.testimonial.reject', $t->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" title="Tolak / Sembunyikan" class="p-2 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.testimonial.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini secara permanen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus Permanen" class="p-2 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr x-show="search === ''">
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                                    <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 mb-4 border border-slate-100">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-800 mb-1">Belum Ada Ulasan Masuk</h3>
                                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Formulir ulasan pengunjung di halaman utama akan masuk ke sini untuk dimoderasi oleh admin.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    <!-- No results row -->
                    <tr x-show="search !== '' && !Array.from($el.parentNode.children).filter(el => !el.classList.contains('no-results-row') && !el.classList.contains('empty-row')).some(el => el.innerText.toLowerCase().includes(search.toLowerCase()))" class="no-results-row" x-cloak>
                        <td colspan="5" class="px-6 py-12 text-center text-xs text-slate-400 font-medium bg-slate-50/30">
                            Tidak ada ulasan yang cocok dengan pencarian "<span class="font-bold text-slate-700" x-text="search"></span>".
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
