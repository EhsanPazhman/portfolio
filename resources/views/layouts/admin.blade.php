<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    @vite('resources/css/app.css')
    <link href="fonts.googleapis.com" rel="stylesheet">
    @livewireStyles
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b0f1a;
        }

        .sidebar-transition {
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="text-gray-300 overflow-hidden">
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
        <div class="fixed top-8 right-8 z-999 space-y-3">
            <template x-for="note in notifications" :key="note.id">
                <div x-transition
                    class="bg-white text-black px-6 py-4 rounded-2xl shadow-2xl font-bold text-xs uppercase tracking-widest flex items-center gap-3 border border-gray-100">
                    <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                    <span x-text="note.msg"></span>
                </div>
            </template>
        </div>
    </div>
    <div class="flex h-screen w-full">

        <!-- SIDEBAR -->
        @include('partials.admin.sidebar')

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col min-w-0">

            <!-- HEADER -->
            @include('partials.admin.header')

            <!-- CONTENT AREA -->
            <div class="flex-1 overflow-y-auto p-6 md:p-10">
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const sidebarTexts = document.querySelectorAll('.sidebar-text');

            if (sidebar.classList.contains('w-64')) {
                sidebar.classList.replace('w-64', 'w-20');
                sidebarTexts.forEach(el => el.classList.add('hidden'));
            } else {
                sidebar.classList.replace('w-20', 'w-64');
                sidebarTexts.forEach(el => el.classList.remove('hidden'));
            }
        }
    </script>

</body>

</html>
