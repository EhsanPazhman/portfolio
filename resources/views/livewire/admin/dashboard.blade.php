<div>
    <div class="space-y-8 animate-in fade-in duration-500">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Total Projects</p>
                        <h3 class="text-3xl font-bold text-white mt-3">{{ $totalProjects }}</h3>
                    </div>
                    <div
                        class="p-3 bg-blue-500/10 rounded-xl text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition-all">
                        💼</div>
                </div>
            </div>

            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Inquiry Messages</p>
                        <h3 class="text-3xl font-bold text-blue-500 mt-3">{{ $totalMessages }}</h3>
                    </div>
                    <div
                        class="p-3 bg-blue-500/10 rounded-xl text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition-all">
                        ✉️</div>
                </div>
            </div>

            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-blue-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Active Skills</p>
                        <h3 class="text-3xl font-bold text-white mt-3">{{ $totalSkills }}</h3>
                    </div>
                    <div
                        class="p-3 bg-blue-500/10 rounded-xl text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition-all">
                        🧠</div>
                </div>
            </div>

            <div
                class="bg-[#111827] border border-gray-800 p-6 rounded-2xl shadow-sm hover:border-emerald-500/50 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">System Status</p>
                        <h3 class="text-2xl font-bold text-emerald-500 mt-3 uppercase font-mono tracking-tighter">Online
                        </h3>
                    </div>
                    <div
                        class="p-3 bg-emerald-500/10 rounded-xl text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                        ✅</div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Table -->
        <div class="bg-[#111827] border border-gray-800 rounded-2xl overflow-hidden shadow-xl">
            <div class="p-6 border-b border-gray-800 flex justify-between items-center">
                <h3 class="text-lg font-bold text-white">Recent Contacts</h3>
                <a href="{{ route('admin.contacts') }}"
                    class="text-[10px] font-bold text-blue-500 uppercase tracking-widest hover:text-white transition-colors">View
                    All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-900/50">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Sender
                            </th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Subject
                            </th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Date
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @forelse($recentMessages as $message)
                            <tr class="hover:bg-gray-800/20 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold text-white uppercase tracking-tight">{{ $message->name }}</span>
                                        <span class="text-[10px] text-gray-600 font-mono">{{ $message->email }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-400 italic">
                                    {{ $message->subject ?? 'No Subject' }}
                                </td>
                                <td class="px-6 py-4 text-[10px] text-gray-500 font-bold uppercase tracking-tighter">
                                    {{ $message->created_at->format('Y-m-d') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"
                                    class="px-6 py-10 text-center text-xs text-gray-600 uppercase font-bold tracking-[0.2em]">
                                    No Recent Activity</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
