@extends('layouts.app')

@section('content')
    <x-card class="p-4 pb-20 w-[500px] mx-auto my-[90px]">
        <h1 class="text-center text-2xl text-dark-blue font-semibold">
            Sign in to your account
        </h1>

        <form action="{{ route('auth.store') }}" method="POST" class="mt-10">
            @csrf

            <div class="flex flex-col">
                <x-text-input icon="user" placeholder="Email" name="email" value="{{ old('email') }}" form-ref="filters"
                    class="h-12 mb-1 {{ $errors->has('email') ? 'border-red-600' : 'border-white-coffee' }}" />
                @error('email')
                    <div class="text-red-600 text-xs">{{ $message }}</div>
                @enderror

                <x-text-input icon="key" placeholder="Password" type="password" name="password" value=""
                    form-ref="filters"
                    class="h-12 mt-3 mb-1 {{ $errors->has('password') ? 'border-red-600' : 'border-white-coffee' }}" />
                @error('password')
                    <div class="text-red-600 text-xs">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between mt-3 mb-5">
                <div class="flex gap-2 items-center">
                    <input type="checkbox" name="remember" class="rounded-sm border border-dark-blue" />
                    <label for="remember" class="text-sm text-dark-blue">Remember me</label>
                </div>
                <a href="" class="text-sm text-dark-blue border-b border-b-transparent hover:border-b-dark-blue">
                    Forgot password
                </a>
            </div>

            <div class="flex flex-col gap-5">
                <x-button type="submit" class="text-white py-3">Login</x-button>
                <div class="flex justify-center text-sm gap-2">
                    <p>Don't have an account?</p>
                    <a href="" class="text-dark-blue border-b border-b-transparent hover:border-b-dark-blue">
                        Register
                    </a>
                </div>
            </div>

        </form>
    </x-card>
@endsection
