<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateArticleRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:150'],
            'meta_title' => ['required', 'string', 'max:150'],
            'slug' => ['required', 'string', 'max:60'],
            'description' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', 'string'],
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
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Name is required',
            'meta_title.required' => 'Meta title is required',
            'slug.required' => 'Slug is required',
            'description.required' => 'Description is required',
            'meta_description.required' => 'Meta description is required',
            'content.required' => 'Content is required',
            'status.required' => 'Status is required',
        ];
    }
}
