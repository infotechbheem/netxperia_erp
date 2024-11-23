@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendor Complated Projecty</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor-profile') }}">Vendor</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor.project.current-project') }}">Project</a></li>
                        <li class="breadcrumb-item active">View Completed Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <p><Strong>Vendor Id : </Strong>{{ $ProjectDetails->vendor_id }}</p>
                    <p><Strong>Project Id : </Strong>{{ $ProjectDetails->project_id }}</p>
                    <p><strong>Project Description : </strong>{{ $ProjectDetails->project_description }}</p>
                    <p><strong>Sended Date & Time : </strong>{{ \Carbon\Carbon::parse($ProjectDetails->created_at)->format('d M Y') }} & {{ \Carbon\Carbon::parse($ProjectDetails->created_at)->format('H:i:s') }}</p>
                    <p>
                        <strong>Project Files</strong>
                        <div id="documents">
                            @php
                            // Decode and check if the documents are stored as an array
                            $documents = json_decode($ProjectDetails->attach_file, true);
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
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
