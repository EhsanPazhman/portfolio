<div class="w-full">
    <section class="max-w-5xl mx-auto py-24 px-6">
        <!-- Section Header -->
        <div class="flex flex-col items-center mb-20">
            <span class="text-blue-500 font-black text-[10px] uppercase tracking-[0.5em] mb-4 text-center">Professional Bio</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors duration-500">
                About Me
            </h2>
        </div>

        <!-- Experience Summary Section -->
        <div class="mb-24 relative">
            <div class="absolute -top-10 left-1/2 -translate-x-1/2 text-slate-100 dark:text-slate-800/50 text-8xl font-black -z-10 select-none">
                "
            </div>
            <div class="bg-slate-50/50 dark:bg-slate-800/20 backdrop-blur-sm rounded-[2.5rem] p-8 md:p-12 border border-slate-100 dark:border-slate-800/50 relative">
                <p class="text-xl md:text-2xl text-slate-700 dark:text-slate-300 leading-relaxed text-center font-medium italic">
                    {{ $owner->profile->experience_summary }}
                </p>
                <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 w-12 h-1.5 bg-blue-600 rounded-full"></div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-16 md:gap-24">
            <!-- Core Skills Section -->
            <div class="space-y-10">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-widest">Core Skills</h3>
                </div>

                <div class="grid gap-8">
                    @foreach ($owner->profile->skills as $skill)
                        <div class="group">
                            <div class="flex justify-between items-end mb-3">
                                <span class="text-sm font-black text-slate-800 dark:text-slate-200 tracking-wide uppercase">{{ $skill->name }}</span>
                                <span class="text-[10px] font-black text-blue-500 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-md">{{ $skill->level }}</span>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                                @php
                                    $percentage = match (strtolower($skill->level)) {
                                        'expert', 'advanced' => '90%',
                                        'intermediate' => '65%',
                                        'junior', 'beginner' => '40%',
                                        default => '50%',
                                    };
                                @endphp
                                <div class="bg-linear-to-r from-blue-600 to-indigo-600 h-full rounded-full transition-all duration-1000 group-hover:shadow-[0_0_12px_rgba(37,99,235,0.5)]"
                                    style="width: {{ $percentage }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Technologies Section -->
            <div class="space-y-10">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-900/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-widest">Tech Stack</h3>
                </div>

                <div class="flex flex-wrap gap-3">
                    @foreach ($owner->profile->technologies as $technology)
                        <div class="px-5 py-3 bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 text-slate-600 dark:text-slate-400 rounded-2xl text-[11px] font-bold tracking-wider shadow-sm hover:border-blue-500/50 hover:text-blue-600 hover:scale-105 transition-all duration-300 cursor-default flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-200 dark:bg-slate-700 group-hover:bg-blue-500 transition-colors"></span>
                            {{ $technology->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
