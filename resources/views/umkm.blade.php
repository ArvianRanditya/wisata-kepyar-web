@extends('layouts.app')

@section('title', 'Katalog UMKM Desa Kepyar - Produk Lokal & Peppermint')
@section('meta_description', 'Beli produk UMKM unggulan Desa Kepyar, Wonogiri. Temukan kerajinan anyaman bambu buatan PKK, mebel kayu jati eksklusif, dan olahan minyak peppermint aromaterapi.')
@section('meta_keywords', 'UMKM Desa Kepyar, Anyaman Bambu Kepyar, Kerajinan Wonogiri, Mebel Kayu Jati Wonogiri, Minyak Peppermint Kepyar')

@section('content')
<!-- Header Page Banner -->
<section class="relative bg-slate-900 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-slate-950/80 z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('banner_umkm', 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&q=80&w=1200') }}" alt="Mebel Kayu Jati" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block text-xxs font-bold text-amber-300 uppercase tracking-widest bg-amber-500/20 px-3.5 py-1.5 rounded-full border border-amber-500/30 mb-4">Produk Unggulan</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold font-display tracking-tight text-white mb-4">Katalog UMKM Desa</h1>
        <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
            Dukung pengrajin dan pengusaha lokal Desa Kepyar. Mebel kayu jati, anyaman bambu, minyak peppermint, dan kuliner tradisional.
        </p>
    </div>
</section>

<!-- Products Grid Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($umkmList as $produk)
                <x-card-umkm :produk="$produk" />
            @endforeach
        </div>
    </div>
</section>

<!-- Purchase Methods Section -->
<section class="py-20 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-3">Panduan Transaksi</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">Cara Pembelian Produk</p>
            <div class="w-16 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Method 1: WA Delivery -->
            <div class="bg-slate-50 border border-slate-100 p-8 rounded-3xl text-center flex flex-col justify-between hover:bg-white hover:shadow-xl transition-all">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.717-1.458L0 24zm6.335-1.662c1.746.953 3.71 1.455 5.703 1.456h.004c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413 11.815 11.815 0 00-8.413-3.48c-6.556 0-11.89 5.335-11.893 11.893-.001 2.096.547 4.142 1.588 5.945L.057 24l6.335-1.662z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-display">WhatsApp Delivery</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Pesan langsung melalui admin desa dengan menekan tombol pesan pada produk. Kami melayani pengiriman area lokal maupun pengiriman kargo nasional.
                    </p>
                </div>
                <span class="block text-xs font-bold text-green-700 bg-green-50 px-3 py-1.5 rounded-lg mt-6 inline-block">Respon Cepat</span>
            </div>

            <!-- Method 2: Marketplace -->
            <div class="bg-slate-50 border border-slate-100 p-8 rounded-3xl text-center flex flex-col justify-between hover:bg-white hover:shadow-xl transition-all">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-display">Marketplace Online</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Beberapa kerajinan mebel dan olahan minyak peppermint resmi terdaftar di Tokopedia, Shopee, dan e-Katalog Desa milik pemerintah daerah.
                    </p>
                </div>
                <span class="block text-xs font-bold text-orange-700 bg-orange-50 px-3 py-1.5 rounded-lg mt-6 inline-block">Transaksi Aman</span>
            </div>

            <!-- Method 3: Kantor Desa -->
            <div class="bg-slate-50 border border-slate-100 p-8 rounded-3xl text-center flex flex-col justify-between hover:bg-white hover:shadow-xl transition-all">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-display">Pajangan Galeri Desa</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Anda dapat melihat, menyentuh, dan membeli langsung di ruang pameran produk UMKM yang terletak di teras Pendopo Balai Desa Kepyar saat jam kerja.
                    </p>
                </div>
                <span class="block text-xs font-bold text-amber-700 bg-amber-50 px-3 py-1.5 rounded-lg mt-6 inline-block">Buka Senin-Jumat</span>
            </div>
        </div>
    </div>
</section>
@endsection
