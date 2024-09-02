<div class="modal fade" id="uploadEmployeesModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('employees.upload') }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload An excel File of Employees</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        title=""></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div>
                            <label for="formFile" class="form-label">Select Employees File</label>
                            <input class="form-control" type="file" id="formFile" name="file">
                        </div>
                        <p class="text-muted mt-3">
                            The ID number of employees uploaded will be used as their passwords to login
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary pull-left" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success pull-right" type="submit">Upload Employees
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>