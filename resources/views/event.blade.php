@extends('layouts.app')

@section('title', 'Kalender Event Desa Kepyar - Festival Adat & Kegiatan Mingguan')
@section('meta_description', 'Ikuti jadwal kegiatan, festival adat tahunan Bersih Desa, pengajian Shalawat, dan senam sehat PKK di Desa Kepyar, Wonogiri.')
@section('meta_keywords', 'Event Desa Kepyar, Bersih Desa Kepyar, Kalender Kegiatan Kepyar, Pengajian Shalawat Wonogiri, Festival Budaya Kepyar')

@section('content')
<!-- Header Page Banner -->
<section class="relative bg-slate-900 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-slate-950/80 z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('banner_event', 'https://images.unsplash.com/photo-1534385842125-8c9ad2bd7f3b?auto=format&fit=crop&q=80&w=1200') }}" alt="Wayang Kulit Rame" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block text-xxs font-bold text-emerald-300 uppercase tracking-widest bg-emerald-500/20 px-3.5 py-1.5 rounded-full border border-emerald-500/30 mb-4">Agenda Agenda Desa</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold font-display tracking-tight text-white mb-4">Kalender Kegiatan & Event</h1>
        <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
            Ikuti berbagai keseruan bersih desa tahunan, latihan seni bulanan, hingga kajian mingguan. Rasakan hangatnya kebersamaan kami.
        </p>
    </div>
</section>

<!-- Interactive Tab & Events Grid -->
<section class="py-20 bg-slate-50" x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Tabs Menu using Alpine.js -->
        <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-16">
            <button @click="activeTab = 'all'" 
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-bold border transition-all"
                    :class="activeTab === 'all' ? 'bg-emerald-600 border-emerald-600 text-white shadow-md shadow-emerald-500/10' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-100'">
                Semua Kegiatan
            </button>
            <button @click="activeTab = 'tahunan'" 
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-bold border transition-all"
                    :class="activeTab === 'tahunan' ? 'bg-indigo-600 border-indigo-600 text-white shadow-md shadow-indigo-500/10' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-100'">
                Tahunan
            </button>
            <button @click="activeTab = 'bulanan'" 
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-bold border transition-all"
                    :class="activeTab === 'bulanan' ? 'bg-teal-600 border-teal-600 text-white shadow-md shadow-teal-500/10' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-100'">
                Bulanan
            </button>
            <button @click="activeTab = 'mingguan'" 
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-bold border transition-all"
                    :class="activeTab === 'mingguan' ? 'bg-amber-600 border-amber-600 text-white shadow-md shadow-amber-500/10' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-100'">
                Mingguan
            </button>
            <button @click="activeTab = 'festival'" 
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-bold border transition-all"
                    :class="activeTab === 'festival' ? 'bg-rose-600 border-rose-600 text-white shadow-md shadow-rose-500/10' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-100'">
                Festival Khusus
            </button>
        </div>

        <!-- Grid Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($eventList as $event)
                <div x-show="activeTab === 'all' || activeTab === '{{ $event['frequency'] }}'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="h-full">
                    <x-card-event :event="$event" />
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Additional Information Section -->
<section class="py-20 bg-white border-t border-slate-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h3 class="text-2xl sm:text-3xl font-extrabold font-display text-slate-900 leading-tight">Tertarik Mengikuti Kegiatan Kami?</h3>
        <p class="text-slate-500 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto">
            Hampir seluruh kegiatan bulanan dan mingguan desa bersifat terbuka dan gratis untuk wisatawan umum. Untuk kegiatan tahunan berskala besar, disarankan untuk melakukan konfirmasi penginapan/homestay terlebih dahulu melalui WhatsApp admin pengelola desa.
        </p>
        <div class="pt-4">
            <a href="{{ route('galeri-kontak') }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-2xl text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md shadow-emerald-500/10 active:scale-95 transition-all">
                Hubungi Panitia Pelaksana
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
