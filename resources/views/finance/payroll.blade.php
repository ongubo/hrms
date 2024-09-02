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
                            <li class="breadcrumb-item active">Payroll</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-3">
                    <h5 class="card-title mb-0 flex-grow-1">List Of Employee Salaries</h5>
                    <ul class="nav nav-pills flex-shrink-0" role="tablist">

                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-target="#uploadEmployeesModal" data-bs-toggle="modal">
                                <i class="fa fa-upload"></i>
                                Upload Employees
                            </a>
                        </li> --}}
                    </ul>
                </div>

                <div class="card-body">
                    <p class="text-muted">List of employee salaries</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Payroll Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gross Pay</th>
                                    <th scope="col">Bonuses</th>
                                    <th scope="col">Deductions</th>
                                    <th scope="col">Net Pay</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salaries as $item)
                                <tr>
                                    <td>{{ ($salaries ->currentpage()-1) * $salaries ->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{$item->employee->payroll_number??'--'}}</td>
                                    <td>{{$item->employee->first_name??'--'}} {{$item->employee->middle_name??''}}
                                        {{$item->employee->last_name??'--'}}</td>
                                    <td>{{number_format($item->gross_salary,2)??'--'}}</td>
                                    <td>{{number_format($item->bonus,2)??'--'}}</td>
                                    <td>{{number_format($item->deductions,2)??'--'}}</td>
                                    <td>{{number_format($item->net_salary,2)??'--'}}</td>
                                    <td>{{$item->status->name??'--'}}</td>
                                    <td>
                                        --
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class='col-sm-12 text-center mt-3'>
                        {{ $salaries->onEachSide(2)->links() }}
                    </div>
                </div><!-- end card-body -->


            </div>
        </div>

    </div>
</div>

@include('shared.upload_employees')
@endsection