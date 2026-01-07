<!-- 
    Public Contact Form Section
    Optimized for Livewire v3 (2026) 
    Features: Glassmorphism UI, Standard Validation feedback, and Scroll-Reveal support.
-->
<section class="w-full py-24 px-6 relative overflow-hidden">
    <div class="max-w-4xl mx-auto">
        
        
        <div class="flex flex-col items-center mb-16">
            <span class="text-blue-500 font-black text-[10px] uppercase tracking-[0.5em] mb-4">Get In Touch</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors duration-500">
                Let's Build Something
            </h2>
        </div>

        <!-- Contact Form Card -->
        <form wire:submit.prevent="sendMessage"
            class="bg-white/40 dark:bg-slate-900/40 glass p-8 md:p-14 rounded-[3rem] shadow-2xl border border-white/20 dark:border-slate-800/50 relative z-10">

            <!-- Dynamic Ambient Glow Decoration -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-600/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-600/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

            <!-- Input Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Full Name Field -->
                <div class="space-y-3">
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Full Identity</label>
                    <input type="text" wire:model.blur="name"
                        class="w-full bg-slate-100/80 dark:bg-slate-800/80 border-2 border-transparent rounded-2xl p-4 focus:ring-0 focus:border-blue-500 transition-all text-slate-900 dark:text-white placeholder-slate-400 outline-none"
                        placeholder="e.g. Ehsan Pazhman" />
                    @error('name')
                        <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic uppercase tracking-tighter">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="space-y-3">
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Digital Address</label>
                    <input type="email" wire:model.blur="email"
                        class="w-full bg-slate-100/80 dark:bg-slate-800/80 border-2 border-transparent rounded-2xl p-4 focus:ring-0 focus:border-blue-500 transition-all text-slate-900 dark:text-white placeholder-slate-400 outline-none"
                        placeholder="name@provider.com" />
                    @error('email')
                        <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic uppercase tracking-tighter">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Subject Selection -->
            <div class="mb-8 space-y-3">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Inquiry Subject</label>
                <input type="text" wire:model.blur="subject"
                    class="w-full bg-slate-100/80 dark:bg-slate-800/80 border-2 border-transparent rounded-2xl p-4 focus:ring-0 focus:border-blue-500 transition-all text-slate-900 dark:text-white outline-none"
                    placeholder="Briefly describe your purpose" />
                @error('subject')
                    <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic uppercase tracking-tighter">{{ $message }}</span>
                @enderror
            </div>

            <!-- Message Content -->
            <div class="mb-10 space-y-3">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-2">Detailed Narrative</label>
                <textarea wire:model.blur="message"
                    class="w-full bg-slate-100/80 dark:bg-slate-800/80 border-2 border-transparent rounded-2xl p-4 focus:ring-0 focus:border-blue-500 transition-all text-slate-900 dark:text-white h-48 resize-none outline-none"
                    placeholder="Tell me about your project or vision..."></textarea>
                @error('message')
                    <span class="text-red-500 text-[10px] font-bold mt-1 ml-2 block italic uppercase tracking-tighter">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Orchestration -->
            <button type="submit" wire:loading.attr="disabled"
                class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-black uppercase tracking-[0.3em] text-[10px] py-6 rounded-2xl transition-all shadow-2xl shadow-blue-600/30 active:scale-[0.97] flex justify-center items-center gap-3 group">

                <span wire:loading.remove class="flex items-center gap-3">
                    Transmit Message
                    <svg xmlns="www.w3.org" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>

                <span wire:loading class="flex items-center gap-3">
                    <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Synchronizing...
                </span>
            </button>
        </form>
    </div>
</section>
