@extends('layouts.app')

@section('title', 'Seni & Budaya Desa Kepyar - Tradisi Jawa & Karawitan')
@section('meta_description', 'Kekayaan seni dan tradisi kebudayaan Jawa di Desa Kepyar, Wonogiri. Simak keindahan gending Karawitan Setia Iromo, ketoprak, pertunjukan wayang kulit, dan filosofi hidup luhur.')
@section('meta_keywords', 'Budaya Desa Kepyar, Karawitan Setia Iromo, Wayang Kulit Kepyar, Seni Ketoprak Tradisional, Tradisi Jawa Wonogiri')

@section('content')
<!-- Header Page Banner -->
<section class="relative bg-slate-900 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-slate-950/85 z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('banner_budaya', 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&q=80&w=1200') }}" alt="Wayang Kulit" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block text-xxs font-bold text-amber-300 uppercase tracking-widest bg-amber-500/20 px-3.5 py-1.5 rounded-full border border-amber-500/30 mb-4">Adiluhung Jawa</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold font-display tracking-tight text-white mb-4">Kebudayaan & Tradisi</h1>
        <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
            Menjaga denyut tradisi leluhur Jawa tetap lestari di tengah gempuran modernitas. Karawitan, Ketoprak, dan Wayang Kulit.
        </p>
    </div>
</section>

<!-- Filosofi Hidup Warga Desa -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-3">Nilai Luhur</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">Falsafah Hidup Warga Kepyar</p>
            <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($filosofi as $f)
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 hover:bg-white hover:shadow-xl transition-all duration-300 relative group overflow-hidden">
                    <div class="absolute top-0 left-0 bottom-0 w-1.5 bg-emerald-500 group-hover:w-2 transition-all"></div>
                    <h3 class="text-lg font-bold text-slate-900 font-display mb-3 pl-2">{{ $f['title'] }}</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed pl-2">{{ $f['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pertunjukan Seni Tradisional -->
<section class="py-20 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-3">Kesenian Rakyat</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">Seni Pertunjukan Tradisional</p>
            <div class="w-16 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="space-y-16">
            @foreach($budayaList as $index => $b)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Image Column (alternating order) -->
                    <div class="h-80 sm:h-96 rounded-3xl overflow-hidden shadow-md {{ $index % 2 == 1 ? 'lg:order-last' : '' }}">
                        <img src="{{ $b['image'] }}" alt="{{ $b['name'] }}" class="w-full h-full object-cover hover:scale-102 transition-transform duration-500">
                    </div>
                    
                    <!-- Text Content Column -->
                    <div class="space-y-6">
                        @if($b['name'] === 'Seni Karawitan Jawa')
                            <span class="inline-block text-xxs font-bold text-amber-800 bg-amber-100 px-3 py-1 rounded-md">Kelompok "Setia Iromo"</span>
                        @endif
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-display">{{ $b['name'] }}</h3>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                            {{ $b['description'] }}
                        </p>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                            Kesenian ini bukan sekadar media hiburan bagi masyarakat desa, melainkan wadah pemersatu yang menuntut ketenangan batin, penyelarasan jiwa, serta kekompakan kelompok. Setiap pementasan mengundang masyarakat untuk hanyut dalam keindahan nada gamelan tradisional.
                        </p>
                        @if($b['name'] === 'Seni Karawitan Jawa')
                            <div class="flex items-center space-x-3 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                <span>25+ Personil Aktif</span>
                                <span>&bull;</span>
                                <span>Latihan Rutin Bulanan</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gotong Royong Banner -->
<section class="py-24 bg-slate-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-emerald-950/20 z-0"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-6">
        <h3 class="text-3xl sm:text-4xl font-extrabold font-display leading-tight">Melestarikan Nilai "Gotong-Royong"</h3>
        <p class="text-slate-300 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto">
            Di Desa Kepyar, tradisi bergotong-royong seperti sambatan mendirikan rumah, gotong-royong panen raya, dan rukun tetangga bukan sekadar cerita sejarah, melainkan aktivitas sosial nyata yang masih kokoh dipraktikkan warga setiap minggu.
        </p>
        <div class="pt-4">
            <a href="{{ route('event') }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-2xl text-sm font-bold text-slate-900 bg-white hover:bg-emerald-50 active:scale-95 transition-all">
                Lihat Kalender Event Adat
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
