@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Discover the Opportunity Waiting for You</h2>
        <p class="font-normal text-base text-white">Learn more about this role and see how it aligns with your
            skills and career goals. Your next big step starts here.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'My Job Applications' => '#',
    ]" class="mb-4 mt-10" />

    <div class="flex flex-col gap-5 mb-[90px]">
        @forelse ($applications as $application)
            <x-card>
                <x-job-card :job="$application->jobListing">
                    <x-link-button :href="route('job-listings.show', $application->jobListing)">
                        Show Details
                    </x-link-button>
                </x-job-card>
                <div class="mt-10 text-base text-dark-blue">Expected Salary:
                    <span class="font-bold">₱{{ number_format($application->expected_salary) }}</span>
                </div>
            </x-card>

        @empty
        @endforelse
    </div>
@endsection
