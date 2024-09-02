<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveApplication;
use App\Models\LeaveType;
use App\Models\WorkflowConfig;
use App\Models\WorkflowInstance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LeaveController extends Controller
{
    public function leave_applications()
    {
        $applications = LeaveApplication::paginate(20);
        $employees = Employee::select('id', 'email')->get();
        $leave_types = LeaveType::get();
        return view('users.leave_applications', [
            'applications' => $applications,
            'employees' => $employees,
            'leave_types' => $leave_types,
        ]);
    }

    public function apply_leave(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'substitute_employee_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'days_requested' => 'required|numeric|gt:0',
            'end_date' => 'required',
            'reason' => 'string|required',
        ]);
        $approval_flows = WorkflowConfig::where('workflow_definition_id', 1)->get();
        if (count($approval_flows) <= 0) {
            return redirect()->back()->with('error', 'No approval process set for leave application please contact the administrator.');
        }
        $leave = new LeaveApplication();
        $leave->uuid = Str::uuid();
        $leave->employee_id = $user->id;
        $leave->substitute_employee_id = $request->substitute_employee_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->days_requested = $request->days_requested;
        $leave->save();

        // Get leave flow
        $approval_flows = WorkflowConfig::where('workflow_definition_id', 1)->get();
        foreach ($approval_flows as $flow) {
            $instance = new WorkflowInstance();
            $instance->workflow_definition_id = $flow->workflow_definition_id;
            $instance->workflow_step_id = $flow->workflow_step_id;
            $instance->leave_application_id = $leave->id;
            $instance->step_name = $flow->step->name;
            $instance->comments = $flow->step->description;
            $instance->status_id = 1;
            $instance->department_id = $user->department_id;
            // $instance->approver_id= ;
            $instance->save();
        }
        return redirect()->back()->with('success', 'Leave application placed succesfully. Please wait for involved parties to approve');
    }

    public function leave(Request $request)
    {
        $user = Auth::user();
        $leave = LeaveApplication::where('uuid', $request->leave_uuid)->firstOrFail();
        $previous_applications = LeaveApplication::whereNotIn('uuid', [$request->leave_uuid])
            ->where('employee_id', $user->id)
            ->paginate(20);
        return view('users.leave_application', [
            'leave' => $leave,
            'previous_applications' => $previous_applications,
        ]);
    }
}
