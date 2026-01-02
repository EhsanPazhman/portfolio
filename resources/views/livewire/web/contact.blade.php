<div class="w-full py-16">
    <!-- Contact Form -->
    <h1 class="text-3xl font-bold mb-8">Contact Form</h1>
    <form class="w-full bg-white p-8 shadow rounded mb-8">
        <h2 class="text-xl font-semibold mb-4">Send a Message</h2>
        <input type="text" placeholder="Name" class="w-full mb-3 border p-2 rounded" />
        <input type="email" placeholder="Email" class="w-full mb-3 border p-2 rounded" />
        <textarea placeholder="Message" class="w-full mb-3 border p-2 rounded"></textarea>
        <button class="bg-black text-white px-4 py-2 rounded">Send</button>
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
