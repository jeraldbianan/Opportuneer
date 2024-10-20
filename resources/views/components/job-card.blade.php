<x-card-horizontal class="p-4">
    <div class="flex justify-between gap-6">
        <div class="flex flex-col">
            <div class="flex gap-3 max-w-[600px] w-full">
                <img src="{{ $job->logo }}" alt="bird" class="w-[52px] h-[52px] rounded-2xl">
                <div>
                    <h3 class="line-clamp-1 font-open-sans font-semibold text-xl">
                        {{ Str::ucfirst($job->title) }}
                    </h3>
                    <div class="flex gap-2 items-center">
                        <p class="font-open-sans text-light-blue font-semibold text-base">
                            {{ $job->company }}</p>
                        <span>-</span>
                        <div class="font-open-sans text-sm">₱{{ number_format($job->salary) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-[690px] w-full">
                <p class="mt-5 font-open-sans font-semibold text-sm line-clamp-2">{{ $job->description }}
                </p>
            </div>

            <div class="flex gap-2 flex-wrap max-w-[690px] w-full mt-5">
                <x-tag class="bg-dark-blue">{{ $job->type }}</x-tag>
                <x-tag class="bg-dark-blue">{{ $job->experience }}</x-tag>
                @foreach (explode(',', $job->tags) as $tag)
                    <x-tag class="bg-light-blue">{{ $tag }}</x-tag>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col items-end justify-between flex-none">
            <div>
                <div class="flex justify-end">
                    <x-location-icon></x-location-icon>
                    <div class="font-open-sans font-semibold text-sm">{{ $job->location }}</div>
                </div>
                <div class="font-open-sans text-light-blue text-[10px] font-semibold mt-2">Posted
                    {{ $job->created_at->diffForHumans() }}</div>
            </div>
            {{ $slot }}
        </div>
    </div>
</x-card-horizontal>