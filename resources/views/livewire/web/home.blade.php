<div class="relative" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 200)">

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative overflow-hidden px-6">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-125 h-125 bg-blue-600/10 rounded-full blur-[120px] -z-10">
        </div>

        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-16 items-center reveal" :class="{ 'active': loaded }">

            <div class="order-2 md:order-1 text-center md:text-left space-y-6">
                <h2 class="text-blue-500 font-black text-xs uppercase tracking-[0.3em]">Available for work</h2>
                <h1
                    class="text-5xl md:text-7xl font-black text-slate-900 leading-none tracking-tighter transition-colors duration-500">
                    I'm <span
                        class="text-transparent bg-clip-text bg-linear-to-r from-blue-500 to-indigo-600">{{ $owner->name }}</span>
                </h1>
                <h3
                    class="text-xl font-bold text-slate-600 tracking-tight transition-colors duration-500">
                    {{ $owner->profile->job_title }}</h3>
                <p class="text-slate-500 leading-relaxed max-w-md transition-colors duration-500">
                    {{ $owner->profile->bio }}</p>

                <div class="flex flex-wrap justify-center md:justify-start gap-4 pt-4">
                    <a href="#projects"
                        class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-600/20 active:scale-95">View
                        Work</a>
                    <a href="#contact"
                        class="px-8 py-4 glass text-slate-900 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-200/50 transition-all">Contact
                        Me</a>
                </div>
            </div>

            <div class="order-1 md:order-2 flex justify-center relative">
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-linear-to-r from-blue-600 to-indigo-600 rounded-full blur opacity-25 group-hover:opacity-50 transition duration-1000">
                    </div>
                    <img src="{{ asset('storage/' . $owner->profile->avatar) }}" alt="Avatar"
                        class="relative rounded-full w-64 h-64 md:w-80 md:h-80 object-cover grayscale hover:grayscale-0 transition-all duration-700 border-4 border-white shadow-2xl" />
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <div class="max-w-5xl mx-auto px-6 space-y-48 pb-32">

        <!-- About -->
        <div id="about" class="scroll-mt-32 reveal" x-data="{ isVisible: false }" x-intersect:enter="isVisible = true"
            x-intersect:leave="isVisible = false" :class="{ 'active': isVisible }">
            <livewire:web.about />
        </div>

        <!-- Projects -->
        <div id="projects" class="scroll-mt-32 reveal" x-data="{ isVisible: false }" x-intersect:enter="isVisible = true"
            x-intersect:leave="isVisible = false" :class="{ 'active': isVisible }">
            <livewire:web.projects />
        </div>

        <!-- Experiences -->
        <div id="experiences" class="scroll-mt-32 reveal" x-data="{ isVisible: false }" x-intersect:enter="isVisible = true"
            x-intersect:leave="isVisible = false" :class="{ 'active': isVisible }">
            <livewire:web.experiences />
        </div>

        <!-- Contact -->
        <div id="contact" class="scroll-mt-32 reveal" x-data="{ isVisible: false }" x-intersect:enter="isVisible = true"
            x-intersect:leave="isVisible = false" :class="{ 'active': isVisible }">
            <livewire:web.contact />
        </div>

    </div>
</div>
