<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Administrator - Desa Kepyar</title>

    <!-- Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-md w-full bg-white border border-slate-100 rounded-3xl p-8 shadow-sm relative overflow-hidden">
        <!-- Top decorative brand accent line -->
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-500 to-teal-500"></div>

        <div class="text-center mb-8">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center shadow-md shadow-emerald-500/10 mx-auto mb-4">
                <span class="text-white font-extrabold text-lg">K</span>
            </div>
            <h1 class="text-xl font-bold text-slate-900 tracking-tight">Login Portal Admin</h1>
            <p class="text-xxs text-slate-400 font-extrabold uppercase tracking-widest mt-1.5">Pemerintah Desa Kepyar</p>
        </div>

        <!-- Login Form -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email Field -->
            <div>
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@desakepyar.id"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-sm bg-white text-slate-800 placeholder-slate-400 transition-all font-semibold">
                @error('email')
                    <span class="block text-xs font-semibold text-rose-500 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div x-data="{ showPass: false }">
                <label class="block text-xxs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Kata Sandi</label>
                <div class="relative">
                    <input :type="showPass ? 'text' : 'password'" name="password" required placeholder="••••••••"
                           class="w-full pl-4 pr-12 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/10 focus:border-emerald-500 text-sm bg-white text-slate-800 placeholder-slate-400 transition-all font-semibold">
                    <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-emerald-600 transition-colors">
                        <!-- Eye Icon -->
                        <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Eye Off Icon -->
                        <svg x-show="showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <span class="block text-xs font-semibold text-rose-500 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me / Back home link -->
            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-slate-500 font-semibold cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-slate-200 text-emerald-600 focus:ring-emerald-500/20 mr-2">
                    <span>Ingat Saya</span>
                </label>
                <a href="{{ route('home') }}" class="text-emerald-650 hover:text-emerald-700 font-bold transition-colors">Kembali ke Beranda</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-4 rounded-2xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 active:scale-98 transition-all flex items-center justify-center space-x-2 shadow-md shadow-emerald-500/10">
                <span>Masuk Dashboard</span>
            </button>
        </form>
    </div>

</body>
</html>
