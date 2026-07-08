<?php

namespace App\Http\Requests\Transactions;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules.
     */
    public function rules(): array
    {
        return [

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'borrower_name' => [
                'required',
                'string',
                'max:100',
            ],

            'purpose' => [
                'required',
                'string',
                'max:255',
            ],

            'borrow_date' => [
                'required',
                'date',
            ],

            'return_date' => [
                'required',
                'date',
                'after_or_equal:borrow_date',
            ],

            'notes' => [
                'nullable',
                'string',
            ],

            'products' => [
                'required',
                'array',
                'min:1',
            ],

            'products.*.product_id' => [
                'required',
                'exists:products,id',
            ],

            'products.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],

        ];
    }

    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [

            'department_id' => 'department',

            'borrower_name' => 'borrower name',

            'purpose' => 'purpose',

            'borrow_date' => 'borrow date',

            'return_date' => 'return date',

            'notes' => 'notes',

            'products' => 'borrowed items',

            'products.*.product_id' => 'product',

            'products.*.quantity' => 'quantity',

        ];
    }
}