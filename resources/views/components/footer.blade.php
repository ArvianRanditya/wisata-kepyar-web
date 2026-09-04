<footer class="bg-slate-900 text-slate-400 pt-16 pb-8 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand Column -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center shadow-md shadow-emerald-500/20">
                        <span class="text-white font-bold text-lg font-display">K</span>
                    </div>
                    <div>
                        <span class="block text-lg font-extrabold text-white tracking-tight">Desa Kepyar</span>
                        <span class="block text-xs text-slate-500 font-medium tracking-wider uppercase">Wonogiri, Jawa Tengah</span>
                    </div>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed pt-2">
                    Permata tersembunyi di perbukitan Wonogiri. Menyatukan keindahan alam yang asri, kehangatan budaya gotong-royong, dan kreativitas UMKM lokal yang mandiri.
                </p>
                <div class="flex space-x-4 pt-4">
                    <!-- Instagram -->
                    <a href="{{ \App\Models\SiteSetting::getValue('social_instagram', 'https://instagram.com/desa_keypyar') }}" target="_blank" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <!-- Facebook -->
                    <a href="{{ \App\Models\SiteSetting::getValue('social_facebook', '#') }}" target="_blank" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                    </a>
                    <!-- YouTube -->
                    <a href="{{ \App\Models\SiteSetting::getValue('social_youtube', '#') }}" target="_blank" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.517 3.545 12 3.545 12 3.545s-7.517 0-9.388.508a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.871.508 9.388.508 9.388.508s7.517 0 9.388-.508a3.002 3.002 0 002.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <!-- TikTok -->
                    <a href="{{ \App\Models\SiteSetting::getValue('social_tiktok', '#') }}" target="_blank" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-1.01-.02 1.83.01 3.65-.01 5.48-.1 2.45-1.12 4.86-3 6.38-2.02 1.68-4.82 2.36-7.39 1.85-2.67-.5-5.02-2.3-6.17-4.79-.97-2.05-1.07-4.52-.3-6.61.85-2.36 2.87-4.19 5.27-4.78 1.1-.28 2.24-.26 3.37-.03v4.11c-.96-.28-2.03-.18-2.91.35-1.15.68-1.81 2.05-1.63 3.38.16 1.25.96 2.37 2.1 2.83 1.19.49 2.6.28 3.58-.58.82-.7 1.21-1.79 1.18-2.86-.02-3.4 0-6.81-.01-10.21z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4 md:pl-8">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Jelajahi</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-emerald-500 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-emerald-500 transition-colors">Profil Desa</a></li>
                    <li><a href="{{ route('wisata') }}" class="hover:text-emerald-500 transition-colors">Wisata Alam</a></li>
                    <li><a href="{{ route('budaya') }}" class="hover:text-emerald-500 transition-colors">Seni & Budaya</a></li>
                    <li><a href="{{ route('umkm') }}" class="hover:text-emerald-500 transition-colors">UMKM Produk</a></li>
                    <li><a href="{{ route('event') }}" class="hover:text-emerald-500 transition-colors">Event Desa</a></li>
                </ul>
            </div>

            <!-- Operational Info -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Jam Operasional</h3>
                <ul class="space-y-2.5 text-sm">
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <span class="block text-white font-medium">Pelayanan Kantor Desa</span>
                            <span class="block text-xs text-slate-500">Senin - Jumat | 08:00 - 16:00 WIB</span>
                        </div>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-xs">
                            Jl. Raya Purwantoro-Ponorogo, Kec. Purwantoro, Kabupaten Wonogiri, Jawa Tengah
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Map / Quick Contact -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Kontak Resmi</h3>
                <ul class="space-y-2.5 text-sm">
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="font-medium text-white hover:text-emerald-500 transition-colors">
                            <a href="https://wa.me/{{ \App\Models\SiteSetting::getValue('contact_whatsapp', '628123456789') }}" target="_blank">{{ \App\Models\SiteSetting::getValue('contact_whatsapp_text', '+62 812-3456-789') }} (WA)</a>
                        </span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-slate-400">info@desakepyar.id</span>
                    </li>
                </ul>
                <!-- Small embedded-looking aesthetic map area -->
                <div class="w-full h-24 rounded-xl overflow-hidden relative group border border-slate-800">
                    <div class="absolute inset-0 bg-slate-950/20 group-hover:bg-transparent transition-colors z-10"></div>
                    <iframe src="{{ \App\Models\SiteSetting::getValue('contact_gmaps_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15805.80775988118!2d111.27216664999999!3d-7.95213885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799db9c17df3bf%3A0xe53cc64700d27fd4!2sKepyar%2C%20Purwantoro%2C%20Wonogiri%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid') }}" class="w-full h-full border-0 grayscale hover:grayscale-0 transition-all duration-300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs">
            <p>&copy; {{ date('Y') }} Pemerintah Desa Kepyar. Hak Cipta Dilindungi.</p>
            <p class="mt-4 md:mt-0 flex space-x-4">
                <a href="#" class="hover:text-emerald-500 transition-colors">Kebijakan Privasi</a>
                <span>&bull;</span>
                <a href="#" class="hover:text-emerald-500 transition-colors">Syarat & Ketentuan</a>
                <span>&bull;</span>
                <a href="{{ route('admin.login') }}" class="text-emerald-500 hover:text-emerald-400 font-bold transition-colors">Login Admin</a>
            </p>
        </div>
    </div>
</footer>
