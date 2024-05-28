<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/template_admin/dist/img/icon.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMINISTRATOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/template_admin/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? ' active' : '' }}">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link">
                        <i class="fas fa-user-cog nav-icon"></i>
                        <p>
                            Profil Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-door-open nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li class="nav-header">KONTEN WEBSITE</li>

                @hasrole('Super Admin')
                    <li class="nav-item {{ request()->is('admin/award', 'admin/award/*') ? ' menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/award', 'admin/award/*') ? ' active' : '' }}">
                            <i class="fas fa-sticky-note nav-icon"></i>
                            <p>Selayang Pandang</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view award')
                                <li class="nav-item">
                                    <a href="{{ route('admin.award.index') }}"
                                        class="nav-link {{ request()->is('admin/award', 'admin/award/*') ? ' active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Prestasi Bonebol</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ request()->is('admin/agency', 'admin/agency/*', 'admin/leader', 'admin/leader/*') ? ' menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/agency', 'admin/agency/*', 'admin/leader', 'admin/leader/*') ? ' active' : '' }}">
                            <i class="fas fa-info-circle nav-icon"></i>
                            <p>Tentang Bonebol</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view agency')
                                <li class="nav-item">
                                    <a href="{{ route('admin.agency.index') }}"
                                        class="nav-link {{ request()->is('admin/agency', 'admin/agency/*') ? ' active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar SKPD</p>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sejarah</p>
                                </a>
                            </li>
                            @can('view leader')
                                <li class="nav-item">
                                    <a href="{{ route('admin.leader.index') }}"
                                        class="nav-link {{ request()->is('admin/leader', 'admin/leader/*') ? ' active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pimpinan</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endhasrole

                @can('view document')
                    <li class="nav-item">
                        <a href="{{ route('admin.document.index') }}"
                            class="nav-link {{ request()->is('admin/document', 'admin/document/*') ? ' active' : '' }}">
                            <i class="fas fa-archive nav-icon"></i>
                            <p>Arsip dan Dokumen</p>
                        </a>
                    </li>
                @endcan

                @can('view agenda')
                    <li class="nav-item">
                        <a href="{{ route('admin.agenda.index') }}"
                            class="nav-link {{ request()->is('admin/agenda', 'admin/agenda/*') ? ' active' : '' }}">
                            <i class="far fa-calendar-alt nav-icon"></i>
                            <p>Agenda</p>
                        </a>
                    </li>
                @endcan

                @can('view banner')
                    <li class="nav-item">
                        <a href="{{ route('admin.banner.index') }}"
                            class="nav-link {{ request()->is('admin/banner', 'admin/banner/*') ? ' active' : '' }}">
                            <i class="fas fa-sliders-h nav-icon"></i>
                            <p>Banner</p>
                        </a>
                    </li>
                @endcan

                @hasrole('Super Admin')
                    <li class="nav-header">MANAJEMEN USER</li>
                    @can('view role & permission')
                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}"
                                class="nav-link {{ request()->is('admin/role', 'admin/role/*') ? ' active' : '' }}">
                                <i class="fas fa-user-tag nav-icon"></i>
                                <p>Role dan Hak Akses</p>
                            </a>
                        </li>
                    @endcan
                    @can('view user')
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}"
                                class="nav-link {{ request()->is('admin/user', 'admin/user/*') ? ' active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                    @endcan
                @endhasrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
