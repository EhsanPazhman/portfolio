<div>
    <div x-data="{
        notifications: [],
        add(message) {
            this.notifications.push({ id: Date.now(), msg: message });
            setTimeout(() => { this.notifications.shift() }, 3000);
        }
    }" @notify.window="add($event.detail)">
        <!-- Toast Notifications -->
        <div class="fixed top-8 right-8 z-[100] space-y-3">
            <template x-for="note in notifications" :key="note.id">
                <div x-transition
                    class="bg-white text-black px-6 py-4 rounded-2xl shadow-2xl font-bold text-xs uppercase tracking-widest flex items-center gap-3">
                    <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                    <span x-text="note.msg"></span>
                </div>
            </template>
        </div>

        <div class="flex justify-between items-center mb-10">
            <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Projects</h2>
            <button wire:click="openModal"
                class="bg-blue-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20 cursor-pointer active:scale-95">
                Create Project
            </button>
        </div>

        <div class="bg-[#111827] border border-gray-800 rounded-[2rem] overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr
                        class="bg-gray-900/40 border-b border-gray-800 text-[10px] uppercase text-gray-500 font-black tracking-[0.2em]">
                        <th class="px-8 py-6">ID</th>
                        <th class="px-8 py-6">Title</th>
                        <th class="px-8 py-6">URLs</th>
                        <th class="px-8 py-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @foreach ($projects as $project)
                        <tr class="hover:bg-gray-800/10 transition-all group">
                            <td class="px-8 py-6 text-xs font-mono text-gray-600">#{{ $project->id }}</td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    @if ($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}"
                                            class="w-10 h-10 rounded-lg object-cover">
                                    @else
                                        <div class="w-10 h-10 bg-gray-800 rounded-lg"></div>
                                    @endif
                                    <span class="text-sm font-bold text-white uppercase">{{ $project->title }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex gap-2">
                                    @if ($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank"
                                            class="text-[10px] bg-gray-800 px-3 py-1.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700 transition-all cursor-pointer font-bold uppercase tracking-tighter">
                                            GitHub
                                        </a>
                                    @endif

                                    @if ($project->demo_url)
                                        <a href="{{ $project->demo_url }}" target="_blank"
                                            class="text-[10px] bg-blue-600/10 px-3 py-1.5 rounded-lg text-blue-500 hover:bg-blue-600 hover:text-white transition-all cursor-pointer font-bold uppercase tracking-tighter">
                                            Live Demo
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <button wire:click="edit({{ $project->id }})"
                                    class="text-[10px] font-black text-gray-400 hover:text-white uppercase tracking-widest mr-4 transition-colors cursor-pointer">
                                    Edit
                                </button>

                                <button wire:click="delete({{ $project->id }})" wire:confirm="Confirm deletion?"
                                    class="text-[10px] font-black text-red-500/50 hover:text-red-500 uppercase tracking-widest transition-colors cursor-pointer">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($isModalOpen)
            <div class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-[110] p-6">
                <div
                    class="bg-[#111827] border border-gray-800 w-full max-w-2xl rounded-[2.5rem] shadow-3xl overflow-hidden">
                    <div class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20">
                        <h3 class="text-lg font-black text-white uppercase tracking-widest">
                            {{ $project_id ? 'Edit' : 'New' }} Project</h3>
                        <button wire:click="closeModal"
                            class="text-gray-500 hover:text-white text-2xl transition-all cursor-pointer p-2 hover:bg-white/5 rounded-full outline-none">
                            &times;</button>
                    </div>
                    <div class="p-10 grid grid-cols-2 gap-6">
                        <div class="col-span-2 space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Title</label>
                            <input type="text" wire:model.live="title"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('title')
                                <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">GitHub
                                URL</label>
                            <input type="text" wire:model.live="github_url"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Demo
                                URL</label>
                            <input type="text" wire:model.live="demo_url"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        </div>
                        <div class="col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Image
                                Asset</label>
                            <input type="file" wire:model="image"
                                class="w-full text-xs text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer cursor-pointer">
                        </div>
                        <div class="col-span-2 space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Description</label>
                            <textarea wire:model.live="description"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all h-24 resize-none"></textarea>
                        </div>
                        <div class="col-span-2 flex gap-4 pt-4">
                            <button wire:click="closeModal"
                                class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest transition-all cursor-pointer hover:bg-gray-800 hover:text-white">
                                Cancel
                            </button>
                            <button wire:click="store"
                                class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-blue-600/30 transition-all cursor-pointer hover:bg-blue-700 active:scale-95">
                                Save Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
