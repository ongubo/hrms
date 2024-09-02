<?php

namespace App\Http\Controllers;

use App\Models\Salary;

class PayrollController extends Controller
{
    public function salaries()
    {
        $salaries = Salary::paginate(20);
        return view('finance.payroll', [
            'salaries' => $salaries,
        ]);
    }
}
