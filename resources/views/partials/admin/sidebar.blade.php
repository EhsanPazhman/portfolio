<!-- SIDEBAR -->
<aside id="sidebar"
    class="sidebar-transition w-64 bg-[#111827] border-r border-gray-800 flex flex-col shrink-0 overflow-hidden">

    <!-- Logo Area -->
    <div class="p-6 border-b border-gray-800 flex items-center gap-3 h-16 shrink-0">
        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold shrink-0">P
        </div>
        <span class="sidebar-text text-white font-bold tracking-wider truncate">PORTFOLIO CMS</span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto custom-scrollbar">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all cursor-pointer group {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800/50 text-gray-400 hover:text-white' }}">
            <span class="text-xl">📊</span>
            <span class="sidebar-text text-sm truncate font-medium">Dashboard</span>
        </a>

        <!-- Users -->
        <a href="{{ route('admin.users') }}"
            class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all cursor-pointer group {{ request()->routeIs('admin.users') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800/50 text-gray-400 hover:text-white' }}">
            <span class="text-xl">👤</span>
            <span class="sidebar-text text-sm truncate font-medium">Users</span>
        </a>

        <!-- Projects -->
        <a href="{{ route('admin.projects') }}"
            class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all cursor-pointer group {{ request()->routeIs('admin.projects') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800/50 text-gray-400 hover:text-white' }}">
            <span class="text-xl">💼</span>
            <span class="sidebar-text text-sm truncate font-medium">Projects</span>
        </a>

        <!-- Experiences -->
        <a href="{{ route('admin.experiences') }}"
            class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all cursor-pointer group {{ request()->routeIs('admin.experiences') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800/50 text-gray-400 hover:text-white' }}">
            <span class="text-xl">⏳</span>
            <span class="sidebar-text text-sm truncate font-medium">Experiences</span>
        </a>

        <!-- Skills -->
        <a href="{{ route('admin.skills') }}"
            class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all cursor-pointer group {{ request()->routeIs('admin.skills') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800/50 text-gray-400 hover:text-white' }}">
            <span class="text-xl">🧠</span>
            <span class="sidebar-text text-sm truncate font-medium">Skills & Tech</span>
        </a>

        <!-- Messages -->
        <a href="{{ route('admin.contacts') }}"
            class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all cursor-pointer group {{ request()->routeIs('admin.contacts') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800/50 text-gray-400 hover:text-white' }}">
            <span class="text-xl">✉️</span>
            <span class="sidebar-text text-sm truncate font-medium">Messages</span>
        </a>

    </nav>

    <!-- User Profile Bottom -->
    <div class="p-4 border-t border-gray-800 bg-[#0d121f] shrink-0">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-600 shrink-0 shadow-lg shadow-blue-500/10">
            </div>
            <div class="sidebar-text overflow-hidden">
                <p class="text-xs font-bold text-white truncate">Admin Account</p>
                <p class="text-[10px] text-gray-500 uppercase">Super Admin</p>
            </div>
        </div>
    </div>
</aside>
