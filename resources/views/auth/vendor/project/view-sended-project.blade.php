@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Completed Sended Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Project Details : {{ $ProjectDetails->project_title }} !!!</h2>
        </div>
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

@endsection
