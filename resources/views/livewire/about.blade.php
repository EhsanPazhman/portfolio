<div>
    <section class="max-w-4xl mx-auto py-16">
        <h1 class="text-3xl font-bold mb-6">About Me</h1>
        <p class="mb-6"></p>
        <!-- Skills -->
        <h2 class="text-2xl font-semibold mb-4">Skills</h2>
        <ul class="space-y-2">
            @foreach ($owner->profile->skills as $skill)
                <li>{{ $skill->name }} – <span class="text-gray-600">{{ $skill->level }}</span></li>
            @endforeach
        </ul>


        <!-- Technologies -->
        <h2 class="text-2xl font-semibold mt-8 mb-4">Technologies</h2>
        <p>
            @foreach ($owner->profile->technologies as $technology)
                <span>{{ $technology->name }}</span>
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
        <!-- Experience Summary -->
        <h2 class="text-2xl font-semibold mt-8 mb-4">Experience Summary</h2>
        <p>{{ $owner->profile->experience_summary }}</p>
    </section>
</div>
