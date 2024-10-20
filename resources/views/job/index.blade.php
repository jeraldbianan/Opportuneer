<x-layout>
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
    ]" class="mb-4" />
    <div class="flex flex-col gap-6">
        @foreach ($jobs as $job)
            <x-card-horizontal class="p-4">
                <x-job-card :$job>
                    <x-link-button :href="route('job-listings.show', $job)">
                        Show Details
                    </x-link-button>
                </x-job-card>
            </x-card-horizontal>
        @endforeach
    </div>
</x-layout>
