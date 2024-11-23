@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Hosting Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.client') }}">Client</a></li>
                        <li class="breadcrumb-item active">Add Hosting Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h4>Add Client Hosting Details</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.client.hosting.save-hosting-details') }}" method="POST">
                        @csrf
                        <!-- Client Selection -->
                        <div class="form-group">
                            <label for="client_id">Select Client</label>
                            <select name="client_id" id="client_id" class="form-control" required>
                                <option value="">-- Select Client --</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->client_id }}" {{ old('client_id') == $client->client_id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hosting Details -->
                        <div class="form-group">
                            <label for="hosting_provider">Hosting Provider</label>
                            <input type="text" name="hosting_provider" id="hosting_provider" class="form-control" placeholder="Enter Hosting Provider" value="{{ old('hosting_provider') }}" required>
                            @error('hosting_provider')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="plan_name">Plan Name</label>
                            <input type="text" name="plan_name" id="plan_name" class="form-control" placeholder="Enter Plan Name" value="{{ old('plan_name') }}" required>
                            @error('plan_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="start_date">Plan Purchased Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
                            @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date">Plan Expiry Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
                            @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount Paid (₹)</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount Paid" value="{{ old('amount') }}" required>
                            @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="form-group">
                            <label for="notes">Additional Notes</label>
                            <textarea name="notes" id="notes" class="form-control" rows="4" placeholder="Enter any additional information">{{ old('notes') }}</textarea>
                            @error('notes')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save Hosting Details</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
