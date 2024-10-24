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

    <x-card class="mb-[90px]">
        <h2 class="mb-4 text-lg font-medium">
            You Job Application
        </h2>

        <form x-data="" x-ref="job-application-filters"
            action="{{ route('job-listings.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-text-input icon="money" placeholder="Expected Salary" name="expected_salary"
                value="{{ old('expected_salary') }}"
                class="h-12 mb-2 {{ $errors->has('expected_salary') ? '!border-red-600' : '!border-white-coffee' }}"
                form-ref="job-application-filters" />
            @error('expected_salary')
                <div class="text-red-600 text-xs">{{ $message }}</div>
            @enderror

            <x-text-input type="file" name="cv"
                class="h-12 mt-2 mb-2 {{ $errors->has('cv') ? '!border-red-600' : '!border-white-coffee' }}"
                form-ref="job-application-filters" />
            @error('cv')
                <div class="text-red-600 text-xs">{{ $message }}</div>
            @enderror

            <x-button type="submit" class="mt-10 w-20">Apply</x-button>
        </form>
    </x-card>
@endsection
