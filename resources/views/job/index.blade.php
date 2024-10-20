<x-layout>
    <div class="flex flex-col gap-6">
        @foreach ($jobs as $job)
            <x-job-card :$job>
                <x-link-button :href="route('job-listings.show', $job)">
                    Show Details
                </x-link-button>
            </x-job-card>
        @endforeach
    </div>
</x-layout>
