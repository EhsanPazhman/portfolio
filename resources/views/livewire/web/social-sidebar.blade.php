<!-- Fixed Social Sidebar: Visible on large screens with smooth dark mode transition -->
<aside class="fixed right-6 top-1/2 -translate-y-1/2 z-50 hidden lg:flex flex-col gap-4 transition-all duration-500">
    <div
        class="bg-white/30 dark:bg-slate-900/30 glass p-3 rounded-full flex flex-col gap-5 shadow-2xl border border-white/20 dark:border-slate-800 transition-colors duration-500">

        @foreach ($owner->profile->socialLinks as $socialLink)
            <a href="{{ $this->formatUrl($socialLink->url) }}" target="_blank" rel="noopener noreferrer"
                title="{{ $socialLink->platform_name ?? 'Social Link' }}"
                class="group relative w-11 h-11 flex items-center justify-center rounded-full bg-slate-200/50 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 hover:bg-blue-600 dark:hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-blue-500/40 hover:-translate-x-1">

                <!-- Icon -->
                <i class="{{ $socialLink->icon }} text-xl transition-transform duration-300 group-hover:scale-110"></i>

                <!-- Tooltip (Optional visual hint for 2026 UX) -->
                <span
                    class="absolute right-14 scale-0 group-hover:scale-100 transition-all origin-right bg-slate-900 dark:bg-blue-600 text-white text-[10px] font-bold py-1 px-3 rounded-lg uppercase tracking-widest pointer-events-none">
                    {{ $socialLink->platform_name }}
                </span>
            </a>
        @endforeach

    </div>
</aside>
