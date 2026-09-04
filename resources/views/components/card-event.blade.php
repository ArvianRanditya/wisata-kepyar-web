@props(['event'])

@php
    // Dynamically choose colors based on frequency category
    $colors = match($event['frequency'] ?? 'weekly') {
        'tahunan' => [
            'bg' => 'bg-indigo-50 border-indigo-100',
            'badge' => 'bg-indigo-600 text-white',
            'text' => 'text-indigo-900',
            'icon' => 'text-indigo-500'
        ],
        'bulanan' => [
            'bg' => 'bg-teal-50 border-teal-100',
            'badge' => 'bg-teal-600 text-white',
            'text' => 'text-teal-900',
            'icon' => 'text-teal-500'
        ],
        'mingguan' => [
            'bg' => 'bg-amber-50 border-amber-100',
            'badge' => 'bg-amber-600 text-white',
            'text' => 'text-amber-900',
            'icon' => 'text-amber-500'
        ],
        default => [
            'bg' => 'bg-rose-50 border-rose-100',
            'badge' => 'bg-rose-600 text-white',
            'text' => 'text-rose-900',
            'icon' => 'text-rose-500'
        ],
    };
@endphp

<div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-md shadow-slate-100/50 hover:shadow-xl transition-all duration-300 flex flex-col justify-between h-full relative overflow-hidden group">
    <!-- Accent Line -->
    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-500 to-teal-400 group-hover:from-emerald-600 group-hover:to-teal-500 transition-all"></div>

    <div class="space-y-4">
        <!-- Badge & Frequency info -->
        <div class="flex items-center justify-between">
            <span class="inline-block text-xxs font-extrabold uppercase tracking-widest px-2.5 py-1 rounded-md {{ $colors['badge'] }}">
                {{ $event['frequency'] }}
            </span>
            <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">
                {{ $event['category'] ?? 'Event Desa' }}
            </span>
        </div>

        <div>
            <h3 class="text-lg font-bold text-slate-900 font-display mb-2 group-hover:text-emerald-600 transition-colors">
                {{ $event['name'] }}
            </h3>
            <p class="text-slate-500 text-xs leading-relaxed">
                {{ $event['description'] }}
            </p>
        </div>
    </div>

    <!-- Details footer -->
    <div class="mt-6 pt-4 border-t border-slate-100 flex flex-col gap-2">
        <div class="flex items-center text-xs text-slate-500">
            <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="font-medium text-slate-700">{{ $event['schedule'] }}</span>
        </div>
        
        @if(isset($event['location']))
            <div class="flex items-center text-xs text-slate-500">
                <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="text-slate-600">{{ $event['location'] }}</span>
            </div>
        @endif
    </div>
</div>
