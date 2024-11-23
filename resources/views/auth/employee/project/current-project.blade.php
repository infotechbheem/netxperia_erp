@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Current Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h3 class="pt-2">Current Project Assigned</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($assignProjects->count())
                     @foreach ($assignProjects as $project)
                         <!-- Project Card -->
                         <div class="col-md-4">
                             <div class="card">
                                 <div class="card-header">
                                     <h5 class="mb-0">{{ $project->project_title }}</h5>
                                 </div>
                                 <div class="card-body">
                                     <p>Status: <span class="{{ $project->status == 'Completed' ? 'text-success' : 'text-warning' }}">{{ $project->status }}</span></p>
                                     <p>Deadline: {{ $project->deadlines }}</p>
         
                                     <div class="progress mb-3">
                                         <div class="progress-bar bg-success" role="progressbar" style="width: {{ $project->progress_status }}%;" aria-valuenow="{{ $project->progress_status }}" aria-valuemin="0" aria-valuemax="100">
                                             {{ $project->progress_status }}%
                                         </div>
                                     </div>
         
                                     <!-- View Button -->
                                     <button class="btn btn-primary btn-sm view-project" data-bs-toggle="modal" data-bs-target="#projectModal" data-project="{{ $project->project_title }}" data-status="{{ $project->status }}" data-deadline="{{ $project->deadlines }}" data-progress="{{ $project->progress_status }}">
                                         View
                                     </button>
         
                                     <!-- Update Button -->
                                     <button class="btn btn-secondary btn-sm float-end update-project" data-bs-toggle="modal" data-bs-target="#updateProjectModal" data-project="{{ $project->project_title }}" data-project_id="{{ $project->project_id }}" data-deadline="{{ $project->deadlines }}" data-progress="{{ $project->progress_status }}" data-status="{{ $project->status }}">
                                         Update
                                     </button>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                @else
                     <h4 class="text-center">Data Not Availabel</h4>
                @endif
             </div>
        </div>
    </div>
</div>

<!-- Project Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Detail</th>
                            <th scope="col">Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project Name</td>
                            <td id="projectName"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td id="projectStatus"></td>
                        </tr>
                        <tr>
                            <td>Deadline</td>
                            <td id="projectDeadline"></td>
                        </tr>
                        <tr>
                            <td>Progress</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" id="projectProgressBar" aria-valuemin="0" aria-valuemax="100">
                                        <span id="projectProgress"></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Update Project Modal -->
<div class="modal fade" id="updateProjectModal" tabindex="-1" aria-labelledby="updateProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProjectModalLabel">Update Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProjectForm" action="{{ route('employee.project.update-project-details') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="updateProjectId" class="form-label">Project Id</label>
                        <input type="text" class="form-control" name="project_id" id="updateProjectId" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updateProjectName" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="updateProjectName" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updateProjectStatus" class="form-label">Status</label>
                        <select class="form-select" id="updateProjectStatus" name="project_status" required>
                            <option value="Select Status">Select Status</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateProjectProgress" class="form-label">Progress (%)</label>
                        <input type="number" class="form-control" name="progress_status" id="updateProjectProgress" min="0" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateProjectDescription" class="form-label">Write Description (optional)</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        // Add event listener to the buttons to populate the project details modal
        document.querySelectorAll('.btn-primary').forEach(button => {
            button.addEventListener('click', function() {
                const projectName = this.getAttribute('data-project');
                const projectStatus = this.getAttribute('data-status');
                const projectDeadline = this.getAttribute('data-deadline');
                const projectProgress = this.getAttribute('data-progress').replace('%', '');

                document.getElementById('projectName').textContent = projectName;
                document.getElementById('projectStatus').textContent = projectStatus;
                document.getElementById('projectDeadline').textContent = projectDeadline;

                // Set progress bar and progress text
                document.getElementById('projectProgressBar').style.width = projectProgress + '%';
                document.getElementById('projectProgress').textContent = projectProgress + '%';
            });
        });

        // Add event listener to the update buttons to populate the update project modal
        document.querySelectorAll('.btn-secondary').forEach(button => {
            button.addEventListener('click', function() {
                const projectName = this.getAttribute('data-project');
                const projectId = this.getAttribute('data-project_id');
                const projectProgress = this.getAttribute('data-progress').replace('%', '');

                document.getElementById('updateProjectName').value = projectName;
                document.getElementById('updateProjectId').value = projectId;
                document.getElementById('updateProjectProgress').value = projectProgress;

                // Set status to "Select Status" by default to force selection
                document.getElementById('updateProjectStatus').value = "Select Status";
            });
        });

    document.getElementById('updateProjectForm').addEventListener('submit', function(e) {
     e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);

            // Perform an AJAX request to the server
            fetch('{{ route('employee.project.update-project-details') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    // Success response, project updated
                    alert(data.message); // Show success message
                    $('#updateProjectModal').modal('hide'); // Close the modal
                    location.reload(); // Optionally reload the page to reflect the changes
                } else if (data.errors) {
                    // Laravel validation errors
                    let errorMessages = '';
                    for (const [field, messages] of Object.entries(data.errors)) {
                        // Concatenate error messages into a single string
                        errorMessages += `${field}: ${messages.join(', ')}\n`;
                    }
                    alert("Validation failed:\n" + errorMessages); // Show validation errors in alert
                } else {
                    // Handle other types of failures
                    alert("Failed to update the project. Please try again.");
                }
            })
            .catch(error => {
                // Handle errors if any
                console.error('Error:', error);
                alert('An unexpected error occurred. Please try again.');
            });
        });
        
</script>

@endsection
