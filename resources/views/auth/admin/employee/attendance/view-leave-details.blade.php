@extends('auth.admin.layouts.app')

@section('main-container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Leave Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Leave Management</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Emp Id:</strong> {{ $leaveDetails->emp_id }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Emp Name:</strong> {{ $leaveDetails->emp_name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Emergency Contact Number:</strong> {{ $leaveDetails->emergency_contact }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Department:</strong> {{ $leaveDetails->department }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Last Updated Time:</strong> {{ \Carbon\Carbon::parse($leaveDetails->updated_at)->format('H:i:s') }}</p>
                        </div>                                       
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="mb-3">Leave Details:</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Leave Type:</strong> {{ $leaveDetails->leave_type }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Start Date:</strong> {{ $leaveDetails->start_date }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>End Date:</strong> {{ $leaveDetails->end_date }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="border: 1px solid black; height:100px; border-radius:10px; margin-bottom:10px">
                            <p><strong>Reason:</strong> {{ $leaveDetails->reason }}</p>
                        </div>
                        <div class="col-md-12" style="border: 1px solid black; height:100px; border-radius:10px">
                            <p><strong>Comments:</strong> {{ $leaveDetails->comments ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-12">
                            <p><strong>Document:</strong>
                                @if($leaveDetails->document)
                                <a href="data:image/jpeg;base64,{{ $leaveDetails->document }}" target="_blank">View Document</a>
                                @else
                                No Document Provided
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <p><strong>Application Status :</strong> {{ $leaveDetails->application_status ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-12" style="border: 1px solid black; height:100px; border-radius:10px">
                            <p><strong>Remarks:</strong> {{ $leaveDetails->remarks ?? 'N/A' }}</p>
                        </div>
                    </div>
                    @if (! $leaveDetails->application_status)
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.employee.update-status', $leaveDetails->id) }}" method="POST">
                                @csrf
                                <div class=" col-sm-12 col-md-8 col-lg-6">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-group">Select Status</label>
                                            <select name="application_status" id="application_status" class="form-control" required>
                                                <option value="">Select Application Status</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-group">Add Remarks</label>
                                            <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
