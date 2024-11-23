@extends('auth.client.layouts.app')

@section('main-container')
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="m-0">Contact Support</h4>
            <p class="text-muted">Need help? Fill out the form below to get in touch with our support team.</p>
        </div>
        <div class="card-body">
            <form id="contactSupportForm">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" placeholder="Subject of your message" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Write your message here..." required></textarea>
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority Level</label>
                    <select class="form-select" id="priority" required>
                        <option value="" disabled selected>Select priority level</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Contact Information</h5>
            </div>
            <div class="card-body">
                <h6>For Immediate Assistance:</h6>
                <p>If you need immediate assistance, please contact us through the following channels:</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-phone me-2"></i><strong>Phone:</strong> +1 234 567 890</li>
                    <li><i class="fa fa-envelope me-2"></i><strong>Email:</strong> support@example.com</li>
                    <li><i class="fa fa-clock me-2"></i><strong>Business Hours:</strong> Mon-Fri, 9 AM - 5 PM</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Message Sent!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Thank you for contacting support. We will get back to you shortly.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.getElementById('contactSupportForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Logic to handle form submission, e.g., AJAX request
        // On success, show the success modal
        $('#successModal').modal('show');
        // Reset form fields
        this.reset();
    });
</script>
@endsection
@endsection
