<x-card class="p-[30px] w-[367px] transition-all hover:scale-105">
    <section class="flex items-center gap-3">
        <img src="{{ $job->employer->logo }}" alt="{{ $job->employer->company_name }}" class="w-20 h-20 rounded-2xl">
        <div class="flex flex-col">
            <p class="font-open-sans text-xs font-bold text-light-blue">
                {{ $job->location }}
            </p>
            <p class="font-open-sans text-xl font-bold">{{ $job->employer->company_name }}</p>
        </div>
    </section>

    <div class="my-6 h-[1px] w-full bg-light-blue"></div>

    <section>
        <p class="font-open-sans text-xl font-semibold line-clamp-1">{{ $job->title }}</p>
        <p class="mt-4 line-clamp-4 font-open-sans text-base !leading-[140%]">
            {{ $job->description }}
        </p>
        <div class="mt-8 flex items-center justify-between">
            <div class="flex flex-col gap-1 font-open-sans text-sm">
                <p>{{ $job->type }}</p>
                <p>₱{{ number_format($job->salary) }}</p>
            </div>
            <a href="{{ route('job-listings.show', $job) }}">
                <x-button type="button" class="py-2 px-3 text-xs text-white">View Details</x-button>
            </a>
        </div>
    </section>
</x-card>
