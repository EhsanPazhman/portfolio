<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('admin.dashboard', absolute: false));
    }
}; ?>

<div class="min-h-screen flex items-center justify-center relative overflow-hidden px-6 bg-white dark:bg-[#020617]">
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-600/20 rounded-full blur-[120px] -z-10">
    </div>

    <div class="w-full max-w-md">
        <div class="glass p-8 md:p-10 rounded-[2.5rem] shadow-2xl border-white/10 relative overflow-hidden">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">Login<span
                        class="text-blue-600">.</span></h1>
            </div>

            <form wire:submit="login" class="space-y-6">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-2 ml-2">Email
                        Address</label>
                    <input wire:model="form.email" type="email" id="email" name="email" required autofocus
                        class="w-full bg-slate-100 dark:bg-white/5 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-slate-900 dark:text-white outline-none" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>

                <div>
                    <label
                        class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-2 ml-2">Password</label>
                    <input wire:model="form.password" type="password" id="password" name="password" required
                        class="w-full bg-slate-100 dark:bg-white/5 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 transition-all text-slate-900 dark:text-white outline-none" />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input wire:model="form.remember" type="checkbox"
                            class="rounded bg-slate-100 dark:bg-white/5 border-none text-blue-600">
                        <span class="ms-2 text-xs font-bold text-slate-500 uppercase tracking-widest">Remember</span>
                    </label>
                    <a class="text-xs font-bold text-blue-600 uppercase tracking-widest"
                        href="{{ route('password.request') }}" wire:navigate>Forgot?</a>
                </div>

                <button type="submit" wire:loading.attr="disabled"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black uppercase tracking-widest text-xs py-5 rounded-2xl transition-all shadow-xl shadow-blue-600/20">
                    <span wire:loading.remove>LOG IN</span>
                    <span wire:loading>PROCESSING...</span>
                </button>
            </form>
        </div>
    </div>
</div>
