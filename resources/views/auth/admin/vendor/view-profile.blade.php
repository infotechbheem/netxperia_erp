@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Vendor Profile</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">View Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Registered Vendor</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-info table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Vendor Id</th>
                                <th>Name</th>
                                <th class="text-center">Designation</th>
                                <th>profile Image</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($vendors as $vendor)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $vendor->vendor_id }}</td>
                                <td>{{ $vendor->company_name }}</td>
                                <td class="text-center">{{ $vendor->designation }}</td>
                                <td>
                                    @if ($vendor->profile_image)
                                    <img src="data:image/jpeg;base64,{{ $vendor->profile_image }}" alt="Vendor Profile Image" width="100" height="100" style="border-radius: 10px">
                                    @else
                                    <img src="{{ asset('admin-asset/dist/img/user-avatar.jpg') }}" alt="Vendor Profile Image" width="100" height="100" style="border-radius: 10px">
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.vendor-profile.profile', $vendor->encrypted_vendor_id) }}" role="button"><i class="fas fa-folder mr-1"></i>Profile</a>
                                    <a class="btn btn-danger delete-btn" href="#" role="button"><i class="fas fa-trash mr-1"></i>Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
