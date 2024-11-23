 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-light navbar-light">
         <a href="{{ route('client.dashboard') }}" class="navbar-brand mx-4 mb-3">
             <h3 class="text-primary"><img style="margin-top: -6px; height: 63px; margin-right: 10px;" width="50" src="{{ asset('custom-asset/image/netxperia-logo.png') }}" alt=""><span class="mt-4">NETXPERIA</span></h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 @if ($client->profile_image)
                 <img class="rounded-circle" src="data:image/jpeg;base64,{{ $client->profile_image }}" alt="Image" style="width: 40px; height: 40px;">
                 @else
                 <img class="rounded-circle" src="{{ asset('custom-asset/avatar.png') }}" alt="Image" style="width: 40px; height: 40px;">
                 @endif
                 <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
             </div>
             <div class="ms-3">
                 <h6 class="mb-0">{{ $client->name }}</h6>
                 <span>{{ "Client" }}</span>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <!-- Dashboard -->
             <a href="{{ route('client.dashboard') }}" class="nav-item nav-link {{ request()->routeIs('client.dashboard') ? "active" : "" }}">
                 <i class="fa fa-tachometer-alt me-2"></i>Dashboard
             </a>

             <!-- Profile Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <i class="fa fa-user me-2"></i>Profile
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-eye me-2"></i>View/Edit Profile Information
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-key me-2"></i>Change Password
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-cogs me-2"></i>Account Settings
                     </a>
                 </div>
             </div>

             <!-- Projects Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('client.project*') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="{{ request()->routeIs('client.project*') ? 'true' : 'false' }}">
                     <i class="fa fa-th me-2"></i>Projects
                 </a>
                 <div class="dropdown-menu bg-transparent border-0 {{ request()->routeIs('client.project*') ? 'show' : '' }}">
                     <a href="{{ route('client.project.current-project') }}" class="dropdown-item {{ request()->routeIs('client.project.current-project') ? 'active' : '' }}">
                         <i class="fa fa-folder me-2"></i>Current Projects
                     </a>
                     <a href="{{ route('client.project.completed-project') }}" class="dropdown-item {{ request()->routeIs('client.project.completed-project') ? 'active' : '' }}">
                         <i class="fa fa-check-circle me-2"></i>Completed Projects
                     </a>
                     <a href="#" class="dropdown-item {{ request()->routeIs('client.project.proposals') ? 'active' : '' }}">
                         <i class="fa fa-file-alt me-2"></i>Project Proposals
                     </a>
                     <a href="{{ route('client.project.create-project') }}" class="dropdown-item {{ request()->routeIs('client.project.create-project') ? 'active' : '' }}">
                         <i class="fa fa-plus me-2"></i>Create New Project
                     </a>
                 </div>
             </div>




             <!-- Invoices Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('client.invoice*') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="{{ request()->routeIs('client.invoice*') ? 'true' : 'false' }}">
                     <i class="fa fa-file-invoice me-2"></i>Invoices
                 </a>
                 <div class="dropdown-menu bg-transparent border-0 {{ request()->routeIs('client.invoice*') ? 'show' : '' }}">
                     <a href="{{ route('client.invoice.view-invoice') }}" class="dropdown-item {{ request()->routeIs('client.invoice.view-invoice') || request()->routeIs('client.invoice.view-project-invoice') ? 'active' : '' }}">
                         <i class="fa fa-eye me-2"></i>View Invoices
                     </a>
                     <a href="{{ route('client.invoice.payment-history') }}" class="dropdown-item {{ request()->routeIs('client.invoice.payment-history') ? 'active' : '' }}">
                         <i class="fa fa-history me-2"></i>Payment History
                     </a>
                 </div>
             </div>


             <!-- Communication Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('client.communication*') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="{{ request()->routeIs('client.communication*') ? 'true' : 'false' }}">
                     <i class="fa fa-comments me-2"></i>Communication
                 </a>
                 <div class="dropdown-menu bg-transparent border-0 {{ request()->routeIs('client.communication*') ? 'show' : '' }}">
                     <a href="" class="dropdown-item {{ request()->routeIs('client.communication.messages') ? 'active' : '' }}">
                         <i class="fa fa-comment-dots me-2"></i>Messages/Chat
                     </a>
                     <a href="{{ route('client.communication.support-tickets') }}" class="dropdown-item {{ request()->routeIs('client.communication.support-tickets') || request()->routeIs('client.communication.view-support-ticket') ? 'active' : '' }}">
                         <i class="fa fa-ticket-alt me-2"></i>Support Tickets
                     </a>
                     <a href="{{ route('client.communication.contact-support') }}" class="dropdown-item {{ request()->routeIs('client.communication.contact-support') ? 'active' : '' }}">
                         <i class="fa fa-headset me-2"></i>Contact Support
                     </a>
                 </div>
             </div>

             <!-- Documents Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <i class="fa fa-folder-open me-2"></i>Documents
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-upload me-2"></i>Upload Documents
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-eye me-2"></i>View Shared Documents
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-download me-2"></i>Download Forms
                     </a>
                 </div>
             </div>

             <!-- Reports Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <i class="fa fa-chart-line me-2"></i>Reports
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-eye me-2"></i>View Reports
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-file-export me-2"></i>Generate Custom Reports
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-download me-2"></i>Download Reports
                     </a>
                 </div>
             </div>

             <!-- Settings Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <i class="fa fa-cogs me-2"></i>Settings
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-bell me-2"></i>Notification Preferences
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-language me-2"></i>Language Preferences
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-user-shield me-2"></i>Privacy Settings
                     </a>
                 </div>
             </div>

             <!-- Logout -->
             <div class="nav-item">
                 <a href="#" class="nav-link">
                     <i class="fa fa-sign-out-alt me-2"></i>Logout
                 </a>
             </div>
         </div>
     </nav>
 </div>
 <!-- Sidebar End -->
