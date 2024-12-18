@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Find your dream job</h2>
        <p class="font-normal text-base text-white">Looking for jobs? Browse the jobs list now</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
    ]" class="mb-4 mt-10" />

    <div class="flex flex-col gap-6" x-data="">
        <x-card class="w-full">
            <form x-ref="filters" action="{{ route('job-listings.index') }}" method="GET">
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex col-span-1 gap-1">
                        <div class="w-full">
                            <x-label for="keyword">Keyword</x-label>
                            <x-text-input icon="search" placeholder="Search job title or keyword" name="keyword"
                                value="{{ request('keyword') }}" form-ref="filters" />
                        </div class="w-full">

                        <div class="w-full">
                            <x-label for="location">Location</x-label>
                            <x-text-input icon="location" placeholder="Location" name="location"
                                value="{{ request('location') }}" form-ref="filters" />
                        </div>
                    </div>

                    <div class="flex col-span-1 gap-1">
                        <div class="w-full">
                            <x-label for="min_salary">Minimum Salary</x-label>
                            <x-text-input icon="money" placeholder="Minimum Salary" name="min_salary"
                                value="{{ request('min_salary') }}" form-ref="filters" />
                        </div>

                        <div class="w-full">
                            <x-label for="max_salary">Maximum Salary</x-label>
                            <x-text-input icon="money" placeholder="Maximum Salary" name="max_salary"
                                value="{{ request('max_salary') }}" form-ref="filters" />
                        </div>
                    </div>

                    <div>
                        <div class="mb-2 font-semibold text-sm">Experience</div>
                        <x-radio-group name="experience" :options="array_combine(
                            array_map('ucfirst', \App\Models\JobListing::$experience),
                            \App\Models\JobListing::$experience,
                        )"></x-radio-group>
                    </div>

                    <div>
                        <div class="mb-2 font-semibold text-sm">Categories</div>
                        <x-radio-group name="category" :options="\App\Models\JobListing::$category"></x-radio-group>
                    </div>

                    <div>
                        <div class="mb-2 font-semibold text-sm">Job Type</div>
                        <x-radio-group name="type" :options="\App\Models\JobListing::$type"></x-radio-group>
                    </div>

                    <div class="flex justify-end items-center">
                        <x-button type="submit" class="h-10 w-28 text-xs text-white">Find Jobs</x-button>
                    </div>
                </div>
            </form>
        </x-card>

        @if ($jobs->count())
            @foreach ($jobs as $job)
                <x-card class="hover:shadow-lg">
                    <x-job-card :$job>
                        <a href="{{ route('job-listings.show', $job) }}">
                            <x-button type="button">Show Details</x-button>
                        </a>
                    </x-job-card>
                </x-card>
            @endforeach
        @else
            <div class="flex justify-center mt-10">
                <p class="text-lg text-dark-blue">No jobs found</p>
            </div>
        @endif
    </div>
    <div class="mt-10 mb-[90px]">
        {{ $jobs->links('components.pagination') }}
    </div>
@endsection
