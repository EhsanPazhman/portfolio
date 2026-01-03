<div class="w-full py-16">
    <!-- Contact Form -->
    <h1 class="text-3xl font-bold mb-8">Contact Form</h1>

    <form wire:submit.prevent="sendMessage" class="w-full bg-white p-8 shadow rounded mb-8">
        <h2 class="text-xl font-semibold mb-4">Send a Message</h2>

        <div class="mb-3">
            <input type="text" wire:model.live="name" placeholder="Name"
                class="w-full border p-2 rounded outline-none focus:ring-1 focus:ring-black" />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <input type="email" wire:model.live="email" placeholder="Email"
                class="w-full border p-2 rounded outline-none focus:ring-1 focus:ring-black" />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <input type="text" wire:model.live="subject" placeholder="Subject"
                class="w-full border p-2 rounded outline-none focus:ring-1 focus:ring-black" />
            @error('subject')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <textarea wire:model.live="message" placeholder="Message"
                class="w-full border p-2 rounded outline-none focus:ring-1 focus:ring-black h-32"></textarea>
            @error('message')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" wire:loading.attr="disabled"
            class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition disabled:opacity-50 cursor-pointer">
            <span wire:loading.remove wire:target="sendMessage">Send</span>
            <span wire:loading wire:target="sendMessage">Sending...</span>
        </button>
    </form>

    <!-- Contact Info -->
    <h1 class="text-3xl font-bold mb-8">Contact Info</h1>

    <div class="w-full bg-white p-8 shadow rounded">
        <div class="flex flex-wrap gap-x-8 gap-y-4">
            @foreach ($owner->profile->socialLinks as $socialLink)
                <a href="{{ $socialLink->url }}" target="_blank"
                    class="flex items-center gap-3 text-gray-700 hover:text-black transition">
                    <i class="{{ $socialLink->icon }} text-xl"></i>
                    <span class="font-medium">{{ $socialLink->platform }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
