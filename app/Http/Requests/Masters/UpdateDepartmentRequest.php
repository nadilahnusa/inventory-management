<?php

namespace App\Http\Requests\Masters;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
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
                Rule::unique('departments')->ignore($this->department),
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ];
    }
}