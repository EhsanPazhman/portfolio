<!-- Main Navigation Header -->
<header class="fixed w-full top-0 z-50 px-6 py-6 transition-all duration-500">
    <nav
        class="max-w-5xl mx-auto bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl rounded-4xl px-8 py-3 flex justify-between items-center border border-white/20 dark:border-slate-800/50 shadow-[0_8px_32px_rgba(0,0,0,0.05)] dark:shadow-none transition-all duration-500">

        <!-- Logo Area -->
        <div class="flex items-center gap-3 group cursor-pointer">
            <div
                class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-600/30 group-hover:rotate-10 transition-all duration-500">
                <span class="font-black text-sm">EP</span>
            </div>
            <div class="text-slate-900 dark:text-white font-black text-xl tracking-[0.2em] uppercase transition-colors">
                Port<span class="text-blue-600">folio</span>
            </div>
        </div>

        <!-- Navigation Links (Desktop) -->
        <div class="hidden md:flex gap-10 items-center text-[10px] font-black uppercase tracking-[0.3em]">
            <a href="{{ route('home') }}"
                class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-500 transition-all relative group">
                Home
                <span
                    class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#projects"
                class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-500 transition-all relative group">
                Projects
                <span
                    class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#contact"
                class="px-6 py-3 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-2xl hover:bg-blue-600 dark:hover:bg-blue-600 dark:hover:text-white shadow-xl shadow-slate-900/10 dark:shadow-none transition-all duration-300 transform hover:-translate-y-0.5">
                Hire Me
            </a>
        </div>

        <!-- Right Action Controls -->
        <div class="flex items-center gap-3 border-l border-slate-100 dark:border-slate-800 pl-6 ml-3">
            <!-- Theme Toggle -->
            <button @click="darkMode = !darkMode; localStorage.setItem('color-theme', darkMode ? 'dark' : 'light')"
                class="w-11 h-11 flex items-center justify-center rounded-2xl bg-slate-50 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700/50 hover:border-blue-500/50 transition-all duration-300 group">
                <i x-show="!darkMode" class="fa-solid fa-moon group-hover:rotate-12 transition-transform"></i>
                <i x-show="darkMode" class="fa-solid fa-sun text-yellow-400" x-cloak></i>
            </button>

            @auth
                <!-- Admin Dashboard Link -->
                <a href="{{ route('admin.dashboard') }}"
                    class="w-11 h-11 flex items-center justify-center rounded-2xl bg-blue-50 dark:bg-blue-500/10 text-blue-600 shadow-sm hover:bg-blue-600 hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-layer-group text-sm"></i>
                </a>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit"
                        class="w-11 h-11 flex items-center justify-center rounded-2xl bg-red-50 dark:bg-red-500/10 text-red-500 border border-red-100 dark:border-red-500/20 hover:bg-red-500 hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-power-off text-sm"></i>
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>
