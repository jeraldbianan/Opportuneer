<div x-data="{ showModal: false }" @keydown.escape.window="showModal = false">
    <x-button @click="showModal = true" type="button" class="bg-red-500 hover:bg-red-700">
        Delete
    </x-button>

    <div x-show="showModal" tabindex="-1"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" aria-hidden="true" x-cloak
        @click.self="showModal = false">
        <div class="relative p-4 w-full max-w-md" role="dialog" aria-labelledby="modalTitle"
            aria-describedby="modalDescription">
            <button @click="showModal = false" class="absolute top-5 right-6">
                <x-icons.close></x-icons.close>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="p-5 text-center">
                    <h3 id="modalTitle" class="mb-5 text-sm font-normal">{{ $title }}</h3>
                    <p id="modalDescription" class="sr-only">This action will delete the job listing.</p>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
