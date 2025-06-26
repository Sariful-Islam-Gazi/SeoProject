<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ auth()->user()->image ? asset('manual_storage/' . auth()->user()->image) : "asset('admin-asset/images/users/user-1.jpg')" }}"
                alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">{{ auth()->user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{ route('admin_profile') }}" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('admin_password') }}" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Password</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('admin_logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin_dashboard') }}">
                        <i data-feather="airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i data-feather="search"></i>
                        <span> Seo Tech Master </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin_portfolio_list') }}">Portfolio</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_video_list') }}">Video</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_blog_list') }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_testimonial_list') }}">Testimonial</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_client_testimonial_list') }}">Client Review</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_contact_list') }}">Contact</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_visitor_list') }}">Visitor</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
