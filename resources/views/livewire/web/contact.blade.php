<div class="w-full py-16">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col items-center mb-12">
            <h2 class="text-blue-500 font-black text-xs uppercase tracking-[0.4em] mb-2">Get In Touch</h2>
            <h1 class="text-4xl font-black text-gray-900 dark:text-white tracking-tighter text-center">Let's Build
                Something</h1>
        </div>

        <form wire:submit.prevent="sendMessage"
            class="glass p-8 md:p-12 rounded-4xl shadow-2xl border-white/5 relative overflow-hidden">

            <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-600/10 rounded-full blur-3xl"></div>

            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-2 ml-2">Your
                        Name</label>
                    <input type="text" wire:model.live="name"
                        class="w-full bg-gray-100 dark:bg-white/5 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-gray-900 dark:text-white" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-2 ml-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-2 ml-2">Email
                        Address</label>
                    <input type="email" wire:model.live="email"
                        class="w-full bg-gray-100 dark:bg-white/5 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-gray-900 dark:text-white" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-2 ml-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label
                    class="block text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-2 ml-2">Subject</label>
                <input type="text" wire:model.live="subject"
                    class="w-full bg-gray-100 dark:bg-white/5 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-gray-900 dark:text-white" />
                @error('subject')
                    <p class="text-red-500 text-xs mt-2 ml-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    class="block text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-2 ml-2">Message</label>
                <textarea wire:model.live="message"
                    class="w-full bg-gray-100 dark:bg-white/5 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-gray-900 dark:text-white h-40"></textarea>
                @error('message')
                    <p class="text-red-500 text-xs mt-2 ml-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black uppercase tracking-[0.2em] text-xs py-5 rounded-2xl transition-all shadow-xl shadow-blue-600/20 active:scale-[0.98]">
                <span wire:loading.remove>Send Message</span>
                <span wire:loading>Processing...</span>
            </button>
        </form>
    </div>
</div>
