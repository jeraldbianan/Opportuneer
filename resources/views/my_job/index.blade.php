@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Post Your Job Opening</h2>
        <p class="font-normal text-base text-white">Find the right talent to grow your team today.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'My Job Listings' => '#',
    ]" class="mb-4 mt-10" />

    <x-card>
        My Job Listings!
    </x-card>
@endsection
