<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh">
    <!-- Brand Logo -->
    <div class="text-center">
        <a href="{{ route('users.index') }}" class="brand-link">
            <span class="brand-text font-weight-light">Test</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Companies -->
            @can('company-list')
            <li class="nav-item {{ Request::segment(1) === 'companies' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Companies<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('companies.index') }}" class="nav-link {{ request()->route()->getName() === 'companies.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                    @can('company-create')
                    <li class="nav-item">
                        <a href="{{ route('companies.create') }}" class="nav-link {{ request()->route()->getName() === 'companies.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <!-- End Companies -->
            <!-- Users -->
            @can('user-list')
            <li class="nav-item {{ Request::segment(1) === 'users' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->route()->getName() === 'users.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                    @can('user-create')
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link {{ request()->route()->getName() === 'users.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <!-- End Users -->
            <!-- Role -->
            @can('role-list')
            <li class="nav-item {{ Request::segment(1) === 'roles' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>Roles<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->route()->getName() === 'roles.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                    @can('role-create')
                    <li class="nav-item">
                        <a href="{{ route('roles.create') }}" class="nav-link {{ request()->route()->getName() === 'roles.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <!-- End Role -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
