<div>
    <!-- Left Social Sidebar -->
    <livewire:web.social-sidebar />
    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center px-6">
        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-10 items-center">
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $owner->profile->avatar) }}" alt="Profile"
                    class="rounded-full w-60 h-60 object-cover shadow" />
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-bold mb-2">{{ $owner->name }}</h1>
                <h2 class="text-xl text-gray-600 mb-4">{{ $owner->profile->job_title }}</h2>
                <p class="mb-6 text-gray-700">{{ $owner->profile->bio }}</p>
                <a href="#projects"
                    class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition">Show
                    Projects</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-6">
            <livewire:web.about />
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-16">
        <div class="max-w-5xl mx-auto px-6">
            <livewire:web.projects />
        </div>
    </section>
    <!-- Experiences Section -->
    <section id="experiences" class="py-16">
        <div class="max-w-5xl mx-auto px-6">
            <livewire:web.experiences />
        </div>
    </section>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="py-16">
        <div class="max-w-5xl mx-auto px-6">
            <livewire:web.contact />
        </div>
    </section>
</div>
