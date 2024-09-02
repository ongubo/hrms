<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salaries';
    public function salary_deductions()
    {
        return $this->hasMany(SalaryDeduction::class, 'salary_id');
    }
    public function salary_allowances()
    {
        return $this->hasMany(SalaryAllowance::class, 'salary_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

}
