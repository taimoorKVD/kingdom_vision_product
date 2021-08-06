<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{  url('storage/app/'.config('app.logo')) }}" alt="{{ !empty(config('app.name')) ? config('app.name') : '' }}"
             class="brand-image img-circle elevation-3" style="opacity:.8">
        <span class="brand-text font-weight-light" style="font-size: 16px;">
            {{ config('app.name', 'Laravel') }}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ isset(auth()->user()->profile_photo) ? url('storage/app/'.auth()->user()->profile_photo) : url('storage/app/'.config('app.logo')) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Welcome, {{ ucfirst(auth()->user()->name) }}</a>
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
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->segment(2) == "dashboard" ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if(request()->segment(2) != "settings")
                @can('users.list')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                           class="nav-link {{ request()->segment(2) == "users" ? 'active' : null }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Management</p>
                        </a>
                    </li>
                @endcan

                @can('roles.list')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}"
                           class="nav-link {{ request()->segment(2) == "roles" ? 'active' : null }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Role Management</p>
                        </a>
                    </li>
                @endcan
                    @else
                    <li class="nav-item">
                        <a href="{{ route('settings.general_settings') }}"
                           class="nav-link {{ request()->segment(3) == "general_settings" ? 'active' : null }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>General settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}"
                           class="nav-link {{ request()->segment(2) == "settings" && request()->segment(3) == null ? 'active' : null }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>Email Configuration</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}"
                           class="nav-link {{ request()->segment(2) == "elements" ? 'active' : null }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Elements</p>
                        </a>
                    </li>

                    @endif


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
