<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3',
            'role' => [
                'required',
                Rule::in([UserRoleEnum::TUTOR->value, UserRoleEnum::STUDENT->value]),
            ],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'A student with this email address already exists',
        ];
    }
}
