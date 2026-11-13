@extends('layouts.admin')

@section('title', 'Edit Wilayah Dusun - Admin Dashboard')
@section('page_title', 'Edit Wilayah Dusun')

@section('admin_content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-slate-900 font-display">Edit Dusun: {{ $dusun->name }}</h3>
            <p class="text-xs text-slate-500 font-medium">Perbarui informasi wilayah, kadus, atau pilar potensinya.</p>
        </div>
        <a href="{{ route('admin.dusun.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('admin.dusun.update', $dusun->id) }}" method="POST" class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <!-- Nama Dusun -->
            <div class="space-y-1.5">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Nama Dusun *</label>
                <input type="text" name="name" value="{{ old('name', $dusun->name) }}" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                @error('name')
                    <span class="text-xxs text-rose-500 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kepala Dusun -->
            <div class="space-y-1.5">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Nama Kepala Dusun (Kadus) *</label>
                <input type="text" name="kadus" value="{{ old('kadus', $dusun->kadus) }}" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                @error('kadus')
                    <span class="text-xxs text-rose-500 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Jumlah KK -->
                <div class="space-y-1.5">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Jumlah KK *</label>
                    <input type="text" name="kk" value="{{ old('kk', $dusun->kk) }}" required
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                    @error('kk')
                        <span class="text-xxs text-rose-500 font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Urutan -->
                <div class="space-y-1.5">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $dusun->order) }}"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                </div>
            </div>

            <!-- Pilar Keunggulan -->
            <div class="space-y-1.5">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Pilar Keunggulan / Potensi *</label>
                <input type="text" name="pilar" value="{{ old('pilar', $dusun->pilar) }}" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                @error('pilar')
                    <span class="text-xxs text-rose-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.dusun.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition-all shadow-md">
                Perbarui Dusun
            </button>
        </div>
    </form>
</div>
@endsection

