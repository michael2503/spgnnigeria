@extends('guest.layouts.appmain')
@section('title', 'Dashboard')


@section('content')

<div style="display: flex">

    <div class="theSideMenu" id="theSideMenu" style="flex: 1">
        <x-UserComps.sidebar/>
    </div>


    <div id="theMainPage" class="theMainPage" style="flex: 1; border-left: 1.5px solid #ccc">
        <div class="container">

            <section id="contact-spgn" class="section-block">

                <div class="text-center mb-5">
                    <div class="section-heading">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="section-heading-line"></div>
                </div>



                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="feature-box-5 wow fadeInLeft">
                            <i class="fa fa-comments"></i>
                            <span style="float: right; font-size: 50px">{{ $allcomment }}</span>
                            <h4>All Comments</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="feature-box-5 wow fadeInUp">
                            <i class="icon-flag3"></i>
                            <span style="float: right; font-size: 50px">{{ $allAppointment }}</span>
                            <h4>All Appointments</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="feature-box-5 wow fadeInRight">
                            <i class="fa fa-times-circle"></i>
                            <span style="float: right; font-size: 50px">{{ $cancelledAppointment }}</span>
                            <h4>Cancelled Appointment</h4>
                        </div>
                    </div>
                </div>

            </section><br>




        </div>
    </div>



</div>


@endsection
