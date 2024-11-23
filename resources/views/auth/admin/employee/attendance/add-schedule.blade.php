@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Schedule</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="">View Attendance</a></li>
                        <li class="breadcrumb-item active">Schedule</li>
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
                    <h5 class="card-title">Employee Schedule</h4>
                </div>
                <div class="card-body">
                    <div class="row p-4" style="justify-content: right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addScheduleModal"><i class="fas fa-plus mr-1"></i> Add Schedule</button>
                    </div>
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Shift</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $count ++ }}</td>
                                    <td>{{ $schedule->shift_name }}</td>
                                    <td>{{ $schedule->time_in }}</td>
                                    <td>{{ $schedule->time_out }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#editScheduleModal" data-id="{{ $schedule->id }}" data-shift-name="{{ $schedule->shift_name }}" data-time-in="{{ $schedule->time_in }}" data-time-out="{{ $schedule->time_out }}">
                                            <i class="fas fa-edit mr-1"></i>Edit
                                        </button>
                                        <button class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- Edit Schedule modal -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editScheduleModalLabel">Edit Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editScheduleForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="shift_name">Shift Name</label>
                        <input type="text" class="form-control" id="shift_name" name="shift_name" required>
                        @error('shift_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="time_in" class="col-sm-3 control-label">Time In</label>
                        <div class="bootstrap-timepicker">
                            <input type="time" class="form-control timepicker" id="time_in" name="time_in" required>
                        </div>
                        @error('time_in')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Time Out</label>
                        <div class="bootstrap-timepicker">
                            <input type="time" class="form-control timepicker" id="time_out" name="time_out" required>
                        </div>
                        @error('time_out')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" id="schedule_id" name="schedule_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                        <button type="submit" class="btn btn-primary">Update Schedule</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Schedule Modal  -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('admin.employee.attendance.store-schedule') }}">
                @csrf
                <div class="modal-body text-left">

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="bootstrap-timepicker">
                            <input type="text" class="form-control" id="shift_name" name="shift_name">
                        </div>

                        @error('shift_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="time_in" class="col-sm-3 control-label">Time In</label>

                        <div class="bootstrap-timepicker">
                            <input type="time" class="form-control timepicker" id="time_in" name="time_in" required>
                        </div>

                        @error('time_in')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Time Out</label>

                        <div class="bootstrap-timepicker">
                            <input type="time" class="form-control timepicker" id="time_out" name="time_out" required>
                        </div>

                        @error('time_out')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $('#editScheduleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var scheduleId = button.data('id'); // Extract info from data-* attributes
        var shiftName = button.data('shift-name');
        var timeIn = button.data('time-in'); // Expected format: HH:MM:SS
        var timeOut = button.data('time-out'); // Expected format: HH:MM:SS

        var modal = $(this);
        modal.find('#shift_name').val(shiftName);

        // Format time to HH:MM
        modal.find('#time_in').val(timeIn.slice(0, 5)); // Format to HH:MM
        modal.find('#time_out').val(timeOut.slice(0, 5)); // Format to HH:MM

        modal.find('#schedule_id').val(scheduleId);

        // Update the action URL with the schedule ID
        modal.find('form').attr('action', '/auth/admin/employee/attendance/schedule-edit/' + scheduleId);
    });

</script>

@endsection
