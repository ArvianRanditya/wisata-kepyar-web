@extends('layouts.admin')

@section('title', 'Tambah Event - Admin Dashboard')
@section('page_title', 'Tambah Event Baru')

@section('admin_content')
<div class="mb-6">
    <a href="{{ route('admin.event.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Event
    </a>
</div>

<div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm max-w-3xl">
    <form action="{{ route('admin.event.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Event / Acara</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('name')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kategori Event</label>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: Budaya & Tradisi, Keagamaan, Olahraga" required
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('category')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Frequency (Select) -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Frekuensi Pelaksanaan</label>
                <select name="frequency" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm bg-white">
                    <option value="tahunan" {{ old('frequency') === 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                    <option value="bulanan" {{ old('frequency') === 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                    <option value="mingguan" {{ old('frequency') === 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                    <option value="festival" {{ old('frequency') === 'festival' ? 'selected' : '' }}>Festival Khusus</option>
                </select>
                @error('frequency')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Schedule -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Jadwal / Waktu Pelaksanaan</label>
                <input type="text" name="schedule" value="{{ old('schedule') }}" placeholder="Contoh: Setiap Sabtu Kliwon Malam" required
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('schedule')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Location -->
        <div>
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Lokasi Acara</label>
            <input type="text" name="location" value="{{ old('location') }}" placeholder="Contoh: Pendopo Balai Desa Kepyar"
                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
            @error('location')
                <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div x-data="{ desc: '' }" x-init="desc = $el.querySelector('textarea').value">
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Deskripsi Kegiatan</label>
            <textarea name="description" rows="6" required x-model="desc"
                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">{{ old('description') }}</textarea>
            <div class="flex justify-between items-center text-slate-400 text-xxs font-extrabold uppercase mt-1 px-1">
                <span>Harap tulis deskripsi secara detail</span>
                <span><span x-text="desc.length"></span> Karakter</span>
            </div>
            @error('description')
                <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
            Simpan Event Baru
        </button>
    </form>
</div>
@endsection
