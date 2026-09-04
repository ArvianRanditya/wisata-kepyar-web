@extends('layouts.app')

@section('title', 'Wisata Alam Desa Kepyar - Spot Sunrise & Petualangan Air')
@section('meta_description', 'Jelajahi keindahan wisata alam Desa Kepyar, Wonogiri. Temukan keindahan sunrise Bukit Cumbri, kesegaran Air Terjun Sanginan, dan petualangan tubing Sungai Kresek.')
@section('meta_keywords', 'Wisata Desa Kepyar, Bukit Cumbri Wonogiri, Air Terjun Sanginan, Tubing Sungai Kresek, Paket Pendakian Cumbri')

@section('content')
<!-- Header Page Banner -->
<section class="relative bg-slate-900 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-slate-900/80 z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('banner_wisata', 'https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&q=80&w=1200') }}" alt="Bukit Cumbri" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block text-xxs font-bold text-emerald-300 uppercase tracking-widest bg-emerald-500/20 px-3.5 py-1.5 rounded-full border border-emerald-500/30 mb-4">Destinasi Wonogiri</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold font-display tracking-tight text-white mb-4">Eksplorasi Wisata Alam</h1>
        <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
            Dari ketinggian Bukit Cumbri hingga kesegaran petualangan tubing Sungai Kresek. Pilih petualangan liburan Anda berikutnya.
        </p>
    </div>
</section>

<!-- Tourism Cards Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($wisataList as $wisata)
                <x-card-wisata :wisata="$wisata" />
            @endforeach
        </div>
    </div>
</section>

<!-- Interactive Booking Flow & FAQ using Alpine.js -->
<section class="py-20 bg-white border-t border-slate-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-3">Informasi Perjalanan</h2>
            <p class="text-3xl font-extrabold text-slate-900 font-display">FAQ & Panduan Kunjungan Wisata</p>
            <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <!-- FAQ Accordion Group -->
        <div class="space-y-4" x-data="{ activeAccordion: null }">
            @foreach($faqList as $index => $faq)
                @php
                    $question = $faq->question_id;
                    $answer = $faq->answer_id;
                @endphp
                <div class="border border-slate-100 rounded-2xl overflow-hidden bg-slate-50 transition-colors" :class="activeAccordion === {{ $index }} ? 'border-emerald-500/20 bg-white' : ''">
                    <button @click="activeAccordion = activeAccordion === {{ $index }} ? null : {{ $index }}" class="w-full flex items-center justify-between p-6 text-left focus:outline-none">
                        <span class="font-bold text-slate-900 text-sm sm:text-base">{{ $question }}</span>
                        <svg class="w-5 h-5 text-slate-400 transform transition-transform" :class="activeAccordion === {{ $index }} ? 'rotate-180 text-emerald-600' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeAccordion === {{ $index }}" x-collapse x-cloak class="px-6 pb-6 text-slate-500 text-sm leading-relaxed border-t border-slate-100/50 pt-4" style="display: none;">
                        {{ $answer }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Safety Notice Card -->
        <div class="mt-16 bg-gradient-to-br from-emerald-800 to-teal-900 rounded-3xl p-8 text-white relative overflow-hidden shadow-lg shadow-emerald-950/20">
            <div class="absolute right-0 bottom-0 opacity-10 translate-x-12 translate-y-12">
                <svg class="w-72 h-72" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h-2v2h2v4H9v-2h2v-4H9V9h4v8z" />
                </svg>
            </div>
            <h4 class="font-bold text-xl mb-3 font-display">Keselamatan Wisatawan adalah Prioritas Kami</h4>
            <p class="text-sm text-emerald-100 leading-relaxed mb-6">
                Seluruh aktivitas petualangan air dan pendakian didampingi oleh Karang Taruna pengelola wisata yang bersertifikat. Kami rutin memeriksa debit air sungai serta kondisi cuaca ekstrem demi keselamatan Anda.
            </p>
            <span class="inline-block text-xxs font-extrabold uppercase tracking-widest bg-white/20 border border-white/30 px-3 py-1.5 rounded-lg">
                Safe Tourism Certified
            </span>
        </div>
    </div>
</section>
@endsection
