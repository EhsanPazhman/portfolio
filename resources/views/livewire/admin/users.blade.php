<div class="p-6">
    <!-- Header Section: Title and Add User Action -->
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">System Users</h2>
        <button wire:click="openModal"
            class="bg-white text-black px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-gray-200 transition-all cursor-pointer active:scale-95">
            Add User
        </button>
    </div>

    <!-- Users Table: Main Data Display -->
    <div class="bg-[#111827] border border-gray-800 rounded-[2.5rem] overflow-hidden shadow-2xl">
        <table class="w-full text-left">
            <thead>
                <tr
                    class="bg-gray-900/50 border-b border-gray-800 text-[10px] uppercase text-gray-500 font-black tracking-[0.2em]">
                    <th class="px-8 py-6">Identity</th>
                    <th class="px-8 py-6">Role</th>
                    <th class="px-8 py-6">Joined At</th>
                    <th class="px-8 py-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800/50 text-white">
                @forelse ($this->users as $user)
                    <tr class="hover:bg-gray-800/10 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold uppercase">{{ $user->name }}</span>
                                <span class="text-[10px] text-gray-500 font-mono">{{ $user->email }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span
                                class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $user->role === 'admin' ? 'bg-blue-600/20 text-blue-500 border border-blue-600/30' : 'bg-gray-800 text-gray-400' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-xs text-gray-600 font-mono">
                            {{ $user->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button wire:click="edit({{ $user->id }})"
                                class="text-[10px] font-black text-gray-400 hover:text-white uppercase tracking-widest mr-4 cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $user->id }})" wire:confirm="Remove this user?"
                                class="text-[10px] font-black text-red-500/50 hover:text-red-500 uppercase tracking-widest cursor-pointer">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-10 text-center text-gray-500 uppercase text-xs font-black">No users
                            found in database.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Upsert Modal: Create and Edit Form -->
    @if ($isModalOpen)
        <div class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-150 p-6">
            <div
                class="bg-[#111827] border border-gray-800 w-full max-w-2xl rounded-[3rem] shadow-3xl overflow-y-auto max-h-[90vh] animate-in zoom-in duration-300">

                <!-- Modal Header -->
                <div
                    class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20 sticky top-0 z-10 backdrop-blur-md">
                    <h3 class="text-lg font-black text-white uppercase tracking-widest">
                        {{ $form->userId ? 'Edit' : 'New' }} User</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-white text-2xl cursor-pointer">&times;</button>
                </div>

                <div class="p-10 space-y-6">
                    <!-- Base Information: Shared Fields -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Full
                                Name</label>
                            <input type="text" wire:model="form.name"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('form.name')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Email
                                Address</label>
                            <input type="email" wire:model="form.email"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('form.email')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Access
                                Role</label>
                            <select wire:model.live="form.role"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all appearance-none">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Password</label>
                            <input type="password" wire:model="form.password"
                                class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                            @error('form.password')
                                <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Profile Details: Conditional Section for Admin Role -->
                    @if ($form->role === 'admin')
                        <div class="pt-6 border-t border-gray-800 space-y-6 animate-in slide-in-from-top duration-500">
                            <h4 class="text-xs font-black text-blue-500 uppercase tracking-[0.2em]">Profile Details</h4>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Job
                                        Title</label>
                                    <input type="text" wire:model="form.job_title"
                                        placeholder="e.g. Senior Developer"
                                        class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none">
                                    @error('form.job_title')
                                        <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Status</label>
                                    <select wire:model="form.status"
                                        class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Bio
                                    (Short Description)</label>
                                <input type="text" wire:model="form.bio"
                                    class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none">
                                @error('form.bio')
                                    <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Experience
                                    Summary</label>
                                <textarea wire:model="form.experience_summary" rows="3"
                                    class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none"></textarea>
                            </div>

                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Avatar
                                    Image</label>
                                <input type="file" wire:model="form.avatar"
                                    class="text-xs text-gray-400 file:bg-gray-800 file:border-none file:px-4 file:py-2 file:rounded-xl file:text-white file:mr-4">

                                <div class="mt-4">
                                    @if ($form->avatar)
                                        <img src="{{ $form->avatar->temporaryUrl() }}"
                                            class="w-24 h-24 rounded-2xl object-cover ring-4 ring-blue-600/20">
                                    @elseif($form->old_avatar)
                                        <img src="{{ asset('storage/' . $form->old_avatar) }}"
                                            class="w-24 h-24 rounded-2xl object-cover border-2 border-gray-800">
                                    @endif
                                </div>
                                @error('form.avatar')
                                    <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <!-- Modal Actions: Submit and Cancel -->
                    <div class="flex gap-4 pt-6">
                        <button wire:click="closeModal" type="button"
                            class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest hover:text-white transition-all cursor-pointer">Cancel</button>
                        <button wire:click="store" wire:loading.attr="disabled"
                            class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-blue-600/30 hover:bg-blue-700 transition-all cursor-pointer disabled:opacity-50">
                            <span wire:loading.remove>Save User & Profile</span>
                            <span wire:loading>Processing...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
