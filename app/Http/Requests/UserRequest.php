<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            "name" => ["required", "string", "max:255"],
            "username" => ["required", "string", "max:255"],
            "email" => ['required', 'string', 'lowercase', 'email', 'email:rfc, dns', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            "password" => ["required", "string", Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ];
    }
    
     /**
     * Get an error message for the defined validation rules.
     */
    public function messages(): array {
        return [
            'name.required' => 'Name is required, cannot be empty!',
            'email.required' => 'Email is required, cannot be empty!',
            'password.required' => 'Password is required, cannot be empty!',
            'role.required' => 'Role is required, cannot be empty!'
        ];
    }
}
