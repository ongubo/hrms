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
                            <li class="breadcrumb-item active">Leave Applications</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-3">
                    <h5 class="card-title mb-0 flex-grow-1">List of Leave applications</h5>
                    <ul class="nav nav-pills flex-shrink-0" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-target="#applyLeaveModal" data-bs-toggle="modal">
                                <i class="fa fa-upload"></i>
                                Apply For Leave
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <p class="text-muted">List of Leave applications</p>
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
                                @foreach($applications as $item)
                                <tr>
                                    <td>{{ ($applications ->currentpage()-1) * $applications ->perpage() + $loop->index
                                        + 1 }}
                                    </td>
                                    <td>{{$item->employee->first_name??'--'}} {{$item->employee->middle_name??''}}
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
                                            class="link-success">View More <i class="fa fa-eye  align-middle"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class='col-sm-12 text-center mt-3'>
                        {{ $applications->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('shared.apply_leave',[
'leave_types'=>$leave_types,
'employees'=>$employees,
])
@endsection