<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\CategoryController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\System\SettingController;
use App\Http\Controllers\System\UserController;
use App\Http\Controllers\Transaction\BorrowingController;
use App\Http\Controllers\Transaction\InventoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Administrator
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Administrator')->group(function () {

        Route::resource('departments', DepartmentController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('products', ProductController::class);

        Route::resource('users', UserController::class);

        Route::get('/settings', [SettingController::class, 'index'])
            ->name('settings.index');

        Route::put('/settings', [SettingController::class, 'update'])
            ->name('settings.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Warehouse Staff & Administrator
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Administrator|Warehouse Staff')->group(function () {

        Route::resource('inventory', InventoryController::class)
            ->only(['index']);

        Route::resource('borrowings', BorrowingController::class);

        Route::patch(
            '/borrowings/{borrowing}/return',
            [BorrowingController::class, 'confirmReturn']
        )->name('borrowings.return');
    });

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Administrator|Warehouse Staff|Manager')->group(function () {

        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';