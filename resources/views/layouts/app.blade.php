<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opportuneer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <nav class="sticky top-0 z-50 bg-white flex justify-center">
        <x-navigation />
    </nav>

    @yield('hero')
    @yield('masthead')

    <main class="container mx-auto">
        @yield('content')
    </main>

    <footer class="flex justify-center border-t border-t-light-pink">
        <x-footer />
    </footer>
</body>

</html>
