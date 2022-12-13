@extends('guest.layouts.appmain')
@section('title', 'Elevate - 2020')


@section('content')


<x-GuestComps.breadcrum bigTitle='Turning Point Conferences' smallTitle='Elevate - 2020'/>



<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-12 mb-4">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>All Turning Points</h4>
                    </div>

                    <x-GuestComps.turningPointMenu active='2020'/>

                    <div class="services-single-left-heading mt-40">
                        <h4><b>ELEVATE 2020</b></h4><br>
                        <img src="{{ asset('images/banner/2020-turning-point.png') }}" class="sm-resize" style="width: 100%"><br><br>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-12">
                <div class="services-single-right">
                    <div class="row wow zoomIn">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-10">
                          <div class="panel panel-default" align="center" style="border: 2px solid rgb(77, 40, 78);">
                            <img src="{{ asset('images/banner/elevate.png') }}" class="sm-resize" style="width: 100%">


                            <p class="para" style="border-top: 2px solid rgb(77, 40, 78);  padding: 10px 20px">“The poor can dream. The weak can hope. The helpless can strive. The powerless can rise.” <b>ELEVATE 2020</b></p>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-1"></div>
                    </div>


                    <div class="text-content-big mt-20 wow zoomIn">
                        <p class="text-justify"><b>ELEVATE 2020</b> is the theme of “Turning Point 3.0”, an annual youth leadership conference organized by SPGN, which seeks to address an increasing cost of a generation defined by a skills gap and left unprepared for their future. The event is an effort to empower, educate, inspire, ignite and mould the minds of the youth into global leaders, who will make a difference in their environment and change the world for greater good.</p>
                        <p class="text-justify">The goal of <b>ELEVATE 2020</b> is to help young people realize their dreams and goals in life by creating resilience, increasing awareness of consequences, building self-esteem and confidence, improving behaviour, enhancing social skills and improving mindsets towards life and education. Through this conference, we intend to design a success pathway to follow that inspires a lifetime of ethics and habits that will lead them to someday achieving those dreams.</p>

                        <p class="text-justify">There is no gainsaying that successful people have a habit of inspiring excellence in others. They are passionate about innovation, they energize those around them to become more creative, more dynamic and more daring.Elevating your life is about reaching higher ground. It is an obvious fact that the view from the top is more breathtaking and more inspirational. With this, horizons open up and perspectives change. Suddenly, everything is clearer, and you see your way forward. Your vision is not just a picture of what you could be…it’s an appeal to elevate yourself, a call to become something more, a challenge to go to a place mentally where you have never been.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
