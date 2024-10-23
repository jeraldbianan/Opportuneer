@extends('layouts.app')

@section('content')
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
        $job->title => route('job-listings.show', $job),
        'Apply' => '#',
    ]" class="mb-4 mt-10" />


    <x-card class="mb-10">
        <x-job-card :$job />
    </x-card>

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            You Job Application
        </h2>

        <form x-data="" x-ref="job-application-filters"
            action="{{ route('job-listings.application.store', $job) }}" method="POST">
            @csrf

            <x-text-input icon="money" type="number" placeholder="Expected Salary" name="expected_salary"
                value="{{ old('expected_salary') }}" form-ref="job-application-filters" />

            <x-button type="submit" class="mt-10 w-20">Apply</x-button>
        </form>
    </x-card>
@endsection
