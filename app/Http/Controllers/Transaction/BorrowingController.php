<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with([
            'department',
            'user',
            'details.product'
        ])
        ->latest()
        ->paginate(10);

        return view('transactions.borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show(Borrowing $borrowing)
    {
        //
    }

    public function edit(Borrowing $borrowing)
    {
        //
    }

    public function update(Borrowing $borrowing)
    {
        //
    }

    public function destroy(Borrowing $borrowing)
    {
        //
    }

    public function confirmReturn(Borrowing $borrowing)
    {
        //
    }
}