@extends('layouts.app')

@section('hero')
    <x-hero>
        <div class="relative h-auto max-h-full w-full max-w-[622px]">
            <img src="images/hero-image.png" alt="Hero image" class="object-contain">
            <div
                class="absolute left-[58px] top-[132px] flex h-[133px] w-[130px] flex-col items-center justify-center rounded-lg bg-white">
                <p class="font-open-sans text-3xl font-extrabold text-dark-blue">
                    {{ $jobs->count() }}
                </p>
                <p class="mt-2 font-open-sans text-base font-semibold text-black">
                    Job Offer{{ $jobs->count() > 1 ? 's' : '' }}
                </p>
            </div>
        </div>
        <div class="flex flex-col w-full max-w-[466px]">
            <h1 class="font-montserrat text-4xl font-semibold !leading-[130%]">
                Your <span class="font-black text-dark-blue">Dream Job</span> is Just
                a Search Away
            </h1>
            <p class="mt-[35px] font-open-sans text-base !leading-[160%]">
                Discover top opportunities tailored to your skills and aspirations.
                Start applying and take the next step in your career today!
            </p>

            <form x-data="" x-ref="home-filters" action="{{ route('job-listings.index') }}" method="GET">
                <div class="mt-12 flex gap-2">
                    <x-text-input icon="search" placeholder="Keyword" name="keyword" value="{{ request('keyword') }}"
                        form-ref="home-filters" />

                    <x-text-input icon="location" placeholder="Location" name="location" value="{{ request('location') }}"
                        form-ref="home-filters" />
                    <x-button type="submit" class="px-4">
                        <x-icons.submit-arrow class="h-6 w-6 text-white" />
                    </x-button>
                </div>
            </form>
        </div>
    </x-hero>
@endsection

@section('content')
    <x-hero2 />

    <section class="flex flex-col items-center py-[90px]">
        <h3 class="font-montserrat text-3xl font-bold">Latest Jobs</h3>
        <div class="mt-10 grid w-full max-w-container grid-cols-3 gap-[30px]">
            @foreach ($jobs->take(6) as $job)
                <x-home-job-card :$job />
            @endforeach
        </div>
    </section>
@endsection
