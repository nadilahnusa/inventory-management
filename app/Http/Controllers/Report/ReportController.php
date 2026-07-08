<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Base Query
        |--------------------------------------------------------------------------
        */

        $query = Borrowing::with([
            'department',
            'user',
            'details.product',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Filters
        |--------------------------------------------------------------------------
        */

        if ($request->filled('department_id')) {

            $query->where(
                'department_id',
                $request->department_id
            );

        }

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );

        }

        if (
            $request->filled('date_from') &&
            $request->filled('date_to')
        ) {

            $query->whereBetween(
                'borrow_date',
                [
                    $request->date_from,
                    $request->date_to,
                ]
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Table
        |--------------------------------------------------------------------------
        */

        $borrowings = (clone $query)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Summary Cards
        |--------------------------------------------------------------------------
        */

        $totalBorrowings = (clone $query)->count();

        $borrowedCount = (clone $query)
            ->where('status', 'Borrowed')
            ->count();

        $returnedCount = (clone $query)
            ->where('status', 'Returned')
            ->count();

        $overdueCount = (clone $query)
            ->where('status', 'Overdue')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Pie Chart
        |--------------------------------------------------------------------------
        */

        $statusChart = [

            'Borrowed' => $borrowedCount,

            'Returned' => $returnedCount,

            'Overdue' => $overdueCount,

        ];

        /*
        |--------------------------------------------------------------------------
        | Monthly Borrowing Chart
        |--------------------------------------------------------------------------
        */

        $monthlyChart = (clone $query)
            ->selectRaw('MONTH(borrow_date) as month, COUNT(*) as total')
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
        | Top Borrowed Products
        |--------------------------------------------------------------------------
        */

        $topProducts = BorrowingDetail::selectRaw(
                'product_id, SUM(quantity) as total'
            )
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Departments
        |--------------------------------------------------------------------------
        */

        $departments = Department::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view(
            'reports.index',
            compact(
                'borrowings',
                'departments',
                'totalBorrowings',
                'borrowedCount',
                'returnedCount',
                'overdueCount',
                'statusChart',
                'monthlyChart',
                'topProducts'
            )
        );
    }

    public function exportPdf(Request $request)
    {
        $query = Borrowing::with([
            'department',
            'user',
            'details.product',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Filters
        |--------------------------------------------------------------------------
        */

        if ($request->filled('department_id')) {

            $query->where(
                'department_id',
                $request->department_id
            );

        }

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );

        }

        if (
            $request->filled('date_from') &&
            $request->filled('date_to')
        ) {

            $query->whereBetween(
                'borrow_date',
                [
                    $request->date_from,
                    $request->date_to,
                ]
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Data
        |--------------------------------------------------------------------------
        */

        $borrowings = $query
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        $totalBorrowings = $borrowings->count();

        $borrowedCount = $borrowings
            ->where('status', 'Borrowed')
            ->count();

        $returnedCount = $borrowings
            ->where('status', 'Returned')
            ->count();

        $overdueCount = $borrowings
            ->where('status', 'Overdue')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(
            'reports.pdf',
            compact(
                'borrowings',
                'totalBorrowings',
                'borrowedCount',
                'returnedCount',
                'overdueCount'
            )
        );

        $pdf->setPaper(
            'a4',
            'landscape'
        );

        return $pdf->download(
            'Borrowing_Report_' . now()->format('Ymd_His') . '.pdf'
        );
    }
}