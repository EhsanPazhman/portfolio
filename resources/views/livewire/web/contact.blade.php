<!--
    Elevated & Compact Public Contact Form Section (2026 Design)
    Features: Gradient Button, Enhanced Visuals, and Optimal Spacing.
-->
<section id="contact" class="w-full py-16 px-6 relative overflow-hidden">
    <div class="max-w-5xl mx-auto">

        <!-- Section Header -->
        <div class="flex flex-col items-center mb-12">
            <div class="flex items-center gap-3 mb-3">
                <span class="text-blue-500 font-black text-[9px] uppercase tracking-[0.4em]">Get In Touch</span>
                <i class="fa-regular fa-envelope text-blue-500 text-sm"></i>
            </div>
            <h2
                class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tighter text-center transition-colors duration-500">
                Let's Build Something
            </h2>
        </div>

        <!-- Contact Form Card -->
        <form wire:submit.prevent="sendMessage"
            class="bg-white/40 dark:bg-slate-900/40 backdrop-blur-xl p-8 md:p-10 rounded-4xl shadow-2xl border-t-2 border-r-2 border-blue-500/10 dark:border-blue-500/10 relative z-10">

            <!-- Dynamic Ambient Glow Decoration -->
            <div
                class="absolute -top-12 -right-12 w-48 h-48 bg-blue-600/10 rounded-full blur-[80px] -z-10 pointer-events-none">
            </div>
            <div
                class="absolute -bottom-12 -left-12 w-48 h-48 bg-indigo-600/10 rounded-full blur-[80px] -z-10 pointer-events-none">
            </div>

            <!-- Input Grid - Optimized compact layout -->
            <div class="grid md:grid-cols-3 gap-6 mb-6">
                <!-- Full Name Field -->
                <div class="space-y-2">
                    <label
                        class="block text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-1">Full
                        Identity</label>
                    <input type="text" wire:model.blur="name"
                        class="w-full bg-slate-100 dark:bg-slate-800 border-2 border-transparent rounded-xl p-3 focus:ring-0 focus:border-blue-500 transition-all text-sm text-slate-900 dark:text-white placeholder-slate-400 outline-none"
                        placeholder="Ehsan Pazhman" />
                    @error('name')
                        <span
                            class="text-red-500 text-[9px] font-bold mt-1 block italic lowercase">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label
                        class="block text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-1">Digital
                        Address</label>
                    <input type="email" wire:model.blur="email"
                        class="w-full bg-slate-100 dark:bg-slate-800 border-2 border-transparent rounded-xl p-3 focus:ring-0 focus:border-blue-500 transition-all text-sm text-slate-900 dark:text-white placeholder-slate-400 outline-none"
                        placeholder="name@mail.com" />
                    @error('email')
                        <span
                            class="text-red-500 text-[9px] font-bold mt-1 block italic lowercase">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Subject Selection (Moved up to row) -->
                <div class="space-y-2">
                    <label
                        class="block text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-1">Inquiry
                        Subject</label>
                    <input type="text" wire:model.blur="subject"
                        class="w-full bg-slate-100 dark:bg-slate-800 border-2 border-transparent rounded-xl p-3 focus:ring-0 focus:border-blue-500 transition-all text-sm text-slate-900 dark:text-white placeholder-slate-400 outline-none"
                        placeholder="Project Purpose" />
                    @error('subject')
                        <span
                            class="text-red-500 text-[9px] font-bold mt-1 block italic lowercase">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Message Content -->
            <div class="mb-8 space-y-2">
                <label
                    class="block text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 ml-1">Detailed
                    Narrative</label>
                <textarea wire:model.blur="message"
                    class="w-full bg-slate-100 dark:bg-slate-800 border-2 border-transparent rounded-xl p-4 focus:ring-0 focus:border-blue-500 transition-all text-sm text-slate-900 dark:text-white h-32 resize-none outline-none"
                    placeholder="Tell me about your project or vision..."></textarea>
                @error('message')
                    <span class="text-red-500 text-[9px] font-bold mt-1 block italic lowercase">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button - Gradient & Shadow -->
            <button type="submit" wire:loading.attr="disabled"
                class="w-full bg-linear-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 disabled:from-blue-400 disabled:to-indigo-400 text-white font-black uppercase tracking-[0.3em] text-[9px] py-4 rounded-xl transition-all shadow-xl shadow-blue-600/30 active:scale-[0.98] flex justify-center items-center gap-3 group">

                <span wire:loading.remove class="flex items-center gap-3">
                    Transmit Message
                    <svg xmlns="www.w3.org" class="h-3 w-3 transform group-hover:translate-x-1 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>

                <span wire:loading class="flex items-center gap-3">
                    <svg class="animate-spin h-3 w-3 text-white" viewBox="0 0 24 24">
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
</section>
