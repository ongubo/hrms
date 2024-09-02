<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    public function profile()
    {
        $organization = Organization::find(1);
        $departments = Department::paginate(20);
        $employee_count = Employee::count();
        $workflows = DB::table('workflow_configs')
            ->join('workflow_definitions', 'workflow_definitions.id', 'workflow_configs.workflow_definition_id')
            ->join('workflow_steps', 'workflow_steps.id', 'workflow_configs.workflow_step_id')
            ->select(
                'workflow_configs.*',
                'workflow_steps.name as step_name',
                'workflow_steps.description as step_description',
                'workflow_definitions.name as definition_name',
                'workflow_definitions.description as definition_description',
            )
            ->paginate(20);
        return view('dashboard.organization', [
            'organization' => $organization,
            'departments' => $departments,
            'workflows' => $workflows,
            'employee_count' => $employee_count,
        ]);
    }
}
