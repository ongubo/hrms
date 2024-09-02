<div class="modal fade" id="applyLeaveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('leave.apply') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Leave Application Form</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="leaveType" class="form-label">Leave Type</label>
                            <select class="form-select" id="leaveType" name="leave_type_id" required>
                                <option value="" selected disabled>Select Leave Type</option>
                                @foreach($leave_types as $leave_type)
                                <option value="{{ $leave_type->id }}">{{ $leave_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="substituteEmployee" class="form-label">Substitute Employee</label>
                            <select class="form-select" id="substituteEmployee" name="substitute_employee_id" required>
                                <option value="" selected disabled>Select Substitute Employee</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date" required>
                        </div>
                        <div class="col-md-4">
                            <label for="daysRequested" class="form-label">Days requested</label>
                            <input type="numer" class="form-control" id="daysRequested" name="days_requested" required>
                        </div>
                        <div class="col-md-4">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="end_date" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Leave</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Apply for Leave</button>
                </div>
            </div>
        </form>
    </div>
</div>