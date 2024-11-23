@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Send Project to Company -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Send Project to the Company</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('vendor.project.store-send-project') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="project_id" class="col-md-2 col-form-label">Select Project</label>
                    <div class="col-md-10">
                        <select id="project_id" name="project_id" class="form-select" required>
                            <option value="">Choose a project...</option>
                            @foreach ($completedProject as $project)
                                <option value="{{ $project->project_id }}">{{ $project->project_title }}</option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="message" class="col-md-2 col-form-label">Message (Optional)</label>
                    <div class="col-md-10">
                        <textarea id="message" name="message" class="form-control" rows="3" placeholder="Add any additional message..."></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="files" class="col-md-2 col-form-label">Attach Project Files</label>
                    <div class="col-md-10">
                        <small class="text-muted">You can attach multiple files (PDF, DOC, images) related to the project.</small>
                        <input type="file" id="files" name="files[]" class="form-control" multiple required>
                        @error('files.*')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Send Project</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
