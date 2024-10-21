<x-job-listing-banner>
    <h2 class="font-montserrat font-semibold text-5xl text-white">Find your dream job</h2>
    <p class="font-open-sans font-normal text-base text-white">Looking for jobs? Browse the jobs list now</p>
</x-job-listing-banner>

<x-layout>
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
    ]" class="mb-4 mt-10" />

    <div class="flex flex-col gap-6">
        <x-card class="w-full p-5">
            <form action="{{ route('job-listings.index') }}" method="GET">
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex col-span-1">
                        <div
                            class="flex items-center gap-2 max-w-[600px] w-full border border-r-0 border-white-coffee px-3 py-2 rounded-s-lg">
                            <x-icons.search class="top-5 left-3 w-6 h-6" />
                            <x-text-input placeholder="Search job title or keyword" name="keyword"
                                value="{{ request('keyword') }}" />
                        </div>

                        <div
                            class="flex justify-between gap-4 max-w-full w-full border border-white-coffee px-3 py-2 rounded-r-lg">
                            <div class="flex gap-2 items-center w-full">
                                <x-icons.location-icon class="top-5 left-3 w-6 h-6" />
                                <x-text-input placeholder="Location" name="location"
                                    value="{{ request('location') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="flex col-span-1">
                        <div
                            class="flex items-center gap-2 max-w-[600px] w-full border border-r-0 border-white-coffee px-3 py-2 rounded-s-lg">
                            <x-icons.money class="top-5 left-3 w-6 h-6" />
                            <x-text-input placeholder="Minimum Salary" name="min_salary"
                                value="{{ request('min_salary') }}" />
                        </div>

                        <div
                            class="flex justify-between gap-4 max-w-full w-full border border-white-coffee px-3 py-2 rounded-r-lg">
                            <div class="flex gap-2 items-center w-full">
                                <x-icons.money class="top-5 left-3 w-6 h-6" />
                                <x-text-input placeholder="Maximum Salary" name="max_salary"
                                    value="{{ request('max_salary') }}" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="mb-2 font-semibold font-open-sans text-sm">Experience</div>
                        <x-radio-group name="experience" :options="\App\Models\JobListing::$experience"></x-radio-group>
                    </div>

                    <div>
                        <div class="mb-2 font-semibold font-open-sans text-sm">Categories</div>
                        <x-radio-group name="category" :options="\App\Models\JobListing::$category"></x-radio-group>
                    </div>

                    <div class="col-span-2 flex justify-end">
                        <button type="submit"
                            class="py-2 w-32 bg-dark-blue/70 rounded text-white text-xs hover:bg-dark-blue transition-all">Find
                            Jobs</button>
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
                <p class="font-open-sans text-lg text-dark-blue">No jobs found</p>
            </div>
        @endif
    </div>

</x-layout>
