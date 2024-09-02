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
                            <li class="breadcrumb-item active">Organization Profile</li>
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
                                <h5>{{ $organization->name??'' }} <i
                                        class="bi bi-patch-check-fill align-baseline text-info ms-1"></i></h5>
                                <p class="text-muted">{{ $organization->created_at??'' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Organization Profile</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge bg-light text-secondary"><i
                                        class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                            </div>

                        </div>
                        <table class="table table-borderless table-sm align-middle mb-0">
                            <tbody>
                                <tr>
                                    <th class="ps-0" scope="row">Departments</th>
                                    <td class="text-muted text-end">{{ count($departments) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Workflows</th>
                                    <td class="text-muted text-end">{{ count($workflows) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Employees</th>
                                    <td class="text-muted text-end">{{ $employee_count }}</td>
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
                                System Settings
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab" role="tab"
                                aria-selected="false" tabindex="-1">
                                Departments
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
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
                        </li>
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
                                <h6 class="card-title mb-0">Approval Workflows</h6>
                                <div class="flex-shrink-0 ms-auto order-1 order-lg-2">
                                    <a href="#" data-bs-target="#createWorkFlowModal" data-bs-toggle="modal"
                                        class="btn btn-secondary btn-sm"><i
                                            class="bi bi-pencil-square align-baseline me-1"></i>Create A flow</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Approval Name</th>
                                                <th scope="col">Approval Description</th>
                                                <th scope="col">Step Name</th>
                                                <th scope="col">Step Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($workflows as $item)
                                            <tr>
                                                <td>{{ ($workflows ->currentpage()-1) * $workflows ->perpage() +
                                                    $loop->index + 1 }}
                                                </td>
                                                <td>{{$item->definition_name??'--'}}</td>
                                                <td>{{$item->definition_description??'--'}}</td>
                                                <td>{{$item->step_name??'--'}}</td>
                                                <td>{{$item->step_description??'--'}}</td>
                                                <td>
                                                    --
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="departments-tab" role="tabpanel">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Departments</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($departments as $item)
                                            <tr>
                                                <td>{{ ($departments ->currentpage()-1) * $departments ->perpage() +
                                                    $loop->index + 1 }}
                                                </td>
                                                <td>{{$item->name??'--'}}</td>
                                                <td>{{$item->description??'--'}}</td>
                                                <td>
                                                    --
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="finance-tab" role="tabpanel">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Finance</h6>
                            </div>
                            <div class="card-body">
                                card 3
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="positions-tab" role="tabpanel">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Positions</h6>
                            </div>
                            <div class="card-body">
                                card 4
                            </div>
                        </div>
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