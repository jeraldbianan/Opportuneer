<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opportuneer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-navigation />

    @yield('masthead')

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <x-footer />
</body>

</html>
