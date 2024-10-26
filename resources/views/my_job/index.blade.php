@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Your Job Listings</h2>
        <p class="font-normal text-base text-white">Manage and review all active job posts in one place.</p>
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
