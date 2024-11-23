  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
          <img src="{{ asset('custom-asset/image/netxperia-logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">NetXperia</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin-asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                  <li class="nav-item {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.notice') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.notice') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v1</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.notice') }}" class="nav-link {{ request()->routeIs('admin.notice') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Notice Board</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.notice') }}" class="nav-link {{ request()->routeIs('admin.notice') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Client Dashboard</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.notice') }}" class="nav-link {{ request()->routeIs('admin.notice') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Employee Dashboard</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.notice') }}" class="nav-link {{ request()->routeIs('admin.notice') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Vendor Dashboard</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Employee Area Start -->
                  <li class="nav-header text-white">Employee Area</li>

                  <!-- Department & Designation -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.department-designation') ? 'menu-open' : '' }}">
                      <a href="{{ route('admin.employee.department-designation') }}" class="nav-link {{ request()->routeIs('admin.employee.department-designation') ? 'active' : '' }}">
                          <i class=" nav-icon fas fa-business-time"></i>
                          <p>Department/Designation</p>
                      </a>
                  </li>

                  <!-- Employee Registered -->
                  <li class="nav-item {{ request()->routeIs('admin.employee') || request()->routeIs('admin.employee.profile') ? 'menu-open' : '' }}">
                      <a href="{{ route('admin.employee') }}" class="nav-link {{ request()->routeIs('admin.employee') || request()->routeIs('admin.employee.profile') ? 'active' : '' }}">
                          <i class=" nav-icon fas fa-users-cog"></i>
                          <p>Employee Registered</p>
                      </a>
                  </li>

                  <!-- Employee Registration -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.registration') ? 'menu-open' : '' }}">
                      <a href="{{ route('admin.employee.registration') }}" class="nav-link {{ request()->routeIs('admin.employee.registration') ? 'active' : '' }}">
                          <i class=" nav-icon fas fa-file-alt"></i>
                          <p>Employee Registration</p>
                      </a>
                  </li>

                  <!-- Employee Performance -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.performance') ? 'menu-open' : '' }}">
                      <a href="{{ route('admin.employee.performance') }}" class="nav-link {{ request()->routeIs('admin.employee.performance') ? 'active' : '' }}">
                          <i class=" nav-icon fas fa-chart-line"></i>
                          <p>Employee Performance</p>
                      </a>
                  </li>

                  <!-- Project Management -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.project*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.employee.project*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-project-diagram"></i>
                          <p>Projects<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.project') }}" class="nav-link {{ request()->routeIs('admin.employee.project') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Project Assigned</p>
                              </a>
                          </li>
                          <li class="nav-item {{ request()->routeIs('admin.employee.project.project-category') ? 'menu-open' : '' }}">
                              <a href="{{ route('admin.employee.project.project-category') }}" class="nav-link {{ request()->routeIs('admin.employee.project.project-category') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Project Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.project.create-project') }}" class="nav-link {{ request()->routeIs('admin.employee.project.create-project') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create IT Project</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.project.assign-project') }}" class="nav-link {{ request()->routeIs('admin.employee.project.assign-project') || request()->routeIs('admin.employee.project.view-project') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Assign Project</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Employee Attendance Tracking -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.attendance*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.employee.attendance*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-clock"></i>
                          <p>Attendance<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.attendance.view') }}" class="nav-link {{ request()->routeIs('admin.employee.attendance.view') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Attendance</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.attendance.schedule') }}" class="nav-link {{ request()->routeIs('admin.employee.attendance.schedule') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Schedule</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.attendance.create') }}" class="nav-link {{ request()->routeIs('admin.employee.attendance.create') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Mark Attendance</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.attendance.log') }}" class="nav-link {{ request()->routeIs('admin.employee.attendance.log') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Attendance Log</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Leave Management -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.leave*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.employee.leave*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-calendar-alt"></i>
                          <p>Leave Management<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.leave-request') }}" class="nav-link {{ request()->routeIs('admin.employee.leave-request') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Leave Requests</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.employee.leave') }}" class="nav-link {{ request()->routeIs('admin.employee.leave') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Employee Leave</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Performance & Appraisals -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.appraisal*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.employee.appraisal*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-star"></i>
                          <p>Appraisals<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link {{ request()->routeIs('admin.employee.appraisal') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Appraisal Dashboard</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link {{ request()->routeIs('admin.employee.appraisal.create') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Conduct Appraisal</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Training & Development -->
                  <li class="nav-item {{ request()->routeIs('admin.employee.training*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.employee.training*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-chalkboard-teacher"></i>
                          <p>Training<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link {{ request()->routeIs('admin.employee.training') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Training Dashboard</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link {{ request()->routeIs('admin.employee.training.create') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Assign Training</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Employee Area End -->



                  <!-- Client Area Start -->
                  <li class="nav-header text-white">Client Area</li>

                  <!-- Registered Client -->
                  <li class="nav-item {{ request()->routeIs('admin.client') || request()->routeIs('admin.client.profile*') ? 'menu-open' : '' }}">
                      <a href="{{ route('admin.client') }}" class="nav-link {{ request()->routeIs('admin.client') || request()->routeIs('admin.client.profile*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-user-shield"></i>
                          <p>Registered Client</p>
                      </a>
                  </li>

                  <!-- Client Registration -->
                  <li class="nav-item {{ request()->routeIs('admin.client.registration')  ? 'menu-open' : '' }}">
                      <a href="{{ route('admin.client.registration') }}" class="nav-link {{ request()->routeIs('admin.client.registration') ? 'active' : '' }}">
                          <i class="nav-icon far fa-registered"></i>
                          <p>Client Registration</p>
                      </a>
                  </li>

                  <!-- Client Hosting Details -->
                  <li class="nav-item {{ request()->routeIs('admin.client.hosting*')  ? 'menu-open' : '' }}">
                      <a href="" class="nav-link {{ request()->routeIs('admin.client.hosting*') ? 'active' : '' }}">
                          <i class="nav-icon far fa-registered"></i>
                          <p>Hosting Details<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.client.hosting') }}" class="nav-link {{ request()->routeIs('admin.client.hosting') || request()->routeIs('admin.client.hosting.hosting-details-view') ? "active" : ""}}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Hosting Details</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.client.hosting.add-hosting-details') }}" class="nav-link {{ request()->routeIs('admin.client.hosting.add-hosting-details') ? "active" : ""}}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Hosting Details</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Project Management Dropdown -->
                  <li class="nav-item {{ request()->routeIs('admin.client.project*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.client.project*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-project-diagram"></i>
                          <p>Projects<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.client.project.current-project') }}" class="nav-link {{ request()->routeIs('admin.client.project.current-project') ? "active" : "" }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Current Projects</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.client.project.requested-project') }}" class="nav-link {{ request()->routeIs('admin.client.project.requested-project') || request()->routeIs('admin.client.project.view-requested-project') ? "active" : "" }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Client Request Project</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.client.project.completed-project') }}" class="nav-link {{ request()->routeIs('admin.client.project.completed-project')  ? "active" : ""  }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Completed Projects</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Project Proposals</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Project Performance</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Invoices Dropdown -->
                  <li class="nav-item {{ request()->routeIs('admin.client.invoices*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.client.invoices*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-file-invoice"></i>
                          <p>Invoices<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.client.invoices.view-invoice') }}" class="nav-link {{ request()->routeIs('admin.client.invoices.view-invoice') ? "active" : ""}}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Invoices</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Payment History</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.client.invoices.generate-invoice') }}" class="nav-link {{ request()->routeIs('admin.client.invoices.generate-invoice') || request()->routeIs('admin.client.invoices.project-invoice-generate') ? "active" : ""}}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Generate Invoice</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Communication Dropdown -->
                  <li class="nav-item {{ request()->routeIs('admin.client.communication*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.client.communication*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-comments"></i>
                          <p>Communication<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Messages/Chat</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.client.communication.support-tickets') }}" class="nav-link {{ request()->routeIs('admin.client.communication.support-tickets') || request()->routeIs('admin.client.communication.view-support-ticket') ? "active" : ""}}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Support Tickets</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contact Support</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Documents Dropdown -->
                  <li class="nav-item {{ request()->routeIs('admin.client.documents*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.client.documents*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-folder-open"></i>
                          <p>Documents<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Upload Documents</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Shared Documents</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Download Forms</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Reports Dropdown -->
                  <li class="nav-item {{ request()->routeIs('admin.client.reports*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ request()->routeIs('admin.client.reports*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-chart-line"></i>
                          <p>Reports<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Reports</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Generate Custom Reports</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Download Reports</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <!-- Client Area End -->


                  <!-- Vendor Area Start -->
                  <li class="nav-header text-white">Vendor Area</li>

                  <!-- CA Project Tracking -->
                  <li class="nav-item {{ request()->routeIs('admin.vendor.project*') ? 'menu-open' : '' }}">
                      <a href="" class="nav-link {{ request()->routeIs('admin.vendor.project*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-project-diagram"></i>
                          <p>Vendor Projects<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.vendor.project.current-project') }}" class="nav-link {{ request()->routeIs('admin.vendor.project.current-project') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Current Project</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.vendor.project.assigned-project') }}" class="nav-link {{ request()->routeIs('admin.vendor.project.assigned-project') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Assigned Project</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.vendor.project.completed-project') }}" class="nav-link {{ request()->routeIs('admin.vendor.project.completed-project') || request()->routeIs('admin.vendor.project.view-vendor-completed-project') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Completed Project </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Vendar Profile Management -->
                  <li class="nav-item {{ request()->routeIs('admin.vendor-profile*') ? 'menu-open' : '' }}">
                      <a href="" class="nav-link {{ request()->routeIs('admin.vendor-profile*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-user"></i>
                          <p>Vendor Profile<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.vendor-profile') }}" class="nav-link {{ request()->routeIs('admin.vendor-profile') || request()->routeIs('admin.vendor-profile.profile') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Profile</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link {{ request()->routeIs('admin.vendor-profil') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Attendance</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link {{ request()->routeIs('admin.vendor-profil') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Salary Details</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link {{ request()->routeIs('admin.vendor-profil') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Performance</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- CA Registration -->
                  <li class="nav-item {{ request()->routeIs('admin.vendor.registration') ? 'menu-open' : '' }}">
                      <a href="{{ route('admin.vendor.registration') }}" class="nav-link {{ request()->routeIs('admin.vendor.registration') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-id-card"></i>
                          <p>Vendor Registration</p>
                      </a>
                  </li>

                  <!-- ITR (Income Tax Return) Reports -->
                  <li class="nav-item {{ request()->routeIs('admin.vendor.itr-reports') ? 'menu-open' : '' }}">
                      <a href="" class="nav-link {{ request()->routeIs('admin.vendor.itr-reports') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-file-alt"></i>
                          <p>ITR Reports</p>
                      </a>
                  </li>

                  <!-- Audit Reports -->
                  <li class="nav-item {{ request()->routeIs('admin.vendor.audit-reports') ? 'menu-open' : '' }}">
                      <a href="" class="nav-link {{ request()->routeIs('admin.vendor.audit-reports') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-file-contract"></i>
                          <p>Audit Reports</p>
                      </a>
                  </li>

                  <!-- Vendor Payments -->
                  <li class="nav-item {{ request()->routeIs('admin.vendor.payments*') ? 'menu-open' : '' }}">
                      <a href="" class="nav-link {{ request()->routeIs('admin.vendor.payments*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-university"></i>
                          <p>Vendor Payments<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.vendor.payments') }}" class="nav-link {{ request()->routeIs('admin.vendor.payments') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Make Payment</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- Vendor Dashboard -->
                  <li class="nav-item {{ request()->routeIs('admin.vendor.dashboard') ? 'menu-open' : '' }}">
                      <a href="" class="nav-link {{ request()->routeIs('admin.vendor.dashboard') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Vendor Dashboard</p>
                      </a>
                  </li>
                  <!-- Vendor Area End -->
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container -->
