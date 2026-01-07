<div class="p-6">
    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">

        <!-- Dashboard Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Projects Stat -->
            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Total Projects</p>
                        <h3 class="text-3xl font-black text-white mt-3">{{ $totalProjects }}</h3>
                    </div>
                    <div
                        class="p-3 bg-blue-500/10 rounded-xl text-blue-500 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg xmlns="www.w3.org" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Messages Stat -->
            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Inquiry Messages</p>
                        <h3 class="text-3xl font-black text-blue-500 mt-3">{{ $totalMessages }}</h3>
                    </div>
                    <div
                        class="p-3 bg-blue-500/10 rounded-xl text-blue-500 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg xmlns="www.w3.org" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Skills Stat -->
            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Active Skills</p>
                        <h3 class="text-3xl font-black text-white mt-3">{{ $totalSkills }}</h3>
                    </div>
                    <div
                        class="p-3 bg-blue-500/10 rounded-xl text-blue-500 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg xmlns="www.w3.org" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Status Stat -->
            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-emerald-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">System Status</p>
                        <h3 class="text-2xl font-black text-emerald-500 mt-3 uppercase tracking-tighter">Online</h3>
                    </div>
                    <div
                        class="p-3 bg-emerald-500/10 rounded-xl text-emerald-500 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                        <svg xmlns="www.w3.org" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Contact Activity Table -->
        <div class="bg-[#111827] border border-gray-800 rounded-2xl overflow-hidden shadow-2xl">
            <div class="p-6 border-b border-gray-800 flex justify-between items-center bg-gray-900/30">
                <h3 class="text-lg font-black text-white uppercase tracking-tight">Recent Messages</h3>
                <a href="{{ route('admin.contacts') }}"
                    class="px-4 py-2 bg-gray-800 hover:bg-blue-600 text-[10px] font-black text-blue-500 hover:text-white rounded-lg uppercase tracking-widest transition-all duration-300">
                    View All Activity
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-900/50">
                            <th class="px-6 py-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Sender
                                Identity</th>
                            <th class="px-6 py-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">
                                Subject Line</th>
                            <th class="px-6 py-4 text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">
                                Submission Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @forelse($recentMessages as $message)
                            <tr class="hover:bg-blue-500/5 transition-colors duration-200">
                                <td class="px-6 py-5">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-black text-white tracking-tight uppercase">{{ $message->name }}</span>
                                        <span
                                            class="text-[10px] text-gray-600 font-mono mt-1 tracking-widest">{{ $message->email }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="text-xs text-gray-400 font-medium">
                                        {{ Str::limit($message->subject ?? 'General Inquiry', 40) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="text-[10px] text-gray-500 font-black uppercase tracking-tighter bg-gray-800/50 px-3 py-1 rounded-full">
                                        {{ $message->created_at->format('M d, Y') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center gap-2">
                                        <svg xmlns="www.w3.org" class="h-8 w-8 text-gray-700" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <span class="text-xs text-gray-600 uppercase font-black tracking-[0.2em]">No
                                            Recent Interactions Found</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
