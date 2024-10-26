<article class="flex justify-between gap-6" aria-labelledby="{{ $job->title }}">
    <section class="flex flex-col">
        <header class="flex gap-3 w-full items-start">
            <img src="{{ asset($job->employer->logo) }}" alt="employer logo"
                class="max-w-[52px] max-h-[52px] w-full h-full rounded-2xl object-cover">
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
        </header>

        <div class="max-w-full">
            @if (Route::currentRouteName() === 'job-listings.show')
                <p class="mt-5 font-semibold text-sm">
                    {!! nl2br(e($job->description)) !!}
                </p>
            @else
                <p class="mt-5 font-semibold text-sm line-clamp-3">
                    {{ $job->description }}
                </p>
            @endif

        </div>

        <footer class="flex gap-2 flex-wrap max-w-[690px] w-full mt-5">
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
        </footer>
    </section>

    <section class="flex flex-col items-end justify-between flex-none">
        <div>
            <div class="flex justify-end">
                <x-icons.location class="h-[18px] w-[18px]" />
                <div class="font-semibold text-sm">{{ $job->location }}</div>
            </div>
            <div class="text-light-blue text-[10px] font-semibold mt-2 text-end">Posted
                {{ $job->created_at->diffForHumans() }}</div>
        </div>
        {{ $slot }}
    </section>
</article>
