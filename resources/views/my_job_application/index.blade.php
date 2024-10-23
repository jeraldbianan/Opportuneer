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
                <x-job-card :job="$application->jobListing"></x-job-card>
                <div class="flex justify-between items-center mt-10">
                    <div>
                        <div class="flex text-sm text-dark-blue gap-2">
                            <div>Expected Salary:
                                <span class="font-bold">₱{{ number_format($application->expected_salary) }}</span>
                            </div>
                            <span>-</span>
                            <div>
                                Applied {{ $application->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="flex mt-2 text-sm text-dark-blue">
                            <div>Average Asking Salary: <span
                                    class="font-bold">₱{{ number_format($application->jobListing->job_listing_applications_avg_expected_salary) }}</span>
                            </div>
                        </div>
                        <div class="flex mt-2 text-sm text-dark-blue">
                            <div>Other
                                {{ Str::plural('applicant', $application->jobListing->job_listing_applications_count - 1) }}:
                                {{ $application->jobListing->job_listing_applications_count - 1 }}
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <x-modal :data="$application" title="Are you sure you want to cancel this application?">
                            <div class="flex gap-2 justify-center">
                                <form action="{{ route('my-job-listings-application.destroy', $application) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" @click="showModal = false"
                                        class="text-xs bg-red-600 text-white px-5 py-2.5 rounded hover:bg-red-800 transition-all">
                                        Yes, I'm sure
                                    </button>
                                </form>
                                <button @click="showModal = false"
                                    class="text-xs ms-3 px-5 py-2.5 bg-dark-blue/70 text-white rounded hover:bg-dark-blue transition-all">
                                    No, cancel
                                </button>
                            </div>
                        </x-modal>
                        <a href="{{ route('job-listings.show', $application->jobListing) }}">
                            <x-button type="button">Show Details</x-button>
                        </a>
                    </div>
                </div>
            </x-card>
        @empty
            <div class="mt-10 flex flex-col gap-4 items-center">
                <div>No Job Application found..</div>
                <a href="{{ route('job-listings.index') }}">
                    <x-button type="button">Browse Jobs</x-button>
                </a>
            </div>
        @endforelse

        {{ $applications->links('components.pagination') }}
    </div>
@endsection
