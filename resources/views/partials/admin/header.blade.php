        <!-- HEADER -->
        <header
            class="h-16 border-b border-gray-800 flex items-center justify-between px-6 bg-[#111827]/50 backdrop-blur-md shrink-0">
            <div class="flex items-center gap-4">
                <!-- Burger Button -->
                <button onclick="toggleSidebar()"
                    class="p-2 hover:bg-gray-800 rounded-lg text-gray-400 hover:text-white transition-all outline-none">
                    <svg xmlns="www.w3.org" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h2 id="current-title" class="text-lg font-semibold text-white tracking-tight">Dashboard Overview</h2>
            </div>
            <div class="flex items-center gap-3">
                <a href="/"> <span
                        class="hidden md:inline text-xs bg-emerald-500/10 text-emerald-500 px-3 py-1 rounded-full border border-emerald-500/20 font-medium">Go
                        to site</span></a>
            </div>
        </header>
