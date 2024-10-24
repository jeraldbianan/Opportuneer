<div x-data="{ open: false }" class="relative">
    <div @click="open = !open" class="group flex gap-3 cursor-pointer pl-10 border-l border-l-light-pink">
        <div class="py-3 text-sm text-black font-bold dark:text-white hover:textd">
            <div>{{ auth()->user()->name }}</div>
        </div>
        <img id="avatarButton" type="button" class="w-10 h-10 rounded-full cursor-pointer"
            src="https://raw.githubusercontent.com/Ashwinvalento/cartoon-avatar/master/lib/images/male/45.png"
            alt="User dropdown">

    </div>

    <!-- Dropdown menu -->
    <div x-show="open" @click.outside="open = false"
        class="absolute left-[20%] z-10 bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
        <ul class="pt-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
            <li>
                <a href="{{ route('my-job-listings-application.index') }}"
                    class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My
                    Applications</a>
            </li>
        </ul>
        <form action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="w-full text-sm px-4 py-3 text-start rounded-b-lg text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                Sign out
            </button>
        </form>
    </div>
</div>
