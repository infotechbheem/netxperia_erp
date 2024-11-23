@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Completed Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Employee Attendance Leave Management</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Emp_ID</th>
                                <th>Emp_Name</th>
                                <th>Leave Category</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Applied Date & Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                           @foreach ($applicationRecord as $record)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $record->emp_id }}</td>
                                <td>{{ $record->emp_name }}</td>
                                <td>{{ $record->leave_type }}</td>
                                <td>{{ $record->start_date }}</td>
                                <td>{{ $record->end_date }}</td>
                                <td>{{ $record->created_at }}</td>
                                <td>
                                    <button class="btn btn-primary">View</button>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
