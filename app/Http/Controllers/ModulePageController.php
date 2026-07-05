<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModulePageController extends Controller
{
    public function products(): View
    {
        return $this->renderPage('products', 'Products');
    }

    public function productsCreate(): View
    {
        return $this->renderPage('products', 'Create Product', 'Create');
    }

    public function productsEdit(int $id): View
    {
        return $this->renderPage('products', 'Edit Product', 'Edit', $id);
    }

    public function categories(): View
    {
        return $this->renderPage('categories', 'Categories');
    }

    public function departments(): View
    {
        return $this->renderPage('departments', 'Departments');
    }

    public function suppliers(): View
    {
        return $this->renderPage('suppliers', 'Suppliers');
    }

    public function inventory(): View
    {
        return $this->renderPage('inventory', 'Inventory');
    }

    public function borrowing(): View
    {
        return $this->renderPage('borrowing', 'Borrowing');
    }

    public function returning(): View
    {
        return $this->renderPage('returning', 'Returning');
    }

    public function reports(): View
    {
        return $this->renderPage('reports', 'Reports');
    }

    public function users(): View
    {
        return $this->renderPage('users', 'User Management');
    }

    public function settings(): View
    {
        return $this->renderPage('settings', 'Settings');
    }

    public function store(Request $request, string $module): RedirectResponse
    {
        return redirect()->route($module.'.index');
    }

    public function update(Request $request, string $module, int $id): RedirectResponse
    {
        return redirect()->route($module.'.index');
    }

    public function destroy(string $module, int $id): RedirectResponse
    {
        return redirect()->route($module.'.index');
    }

    protected function renderPage(string $module, string $title, string $action = 'Overview', ?int $id = null): View
    {
        return view('pages.module', compact('module', 'title', 'action', 'id'));
    }
}
