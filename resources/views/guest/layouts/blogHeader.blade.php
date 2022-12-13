<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">

    <meta name="google-site-verification" content="VBSdQis2iZu17n8vZztZLupH814Kg6UVRgzdXnu13Zw" />

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="{{ $webSet->site_name }} Blog" />
    <meta property="og:title" content="@yield('ogTitle')">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $webSet->site_name }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="@yield('ogUrl')"/>

    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="@yield('ogTitle')">
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="@yield('ogImage')">
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="@yield('description')">
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="@yield('ogUrl')">

    <meta name="twitter:card" content="Blog">
    <meta name="twitter:site" content="SPGN Nigeria">
    <meta name="twitter:title" content="@yield('ogTitle')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('ogImage')">
    <link rel="canonical" href="@yield('ogUrl')">
    <link rel="alternate" href="@yield('ogUrl')">
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

    <div id="top-bar" class="hidden-sm-down">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="top-bar-welcome">
                        <ul>
                            <li>{{ $webSet->site_name }}</li>
                        </ul>
                    </div>
                    <div class="top-bar-info">
                        <ul>
                            <!-- <li><i class="fa fa-phone"></i>(+123) 456 7890<li> -->
                            <li class="text-dark">.<li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="top-bar-info">
                        <ul>
                            <li class="float-right"><i class="fa fa-envelope"></i>{{ $webSet->biz_email }}<li>
                            <li class="text-dark"><i class="fa fa-envelope"></i>example@gmail.com <li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header>
        <nav id="navigation4" class="container navigation">
            <div class="nav-header">
                <a class="nav-brand" href="/">
                    <img src="{{ $webSet->logo_url }}" width="160" class="main-logo" alt="logo" id="main_logo"> </a>
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

                    <li><a href="{{ route('contact') }}">Contact</a></li>

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
    <script src="{{ asset('js/main.js') }}"></script>


    <script src="{{ asset('js/gallery-plugins/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/gallery-plugins/scrollIt.min.js') }}"></script>
    <script src="{{ asset('js/gallery-plugins/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/gallery-plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/gallery-plugins/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/gallery-plugins/isotope.pkgd.min.js') }}"></script>


    <script>


        $(function() {

            "use strict";

            var wind = $(window);

            // === owl-carousel === //

            // magnificPopup
            $('.gallery').magnificPopup({
                delegate: '.link',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });


        // === window When Loading === //

        $(window).on("load",function (){

            var $gallery = $('.gallery').isotope({
              // options
            });

            // filter items on button click
            $('.filtering').on( 'click', 'span', function() {

                var filterValue = $(this).attr('data-filter');

                $gallery.isotope({ filter: filterValue });

            });

            $('.filtering').on( 'click', 'span', function() {

                $(this).addClass('active').siblings().removeClass('active');

            });
        });

    </script>
</body>

</html>
