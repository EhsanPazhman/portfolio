<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 animate-in fade-in duration-500">
        
        <!-- SKILLS SECTION -->
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <h3 class="text-lg font-bold text-white uppercase tracking-widest border-l-4 border-blue-600 pl-3">Skills List</h3>
                <button onclick="openModal('Skill')" class="text-blue-500 hover:text-blue-400 text-xs font-bold uppercase tracking-tighter transition-all">+ Add Skill</button>
            </div>
            
            <div class="bg-[#111827] border border-gray-800 rounded-2xl overflow-hidden">
                <table class="w-full text-left">
                    <tbody class="divide-y divide-gray-800">
                        <tr class="hover:bg-gray-800/30 transition-all">
                            <td class="px-6 py-4 text-sm font-medium text-gray-200">PHP / Laravel</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 bg-blue-500/10 text-blue-500 text-[10px] rounded border border-blue-500/20 font-bold uppercase tracking-widest">Advanced</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-gray-600 hover:text-red-500 transition-colors">×</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TECHNOLOGIES SECTION -->
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <h3 class="text-lg font-bold text-white uppercase tracking-widest border-l-4 border-emerald-600 pl-3">Tech Stack</h3>
                <button onclick="openModal('Technology')" class="text-emerald-500 hover:text-emerald-400 text-xs font-bold uppercase tracking-tighter transition-all">+ Add Tech</button>
            </div>
            
            <div class="bg-[#111827] border border-gray-800 p-6 rounded-2xl">
                <div class="flex flex-wrap gap-3">
                    <!-- نمونه تکنولوژی -->
                    <div class="group flex items-center gap-2 bg-[#0b0f1a] border border-gray-800 px-4 py-2 rounded-xl hover:border-emerald-500/50 transition-all">
                        <span class="text-xs font-bold text-gray-300 uppercase tracking-widest">Docker</span>
                        <button class="text-gray-700 group-hover:text-red-500 transition-colors">&times;</button>
                    </div>
                    
                    <div class="group flex items-center gap-2 bg-[#0b0f1a] border border-gray-800 px-4 py-2 rounded-xl hover:border-emerald-500/50 transition-all">
                        <span class="text-xs font-bold text-gray-300 uppercase tracking-widest">Redis</span>
                        <button class="text-gray-700 group-hover:text-red-500 transition-colors">&times;</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
