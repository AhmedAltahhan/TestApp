<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'user' => ['nullable', 'exists:users,id'],
            'name' => ['required_without:user'],
            'email' => ['required_without:user', 'email',
                Rule::unique('users', 'email')->ignore($this->user)],
            'username'=>['required_without:user', 'string', 'max:13',
                Rule::unique('users', 'username')->ignore($this->user)],

        ];
    }
}
