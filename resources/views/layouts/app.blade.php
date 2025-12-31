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

    @include('partials.header')

    <main class="pt-16">
        {{ $slot }}
    </main>

    @include('partials.footer')

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
