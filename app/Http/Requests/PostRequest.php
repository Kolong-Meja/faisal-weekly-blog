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
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['required', 'string', 'max:255'],
            'meta_title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'keywords' => ['required', 'string']
        ];
    }

    /**
    * Prepare the data for validation.
    */
    protected function prepareForValidation(): void
    {
        $merge = [];

        // jika data slug tidak null, maka akan diubah menjadi slug yang sesungguhnya.
        if ($this->has('slug')) {
            $merge['slug'] = Str::slug($this->get('slug')); 
        }

        $this->merge($merge);
    }

    /**
    * Get an error message for the defined validation rules.
    */
    public function messages(): array {
        return [
            'title.required' => 'Title is required, cannot be empty!',
            'sub_title.required' => 'Sub title is required, cannot be empty!',
            'meta_title.required' => 'Meta title is required, cannot be empty!',
            'slug.required' => 'Slug is required, cannot be empty!',
            'content.required' => 'Content is required, cannot be empty!',
            'keywords.required' => 'Keywords is required, cannot be empty!'
        ];
    }
}
