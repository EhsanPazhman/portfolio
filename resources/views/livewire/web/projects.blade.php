<div class="w-full">
    <section class="max-w-6xl mx-auto py-24 px-6">
        <!-- Section Header - Modernized -->
        <div class="flex flex-col items-center mb-16">
            <div class="flex items-center gap-3 mb-4">
                <i class="fa-solid fa-layer-group text-blue-500 text-sm"></i>
                <span class="text-blue-500 font-black text-[10px] uppercase tracking-[0.5em] text-center">Selected Works</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors duration-500">
                Featured Projects
            </h2>
        </div>

        <!-- Projects Grid - Enhanced with better shadows and hover effects -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
            @foreach ($owner->profile->projects as $project)
                <article x-data="{ expanded: false }"
                    class="group bg-white dark:bg-slate-900/50 backdrop-blur-sm rounded-3xl overflow-hidden hover:-translate-y-1 transition-all duration-500 shadow-xl hover:shadow-2xl hover:shadow-blue-500/10 border border-slate-100 dark:border-slate-800/50 flex flex-col h-full">

                    <!-- Project Image Container -->
                    <div class="relative overflow-hidden h-56 bg-slate-200 dark:bg-slate-800 shrink-0">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-105 transition-all duration-700" />

                        <!-- Overlay on Hover - Now with a subtle gradient -->
                        <div
                            class="absolute inset-0 bg-linear-to-t from-slate-900/50 via-slate-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        
                        <!-- Tags Overlay -->
                        {{-- <div class="absolute bottom-4 left-4 flex gap-2">
                            <span class="px-3 py-1 bg-white/90 text-blue-600 text-[8px] font-black uppercase rounded-full shadow-md">Laravel</span>
                        </div> --}}
                    </div>

                    <!-- Project Content -->
                    <div class="p-8 flex flex-col grow">
                        <!-- Project Title - Fixed height to keep alignment -->
                        <h3
                            class="font-black text-xl text-slate-900 dark:text-white mb-3 tracking-tight transition-colors duration-500 line-clamp-2 h-14 shrink-0">
                            {{ $project->title }}
                        </h3>

                        <!-- Project Description - Compact but expandable -->
                        <div class="grow mb-6">
                            <div :class="expanded ? 'max-h-40 overflow-y-auto pr-2 custom-scrollbar' : ''"
                                class="transition-all duration-300">
                                <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed"
                                    :class="expanded ? '' : 'line-clamp-2'">
                                    {{ $project->description }}
                                </p>
                            </div>

                            <button @click="expanded = !expanded"
                                class="mt-4 text-[10px] font-bold uppercase tracking-widest text-blue-500 hover:text-blue-600 transition-colors focus:outline-none flex items-center gap-2">
                                <span x-show="!expanded">Read More <i class="fa-solid fa-arrow-right text-xs ml-1"></i></span>
                                <span x-show="expanded">Read Less <i class="fa-solid fa-arrow-left text-xs ml-1"></i></span>
                            </button>
                        </div>

                        <!-- Project Links - Always at bottom -->
                        <div
                            class="flex justify-between items-center border-t border-slate-100 dark:border-slate-800 pt-5 mt-auto shrink-0">
                            
                            <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                class="flex items-center gap-3 px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-full text-xs font-bold text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all group/link shadow-sm">
                                <i class="fa-brands fa-github text-base transition-transform group-hover/link:scale-110"></i>
                                Code
                            </a>

                            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                                class="flex items-center gap-3 px-4 py-2 bg-blue-600 text-white rounded-full text-xs font-bold hover:bg-blue-700 transition-all group/link shadow-md shadow-blue-600/30">
                                Live Demo <i class="fa-solid fa-arrow-up-right-from-square transition-transform group-hover/link:-translate-y-0.5 group-hover/link:translate-x-0.5 text-xs"></i>
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
