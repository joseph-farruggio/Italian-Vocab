<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#2B2B28] h-full">
        <div class="min-h-screen h-full">
            <!-- Page Content -->
            <main class="max-w-lg mx-auto px-4 flex flex-col justify-between h-full py-4">
                <section class="flex-grow">{{ $slot }}</section>
                
                <livewire:layout.navigation />
            </main>

        </div>
    </body>
</html>
