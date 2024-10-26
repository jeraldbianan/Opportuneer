@extends('layouts.app')

@section('masthead')
    <x-masthead-banner>
        <h2 class="font-montserrat font-semibold text-5xl text-white">Post Your Job Opening</h2>
        <p class="font-normal text-base text-white">Find the right talent to grow your team today.</p>
    </x-masthead-banner>
@endsection

@section('content')
    <x-breadcrumbs :links="[
        'My Job Listings' => route('my-job-listings.index'),
        'Post a Job' => '#',
    ]" class="mb-4 mt-10" />

    <div class="flex justify-center mb-[90px]">
        <x-card class="max-w-[800px] w-full">
            <form x-data="{
                tags: '{{ old('tags', '') }}'.split(',').filter(tag => tag.trim() !== ''),
                tagInput: ''
            }" @submit.prevent="$refs.jobPostFilters.submit()" x-ref="jobPostFilters"
                action="{{ route('my-job-listings.store') }}" method="POST" class="w-full">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-label for="title">Title</x-label>
                        <x-text-input type="text" name="title" placeholder="Title"
                            class="h-12 w-full mt-2 mb-2 {{ $errors->has('title') ? '!border-red-600' : '!border-white-coffee' }}"
                            form-ref="job-post-filters" />
                    </div>

                    <div>
                        <x-label for="location">Location</x-label>
                        <x-text-input type="text" name="location" placeholder="Location"
                            class="h-12 w-full mt-2 mb-2 {{ $errors->has('location') ? '!border-red-600' : '!border-white-coffee' }}"
                            form-ref="job-post-filters" />
                    </div>

                    <div class="col-span-2">
                        <x-label for="description">Description</x-label>
                        <x-text-input type="textarea" name="description" placeholder="Description"
                            class="{{ $errors->has('description') ? '!border-red-600' : '!border-white-coffee' }}"
                            form-ref="job-post-filters" />
                    </div>

                    <div>
                        <x-label for="salary">Salary</x-label>
                        <x-text-input type="number" name="salary" placeholder="Salary"
                            class="h-12 w-full mt-2 mb-2 {{ $errors->has('salary') ? '!border-red-600' : '!border-white-coffee' }}"
                            form-ref="job-post-filters" />
                    </div>

                    <div>
                        <div class="mb-2 font-semibold text-sm">Experience</div>
                        <x-radio-group name="experience" :value="old('experience')" :all-option="false"
                            :options="array_combine(
                                array_map('ucfirst', \App\Models\JobListing::$experience),
                                \App\Models\JobListing::$experience,
                            )"></x-radio-group>
                    </div>

                    <div>
                        <div class="mb-2 font-semibold text-sm">Categories</div>
                        <x-radio-group name="category" :value="old('category')" :all-option="false"
                            :options="\App\Models\JobListing::$category"></x-radio-group>
                    </div>

                    <div>
                        <div class="mb-2 font-semibold text-sm">Job Type</div>
                        <x-radio-group name="type" :value="old('type')" :all-option="false" :options="\App\Models\JobListing::$type"></x-radio-group>
                    </div>

                    <div class="col-span-2">
                        <x-label for="tags">Tags</x-label>
                        <x-text-input type="text" name="tags"
                            placeholder="Input a tag and press Enter, Maximum of 5 tags" form-ref="job-post-filters"
                            class="h-12 w-full mt-2 mb-2" x-model="tagInput"
                            @keydown.enter.prevent="
                            if(tagInput.trim() !== '' && !tags.includes(tagInput.trim()) && tags.length < 5) {
                            tags.push(tagInput.trim());
                            $refs['input-tags'].value = ''
                            }" />

                        <div class="flex flex-wrap mt-2 gap-2">
                            <template x-for="(tag, index) in tags" :key="index">
                                <span class="bg-dark-blue text-white text-xs rounded-full px-3 py-1 flex items-center">
                                    <span x-text="tag"></span>
                                    <button type="button" class="ml-2" @click="tags.splice(index, 1)">
                                        &times;
                                    </button>
                                </span>
                            </template>
                        </div>
                    </div>

                    <input type="hidden" name="tags" :value="tags.join(',')">

                    <div class="col-span-2">
                        <x-button type="submit" class="w-full h-12 !text-base">Create Job</x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
@endsection
