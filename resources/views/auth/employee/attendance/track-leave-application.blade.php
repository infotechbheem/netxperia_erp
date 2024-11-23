@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Completed Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Track Leave Application</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Emp Id</th>
                                <th>Emp Name</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($appliedApplication as $application)
                            <tr>
                                <td>{{ $count ++ }}</td>
                                <td>{{ $application->emp_id }}</td>
                                <td>{{ $application->emp_name }}</td>
                                <td>{{ $application->department }}</td>
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

<!-- Leave Application Details Modal -->
<div class="modal fade" id="leaveApplicationModal" tabindex="-1" aria-labelledby="leaveApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leaveApplicationModalLabel">Leave Application Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="modal_emp_id" class="form-label">Employee ID:</label>
                    <input type="text" class="form-control" id="modal_emp_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="modal_emp_name" class="form-label">Employee Name:</label>
                    <input type="text" class="form-control" id="modal_emp_name" readonly>
                </div>
                <div class="mb-3">
                    <label for="modal_department" class="form-label">Department:</label>
                    <input type="text" class="form-control" id="modal_department" readonly>
                </div>
                <div class="mb-3">
                    <label for="modal_leave_type" class="form-label">Leave Type:</label>
                    <input type="text" class="form-control" id="modal_leave_type" readonly>
                </div>
                <div class="mb-3">
                    <label for="modal_start_date" class="form-label">Start Date:</label>
                    <input type="text" class="form-control" id="modal_start_date" readonly>
                </div>
                <div class="mb-3">
                    <label for="modal_end_date" class="form-label">End Date:</label>
                    <input type="text" class="form-control" id="modal_end_date" readonly>
                </div>
                <div class="mb-3">
                    <label for="modal_reason" class="form-label">Reason for Leave:</label>
                    <textarea class="form-control" id="modal_reason" rows="3" readonly></textarea>
                </div>
                <div class="mb-3">
                    <label for="modal_emergency_contact" class="form-label">Emergency Contact:</label>
                    <input type="text" class="form-control" id="modal_emergency_contact" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // When the View button is clicked
        $('.btn-primary').on('click', function() {
            // Get the row data
            const row = $(this).closest('tr');
            const empId = row.find('td:eq(1)').text(); // Get Employee ID
            const empName = row.find('td:eq(2)').text(); // Get Employee Name
            const department = row.find('td:eq(3)').text(); // Get Department

            // You will need to add these fields to your application data in the loop to access them
            // Example: Assuming you are passing leave type and dates from the database
            const leaveType = row.data('leave-type'); // Leave Type (add this data in your Blade loop)
            const startDate = row.data('start-date'); // Start Date (add this data in your Blade loop)
            const endDate = row.data('end-date'); // End Date (add this data in your Blade loop)
            const reason = row.data('reason'); // Reason (add this data in your Blade loop)
            const emergencyContact = row.data('emergency-contact'); // Emergency Contact (add this data in your Blade loop)

            // Set the modal fields
            $('#modal_emp_id').val(empId);
            $('#modal_emp_name').val(empName);
            $('#modal_department').val(department);
            $('#modal_leave_type').val(leaveType);
            $('#modal_start_date').val(startDate);
            $('#modal_end_date').val(endDate);
            $('#modal_reason').val(reason);
            $('#modal_emergency_contact').val(emergencyContact);

            // Show the modal
            $('#leaveApplicationModal').modal('show');
        });
    });
</script>

@endsection
