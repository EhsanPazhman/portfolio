<div class="w-full">
    <section class="max-w-4xl mx-auto py-16 px-6">
        <!-- Section Header -->
        <div class="flex flex-col items-center mb-16">
            <span class="text-blue-500 font-black text-xs uppercase tracking-[0.4em] mb-3">Professional Bio</span>
            <h2
                class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors duration-500">
                About Me
            </h2>
        </div>

        <!-- Experience Summary Section -->
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6">
                <div class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></div>
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 uppercase tracking-widest">
                    Experience Summary</h3>
                <div class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></div>
            </div>
            <p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed text-center italic font-medium">
                "{{ $owner->profile->experience_summary }}"
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <!-- Skills with Progress Bars -->
            <div class="space-y-6">
                <h3
                    class="text-lg font-black text-slate-900 dark:text-white uppercase tracking-wider border-b-2 border-blue-500 w-fit pb-1 mb-6">
                    Core Skills
                </h3>
                <div class="space-y-5">
                    @foreach ($owner->profile->skills as $skill)
                        <div class="group">
                            <div class="flex justify-between mb-2">
                                <span
                                    class="text-sm font-bold text-slate-700 dark:text-slate-300">{{ $skill->name }}</span>
                                <span class="text-xs font-black text-blue-500 uppercase">{{ $skill->level }}</span>
                            </div>
                            <div class="w-full bg-slate-200 dark:bg-slate-800 rounded-full h-1.5 overflow-hidden">
                                @php
                                    // Mapping skill levels to percentage for visual bars
                                    $percentage = match (strtolower($skill->level)) {
                                        'expert', 'advanced' => '90%',
                                        'intermediate' => '65%',
                                        'junior', 'beginner' => '40%',
                                        default => '50%',
                                    };
                                @endphp
                                <div class="bg-blue-600 h-full rounded-full transition-all duration-1000 group-hover:bg-indigo-500"
                                    style="width: {{ $percentage }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Technologies with Badges -->
            <div class="space-y-6">
                <h3
                    class="text-lg font-black text-slate-900 dark:text-white uppercase tracking-wider border-b-2 border-blue-500 w-fit pb-1 mb-6">
                    Tech Stack
                </h3>
                <div class="flex flex-wrap gap-3">
                    @foreach ($owner->profile->technologies as $technology)
                        <span
                            class="px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 rounded-xl text-xs font-bold shadow-sm hover:border-blue-500 dark:hover:border-blue-500 hover:text-blue-600 transition-all duration-300 cursor-default">
                            {{ $technology->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
