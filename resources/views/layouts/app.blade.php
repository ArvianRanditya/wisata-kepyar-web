<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Optimization -->
    <title>@yield('title', 'Desa Kepyar - Pesona Alam, Kehangatan Tradisi')</title>
    <meta name="description" content="@yield('meta_description', 'Portal resmi dan promosi pariwisata Desa Kepyar, Wonogiri. Temukan keindahan Bukit Cumbri, Air Terjun Sanginan, kekayaan budaya Jawa, dan produk UMKM unggulan kami.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Desa Kepyar, Wonogiri, Bukit Cumbri, Wisata Wonogiri, UMKM Kepyar, Budaya Jawa, Purwantoro')">
    <meta name="author" content="Pemerintah Desa Kepyar">

    <!-- Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ \App\Models\SiteSetting::getValue('site_favicon', '/favicon.ico') }}">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen selection:bg-emerald-500 selection:text-white">

    <!-- Header Navigation -->
    <x-navbar />

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

</body>
</html>
