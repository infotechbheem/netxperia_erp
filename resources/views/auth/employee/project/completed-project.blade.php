@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Completed Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Completed Projects</h2>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($completedProject->count())
                @foreach ($completedProject as $project)
                <!-- Project Card -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ $project->project_title }}</h5>
                        </div>
                        <div class="card-body">
                            <p>Project Id : <span>{{ $project->project_id }}</span></p>
                            <p>Status : <span class="{{ $project->status == 'Completed' ? 'text-success' : 'text-warning' }}">{{ $project->status }}</span></p>
                            <p>Deadline : {{ $project->deadlines }}</p>

                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $project->progress_status }}%;" aria-valuenow="{{ $project->progress_status }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $project->progress_status }}%
                                </div>
                            </div>

                            <!-- View Button -->
                            <button class="btn btn-primary btn-sm view-project" data-bs-toggle="modal" data-bs-target="#projectModal" data-project-id="{{ $project->project_id }}" data-project="{{ $project->project_title }}" data-category="{{ $project->project_category }}" data-assign-date="{{ $project->assign_date_time }}" data-deadline="{{ $project->deadlines }}" data-status="{{ $project->status }}" data-progress="{{ $project->progress_status }}" data-description="{{ $project->project_description }} " data-updated_at = "{{ $project->updated_at }}">
                                View
                            </button>

                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <h4 class="text-center">No Data Available</h4>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Project Details Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Project ID: <span id="modalProjectId"></span></h5>
                <h5>Project Title: <span id="modalProjectTitle"></span></h5>
                <p>Category: <span id="modalCategory"></span></p>
                <p>Assigned Date: <span id="modalAssignDate"></span></p>
                <p>Deadline: <span id="modalDeadline"></span></p>
                <p>Status: <span id="modalStatus"></span></p>
                <p>Progress: <span id="modalProgress"></span></p>
                <p>Project Last Updated At: <span id="modalUpdatedAt"></span></p>
                <p>Description: <span id="modalDescription"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Add event listener to view buttons
    document.querySelectorAll('.view-project').forEach(button => {
        button.addEventListener('click', function() {
            // Get project details from data attributes
            const projectId = this.getAttribute('data-project-id');
            const projectTitle = this.getAttribute('data-project');
            const category = this.getAttribute('data-category');
            const assignDate = this.getAttribute('data-assign-date');
            const deadline = this.getAttribute('data-deadline');
            const status = this.getAttribute('data-status');
            const progress = this.getAttribute('data-progress');
            const modalUpdatedAt = this.getAttribute('data-updated_at')
            const description = this.getAttribute('data-description');

            // Set the modal content
            document.getElementById('modalProjectId').innerText = projectId;
            document.getElementById('modalProjectTitle').innerText = projectTitle;
            document.getElementById('modalCategory').innerText = category;
            document.getElementById('modalAssignDate').innerText = assignDate;
            document.getElementById('modalDeadline').innerText = deadline;
            document.getElementById('modalStatus').innerText = status;
            document.getElementById('modalUpdatedAt').innerText = modalUpdatedAt;
            document.getElementById('modalProgress').innerText = progress + '%'; // Adding percentage sign for clarity
            document.getElementById('modalDescription').innerText = description;
        });
    });

</script>


@endsection
