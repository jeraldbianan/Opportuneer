<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opportuneer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="flex flex-col min-h-screen w-full items-center">
        <header class="sticky top-0 z-50 bg-white w-full p-3 flex justify-center shadow-sm">
            <div class="container flex justify-between items-center">
                <a href="{{ route('home') }}" aria-label="To Homepage">
                    <x-icons.logo aria-label="Oppotuneer Logo"></x-icons.logo>
                </a>
                <x-navigation />
            </div>
        </header>

        <main class="w-full flex-grow">
            @yield('hero')
            @yield('masthead')

            <section class="container mx-auto">
                @if (session('success'))
                    <section role="alert"
                        class="my-8 rounded-md border-l-4 border-success bg-green-200 p-4 text-green-700 opacity-75">
                        <p class="font-semibold text-sm">Success!</p>
                        <p class="font-medium text-xs">{{ session('success') }}</p>
                    </section>
                @endif

                @if (session('error'))
                    <section role="alert"
                        class="my-8 rounded-md border-l-4 border-danger bg-red-200 p-4 text-red-700 opacity-75">
                        <p class="font-semibold text-sm">Error!</p>
                        <p class="font-medium text-xs">{{ session('error') }}</p>
                    </section>
                @endif

                @yield('content')
            </section>
        </main>

        <footer class="w-full border-t border-t-light-pink py-4 container flex justify-center">
            <x-footer />
        </footer>
    </div>
</body>

</html>
