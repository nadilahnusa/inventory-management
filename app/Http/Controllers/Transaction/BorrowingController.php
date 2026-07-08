<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Requests\Transaction\StoreBorrowingsRequest;
use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $borrowings = Borrowing::with([
            'department',
            'user',
        ])
        ->withCount('details')
        ->when($request->search, function ($query, $search) {

            $query->where(function ($q) use ($search) {

                $q->where('borrowing_code', 'like', "%{$search}%")
                    ->orWhere('borrower_name', 'like', "%{$search}%")
                    ->orWhereHas('department', function ($department) use ($search) {

                        $department->where('name', 'like', "%{$search}%");

                    });

            });

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('transaction.borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('name')->get();

        $products = Product::with('category')
            ->orderBy('name')
            ->get();

        $productData = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'code' => $product->code,
                'name' => $product->name,
                'stock' => $product->available_stock,
                'category' => $product->category->name,
            ];
        });

        return view(
            'transaction.borrowings.create',
            compact(
                'departments',
                'products',
                'productData'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreBorrowingsRequest $request)
    {
        DB::transaction(function () use ($request) {

            // Generate Borrowing Code
            $lastBorrowing = Borrowing::latest('id')->first();

            $nextNumber = $lastBorrowing
                ? ((int) substr($lastBorrowing->borrowing_code, 3)) + 1
                : 1;

            $borrowingCode = 'BRW' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            // Create Borrowing
            $borrowing = Borrowing::create([

                'borrowing_code' => $borrowingCode,

                'user_id' => auth()->id(),

                'department_id' => $request->department_id,

                'borrower_name' => $request->borrower_name,

                'purpose' => $request->purpose,

                'borrow_date' => $request->borrow_date,

                'return_date' => $request->return_date,

                'status' => 'Borrowed',

                'notes' => $request->notes,

            ]);

            foreach ($request->products as $item) {

                $product = Product::findOrFail($item['product_id']);

                // Cek stok
                if ($product->available_stock < $item['quantity']) {

                    throw ValidationException::withMessages([
                        'products' => "{$product->name} does not have enough stock.",
                    ]);

                }

                // Simpan detail
                $borrowing->details()->create([

                    'product_id' => $product->id,

                    'quantity' => $item['quantity'],

                ]);

                // Kurangi stok
                $product->decrement(
                    'available_stock',
                    $item['quantity']
                );
            }

        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Borrowing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        $borrowing->load([
            'department',
            'user',
            'details.product',
        ]);

        return view(
            'transaction.borrowings.show',
            compact('borrowing')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        $departments = Department::orderBy('name')->get();

        $products = Product::orderBy('name')->get();

        $borrowing->load('details.product');

        return view(
            'transaction.borrowings.edit',
            compact(
                'borrowing',
                'departments',
                'products'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Borrowing $borrowing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        //
    }

    /**
     * Confirm item return.
     */
    public function confirmReturn(Borrowing $borrowing)
    {
        DB::transaction(function () use ($borrowing) {

            foreach ($borrowing->details as $detail) {

                $detail->product->increment(
                    'available_stock',
                    $detail->quantity
                );

            }

            $borrowing->update([

                'status' => 'Returned',

                'actual_return_date' => now(),

            ]);

        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Borrowing returned successfully.');
    }
}