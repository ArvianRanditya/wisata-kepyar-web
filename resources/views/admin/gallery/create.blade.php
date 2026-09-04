@extends('layouts.admin')

@section('title', 'Tambah Foto - Admin Dashboard')
@section('page_title', 'Tambah Foto Galeri Baru')

@section('admin_content')
<div class="mb-6">
    <a href="{{ route('admin.gallery.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Galeri
    </a>
</div>

<div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm max-w-3xl">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Judul Foto / Label</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
            @error('title')
                <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6" x-data="{
            imageUrl: '{{ old('url') }}',
            filePreview: '',
            handleFileChange(e) {
                const file = e.target.files[0];
                if (file) {
                    this.filePreview = URL.createObjectURL(file);
                } else {
                    this.filePreview = '';
                }
            }
        }">
            <!-- Category (Select) -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kategori Galeri</label>
                <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm bg-white">
                    <option value="wisata" {{ old('category') === 'wisata' ? 'selected' : '' }}>Wisata</option>
                    <option value="budaya" {{ old('category') === 'budaya' ? 'selected' : '' }}>Budaya</option>
                    <option value="umkm" {{ old('category') === 'umkm' ? 'selected' : '' }}>UMKM</option>
                    <option value="event" {{ old('category') === 'event' ? 'selected' : '' }}>Event</option>
                </select>
                @error('category')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image File -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Unggah Gambar</label>
                <input type="file" name="image_file" @change="handleFileChange"
                       class="w-full px-3 py-2 rounded-xl border border-slate-200 focus:outline-none file:mr-3 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 text-xs transition-colors bg-white">
                @error('image_file')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image URL -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Atau URL Gambar</label>
                <input type="text" name="url" x-model="imageUrl" placeholder="Tulis URL gambar jika ada"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors bg-white">
                @error('url')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Live Preview Thumbnail -->
            <div class="col-span-1 sm:col-span-3" x-show="filePreview || imageUrl" x-cloak>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pratinjau Gambar</label>
                <div class="relative w-40 h-28 rounded-2xl overflow-hidden border border-slate-200 bg-slate-50">
                    <img :src="filePreview ? filePreview : imageUrl" class="w-full h-full object-cover">
                    <button type="button" @click="filePreview = ''; imageUrl = ''; $el.closest('.grid').querySelector('input[type=file]').value = ''"
                            class="absolute top-1.5 right-1.5 p-1.5 rounded-lg bg-slate-900/70 hover:bg-slate-900 text-white transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
            Simpan Foto
        </button>
    </form>
</div>
@endsection
