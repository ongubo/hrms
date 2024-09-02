<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PayrollController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes([

]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/signout', [HomeController::class, 'signout'])->name('signout');

    Route::get('/employees', [EmployeeController::class, 'employees'])->name('employees.list');
    Route::get('/leave-applications', [LeaveController::class, 'leave_applications'])->name('leave.applications.list');
    Route::get('/payroll', [PayrollController::class, 'salaries'])->name('salaries.list');
    Route::get('/organization/profile', [OrganizationController::class, 'profile'])->name('organization.profile');
    Route::get('/leave/application/{leave_uuid}', [LeaveController::class, 'leave'])->name('leave.details');

    Route::post('/upload/employees', [EmployeeController::class, 'upload_employees'])->name('employees.upload');
    Route::post('/leave/apply', [LeaveController::class, 'apply_leave'])->name('leave.apply');

});
