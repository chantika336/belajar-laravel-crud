<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(5);

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'joining_date' => 'required',
            'joining_salary' => 'required'
        ]);

        Employee::create($request->except('_token'));

        return redirect()->route('employee.index')
            ->withSuccess('Employee has been created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'joining_date' => 'required',
            'joining_salary' => 'required'
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')
            ->withSuccess('Employee details has been updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->withSuccess('Employee has been delete successfully.');
    }
}