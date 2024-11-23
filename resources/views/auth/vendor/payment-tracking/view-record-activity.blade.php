@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- View Record Activity Page -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Activity Log for NGO Registration</h2>
            <h5 class="text-center">Client: Client A | Project Fee: $500 | Status: Paid | Payment Date: Jan 15, 2024</h5>
        </div>
        <div class="card-body">

            <!-- Activity Log Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity Type</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jan 16, 2024</td>
                        <td>Payment Processed</td>
                        <td>Payment of $500 processed by the company.</td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Jan 20, 2024</td>
                        <td>Payment Follow-up</td>
                        <td>Followed up with the company regarding payment status.</td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Feb 1, 2024</td>
                        <td>Client Communication</td>
                        <td>Communicated with Client A about project progress.</td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <!-- Additional activity rows can be added here -->
                </tbody>
            </table>

            <!-- Button to Record New Activity -->
            <div class="text-center mt-4">
                <a href="" class="btn btn-primary">Record New Activity</a>
            </div>
        </div>
    </div>
</div>

@endsection
