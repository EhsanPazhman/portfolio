<div>
    <section class="max-w-6xl mx-auto py-16">
        <div class="flex flex-col items-center mb-12">
            <h2 class="text-blue-500 font-black text-xs uppercase tracking-[0.4em] mb-2 text-center">Selected Works</h2>
            <h1 class="text-4xl font-black text-gray-900 dark:text-white tracking-tighter">Featured Projects</h1>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($owner->profile->projects as $project)
                <div
                    class="group glass rounded-3xl overflow-hidden hover:-translate-y-2 transition-all duration-500 shadow-xl">
                    <div class="relative overflow-hidden h-52">
                        <img src="{{ asset('storage/' . $project->image) }}"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" />
                        <div
                            class="absolute inset-0 bg-linear-to-t from-gray-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-black text-xl text-gray-900 dark:text-white mb-2 tracking-tight">
                            {{ $project->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-6 leading-relaxed">
                            {{ $project->description }}</p>
                        <div
                            class="flex justify-between items-center border-t border-gray-100 dark:border-white/5 pt-4">
                            <a href="{{ $project->github_url }}"
                                class="text-[10px] font-bold uppercase tracking-widest text-blue-500 hover:text-blue-600 transition-colors flex items-center gap-2">
                                <i class="fa-brands fa-github text-lg"></i> Code
                            </a>
                            <a href="{{ $project->demo_url }}"
                                class="text-[10px] font-bold uppercase tracking-widest text-gray-900 dark:text-white flex items-center gap-2">
                                Live Demo <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
