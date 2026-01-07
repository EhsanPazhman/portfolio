<!--
    Admin Account Settings View
    Standard: Livewire v3 Form Objects (2026 Optimization)
-->
<div>
    @if ($isModalOpen)
        <div
            class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-200 p-6 animate-in fade-in duration-300">
            <div
                class="bg-[#111827] border border-gray-800 w-full max-w-2xl rounded-[3rem] shadow-3xl overflow-y-auto max-h-[90vh] animate-in zoom-in duration-300">

                <!-- Header Section -->
                <div
                    class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20 sticky top-0 z-10 backdrop-blur-md">
                    <h3 class="text-lg font-black text-white uppercase tracking-widest">Account Orchestration</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-white text-2xl cursor-pointer p-2">&times;</button>
                </div>

                <div class="p-10 space-y-6">

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Full
                                Identity</label>
                            <input type="text" wire:model="form.name"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all placeholder:text-gray-800"
                                placeholder="Your Name">
                            @error('form.name')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-tight">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Email
                                Protocol</label>
                            <input type="email" wire:model="form.email"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all placeholder:text-gray-800"
                                placeholder="admin@domain.com">
                            @error('form.email')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-tight">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Security Section -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Access Key
                            (Leave empty to keep current)</label>
                        <input type="password" wire:model="form.password"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('form.password')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-tight">{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Profile Details Sub-section -->
                    <div class="pt-6 border-t border-gray-800 space-y-6">
                        <h4 class="text-xs font-black text-blue-500 uppercase tracking-[0.2em]">Public Profile Meta</h4>

                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Professional
                                Title</label>
                            <input type="text" wire:model="form.job_title"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all"
                                placeholder="e.g. Senior Systems Architect">
                            @error('form.job_title')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-tight">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Short
                                Bio</label>
                            <input type="text" wire:model="form.bio"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('form.bio')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-tight">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Experience
                                Narrative</label>
                            <textarea wire:model="form.experience_summary" rows="3"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all h-24 resize-none"></textarea>
                        </div>


                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Visual
                                Identity Asset</label>
                            <div
                                class="flex items-center gap-6 p-4 bg-gray-900/30 rounded-3xl border border-gray-800/50">
                                <div class="relative group">
                                    {{-- Secure Preview Logic for 2026 --}}
                                    @if ($form->avatar && $form->avatar instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                                        <img src="{{ $form->avatar->temporaryUrl() }}"
                                            class="w-24 h-24 rounded-4xl object-cover border-2 border-blue-600 shadow-xl shadow-blue-600/20">
                                    @elseif($form->old_avatar)
                                        <img src="{{ asset('storage/' . $form->old_avatar) }}"
                                            class="w-24 h-24 rounded-4xl object-cover border-2 border-gray-800 group-hover:border-blue-500 transition-all">
                                    @else
                                        <div
                                            class="w-24 h-24 rounded-4xl bg-gray-800 flex items-center justify-center text-gray-600 border-2 border-dashed border-gray-700 text-[10px] font-black uppercase">
                                            Null Asset</div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <input type="file" wire:model="form.avatar"
                                        class="block w-full text-[10px] text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer transition-colors">
                                    <p class="text-[9px] text-gray-600 mt-2 uppercase tracking-widest">Protocol: Square
                                        JPG/PNG, Max 1024KB</p>
                                </div>
                            </div>
                            @error('form.avatar')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-tight">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Interaction Footer -->
                    <div class="flex gap-4 pt-8 border-t border-gray-800/50 mt-4">
                        <button type="button" wire:click="closeModal"
                            class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest hover:text-white hover:bg-gray-800 transition-all cursor-pointer">Cancel
                            Action</button>
                        <button type="button" wire:click="save" wire:loading.attr="disabled"
                            class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-blue-600/40 hover:bg-blue-700 transition-all cursor-pointer disabled:opacity-50 disabled:cursor-wait">
                            <span wire:loading.remove wire:target="save">Commit Changes</span>
                            <span wire:loading wire:target="save">Synchronizing...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
