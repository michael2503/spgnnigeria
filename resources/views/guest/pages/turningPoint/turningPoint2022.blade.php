@extends('guest.layouts.appmain')
@section('title', 'Finding Your Voice - 2022')


@section('content')


<x-GuestComps.breadcrum bigTitle='Turning Point Conferences' smallTitle='Finding Your Voice - 2022'/>



<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-12 mb-4">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>All Turning Points</h4>
                    </div>

                    <x-GuestComps.turningPointMenu active='2022'/>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-12">
                <div class="services-single-right">
                    <h4 class="text-center mb-4">
                    2022 YOUTH LEADERSHIP CONFERENCE "TURNING POINT 4.0"
                    </h4>
                    <!-- <h4 class="text-center">FINDING YOUR VOICE</h4> -->

                    <div class="row wow zoomIn">
                        <div class="col-lg-1 col-md-2 col-sm-1"></div>
                        <div class="col-lg-10 col-md-8 col-sm-10">
                          <div class="panel panel-default" align="center" style="border: 2px solid rgb(77, 40, 78);">
                            <img src="{{ asset('images/banner/turning-point-4.jpg') }}" class="sm-resize" style="width: 100%">
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-1"></div>
                    </div>


                    <div class="text-content-big mt-20 wow zoomIn project-single-text">
                        <p class="text-justify"><b>DATE</b>: May 14, 2022</p>
                        <p class="text-justify"><b>TIME:</b> 9.00AM - 2.00PM</p>
                        <p class="text-justify mb-5"><b>VENUE:</b> Nigeria Institute of International Affairs (NIIA)<br> 13/15 Kofo Abayomi Road, Victoria Island, Lagos</p>


                        <p class="text-justify">We are excited to invite you to be a part of the 2022 Youth Leadership Conference - Turning Point 4.0 themed “<b>FINDING YOUR VOICE</b>”. At Turning Point 4.0, you will:</p>

                        <ul>
                            <li><i class="fa fa-check"></i>Identify your deepest needs and wants</li>
                            <li><i class="fa fa-check"></i>Learn ways to uplift and enrich your life so that you can successfully reach your goals</li>
                            <li><i class="fa fa-check"></i>Get encouraged, inspired and motivated to take action towards your next goal</li>
                            <li><i class="fa fa-check"></i>Understand the need to focus on the things that will serve you and build you up</li>
                            <li><i class="fa fa-check"></i>Get empowered to improve your life and circumstances with the power of positive perception</li>
                            <li><i class="fa fa-check"></i>Unpack the challenges that are holding you back</li>
                            <li><i class="fa fa-check"></i>Step into new possibilities</li>
                            <li><i class="fa fa-check"></i>Develop a plan of action</li>
                            <li><i class="fa fa-check"></i>Leave refreshed</li>
                        </ul>

                        <h4 class="mt-4">Eligibility</h4>

                        <p class="text-justify">Are you ready to move from where you are to where you want to be, if YES, then, kindly fill the form below.</p>

                        <p class="text-justify"><b>IMPORTANT</b> Please note that the information you enter in this form goes directly into our database. Ensure that all information, particularly your name, phone number and email address, are accurate before filling. If you have any questions or enquiries, send an email to <a href="mailto:spgn_nigeria@yahoo.com">spgn_nigeria@yahoo.com</a> or call <a href="tel:07086484790">07086484790</a> you will be answered promptly. </p>
                    </div>

                    <div class="animated fadeInUp mt-30 text-center mt-4">
                        <a href="https://forms.gle/qeXPtTphWahA1dW46" target="_blank" class="primary-button button-md">REGISTER NOW</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
