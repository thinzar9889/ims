<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh">
    <!-- Brand Logo -->
    <div class="text-center">
        <a href="{{ route('users.index') }}" class="brand-link">
            <span class="brand-text font-weight-light">IMS</span>
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

            <!-- Interns -->
            <!-- @can('intern-list') -->
            <li class="nav-item {{ Request::segment(1) === 'interns' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Interns<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('interns.index') }}" class="nav-link {{ request()->route()->getName() === 'interns.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                    @can('intern-create')
                    <li class="nav-item">
                        <a href="{{ route('interns.create') }}" class="nav-link {{ request()->route()->getName() === 'interns.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            <!-- @endcan -->
            <!-- End Interns -->

             <!-- Supervisors -->
             @can('supervisor-list')
            <li class="nav-item {{ Request::segment(1) === 'supervisors' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Supervisor<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('supervisors.index') }}" class="nav-link {{ request()->route()->getName() === 'supervisors.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                    @can('supervisor-create')
                    <li class="nav-item">
                        <a href="{{ route('supervisors.create') }}" class="nav-link {{ request()->route()->getName() === 'supervisors.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <!-- End Supervisor -->
            <!-- Evaluaations -->
            @can('evaluation-list')
            <li class="nav-item {{ Request::segment(1) === 'evaluations' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Manage Evaluation<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('evaluations.index') }}" class="nav-link {{ request()->route()->getName() === 'evaluations.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Evaluation Lists</p>
                        </a>
                    </li>
                    @can('evaluation-create')
                    <li class="nav-item">
                        <a href="{{ route('evaluations.create') }}" class="nav-link {{ request()->route()->getName() === 'evaluations.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Evaluation</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
             <!-- End Evaluaations -->
            <!--Reports -->
            @can('report-list')
                <li class="nav-item {{ Request::segment(1) === 'reports' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Reports<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('reports.index') }}" class="nav-link {{ request()->route()->getName() === 'companies.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        @can('report-create')
                        <li class="nav-item">
                            <a href="{{ route('reports.create') }}" class="nav-link {{ request()->route()->getName() === 'companies.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- End Reports -->
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
