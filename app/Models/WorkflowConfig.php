<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowConfig extends Model
{
    use HasFactory;
    protected $table = 'workflow_configs';

    public function step()
    {
        return $this->belongsTo(WorkflowStep::class, 'workflow_step_id');
    }
    public function definition()
    {
        return $this->belongsTo(WorkflowDefinition::class, 'workflow_definition_id');
    }
}
