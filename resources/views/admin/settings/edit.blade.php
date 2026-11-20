@extends('layouts.admin')

@section('title', 'Pengaturan Tampilan - Admin Dashboard')
@section('page_title', 'Pengaturan Tampilan')

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Description -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm">
        <h3 class="text-lg font-bold text-slate-900 mb-1">Konfigurasi Banner & Teks Website</h3>
        <p class="text-xs text-slate-500 font-semibold leading-relaxed">
            Kelola gambar latar belakang banner utama dan teks headline yang tampil pada halaman publik website Desa Kepyar. Anda dapat mengunggah file gambar baru atau menempelkan tautan gambar eksternal.
        </p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- SECTION 1: HOMEPAGE HERO -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
            <h4 class="text-sm font-bold text-emerald-600 uppercase tracking-wider border-b border-slate-100 pb-3">Hero Banner Beranda (Home)</h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hero Title -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Headline Utama</label>
                    <textarea name="hero_title" rows="2" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700 leading-normal">{{ $settings['hero_title'] ?? '' }}</textarea>
                    <span class="block text-xxs text-slate-400 font-medium">Mendukung format HTML standar untuk dekorasi teks (seperti &lt;br&gt; dan span).</span>
                </div>

                <!-- Hero Subtitle -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Sub-Headline</label>
                    <textarea name="hero_subtitle" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700 leading-normal">{{ $settings['hero_subtitle'] ?? '' }}</textarea>
                </div>
            </div>

            <!-- Hero Image Banner -->
            <div class="space-y-3 pt-4 border-t border-slate-50" x-data="{ 
                preview: '{{ $settings['hero_image'] ?? '' }}', 
                handleFile(e) {
                    const file = e.target.files[0];
                    if (file) {
                        this.preview = URL.createObjectURL(file);
                    }
                }
            }">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Latar Belakang Hero Banner</label>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    <!-- Preview Box -->
                    <div class="h-28 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 relative group">
                        <img :src="preview || 'https://placehold.co/800x400?text=No+Image'" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-slate-950/20 flex items-center justify-center text-xxs text-white font-bold opacity-0 group-hover:opacity-100 transition-opacity">Preview Banner</div>
                    </div>

                    <!-- Input Fields -->
                    <div class="md:col-span-2 space-y-3">
                        <div>
                            <span class="block text-xxs text-slate-400 font-bold mb-1.5">Unggah Berkas Gambar</span>
                            <input type="file" name="hero_image" @change="handleFile" accept="image/*" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-colors">
                        </div>
                        <div>
                            <span class="block text-xxs text-slate-400 font-bold mb-1.5">Atau Gunakan URL Eksternal</span>
                            <input type="text" name="hero_image_url" placeholder="https://images.unsplash.com/..." x-model="preview" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: SUBPAGE BANNERS -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm space-y-8">
            <h4 class="text-sm font-bold text-emerald-600 uppercase tracking-wider border-b border-slate-100 pb-3">Banner Halaman Sub-Menu</h4>

            @php
                $banners = [
                    ['key' => 'banner_profil', 'label' => 'Banner Halaman Profil Desa', 'default' => 'https://images.unsplash.com/photo-1472214222541-d510753a8707?auto=format&fit=crop&q=80&w=1200'],
                    ['key' => 'banner_wisata', 'label' => 'Banner Halaman Wisata Alam', 'default' => 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=1200'],
                    ['key' => 'banner_budaya', 'label' => 'Banner Halaman Seni & Budaya', 'default' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=1200'],
                    ['key' => 'banner_umkm', 'label' => 'Banner Halaman UMKM & Produk', 'default' => 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&q=80&w=1200'],
                    ['key' => 'banner_event', 'label' => 'Banner Halaman Event', 'default' => 'https://images.unsplash.com/photo-1534385842125-8c9ad2bd7f3b?auto=format&fit=crop&q=80&w=1200'],
                    ['key' => 'banner_berita', 'label' => 'Banner Halaman Berita & Artikel', 'default' => 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=1200'],
                    ['key' => 'banner_galeri', 'label' => 'Banner Halaman Galeri & Kontak', 'default' => 'https://images.unsplash.com/photo-1544654803-b69140b285a1?auto=format&fit=crop&q=80&w=1200'],
                    ['key' => 'budaya_image_karawitan', 'label' => 'Foto Kesenian: Karawitan Jawa', 'default' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=800'],
                    ['key' => 'budaya_image_ketoprak', 'label' => 'Foto Kesenian: Ketoprak Tradisional', 'default' => 'https://images.unsplash.com/photo-1534385842125-8c9ad2bd7f3b?auto=format&fit=crop&q=80&w=800'],
                    ['key' => 'budaya_image_wayang', 'label' => 'Foto Kesenian: Wayang Kulit Filosofis', 'default' => 'https://images.unsplash.com/photo-1626125345510-4603468eedfb?auto=format&fit=crop&q=80&w=800'],
                    ['key' => 'profil_image_geografis', 'label' => 'Foto Geografis: Kondisi Alam Perbukitan', 'default' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&q=80&w=800'],
                    ['key' => 'site_favicon', 'label' => 'Logo Tab Browser (Favicon)', 'default' => '/favicon.ico'],
                ];
            @endphp

            <div class="divide-y divide-slate-100 space-y-6">
                @foreach($banners as $b)
                <div class="pt-6 first:pt-0 space-y-3" x-data="{ 
                    preview: '{{ $settings[$b['key']] ?? $b['default'] }}',
                    handleFile(e) {
                        const file = e.target.files[0];
                        if (file) {
                            this.preview = URL.createObjectURL(file);
                        }
                    }
                }">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">{{ $b['label'] }}</label>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                        <!-- Preview Box -->
                        <div class="h-24 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 relative group">
                            <img :src="preview || '{{ $b['default'] }}'" class="w-full h-full object-cover">
                        </div>

                        <!-- Input Fields -->
                        <div class="md:col-span-2 space-y-2">
                            <div>
                                <input type="file" name="{{ $b['key'] }}" @change="handleFile" accept="image/*" class="block w-full text-xs text-slate-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-colors">
                            </div>
                            <div>
                                <input type="text" name="{{ $b['key'] }}_url" placeholder="Gunakan URL: {{ $b['default'] }}" x-model="preview" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- SECTION 3: SOCIAL MEDIA & GOOGLE MAPS -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm space-y-8">
            <h4 class="text-sm font-bold text-emerald-600 uppercase tracking-wider border-b border-slate-100 pb-3">Kontak & Sosial Media</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- WhatsApp Number (Digits only) -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Nomor WhatsApp Link (Hanya Angka, diawali 62)</label>
                    <input type="text" name="contact_whatsapp" value="{{ $settings['contact_whatsapp'] ?? '628123456789' }}" placeholder="Contoh: 628123456789" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                    <span class="block text-xxs text-slate-400 font-medium">Digunakan untuk link tombol chat WhatsApp (tanpa tanda + atau spasi).</span>
                </div>

                <!-- WhatsApp Display Text -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Teks Tampilan WhatsApp (Format Bebas)</label>
                    <input type="text" name="contact_whatsapp_text" value="{{ $settings['contact_whatsapp_text'] ?? '+62 812-3456-789' }}" placeholder="Contoh: +62 812-3456-789" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                    <span class="block text-xxs text-slate-400 font-medium">Nomor yang tertera secara visual di website.</span>
                </div>

                <!-- Instagram Link -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Tautan (Link) Instagram</label>
                    <input type="text" name="social_instagram" value="{{ $settings['social_instagram'] ?? 'https://instagram.com/desa_keypyar' }}" placeholder="https://instagram.com/..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                </div>

                <!-- Instagram Username -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Username Instagram (Tampilan)</label>
                    <input type="text" name="social_instagram_username" value="{{ $settings['social_instagram_username'] ?? '@desa_keypyar' }}" placeholder="Contoh: @desa_keypyar" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                </div>

                <!-- Facebook Link -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Tautan (Link) Facebook</label>
                    <input type="text" name="social_facebook" value="{{ $settings['social_facebook'] ?? '#' }}" placeholder="https://facebook.com/..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                </div>

                <!-- YouTube Link -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Tautan (Link) YouTube</label>
                    <input type="text" name="social_youtube" value="{{ $settings['social_youtube'] ?? '#' }}" placeholder="https://youtube.com/..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                </div>

                <!-- TikTok Link -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Tautan (Link) TikTok</label>
                    <input type="text" name="social_tiktok" value="{{ $settings['social_tiktok'] ?? '#' }}" placeholder="https://tiktok.com/..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                </div>

                <!-- Google Maps Embed Link -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Tautan Embed Iframe Google Maps (Atribut src)</label>
                    <textarea name="contact_gmaps_embed" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700 leading-normal">{{ $settings['contact_gmaps_embed'] ?? '' }}</textarea>
                    <span class="block text-xxs text-slate-400 font-medium">Masukkan hanya URL di dalam atribut 'src="..."' dari kode embed Google Maps.</span>
                </div>

                <!-- YouTube Profile Video Link -->
                <div class="space-y-2">
                    <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest">Tautan (Link) Video Profil Desa YouTube</label>
                    <input type="text" name="video_profile_youtube" value="{{ $settings['video_profile_youtube'] ?? 'https://www.youtube.com' }}" placeholder="https://www.youtube.com/watch?v=..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-xs font-semibold text-slate-700">
                    <span class="block text-xxs text-slate-400 font-medium">Link video profil desa yang akan dibuka saat tombol di Beranda diklik.</span>
                </div>
            </div>
        </div>

        <!-- Submit Bar -->
        <div class="flex justify-end pt-2">
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 rounded-2xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 active:scale-98 transition-all shadow-md shadow-emerald-500/10">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Simpan Perubahan Tampilan
            </button>
        </div>
    </form>
</div>
@endsection
