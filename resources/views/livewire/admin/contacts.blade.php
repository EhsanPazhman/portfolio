<div>
    <div class="mb-10">
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Inbox</h2>
        <p class="text-[10px] text-gray-500 uppercase tracking-[0.2em] mt-1">Manage incoming inquiries</p>
    </div>

    <div class="bg-[#111827] border border-gray-800 rounded-[2.5rem] overflow-hidden shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-900/40 border-b border-gray-800 text-[10px] uppercase text-gray-500 font-black tracking-[0.2em]">
                    <th class="px-8 py-6">Sender</th>
                    <th class="px-8 py-6">Subject</th>
                    <th class="px-8 py-6">Received</th>
                    <th class="px-8 py-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800/50">
                @forelse($messages as $msg)
                <tr class="hover:bg-gray-800/10 transition-all group cursor-pointer" wire:click="viewMessage({{ $msg->id }})">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-600/10 flex items-center justify-center text-blue-500 font-black text-xs border border-blue-600/20">
                                {{ substr($msg->name, 0, 1) }}
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-white uppercase tracking-tight">{{ $msg->name }}</span>
                                <span class="text-[10px] text-gray-600 font-mono italic">{{ $msg->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-xs text-gray-400 font-medium truncate max-w-[200px] block italic">{{ $msg->subject ?? 'No Subject' }}</span>
                    </td>
                    <td class="px-8 py-6 text-[10px] text-gray-600 font-black uppercase tracking-tighter">
                        {{ $msg->created_at->diffForHumans() }}
                    </td>
                    <td class="px-8 py-6 text-right">
                        <button wire:click.stop="delete({{ $msg->id }})" wire:confirm="Permanently delete this message?" class="text-[10px] font-black text-red-500/30 hover:text-red-500 uppercase tracking-widest transition-colors outline-none cursor-pointer">Remove</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-20 text-center text-xs text-gray-600 font-black uppercase tracking-[0.5em]">No Messages Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- VIEW MESSAGE MODAL -->
    @if($isModalOpen && $selected_contact)
    <div class="fixed inset-0 bg-black/95 backdrop-blur-xl flex items-center justify-center z-200 p-6">
        <div class="bg-[#111827] border border-gray-800 w-full max-w-2xl rounded-[2.5rem] shadow-3xl overflow-hidden animate-in zoom-in duration-300">
            <div class="p-8 border-b border-gray-800 flex justify-between items-center bg-gray-900/20">
                <div class="flex flex-col">
                    <h3 class="text-sm font-black text-white uppercase tracking-widest">{{ $selected_contact->subject ?: 'Message View' }}</h3>
                    <p class="text-[10px] text-blue-500 font-bold tracking-tighter mt-1">FROM: {{ $selected_contact->email }}</p>
                </div>
                <button wire:click="closeModal" class="text-gray-500 hover:text-white text-2xl cursor-pointer p-2 outline-none">&times;</button>
            </div>

            <div class="p-10 space-y-8">
                <div class="space-y-4">
                    <div class="flex justify-between items-center text-[10px] font-black text-gray-600 uppercase tracking-widest border-b border-gray-800/50 pb-2">
                        <span>Message Content</span>
                        <span class="font-mono">{{ $selected_contact->created_at->format('Y-m-d H:i') }}</span>
                    </div>
                    <div class="text-gray-300 text-sm leading-loose bg-gray-900/40 p-6 rounded-2xl border border-gray-800/50 font-medium italic">
                        "{{ $selected_contact->message }}"
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button wire:click="closeModal" class="flex-1 px-8 py-5 rounded-2xl border-2 border-gray-800 text-gray-500 font-black text-[10px] uppercase tracking-widest hover:text-white transition-all cursor-pointer outline-none">Close Inbox</button>
                    <a href="mailto:{{ $selected_contact->email }}" class="flex-1 px-8 py-5 rounded-2xl bg-blue-600 text-white font-black text-[10px] text-center uppercase tracking-widest shadow-2xl shadow-blue-600/30 hover:bg-blue-700 transition-all cursor-pointer">Reply via Email</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
