<?php

namespace App\Http\Requests\Masters;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')->ignore($this->category),
            ],

            'description' => [
                'nullable',
                'string',
            ],

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'category name',
            'description' => 'description'
        ];
    }
}