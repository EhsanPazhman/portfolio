<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>{{ $title ?? 'Portfolio' }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-800">
    <div x-data="{
        notifications: [],
        add(message) {
            const id = Date.now();
            this.notifications.push({ id: id, msg: message });
            setTimeout(() => {
                this.notifications = this.notifications.filter(n => n.id !== id);
            }, 3000);
        }
    }" @notify.window="add($event.detail)">
        <div class="fixed top-8 right-8 z-9999 space-y-3">
            <template x-for="note in notifications" :key="note.id">
                <div x-transition
                    class="bg-black text-white px-6 py-4 rounded shadow-2xl font-bold text-xs uppercase tracking-widest flex items-center gap-3 border border-white/10">
                    <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                    <span x-text="note.msg"></span>
                </div>
            </template>
        </div>
    </div>
    @include('partials.header')

    <main class="pt-16">
        {{ $slot }}
    </main>

    @include('partials.footer')

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
