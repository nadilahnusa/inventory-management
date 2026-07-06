<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'code' => [
                'required',
                'max:30',
                Rule::unique('products')->ignore($this->product),
            ],

            'serial_number' => [
                'nullable',
                'max:100',
                Rule::unique('products')->ignore($this->product),
            ],

            'name' => [
                'required',
                'max:100',
            ],

            'description' => [
                'nullable',
            ],

            'total_stock' => [
                'required',
                'integer',
                'min:1',
            ],

            'available_stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'location' => [
                'required',
                'max:100',
            ],

            'condition' => [
                'required',
            ],

            'status' => [
                'required',
            ],

            'image' => [
                'nullable',
                'image',
                'max:2048',
            ],

        ];
    }
}