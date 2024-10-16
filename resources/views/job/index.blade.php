<x-layout>
    <div class="flex flex-col gap-6">
        @foreach ($jobs as $job)
            <x-card-horizontal class="p-4">
                <div class="flex justify-between">
                    <div class="flex gap-3 max-w-[600px] w-full">
                        <img src="{{ $job->logo }}" alt="bird" class="w-[52px] h-[52px] rounded-2xl">
                        <div>
                            <h3 class="line-clamp-1 font-open-sans font-semibold text-xl">{{ $job->title }}</h3>
                            <div class="flex gap-2 items-center">
                                <p class="font-open-sans text-light-blue font-semibold text-base">{{ $job->company }}</p>
                                <span>-</span>
                                <div class="font-open-sans text-sm">₱{{ number_format($job->salary) }}
                                </div>
                                <span>-</span>
                                <div
                                    class="bg-dark-blue py-1 px-2 font-open-sans font-semibold text-[10px] rounded-2xl text-white">
                                    {{ $job->type }}</div>
                                <div
                                    class="bg-dark-blue py-1 px-2 font-open-sans font-semibold text-[10px] rounded-2xl text-white">
                                    {{ $job->experience }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <div class="flex justify-end">
                            <x-location-icon></x-location-icon>
                            <div class="font-open-sans font-semibold text-sm">{{ $job->location }}</div>
                        </div>
                        <div class="font-open-sans text-light-blue text-[10px] font-semibold mt-2">Posted
                            {{ $job->created_at->diffForHumans() }}</div>
                    </div>
                </div>

                <div class="max-w-[690px] w-full">
                    <p class="mt-5 font-open-sans font-semibold text-sm">{{ $job->description }}</p>

                    <div class="flex mt-5 gap-2">
                        @foreach (explode(',', $job->tags) as $tag)
                            <div
                                class="bg-light-blue py-1 px-2 font-open-sans font-semibold text-[10px] rounded-2xl text-white">
                                {{ $tag }}</div>
                        @endforeach
                    </div>
                </div>

            </x-card-horizontal>
        @endforeach
    </div>
</x-layout>
