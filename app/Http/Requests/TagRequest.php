<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TagRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:25'],
            'meta_title' => ['required', 'string', 'max:25'],
            'slug' => ['required', 'string', 'max:25']
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
            'title.required' => 'Tag title is required, cannot be empty!',
            'meta_title.required' => 'Tag meta title is required, cannot be empty!',
            'slug.required' => 'Tag slug is required, cannot be empty!'
        ];
    }
}
