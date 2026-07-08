<?php

namespace App\Http\Requests\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
                'string',
                'max:30',
                'unique:products,code',
            ],

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'total_stock' => [
                'required',
                'integer',
                'min:1',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'category',
            'code' => 'product code',
            'name' => 'product name',
            'description' => 'description',
            'total_stock' => 'total stock',
            'available_stock' => 'available stock',
            'image' => 'product image',
        ];
    }
}