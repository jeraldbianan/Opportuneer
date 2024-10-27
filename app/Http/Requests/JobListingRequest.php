<?php

namespace App\Http\Requests;

use App\Models\JobListing;
use Illuminate\Foundation\Http\FormRequest;

class JobListingRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric|min:5000',
            'experience' => 'required|in:' . implode(',', JobListing::$experience),
            'category' => 'required|in:' . implode(',', JobListing::$category),
            'type' => 'required|in:' . implode(',', JobListing::$type),
            'tags' => 'required|string',
        ];
    }
}
