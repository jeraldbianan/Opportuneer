@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-4xl text-white">Explore Your Next Opportunity</h2>
        <p class="font-normal text-base text-white">Learn how this role fits your career goals and skill set. Your next move
            begins here.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
        $job->title => '#',
    ]" class="mb-4 mt-10" />

    <x-card>
        <x-job-card :$job>

            @auth
                @can('apply', $job)
                    <a href="{{ route('job-listings.application.create', $job) }}">
                        <x-button type="button" class="w-20">Apply</x-button>
                    </a>
                @else
                    @if (Auth::user()->employer && Auth::user()->employer->id === $job->employer_id)
                        <div class="text-center text-base font-medium text-dark-blue">Owned</div>
                    @else
                        <div class="text-center text-base font-medium text-dark-blue">You already applied to this job</div>
                    @endif
                @endcan
            @else
                <a href="{{ route('job-listings.application.create', $job) }}">
                    <x-button type="button" class="w-20">Apply</x-button>
                </a>
            @endauth
        </x-job-card>
    </x-card>

    <x-card class="mb-[90px] mt-10">
        <h4 class="mb-4 text-lg font-medium font-montserrat">
            More Jobs at <span class="font-bold">{{ $job->employer->company_name }}</span>
        </h4>
        <div class="text-sm">
            @foreach ($jobListings as $otherJob)
                <div class="mb-4 flex justify-between items-center">
                    <div>
                        <div>
                            <a href="{{ route('job-listings.show', $otherJob) }}"
                                class="text-sm font-semibold text-dark-blue border-b border-b-transparent hover:border-b-dark-blue">{{ $otherJob->title }}</a>
                        </div>
                        <div class="text-xs mt-2">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-sm">₱{{ number_format($otherJob->salary) }}</div>
                </div>
            @endforeach
            {{ $jobListings->links('components.pagination') }}
        </div>
    </x-card>
@endsection
