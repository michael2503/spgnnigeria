@extends('guest.layouts.appmain')
@section('title', 'About Turning Point')


@section('content')


{{-- <x-GuestComps.breadcrum bigTitle='Our Value' smallTitle='Our Value'/> --}}



<div class="main-video-section">
    <div class="video-area" id="video-area">
        <div class="player" id="main-video-play" data-property="{videoURL:'https://youtu.be/RL_AfIl32kc', containment:'#video-area', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:0, opacity:1, quality:'high',}"></div>
        <div class="main-video-overlay">
            <div class="main-video-content">
                <div class="container">
                    <div class="white-color" style="height: 300px;">
                        <!-- <h3><strong>Creative Consulting Agency</strong></h3>
                        <div class="mt-15">
                            <h6>The first rule of any technology used in a business is that automation applied to an efficient operation will magnify the efficiency. The second is that automation applied to an inefficient operation will magnify the inefficiency.</h6>
                        </div><a href="#" class="primary-button button-md mt-30">Become a Client</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="section-block">
    <div class="container">

        <div class="project-single-bottom-text mt-0 wow fadeInUp">
            <div class="section-single-heading">
                <h4><b>TURNING POINT</b></h4>
                <div class="text-content-big mt-20">
                    <p class="text-justify"><b>TURNING POINT</b> is an annual Youth Leadership event cum conference that <b>seeks to address an increasing cost of a generation defined by a skills gap and left unprepared for their future. The event is an effort to empower, educate, inspire, ignite and mould the minds of the youth into global leaders, who will make a difference in their environment and change the world for greater good.</b>The world is at a crisis point as the global youth population has skyrocketed and with this population explosion come violence, instability and a lack of opportunities which our youth, especially, are facing, while coping with uncertainties the nation provides. They seek independence, yet they are still vulnerable; they want to find their voice, yet they do not know how. And the stress of a life in crisis, conflict, poverty or prejudice - puts them at risk of making damaging choices.</p>
                </div>


                <div class="row mt-50">
                    <div class="col-xl-2 col-lg-2 col-md-1"></div>
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="blog-list-img">
                            <img src="{{ asset('images/banner/turning.png') }}">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="blog-list-bottom-text">
                            <p><b>CALL FOR SPONSORSHIP / PARTNERSHIP</b></p>
                            <p class="text-justify">The 2020 Youth Leadership Conference themed “ELEVATE 2020” offers opportunity for businesses and organizations not only to sponsor the event but to build mutual partnership in...</p>
                            <a href="#" class="button-tag primary-button">READ MORE</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-1"></div>
                </div>


                <div class="text-content-big mt-20">
                    <p class="text-justify">This programme is of youth by youth and for the youth. The strength of any nation is determined by the quality of its youth. And you can see in this nation presently, there is a problem of youth unemployment which has assumed an alarming proportion. Many young people have given room to limitations and have lost hope! They are running without directions or have been trapped in some social vices.</p>

                    <p class="text-justify">Yet these same youths represent an amazing source of potential and a powerful source of hope. They are the change-makers of tomorrow - they possess the ability to improve their communities, their countries and their world. However, many are not adequately prepared for these roles and have too few opportunities and support to gain the skills required. They are an extraordinary untapped generation who need a positive pathway to the opportunities they need to succeed in work and life. If these opportunities are not provided, what remains are largely negative or destructive pathways to identity and economic participation</p>

                    <p class="text-justify">The vast majority of them struggle to stay in school, to access training, to find a job, to make their voices heard in society. But if we empower these millions of young people, educate them, help them to become the best and most productive citizens they can be, we will set them on a course to improve their lives, grow their countries’ economies, strengthen their societies, lift up and empower the generations coming up behind them. They are at a critical crossroad and this is the time to help them have a turning point. This event features dynamic speakers, whose messages will inspire participants to pursue their passions and act in the face of adversity. During break-out sessions, participants will engage in meaningful conversations in small, tight-knit teams to develop strategies for creating and promoting community change.</p>
                </div><br><br>

                <h4>Who's To Attend</h4>
                <div class="text-content-big">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <ul class="primary-list mt-30">
                                <li><i class="fa fa-check-circle"></i>Young people with the burning desire to live life to the fullest</li>
                            </ul>
                        </div>
                    </div>
                </div><br><br>


                <h4>Learning Outcomes</h4>
                <div class="text-content-big">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <ul class="primary-list mt-30">
                                <li><i class="fa fa-check-circle"></i>Develop self-confidence and a success identity</li>
                                <li><i class="fa fa-check-circle"></i>Rewire your beliefs</li>
                                <li><i class="fa fa-check-circle"></i>Let go of past baggage and pain that no longer serves you</li>
                                <li><i class="fa fa-check-circle"></i>Quiet that inner critic and empower your self-talk</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <ul class="primary-list mt-30">
                                <li><i class="fa fa-check-circle"></i>Stop self-defeating patterns and habits</li>
                                <li><i class="fa fa-check-circle"></i>Ready to unleash your potential</li>
                                <li><i class="fa fa-check-circle"></i>Ready to take back control of the pen with which you write the story of your life</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection
