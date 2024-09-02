@extends('layouts.dashboard')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                @include('shared.notifications')
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leave Application</li>
                        </ol>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <!--end col-->
            <div class="col-xxl-3">
                <div class="card overflow-hidden">
                    <div>
                        <img src="{{ asset('assets/images/effect-pattern/pattern-2.svg') }}" alt=""
                            class="card-img-top profile-wid-img object-fit-cover" style="height: 200px;">
                        {{-- <div>
                            <input id="profile-foreground-img-file-input" type="file"
                                class="profile-foreground-img-file-input d-none">
                            <label for="profile-foreground-img-file-input"
                                class="profile-photo-edit btn btn-light btn-sm position-absolute end-0 top-0 m-3">
                                <i class="ri-image-edit-line align-bottom me-1"></i> Edit Cover Images
                            </label>
                        </div> --}}
                    </div>
                    <div class="card-body pt-0 mt-n5">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto">
                                <img src="{{ asset('assets/images/face.png') }}" alt=""
                                    class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                <div
                                    class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                    <input id="profile-img-file-input" type="file"
                                        class="profile-img-file-input d-none">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="bi bi-camera"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h5>{{ $employee->first_name??'' }} {{ $employee->middle_name??'' }}{{
                                    $employee->last_name??'' }}<i
                                        class="bi bi-patch-check-fill align-baseline text-info ms-1"></i></h5>
                                <p class="text-muted">{{ $employee->created_at??'' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Employee Profile</h5>
                            </div>
                            {{-- <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge bg-light text-secondary"><i
                                        class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                            </div> --}}

                        </div>
                        <table class="table table-borderless table-sm align-middle mb-0">
                            <tbody>
                                <tr>
                                    <th class="ps-0" scope="row">Name</th>
                                    <td class="text-muted text-end">{{ $employee->first_name??'' }} {{
                                        $employee->middle_name??'' }}{{ $employee->last_name??'' }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Email</th>
                                    <td class="text-muted text-end">{{ $employee->email??'--'}}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Department</th>
                                    <td class="text-muted text-end">{{ $employee->department->name??'--'}}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Phone</th>
                                    <td class="text-muted text-end">{{ $employee->phone??'--'}}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Email</th>
                                    <td class="text-muted text-end">{{ $employee->email??'--'}}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Status</th>
                                    <td class="text-muted text-end">{{ $employee->status->name??'--'}}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Last Logged In</th>
                                    <td class="text-muted text-end">{{ $employee->last_login->diffForHumans??'--'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9">
                <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                    <ul class="nav nav-pills arrow-navtabs nav-secondary gap-2 flex-grow-1 order-2 order-lg-1"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#systemSettings" role="tab"
                                aria-selected="true">
                                Leave Application details
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab" role="tab"
                                aria-selected="false" tabindex="-1">
                                Other Leave Applications
                            </a>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#finance-tab" role="tab"
                                aria-selected="false" tabindex="-1">
                                Finance
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#positions-tab" role="tab"
                                aria-selected="false" tabindex="-1">
                                Positions
                            </a>
                        </li> --}}
                    </ul>
                    {{-- <div class="flex-shrink-0 ms-auto order-1 order-lg-2">
                        <a href="pages-profile-settings.html" class="btn btn-secondary"><i
                                class="bi bi-pencil-square align-baseline me-1"></i> Edit Profile</a>
                    </div> --}}
                </div>
                <div class="card">
                    <div class="tab-content">

                        <div class="tab-pane active" id="systemSettings" role="tabpanel">
                            <div class="card-header d-flex align-items-center flex-wrap gap-2 mb-4">
                                <h6 class="card-title mb-0">Leave application details</h6>
                                <div class="flex-shrink-0 ms-auto order-1 order-lg-2">
                                    <a href="#" data-bs-target="#createWorkFlowModal" data-bs-toggle="modal"
                                        class="btn btn-secondary btn-sm"><i
                                            class="bi bi-pencil-square align-baseline me-1"></i>React</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row row-cols-5">
                                    <div class="col mt-3">
                                        <p class="text-muted">Employee</p>
                                        <strong>{{ $leave->employee->first_name??'' }} {{
                                            $leave->employee->middle_name??'' }} {{ $leave->employee->last_name??''
                                            }}</strong>
                                    </div>
                                    <div class="col mt-3">
                                        <p class="text-muted">Substitute Employee</p>
                                        <strong>{{ $leave->substitute_employee->first_name??'' }} {{
                                            $leave->substitute_employee->middle_name??'' }} {{
                                            $leave->substitute_employee->last_name??''
                                            }}</strong>
                                    </div>
                                    <div class="col mt-3">
                                        <p class="text-muted">Leave Start Date</p>
                                        <strong>{{ $leave->start_date??'' }}</strong>
                                    </div>
                                    <div class="col mt-3">
                                        <p class="text-muted">Leave End Date</p>
                                        <strong>{{ $leave->end_date??'' }}</strong>
                                    </div>
                                    <div class="col mt-3">
                                        <p class="text-muted">Days Requested</p>
                                        <strong>{{ $leave->days_requested??'' }}</strong>
                                    </div>
                                    <div class="col mt-3">
                                        <p class="text-muted">Status</p>
                                        <strong>{{ $leave->status->name??'' }}</strong>
                                    </div>
                                    <div class="col mt-3">
                                        <p class="text-muted">Type</p>
                                        <strong>{{ $leave->type->name??'' }}</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-header my-2">
                                        <h4 class="card-title mb-0">Leave Approval Statuses</h4>
                                    </div>
                                    <div class="table-responsive col-12">
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Approval Step</th>
                                                    <th scope="col">Comments</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">Approver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($leave->approvals as $item)
                                                <tr>
                                                    <td>{{$loop->index + 1 }}
                                                    </td>
                                                    <td>{{$item->step->name??'--'}}</td>
                                                    <td>{{$item->comments??'--'}}</td>
                                                    <td>
                                                        @if($item->status_id == 1)
                                                        <span class="badge bg-warning text-dark">{{
                                                            $item->status->name??'--' }}</span>
                                                        @elseif($item->status_id == 2)
                                                        <span class="badge bg-success">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @elseif($item->status_id == 3)
                                                        <span class="badge bg-danger">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @elseif($item->status_id == 4)
                                                        <span class="badge bg-info text-dark">{{
                                                            $item->status->name??'--' }}</span>
                                                        @elseif($item->status_id == 5)
                                                        <span class="badge bg-success">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @elseif($item->status_id == 6)
                                                        <span class="badge bg-secondary">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @elseif($item->status_id == 7)
                                                        <span class="badge bg-primary">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @elseif($item->status_id == 8)
                                                        <span class="badge bg-info">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @elseif($item->status_id == 9)
                                                        <span class="badge bg-danger">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @elseif($item->status_id == 10)
                                                        <span class="badge bg-warning text-dark">{{
                                                            $item->status->name??'--' }}</span>
                                                        @elseif($item->status_id == 11)
                                                        <span class="badge bg-danger">{{ $item->status->name??'--'
                                                            }}</span>
                                                        @else
                                                        <span class="badge bg-secondary">Unknown</span>
                                                        @endif

                                                    </td>
                                                    <td>{{$item->leave->employee->department->name??'--'}}</td>
                                                    <td>{{$item->approver->first_name??'--'}}
                                                        {{$item->approver->middle_name??'--'}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="departments-tab" role="tabpanel">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Other Applications</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Employee</th>
                                                <th scope="col">Substitute Employee</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Application Date</th>
                                                <th scope="col">Days</th>
                                                <th scope="col">Leave Type</th>
                                                <th scope="col">Starts</th>
                                                <th scope="col">Ends</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($previous_applications as $item)
                                            <tr>
                                                <td>{{ ($previous_applications ->currentpage()-1) *
                                                    $previous_applications ->perpage() + $loop->index
                                                    + 1 }}
                                                </td>
                                                <td>{{$item->employee->first_name??'--'}}
                                                    {{$item->employee->middle_name??''}}
                                                    {{$item->employee->last_name??'--'}}</td>
                                                <td>{{$item->substitute_employee->first_name??'--'}}
                                                    {{$item->substitute_employee->middle_name??''}}
                                                    {{$item->substitute_employee->last_name??'--'}}</td>
                                                <td>{{$item->employee->email??'--'}}</td>
                                                <td>{{$item->created_at??'--'}}</td>
                                                <td>{{$item->days_requested??'--'}}</td>
                                                <td>{{$item->type->name??'--'}}</td>
                                                <td>{{$item->start_date??'--'}}</td>
                                                <td>{{$item->end_date??'--'}}</td>
                                                <td>
                                                    <a href="{{ route('leave.details',['leave_uuid'=>$item->uuid]) }}"
                                                        class="link-success">View More <i
                                                            class="fa fa-eye  align-middle"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class='col-sm-12 text-center mt-3'>
                                    {{ $previous_applications->onEachSide(2)->links() }}
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                        {{-- <div class="tab-pane" id="finance-tab" role="tabpanel">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Finance</h6>
                            </div>
                            <div class="card-body">
                                card 3
                            </div>
                        </div> --}}
                        <!--end tab-pane-->
                        {{-- <div class="tab-pane" id="positions-tab" role="tabpanel">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Positions</h6>
                            </div>
                            <div class="card-body">
                                card 4
                            </div>
                        </div> --}}
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </div>
</div>

@include('shared.create_workflow')
@endsection