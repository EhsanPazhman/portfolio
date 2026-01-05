<aside class="fixed right-6 top-1/2 -translate-y-1/2 z-50 hidden lg:flex flex-col gap-4">
    <div class="glass p-3 rounded-full flex flex-col gap-5 shadow-2xl">
        @foreach ($owner->profile->socialLinks as $socialLink)
            <a href="{{ Str::startsWith($socialLink->url, ['http://', 'https://']) ? $socialLink->url : 'https://' . $socialLink->url }}" target="_blank"
                class="w-11 h-11 flex items-center justify-center rounded-full bg-slate-200/50 text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                <i class="{{ $socialLink->icon }} text-xl"></i>
            </a>
        @endforeach
    </div>
</aside>
