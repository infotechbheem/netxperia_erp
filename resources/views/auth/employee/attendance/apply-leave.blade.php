@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Completed Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Employee Apply Leave</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <form action="{{ route('employee.attendance.create-leave-application') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Employee Information -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="emp_id" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="emp_id" name="emp_id" value="{{ $employee->emp_id }}" readonly>
                                    @error('emp_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="emp_name" class="form-label">Employee Name</label>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name" value="{{ $employee->name }}" readonly>
                                    @error('emp_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" value="{{ $employee->department }}" readonly>
                                    @error('department')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Leave Details -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="leave_type" class="form-label">Type of Leave</label>
                                    <select class="form-control" id="leave_type" name="leave_type" required>
                                        <option value="">Select Leave Type</option>
                                        <option value="sick">Sick Leave</option>
                                        <option value="casual">Casual Leave</option>
                                        <option value="vacation">Vacation</option>
                                        <option value="emergency">Emergency Leave</option>
                                    </select>
                                    @error('leave_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                    @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                    @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Reason for Leave -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="reason" class="form-label">Reason for Leave</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Supporting Documents -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="document" class="form-label">Upload Supporting Document (Optional)</label>
                                    <input type="file" class="form-control" id="document" name="document">
                                </div>
                            </div>

                            <!-- Contact Information During Leave -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emergency_contact" class="form-label">Emergency Contact Number</label>
                                    <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="e.g., +91-234567890">
                                    @error('emergency_contact')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Additional Comments -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comments" class="form-label">Additional Comments</label>
                                    <textarea class="form-control" id="comments" name="comments" rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Submit Leave Application</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
