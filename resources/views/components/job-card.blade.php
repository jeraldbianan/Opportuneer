<div>
    <div class="flex justify-between gap-6">
        <div class="flex flex-col">
            <div class="flex gap-3 max-w-[600px] w-full">
                <img src="{{ $job->employer->logo }}" alt="bird" class="w-[52px] h-[52px] rounded-2xl">
                <div>
                    <h3 class="line-clamp-1 font-semibold text-xl">
                        {{ Str::ucfirst($job->title) }}
                    </h3>
                    <div class="flex gap-2 items-center">
                        <p class="text-light-blue font-semibold text-base">
                            {{ $job->employer->company_name }}</p>
                        <span>-</span>
                        <div class="text-sm">₱{{ number_format($job->salary) }}</div>
                        <span>-</span>
                        <div class="text-sm text-dark-blue border-b border-b-transparent hover:border-b-dark-blue">
                            <a href="{{ route('job-listings.index', ['category' => $job->category]) }}">
                                {{ $job->category }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-[690px] w-full">
                @if (Route::currentRouteName() === 'job-listings.show')
                    <p class="mt-5 font-semibold text-sm">
                        {!! nl2br(e($job->description)) !!}
                    </p>
                @else
                    <p class="mt-5 font-semibold text-sm line-clamp-2">
                        {{ $job->description }}
                    </p>
                @endif

            </div>

            <div class="flex gap-2 flex-wrap max-w-[690px] w-full mt-5">
                <x-tag class="bg-dark-blue">
                    <a href="{{ route('job-listings.index', ['type' => $job->type]) }}">{{ $job->type }}</a>
                </x-tag>
                <x-tag class="bg-dark-blue">
                    <a
                        href="{{ route('job-listings.index', ['experience' => $job->experience]) }}">{{ $job->experience }}</a>
                </x-tag>
                @foreach (explode(',', $job->tags) as $tag)
                    <x-tag class="bg-light-blue">
                        <a href="{{ route('job-listings.index', ['tag' => $tag]) }}">
                            {{ $tag }}
                        </a>
                    </x-tag>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col items-end justify-between flex-none">
            <div>
                <div class="flex justify-end">
                    <x-icons.location class="h-[18px] w-[18px]" />
                    <div class="font-semibold text-sm">{{ $job->location }}</div>
                </div>
                <div class="text-light-blue text-[10px] font-semibold mt-2 text-end">Posted
                    {{ $job->created_at->diffForHumans() }}</div>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>
