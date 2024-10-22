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
        class="absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
            <li>
                <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
        </ul>
        <div class="py-1">
            <a href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                out</a>
        </div>
    </div>
</div>
