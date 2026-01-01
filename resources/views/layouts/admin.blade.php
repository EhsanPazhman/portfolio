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
    @include('partials.admin.modal')
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

        function openModal(type) {
            if (document.getElementById('modal-title')) {
                document.getElementById('modal-title').innerText = 'Create ' + type;
            }
            document.getElementById('main-modal').classList.replace('hidden', 'flex');
        }

        function closeModal() {
            document.getElementById('main-modal').classList.replace('flex', 'hidden');
        }

        function switchTab(tabId) {
 
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.getElementById('tab-' + tabId).classList.remove('hidden');

            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('bg-gray-800', 'text-white');
                btn.classList.add('text-gray-400', 'hover:bg-gray-800/50');
            });
            document.getElementById('btn-' + tabId).classList.add('bg-gray-800', 'text-white');
            document.getElementById('btn-' + tabId).classList.remove('text-gray-400', 'hover:bg-gray-800/50');
            const titles = {
                'dashboard': 'Dashboard Overview',
                'users': 'Users Management',
                'projects': 'Projects List'
            };
            document.getElementById('current-title').innerText = titles[tabId];
        }
    </script>

</body>

</html>
