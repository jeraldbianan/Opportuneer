@extends('layouts.app')

@section('content')
    <x-card class="pb-20 w-[500px] mx-auto my-[90px]">
        <h1 class="text-center text-2xl text-dark-blue font-semibold">
            Sign in to your account
        </h1>

        <form x-data="" x-ref="login-filters" action="{{ route('auth.store') }}" method="POST" class="mt-10">
            @csrf

            @if (session('error'))
                <div role="alert" class="text-xs mt-8 mb-2 text-red-600 opacity-75">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex flex-col">
                <x-text-input icon="user" placeholder="Email" name="email" value="{{ old('email') }}"
                    form-ref="login-filters"
                    class="h-12 mb-1 {{ $errors->has('email') ? '!border-red-600' : '!border-white-coffee' }}" />

                <x-text-input icon="key" placeholder="Password" type="password" name="password" value=""
                    form-ref="login-filters"
                    class="h-12 mt-3 mb-1 {{ $errors->has('password') ? '!border-red-600' : '!border-white-coffee' }}" />
            </div>

            <div class="flex justify-between mt-3 mb-10">
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
