@props(['produk'])

<div class="group bg-white rounded-3xl overflow-hidden border border-slate-100 hover:border-amber-500/10 shadow-md shadow-slate-100/50 hover:shadow-2xl hover:shadow-slate-200/60 hover:-translate-y-1.5 transition-all duration-300 flex flex-col h-full">
    <!-- Image -->
    <div class="h-56 overflow-hidden relative bg-slate-50">
        <!-- Category Badge -->
        <span class="absolute top-4 left-4 bg-slate-900/90 backdrop-blur-md text-white text-xxs font-bold px-2.5 py-1.5 rounded-lg shadow-sm z-20 uppercase tracking-widest">
            {{ $produk['category'] }}
        </span>

        <img src="{{ $produk['image'] }}" alt="{{ $produk['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    </div>

    <!-- Info -->
    <div class="p-6 flex flex-col flex-grow">
        <h3 class="text-lg font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors font-display mb-1.5">
            {{ $produk['name'] }}
        </h3>
        
        <p class="text-slate-500 text-xs leading-relaxed mb-4 flex-grow">
            {{ $produk['description'] }}
        </p>

        <!-- Checkout Section -->
        <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
            <div>
                <span class="block text-xxs font-bold text-slate-400 uppercase tracking-wider">Mulai Dari</span>
                <span class="block text-base font-extrabold text-amber-600">
                    {{ $produk['price'] }}
                </span>
            </div>

            <a href="https://wa.me/{{ \App\Models\SiteSetting::getValue('contact_whatsapp', '628123456789') }}?text=Halo%20Pemerintah%20Desa%20Kepyar,%20saya%20tertarik%20untuk%20memesan%20produk%20UMKM%20{{ urlencode($produk['name']) }}" 
               target="_blank" 
               class="inline-flex items-center text-xs font-bold text-white bg-amber-600 hover:bg-amber-700 px-4 py-2.5 rounded-xl transition-colors shadow-sm hover:shadow shadow-amber-500/10">
                Pesan WhatsApp
                <svg class="w-3.5 h-3.5 ml-1.5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.455 5.703 1.456h.004c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </a>
        </div>
    </div>
</div>
