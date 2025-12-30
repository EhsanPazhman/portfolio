<div class="min-h-screen flex items-center justify-center px-6">

    <!-- Left Social Sidebar -->
    <aside class="fixed left-0 top-1/3 hidden md:flex flex-col gap-4 p-3 bg-white shadow rounded-r-lg">
        <a href="#" class="text-gray-600 hover:text-pink-500">LinkedIn</a>
        <a href="#" class="text-gray-600 hover:text-pink-500">Instagram</a>
        <a href="#" class="text-gray-600 hover:text-blue-500">Telegram</a>
    </aside>

    <!-- Hero Section -->
    <div class="max-w-5xl w-full grid md:grid-cols-2 gap-10 items-center">
        <!-- Profile Image -->
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $owner->profile->avatar) }}" alt="Profile" class="rounded-full w-60 h-60 object-cover shadow" />
        </div>

        <!-- Text Content -->
        <div class="text-center md:text-left">
            <h1 class="text-4xl font-bold mb-2">{{ $owner->name }}</h1>
            <h2 class="text-xl text-gray-600 mb-4">{{$owner->profile->job_title }}</h2>
            <p class="mb-6 text-gray-700">{{$owner->profile->bio }}</p>
            <a href="#projects" class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition">Show Projects</a>
        </div>
    </div>

    <!-- Projects Anchor -->
    <div id="projects"></div>
</div>
