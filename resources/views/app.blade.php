<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="font-sans text-slate-800 dark:text-sky-400 bg-white dark:bg-sky-900 antialiased bg-no-repeat bg-cover bg-fixed bg-nfsu-light dark:bg-nfsu-dark">
    @inertia
</body>
</html>
