@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-4xl text-white">Create Your Employer Profile</h2>
        <p class="font-normal text-base text-white">Share your vision and connect with top talent.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'Create Employer Account' => '#',
    ]" class="mb-4 mt-10" />

    <x-card>
        <form x-data="" x-ref="common-filters" action="{{ route('employer.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="company_name">Company Name</x-label>
                <x-text-input icon="building" type="text" placeholder="Company Name" name="company_name"
                    value="{{ old('company_name') }}"
                    class="h-12 mb-2 {{ $errors->has('company_name') ? '!border-red-600' : '!border-white-coffee' }}"
                    form-ref="common-filters" />
            </div>

            <div class="mt-5">
                <label for="logo" class="text-sm">Company Logo</label>
                <x-text-input type="file" name="logo"
                    class="h-12 mt-2 mb-2 {{ $errors->has('logo') ? '!border-red-600' : '!border-white-coffee' }}"
                    form-ref="common-filters" />
            </div>

            <x-button type="submit" class="mt-10">Create</x-button>
        </form>
    </x-card>
@endsection
