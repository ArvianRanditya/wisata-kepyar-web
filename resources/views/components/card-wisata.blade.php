@props(['wisata'])

<div class="group bg-white rounded-3xl overflow-hidden border border-slate-100 hover:border-emerald-500/10 shadow-md shadow-slate-100/50 hover:shadow-2xl hover:shadow-slate-200/60 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
    <!-- Image Spot -->
    <div class="h-64 overflow-hidden relative">
        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent z-10"></div>
        
        <!-- Category Badge -->
        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md text-emerald-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm z-20 uppercase tracking-wider">
            {{ $wisata['category'] ?? 'Wisata Alam' }}
        </span>

        @if($wisata['price'])
            <span class="absolute bottom-4 left-4 text-white font-bold text-sm bg-emerald-600/95 backdrop-blur-md px-3 py-1.5 rounded-xl z-20 shadow-md">
                {{ $wisata['price'] }}
            </span>
        @endif

        <img src="{{ $wisata['image'] }}" alt="{{ $wisata['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    </div>

    <!-- Content -->
    <div class="p-6 flex flex-col flex-grow">
        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition-colors font-display mb-2">
            {{ $wisata['name'] }}
        </h3>
        
        <p class="text-slate-500 text-sm leading-relaxed mb-6 flex-grow">
            {{ $wisata['description'] }}
        </p>

        <!-- Highlights & Details -->
        @if(isset($wisata['highlights']) && is_array($wisata['highlights']))
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach($wisata['highlights'] as $highlight)
                    <span class="inline-flex items-center text-xs font-medium text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">
                        {{ $highlight }}
                    </span>
                @endforeach
            </div>
        @endif

        <!-- Footer Card CTA -->
        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
            @if(isset($wisata['duration']))
                <span class="text-xs text-slate-400 flex items-center space-x-1">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $wisata['duration'] }}</span>
                </span>
            @else
                <span class="text-xs text-emerald-600 font-semibold flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Akses Publik</span>
                </span>
            @endif

            <a href="https://wa.me/{{ \App\Models\SiteSetting::getValue('contact_whatsapp', '628123456789') }}?text=Halo%20Admin%20Desa%20Kepyar,%20saya%20tertarik%20dengan%20paket%20wisata%20{{ urlencode($wisata['name']) }}" 
               target="_blank" 
               class="inline-flex items-center text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-xl transition-colors shadow-sm hover:shadow shadow-emerald-500/10">
                Booking
                <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</div>
