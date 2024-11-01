@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Edit Your Profile</h2>
        <p class="font-normal text-base text-white">Update your personal information and preferences.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'Edit Profile' => '#',
    ]" class="mb-8 mt-10" />

    <x-card>
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data"
            aria-labelledby="edit-profile-form" x-data="{
                avatarPreview: '{{ $user->avatar ? asset($user->avatar) : asset('https://raw.githubusercontent.com/Ashwinvalento/cartoon-avatar/master/lib/images/male/45.png') }}',
                showIcon: {{ $user->avatar ? 'false' : 'true' }},
                handleFileChange(event) {
                    const [file] = event.target.files;
                    if (file) {
                        this.avatarPreview = URL.createObjectURL(file);
                        this.showIcon = false;
                    }
                }
            }">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="flex justify-center items-center mt-6 col-span-2">
                    <label for="avatar" class="cursor-pointer" aria-label="Upload Avatar">
                        <div class="h-20 w-20 bg-gray-300 rounded-full flex justify-center items-center">
                            <img x-show="!showIcon" :src="avatarPreview" alt="Avatar Preview"
                                class="h-20 w-20 rounded-full object-cover">
                            <img x-show="showIcon" class="w-20 h-20 rounded-full cursor-pointer"
                                src="https://raw.githubusercontent.com/Ashwinvalento/cartoon-avatar/master/lib/images/male/45.png"
                                alt="Default Avatar">
                        </div>
                    </label>
                    <input type="file" name="avatar" id="avatar" class="hidden" aria-describedby="avatar-description"
                        @change="handleFileChange($event)" />
                    <span id="avatar-description" class="sr-only">Choose a new avatar image</span>
                </div>

                <script>
                    function handleFileChange(event) {
                        const [file] = event.target.files;
                        if (file) {
                            this.avatarPreview = URL.createObjectURL(file);
                            this.showIcon = false;
                        }
                    }
                </script>

                <div>
                    <label for="name">Name</label>
                    <x-text-input type="text" name="name" id="name" placeholder="Name"
                        value="{{ old('name', $user->name) }}"
                        class="h-12 w-full mt-2 mb-2 {{ $errors->has('name') ? '!border-red-600' : '!border-white-coffee' }}"
                        autofocus aria-required="true" />
                </div>

                <div>
                    <label for="email">Email</label>
                    <x-text-input type="email" name="email" id="email" placeholder="Email"
                        value="{{ old('email', $user->email) }}"
                        class="h-12 w-full mt-2 mb-2 {{ $errors->has('email') ? '!border-red-600' : '!border-white-coffee' }}"
                        aria-required="true" />
                </div>

                <div>
                    <label for="password">Password</label>
                    <x-text-input type="password" name="password" id="password" placeholder="Password"
                        class="h-12 w-full mt-2 mb-2 {{ $errors->has('password') ? '!border-red-600' : '!border-white-coffee' }}"
                        aria-required="true" />
                </div>

                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <x-text-input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm Password"
                        class="h-12 w-full mt-2 mb-2 {{ $errors->has('password_confirmation') ? '!border-red-600' : '!border-white-coffee' }}"
                        aria-required="true" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button type="submit" aria-label="Update Profile">
                    Update Profile
                </x-button>
            </div>
        </form>
    </x-card>
@endsection
