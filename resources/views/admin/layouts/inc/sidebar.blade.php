  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{adminAsset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CCTS Courier</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{adminAsset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->email}}</a>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{isActive('admin/dashboard')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
          </li>
          @if(auth()->user()->role_id == 1)
          <li class="nav-header">Company Management</li>
          <li class="nav-item">
            <a href="{{route('admin.company.view')}}" class="nav-link {{auth()->user()->role_id}} {{isActive('admin/company-master*')}}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Company Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{isActive('admin/branch-master*')}}">
              <i class="nav-icon fas fa-code-branch"></i>
              <p>
               Branch Master
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.branch.view')}}" class="nav-link {{isActive('admin/branch-master')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.branch.add')}}" class="nav-link {{isActive('admin/branch-master/add')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Branch</p>
                </a>
              </li>
              @else(auth()->user()->role_id==2)
              <li class="nav-item menu-open">
            <a href="#" class="nav-link {{isActive('admin/branch-master*')}}">
              <i class="nav-icon fas fa-code-branch"></i>
              <p>
              Courier Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('staff.courier.view')}}" class="nav-link {{isActive('staff/courier-view')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Couriers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('staff.courier.add')}}" class="nav-link {{isActive('staff/courier-add')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Courier</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('staff.courier.package_details')}}" class="nav-link {{isActive('staff/courier-add')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Packages</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
