@extends('layouts.admin')

@section('title', 'Kelola Pesan - Admin Dashboard')
@section('page_title', 'Kotak Masuk & Saran')

@section('admin_content')
<div x-data="{ 
    search: '',
    selectedMessage: null,
    showModal: false,
    openMessage(msg, el) {
        this.selectedMessage = msg;
        this.showModal = true;
        
        // If unread, mark as read on the backend
        if (msg.status === 'unread') {
            fetch(`/admin/messages/${msg.id}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    msg.status = 'read';
                    // Update state globally or on UI
                    const badge = document.getElementById(`badge-status-${msg.id}`);
                    if (badge) {
                        badge.className = 'inline-block px-2.5 py-1 text-xxs font-bold uppercase tracking-wider rounded-md border bg-slate-50 text-slate-400 border-slate-200';
                        badge.innerText = 'READ';
                    }
                }
            });
        }
    }
}">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <div>
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Surat dan Masukan Masyarakat Desa</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">
            <!-- Search Bar -->
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" x-model="search" placeholder="Cari Pengirim / Subjek..."
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
                        <th class="px-6 py-4">Pengirim</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Subjek</th>
                        <th class="px-6 py-4">Tanggal Masuk</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-slate-50/50 transition-colors"
                            x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())"
                            x-transition>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span id="badge-status-{{ $msg->id }}" class="inline-block px-2.5 py-1 text-xxs font-bold uppercase tracking-wider rounded-md border 
                                    {{ $msg->status === 'unread' ? 'bg-rose-50 text-rose-700 border-rose-100' : 'bg-slate-50 text-slate-400 border-slate-200' }}">
                                    {{ strtoupper($msg->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-900">{{ $msg->name }}</div>
                                <div class="text-xxs font-medium text-slate-400 leading-normal">{{ $msg->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $badgeColor = match($msg->category) {
                                        'wisata' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                        'umkm' => 'bg-amber-50 text-amber-700 border-amber-100',
                                        default => 'bg-indigo-50 text-indigo-700 border-indigo-100',
                                    };
                                @endphp
                                <span class="inline-block px-2.5 py-1 text-xxs font-bold uppercase tracking-wider rounded-md border {{ $badgeColor }}">
                                    {{ $msg->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-700 truncate max-w-xs">{{ $msg->subject }}</td>
                            <td class="px-6 py-4 text-xs text-slate-500">{{ $msg->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Read Button (Opens Modal) -->
                                    <button @click="openMessage({
                                        id: {{ $msg->id }},
                                        name: '{{ addslashes($msg->name) }}',
                                        email: '{{ addslashes($msg->email) }}',
                                        category: '{{ addslashes($msg->category) }}',
                                        subject: '{{ addslashes($msg->subject) }}',
                                        message: '{{ addslashes(str_replace(["\r", "\n"], ' ', $msg->message)) }}',
                                        status: '{{ $msg->status }}',
                                        date: '{{ $msg->created_at->format('d M Y H:i') }}'
                                    }, $el)" class="p-2 rounded-lg bg-slate-50 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-800 mb-1">Belum Ada Pesan Masuk</h3>
                                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Formulir kontak di halaman luar aktif secara dinamis. Aspirasi dan pemesanan warga akan masuk di sini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    <!-- No search results row -->
                    <tr x-show="search !== '' && !Array.from($el.parentNode.children).filter(el => !el.classList.contains('no-results-row') && !el.classList.contains('empty-row')).some(el => el.innerText.toLowerCase().includes(search.toLowerCase()))" class="no-results-row" x-cloak>
                        <td colspan="6" class="px-6 py-12 text-center text-xs text-slate-400 font-medium bg-slate-50/30">
                            Tidak ada pesan yang cocok dengan pencarian "<span class="font-bold text-slate-700" x-text="search"></span>".
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Message Details Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showModal = false"
             x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <!-- Modal Container -->
        <div class="relative w-full max-w-lg bg-white rounded-3xl overflow-hidden shadow-2xl border border-slate-100 z-10"
             x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
            
            <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                <div>
                    <span class="text-xxs font-bold text-slate-400 uppercase tracking-widest block">Detail Pesan Masuk</span>
                    <h3 class="text-sm font-bold text-slate-800" x-text="selectedMessage ? selectedMessage.subject : ''"></h3>
                </div>
                <button @click="showModal = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="block text-xxs font-bold text-slate-400 uppercase tracking-wider mb-0.5">Pengirim</span>
                        <span class="font-bold text-slate-900 block" x-text="selectedMessage ? selectedMessage.name : ''"></span>
                        <span class="text-slate-500" x-text="selectedMessage ? selectedMessage.email : ''"></span>
                    </div>
                    <div>
                        <span class="block text-xxs font-bold text-slate-400 uppercase tracking-wider mb-0.5">Waktu Masuk</span>
                        <span class="font-bold text-slate-700 block" x-text="selectedMessage ? selectedMessage.date : ''"></span>
                        <span class="inline-block mt-1 px-2 py-0.5 text-xxs font-bold uppercase tracking-wider rounded-md border bg-slate-100 text-slate-600 border-slate-200" x-text="selectedMessage ? selectedMessage.category : ''"></span>
                    </div>
                </div>
                
                <div class="border-t border-slate-100 pt-4">
                    <span class="block text-xxs font-bold text-slate-400 uppercase tracking-wider mb-2">Isi Pesan</span>
                    <div class="p-4 rounded-2xl bg-slate-50 text-slate-700 text-sm leading-relaxed whitespace-pre-line" x-text="selectedMessage ? selectedMessage.message : ''"></div>
                </div>
            </div>
            
            <div class="p-6 border-t border-slate-100 flex justify-end space-x-2 bg-slate-50">
                <a :href="selectedMessage ? 'mailto:' + selectedMessage.email + '?subject=Balasan: ' + encodeURIComponent(selectedMessage.subject) : '#'" 
                   class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition-colors shadow-md">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Balas via Email
                </a>
                <button @click="showModal = false" class="px-4 py-2.5 rounded-xl text-xs font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
