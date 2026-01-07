<div class="relative" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative overflow-hidden px-6">
        <!-- Background Ambient (Keeping your original theme) -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-150 h-150 bg-blue-600/5 dark:bg-blue-500/5 rounded-full blur-[120px] -z-10"></div>

        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-12 md:gap-20 items-center reveal" :class="{ 'active': loaded }">

            <!-- Information Column -->
            <div class="order-2 md:order-1 text-center md:text-left space-y-8">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-500/10 border border-blue-100 dark:border-blue-500/20">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="text-blue-600 dark:text-blue-400 font-black text-[9px] uppercase tracking-[0.2em]">Available for work</span>
                </div>

                <div class="space-y-4">
                    <h1 class="text-5xl md:text-7xl font-black text-slate-900 dark:text-white leading-[1.1] tracking-tighter transition-colors duration-500">
                        I'm <span class="text-transparent bg-clip-text bg-linear-to-r from-blue-600 to-indigo-600">{{ $owner->name }}</span>
                    </h1>
                    <h3 class="text-xl md:text-2xl font-bold text-slate-600 dark:text-slate-300 tracking-tight">
                        {{ $owner->profile->job_title }}
                    </h3>
                </div>

                <p class="text-slate-500 dark:text-slate-400 leading-relaxed max-w-md mx-auto md:mx-0 text-sm md:text-base transition-colors duration-500">
                    {{ $owner->profile->bio }}
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap justify-center md:justify-start items-center gap-5 pt-4">
                    <a href="#projects"
                        class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-600/20 active:scale-95">
                        View Work
                    </a>
                    
                    <livewire:web.download-resume />

                    <a href="#contact"
                        class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        Contact Me
                    </a>
                </div>
            </div>

            <!-- Avatar Column (Modernized Image Frame) -->
            <div class="order-1 md:order-2 flex justify-center relative">
                <div class="relative group">
                    <!-- Rotating Decorative Frame -->
                    <div class="absolute -inset-4 border border-slate-200 dark:border-slate-800 rounded-[3rem] rotate-6 group-hover:rotate-0 transition-transform duration-700 -z-10"></div>
                    <div class="absolute -inset-4 border border-blue-500/20 rounded-[3rem] -rotate-6 group-hover:rotate-0 transition-transform duration-700 -z-10"></div>
                    
                    <!-- Avatar Image -->
                    <div class="relative overflow-hidden rounded-[2.5rem] w-64 h-64 md:w-80 md:h-80 shadow-2xl border-4 border-white dark:border-slate-900 bg-slate-100 dark:bg-slate-800">
                        <img src="{{ asset('storage/' . $owner->profile->avatar) }}" alt="{{ $owner->name }}"
                            class="w-full h-full object-cover grayscale hover:grayscale-0 scale-105 hover:scale-100 transition-all duration-700" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <div class="max-w-5xl mx-auto px-6 space-y-48 pb-32">
        <div id="about" class="scroll-mt-32 reveal" x-intersect:enter="$el.classList.add('active')">
            <livewire:web.about />
        </div>
        <div id="projects" class="scroll-mt-32 reveal" x-intersect:enter="$el.classList.add('active')">
            <livewire:web.projects />
        </div>
        <div id="experiences" class="scroll-mt-32 reveal" x-intersect:enter="$el.classList.add('active')">
            <livewire:web.experiences />
        </div>
        <div id="contact" class="scroll-mt-32 reveal" x-intersect:enter="$el.classList.add('active')">
            <livewire:web.contact />
        </div>
    </div>
</div>
