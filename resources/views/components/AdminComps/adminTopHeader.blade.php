<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ auth()->guard('admin')->user()->photo }}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    {{ auth()->guard('admin')->user()->username }} <i class="fa fa-angle-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="{{ route('accountSettingView') }}" class="dropdown-item notify-item">
                    <i class="fa fa-user"></i>
                    <span>Edit Profile</span>
                </a>

                <!-- item-->
                <a href="{{ route('changePasswordView') }}" class="dropdown-item notify-item">
                    <i class="fa fa-cog"></i>
                    <span>Change Password</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="login/logout" class="dropdown-item notify-item">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ $webSet->logo_url }}" alt="" width="150">
            </span>
            <span class="logo-sm">
                <img src="{{ $webSet->favicon_url }}" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fa fa-bars"></i>
            </button>
        </li>
    </ul>
</div>
