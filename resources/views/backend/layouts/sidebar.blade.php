<div id="sidebar" class="app-sidebar">
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <div class="menu">
            <div class="menu-header">Navigation</div>

            <div class="menu-item {{ session('lsbm') == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="bi bi-cpu"></i>
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>

            @can('manage_VMS')
                <div class="menu-item has-sub {{ session('lsbm') == 'manage_VMS' ? 'expand' : '' }}">
                    <a href="#" class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user"></i>
                        </span>

                        <span class="menu-text">Manage VMS</span>

                        <span class="menu-caret">
                            <b class="caret"></b>
                        </span>
                    </a>

                    <div class="menu-submenu" style="{{ session('lsbsm') == 'visitor_list' ? 'display: block;' : '' }}">

                        @can('visitor_list')
                            <div class="menu-item {{ session('lsbsm') == 'visitor_list' ? 'active' : '' }}">
                                <a href="{{route('admin.visitor.index')}}" class="menu-link">
                                    <span class="menu-text">Visitor List</span>
                                </a>
                            </div>
                        @endcan

                        @can('add_visitor')
                            <div class="menu-item {{ session('lsbsm') == 'add_visitor' ? 'active' : '' }}">
                                <a href="{{route('admin.visitor.create')}}" class="menu-link">
                                    <span class="menu-text">New Visitor</span>
                                </a>
                            </div>
                        @endcan

                        @can('appointment_list')
                            <div class="menu-item {{ session('lsbsm') == 'appointment_list' ? 'active' : '' }}">
                                <a href="{{route('admin.appointment.index')}}" class="menu-link">
                                    <span class="menu-text">Appointment List</span>
                                </a>
                            </div>
                        @endcan

                        @can('add_appointment')
                            <div class="menu-item {{ session('lsbsm') == 'add_appointment' ? 'active' : '' }}">
                                <a href="{{route('admin.appointment.create')}}" class="menu-link">
                                    <span class="menu-text">New Appointment</span>
                                </a>
                            </div>
                        @endcan

                    </div>

                </div>
            @endcan

            
            {{-- Client Info module --}}
            @can('manage_client_info')
                <div class="menu-item has-sub {{ session('lsbm') == 'manage_client_info' ? 'expand' : '' }}">
                    <a href="#" class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user"></i>
                        </span>

                        <span class="menu-text">Manage Client Info</span>

                        <span class="menu-caret">
                            <b class="caret"></b>
                        </span>
                    </a>

                    <div class="menu-submenu" style="{{ session('lsbsm') == 'manage_client_info' ? 'display: block;' : '' }}">

                        <div class="menu-item {{ session('lsbsm') == 'client_list' ? 'active' : '' }}">
                            <a href="{{route('admin.clientInfo.index')}}" class="menu-link">
                                <span class="menu-text">Client List</span>
                            </a>
                        </div>
                
                        <div class="menu-item {{ session('lsbsm') == 'add_client' ? 'active' : '' }}">
                            <a href="{{route('admin.clientInfo.create')}}" class="menu-link">
                                <span class="menu-text">Add New Client</span>
                            </a>
                        </div>
                        
                    </div>

                </div>
            @endcan


            @can('manage_office')
                <div class="menu-item has-sub {{ session('lsbm') == 'manage_office' ? 'expand' : '' }}">
                    <a href="#" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-building"></i>
                        </span>

                        <span class="menu-text">Manage Office</span>

                        <span class="menu-caret">
                            <b class="caret"></b>
                        </span>
                    </a>

                    <div class="menu-submenu" style="{{ session('lsbsm') == 'manage_office_submenu' ? 'display: block;' : '' }}">

                        @can('offie_list')
                            <div class="menu-item {{ session('lsbsm') == 'offie_list' ? 'active' : '' }}">
                                <a href="{{ route('admin.office.index') }}" class="menu-link">
                                    <span class="menu-text">Office List</span>
                                </a>
                            </div>
                        @endcan

                        @can('offie_category')
                            <div class="menu-item {{ session('lsbsm') == 'offie_category' ? 'active' : '' }}">
                                <a href="{{ route('admin.officeCategory.index') }}" class="menu-link">
                                    <span class="menu-text">Office Category</span>
                                </a>
                            </div>
                        @endcan

                        @can('all_departments')
                            <div class="menu-item {{ session('lsbsm') == 'all_departments' ? 'active' : '' }}">
                                <a href="{{ route('admin.department.index') }}" class="menu-link">
                                    <span class="menu-text">All Departments</span>
                                </a>
                            </div>
                        @endcan

                        @can('all_designations')
                            <div class="menu-item {{ session('lsbsm') == 'all_designations' ? 'active' : '' }}">
                                <a href="{{ route('admin.designation.index') }}" class="menu-link">
                                    <span class="menu-text">All Designations</span>
                                </a>
                            </div>
                        @endcan

                    </div>

                </div>
            @endcan

            @can('user_management')
                <div class="menu-item has-sub {{ session('lsbm') == 'roles' ? 'expand' : '' }}">
                    <a href="#" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people"></i>
                        </span>

                        <span class="menu-text">User Management</span>

                        <span class="menu-caret">
                            <b class="caret"></b>
                        </span>
                    </a>

                    <div class="menu-submenu">
                        @can('all_users')
                            <div class="menu-item {{ session('lsbsm') == 'allUsers' ? 'active' : '' }}">
                                <a href="{{ route('admin.user.index') }}" class="menu-link">
                                    <span class="menu-text">All User</span>
                                </a>
                            </div>
                        @endcan

                        @can('add_user')
                            <div class="menu-item {{ session('lsbsm') == 'addUser' ? 'active' : '' }}">
                                <a href="{{ route('admin.user.create') }}" class="menu-link">
                                    <span class="menu-text">Add User</span>
                                </a>
                            </div>
                        @endcan

                        @can('all_roles')
                            <div class="menu-item {{ session('lsbsm') == 'allRoles' ? 'active' : '' }}">
                                <a href="{{ route('admin.role.index') }}" class="menu-link">
                                    <span class="menu-text">All Roles</span>
                                </a>
                            </div>
                        @endcan

                        @can('all_permissions')
                            <div class="menu-item {{ session('lsbsm') == 'permissions' ? 'active' : '' }}">
                                <a href="{{ route('admin.permission.index') }}" class="menu-link">
                                    <span class="menu-text">All Permissions</span>
                                </a>
                            </div>
                        @endcan

                        @can('assign_permission')
                            <div class="menu-item {{ session('lsbsm') == 'assignPerm' ? 'active' : '' }}">
                                <a href="{{ route('admin.rolePermission.index') }}" class="menu-link">
                                    <span class="menu-text">Assign Permission</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            @endcan

            @can('settings')
                <div class="menu-item {{ session('lsbm') == 'setting' ? 'active' : '' }}">
                    <a href="{{ route('admin.setting.edit', ['id' => 1]) }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-gear"></i>
                        </span>
                        <span class="menu-text">Contact Information</span>
                    </a>
                </div>
            @endcan

        </div>




    </div>

</div>
</div>

<button class="app-sidebar-mobile-backdrop" data-toggle-target=".app"
    data-toggle-class="app-sidebar-mobile-toggled"></button>
