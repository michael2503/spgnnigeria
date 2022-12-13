<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('adminDashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-cogs"></i>
                        <span> General Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('websiteSettingView') }}">Website settings</a>
                        </li>
                        <li>
                            <a href="{{ route('socialLinkView') }}">Social Media Link</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('sliderView') }}">
                        <i class="fa fa-photo"></i>
                        <span> Manage Slides </span>
                    </a>
                </li>

                @if(auth()->guard('admin')->user()->id == 1)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-users"></i>
                        <span> Admin Manager </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('adminView') }}">Manage Admin</a>
                        </li>
                        <li>
                            <a href="{{ route('addAdminView') }}">Add Admin</a>
                        </li>
                    </ul>
                </li>
                @endif

                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-laptop"></i>
                        <span> Blogs Manager</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('getBlogCat') }}">Blog Category</a>
                        </li>
                        <li>
                            <a href="{{ route('adminblogView') }}">Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('addBlogView') }}">Add Blog</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('adminAppointView') }}">
                        <i class="fa fa-photo"></i>
                        <span> Appointments </span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-camera"></i>
                        <span> Gallery Manager </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('galleryCatgoryView') }}">Category</a>
                        </li>
                        <li>
                            <a href="{{ route('adminPhotoViewCat', 'all') }}">Photos Gallery</a>
                        </li>
                        <li>
                            <a href="{{ route('adminVideoView') }}">Video Gallery</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('emailTemplateView') }}">
                        <i class="fa fa-envelope"></i>
                        <span> Email Templates </span>
                    </a>
                </li>

                <li>
                    {{-- <a href="login/logout">
                        <i class="fa fa-sign-out"></i>
                        <span> Logout</span>
                    </a> --}}
                    <style>
                        .logoutBtn{
                            border: none;
                            background: transparent;
                            color: #6e768e;
                            font-size: .875rem;
                            padding-left: 24px;
                            font-family: Poppins,sans-serif
                        }
                        .logoutBtn i{
                            width: 20px;
                            text-align: center;
                            font-size: 15px;
                        }
                        .logoutBtn span{
                            padding-left: 8px
                        }
                    </style>
                    <form class="auth-login-form mt-2" action="{{route('adminLogoutPost')}}" method="post">
                        @csrf

                        <button class="logoutBtn"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
                    </form>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
