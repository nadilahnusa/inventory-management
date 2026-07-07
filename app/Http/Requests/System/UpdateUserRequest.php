<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            ],

            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('users')->ignore($this->user),
            ],

            'role' => [
                'required',
                'exists:roles,name',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'name',
            'email' => 'email',
            'role' => 'role',
        ];
    }
}