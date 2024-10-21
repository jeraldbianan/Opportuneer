<div class="relative max-w-full w-full h-[300px]">
    <div class="absolute bg-black/50 h-full w-full z-10"></div>
    <img src="{{ $mastHeadPhoto }}" alt="Job Listings Background Image"
        class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 flex items-center justify-center z-20">
        <div class="text-center flex flex-col gap-4">
            {{ $slot }}
        </div>
    </div>
</div>
