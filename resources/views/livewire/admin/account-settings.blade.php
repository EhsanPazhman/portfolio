<div>
    @if ($isModalOpen)
        <div
            class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-200 p-6 animate-in fade-in duration-300">
            <div
                class="bg-[#111827] border border-gray-800 w-full max-w-2xl rounded-[3rem] shadow-3xl overflow-y-auto max-h-[90vh] animate-in zoom-in duration-300">

                <!-- Header -->
                <div
                    class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20 sticky top-0 z-10 backdrop-blur-md">
                    <h3 class="text-lg font-black text-white uppercase tracking-widest">My Account Settings</h3>
                    <button wire:click="$set('isModalOpen', false)"
                        class="text-gray-500 hover:text-white text-2xl cursor-pointer">&times;</button>
                </div>

                <div class="p-10 space-y-6">

                    <!-- Basic Info Section -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Full
                                Name</label>
                            <input type="text" wire:model="name"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('name')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Email
                                Address</label>
                            <input type="email" wire:model="email"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('email')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">New Password
                            (Leave blank to keep current)</label>
                        <input type="password" wire:model="password"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('password')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profile Details Section -->
                    <div class="pt-6 border-t border-gray-800 space-y-6">
                        <h4 class="text-xs font-black text-blue-500 uppercase tracking-[0.2em]">Profile Details</h4>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Job
                                Title</label>
                            <input type="text" wire:model="job_title"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('job_title')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Bio</label>
                            <input type="text" wire:model="bio"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('bio')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Experience
                                Summary</label>
                            <textarea wire:model="experience_summary" rows="3"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all"></textarea>
                        </div>

                        <!-- Avatar Section -->
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Profile
                                Picture</label>
                            <div class="flex items-center gap-6">
                                <div class="relative group">
                                    @if ($avatar)
                                        <img src="{{ $avatar->temporaryUrl() }}"
                                            class="w-24 h-24 rounded-4xl object-cover border-2 border-blue-600 shadow-xl shadow-blue-600/20">
                                    @elseif($old_avatar)
                                        <img src="{{ asset('storage/' . $old_avatar) }}"
                                            class="w-24 h-24 rounded-4xl object-cover border-2 border-gray-800 group-hover:border-blue-500 transition-all">
                                    @else
                                        <div
                                            class="w-24 h-24 rounded-4xl bg-gray-800 flex items-center justify-center text-gray-500 border-2 border-dashed border-gray-700">
                                            No Image</div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <input type="file" wire:model="avatar"
                                        class="block w-full text-[10px] text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-600/20 cursor-pointer">
                                    <p class="text-[9px] text-gray-600 mt-2 uppercase tracking-widest">Recommended:
                                        Square image, max 1MB</p>
                                </div>
                            </div>
                            @error('avatar')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="flex gap-4 pt-8">
                        <button type="button" wire:click="$set('isModalOpen', false)"
                            class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest hover:text-white hover:bg-gray-800/30 transition-all cursor-pointer">Cancel</button>
                        <button type="button" wire:click="save" wire:loading.attr="disabled"
                            class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-blue-600/40 hover:bg-blue-700 transition-all cursor-pointer disabled:opacity-50">
                            <span wire:loading.remove wire:target="save">Update Profile</span>
                            <span wire:loading wire:target="save">Applying Changes...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
