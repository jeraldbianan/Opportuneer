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
                <x-job-card :$job></x-job-card>
                <div class="flex justify-between">
                    <p class="text-sm mt-5">Number of Applicants: {{ $job->jobListingApplications->count() }}</p>

                    @if ($job->deleted_at === null)
                        <div class="flex flex-col gap-2">
                            <div class="flex gap-2">
                                <a href="{{ route('my-job-listings.edit', $job) }}">
                                    <x-button type="button">Edit</x-button>
                                </a>
                                <x-modal :data="$job" title="Are you sure you want to cancel this application?">
                                    <div class="flex gap-2 justify-center">
                                        <form action="{{ route('my-job-listings.destroy', $job) }}" method="POST">
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
                            </div>
                            <a href="{{ route('my-job-listings.show', $job) }}">
                                <x-button type="button" class="w-full">
                                    View Applicants
                                </x-button>
                            </a>
                        </div>
                    @endif

                </div>
            </x-card>
        @empty
            <p class="text-base text-dark-blue mt-10 text-center">You have not posted a job yet...</p>
        @endforelse
    </div>

    <div class="mt-10 mb-[90px] w-full">
        {{ $jobs->links('components.pagination') }}
    </div>
@endsection
