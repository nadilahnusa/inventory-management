<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Masters\StoreDepartmentRequest;
use App\Http\Requests\Masters\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('master.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('master.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('master.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if ($department->borrowings()->exists()) {
            return redirect()
                ->route('departments.index')
                ->with('error', 'Department cannot be deleted because it has associated borrowings.');
        }

        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}
