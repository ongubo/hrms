<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Create a custom workflow</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row mb-3">
            <div class="col-12">
                @if(count($errors) >0)
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors as $item)
                    <p> {{ $item }} </p>
                    @endforeach
                </div>
                @endif

                <label for="definitionType" class="form-label">Select Approval Flow</label>
                <select class="form-select" id="definitionType" wire:model="definition_id" required>
                    <option value="" selected>Select Approval Type</option>
                    @foreach($workflow_definitions as $item)
                    <option value="{{ $item->id }}">{{ $item->name??'--' }} ({{ $item->description??'--' }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-3">
                <strong> Select Steps</strong>
                <p class="text-muted"> Select steps involved to approve in ascending order (Junior to Senior position).
                </p>
            </div>
            <hr class="my-2">
            <div class="row">
                <div class="col-10">
                    <label for="approver" class="form-label">Select Approver</label>
                    <select class="form-select" id="approver" wire:model="step" required>
                        <option value="" selected>Select Approver</option>
                        @foreach($workflow_steps as $item)
                        <option value="{{ $item }}">{{ $item->name??'--' }} ({{ $item->description??'--' }})
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2 pt-4">
                    <button class="btn btn-success btn-sm form-control" wire:click="addApprover" type="button">Add
                        Approver</button>
                </div>
            </div>
            <div class="mt-3">
                <h5>Selected Approvers</h5>
                <ul class="list-group">
                    @foreach($selected_approvers as $approver)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        #{{ $loop->index +1 }} ::
                        {{ $approver->name ?? '--' }}
                        <button class="btn btn-danger btn-sm" type="button"
                            wire:click="removeApprover('{{ $approver->id }}')">Remove</button>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success" type="button" wire:click="createFlow">Create a Flow</button>
    </div>
</div>