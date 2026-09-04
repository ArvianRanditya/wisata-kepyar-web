@extends('layouts.app')

@section('title', 'Galeri & Hubungi Kami - Desa Kepyar')
@section('meta_description', 'Lihat foto dokumentasi kegiatan Desa Kepyar dan kirim pesan/pertanyaan Anda kepada kami melalui formulir kontak elektronik resmi.')
@section('meta_keywords', 'Galeri Foto Desa Kepyar, Kontak Desa Kepyar, Lokasi Desa Kepyar, Alamat Kantor Desa Kepyar, Wonogiri')

@section('content')
<!-- Header Page Banner -->
<section class="relative bg-slate-900 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-slate-950/80 z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('banner_galeri', 'https://images.unsplash.com/photo-1544654803-b69140b285a1?auto=format&fit=crop&q=80&w=1200') }}" alt="Galeri Adat" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block text-xxs font-bold text-emerald-300 uppercase tracking-widest bg-emerald-500/20 px-3.5 py-1.5 rounded-full border border-emerald-500/30 mb-4">Dokumentasi & Hubungan</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold font-display tracking-tight text-white mb-4">Galeri & Hubungi Kami</h1>
        <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
            Abadikan momen terindah Desa Kepyar, dan hubungi kami jika Anda memiliki pertanyaan seputar kunjungan wisata, produk UMKM, maupun urusan administrasi.
        </p>
    </div>
</section>

<!-- Combined Gallery Section with Lightbox Modal using Alpine.js -->
<section class="py-20 bg-slate-50" x-data="{ 
    filterTab: 'all',
    lightboxOpen: false,
    lightboxImage: '',
    lightboxTitle: '',
    openLightbox(image, title) {
        this.lightboxImage = image;
        this.lightboxTitle = title;
        this.lightboxOpen = true;
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-3">Galeri Visual</h2>
            <p class="text-3xl font-extrabold text-slate-900 font-display">Galeri Dokumentasi Desa</p>
            <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <!-- Filter Tab Buttons -->
        <div class="flex flex-wrap justify-center gap-2 mb-10">
            <button @click="filterTab = 'all'" class="px-4 py-2 text-xs font-bold rounded-xl border transition-all" :class="filterTab === 'all' ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white text-slate-500 border-slate-200 hover:bg-slate-100'">Semua</button>
            <button @click="filterTab = 'wisata'" class="px-4 py-2 text-xs font-bold rounded-xl border transition-all" :class="filterTab === 'wisata' ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white text-slate-500 border-slate-200 hover:bg-slate-100'">Wisata</button>
            <button @click="filterTab = 'budaya'" class="px-4 py-2 text-xs font-bold rounded-xl border transition-all" :class="filterTab === 'budaya' ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white text-slate-500 border-slate-200 hover:bg-slate-100'">Budaya</button>
            <button @click="filterTab = 'umkm'" class="px-4 py-2 text-xs font-bold rounded-xl border transition-all" :class="filterTab === 'umkm' ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white text-slate-500 border-slate-200 hover:bg-slate-100'">UMKM</button>
            <button @click="filterTab = 'event'" class="px-4 py-2 text-xs font-bold rounded-xl border transition-all" :class="filterTab === 'event' ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white text-slate-500 border-slate-200 hover:bg-slate-100'">Event</button>
        </div>

        <!-- Photo Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($galeriList as $g)
                <div x-show="filterTab === 'all' || filterTab === '{{ $g['category'] }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group relative h-64 rounded-3xl overflow-hidden cursor-pointer shadow-md"
                     @click="openLightbox('{{ $g['url'] }}', '{{ $g['title'] }}')">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-slate-950/20 group-hover:bg-slate-950/50 transition-all duration-300 flex flex-col justify-end p-6 z-10">
                        <span class="text-xxs font-extrabold uppercase text-emerald-400 tracking-wider mb-1">{{ $g['category'] }}</span>
                        <h4 class="text-sm font-bold text-white leading-snug group-hover:translate-y-0 translate-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300">{{ $g['title'] }}</h4>
                    </div>
                    <img src="{{ $g['url'] }}" alt="{{ $g['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
            @endforeach
        </div>

        <!-- Lightbox Modal using Alpine.js -->
        <div x-show="lightboxOpen" 
             class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-950/90 p-4" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @keydown.escape.window="lightboxOpen = false"
             x-cloak
             style="display: none;">
            <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white hover:text-emerald-400 focus:outline-none z-[110]">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="max-w-4xl w-full bg-slate-900 rounded-3xl overflow-hidden shadow-2xl relative" @click.away="lightboxOpen = false">
                <img :src="lightboxImage" :alt="lightboxTitle" class="w-full max-h-[70vh] object-contain bg-slate-950">
                <div class="p-6 bg-slate-900 text-white text-center">
                    <h3 class="text-lg font-bold font-display" x-text="lightboxTitle"></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Social Section -->
<section id="kontak" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Left Info Panel -->
            <div class="space-y-8 flex flex-col justify-center">
                <div class="space-y-4">
                    <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block">Hubungi Kami</span>
                    <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">Hubungkan Komunikasi</h3>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Pemerintah Desa Kepyar siap melayani warga desa maupun wisatawan dengan tangan terbuka. Kirimkan pertanyaan, proposal kerja sama, pemesanan UMKM, atau masukan untuk website kami.
                    </p>
                </div>

                <!-- Info Cards -->
                <div class="space-y-4">
                    <!-- Instagram Handle -->
                    <div class="flex items-center space-x-4 bg-slate-50 border border-slate-100 p-5 rounded-2xl">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-pink-500 to-amber-500 flex items-center justify-center text-white shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </div>
                        <div>
                            <span class="block text-xxs font-extrabold text-slate-400 uppercase tracking-wide">Instagram Resmi</span>
                            <a href="{{ \App\Models\SiteSetting::getValue('social_instagram', 'https://instagram.com/desa_keypyar') }}" target="_blank" class="block font-bold text-slate-900 text-sm hover:text-emerald-600 transition-colors">{{ \App\Models\SiteSetting::getValue('social_instagram_username', '@desa_keypyar') }}</a>
                        </div>
                    </div>

                    <!-- WA Business -->
                    <div class="flex items-center space-x-4 bg-slate-50 border border-slate-100 p-5 rounded-2xl">
                        <div class="w-10 h-10 rounded-xl bg-green-500 flex items-center justify-center text-white shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.455 5.703 1.456h.004c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <span class="block text-xxs font-extrabold text-slate-400 uppercase tracking-wide">WhatsApp Business</span>
                            <a href="https://wa.me/{{ \App\Models\SiteSetting::getValue('contact_whatsapp', '628123456789') }}" target="_blank" class="block font-bold text-slate-900 text-sm hover:text-emerald-600 transition-colors">{{ \App\Models\SiteSetting::getValue('contact_whatsapp_text', '+62 812-3456-789') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Contact Form using Alpine.js for Submission Status -->
            <div class="bg-white border border-slate-200/60 rounded-3xl p-8 shadow-sm" x-data="{ 
                submitting: false, 
                submitted: false,
                name: '',
                email: '',
                category: 'umum',
                subject: '',
                message: '',
                submitForm(e) {
                    this.submitting = true;
                    fetch('{{ route('kontak.submit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name: this.name,
                            email: this.email,
                            category: this.category,
                            subject: this.subject,
                            message: this.message
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.submitting = false;
                        if (data.success) {
                            this.submitted = true;
                            this.name = '';
                            this.email = '';
                            this.subject = '';
                            this.message = '';
                        } else {
                            alert(data.message || 'Gagal mengirim pesan.');
                        }
                    })
                    .catch(() => {
                        this.submitting = false;
                        alert('Terjadi kesalahan jaringan.');
                    });
                }
            }">
                <!-- Success Alert -->
                <div x-show="submitted" 
                     x-transition 
                     class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-6 rounded-2xl text-center space-y-4"
                     style="display: none;">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg font-display">Pesan Terkirim!</h4>
                        <p class="text-xs text-emerald-600 leading-relaxed mt-1">
                            Terima kasih atas pesan Anda. Pihak administrasi Desa Kepyar akan meninjau dan merespon secepatnya.
                        </p>
                    </div>
                    <button @click="submitted = false" class="text-xs font-bold text-emerald-700 bg-white border border-emerald-100 px-4 py-2 rounded-xl">Kirim Pesan Lain</button>
                </div>

                <!-- Form -->
                <form x-show="!submitted" @submit.prevent="submitForm" class="space-y-6">
                    <h4 class="font-bold text-slate-900 text-lg font-display mb-4">Formulir Kontak Elektronik</h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" x-model="name" required class="w-full px-4 py-3 rounded-xl border border-slate-200/80 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email</label>
                            <input type="email" x-model="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200/80 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kategori Pesan</label>
                            <select x-model="category" class="w-full px-4 py-3 rounded-xl border border-slate-200/80 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white">
                                <option value="wisata">Wisata / Booking</option>
                                <option value="umkm">Pemesanan UMKM</option>
                                <option value="umum">Informasi Umum</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Subjek</label>
                            <input type="text" x-model="subject" required class="w-full px-4 py-3 rounded-xl border border-slate-200/80 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Isi Pesan Anda</label>
                        <textarea x-model="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-slate-200/80 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white"></textarea>
                    </div>

                    <button type="submit" 
                            class="w-full py-4 rounded-2xl text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 active:scale-98 transition-all flex items-center justify-center space-x-2 shadow-md shadow-emerald-500/10"
                            :disabled="submitting">
                        <span x-show="!submitting">Kirim Surat / Masukan</span>
                        <span x-show="submitting" x-cloak class="flex items-center space-x-2">
                            <!-- Spinner -->
                            <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Mengirimkan...</span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
