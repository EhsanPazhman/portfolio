<div class="w-full py-16 px-6">
    <div class="max-w-4xl mx-auto">
        <!-- Section Header -->
        <div class="flex flex-col items-center mb-16">
            <span class="text-blue-500 font-black text-xs uppercase tracking-[0.4em] mb-3">Get In Touch</span>
            <h2
                class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors duration-500">
                Let's Build Something
            </h2>
        </div>

        <!-- Contact Form -->
        <form wire:submit.prevent="sendMessage"
            class="bg-white/50 dark:bg-slate-900/50 glass p-8 md:p-12 rounded-[2.5rem] shadow-2xl border border-white/20 dark:border-slate-800 relative overflow-hidden transition-colors duration-500">

            <!-- Decorative Ambient Glow -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-600/10 rounded-full blur-3xl -z-10"></div>

            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Name Field -->
                <div class="space-y-2">
                    <label
                        class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Full
                        Name</label>
                    <input type="text" wire:model.blur="name"
                        class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-slate-900 dark:text-white placeholder-slate-400"
                        placeholder="Ehsan Pazhman" />
                    @error('name')
                        <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label
                        class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Email
                        Address</label>
                    <input type="email" wire:model.blur="email"
                        class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-slate-900 dark:text-white placeholder-slate-400"
                        placeholder="ehsan@example.com" />
                    @error('email')
                        <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Subject Field -->
            <div class="mb-8 space-y-2">
                <label
                    class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Subject</label>
                <input type="text" wire:model.blur="subject"
                    class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-slate-900 dark:text-white"
                    placeholder="Project Inquiry" />
                @error('subject')
                    <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic">{{ $message }}</span>
                @enderror
            </div>

            <!-- Message Field -->
            <div class="mb-10 space-y-2">
                <label
                    class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Message</label>
                <textarea wire:model.blur="message"
                    class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-slate-900 dark:text-white h-44 resize-none"
                    placeholder="Tell me about your project..."></textarea>
                @error('message')
                    <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" wire:loading.attr="disabled"
                class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-black uppercase tracking-[0.2em] text-xs py-5 rounded-2xl transition-all shadow-xl shadow-blue-600/20 active:scale-[0.98] flex justify-center items-center gap-3">

                <span wire:loading.remove class="flex items-center gap-2">
                    Send Message
                    <svg xmlns="www.w3.org" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>

                <span wire:loading class="flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-white" xmlns="www.w3.org" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Processing...
                </span>
            </button>
        </form>
    </div>
</div>
