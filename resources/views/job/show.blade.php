<x-job-listing-banner>
    <h2 class="font-montserrat font-semibold text-5xl text-white">Discover the Opportunity Waiting for You</h2>
    <p class="font-normal text-base text-white">Learn more about this role and see how it aligns with your
        skills and career goals. Your next big step starts here.</p>
</x-job-listing-banner>

<x-layout>
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
        $job->title => '#',
    ]" class="mb-4 mt-10" />
    <x-card class="p-4">
        <x-job-card :$job />
    </x-card>

    <x-card class="mb-4 mt-10 p-4">
        <h2 class="mb-4 text-lg font-medium font-montserrat">
            More Jobs at <span class="font-bold">{{ $job->employer->company_name }}</span>
        </h2>
        <div class="text-sm">
            @foreach ($job->employer->jobListings as $otherJob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div
                            class="text-sm font-semibold text-dark-blue border-b border-b-transparent hover:border-b-dark-blue">
                            <a href="{{ route('job-listings.show', $otherJob) }}">{{ $otherJob->title }}</a>
                        </div>
                        <div class="text-sm">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-sm">₱{{ number_format($otherJob->salary) }}</div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
