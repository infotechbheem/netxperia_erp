@extends('auth.admin.layouts.app')

@section('main-container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Client</a></li>
                        <li class="breadcrumb-item active">Client Project Requested</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h4 class="card-title">View Project Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Project ID:</strong>
                            <span class="text-muted">{{ $project->project_id }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Client ID:</strong>
                            <span class="text-muted">{{ $project->client_id }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Title:</strong>
                            <span class="text-muted">{{ $project->title }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Description:</strong>
                            <span class="text-muted">{{ $project->description }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Category:</strong>
                            <span class="text-muted">{{ $project->category }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Start Date:</strong>
                            <span class="text-muted">{{ \Carbon\Carbon::parse($project->start_date)->format('d-m-Y') }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>End Date:</strong>
                            <span class="text-muted">{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('d-m-Y') : 'N/A' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Budget:</strong>
                            <span class="text-muted">₹ {{ number_format($project->budget, 2) }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Priority:</strong>
                            <span class="text-muted">{{ ucfirst($project->priority) }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Project Status:</strong>
                            <span class="text-muted">{{ $project->project_status }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Completion Date:</strong>
                            <span class="text-muted">{{ $project->completeDateTime ? \Carbon\Carbon::parse($project->completeDateTime)->format('d-m-Y H:i') : 'N/A' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Projects Assigned:</strong>
                            <span class="text-muted">{{ $project->projects_assigned ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <strong>Documents:</strong>
                            <div id="documents">
                                @php
                                    // Decode and check if the documents are stored as an array
                                    $documents = json_decode($project->documents, true);
                                @endphp

                                @if(is_array($documents) && !empty($documents))
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Document Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($documents as $document)
                                                @if(is_array($document) && isset($document['name'], $document['path']))
                                                    <tr>
                                                        <td>{{ $document['name'] }}</td>
                                                        <td>
                                                            <!-- View Button -->
                                                            <a href="{{ asset('storage/' . $document['path']) }}" target="_blank" class="btn btn-primary btn-sm">
                                                                View
                                                            </a>
                                                            <!-- Download Button -->
                                                            <a href="{{ asset('storage/' . $document['path']) }}" download class="btn btn-secondary btn-sm">
                                                                Download
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <span class="text-muted">No documents available.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
