<aside
    class="fixed left-0 top-1/3 z-50
           bg-white shadow-lg rounded-r-xl
           transition-all duration-300 ease-in-out
           {{ $open ? 'w-52' : 'w-14' }}
           hidden md:flex flex-col">

    <!-- Toggle Button -->
    <button
        wire:click="toggle"
        class="p-4 border-b
               flex justify-center items-center
               cursor-pointer
               text-gray-600 hover:text-black
               hover:bg-gray-100
               transition">

        @if ($open)
            <i class="fa-solid fa-xmark text-xl"></i>
        @else
            <i class="fa-solid fa-bars text-xl"></i>
        @endif

    </button>

    <!-- Social Links -->
    <div class="flex flex-col gap-4 p-3">
        @foreach ($owner->profile->socialLinks as $socialLink)
            <a href="{{ $socialLink->url }}"
               target="_blank"
               class="group flex items-center gap-3
                      p-2 rounded
                      cursor-pointer
                      text-gray-700
                      hover:bg-gray-100 hover:text-black
                      transition">

                <i class="{{ $socialLink->icon }} text-xl w-6 text-center"></i>

                @if ($open)
                    <span class="font-medium whitespace-nowrap">
                        {{ $socialLink->platform }}
                    </span>
                @endif
            </a>
        @endforeach
    </div>
</aside>
