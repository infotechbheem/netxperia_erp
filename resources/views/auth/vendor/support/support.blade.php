@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Vendor Support Page -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Vendor Support</h2>
        </div>
        <div class="card-body">

            <!-- Introduction Section -->
            <div class="mb-4 text-center">
                <p class="text-muted">Welcome to the Vendor Support page. Here, you will find resources to assist you with any issues or inquiries regarding our ERP solutions. Our goal is to ensure you have the support you need to succeed.</p>
            </div>

            <!-- Support Resources Section -->
            <div class="row mb-5">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/user-guide.png') }}" class="card-img-top" alt="User Guide">
                        <div class="card-body">
                            <h5 class="card-title">User Guides</h5>
                            <p class="card-text">Access detailed user guides to help you navigate our ERP software effectively.</p>
                            <a href="#" class="btn btn-secondary">View Guides</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/troubleshooting.png') }}" class="card-img-top" alt="Troubleshooting">
                        <div class="card-body">
                            <h5 class="card-title">Troubleshooting Tips</h5>
                            <p class="card-text">Find solutions to common issues faced while using our software.</p>
                            <a href="#" class="btn btn-secondary">Get Tips</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/faq.png') }}" class="card-img-top" alt="FAQ">
                        <div class="card-body">
                            <h5 class="card-title">FAQs</h5>
                            <p class="card-text">Browse our frequently asked questions for quick answers to common queries.</p>
                            <a href="#" class="btn btn-secondary">Browse FAQs</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Ticket Section -->
            <div class="mt-5">
                <h2 class="mb-4">Submit a Support Ticket</h2>
                <form>
                    <div class="mb-3">
                        <label for="issueType" class="form-label">Issue Type</label>
                        <select class="form-select" id="issueType">
                            <option selected>Select Issue Type</option>
                            <option value="technical">Technical Support</option>
                            <option value="billing">Billing Inquiry</option>
                            <option value="general">General Question</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Describe your issue here..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Ticket</button>
                </form>
            </div>

            <!-- Contact Support Section -->
            <div class="mt-5 text-center">
                <h3>Need Immediate Assistance?</h3>
                <p>If you require urgent support, please contact our support team directly.</p>
                <a href="#" class="btn btn-primary">Contact Support Team</a>
            </div>

        </div>
    </div>
</div>

@endsection
