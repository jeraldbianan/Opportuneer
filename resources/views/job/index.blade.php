<x-job-listing-banner>
    <h2 class="font-montserrat font-semibold text-5xl text-white">Find your dream job</h2>
    <p class="font-normal text-base text-white">Looking for jobs? Browse the jobs list now</p>
</x-job-listing-banner>

<x-layout>
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
    ]" class="mb-4 mt-10" />

    <div class="flex flex-col gap-6" x-data="">
        <x-card class="w-full p-5">
            <form x-ref="filters" action="{{ route('job-listings.index') }}" method="GET">
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex col-span-1 gap-1">
                        <x-text-input icon="search" placeholder="Search job title or keyword" name="keyword"
                            value="{{ request('keyword') }}" form-ref="filters" />

                        <x-text-input icon="location" placeholder="Location" name="location"
                            value="{{ request('location') }}" form-ref="filters" />
                    </div>

                    <div class="flex col-span-1 gap-1">
                        <x-text-input icon="money" placeholder="Minimum Salary" name="min_salary"
                            value="{{ request('min_salary') }}" form-ref="filters" />

                        <x-text-input icon="money" placeholder="Maximum Salary" name="max_salary"
                            value="{{ request('max_salary') }}" form-ref="filters" />
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
                        <x-button type="submit">Find Jobs</x-button>
                    </div>
                </div>
            </form>
        </x-card>

        @if ($jobs->count())
            @foreach ($jobs as $job)
                <x-card class="p-4 hover:shadow-lg">
                    <x-job-card :$job>
                        <x-link-button :href="route('job-listings.show', $job)">
                            Show Details
                        </x-link-button>
                    </x-job-card>
                </x-card>
            @endforeach
        @else
            <div class="flex justify-center mt-10">
                <p class="text-lg text-dark-blue">No jobs found</p>
            </div>
        @endif
    </div>

</x-layout>
