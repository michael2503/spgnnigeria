<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Plugins css -->
        <link href="{{ asset('css/admincss/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('css/admincss/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/timer.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/admincss/custombox.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/admincss/app.min.css') }}" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


        <link href="{{ asset('css/admincss/dropify.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/admincss/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/admincss/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <x-AdminComps.adminTopHeader/>
            <!-- end Topbar -->



            <!-- ========== Left Sidebar Start ========== -->
            <x-AdminComps.adminSidebarMenu/>
            <!-- Left Sidebar End -->



            {{-- contents here --}}
            @yield('content')



        </div>




        <x-AdminComps.adminFooter/>

    </body>
</html>
