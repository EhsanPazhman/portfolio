<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-white">Projects List</h2>
        <button onclick="openModal('Project')" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl text-sm transition-all">+ Add Project</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Sample Project Card -->
        <div class="bg-[#111827] border border-gray-800 p-5 rounded-2xl group hover:border-indigo-500/50 transition-all">
            <div class="aspect-video bg-gray-900 rounded-xl mb-4 overflow-hidden border border-gray-800 flex items-center justify-center text-xs text-gray-700 uppercase font-bold tracking-widest">Image Placeholder</div>
            <h4 class="text-white font-bold text-lg">Personal Portfolio</h4>
            <p class="text-gray-500 text-sm mt-1 line-clamp-2 italic font-mono uppercase tracking-tighter">github.com</p>
            <div class="mt-4 flex justify-end gap-3">
                <button class="text-xs text-gray-400 hover:text-white uppercase font-bold">Edit</button>
                <button class="text-xs text-red-500/70 hover:text-red-500 uppercase font-bold">Delete</button>
            </div>
        </div>
    </div>
</div>
