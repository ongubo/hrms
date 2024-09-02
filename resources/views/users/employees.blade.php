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
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-3">
                    <h5 class="card-title mb-0 flex-grow-1">List Of Employees</h5>
                    <ul class="nav nav-pills flex-shrink-0" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-target="#uploadEmployeesModal" data-bs-toggle="modal">
                                <i class="fa fa-upload"></i>
                                Upload Employees
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <p class="text-muted">List of employees</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Payroll Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $item)
                                <tr>
                                    <td>{{ ($employees ->currentpage()-1) * $employees ->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{$item->payroll_number??'--'}}</td>
                                    <td>{{$item->first_name??'--'}} {{$item->middle_name??''}}
                                        {{$item->last_name??'--'}}</td>
                                    <td>{{$item->email??'--'}}</td>
                                    <td>{{$item->id_number??'--'}}</td>
                                    <td>{{$item->phone??'--'}}</td>
                                    <td>{{$item->gender??'--'}}</td>
                                    <td>
                                        --
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class='col-sm-12 text-center mt-3'>
                        {{ $employees->onEachSide(2)->links() }}
                    </div>
                </div><!-- end card-body -->


            </div>
        </div>

    </div>
</div>

@include('shared.upload_employees')
@endsection