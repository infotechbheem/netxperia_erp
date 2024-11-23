 <!-- Navbar Start -->
 <nav class="navbar navbar-expand sticky-top px-4 py-0" style="background: rgba(255, 166, 0, 0.783)">
     <a href="{{ route('client.dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
         <h2 class="text-primary mb-0"><img style="width: 47px; height:60px" src="{{ asset('custom-asset/image/netxperia-logo.png') }}" width="40" alt="NetXperia"></h2>
     </a>
     <a href="#" class="sidebar-toggler flex-shrink-0">
         <i class="fa fa-bars"></i>
     </a>
     <form class="d-none d-md-flex ms-4">
         <input class="form-control border-0" type="search" placeholder="Search">
     </form>
     <div class="navbar-nav align-items-center ms-auto">
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <i class="fa fa-envelope me-lg-2"></i>
                 <span class="d-none d-lg-inline-flex">Message</span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                 <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <img class="rounded-circle" src="{{ asset('employee-asset/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                             <small>15 minutes ago</small>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <img class="rounded-circle" src="{{ asset('employee-asset/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                             <small>15 minutes ago</small>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <img class="rounded-circle" src="{{ asset('employee-asset/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                             <small>15 minutes ago</small>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item text-center">See all message</a>
             </div>
         </div>
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <i class="fa fa-bell me-lg-2"></i>
                 <span class="d-none d-lg-inline-flex">Notificatin</span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                 <a href="#" class="dropdown-item">
                     <h6 class="fw-normal mb-0">Profile updated</h6>
                     <small>15 minutes ago</small>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item">
                     <h6 class="fw-normal mb-0">New user added</h6>
                     <small>15 minutes ago</small>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item">
                     <h6 class="fw-normal mb-0">Password changed</h6>
                     <small>15 minutes ago</small>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item text-center">See all notifications</a>
             </div>
         </div>
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 @if ($vendor->profile_image)
                 <img class="rounded-circle me-lg-2" src="data:image/jpeg;base64,{{ $vendor->profile_image }}" alt="Client Image" style="width: 40px; height: 40px;">
                 @else
                 <img class="rounded-circle me-lg-2" src="{{ asset('custom-asset/avatar.png') }}" alt="Client Image" style="width: 40px; height: 40px;">
                 @endif
                 <span class="d-none d-lg-inline-flex">{{ $vendor->company_name }}</span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                 <a href="{{ route('employee.profile') }}" class="dropdown-item">My Profile</a>
                 <a href="#" class="dropdown-item">Settings</a>
                 <a href="{{ route('vendor.logout') }}" class="dropdown-item">Log Out</a>
             </div>
         </div>
     </div>
 </nav>
 <!-- Navbar End -->
