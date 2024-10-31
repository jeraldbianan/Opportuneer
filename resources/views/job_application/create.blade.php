@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-4xl text-white">Step Into Your Next Career</h2>
        <p class="font-normal text-base text-white">Apply now and unlock the potential of this opportunity. Your journey to
            success starts here.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'Jobs' => route('job-listings.index'),
        $job->title => route('job-listings.show', $job),
        'Apply' => '#',
    ]" class="mb-4 mt-10" />


    <x-card class="mb-10">
        <x-job-card :$job />
    </x-card>

    <x-card class="mb-[90px]" aria-labelledby="Job-Application">
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>

        <form x-data="" x-ref="common-filters" action="{{ route('job-listings.application.store', $job) }}"
            method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="expected_salary">Expected Salary</x-label>
                <x-text-input icon="money" type="number" placeholder="Expected Salary" name="expected_salary"
                    value="{{ old('expected_salary') }}"
                    class="h-12 mb-2 {{ $errors->has('expected_salary') ? '!border-red-600' : '!border-white-coffee' }}"
                    form-ref="common-filters" />
            </div>

            <div class="mt-5">
                <label for="cv" class="text-sm">Attach your CV / Resume</label>
                <x-text-input type="file" name="cv"
                    class="h-12 mt-2 mb-2 {{ $errors->has('cv') ? '!border-red-600' : '!border-white-coffee' }}"
                    form-ref="common-filters" />
            </div>

            <x-button type="submit" class="mt-10 w-20">Apply</x-button>
        </form>
    </x-card>
@endsection
