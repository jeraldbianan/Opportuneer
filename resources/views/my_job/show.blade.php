@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Your Job Listings</h2>
        <p class="font-normal text-base text-white">Manage and review all active job posts in one place.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'My Job Listings' => route('my-job-listings.index'),
        $job->title => '#',
    ]" class="mb-8 mt-10" />

    <a href="{{ route('my-job-listings.create') }}">
        <x-button type="button">
            Add New Job
        </x-button>
    </a>

    <x-card class="mt-10 mb-[90px]">
        <x-card>
            <x-job-card :$job />
        </x-card>

        <h4 class="mt-5 mb-2 text-lg font-semibold text-dark-blue">List of Applicants</h4>

        <div class="flex flex-col items-center gap-4 w-full">
            @forelse ($applications as $application)
                <x-card class="hover:bg-light-pink w-full">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col gap-2 text-sm font-medium">
                            <span class="text-xs">Applied {{ $application->created_at->diffForHumans() }}</span>
                            <div>{{ $application->user->name }} - {{ $application->user->email }}</div>
                            <div>Expected Salary:
                                <span
                                    class="font-semibold text-base">₱{{ number_format($application->expected_salary) }}</span>
                            </div>
                        </div>
                        <x-button type="button">Download CV</x-button>
                    </div>
                </x-card>
            @empty
                <p class="text-xs text-dark-blue mt-10">No Applications Yet..</p>
            @endforelse

            <div class="mt-10 mb-[90px] w-full">
                {{ $applications->links() }}
            </div>
        </div>
    </x-card>
@endsection
