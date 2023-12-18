<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
           'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:4096'],
           'owner' => ['required', 'string', 'max:255'],
           'url' => ['required', 'string'],
       ];
   }

    /**
    * Get an error message for the defined validation rules.
    */
   public function messages(): array {
       return [
           'image.required' => 'Image is required, cannot be empty!',
           'owner.required' => 'Owner of the image is required, cannot be empty!',
           'url.required' => 'URL of image is required, cannot be empty!'
       ];
   }
}
