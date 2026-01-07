<!--
    Fixed Social Sidebar Component
    Standard 2026 UX: Entrance animation via Alpine.js on page load.
    Accessibility: Secure rel attributes and hidden labels for screen readers.
-->
<aside x-data="{ show: false }" x-init="setTimeout(() => show = true, 500)" x-show="show" x-transition:enter="transition ease-out duration-1000"
    x-transition:enter-start="opacity-0 translate-x-12" x-transition:enter-end="opacity-100 -translate-y-1/2"
    class="fixed right-6 top-1/2 -translate-y-1/2 z-50 hidden lg:flex flex-col gap-4" x-cloak>

    <div
        class="bg-white/30 dark:bg-slate-900/30 glass p-3 rounded-full flex flex-col gap-5 shadow-2xl border border-white/20 dark:border-slate-800 transition-colors duration-500">

        @forelse ($owner->profile->socialLinks as $socialLink)
            <a href="{{ $this->formatUrl($socialLink->url) }}" target="_blank" rel="noopener noreferrer"
                title="{{ $socialLink->platform_name ?? 'Social Link' }}"
                class="group relative w-11 h-11 flex items-center justify-center rounded-full bg-slate-200/50 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 hover:bg-blue-600 dark:hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-blue-500/40 hover:-translate-x-1">

                <!-- Platform Icon -->
                <i class="{{ $socialLink->icon }} text-xl transition-transform duration-300 group-hover:scale-110"></i>

                <!-- Intelligent Tooltip (2026 Visual Standard) -->
                <span
                    class="absolute right-14 scale-0 group-hover:scale-100 transition-all duration-200 origin-right bg-slate-900 dark:bg-blue-600 text-white text-[9px] font-black py-1.5 px-3 rounded-xl uppercase tracking-widest pointer-events-none shadow-xl border border-white/10">
                    {{ $socialLink->platform_name }}
                </span>
            </a>
        @empty
            <!-- Fallback for empty social links if necessary -->
        @endforelse

    </div>
</aside>
