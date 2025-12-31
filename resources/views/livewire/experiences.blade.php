<div>
    <section class="max-w-4xl mx-auto py-16">
        <h1 class="text-3xl font-bold mb-8">Experience</h1>
        @foreach ($owner->profile->experiences as $experience)
            <div class="space-y-6">
                <div class="bg-white p-5 shadow rounded">
                    <h3 class="font-semibold">{{ $experience->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $experience->company }} | {{ $experience->start_date }} – {{ $experience->end_date }}</p>
                    <ul class="list-disc ml-5 mt-2 text-sm">
                        <li>{{ $experience->description }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </section>
</div>
