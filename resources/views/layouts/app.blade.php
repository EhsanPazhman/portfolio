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

    <!-- Professional Reveal Script (2026 Optimized) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Target sections, footer, and direct children of main (to catch your contact div)
            const elements = document.querySelectorAll('section, footer, main > div');
            let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;

            const observerOptions = {
                threshold: 0.1, // Trigger when 10% visible
                rootMargin: '0px 0px -40px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const isScrollingDown = scrollTop > lastScrollTop;

                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (isScrollingDown) {
                            entry.target.classList.add('active-down');
                            entry.target.classList.remove('active-up', 'ready');
                        } else {
                            entry.target.classList.add('active-up');
                            entry.target.classList.remove('active-down', 'ready');
                        }
                    } else {
                        entry.target.classList.remove('active-down', 'active-up');
                        entry.target.classList.add('ready');
                    }
                });
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            }, observerOptions);

            elements.forEach(el => {
                el.classList.add('reveal', 'ready');
                observer.observe(el);
            });
        });
    </script>

</body>

</html>
