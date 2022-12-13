<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">

    <meta name="google-site-verification" content="VBSdQis2iZu17n8vZztZLupH814Kg6UVRgzdXnu13Zw" />


    <meta name="description" content="{{ $webSet->site_description }}" />
    <meta name="keywords" content="{{ $webSet->site_description }}" />
    <meta property="og:title" content="{{ $webSet->site_name }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="SPGN">
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="/"/>

    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="{{ $webSet->site_description }}">
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="{{ $webSet->logo_url }}">
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="{{ $webSet->site_description }}">
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="/">
    <meta name="twitter:card" content="SPGN">
    <meta name="twitter:site" content="SPGN">
    <meta name="twitter:title" content="{{ $webSet->site_description }}">
    <meta name="twitter:description" content="{{ $webSet->site_description }}">
    <meta name="twitter:image" content="{{ $webSet->logo_url }}">
    <link rel="canonical" href="/">
    <link rel="alternate" href="/">
    <link rel="shortcut icon" href="{{ $webSet->favicon_url }}" type="image/x-icon" />


    <link rel="shortcut icon" href="" type="image/png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rev-settings.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/switcher.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" id="colors">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <style>
        .socialLink a i{
            color: #fff;
            font-size: 27px;
            display: inline-block;
            width: 45px;
            padding-top: 10px;
        }
        .socialLink a i:hover{
            color: #d21e2b;
        }
        .userMenu{
            display: none !important;
        }
        .userMenuDesp{
            display: inline !important;
        }
        @media (max-width: 1000px) {
            .userMenu{
                display: block !important;
            }
            .userMenuDesp{
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>




    <header class="mobileView">
        <nav id="navigation6" class="container navigation">
            <div class="nav-header">
                <a class="nav-brand" href="/">
                    <img src="{{ $webSet->logo_url }}" alt="logo" class="main-logo" id="light_logo" width="160">
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu align-to-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('aboutCoreValue') }}">Our Core Value</a></li>
                            <li><a href="{{ route('aboutSpgn') }}">About SPGN</a></li>
                            <li><a href="{{ route('aboutFounder') }}">About Founder</a></li>
                            <li><a href="{{ route('ourTeam') }}">Our Team</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Our Services</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('therapyApproach') }}">Therapy Approach</a></li>
                            <li><a href="{{ route('psychologicalServices') }}">Psychological Services</a></li>
                            <li><a href="{{ route('mentorshipScheme') }}">Empowerment Programmes</a></li>
                            <li><a href="{{ route('trainingConferences') }}">Training & Conferences</a></li>
                            <li><a href="{{ route('operationFeedTheNeedy') }}">Operation Feed the Needy</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Turning Point</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('turnPointIndex') }}">About Turning Point</a></li>
                            <li><a href="{{ route('sponsorship') }}">Sponsorship</a></li>
                            <li><a href="{{ route('turningPoint2022') }}">YLC Volumes</a></li>
                            <li><a href="{{ route('turnPointFounder') }}">SPGN Founder</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('blogView') }}">Blog</a></li>

                    <li><a href="#">Gallery</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('photoViewWithCat', 'all') }}">Photo Gallery</a></li>
                            <li><a href="{{ route('videoView') }}">Video Gallery</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('contact') }}">Contact</a></li>

                    @if(Auth::user())

                    <li class=""><a href="{{ route('userOverview') }}">Dashboard</a></li>

                    <li class="userMenu"><a href="{{ route('userOverview') }}">Dashboard</a></li>
                    <li class="userMenu"><a href="{{ route('bookASessionView') }}">Book Appointments</a></li>
                    <li class="userMenu"><a href="{{ route('sessionView') }}">Appointments</a></li>
                    <li class="userMenu"><a href="{{ route('userChangePassword') }}">Change Password</a></li>

                    <li class="userMenu">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @endif

                </ul>
            </div>
        </nav>
    </header>






    <header id="nav-transparent" class="desktopView">
        <nav id="navigation4" class="container navigation">
            <div class="nav-header">
                <a class="nav-brand" href="/">
                    <img src="{{ $webSet->logo_url }}" alt="logo" class="main-logo" id="light_logo" width="160">
                    <img src="{{ $webSet->logo_url }}" alt="logo" class="main-logo" id="main_logo" width="160">
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu align-to-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('aboutCoreValue') }}">Our Core Value</a></li>
                            <li><a href="{{ route('aboutSpgn') }}">About SPGN</a></li>
                            <li><a href="{{ route('aboutFounder') }}">About Founder</a></li>
                            <li><a href="{{ route('ourTeam') }}">Our Team</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Our Services</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('therapyApproach') }}">Therapy Approach</a></li>
                            <li><a href="{{ route('psychologicalServices') }}">Psychological Services</a></li>
                            <li><a href="{{ route('mentorshipScheme') }}">Empowerment Programmes</a></li>
                            <li><a href="{{ route('trainingConferences') }}">Training & Conferences</a></li>
                            <li><a href="{{ route('operationFeedTheNeedy') }}">Operation Feed the Needy</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Turning Point</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('turnPointIndex') }}">About Turning Point</a></li>
                            <li><a href="{{ route('sponsorship') }}">Sponsorship</a></li>
                            <li><a href="{{ route('turningPoint2022') }}">YLC Volumes</a></li>
                            <li><a href="{{ route('turnPointFounder') }}">SPGN Founder</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('blogView') }}">Blog</a></li>

                    <li><a href="#">Gallery</a>
                        <ul class="nav-dropdown">
                            <li><a href="{{ route('photoViewWithCat', 'all') }}">Photo Gallery</a></li>
                            <li><a href="{{ route('videoView') }}">Video Gallery</a></li>
                        </ul>
                    </li>

                    @if(Auth::user())
                    <li class="userMenuDesp"><a href="{{ route('userOverview') }}">Dashboard</a></li>

                    <li class="userMenu">><a href="{{ route('userOverview') }}">Dashboard</a></li>
                    <li class="userMenu">><a href="{{ route('bookASessionView') }}">Book Appointments</a></li>
                    <li class="userMenu">><a href="{{ route('sessionView') }}">Appointments</a></li>
                    <li class="userMenu">><a href="{{ route('userChangePassword') }}">Change Password</a></li>

                    <li class="userMenu">

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>




    @yield('content')






    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7">
                    <h3>About Us</h3>
                    <div class="mt-25">
                        <!-- <img src="img/logos/logo-footer.png" alt="footer-logo"> -->
                        <p class="mt-25">Superior Performance Global Network (SPGN) is a people-oriented organization with the passionate vision of improving the quality of human life for superior performance. SPGN offers psychological, guidance and counselling services in specialized areas such as suicidal behaviors, career counselling, <a class="text-white" href="/about/spgn"><b>READ MORE</b></a></p>
                        <div class="footer-social-icons mt-25">
                            {{-- <ul>
                                @foreach ($socialLinks as $sos)
                                <li><a href="{{ $sos->social_url }}" target="_blank"><i class="{{ $sos->social_icon }}"></i></a></li>
                                @endforeach
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <h3>Quick Links</h3>
                    <ul class="footer-list">
                        <li><a href="/turning-point">Youth Leadership Conference</a></li>
                        <li><a href="/services/mentorship-scheme">Mentorship Scheme</a></li>
                        <li><a href="/turning-point/sponsorship">Sponsorship</a></li>
                        <li><a href="/services/operation-feed-the-needy">Operation Feed the Nation</a></li>
                        <li><a href="/turning-point/founder">The Founder</a></li>
                        <li><a href="/services/skill-acquisition">Skill Acquisition</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <h3>Recent Posts</h3>
                    <div class="mt-25">
                        @foreach ($sixPhotos as $pho)
                        <img src="{{ $pho->photo }}" alt="img" style="object-fit: contain; width: 70px; height: 70px; display: inline-block; background: red; margin-bottom: 10px">
                        @endforeach
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6">
                    <h3>Contact Info</h3>
                    <ul class="footer-list">
                        <li><a href="javascript:()">website address</a>
                        </li>


                        <li><a href="javascript:()">{{ $webSet->biz_email }}</a></li>
                        <li><a href="javascript:()">{{ $webSet->biz_email_2 }}</a></li>
                        <li><a href="javascript:()">{{ $webSet->biz_phone }}</a></li>
                        <li><a href="javascript:()">{{ $webSet->biz_phone_2 }}</a></li>
                    </ul>

                    <div class="socialLink">
                        <a href="https://web.facebook.com/SPGNNigeria/" target="_blank"><i class="fa fa-facebook-official"></i></a>
                        <a href="https://www.youtube.com/channel/UC8Zng5NqcbDm1J3ZXEvdlwA/videos" target="_blank"><i class="fa fa-youtube-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <div class="row">
                    <div class="col-md-7">
                        <p class="condit">
                            <span class="primary-color">{{ $webSet->site_name }}</span> © <?php echo date("Y"); ?>. All Rights Reserved.
                        </p>
                    </div>

                    <div class="col-md-5">
                        <p class="condit rightNow">
                            Developed By <span><a style="color: #d21e2b" href="#">Orbitcode Digital</a></span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/navigation.js') }}"></script>
    <script src="{{ asset('js/navigation.fixed.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/tabs.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/switcher.js') }}"></script>
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/revolution/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('js/revolution/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.migration-2.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('js/revolution/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

