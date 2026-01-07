<div class="w-full">
    <section class="max-w-6xl mx-auto py-16 px-6">
        <!-- Section Header -->
        <div class="flex flex-col items-center mb-16">
            <span class="text-blue-500 font-black text-xs uppercase tracking-[0.4em] mb-3 text-center">Selected
                Works</span>
            <h2
                class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter transition-colors duration-500">
                Featured Projects</h2>
        </div>

        <!-- Projects Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
            @foreach ($owner->profile->projects as $project)
                <article x-data="{ expanded: false }"
                    class="group bg-white dark:bg-slate-900/50 glass rounded-3xl overflow-hidden hover:-translate-y-2 transition-all duration-500 shadow-xl border border-transparent dark:border-slate-800 flex flex-col h-full">

                    <!-- Project Image Container -->
                    <div class="relative overflow-hidden h-52 bg-slate-200 dark:bg-slate-800 shrink-0">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" loading="lazy"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" />

                        <!-- Overlay on Hover -->
                        <div
                            class="absolute inset-0 bg-linear-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                    </div>

                    <!-- Project Content -->
                    <div class="p-8 flex flex-col grow">
                        <!-- Project Title - Fixed height to keep alignment -->
                        <h3
                            class="font-black text-xl text-slate-900 dark:text-white mb-3 tracking-tight transition-colors duration-500 line-clamp-2 h-14 shrink-0">
                            {{ $project->title }}
                        </h3>

                        <!-- Project Description - Scrollable when expanded to protect layout -->
                        <div class="grow mb-4">
                            <div :class="expanded ? 'max-h-40 overflow-y-auto pr-2 custom-scrollbar' : ''"
                                class="transition-all duration-300">
                                <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed"
                                    :class="expanded ? '' : 'line-clamp-2'">
                                    {{ $project->description }}
                                </p>
                            </div>

                            <button @click="expanded = !expanded"
                                class="mt-2 text-[10px] font-bold uppercase tracking-widest text-blue-500 hover:text-blue-600 transition-colors focus:outline-none">
                                <span x-show="!expanded">Read More +</span>
                                <span x-show="expanded">Read Less -</span>
                            </button>
                        </div>

                        <!-- Project Links - Always at bottom -->
                        <div
                            class="flex justify-between items-center border-t border-slate-100 dark:border-slate-800 pt-5 mt-auto shrink-0">
                            <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                class="text-[10px] font-bold uppercase tracking-widest text-blue-500 hover:text-blue-600 transition-colors flex items-center gap-2 group/link">
                                <i
                                    class="fa-brands fa-github text-lg transition-transform group-hover/link:scale-110"></i>
                                Code
                            </a>

                            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                                class="text-[10px] font-bold uppercase tracking-widest text-slate-900 dark:text-slate-200 hover:text-blue-500 dark:hover:text-blue-400 transition-colors flex items-center gap-2 group/link">
                                Live Demo <i
                                    class="fa-solid fa-arrow-up-right-from-square transition-transform group-hover/link:-translate-y-0.5 group-hover/link:translate-x-0.5"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <style>
        /* Custom scrollbar for expanded description to keep it clean */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 10px;
        }
    </style>
</div>
