@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Resources Page -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Resources</h2>
        </div>
        <div class="card-body">

            <!-- Description Section -->
            <div class="mb-4 text-center">
                <p class="text-muted">Explore our comprehensive resources to enhance your projects and collaborations. Here you'll find guides, tools, and more to support your work.</p>
            </div>

            <!-- Search Bar -->
            <div class="mb-4 text-center">
                <input type="text" class="form-control w-50 d-inline" placeholder="Search for resources...">
                <button class="btn btn-primary">Search</button>
            </div>

            <!-- Resource Categories -->    
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/resource-guides.png') }}" class="card-img-top" alt="Guides">
                        <div class="card-body">
                            <h5 class="card-title">Guides</h5>
                            <p class="card-text">In-depth guides to help you navigate various processes and enhance your projects.</p>
                            <a href="" class="btn btn-primary">View Guides</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/resource-tools.png') }}" class="card-img-top" alt="Tools">
                        <div class="card-body">
                            <h5 class="card-title">Tools</h5>
                            <p class="card-text">Access tools that can streamline your work processes and improve efficiency.</p>
                            <a href="" class="btn btn-primary">Access Tools</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('custom-asset/image/resource-webinars.png') }}" class="card-img-top" alt="Webinars">
                        <div class="card-body">
                            <h5 class="card-title">Webinars</h5>
                            <p class="card-text">Join our live webinars to learn from experts and enhance your knowledge.</p>
                            <a href="" class="btn btn-primary">Join Webinars</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Resources Section -->
            <div class="mt-5">
                <h2 class="mb-4">Featured Resources</h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('custom-asset/image/featured-resource-1.png') }}" class="card-img-top" alt="Featured Resource 1">
                            <div class="card-body">
                                <h5 class="card-title">Understanding Project Management</h5>
                                <p class="card-text">A comprehensive guide that covers the essentials of project management.</p>
                                <a href="" class="btn btn-secondary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('custom-asset/image/featured-resource-2.png') }}" class="card-img-top" alt="Featured Resource 2">
                            <div class="card-body">
                                <h5 class="card-title">Top Tools for Vendors</h5>
                                <p class="card-text">Explore the most effective tools to improve your vendor management.</p>
                                <a href="" class="btn btn-secondary">Explore Tools</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conclusion Section -->
            <div class="mt-5 text-center">
                <h3>Need Help?</h3>
                <p>If you have any questions or need assistance, feel free to reach out to our support team.</p>
                <a href="" class="btn btn-primary">Contact Support</a>
            </div>

        </div>
    </div>
</div>

@endsection
