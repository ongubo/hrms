<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recent_employees = Employee::latest()->limit(10)->get();
        $active_employee_count = Employee::where('status_id', 5)->count();
        $all_count = Employee::count();
        return view('dashboard.index', [
            'recent_employees' => $recent_employees,
            'all_count' => $all_count,
            'active_employee_count' => $active_employee_count,
        ]);
    }
    public function signout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
