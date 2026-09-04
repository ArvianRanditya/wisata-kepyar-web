@extends('layouts.app')

@section('title', 'Desa Kepyar - Pesona Alam, Kehangatan Tradisi')

@section('content')
<!-- Hero Section -->
<section class="relative bg-slate-900 overflow-hidden min-h-[90vh] flex items-center">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/80 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('hero_image', 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=1600') }}" alt="Perbukitan Hijau Kepyar" class="w-full h-full object-cover object-center scale-105 animate-[pulse_8s_infinite_alternate]">
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 py-24 lg:py-32">
        <div class="max-w-3xl">
            <!-- Badge -->
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 mb-6 uppercase tracking-wider">
                Portal Resmi Desa Kepyar
            </span>
            
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold text-white font-display leading-[1.1] mb-6">
                {!! \App\Models\SiteSetting::getValue('hero_title', 'Pesona Alam,<br><span class="bg-gradient-to-r from-emerald-400 to-teal-300 bg-clip-text text-transparent">Kehangatan Tradisi</span>') !!}
            </h1>
            
            <p class="text-lg sm:text-xl text-slate-300 leading-relaxed mb-10 max-w-2xl">
                {{ \App\Models\SiteSetting::getValue('hero_subtitle', 'Selamat datang di Desa Kepyar – permata tersembunyi di tengah perbukitan hijau Purwantoro, Wonogiri. Temukan hamparan alam yang asri, kehidupan sosial berlandaskan gotong-royong, dan produk kerajinan serta kuliner UMKM lokal yang autentik.') }}
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#pilar" class="inline-flex items-center justify-center px-8 py-4 rounded-2xl text-base font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-lg shadow-emerald-500/20 active:scale-98 transition-all">
                    Jelajahi Sekarang
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-6l-7 7-7-7" />
                    </svg>
                </a>
                <a href="{{ \App\Models\SiteSetting::getValue('video_profile_youtube', 'https://www.youtube.com') }}" target="_blank" class="inline-flex items-center justify-center px-8 py-4 rounded-2xl text-base font-bold text-white bg-slate-800/80 hover:bg-slate-800 border border-slate-700 backdrop-blur-sm active:scale-98 transition-all">
                    <svg class="w-5 h-5 mr-2 text-rose-500 fill-current" viewBox="0 0 24 24">
                        <path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.517 3.545 12 3.545 12 3.545s-7.517 0-9.388.508a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.871.508 9.388.508 9.388.508s7.517 0 9.388-.508a3.002 3.002 0 002.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    Video Profil Desa
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 3 Pilar Section -->
<section id="pilar" class="py-24 bg-white relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-3">Tiga Pilar Utama</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">
                Pondasi Pembangunan & Potensi Desa Kepyar
            </p>
            <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pilar Wisata -->
            <div class="group bg-white rounded-3xl p-8 border border-slate-200/60 hover:border-emerald-500/20 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-emerald-100 flex items-center justify-center text-emerald-600 mb-6 group-hover:scale-105 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3 font-display">Destinasi Wisata</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">
                    Mulai dari puncak Bukit Cumbri yang menawan hingga kesegaran Air Terjun Sanginan dan petualangan Sungai Kresek.
                </p>
                <a href="{{ route('wisata') }}" class="inline-flex items-center text-sm font-bold text-emerald-600 hover:text-emerald-700">
                    Lihat Paket Wisata
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Pilar Budaya -->
            <div class="group bg-white rounded-3xl p-8 border border-slate-200/60 hover:border-teal-500/20 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-teal-100 flex items-center justify-center text-teal-600 mb-6 group-hover:scale-105 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3 font-display">Kekayaan Budaya</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">
                    Harmoni suara gending Karawitan Setia Iromo, ketoprak moral, dan filosofi hidup gotong-royong masyarakat Jawa.
                </p>
                <a href="{{ route('budaya') }}" class="inline-flex items-center text-sm font-bold text-teal-600 hover:text-teal-700">
                    Jelajahi Budaya
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Pilar UMKM -->
            <div class="group bg-white rounded-3xl p-8 border border-slate-200/60 hover:border-amber-500/20 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600 mb-6 group-hover:scale-105 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3 font-display">UMKM & Produk</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">
                    Mebel kayu jati eksklusif, kerajinan anyaman bambu nan estetik, dan ragam olahan minyak peppermint unggulan.
                </p>
                <a href="{{ route('umkm') }}" class="inline-flex items-center text-sm font-bold text-amber-600 hover:text-amber-700">
                    Beli Produk Lokal
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Wisata Section -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="max-w-2xl">
                <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-3">Rekomendasi Kunjungan</h2>
                <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">
                    Jelajahi Keindahan Wisata Alam Kepyar
                </p>
            </div>
            <a href="{{ route('wisata') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-bold text-emerald-600 hover:text-emerald-700">
                Lihat Semua Wisata
                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($wisataList as $wisata)
                <x-card-wisata :wisata="$wisata" />
            @endforeach
        </div>
    </div>
</section>

<!-- Featured UMKM Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="max-w-2xl">
                <h2 class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-3">UMKM Unggulan</h2>
                <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">
                    Dukung Ekonomi Lokal Desa Kepyar
                </p>
            </div>
            <a href="{{ route('umkm') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-bold text-amber-600 hover:text-amber-700">
                Lihat Semua Produk
                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($umkmList as $produk)
                <x-card-umkm :produk="$produk" />
            @endforeach
        </div>
    </div>
</section>



<!-- Galeri Preview Section -->
<section class="py-24 bg-slate-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-emerald-950/20 z-0"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-3">Galeri Visual</h2>
            <p class="text-3xl sm:text-4xl font-extrabold font-display">Sekilas Keindahan Desa Kami</p>
            <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            <div class="h-64 rounded-3xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-slate-950/30 group-hover:bg-transparent transition-colors z-10"></div>
                <img src="https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=800" alt="Cumbri" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="h-64 rounded-3xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-slate-950/30 group-hover:bg-transparent transition-colors z-10"></div>
                <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&q=80&w=800" alt="Sanginan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="h-64 rounded-3xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-slate-950/30 group-hover:bg-transparent transition-colors z-10"></div>
                <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?auto=format&fit=crop&q=80&w=800" alt="Anyaman" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="h-64 rounded-3xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-slate-950/30 group-hover:bg-transparent transition-colors z-10"></div>
                <img src="https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=800" alt="Karawitan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('galeri-kontak') }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-2xl text-sm font-bold text-slate-900 bg-white hover:bg-emerald-50 active:scale-95 transition-all">
                Lihat Seluruh Galeri & Hubungi Kami
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-white relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-3">Ulasan Pengunjung</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">Kehangatan yang Dirasakan Pengunjung</p>
            <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testi)
                <div class="bg-white border border-slate-200/60 rounded-3xl p-8 flex flex-col justify-between hover:shadow-lg transition-all duration-300">
                    <div class="space-y-4">
                        <!-- Stars -->
                        <div class="flex text-amber-400">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-slate-600 text-sm italic leading-relaxed">
                            "{{ $testi['quote'] }}"
                        </p>
                    </div>

                    <div class="flex items-center space-x-4 mt-8 pt-4 border-t border-slate-100">
                        <img src="{{ $testi['avatar'] }}" alt="{{ $testi['name'] }}" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <span class="block font-bold text-slate-900 text-sm">{{ $testi['name'] }}</span>
                            <span class="block text-xs text-slate-400 font-medium">{{ $testi['role'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Submit Review Section -->
<section class="py-20 bg-slate-50 border-t border-slate-100/80">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white border border-slate-200/60 rounded-3xl p-8 shadow-sm" x-data="{
            name: '',
            role: '',
            quote: '',
            submitting: false,
            submitted: false,
            submitReview() {
                this.submitting = true;
                fetch('{{ route('testimonial.submit') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        name: this.name,
                        role: this.role,
                        quote: this.quote
                    })
                })
                .then(res => res.json())
                .then(data => {
                    this.submitting = false;
                    if (data.success) {
                        this.submitted = true;
                        this.name = '';
                        this.role = '';
                        this.quote = '';
                    } else {
                        alert(data.message || 'Gagal mengirim ulasan.');
                    }
                })
                .catch(() => {
                    this.submitting = false;
                    alert('Terjadi kesalahan jaringan.');
                });
            }
        }">
            <!-- Success Message -->
            <div x-show="submitted" x-transition class="text-center space-y-4 py-8" style="display: none;">
                <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-lg text-slate-800">Ulasan Berhasil Dikirim!</h4>
                    <p class="text-xs text-slate-500 mt-1">
                        Terima kasih! Ulasan Anda telah diterima dan akan ditampilkan setelah dimoderasi oleh admin.
                    </p>
                </div>
                <button @click="submitted = false" class="text-xs font-bold text-emerald-650 bg-emerald-50 hover:bg-emerald-100 px-4 py-2 rounded-xl transition-all border border-emerald-100">
                    Kirim Ulasan Lain
                </button>
            </div>

            <!-- Form -->
            <form x-show="!submitted" @submit.prevent="submitReview()" class="space-y-6">
                <div class="text-center mb-6">
                    <h3 class="font-extrabold text-slate-900 text-xl font-display">Bagikan Pengalaman Anda</h3>
                    <p class="text-xs text-slate-500 mt-1">Berikan masukan atau ulasan tentang kunjungan Anda di Desa Wisata Kepyar</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                        <input type="text" x-model="name" required placeholder="Contoh: Rian Kurniawan"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white font-medium text-slate-700">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pekerjaan / Status</label>
                        <input type="text" x-model="role" required placeholder="Contoh: Wisatawan Solo"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white font-medium text-slate-700">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Ulasan Anda</label>
                    <textarea x-model="quote" rows="4" required placeholder="Tulis ulasan menarik Anda di sini..."
                              class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all bg-white font-medium text-slate-700"></textarea>
                </div>

                <button type="submit" :disabled="submitting"
                        class="w-full py-3.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all flex items-center justify-center space-x-2">
                    <span x-show="!submitting">Kirim Ulasan</span>
                    <span x-show="submitting" x-cloak class="flex items-center space-x-2">
                        <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Mengirim...</span>
                    </span>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
