<?php

namespace App\Http\Requests\Destination;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDestinationRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                Rule::unique('destinations')->ignore($this->id)
            ],
            'area' => 'required|string',
            'state' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'image' => 'sometimes|nullable|file|mimes:png,jpg',
            'phone' => 'required|string',
            'description' => 'required|string'
        ];
    }

    public function prepareForValidation() : array {
        return [
            'id' => $this->route('id')
        ];
    }
}
