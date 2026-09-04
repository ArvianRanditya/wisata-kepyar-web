@extends('layouts.app')

@section('title', 'Profil Desa Kepyar - Wonogiri')
@section('meta_description', 'Profil lengkap, sejarah, visi misi, data demografi, serta struktur pemerintahan desa Kepyar, Purwantoro, Wonogiri.')
@section('meta_keywords', 'Profil Desa Kepyar, Sejarah Kepyar, Visi Misi Desa Kepyar, Demografi Kepyar, Aparatur Desa Kepyar')

@section('content')
<!-- Header Page Banner -->
<section class="relative bg-slate-900 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-slate-900/80 z-10"></div>
        <img src="{{ \App\Models\SiteSetting::getValue('banner_profil', 'https://images.unsplash.com/photo-1472214222541-d510753a8707?auto=format&fit=crop&q=80&w=1200') }}" alt="Lembah Kepyar" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold font-display tracking-tight text-white mb-4">Profil Desa Kepyar</h1>
        <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
            Mengenal lebih dekat letak geografis, demografis, sejarah, visi misi, serta tata kelola pemerintahan Desa Kepyar.
        </p>
    </div>
</section>

<!-- Identitas & Demografi Section -->
<section id="identitas" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left Info Cards -->
            <div class="space-y-6">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block">Gambaran Umum</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display leading-tight">
                    Identitas Singkat Desa Kepyar
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Desa Kepyar merupakan salah satu desa berkembang yang berada di Kecamatan Purwantoro, Kabupaten Wonogiri, Provinsi Jawa Tengah. Karakteristik masyarakatnya yang asri, dinamis, dan kental dengan nilai kekeluargaan menjadikan desa ini daerah yang potensial di bidang wisata alam dan UMKM.
                </p>

                <!-- Small Grid Statistics -->
                <div class="grid grid-cols-2 gap-6 pt-4">
                    <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                        <span class="block text-3xl font-extrabold text-emerald-600">5.96 km²</span>
                        <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider mt-1">Luas Wilayah</span>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                        <span class="block text-3xl font-extrabold text-emerald-600">5.300+</span>
                        <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider mt-1">Jumlah Penduduk</span>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                        <span class="block text-3xl font-extrabold text-emerald-600">4 Dusun</span>
                        <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider mt-1">Wilayah Administrasi</span>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                        <span class="block text-3xl font-extrabold text-emerald-600">1 Jam</span>
                        <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider mt-1">Dari Kota Wonogiri</span>
                    </div>
                </div>
            </div>

            <!-- Right Dusun Grid -->
            <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 space-y-6">
                <h3 class="text-xl font-bold text-slate-900 font-display">Pembagian Wilayah Dusun</h3>
                <div class="space-y-4">
                    @foreach($dusun as $d)
                        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex justify-between items-center hover:border-emerald-500/20 transition-all">
                            <div>
                                <span class="block font-bold text-slate-900">{{ $d['name'] }}</span>
                                <span class="block text-xxs font-semibold text-slate-400 uppercase tracking-wide">Pilar: {{ $d['pilar'] }}</span>
                            </div>
                            <div class="text-right">
                                <span class="block text-xs text-slate-500 font-medium">Kadus: {{ $d['kadus'] }}</span>
                                <span class="block text-xxs text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md mt-1 inline-block">{{ $d['kk'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sejarah & Visi Misi Section -->
<section id="sejarah" class="py-20 bg-slate-50 border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Visi & Misi -->
            <div class="bg-emerald-900 text-white rounded-3xl p-8 lg:p-12 shadow-xl shadow-emerald-950/20 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-emerald-300 uppercase tracking-wider block mb-6">Arah Pembangunan</span>
                    <h3 class="text-3xl font-extrabold font-display mb-6">Visi Desa Kepyar</h3>
                    <blockquote class="text-lg italic font-medium leading-relaxed text-emerald-100 border-l-4 border-emerald-400 pl-4 mb-8">
                        "Bangkit bersama menuju Desa Kepyar yang jujur, adil, berbudaya, berprestasi, dan bermartabat."
                    </blockquote>
                </div>
                
                <div class="space-y-4">
                    <h4 class="font-bold text-white uppercase tracking-wider text-xs">Misi Pembangunan:</h4>
                    <ul class="space-y-2.5 text-sm text-emerald-100">
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mt-2 mr-2.5 shrink-0"></span>
                            <span>Meningkatkan profesionalisme pelayanan administrasi publik yang jujur & transparan.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mt-2 mr-2.5 shrink-0"></span>
                            <span>Mendorong kemandirian ekonomi desa melalui optimalisasi UMKM & Wisata Alam.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mt-2 mr-2.5 shrink-0"></span>
                            <span>Melestarikan nilai-nilai kebudayaan lokal gotong-royong dan tradisi leluhur.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sejarah Desa -->
            <div class="space-y-6 flex flex-col justify-center">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block">Nilai Historis</span>
                <h3 class="text-3xl font-extrabold text-slate-900 font-display">Asal Usul & Sejarah Desa</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Nama **Kepyar** berasal dari kata bahasa Jawa kuno yang menggambarkan keadaan alam yang terbuka lebar, terang benderang (*sumringah*), dan membawa harapan baru. Menurut sesepuh desa, wilayah ini awalnya dibuka oleh prajurit pelarian Kerajaan Mataram Islam yang mencari ketenangan dan mendirikan pemukiman agraris di lereng perbukitan Purwantoro.
                </p>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Seiring berjalannya waktu, kegigihan masyarakat dalam bertani, memelihara hutan rakyat, serta melestarikan seni tradisional karawitan membuat Desa Kepyar tumbuh menjadi pemukiman mandiri yang makmur. Gotong-royong atau *sambatan* yang melekat kuat pada budaya warga menjadi bahan bakar utama bertahannya kelestarian sosial desa ini hingga hari ini.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Geografis Section -->
<section id="geografis" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block">Geografis & Demografis</span>
                <h3 class="text-3xl font-extrabold text-slate-900 font-display">Kondisi Alam Perbukitan</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Secara geografis, Desa Kepyar didominasi oleh topografi perbukitan dan jurang yang subur, berbatasan langsung dengan perbatasan Jawa Timur (Ponorogo). Kondisi tanah ini sangat mendukung tanaman perkebunan keras seperti jati, sengon, cengkeh, serta budidaya tanaman peppermint yang menjadi produk khas komoditas kesehatan desa.
                </p>
                <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="font-semibold text-slate-700">Kondisi Cuaca:</span>
                        <span class="text-slate-500">Sejuk (22°C - 30°C)</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="font-semibold text-slate-700">Jenis Tanah:</span>
                        <span class="text-slate-500">Latosol (Sangat cocok untuk hortikultura)</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="font-semibold text-slate-700">Mata Pencaharian Utama:</span>
                        <span class="text-slate-500">Petani, Pengrajin Kayu, Peternak</span>
                    </div>
                </div>
            </div>

            <!-- Visual representation of terrain -->
            <div class="h-[400px] rounded-3xl overflow-hidden relative shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 to-transparent"></div>
                <img src="{{ \App\Models\SiteSetting::getValue('profil_image_geografis', 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&q=80&w=800') }}" alt="Persawahan Desa" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Pemerintahan Section -->
<section id="pemerintahan" class="py-20 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-3">Tata Kelola Desa</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-display">Struktur Pemerintahan Desa</p>
            <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($aparatur as $a)
                <div class="bg-white border border-slate-100 rounded-3xl p-5 shadow-sm text-center hover:shadow-md transition-all group">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-2 border-emerald-500/20 group-hover:border-emerald-500 transition-colors">
                        <img src="{{ $a['image'] }}" alt="{{ $a['name'] }}" class="w-full h-full object-cover">
                    </div>
                    <span class="block text-xxs font-bold text-emerald-600 uppercase tracking-wider mb-1">{{ $a['role'] }}</span>
                    <h4 class="font-bold text-slate-900 text-base font-display">{{ $a['name'] }}</h4>
                </div>
            @endforeach
        </div>

        <!-- BPD Announcement Card -->
        <div class="mt-12 bg-white rounded-3xl p-8 border border-slate-100 shadow-sm flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="max-w-xl">
                <h4 class="font-bold text-slate-900 text-lg">Badan Permusyawaratan Desa (BPD)</h4>
                <p class="text-slate-500 text-sm leading-relaxed mt-1">
                    Sebagai mitra kerja pemerintah desa dalam mengawasi pelaksanaan APBDes, menampung aspirasi masyarakat dusun, serta menyusun Peraturan Desa secara demokratis.
                </p>
            </div>
            <span class="text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 px-4 py-2.5 rounded-xl shrink-0">
                Hubungan Harmonis & Adil
            </span>
        </div>
    </div>
</section>
@endsection
