<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="d-none d-lg-block">
                <form class="app-search">
                    <div class="app-search-box dropdown">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search..." id="top-search">
                            <div class="input-group-append">
                                <button class="btn" type="button">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                    href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ auth()->user()->image ? asset('manual_storage/' . auth()->user()->image) : "asset('admin-asset/images/users/user-1.jpg')" }}"
                        alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">{{ auth()->user()->name }}<i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{ route('admin_profile') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('admin_password') }}" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Password</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('admin_logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            {{-- <a href="{{ route('admin_dashboard') }}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{ asset('admin-asset/images/logo-sm.png') }}" alt="" height="22"> 
                    <span class="logo-lg-text-light">UBold</span> 
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('admin-asset/images/logo-dark.png') }}" alt="" height="20">
                    <span class="logo-lg-text-light">U</span> 
                </span>
            </a> --}}

            <a href="{{ route('admin_dashboard') }}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <span class="logo-lg-text-light text-white fw-bold">Seo Tech Master</span>
                    {{-- <img src="{{ asset('admin-asset/images/logo-sm.png') }}" alt="" height="22"> --}}
                </span>
                <span class="logo-lg">
                    <span class="logo-lg-text-light text-white fs-4 fw-bold">Seo Tech Master</span>
                    {{-- <img src="{{ asset('admin-asset/images/logo-light.png') }}" alt="" height="20"> --}}
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
