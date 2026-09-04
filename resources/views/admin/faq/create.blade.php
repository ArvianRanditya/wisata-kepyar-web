@extends('layouts.admin')

@section('title', 'Tambah FAQ - Admin Dashboard')
@section('page_title', 'Tambah FAQ Baru')

@section('admin_content')
<div class="max-w-2xl bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Formulir Tanya-Jawab Baru</p>
        <a href="{{ route('admin.faq.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <!-- Create FAQ Form -->
    <form action="{{ route('admin.faq.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Question (ID) -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pertanyaan (Bahasa Indonesia)</label>
                <input type="text" name="question_id" value="{{ old('question_id') }}" required placeholder="Contoh: Bagaimana cara memesan paket?"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors bg-white">
                @error('question_id')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Question (EN) -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pertanyaan (Bahasa Inggris)</label>
                <input type="text" name="question_en" value="{{ old('question_en') }}" required placeholder="Contoh: How do I book a package?"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors bg-white">
                @error('question_en')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Answer (ID) -->
            <div x-data="{ desc: '' }" x-init="desc = $el.querySelector('textarea').value">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Jawaban (Bahasa Indonesia)</label>
                <textarea name="answer_id" rows="6" required x-model="desc" placeholder="Tulis jawaban lengkap..."
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors bg-white">{{ old('answer_id') }}</textarea>
                <div class="flex justify-between items-center text-slate-400 text-xxs font-extrabold uppercase mt-1 px-1">
                    <span>Gunakan bahasa formal</span>
                    <span><span x-text="desc.length"></span> Karakter</span>
                </div>
                @error('answer_id')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Answer (EN) -->
            <div x-data="{ desc: '' }" x-init="desc = $el.querySelector('textarea').value">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Jawaban (Bahasa Inggris)</label>
                <textarea name="answer_en" rows="6" required x-model="desc" placeholder="Write answer translation..."
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 text-sm transition-colors bg-white">{{ old('answer_en') }}</textarea>
                <div class="flex justify-between items-center text-slate-400 text-xxs font-extrabold uppercase mt-1 px-1">
                    <span>Ensure correct translation</span>
                    <span><span x-text="desc.length"></span> Karakter</span>
                </div>
                @error('answer_en')
                    <span class="block text-xs font-semibold text-rose-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md transition-all">
            Simpan FAQ
        </button>
    </form>
</div>
@endsection
