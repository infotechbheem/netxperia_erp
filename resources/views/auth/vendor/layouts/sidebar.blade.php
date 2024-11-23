<style>
    .sidebar .navbar .navbar-nav .nav-link {
        padding: 8px 10px;
    }

</style>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <!-- Logo and Company Name -->
        <a href="{{ route('vendor.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                <img style="margin-top: -6px; height: 63px; margin-right: 10px;" width="50" src="{{ asset('custom-asset/image/netxperia-logo.png') }}" alt="">
                <span class="mt-4">Net Xperia</span>
            </h3>
        </a>

        <!-- Vendor Profile Info -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @if ($vendor->profile_image)
                <img class="rounded-circle" src="data:image/jpeg;base64,{{ $vendor->profile_image }}" alt="Vendor Image" style="width: 40px; height: 40px;">
                @else
                <img class="rounded-circle" src="{{ asset('custom-asset/avatar.png') }}" alt="Vendor Image" style="width: 40px; height: 40px;">
                @endif
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ $vendor->company_name }}</h6>
                <span>{{ $vendor->designation }}</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="navbar-nav w-100">
            <!-- Dashboard -->
            <a href="{{ route('vendor.dashboard') }}" class="nav-item nav-link {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <!-- Project Management Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('vendor.project*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                    <i class="fa fa-project-diagram me-2"></i>Projects
                </a>
                <div class="dropdown-menu bg-transparent border-0 {{ request()->routeIs('vendor.project*') ? 'show' : '' }}">
                    <a href="{{ route('vendor.project.current-project') }}" class="dropdown-item {{ request()->routeIs('vendor.project.current-project') ? 'active' : '' }}">
                        <i class="fa fa-tasks me-2"></i>Current Projects
                    </a>
                    <a href="{{ route('vendor.project.completed-project') }}" class="dropdown-item {{ request()->routeIs('vendor.project.completed-project') ? 'active' : '' }}">
                        <i class="fa fa-check me-2"></i>Completed Projects
                    </a>
                    <a href="{{ route('vendor.project.send-project') }}" class="dropdown-item {{ request()->routeIs('vendor.project.send-project') ? 'active' : '' }}">
                        <i class="fa fa-paper-plane me-2"></i>Send Project
                    </a>
                    <a href="{{ route('vendor.project.completed-sended-project') }}" class="dropdown-item {{ request()->routeIs('vendor.project.completed-sended-project') || request()->routeIs('vendor.project.view-sended-project') ? 'active' : '' }}">
                        <i class="fa fa-archive me-2"></i>Sended Projects
                    </a>
                    
                </div>
            </div>

            <!-- Payment Tracking -->
            <a href="{{ route('vendor.payments') }}" class="nav-item nav-link {{ request()->routeIs('vendor.payments*') ? 'active' : '' }}">
                <i class="fa fa-money-bill-alt me-2"></i>Payment Tracking
            </a>

            <!-- Resource Management -->
            <a href="{{ route('vendor.resources') }}" class="nav-item nav-link {{ request()->routeIs('vendor.resources') ? 'active' : '' }}">
                <i class="fa fa-boxes me-2"></i>Resources
            </a>

            <!-- Collaboration and Support -->
            <a href="{{ route('vendor.collaborations') }}" class="nav-item nav-link {{ request()->routeIs('vendor.collaborations') ? 'active' : '' }}">
                <i class="fa fa-handshake me-2"></i>Collaborations
            </a>
            <a href="{{ route('vendor.support') }}" class="nav-item nav-link {{ request()->routeIs('vendor.support') ? 'active' : '' }}">
                <i class="fa fa-life-ring me-2"></i>Support
            </a>

            <!-- Invoice Management -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('vendor.invoices*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                    <i class="fa fa-file-invoice me-2"></i>Invoices
                </a>
                <div class="dropdown-menu bg-transparent border-0 {{ request()->routeIs('vendor.invoices*') ? 'show' : '' }}">
                    <a href="" class="dropdown-item {{ request()->routeIs('vendor.invoices.pending') ? 'active' : '' }}">
                        <i class="fa fa-clock me-2"></i>Pending Invoices
                    </a>
                    <a href="" class="dropdown-item {{ request()->routeIs('vendor.invoices.paid') ? 'active' : '' }}">
                        <i class="fa fa-check me-2"></i>Paid Invoices
                    </a>
                    <a href="" class="dropdown-item {{ request()->routeIs('vendor.invoices.create') ? 'active' : '' }}">
                        <i class="fa fa-plus me-2"></i>Create Invoice
                    </a>
                </div>
            </div>

            <!-- Analytics and Reports -->
            <a href="{{ route('vendor.analytics') }}" class="nav-item nav-link {{ request()->routeIs('vendor.analytics') ? 'active' : '' }}">
                <i class="fa fa-chart-bar me-2"></i>Analytics & Reports
            </a>

            <!-- Settings and Logout -->
            <a href="" class="nav-item nav-link {{ request()->routeIs('vendor.settings') ? 'active' : '' }}">
                <i class="fa fa-cogs me-2"></i>Settings
            </a>
            <a href="{{ route('vendor.logout') }}" class="nav-item nav-link">
                <i class="fa fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
