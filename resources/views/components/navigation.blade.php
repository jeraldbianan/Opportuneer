<div class="container p-3">
    <div class="flex justify-between items-center">
        <a href="{{ route('home') }}">
            <x-icons.logo></x-icons.logo>
        </a>
        <div class="flex gap-10 items-center">
            <ul class="flex gap-10 font-semibold text-sm">
                <li class="hover:text-dark-blue
                @if (Route::currentRouteName() === 'home') text-dark-blue @endif">
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <li class="hover:text-dark-blue
                @if (Route::currentRouteName() === 'job-listings.index') text-dark-blue @endif">
                    <a href="{{ route('job-listings.index') }}">Jobs List</a>
                </li>
            </ul>

            @if (auth()->user())
                <x-avatar />
            @else
                <a href="{{ route('auth.create') }}">
                    <x-button type="button" class="h-10 w-28 font-medium text-sm text-white">
                        Login
                    </x-button>
                </a>
            @endif
        </div>
    </div>
</div>
