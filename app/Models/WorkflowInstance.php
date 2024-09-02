<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowInstance extends Model
{
    use HasFactory;
    protected $table = 'workflow_instance';

    public function step()
    {
        return $this->belongsTo(WorkflowStep::class, 'workflow_step_id');
    }
    public function definition()
    {
        return $this->belongsTo(WorkflowDefinition::class, 'workflow_definition_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function leave()
    {
        return $this->belongsTo(LeaveApplication::class, 'leave_application_id');
    }
    public function approver()
    {
        return $this->belongsTo(Employee::class, 'approver_id');
    }

}
