@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Department & Designation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Department & Designation</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Employee Department & Designation</div>
            </div>
            <div class="card-body">
                <div class="container">
                    <h3>For Department</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table tabe-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Department Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $count ++  }}</td>
                                        <td>{{ $department->department }}</td>
                                        <td>{{ $department->created_at }}</td>
                                        <td>
                                            <button class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="height: auto; background:black; margin:0px 28px">
                            <div style="border:1px solid black"></div>
                        </div>
                        <div class="col-md-3">
                            <form action="{{ route('admin.employee.store-department') }}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Department Name</label>
                                        <input type="text" name="department" id="department" class="form-control" placeholder="Enter Department Name" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary ml-2">Create</button>
                            </form>
                        </div>
                    </div>

                    <h3 class="pt-4">For Designation</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table tabe-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Designation Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach ($designations as $designation)
                                    <tr>
                                        <td>{{ $count ++  }}</td>
                                        <td>{{ $designation->designation }}</td>
                                        <td>{{ $designation->created_at }}</td>
                                        <td>
                                            <button class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="height: auto; background:black; margin:0px 28px">
                            <div style="border:1px solid black"></div>
                        </div>
                        <div class="col-md-3">
                            <form action="{{ route('admin.employee.store-designation') }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Designation Name</label>
                                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation Name" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary ml-2">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
