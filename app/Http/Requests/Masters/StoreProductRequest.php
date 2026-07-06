<?php

namespace App\Http\Requests\Master;

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

            'serial_number' => [
                'nullable',
                'string',
                'max:100',
                'unique:products,serial_number',
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

            'available_stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'location' => [
                'required',
                'string',
                'max:100',
            ],

            'condition' => [
                'required',
                'in:Good,Minor Damage,Damaged,Maintenance,Lost',
            ],

            'status' => [
                'required',
                'in:Available,Borrowed,Maintenance,Disposed',
            ],

            'image' => [
                'nullable',
                'image',
                'max:2048',
            ],

        ];
    }
}