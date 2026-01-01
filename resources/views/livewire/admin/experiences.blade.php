<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-white uppercase tracking-tight">Work Experiences</h2>
            <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest">Manage your career timeline</p>
        </div>
        <button onclick="openModal('Experience')" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-all shadow-lg shadow-blue-600/20 active:scale-95">+ Add Exp</button>
    </div>

    <div class="bg-[#111827] border border-gray-800 rounded-2xl overflow-hidden shadow-xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-900/50 border-b border-gray-800">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Position & Company</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Duration</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                <!-- نمونه رکورد -->
                <tr class="hover:bg-gray-800/20 transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-white uppercase">Senior Developer</div>
                        <div class="text-xs text-blue-500 mt-0.5">Google Inc.</div>
                    </td>
                    <td class="px-6 py-4 text-xs text-gray-400 font-mono italic">
                        2024/01/01 - <span class="text-emerald-500 uppercase font-bold">Present</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-3">
                            <button class="text-[10px] font-black text-gray-500 hover:text-white uppercase tracking-tighter">Edit</button>
                            <button class="text-[10px] font-black text-red-500/70 hover:text-red-500 uppercase tracking-tighter">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
