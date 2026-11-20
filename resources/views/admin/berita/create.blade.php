@extends('layouts.admin')

@section('title', 'Tulis Berita Baru - Admin Dashboard')
@section('page_title', 'Tulis Berita Baru')

@section('admin_content')
<div class="mb-6">
    <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Berita
    </a>
</div>

<div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm max-w-4xl">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Judul Berita / Publikasi <span class="text-rose-500">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Pembangunan Jalan Usaha Tani Dusun Karang Tengah Selesai"
                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm font-semibold transition-colors">
            @error('title')
                <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kategori Berita <span class="text-rose-500">*</span></label>
                <input type="text" name="category" list="kategori-list" value="{{ old('category', 'Kegiatan') }}" required placeholder="Pilih atau ketik kategori..."
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm bg-white font-medium">
                <datalist id="kategori-list">
                    <option value="Pembangunan">
                    <option value="Kegiatan">
                    <option value="UMKM">
                    <option value="Wisata">
                    <option value="Budaya">
                    <option value="Pengumuman">
                    <option value="Prestasi">
                </datalist>
                @error('category')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Author -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Penulis / Sumber</label>
                <input type="text" name="author" value="{{ old('author', 'Admin Desa Kepyar') }}" placeholder="Contoh: Tim Humas Desa / Pokdarwis"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm font-medium transition-colors">
                @error('author')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Featured Image: File Upload OR URL -->
        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-4">
            <span class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Gambar Utama (Pilih salah satu)</span>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- File Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">Unggah Berkas Gambar (JPG, PNG, WebP)</label>
                    <input type="file" name="image" accept="image/jpeg,image/png,image/webp"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-colors">
                    @error('image')
                        <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Or URL -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">Atau Gunakan Tautan URL Gambar</label>
                    <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://images.unsplash.com/..."
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-xs bg-white">
                    @error('image_url')
                        <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Excerpt -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Ringkasan Berita (Excerpt) <span class="text-rose-500">*</span></label>
                <span class="text-xxs text-slate-400 font-medium">Maksimal 500 karakter</span>
            </div>
            <textarea name="excerpt" rows="2" maxlength="500" required placeholder="Tuliskan 1-2 kalimat ringkasan singkat yang akan muncul pada kartu berita di halaman utama..."
                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Content -->
        <div>
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Isi Lengkap Berita <span class="text-rose-500">*</span></label>
            <textarea name="content" rows="12" required placeholder="Tuliskan narasi lengkap berita atau artikel di sini. Format paragraf akan otomatis diatur..."
                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm leading-relaxed transition-colors font-sans">{{ old('content') }}</textarea>
            @error('content')
                <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Published Status Checkbox -->
        <div class="flex items-center space-x-3 pt-2">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }}
                   class="w-5 h-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
            <label for="is_published" class="text-sm font-bold text-slate-700 cursor-pointer">
                Terbitkan Berita Sekarang (Publikasikan ke Website)
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-4 border-t border-slate-100 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.berita.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
                Simpan & Terbitkan Berita
            </button>
        </div>
    </form>
</div>
@endsection
