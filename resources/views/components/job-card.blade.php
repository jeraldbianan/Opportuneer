<article class="flex justify-between gap-6" aria-labelledby="{{ $job->title }}">
    <section class="flex flex-col">
        <header class="flex gap-3 w-full items-start">
            <img src="{{ asset($job->employer->logo) }}" alt="employer logo"
                class="max-w-[52px] max-h-[52px] w-full h-full rounded-2xl object-cover">
            <div>
                <div class="flex items-center gap-2">
                    <h3 class="line-clamp-1 font-semibold text-xl">
                        {{ ucwords($job->title) }}
                    </h3>
                    @if ($job->deleted_at)
                        <div class="text-sm font-semibold text-red-700"> -<span class="ml-2">Deleted</span></div>
                    @endif
                </div>
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
            <a href="{{ route('job-listings.index', ['type' => $job->type]) }}">
                <x-tag class="bg-dark-blue">
                    {{ $job->type }}
                </x-tag>
            </a>

            <a href="{{ route('job-listings.index', ['experience' => $job->experience]) }}">
                <x-tag class="bg-dark-blue">
                    {{ $job->experience }}
                </x-tag>
            </a>


            @foreach (explode(',', $job->tags) as $tag)
                <a href="{{ route('job-listings.index', ['tag' => $tag]) }}">
                    <x-tag class="bg-light-blue">
                        {{ $tag }}
                    </x-tag>
                </a>
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
