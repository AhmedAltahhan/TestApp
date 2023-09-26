<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuestionRequest extends FormRequest
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
            'question' => ['nullable', 'exists:questions,id'],
            'title' => ['required_without:test', Rule::unique('questions', 'title')->ignore($this->question)],
            'correct_answer' => ['required'],
            'test_id'=>['required'],
            'other_answer' => ['nullable'],
        ];
    }
}
