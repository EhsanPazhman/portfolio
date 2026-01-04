<header class="fixed w-full top-0 z-50 px-6 py-4">
    <nav class="max-w-5xl mx-auto glass rounded-3xl px-6 py-3 flex justify-between items-center shadow-xl">
        <div class="text-slate-900 font-black text-2xl tracking-tighter">PORTFOLIO<span class="text-blue-600">.</span>
        </div>

        <div class="hidden md:flex gap-8 items-center text-[10px] font-bold uppercase tracking-widest">
            <a href="{{ route('home') }}" class="text-slate-700 hover:text-blue-600 transition-colors">Home</a>
            <a href="#projects" class="text-slate-700 hover:text-blue-600 transition-colors">Projects</a>
            <a href="#contact"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 shadow-lg shadow-blue-600/30 transition-all">Hire
                Me</a>
        </div>

        <div class="flex items-center gap-2">
            <button @click="darkMode = !darkMode; localStorage.setItem('color-theme', darkMode ? 'dark' : 'light')"
                class="w-10 h-10 flex items-center justify-center rounded-2xl bg-slate-100 text-slate-800 border border-slate-200 cursor-pointer">
                <i x-show="!darkMode" class="fa-solid fa-moon"></i>
                <i x-show="darkMode" class="fa-solid fa-sun" x-cloak></i>
            </button>
            @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="w-10 h-10 flex items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-600/20 hover:scale-105 transition-all">
                    <i class="fa-solid fa-gauge-high"></i>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-10 h-10 flex items-center justify-center rounded-2xl bg-red-100 dark:bg-red-500/10 text-red-600 border border-red-200 dark:border-red-500/20 hover:scale-105 transition-all">
                        <i class="fa-solid fa-power-off"></i>
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>
