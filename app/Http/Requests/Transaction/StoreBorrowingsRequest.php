<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'employee_id' => [
                'required',
                'max:30',
            ],

            'borrower_name' => [
                'required',
                'max:100',
            ],

            'purpose' => [
                'required',
                'string',
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

        ];
    }
}