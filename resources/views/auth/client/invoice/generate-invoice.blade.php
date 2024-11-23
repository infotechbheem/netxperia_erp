@extends('auth.client.layouts.app')

@section('main-container')
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Generate New Invoice</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="project_id" class="form-label">Select Project</label>
                        <select id="project_id" name="project_id" class="form-control">
                            {{-- @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="issued_date" class="form-label">Issued Date</label>
                        <input type="date" class="form-control" id="issued_date" name="issued_date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Generate Invoice</button>
            </form>
        </div>
    </div>
</div>
@endsection
