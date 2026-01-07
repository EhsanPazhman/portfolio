<div class="space-y-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- SKILLS SECTION -->
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-black text-white uppercase tracking-tighter border-l-4 border-blue-600 pl-4">
                    Skills</h3>
                <button wire:click="openModalWithType('skill')"
                    class="text-[10px] font-black text-blue-500 hover:text-white uppercase tracking-widest transition-all cursor-pointer">
                    + Add Skill
                </button>
            </div>

            <div class="bg-[#111827] border border-gray-800 rounded-3xl overflow-hidden shadow-xl">
                <table class="w-full text-left">
                    <tbody class="divide-y divide-gray-800/50">
                        @forelse ($this->skills as $skill)
                            <tr class="hover:bg-gray-800/10 transition-all group">
                                <td class="px-6 py-4 text-sm font-bold text-gray-200 uppercase">{{ $skill->name }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="px-3 py-1 bg-blue-600/10 text-blue-500 text-[9px] rounded-full border border-blue-600/20 font-black uppercase tracking-widest">
                                        {{ $skill->level }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button wire:click="openModalWithType('skill', {{ $skill->id }})"
                                        class="text-gray-500 hover:text-white transition-colors cursor-pointer">✎</button>
                                    <button wire:click="delete('skill', {{ $skill->id }})" wire:confirm="Remove?"
                                        class="text-gray-700 hover:text-red-500 transition-colors cursor-pointer">×</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"
                                    class="p-10 text-center text-gray-600 text-[10px] font-black uppercase">No skills
                                    found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TECH STACK SECTION -->
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-black text-white uppercase tracking-tighter border-l-4 border-emerald-600 pl-4">
                    Tech Stack</h3>
                <button wire:click="openModalWithType('tech')"
                    class="text-[10px] font-black text-emerald-500 hover:text-white uppercase tracking-widest transition-all cursor-pointer">
                    + Add Tech
                </button>
            </div>

            <div class="bg-[#111827] border border-gray-800 p-8 rounded-3xl shadow-xl flex flex-wrap gap-4">
                @forelse ($this->technologies as $tech)
                    <div
                        class="group flex items-center gap-3 bg-gray-900/50 border border-gray-800 px-5 py-3 rounded-2xl hover:border-emerald-500/50 transition-all">
                        <span
                            class="text-xs font-bold text-gray-300 uppercase tracking-widest">{{ $tech->name }}</span>
                        <button wire:click="delete('tech', {{ $tech->id }})" wire:confirm="Remove?"
                            class="text-gray-700 group-hover:text-red-500 transition-colors cursor-pointer text-lg">&times;</button>
                    </div>
                @empty
                    <div class="w-full text-center py-4 text-gray-600 text-[10px] font-black uppercase">No technologies.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- MODAL -->
    @if ($isModalOpen)
        <div class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-150 p-6">
            <div
                class="bg-[#111827] border border-gray-800 w-full max-w-md rounded-[2.5rem] shadow-3xl overflow-hidden animate-in zoom-in duration-300">
                <div class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20">
                    <h3 class="text-lg font-black text-white uppercase tracking-widest">
                        {{ $form->itemId ? 'Edit' : 'Add' }} {{ ucfirst($form->type) }}</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-white text-2xl cursor-pointer">&times;</button>
                </div>

                <div class="p-10 space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Name</label>
                        <input type="text" wire:model="form.name"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('form.name')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($form->type === 'skill')
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Proficiency
                                Level</label>
                            <select wire:model="form.level"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none appearance-none cursor-pointer">
                                <option value="">Select Level</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                            @error('form.level')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <div class="flex gap-4 pt-6">
                        <button wire:click="closeModal"
                            class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest hover:text-white transition-all cursor-pointer">Cancel</button>
                        <button wire:click="save" wire:loading.attr="disabled"
                            class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl hover:bg-blue-700 transition-all cursor-pointer disabled:opacity-50">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
