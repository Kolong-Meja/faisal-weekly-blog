<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'email' => ['required', 'email', 'email:rfc,dns'],
            'name' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:2500']
        ];
    }

    /**
     * Get an error message for the defined validation rules.
     */
    public function messages(): array {
        return [
            'email.required' => 'Email is required, cannot be empty!',
            'name.required' => 'Name is required, cannot be empty!',
            'content.required' => 'Feedback content is required, cannot be empty!'
        ];
    }
}
