@extends('guest.layouts.appmain')
@section('title', 'Therapy Approach')


@section('content')


<x-GuestComps.breadcrum bigTitle='Therapy Approach' smallTitle='Therapy Approach'/>


<div class="section-block pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-4 col-12 wow fadeInLeft">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading mt-20">
                        <img src="{{ asset('images/services/therapy.jpg') }}" class="sm-resize" style="width: 1500px"><br><br>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-sm-8 col-12">
                <div class="services-single-right">
                    <div class="text-content-big mt-20 wow zoomIn">
                        <div class="section-heading">
                            <h4 style="font-size: 17px">FIVE ESSENTIAL QUESTIONS</h4>
                        </div>
                        <div class="section-heading-line-left"></div>

                        <p class="mb-1">1. What is the problem?</p>
                        <p class="mb-1">2. What solution have you tried?</p>
                        <p class="mb-1">3. Who is involved?</p>
                        <p class="mb-1">4. Why now?</p>
                        <p class="mb-1">5. What specific realistic and obtainable goal are you seeking?</p>

                        <p>Through therapy, We  will assist you in defining achievable goals and will help you learn simple, understandable procedures that will become second nature to help you reach those goals. We use a compassionate, goal-oriented, innovative techniques and solution-focused therapist approach to empower patients to navigate through life challenges.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- WHAT WE DO --}}
    <div class="section-block-parallax mt-4" style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url({{ asset('images/services/Addictions-Blog-Post.jpeg') }});
    background-size:cover;">
        <div class="container">

            <div class="row">

                <div class="col-xl-6">
                    <section id="section-id-1523106132564" class="sppb-section ">
                        <div class="sppb-row-container">
                            <div class="sppb-row">
                                <div class="sppb-col-md-12" id="column-wrap-id-1523106132563">
                                    <div id="column-id-1523106132563" class="sppb-column">
                                        <div class="sppb-column-addons">
                                            <div id="sppb-addon-1523109092959" class="clearfix">
                                                <div class="section-heading center-holder  ">
                                                    <span>How We Work</span>
                                                    <h5 class="text-left text-white">We specialize in a variety of therapy services with over 90% satisfied clients</h5>
                                                    <div class="section-heading-line-left"></div>

                                                    <p class="text-white text-justify">Even highly successful individuals often need help figuring out how to deal with this ever-changing and fast-paced world.</p>

                                                    <p class="text-white text-justify">Our studies of the origins, behaviors, physical, social, and cultural developments of various civilizations including the ancient Inca, allowed us to pursue and develop a model of therapy based on some simple and yet very important premises.</p>

                                                    <p class="text-white text-justify">Click below to schedule your therapy session or call {{ $webSet->biz_phone }} for a brief chat to see if we are a good fit. Please contact me with any questions or concerns or visit the FAQ page for answers to common questions.
                                                    </p>

                                                    <div class="text-left mt-4">
                                                        <a class="button-tag pt-3 pb-3 primary-button rounded-0" href="{{ route('bookASessionView') }}">
                                                            BOOK A SESSION
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


                <div class="col-xl-6">
                    <section id="section-id-1523111098692" class="sppb-section ">
                        <div class="sppb-row-container">
                            <div class="row">
                                <div class="col-md-6 wow fadeInUp" id="column-wrap-id-1523111098689">
                                    <div id="column-id-1523111098689" class="sppb-column">
                                        <div class="sppb-column-addons">
                                            <div id="sppb-addon-1523111098696" class="clearfix">
                                                <div class="number-box ">
                                                    <h3>01</h3>
                                                    <div class="number-box-line"></div>
                                                    <h4>Anxiety and Depression</h4>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 wow fadeInUp" id="column-wrap-id-1523111098690">
                                    <div id="column-id-1523111098690" class="sppb-column">
                                        <div class="sppb-column-addons">
                                            <div id="sppb-addon-1523111190152" class="clearfix">
                                                <div class="number-box ">
                                                    <h3>02</h3>
                                                    <div class="number-box-line"></div>
                                                    <h4>Mental Health Therapy</h4>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 wow fadeInUp" id="column-wrap-id-1523111098691">
                                    <div id="column-id-1523111098691" class="sppb-column">
                                        <div class="sppb-column-addons">
                                            <div id="sppb-addon-1523111190146" class="clearfix">
                                                <div class="number-box ">
                                                    <h3>03</h3>
                                                    <div class="number-box-line"></div>
                                                    <h4>Addiction Therapy</h4>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 wow fadeInUp" id="column-wrap-id-1523111098693">
                                    <div id="column-id-1523111098693" class="sppb-column">
                                        <div class="sppb-column-addons">
                                            <div id="sppb-addon-1523111190149" class="clearfix">
                                                <div class="number-box ">
                                                    <h3>04</h3>
                                                    <div class="number-box-line"></div>
                                                    <h4>Anger Management</h4>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>





    <div class="section-block-bg" style="background-image: url({{ asset('images/banner/bg11.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-12 offset-md-5">
                    <div class="section-heading">
                        <!-- <span>Improve your business with us !</span> -->
                        <h4>OUR APPROACH</h4>
                        <div class="section-heading-line-left"></div>
                        <div class="text-content-big mt-10">
                            <p>Compassion, Empathy, Love and Leadership guides everything that we do at SPGN.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInUp">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon"> <i class="icon-networking"></i> </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#">Identify there is a problem</a></h4>
                                        <p>First identify issues that you are going through.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInUp">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon"> <i class="icon-target"></i> </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#">Ongoing Discussion</a></h4>
                                        <p>Through therapy, We will assist you in defining achievable goals and will help you learn simple, understandable goals.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInUp">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon"> <i class="icon-diamond"></i> </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#">Analyze Problem</a></h4>
                                        <p>Where we dig a little deeper and you gain a greater understanding about yourself</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInUp">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon"> <i class="icon-hourglass"></i> </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#">Solve or attempt to solve issues</a></h4>
                                        <p>Master the tools you need to achieve a more fulfilled life</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-left mt-4">
                        <a class="button-tag pt-3 pb-3 primary-button rounded-0" href="{{ route('bookASessionView') }}">
                            BOOK A SESSION
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>




@endsection
