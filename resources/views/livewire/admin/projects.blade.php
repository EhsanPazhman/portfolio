<div class="p-6">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Projects</h2>
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20 cursor-pointer active:scale-95">
            Create Project
        </button>
    </div>

    <!-- Data Table Section -->
    <div class="bg-[#111827] border border-gray-800 rounded-[2.5rem] overflow-hidden shadow-2xl">
        <table class="w-full text-left">
            <thead>
                <tr
                    class="bg-gray-900/40 border-b border-gray-800 text-[10px] uppercase text-gray-500 font-black tracking-[0.2em]">
                    <th class="px-8 py-6">Identity</th>
                    <th class="px-8 py-6">Resource</th>
                    <th class="px-8 py-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800/50">
                @forelse ($this->projects as $project)
                    <tr class="hover:bg-gray-800/10 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}"
                                        class="w-12 h-12 rounded-xl object-cover border border-gray-700 shadow-sm">
                                @else
                                    <div
                                        class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center text-[10px] text-gray-600 font-bold uppercase">
                                        N/A</div>
                                @endif
                                <div class="flex flex-col">
                                    <span
                                        class="text-sm font-bold text-white uppercase tracking-tight">{{ $project->title }}</span>
                                    <span class="text-[10px] text-gray-500 mt-1 font-mono uppercase tracking-widest">ID:
                                        #{{ $project->id }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex gap-3">
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                        class="text-[10px] bg-gray-800 px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition-all font-bold tracking-widest uppercase">GITHUB</a>
                                @endif
                                @if ($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                                        class="text-[10px] bg-blue-600/10 px-3 py-1.5 rounded-lg text-blue-500 hover:bg-blue-600 hover:text-white transition-all font-bold tracking-widest uppercase">LIVE</a>
                                @endif
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button wire:click="edit({{ $project->id }})"
                                class="text-[10px] font-black text-gray-400 hover:text-white uppercase tracking-widest mr-4 cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $project->id }})" wire:confirm="Remove this project?"
                                class="text-[10px] font-black text-red-500/50 hover:text-red-500 uppercase tracking-widest cursor-pointer">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-10 text-center text-gray-600 text-[10px] font-black uppercase">No
                            records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Upsert Modal -->
    @if ($isModalOpen)
        <div class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-110 p-6">
            <div
                class="bg-[#111827] border border-gray-800 w-full max-w-2xl rounded-[2.5rem] shadow-3xl overflow-hidden animate-in zoom-in duration-300">

                <!-- Modal Header -->
                <div class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20">
                    <h3 class="text-lg font-black text-white uppercase tracking-widest">
                        {{ $form->projectId ? 'Update' : 'Create' }} Project</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-white text-2xl p-2 outline-none cursor-pointer">&times;</button>
                </div>

                <div class="p-10 grid grid-cols-2 gap-6 max-h-[70vh] overflow-y-auto">
                    <!-- Title Input -->
                    <div class="col-span-2 space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Project
                            Title</label>
                        <input type="text" wire:model="form.title"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('form.title')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- External Links -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">GitHub
                            URL</label>
                        <input type="text" wire:model="form.github_url"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all placeholder:text-gray-800"
                            placeholder="github.com...">
                        @error('form.github_url')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Demo
                            URL</label>
                        <input type="text" wire:model="form.demo_url"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all placeholder:text-gray-800"
                            placeholder="demo.com...">
                        @error('form.demo_url')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Asset Management & Secure Preview -->
                    <div class="col-span-2 space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Image
                            Asset</label>
                        <input type="file" wire:model="form.image"
                            class="w-full text-xs text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer">

                        <div wire:loading wire:target="form.image"
                            class="text-blue-500 text-[10px] font-bold mt-2 tracking-widest uppercase">Uploading
                            asset...</div>

                        <!-- Secure Preview Logic: Resolves metadata retrieval errors -->
                        <div class="mt-4">
                            @if ($form->image && !is_string($form->image) && method_exists($form->image, 'temporaryUrl'))
                                {{-- ارور Metadata معمولا به خاطر تلاش برای خواندن سایز فایلی است که ناقص آپلود شده --}}
                                <div wire:key="preview-{{ $form->image->getClientOriginalName() }}">
                                    <img src="{{ $form->image->temporaryUrl() }}"
                                        class="w-24 h-24 rounded-2xl object-cover ring-4 ring-blue-600/10 transition-opacity duration-500">
                                </div>
                            @elseif($form->old_image)
                                <img src="{{ asset('storage/' . $form->old_image) }}"
                                    class="w-24 h-24 rounded-2xl object-cover border-2 border-gray-800 shadow-lg">
                            @endif
                        </div>

                        @error('form.image')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Section -->
                    <div class="col-span-2 space-y-2">
                        <label
                            class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Description</label>
                        <textarea wire:model="form.description"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all h-24 resize-none"></textarea>
                        @error('form.description')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Footer Actions -->
                    <div class="col-span-2 flex gap-4 pt-6 border-t border-gray-800/50 mt-4">
                        <button wire:click="closeModal" type="button"
                            class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest transition-all hover:bg-gray-800 hover:text-white cursor-pointer">Cancel</button>
                        <button wire:click="save" wire:loading.attr="disabled" wire:target="form.image, save"
                            class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-blue-600/30 transition-all hover:bg-blue-700 active:scale-95 disabled:opacity-50 disabled:cursor-wait cursor-pointer">
                            <span wire:loading.remove wire:target="save">Save Project</span>
                            <span wire:loading wire:target="save">Saving Project...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
