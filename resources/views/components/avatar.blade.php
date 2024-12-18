<div x-data="{ open: false }" class="relative">
    <div @click="open = !open" aria-haspopup="true" :aria-expanded="open.toString()" aria-controls="userMenu"
        class="group flex gap-3 cursor-pointer pl-10 border-l border-l-light-pink">
        <div class="py-3 text-sm text-black font-bold dark:text-white hover:textd">
            <div>{{ auth()->user()->name }}</div>
        </div>
        <img id="avatarButton" type="button" class="w-10 h-10 rounded-full cursor-pointer"
            src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : 'https://raw.githubusercontent.com/Ashwinvalento/cartoon-avatar/master/lib/images/male/45.png' }}"
            alt="User menu">
    </div>

    <div x-show="open" @click.outside="open = false" id="userMenu" role="menu" aria-labelledby="avatarButton"
        class="absolute left-[20%] z-10 bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">

        <ul class="pt-2 text-sm text-gray-700 dark:text-gray-200" role="menu" aria-label="User options">
            <li>
                <a href="{{ route('my-job-listings-application.index') }}" role="menuitem"
                    class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    My Applications
                </a>
            </li>

            @if (auth()->user()->employer === null)
                <li>
                    <a href="{{ route('employer.create') }}" role="menuitem"
                        class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Become an Employer
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('my-job-listings.index') }}" role="menuitem"
                        class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        My Job Listings
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('profile.edit', auth()->user()) }}" role="menuitem"
                    class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    Profile Settings
                </a>
            </li>


        </ul>

        <form action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" role="menuitem"
                class="w-full text-sm px-4 py-3 text-start rounded-b-lg text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                Sign out
            </button>
        </form>
    </div>
</div>
