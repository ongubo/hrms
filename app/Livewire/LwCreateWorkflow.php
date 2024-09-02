<?php

namespace App\Livewire;

use App\Models\WorkflowConfig;
use App\Models\WorkflowDefinition;
use App\Models\WorkflowStep;
use Livewire\Component;

class LwCreateWorkflow extends Component
{
    public $steps = [];
    public $errors = [];
    public $step = null;
    public $definition_id = null;
    public $selected_approvers = [];
    public function render()
    {
        $workflow_definitions = WorkflowDefinition::get();
        $workflow_steps = WorkflowStep::get();
        return view('livewire.lw-create-workflow', [
            'workflow_definitions' => $workflow_definitions,
            'workflow_steps' => $workflow_steps,
        ]);
    }
    public function addApprover()
    {
        if ($this->step && !in_array($this->step, $this->selected_approvers)) {
            $this->selected_approvers[] = json_decode($this->step);
        }
        $this->step = null;
    }

    public function removeApprover($approver)
    {
        $this->selected_approvers = array_filter($this->selected_approvers, function ($item) use ($approver) {
            return $item->id != $approver;
        });
        $this->step = null;
    }

    public function createFlow()
    {
        $this->error = [];
        if (!$this->definition_id) {
            $this->errors[] = 'Please select an approval before you proceed';
            return;
        }
        foreach ($this->selected_approvers as $step) {
            $config = WorkflowConfig::where('workflow_definition_id', $this->definition_id)
                ->where('workflow_step_id', $step->id)
                ->first();
            if (!$config) {
                $config = new WorkflowConfig();
                $config->workflow_definition_id = $this->definition_id;
                $config->workflow_step_id = $step->id;
                $config->save();
            }
        }
        $this->error = [];
        $this->selected_approvers = [];
        $this->definition_id = null;
        return redirect()->route('organization.profile')->with('success', 'Workflow created succesfully');

    }
}
