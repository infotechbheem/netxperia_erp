@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee') }}">Employee</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee.project') }}">Project</a></li>
                        <li class="breadcrumb-item active">Create Project</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">Create New Project</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.employee.project.store-project') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Project Details Section -->
                    <h4 class="bg-warning p-3 rounded" style="font-family:monospace ">Project Details</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="project-title" class="form-lable">Project Title</label>
                                <input type="text" name="project_title" id="project-title" class="form-control" placeholder="Enter Project Title">
                                @error('project_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cproject-category" class="form-lable">Select Category</label>
                                <select name="project_category" id="project-category" class="form-control">
                                    <option value="">--Select Project Category--</option>
                                    @foreach ($Categories as $category)
                                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                                @error('project_category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="project-budget" class="form-lable">Project Budget</label>
                                <input id="project-budget" class="form-control" type="text" name="project_budget" placeholder="Enter Project Budget">
                                @error('project_budget')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="project-description" class="form-lable">Project Description</label>
                                <textarea id="project-description" class="form-control" cols="30" rows="3" name="project_description"></textarea>
                                @error('project_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="project-deadline" class="form-lable">Project Deadline</label>
                                <input id="project-deadline" class="form-control" type="date" name="project_deadline">
                                @error('project_deadline')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="project-created-by" class="form-lable">Created By</label>
                                <input id="project-created-by" class="form-control" type="text" name="project_created_by" placeholder="Project By">
                                @error('project_created_by')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="project-image" class="form-lable">Project Image</label>
                                <input id="project-image" class="form-control" type="file" name="project_image">
                                @error('project_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Client Information Section -->
                    <h4 class="bg-warning p-3 rounded" style="font-family:monospace ">Client Information</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client-name" class="form-lable">Client Name</label>
                                <input type="text" name="client_name" id="client-name" class="form-control" placeholder="Enter Client Name">
                                @error('client_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client-email" class="form-lable">Client Email</label>
                                <input type="email" name="client_email" id="client-email" class="form-control" placeholder="Enter Client Email">
                                @error('client_email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client-phone" class="form-lable">Client Phone</label>
                                <input type="text" name="client_phone" id="client-phone" class="form-control" placeholder="Enter Client Phone">
                                @error('client_phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="client-requirements" class="form-lable">Client Requirements</label>
                                <textarea id="client-requirements" class="form-control" cols="30" rows="3" name="client_requirements" placeholder="Enter Client Requirements"></textarea>
                                @error('client_requirements')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Project Timeline Section -->
                    <h4 class="bg-warning p-3 rounded" style="font-family:monospace ">Project Timeline</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start-date" class="form-lable">Start Date</label>
                                <input type="date" name="start_date" id="start-date" class="form-control">
                                @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end-date" class="form-lable">End Date</label>
                                <input type="date" name="end_date" id="end-date" class="form-control">
                                @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="milestones" class="form-lable">Milestones</label>
                                <input type="text" name="milestones" id="milestones" class="form-control" placeholder="Key Milestones">
                                @error('milestones')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Resources Section -->
                    <h4 class="bg-warning p-3 rounded" style="font-family:monospace ">Resources</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="team-members" class="form-lable">Team Members</label>
                                <textarea id="team-members" class="form-control" cols="30" rows="3" name="team_members" placeholder="Enter Team Members (Comma Separated)"></textarea>
                                @error('team_members')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="technologies" class="form-lable">Technologies Used</label>
                                <textarea id="technologies" class="form-control" cols="30" rows="3" name="technologies" placeholder="Enter Technologies Used"></textarea>
                                @error('technologies')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="budget" class="form-lable">Resource Budget</label>
                                <input type="text" name="resource_budget" id="resource-budget" class="form-control" placeholder="Enter Resource Budget">
                                @error('resource_budget')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
