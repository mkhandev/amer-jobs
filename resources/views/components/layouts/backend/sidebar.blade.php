<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('/adminlte/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Search-->
    <div class="sidebar-search" role="search">
        <label for="sidebar-search-input" class="visually-hidden">Filter menu</label>
        <input type="search" id="sidebar-search-input" class="form-control form-control-sm" placeholder="Filter menu…"
            autocomplete="off" data-lte-toggle="sidebar-search" data-lte-target="#navigation" />
        <p class="fs-7 text-secondary mt-2 mb-0" data-lte-search-empty role="status" hidden>
            No matching pages.
        </p>
    </div>
    <!--end::Sidebar Search-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Main navigation">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" id="navigation">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @canany(['Jobs List', 'Jobs View', 'Jobs Edit', 'Jobs Add'])
                    <li class="nav-item {{ request()->routeIs('admin.jobs.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-table"></i>
                            <p>
                                Jobs
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('Jobs List')
                                <li class="nav-item">
                                    <a href="{{ route('admin.jobs.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.jobs.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Jobs List</p>
                                    </a>
                                </li>
                            @endcan

                            @can('Jobs Add')
                                <li class="nav-item">
                                    <a href="{{ route('admin.jobs.create') }}"
                                        class="nav-link {{ request()->routeIs('admin.jobs.create') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Job</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @canany(['Permissions List', 'Permissions Edit', 'Permissions Add'])
                    <li class="nav-item {{ request()->routeIs('admin.permissions.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-shield-lock"></i>
                            <p>
                                Permissions
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('Permissions List')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.permissions.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Permission List</p>
                                    </a>
                                </li>
                            @endcan

                            @can('Permissions Add')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.create') }}"
                                        class="nav-link {{ request()->routeIs('admin.permissions.create') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Permission</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @canany(['Roles List', 'Roles View', 'Roles Edit', 'Roles Add', 'Roles Delete'])
                    <li class="nav-item {{ request()->routeIs('admin.roles.*', 'admin.users.*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.roles.*', 'admin.users.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-badge"></i>
                            <p>
                                Roles
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('Roles List')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.roles.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Role List</p>
                                    </a>
                                </li>
                            @endcan

                            @can('Roles Add')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.create') }}"
                                        class="nav-link {{ request()->routeIs('admin.roles.create') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Role</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany


                @canany(['Users List', 'Users Edit', 'Users Add'])
                    <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-badge"></i>
                            <p>
                                Users
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('Users List')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>User List</p>
                                    </a>
                                </li>
                            @endcan

                            @can('Users Add')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="nav-link {{ request()->routeIs('admin.roles.create') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Add User</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcanany

            </ul>
            <!--end::Sidebar Menu-->

        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
