<div>
    <section class="max-w-6xl mx-auto py-16">
        <h1 class="text-3xl font-bold mb-8">Projects</h1>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Project Card -->
            @foreach ($owner->profile->projects as $project)
                <div class="bg-white shadow rounded overflow-hidden">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Project" />
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">{{ $project->title }}</h3>
                        <p class="text-sm text-gray-600 mb-3">{{ $project->description }}</p>
                        <div class="flex gap-4 text-sm">
                            <a href="{{ $project->github_url }}" class="text-blue-600">GitHub</a>
                            <a href="{{ $project->demo_url }}" class="text-green-600">Live Demo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
