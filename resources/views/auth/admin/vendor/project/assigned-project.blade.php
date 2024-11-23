@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendor Assigned Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor-profile') }}">Vendor</a></li>
                        <li class="breadcrumb-item active">Assigned Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4 class="m-0">Vendor Assigned all Project</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($assignedProjects as $project)
                                <div class="col-md-4">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h6 class="m-0">{{ $project->project_title }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-heading"><strong>Project Id: {{ $project->project_id }}</strong></p>
                                            <p class="card-text">Project Category: <span>{{ $project->project_category }}</span></p>
                                            <p class="card-text">Assigned Date & Time: {{ $project->assign_date_time }}</p>
                                            <p class="card-text">Project Status: {{ $project->status }}</p>

                                            <div class="progress mb-3">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $project->progress_status }}%;" aria-valuenow="{{ $project->progress_status }}" aria-valuemin="0" aria-valuemax="100">
                                                    {{ $project->progress_status }}%
                                                </div>
                                            </div>
                                            <div class="float-right">
                                                <button class="btn btn-primary view-project" data-id="{{ $project->project_id }}">View</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<!-- Modal for Project Details -->
<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Project Id</th>
                            <td id="modalProjectId"></td>
                        </tr>
                        <tr>
                            <th>Project Title</th>
                            <td id="modalProjectTitle"></td>
                        </tr>
                        <tr>
                            <th>Project Category</th>
                            <td id="modalProjectCategory"></td>
                        </tr>
                        <tr>
                            <th>Assigned Date & Time</th>
                            <td id="modalAssignDateTime"></td>
                        </tr>
                        <tr>
                            <th>Deadline</th>
                            <td id="modalDeadline"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td id="modalStatus"></td>
                        </tr>
                        <tr>
                            <th>Progress Status</th>
                            <td id="modalProgressStatus"></td>
                        </tr>
                        <tr>
                            <th>Last Updated At</th>
                            <td id="modalLastUpdatedAt"></td>
                        </tr>
                        <tr>
                            <th>Assigned To</th>
                            <td id="modalEmpName"></td>
                        </tr>
                        <tr>
                            <th>Emp Id</th>
                            <td id="modalEmpId"></td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td id="modalDesignation"></td>
                        </tr>
                    </tbody>
                </table>
                <div style="border: 2px solid black; padding:10px">
                    <p class="text-dark m-0 mb-1"><strong>Last Updated Description :</strong> </p>
                    <span id="modalDescription"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach click event to all View buttons
        const viewButtons = document.querySelectorAll('.view-project');

        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const projectId = this.getAttribute('data-id');

                // Make an AJAX request to fetch project details
                const xhr = new XMLHttpRequest();
                xhr.open('GET', '/auth/admin/vendor/project/view-assigned-project/' + projectId, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);
                        // Populate modal with project details
                        document.getElementById('modalProjectId').innerText = data.project_id;
                        document.getElementById('modalProjectTitle').innerText = data.project_title;
                        document.getElementById('modalProjectCategory').innerText = data.project_category;
                        document.getElementById('modalAssignDateTime').innerText = data.assign_date_time;
                        document.getElementById('modalDeadline').innerText = data.deadlines;
                        document.getElementById('modalStatus').innerText = data.status;
                        document.getElementById('modalProgressStatus').innerText = data.progress_status + '%';
                        document.getElementById('modalLastUpdatedAt').innerText = data.last_updated_at;
                        document.getElementById('modalEmpName').innerText = data.vendor_name;
                        document.getElementById('modalEmpId').innerText = data.vendor_id;
                        document.getElementById('modalDesignation').innerText = data.designation;
                        document.getElementById('modalDescription').innerText = data.description;

                        // Open the modal (Bootstrap 4)
                        $('#projectModal').modal('show');
                    } else if (xhr.readyState === 4) {
                        alert('Error fetching project details: ' + JSON.parse(xhr.responseText).error);
                    }
                };
                xhr.send();
            });
        });
    });

</script>

@endsection
