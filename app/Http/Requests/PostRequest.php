<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:200'],
            'meta_title' => ['required', 'string', 'max:50'],
            'slug' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string'],
            'keywords' => ['required', 'string']
        ];
    }

    /**
    * Prepare the data for validation.
    */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    /**
    * Get an error message for the defined validation rules.
    */
    public function messages(): array {
        return [
            'title.required' => 'Title is required, cannot be empty!',
            'description.required' => 'Description is required, cannot be empty!',
            'meta_title.required' => 'Meta title is required, cannot be empty!',
            'slug.required' => 'Slug is required, cannot be empty!',
            'content.required' => 'Content is required, cannot be empty!',
            'keywords.required' => 'Keywords is required, cannot be empty!'
        ];
    }
}
