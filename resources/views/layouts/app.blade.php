<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opportuneer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="flex flex-col min-h-screen">
        <nav class="sticky top-0 z-50 bg-white flex justify-center">
            <x-navigation />
        </nav>

        @yield('hero')
        @yield('masthead')

        <main class="container mx-auto flex-grow">
            @if (session('success'))
                <div role="alert"
                    class="my-8 rounded-md border-l-4 border-success bg-green-200 p-4 text-green-700 opacity-75">
                    <p class="font-semibold text-sm">Success!</p>
                    <p class="font-medium text-xs">{{ session('success') }}</p>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="flex justify-center border-t border-t-light-pink">
            <x-footer />
        </footer>
    </div>
</body>

</html>
