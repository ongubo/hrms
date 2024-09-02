@extends('layouts.dashboard')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="card">


                <div class="col-12 row mb-3">
                    <div class="col-12 card-body">
                        <div class="row">
                            <div class="col-xxl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="d-flex flex-column h-100">
                                                    <p class="fs-md text-muted mb-4">Active Employees</p>
                                                    <h3 class="mb-0 mt-auto"><span class="counter-value"
                                                            data-target="{{ $active_employee_count }}">{{
                                                            $active_employee_count
                                                            }}</span> <small class="text-success fs-xs mb-0 ms-1"><i
                                                                class="fa fa-arrow-up me-1"></i> {{
                                                            number_format(($active_employee_count/$all_count)*100,2)
                                                            }}%</small></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="d-flex flex-column h-100">
                                                    <p class="fs-md text-muted mb-4">Employees On leave</p>
                                                    <h3 class="mb-0 mt-auto"><span class="counter-value"
                                                            data-target="24">24</span> <small
                                                            class="text-success fs-xs mb-0 ms-1"><i
                                                                class="fa fa-arrow-down me-1"></i> 02.33%</small></h3>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="d-flex flex-column h-100">
                                                    <p class="fs-md text-muted mb-4">New Applications</p>
                                                    <h3 class="mb-0 mt-auto"><span class="counter-value"
                                                            data-target="149">149</span><small
                                                            class="text-success fs-xs mb-0 ms-1"><i
                                                                class="fa fa-arrow-up me-1"></i> 12.33%</small></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="d-flex flex-column h-100">
                                                    <p class="fs-md text-muted mb-4">Items Requiring Actions</p>
                                                    <h3 class="mb-0 mt-auto"><span class="counter-value"
                                                            data-target="76">76</span> <small
                                                            class="text-danger fs-xs mb-0 ms-1"><i
                                                                class="fa fa-arrow-down me-1"></i> 09.57%</small></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Leave Requests</h4>
                            <p class="text-muted">List of leave request awaiting approval.</p>

                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Employee number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Leave start Days</th>
                                    <th scope="col">Number Of Days</th>
                                    <th scope="col">Leave end Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bobby Davis</td>
                                    <td>Nov 14, 2021</td>
                                    <td>Nov 14, 2021</td>
                                    <td>$2,410</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Christopher Neal</td>
                                    <td>Nov 14, 2021</td>
                                    <td>Nov 21, 2021</td>
                                    <td>$1,450</td>
                                    <td><span class="badge bg-warning">Waiting</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Monkey Karry</td>
                                    <td>Nov 24, 2021</td>
                                    <td>Nov 24, 2021</td>
                                    <td>$3,500</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Aaron James</td>
                                    <td>Nov 24, 2021</td>
                                    <td>Nov 24, 2021</td>
                                    <td>$6,875</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card-header align-items-center d-flex">
                            <h6 class="card-title mb-0 flex-grow-1">Recent Employees</h6>
                        </div>
                        <div class="card-body px-0">
                            <div data-simplebar="init" class="card-body py-0 simplebar-scrollable-y"
                                style="max-height: 350px;">
                                <div class="simplebar-wrapper" style="margin: 0px -19.2px;
                                    <div class=" simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                            aria-label="scrollable content"
                                            style="height: auto; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px 19.2px;">
                                                <div class="vstack gap-2">
                                                    @foreach ($recent_employees as $employee)
                                                    <div class="py-2 px-3 border border-dashed rounded">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0">
                                                                <img src={{ asset("assets/images/face.png") }} alt=""
                                                                    class="avatar-sm rounded">
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h6 class="fs-md text-truncate"><a href="#!"
                                                                        class="text-reset">{{$employee->first_name??'--'}}
                                                                        {{$employee->middle_name??''}}
                                                                        {{$employee->last_name??'--'}}</a></h6>
                                                                <p class="text-muted mb-0">Joined
                                                                    {{$employee->created_at??'--'}}</p>
                                                            </div>
                                                            <div class="text-end">
                                                                <h5 class="fs-md text-primary mb-0">
                                                                    {{$employee->department->name??'--'}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 516px; height: 436px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                    style="height: 280px; transform: translate3d(0px, 0px, 0px); display: block;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
</div>
@endsection