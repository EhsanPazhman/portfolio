<div>
    <section class="max-w-4xl mx-auto py-16 relative">
        <div class="flex flex-col items-center mb-12">
            <h2 class="text-blue-500 font-black text-xs uppercase tracking-[0.4em] mb-2">My Journey</h2>
            <h1 class="text-4xl font-black text-gray-900 tracking-tighter text-center">Work Experience
            </h1>
        </div>

        <div
            class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-linear-to-b before:from-transparent before:via-blue-500/20 before:to-transparent">
            @foreach ($owner->profile->experiences as $experience)
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                    <!-- Dot -->
                    <div
                        class="flex items-center justify-center w-10 h-10 rounded-full border border-white/10 glass shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                        <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                    </div>
                    <!-- Content Card -->
                    <div
                        class="w-[calc(100%-4rem)] md:w-[45%] glass p-6 rounded-3xl hover:border-blue-500/30 transition-all duration-500">
                        <div class="flex items-center justify-between mb-1">
                            <time
                                class="font-black text-[10px] uppercase tracking-widest text-blue-500">{{ $experience->start_date }}
                                — {{ $experience->end_date }}</time>
                        </div>
                        <h3 class="text-lg font-black text-gray-900">{{ $experience->title }}</h3>
                        <p class="text-sm font-bold text-gray-500 mb-4">{{ $experience->company }}</p>
                        <ul class="text-sm text-gray-500 space-y-2 list-none">
                            @foreach (preg_split('/(?<=\.)\s+/', $experience->description) as $sentence)
                                @if (trim($sentence) !== '')
                                    <li class="flex gap-2"><span class="text-blue-500">•</span> {{ trim($sentence) }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
