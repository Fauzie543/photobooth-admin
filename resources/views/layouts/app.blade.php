<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Photobooth Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <div class="flex">
            <aside class="w-64 bg-white h-screen p-4 shadow">
                <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
                <nav class="space-y-2">
                    <a href="/admin/dashboard" class="block text-gray-800 hover:text-blue-600">Dashboard</a>
                    <a href="/admin/frames" class="block text-gray-800 hover:text-blue-600">Frames</a>
                    <a href="/admin/orders" class="block text-gray-800 hover:text-blue-600">Orders</a>
                </nav>
            </aside>
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </body>
</html>
