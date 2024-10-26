@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Your Job Listings</h2>
        <p class="font-normal text-base text-white">Manage and review all active job posts in one place.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'My Job Listings' => '#',
    ]" class="mb-8 mt-10" />

    <a href="{{ route('my-job-listings.create') }}">
        <x-button type="button">
            Add New Job
        </x-button>
    </a>

    <div class="flex flex-col items-center gap-4 mt-10">
        @forelse ($jobs as $job)
            <x-card class="w-full">
                <x-job-card :$job>
                    <div>
                        <a href="">
                            <x-button type="button">Edit</x-button>
                        </a>
                        <a href="{{ route('my-job-listings.show', $job) }}">
                            <x-button type="button">
                                View Applicants
                            </x-button>
                        </a>
                    </div>
                </x-job-card>
                <p class="text-sm mt-5">Number of Applicants: {{ $job->jobListingApplications->count() }}</p>
            </x-card>
        @empty
            <p class="text-base text-dark-blue mt-10 text-center">You have not posted a job yet...</p>
        @endforelse
    </div>

    <div class="mt-10 mb-[90px] w-full">
        {{ $jobs->links() }}
    </div>
@endsection
