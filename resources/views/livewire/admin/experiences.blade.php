<div>
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Experiences</h2>
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20 cursor-pointer active:scale-95">
            Add Experience
        </button>
    </div>

    <div class="bg-[#111827] border border-gray-800 rounded-4xl overflow-hidden shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr
                    class="bg-gray-900/40 border-b border-gray-800 text-[10px] uppercase text-gray-500 font-black tracking-[0.2em]">
                    <th class="px-8 py-6">Role & Company</th>
                    <th class="px-8 py-6">Period</th>
                    <th class="px-8 py-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800/50">
                @foreach ($experiences as $exp)
                    <tr class="hover:bg-gray-800/10 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-white uppercase">{{ $exp->title }}</span>
                                <span
                                    class="text-[10px] text-blue-500 font-bold uppercase tracking-tighter">{{ $exp->company }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-xs text-gray-500 font-mono italic">
                            {{ $exp->start_date }} - {{ $exp->end_date ?? 'Present' }}
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button wire:click="edit({{ $exp->id }})"
                                class="text-[10px] font-black text-gray-400 hover:text-white uppercase tracking-widest mr-4 cursor-pointer transition-colors">Edit</button>
                            <button wire:click="delete({{ $exp->id }})" wire:confirm="Delete this experience?"
                                class="text-[10px] font-black text-red-500/50 hover:text-red-500 uppercase tracking-widest cursor-pointer transition-colors">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($isModalOpen)
        <div class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-110 p-6">
            <div
                class="bg-[#111827] border border-gray-800 w-full max-w-2xl rounded-[2.5rem] shadow-3xl overflow-hidden animate-in zoom-in duration-300">
                <div class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20">
                    <h3 class="text-lg font-black text-white uppercase tracking-widest">
                        {{ $experience_id ? 'Edit' : 'New' }} Experience</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-white text-2xl cursor-pointer p-2 outline-none">&times;</button>
                </div>

                <div class="p-10 grid grid-cols-2 gap-6 text-white">
                    <div class="space-y-2 text-left">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Job
                            Title</label>
                        <input type="text" wire:model.live="title"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('title')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2 text-left">
                        <label
                            class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Company</label>
                        <input type="text" wire:model.live="company"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('company')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2 text-left">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Start
                            Date</label>
                        <input type="date" wire:model.live="start_date"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                    </div>

                    <div class="space-y-2 text-left">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">End Date
                            (Optional)</label>
                        <input type="date" wire:model.live="end_date"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                    </div>

                    <div class="col-span-2 space-y-2 text-left">
                        <label
                            class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Description</label>
                        <textarea wire:model.live="description"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all h-24 resize-none"></textarea>
                    </div>

                    <div class="col-span-2 flex gap-4 pt-4">
                        <button wire:click="closeModal"
                            class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest transition-all cursor-pointer hover:bg-gray-800 hover:text-white">Cancel</button>
                        <button wire:click="store" wire:loading.attr="disabled"
                            class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-blue-600/30 transition-all cursor-pointer hover:bg-blue-700 active:scale-95 disabled:opacity-50">
                            <span wire:loading.remove wire:target="store">Save Experience</span>
                            <span wire:loading wire:target="store">Saving...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>