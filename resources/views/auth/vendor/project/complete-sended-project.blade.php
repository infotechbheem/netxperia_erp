@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Completed Sended Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Completed Sended Projects</h2>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($completedProjects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $project->project_title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Description : </strong> {{ $project->project_description }}</p>
                            <p class="card-text"><strong>Sent On : </strong> {{ \Carbon\Carbon::parse($project->created_at)->format('M d , Y') }}</p>
                            <p class="card-text"><strong>Status : </strong> {{ "Sended" }}</p>
                            <a href="{{ route('vendor.project.view-sended-project', $project->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($completedProjects->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                No sended projects found.
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
