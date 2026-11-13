@extends('layouts.admin')

@section('title', 'Tambah Aparatur Desa - Admin Dashboard')
@section('page_title', 'Tambah Aparatur Desa')

@section('admin_content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-slate-900 font-display">Formulir Tambah Aparatur Desa</h3>
            <p class="text-xs text-slate-500 font-medium">Lengkapi identitas pejabat atau perangkat pemerintahan Desa Kepyar.</p>
        </div>
        <a href="{{ route('admin.aparatur.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('admin.aparatur.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6"
          x-data="{ 
              preview: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80',
              handleFile(e) {
                  const file = e.target.files[0];
                  if (file) {
                      this.preview = URL.createObjectURL(file);
                  }
              }
          }">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama -->
            <div class="space-y-1.5">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Nama Lengkap & Gelar *</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Drs. H. Mulyono" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                @error('name')
                    <span class="text-xxs text-rose-500 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Jabatan -->
            <div class="space-y-1.5">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Jabatan / Posisi *</label>
                <input type="text" name="role" value="{{ old('role') }}" placeholder="Contoh: Kepala Desa / Sekretaris Desa" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                @error('role')
                    <span class="text-xxs text-rose-500 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Urutan -->
            <div class="space-y-1.5">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Urutan Tampil</label>
                <input type="number" name="order" value="{{ old('order', 1) }}" placeholder="1, 2, 3..."
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                <span class="text-xxs text-slate-400">Angka lebih kecil tampil lebih dulu (Kepala Desa biasanya nomor 1).</span>
            </div>

            <!-- Status Aktif -->
            <div class="flex items-center space-x-3 pt-6">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="w-4 h-4 text-emerald-600 border-slate-300 rounded-sm focus:ring-emerald-500">
                <label for="is_active" class="text-xs font-bold text-slate-700 cursor-pointer">
                    Tampilkan di Website Profil
                </label>
            </div>
        </div>

        <!-- Foto Profile -->
        <div class="space-y-3 pt-4 border-t border-slate-100">
            <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Foto Aparatur Desa</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                <!-- Preview -->
                <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-2 border-emerald-500/30 bg-slate-100 relative shadow-sm">
                    <img :src="preview" class="w-full h-full object-cover">
                </div>

                <div class="md:col-span-2 space-y-3">
                    <div>
                        <span class="block text-xxs text-slate-400 font-bold mb-1">Unggah File Foto (JPG/PNG/WEBP, Max 3MB)</span>
                        <input type="file" name="image_file" @change="handleFile" accept="image/*"
                               class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-colors">
                    </div>
                    <div>
                        <span class="block text-xxs text-slate-400 font-bold mb-1">Atau Gunakan Tautan URL Eksternal</span>
                        <input type="text" name="image" x-model="preview" placeholder="https://images.unsplash.com/..."
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.aparatur.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition-all shadow-md">
                Simpan Aparatur
            </button>
        </div>
    </form>
</div>
@endsection

