@extends('layouts.app')

@section('content')
    <x-card class="pb-20 w-[500px] mx-auto my-[90px]">
        <h1 class="text-center text-2xl text-dark-blue font-semibold">
            Account Registration
        </h1>

        <form x-data="" x-ref="common-filters" action="{{ route('register.store') }}" method="POST"
            class="mt-10">
            @csrf

            @if (session('error'))
                <div role="alert" class="text-xs mt-8 mb-2 text-red-600 opacity-75">
                    {{ session('error') }}
                </div>
            @endif

            <section class="flex flex-col">
                <div>
                    <x-label for="firstname">Firstname</x-label>
                    <x-text-input icon="user" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}"
                        form-ref="common-filters"
                        class="h-12 mb-1 {{ $errors->has('firstname') ? '!border-red-600' : '!border-white-coffee' }}" />
                </div>

                <div>
                    <x-label for="lastname">Lastname</x-label>
                    <x-text-input icon="user" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}"
                        form-ref="common-filters"
                        class="h-12 mt-3 mb-1 {{ $errors->has('lastname') ? '!border-red-600' : '!border-white-coffee' }}" />
                </div>

                <div>
                    <x-label for="email">E-mail</x-label>
                    <x-text-input icon="mail" placeholder="Email" name="email" value="{{ old('email') }}"
                        form-ref="common-filters"
                        class="h-12 mt-3 mb-1 {{ $errors->has('email') ? '!border-red-600' : '!border-white-coffee' }}" />
                </div>

                <div>
                    <x-label for="password">Password</x-label>
                    <x-text-input icon="key" placeholder="Password" type="password" name="password" value=""
                        form-ref="common-filters"
                        class="h-12 mt-3 mb-1 {{ $errors->has('password') ? '!border-red-600' : '!border-white-coffee' }}" />
                </div>

                <div>
                    <x-label for="password_confirm">Confirm Password</x-label>
                    <x-text-input icon="key" placeholder="Confirm Password" type="password" name="password_confirm"
                        value="" form-ref="common-filters"
                        class="h-12 mt-3 mb-1 {{ $errors->has('password') ? '!border-red-600' : '!border-white-coffee' }}" />
                </div>
            </section>

            <div class="flex flex-col gap-5 mt-10">
                <x-button type="submit" class="text-white py-3">Register</x-button>
                <div class="flex justify-center text-sm gap-2">
                    <p>Already have an Account?</p>
                    <a href="{{ route('auth.create') }}"
                        class="text-dark-blue border-b border-b-transparent hover:border-b-dark-blue">
                        Login now!
                    </a>
                </div>
            </div>
        </form>
    </x-card>
@endsection
