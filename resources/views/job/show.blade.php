<x-job-listing-banner>
    <h2 class="font-montserrat font-semibold text-5xl text-white">Discover the Opportunity Waiting for You</h2>
    <p class="font-open-sans font-normal text-base text-white">Learn more about this role and see how it aligns with your
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
</x-layout>
