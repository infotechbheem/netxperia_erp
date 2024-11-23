@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Collaborations Page -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Vendor Collaborations</h2>
        </div>
        <div class="card-body">

            <!-- Description Section -->
            <div class="mb-4 text-center">
                <p class="text-muted">Welcome to the Vendor Collaboration page. Here, we connect with partners to enhance our ERP solutions and drive mutual growth. Explore collaboration opportunities, joint projects, and resource sharing.</p>
            </div>

            <!-- Collaboration Opportunities Section -->
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/erp-integration.png') }}" class="card-img-top" alt="ERP Integration">
                        <div class="card-body">
                            <h5 class="card-title">ERP Integration Partners</h5>
                            <p class="card-text">Partner with us for seamless integration of your solutions with our ERP software.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/joint-project.png') }}" class="card-img-top" alt="Joint Projects">
                        <div class="card-body">
                            <h5 class="card-title">Joint Projects</h5>
                            <p class="card-text">Explore opportunities for collaborative projects that leverage our combined expertise.</p>
                            <a href="#" class="btn btn-primary">Explore Projects</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/networking-events.png') }}" class="card-img-top" alt="Networking Events">
                        <div class="card-body">
                            <h5 class="card-title">Networking Events</h5>
                            <p class="card-text">Join our networking events to meet potential collaborators and expand your network.</p>
                            <a href="#" class="btn btn-primary">Join Events</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Collaborations Section -->
            <div class="mt-5">
                <h2 class="mb-4">Current Collaborations</h2>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Collaboration with Company A</h5>
                        <p class="mb-1">This project focuses on enhancing ERP functionalities with Company A's innovative solutions.</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Joint Initiative with Company B</h5>
                        <p class="mb-1">Aiming to integrate our systems to provide a comprehensive ERP experience.</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Project with Company C</h5>
                        <p class="mb-1">Working together to develop a new module for our ERP system tailored for small businesses.</p>
                    </a>
                </div>
            </div>

            <!-- Resources for Vendors Section -->
            <div class="mt-5">
                <h2 class="mb-4">Resources for Collaborating Vendors</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('custom-asset/image/integration-guide.png') }}" class="card-img-top" alt="Integration Guide">
                            <div class="card-body">
                                <h5 class="card-title">Integration Guide</h5>
                                <p class="card-text">Download our comprehensive guide for integrating with our ERP system.</p>
                                <a href="#" class="btn btn-secondary" target="_blank">Download Guide</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('custom-asset/image/collaboration-template.png') }}" class="card-img-top" alt="Collaboration Template">
                            <div class="card-body">
                                <h5 class="card-title">Collaboration Proposal Template</h5>
                                <p class="card-text">Use our template to create effective collaboration proposals.</p>
                                <a href="#" class="btn btn-secondary" target="_blank">Download Template</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('custom-asset/image/webinar.png') }}" class="card-img-top" alt="Webinar">
                            <div class="card-body">
                                <h5 class="card-title">Upcoming Webinars</h5>
                                <p class="card-text">Join our webinars to learn more about effective collaboration strategies.</p>
                                <a href="#" class="btn btn-secondary">View Webinars</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conclusion Section -->
            <div class="mt-5 text-center">
                <h3>Ready to Collaborate?</h3>
                <p>If you're interested in exploring partnership opportunities, reach out to our collaboration team.</p>
                <a href="#" class="btn btn-primary">Contact Us</a>
            </div>

        </div>
    </div>
</div>

@endsection
