<?php

namespace App\Http\Controllers;

use App\Imports\EmployeesImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function employees()
    {
        $employees = Employee::whereNotIn('role_id', [1])->paginate(20);
        return view('users.employees', [
            'employees' => $employees,
        ]);
    }

    public function upload_employees(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        Excel::import(new EmployeesImport, $request->file('file'));

        return redirect()->back()->with('success', 'Employees imported successfully. Please refresh this page after a few minutes.');
    }
}
