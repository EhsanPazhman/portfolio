<div class="w-full overflow-hidden">
    <section class="max-w-5xl mx-auto py-24 px-6 relative">

        <!-- Section Header -->
        <div class="flex flex-col items-center mb-24">
            <span class="text-blue-500 font-black text-[10px] uppercase tracking-[0.5em] mb-4">The Evolution</span>
            <h2
                class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors">
                Work Experience
            </h2>
        </div>

        <!-- Timeline Container -->
        <div class="relative space-y-20">

            <!-- Animated Heartbeat Line -->
            <div
                class="absolute inset-0 left-5 md:left-1/2 md:-translate-x-px h-full w-0.5 bg-slate-100 dark:bg-slate-800">
                <div
                    class="absolute inset-0 w-full h-full bg-linear-to-b from-transparent via-blue-500 to-transparent animate-heartbeat-line">
                </div>
            </div>

            @foreach ($owner->profile->experiences as $experience)
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">

                    <!-- Pulsing Indicator (The Heartbeat Dot) -->
                    <div
                        class="flex items-center justify-center w-10 h-10 rounded-xl border-2 border-white dark:border-slate-900 bg-white dark:bg-slate-950 shadow-2xl z-10 shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 transition-all duration-500 group-hover:scale-125 group-hover:border-blue-500">
                        <div class="relative flex h-3 w-3">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-600"></span>
                        </div>
                    </div>

                    <!-- Experience Card -->
                    <div
                        class="w-[calc(100%-4rem)] md:w-[45%] bg-white/40 dark:bg-slate-900/40 backdrop-blur-xl p-8 md:p-10 rounded-[2.5rem] border border-white/20 dark:border-slate-800/50 shadow-2xl transition-all duration-700 group-hover:bg-white/80 dark:group-hover:bg-slate-900/80 group-hover:-translate-y-3">

                        <div class="flex flex-col gap-3 mb-6">
                            <time
                                class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-500 bg-blue-500/5 w-fit px-3 py-1 rounded-lg">
                                {{ $experience->start_date }} — {{ $experience->end_date ?? 'Present' }}
                            </time>

                            <h3 class="text-2xl font-black text-slate-900 dark:text-white leading-tight">
                                {{ $experience->title }}
                            </h3>

                            <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
                                <span
                                    class="text-xs font-bold uppercase tracking-widest">{{ $experience->company }}</span>
                                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                            </div>
                        </div>

                        <!-- Tasks List with Custom Bullet Points -->
                        <ul class="space-y-4">
                            @php
                                $tasks = preg_split('/(?<=\.)\s+/', $experience->description, -1, PREG_SPLIT_NO_EMPTY);
                            @endphp

                            @foreach ($tasks as $task)
                                <li class="flex gap-4 items-start group/item">
                                    <div
                                        class="mt-1.5 shrink-0 w-4 h-0.5 bg-blue-500/30 group-hover/item:w-6 group-hover/item:bg-blue-500 transition-all duration-300">
                                    </div>
                                    <p
                                        class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed group-hover/item:text-slate-900 dark:group-hover/item:text-slate-100 transition-colors">
                                        {{ trim($task) }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Custom Heartbeat Animation Styles -->
    <style>
        @keyframes heartbeat-line {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100%);
            }
        }

        .animate-heartbeat-line {
            animation: heartbeat-line 4s linear infinite;
        }

        /* Custom scrollbar logic if needed */
        .backdrop-blur-xl {
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }
    </style>
</div>
