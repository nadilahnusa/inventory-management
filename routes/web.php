<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModulePageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:Administrator'])->group(function () {
        Route::get('/products', [ModulePageController::class, 'products'])->name('products.index');
        Route::get('/products/create', [ModulePageController::class, 'productsCreate'])->name('products.create');
        Route::get('/products/{id}/edit', [ModulePageController::class, 'productsEdit'])->name('products.edit');

        Route::get('/categories', [ModulePageController::class, 'categories'])->name('categories.index');
        Route::get('/departments', [ModulePageController::class, 'departments'])->name('departments.index');
        Route::get('/suppliers', [ModulePageController::class, 'suppliers'])->name('suppliers.index');

        Route::get('/users', [ModulePageController::class, 'users'])->name('users.index');
        Route::get('/settings', [ModulePageController::class, 'settings'])->name('settings.index');
    });

    Route::middleware(['role:Administrator|Warehouse Staff'])->group(function () {
        Route::get('/inventory', [ModulePageController::class, 'inventory'])->name('inventory.index');
        Route::get('/borrowing', [ModulePageController::class, 'borrowing'])->name('borrowing.index');
        Route::get('/returning', [ModulePageController::class, 'returning'])->name('returning.index');
    });

    Route::middleware(['role:Administrator|Warehouse Staff|Manager'])->group(function () {
        Route::get('/reports', [ModulePageController::class, 'reports'])->name('reports.index');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
