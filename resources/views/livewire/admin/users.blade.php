<div>
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">System Users</h2>
        <button wire:click="openModal"
            class="bg-white text-black px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-gray-200 transition-all cursor-pointer active:scale-95">
            Add User
        </button>
    </div>

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
            <tbody class="divide-y divide-gray-800/50">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-800/10 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-white uppercase">{{ $user->name }}</span>
                                <span class="text-[10px] text-gray-500 font-mono">{{ $user->email }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span
                                class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $user->role === 'admin' ? 'bg-blue-600/20 text-blue-500 border border-blue-600/30' : 'bg-gray-800 text-gray-400' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-xs text-gray-600 font-mono">{{ $user->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button wire:click="edit({{ $user->id }})"
                                class="text-[10px] font-black text-gray-400 hover:text-white uppercase tracking-widest mr-4 cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $user->id }})" wire:confirm="Remove this user?"
                                class="text-[10px] font-black text-red-500/50 hover:text-red-500 uppercase tracking-widest cursor-pointer">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($isModalOpen)
        <div class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-150 p-6">
            <div
                class="bg-[#111827] border border-gray-800 w-full max-w-xl rounded-[3rem] shadow-3xl overflow-hidden animate-in zoom-in duration-300">
                <div class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20">
                    <h3 class="text-lg font-black text-white uppercase tracking-widest">{{ $user_id ? 'Edit' : 'New' }}
                        User</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-white text-2xl cursor-pointer">&times;</button>
                </div>

                <div class="p-10 space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Full
                            Name</label>
                        <input type="text" wire:model.live="name"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('name')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Email
                            Address</label>
                        <input type="email" wire:model.live="email"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('email')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Access
                            Role</label>
                        <select wire:model="role"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all appearance-none">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest ml-1">Password
                            {{ $user_id ? '(Leave blank to keep current)' : '' }}</label>
                        <input type="password" wire:model.blur="password"
                            class="w-full bg-gray-900/50 border-2 border-gray-800 rounded-2xl px-6 py-4 text-white focus:border-blue-600 outline-none transition-all">
                        @error('password')
                            <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4 pt-6">
                        <button wire:click="closeModal"
                            class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest hover:text-white transition-all cursor-pointer">Cancel</button>
                        <button wire:click="store" wire:loading.attr="disabled"
                            class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-blue-600/30 hover:bg-blue-700 transition-all cursor-pointer disabled:opacity-50">
                            <span wire:loading.remove wire:target="store">Save User</span>
                            <span wire:loading wire:target="store">Processing...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
