<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;
    protected $table = 'leave_applications';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function substitute_employee()
    {
        return $this->belongsTo(Employee::class, 'substitute_employee_id');
    }
    public function type()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function approvals()
    {
        return $this->hasMany(WorkflowInstance::class, 'leave_application_id');
    }
    public function status()
    {

        return $this->belongsTo(Status::class, 'status_id');
    }
}
