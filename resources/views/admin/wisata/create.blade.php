@extends('layouts.admin')

@section('title', 'Tambah Paket Wisata - Admin Dashboard')
@section('page_title', 'Tambah Paket Wisata Baru')

@section('admin_content')
<div class="mb-6">
    <a href="{{ route('admin.wisata.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Wisata
    </a>
</div>

<div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm max-w-3xl">
    <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Destinasi</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('name')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kategori Wisata</label>
                <input type="text" name="category" value="{{ old('category', 'Wisata Alam') }}" required
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('category')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6" x-data="{
            imageUrl: '{{ old('image') }}',
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
            <!-- Price -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Harga Paket</label>
                <input type="text" name="price" value="{{ old('price') }}" placeholder="Contoh: Rp 150.000 / Orang"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('price')
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
                <input type="text" name="image" x-model="imageUrl" placeholder="Tulis URL gambar jika ada"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors bg-white">
                @error('image')
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

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <!-- Duration -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Durasi Paket</label>
                <input type="text" name="duration" value="{{ old('duration') }}" placeholder="Contoh: Spot Sunrise atau 2-3 Jam"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('duration')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Best Time -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Waktu Terbaik</label>
                <input type="text" name="best_time" value="{{ old('best_time') }}" placeholder="Contoh: Pagi hari 05:00 - 06:00"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('best_time')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Activities -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Aktivitas Utama</label>
                <input type="text" name="activities" value="{{ old('activities') }}" placeholder="Contoh: Hiking, Camping, Fotografi"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
                @error('activities')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Highlights -->
        <div>
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Highlights (Pisahkan dengan koma)</label>
            <input type="text" name="highlights" value="{{ old('highlights') }}" placeholder="Contoh: 638 mdpl, Sunrise Spot, Camp Area"
                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors">
            @error('highlights')
                <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div x-data="{ desc: '' }" x-init="desc = $el.querySelector('textarea').value">
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Deskripsi Lengkap</label>
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
            Simpan Paket Wisata
        </button>
    </form>
</div>
@endsection
