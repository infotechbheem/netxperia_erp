 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-light navbar-light">
         <a href="{{ route('employee.dashboard') }}" class="navbar-brand mx-4 mb-3">
             <h3 class="text-primary"><img style="margin-top: -6px; height: 63px; margin-right: 10px;" width="50" src="{{ asset('custom-asset/image/netxperia-logo.png') }}" alt=""><span class="mt-4">NETXPERIA</span></h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="data:image/jpeg;base64,{{ $employee->profile_image }}" alt="NetXperia" style="width: 40px; height: 40px;">
                 <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
             </div>
             <div class="ms-3">
                 <h6 class="mb-0">{{ $employee->name }}</h6>
                 <span>{{ $employee->designation ?? "N/A" }}</span>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <a href="{{ route('employee.dashboard') }}" class="nav-item nav-link {{ request()->routeIs('employee.dashboard') ? "active" : "" }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

             <!-- Projects Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('employee.project*') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="{{ request()->routeIs('employee.project*') ? 'true' : 'false' }}" aria-haspopup="true">
                     <i class="fa fa-project-diagram me-2"></i>Projects
                 </a>
                 <div class="dropdown-menu bg-transparent border-0 {{ request()->routeIs('employee.project*') ? 'show' : '' }}">
                     <a href="{{ route('employee.project.current-project') }}" class="dropdown-item {{ request()->routeIs('employee.project.current-project') ? 'active' : '' }}">
                         <i class="fa fa-folder me-2"></i>Current Projects
                     </a>
                     <a href="{{ route('employee.project.completed-project') }}" class="dropdown-item {{ request()->routeIs('employee.project.completed-project') ? 'active' : '' }}">
                         <i class="fa fa-check-circle me-2"></i>Completed Projects
                     </a>
                 </div>
             </div>

             <!-- Performance Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-chart-bar me-2"></i>Performance
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-eye me-2"></i>View Performance
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-file-alt me-2"></i>Performance Reports
                     </a>
                 </div>
             </div>

             <!-- Attendance Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('employee.attendance*') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="{{ request()->routeIs('employee.attendance*') ? 'true' : 'false' }}" data-bs-toggle="dropdown">
                     <i class="fa fa-user-clock me-2"></i>Attendance
                 </a>
                 <div class="dropdown-menu bg-transparent border-0 {{ request()->routeIs('employee.attendance*') ? 'show' : '' }}">
                     <a href="{{ route('employee.attendance.mark-attendance') }}" class="dropdown-item {{ request()->routeIs('employee.attendance.mark-attendance') ? 'active' : '' }}">
                         <i class="fa fa-calendar-check me-2"></i>Mark Attendance
                     </a>
                     <a href="{{ route('employee.attendance.history') }}" class="dropdown-item  {{ request()->routeIs('employee.attendance.history') ? 'active' : '' }}">
                         <i class="fa fa-history me-2"></i>Attendance History
                     </a>
                    <a href="{{ route('employee.attendance.apply-leave') }}" class="dropdown-item {{ request()->routeIs('employee.attendance.apply-leave') ? 'active' : '' }}">
                        <i class="fa fa-paper-plane me-2"></i>Apply Leave
                    </a>        
                    <a href="{{ route('employee.attendance.leave') }}" class="dropdown-item {{ request()->routeIs('employee.attendance.leave') ? 'active' : '' }}">
                        <i class="fa fa-calendar-alt me-2"></i>Employee Leave
                    </a>
                    <a href="{{ route('employee.attendance.track-application') }}" class="dropdown-item {{ request()->routeIs('employee.attendance.track-application') ? 'active' : '' }}">
                        <i class="fa fa-clipboard-list me-2"></i>Track Leave Application
                    </a>                           
                 </div>
             </div>

             <!-- Salary Management Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-money-bill-wave me-2"></i>Salary Area
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-eye me-2"></i>View Salary
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-history me-2"></i>Salary History
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-file-invoice-dollar me-2"></i>Generate Salary Slip
                     </a>
                 </div>
             </div>

             <!-- Employee Benefits Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-heart me-2"></i>Employee Benefits
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-eye me-2"></i>View Benefits
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-file-alt me-2"></i>Claim Benefits
                     </a>
                 </div>
             </div>

             <!-- Notifications Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-bell me-2"></i>Notifications
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-info-circle me-2"></i>View Notifications
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-cog me-2"></i>Notification Settings
                     </a>
                 </div>
             </div>

             <!-- Help & Support Dropdown -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-question-circle me-2"></i>Help & Support
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-ticket-alt me-2"></i>Support Tickets
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-envelope me-2"></i>Contact Support
                     </a>
                 </div>
             </div>

             <!-- Chat Section -->
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-comments me-2"></i>Chat
                 </a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-comment-dots me-2"></i>Active Chats
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-users me-2"></i>Group Chats
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="fa fa-cog me-2"></i>Chat Settings
                     </a>
                 </div>
             </div>
         </div>

     </nav>
 </div>
 <!-- Sidebar End -->
