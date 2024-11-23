@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee.project') }}">Poject</a></li>
                        <li class="breadcrumb-item active">Project Category </a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Create Project Category</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Project Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($projectCategories as $category)
                                <tr>
                                    <td>{{ $count ++  }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>
                                        <a href="{{ route('admin.project-category.delete', $category->category) }}" class="btn btn-danger delete-btn"><i class="fas fa-trash mr-1"></i>Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="height: auto; background:black; margin:0px 28px">
                        <div style="border:1px solid black"></div>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.project-category.create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Project Category</label>
                                        <input class="form-control" type="project_category" name="project_category" id="project-category" placeholder="Enter Project Category">
                                        @error('project_category')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mt-3">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
