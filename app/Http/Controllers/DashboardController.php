<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Department;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Summary Cards
        |--------------------------------------------------------------------------
        */

        $totalProducts = Product::count();

        $availableProducts = Product::sum('available_stock');

        $borrowedProducts = Borrowing::where(
            'status',
            'Borrowed'
        )->count();

        $totalBorrowings = Borrowing::count();


        /*
        |--------------------------------------------------------------------------
        | Inventory Summary
        |--------------------------------------------------------------------------
        */

        $returnedBorrowings = Borrowing::where(
            'status',
            'Returned'
        )->count();

        $overdueBorrowings = Borrowing::where(
            'status',
            'Overdue'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Monthly Borrowing Chart
        |--------------------------------------------------------------------------
        */

        $monthlyChart = Borrowing::selectRaw(
                'MONTH(borrow_date) as month,
                COUNT(*) as total'
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {

                return [

                    'month' => Carbon::create()
                        ->month($item->month)
                        ->format('M'),

                    'total' => $item->total,

                ];

            });


        /*
        |--------------------------------------------------------------------------
        | Status Chart
        |--------------------------------------------------------------------------
        */

        $statusChart = [

            'Borrowed' => $borrowedProducts,

            'Returned' => $returnedBorrowings,

            'Overdue' => $overdueBorrowings,

        ];


        /*
        |--------------------------------------------------------------------------
        | Recent Borrowings
        |--------------------------------------------------------------------------
        */

        $recentBorrowings = Borrowing::with([
                'department',
                'details.product',
            ])
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Top Borrowed Products
        |--------------------------------------------------------------------------
        */

        $topProducts = BorrowingDetail::selectRaw(
                'product_id,
                SUM(quantity) as total'
            )
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total')
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Low Stock Products
        |--------------------------------------------------------------------------
        */

        $lowStockProducts = Product::with('category')
            ->where(
                'available_stock',
                '<=',
                5
            )
            ->orderBy('available_stock')
            ->take(5)
            ->get();


        return view(
            'dashboard.index',
            compact(

                'totalProducts',

                'availableProducts',

                'borrowedProducts',

                'totalBorrowings',

                'returnedBorrowings',

                'overdueBorrowings',

                'monthlyChart',

                'statusChart',

                'recentBorrowings',

                'topProducts',

                'lowStockProducts'

            )
        );
    }
}