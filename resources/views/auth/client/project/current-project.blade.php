@extends('auth.client.layouts.app')

@section('main-container')

<!-- Current Project Start -->
<style>
    .col-lg-4 .card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        transition: transform 0.5s;
    }

    .col-lg-4 .card:hover {
        transform: scale(1.05);
    }

    .progress {
        height: 20px;
        margin-top: 10px;
    }

</style>
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0 text-center p-2">Your Current Project / Ongoing Project</h4>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->project_id }}</p>
                            <p class="card-text">Status:
                                @if ($project->project_status == 0)
                                Initialized
                                @elseif ($project->project_status >= 1 && $project->project_status <= 3) In Progress @elseif ($project->project_status == 4)
                                    Complete
                                    @else
                                    Unknown Status
                                    @endif
                            </p>
                            <p class="card-text">Start Date: {{ $project->start_date }}</p>
                            <p class="card-text">Expected Completion: {{ $project->end_date }}</p>
                            <p class="card-text">Project Category: {{ $project->category }}</p>

                            @php
                            if ($project->project_status == 0) {
                            $statusText = "Initialized";
                            $progressPercentage = 0;
                            } elseif ($project->project_status == 1) {
                            $statusText = "In Progress";
                            $progressPercentage = 25;
                            } elseif ($project->project_status == 2) {
                            $statusText = "In Progress";
                            $progressPercentage = 50;
                            } elseif ($project->project_status == 3) {
                            $statusText = "In Progress";
                            $progressPercentage = 75;
                            } elseif ($project->project_status == 4) {
                            $statusText = "Complete";
                            $progressPercentage = 100;
                            } else {
                            $statusText = "Unknown Status";
                            $progressPercentage = 0;
                            }
                            @endphp

                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progressPercentage }}%;" aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $progressPercentage }}%
                                </div>
                            </div>

                            <!-- Button that triggers modal -->
                            <button class="btn btn-primary mt-2 view-project" data-title="{{ $project->title }}" data-project-id="{{ $project->project_id }}" data-status="{{ $statusText }}" data-start-date="{{ $project->start_date }}" data-end-date="{{ $project->end_date }}" data-category="{{ $project->category }}" data-progress="{{ $progressPercentage }}" data-bs-toggle="modal" data-bs-target="#projectModal">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Table for Project Details -->
                <table class="table table-bordered">
                    <tr>
                        <th>Project Id:</th>
                        <td id="modalProjectId"></td>
                    </tr>
                    <tr>
                        <th>Project Title:</th>
                        <td id="modalTitle"></td>
                    </tr>
                    <tr>
                        <th>Project Status:</th>
                        <td id="modalStatus"></td>
                    </tr>
                    <tr>
                        <th>Project Starting Date:</th>
                        <td id="modalStartDate"></td>
                    </tr>
                    <tr>
                        <th>Expected Completion:</th>
                        <td id="modalEndDate"></td> <!-- Added End Date here -->
                    </tr>
                    <tr>
                        <th>Project Category:</th>
                        <td id="modalCategory"></td>
                    </tr>
                    <tr>
                        <th>Progress:</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" id="modalProgress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                    0%
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to each "View Details" button
        const viewProjectButtons = document.querySelectorAll('.view-project');

        viewProjectButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get the project data from data attributes
                const title = this.getAttribute('data-title');
                const projectId = this.getAttribute('data-project-id');
                const status = this.getAttribute('data-status');
                const startDate = this.getAttribute('data-start-date');
                const endDate = this.getAttribute('data-end-date');
                const category = this.getAttribute('data-category');
                const progress = this.getAttribute('data-progress');

                // Update the modal with the project details
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalProjectId').textContent = projectId;
                document.getElementById('modalStatus').textContent = status;
                document.getElementById('modalStartDate').textContent = startDate;
                document.getElementById('modalEndDate').textContent = endDate;
                document.getElementById('modalCategory').textContent = category;

                // Update the progress bar
                const progressBar = document.getElementById('modalProgress');
                progressBar.style.width = progress + '%';
                progressBar.setAttribute('aria-valuenow', progress);
                progressBar.textContent = progress + '%';
            });
        });
    });

</script>
@endsection
