<x-layout>
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
        $job->title => '#',
    ]" class="mb-4" />
    <x-job-card :$job />
</x-layout>
