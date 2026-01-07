<!DOCTYPE html>
<html lang="en" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('color-theme') === 'dark' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional Portfolio of {{ $owner->name ?? 'Developer' }}">
    <title>{{ $title ?? 'Portfolio' }}</title>

    <!-- Asset Bundling -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Theme Initialization: Prevents screen flickering -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    class="antialiased bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-white overflow-x-hidden transition-colors duration-500">

    @include('partials.header')

    <main id="main-content">
        {{ $slot }}
    </main>

    @include('partials.footer')

    <!-- Sticky UI Elements -->
    <livewire:web.social-sidebar />

    @livewireScripts
</body>

</html>
