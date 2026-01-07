<div class="w-full">
    <section class="max-w-4xl mx-auto py-16 px-6 relative">
        <!-- Section Header -->
        <div class="flex flex-col items-center mb-16">
            <span class="text-blue-500 font-black text-xs uppercase tracking-[0.4em] mb-3">My Journey</span>
            <h2
                class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors duration-500">
                Work Experience
            </h2>
        </div>

        <!-- Timeline Container -->
        <div
            class="relative space-y-12 before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-linear-to-b before:from-transparent before:via-blue-500/30 before:to-transparent">

            @foreach ($owner->profile->experiences as $experience)
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">

                    <!-- Timeline Indicator (Dot) -->
                    <div
                        class="flex items-center justify-center w-10 h-10 rounded-full border border-white dark:border-slate-800 bg-slate-50 dark:bg-slate-900 shadow-xl z-10 shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 transition-transform duration-500 group-hover:scale-110">
                        <div class="w-3 h-3 bg-blue-600 rounded-full animate-pulse"></div>
                    </div>

                    <!-- Experience Card -->
                    <div
                        class="w-[calc(100%-4rem)] md:w-[45%] bg-white/50 dark:bg-slate-900/50 glass p-8 rounded-3xl border border-transparent hover:border-blue-500/30 transition-all duration-500 shadow-lg hover:shadow-blue-500/5">

                        <div class="flex items-center justify-between mb-2">
                            <time class="font-black text-[10px] uppercase tracking-widest text-blue-600">
                                {{ $experience->start_date }} — {{ $experience->end_date ?? 'Present' }}
                            </time>
                        </div>

                        <h3
                            class="text-xl font-black text-slate-900 dark:text-white mb-1 transition-colors duration-500">
                            {{ $experience->title }}
                        </h3>

                        <p class="text-sm font-bold text-slate-500 dark:text-slate-400 mb-6 uppercase tracking-wide">
                            {{ $experience->company }}
                        </p>
                        <!-- Description List -->
                        <ul class="text-sm text-slate-600 dark:text-slate-400 space-y-3">
                            @php
                                // Optimized parsing: split by period followed by space
                                $tasks = preg_split('/(?<=\.)\s+/', $experience->description, -1, PREG_SPLIT_NO_EMPTY);
                            @endphp

                            @foreach ($tasks as $task)
                                <li class="flex gap-3 items-start leading-relaxed">
                                    <span class="text-blue-500 mt-1 shrink-0">
                                        <svg xmlns="www.w3.org" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                    <span>{{ trim($task) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</div>
