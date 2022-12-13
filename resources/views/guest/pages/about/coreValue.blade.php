@extends('guest.layouts.appmain')
@section('title', 'Our Core Value')


@section('content')


<x-GuestComps.breadcrum bigTitle='Our Value' smallTitle='Our Value'/>


<div class="section-block-bg" style="background-image: url({{ asset('images/banner/bg15.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
                <div class="section-heading">
                    <h3>Mission & Vision</h3>
                    <div class="section-heading-line-left"></div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-9 col-12">
                        <div class="feature-box-5 wow fadeInLeft">
                            <!-- <i class="icon-tag2"></i> -->
                            <h4>Our Vision</h4>
                            <p class="text-justify">To improve the quality of life for superior performance.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-9 col-12">
                        <div class="feature-box-5 wow fadeInUp">
                            <!-- <i class="icon-flag3"></i> -->
                            <h4>Our Mission</h4>
                            <p class="text-justify">To provide help, hope and psychological support as well as empower young people to succeed in life.</p>
                        </div>
                    </div>
                </div>


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
                    <h4>OUR CORE VALUES</h4>
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
                                    <h4><a href="#">Compassion</a></h4>
                                    <p>For us, everyone deserves a shot at good life and an opportunity to realize their full potential.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInUp">
                        <div class="feature-flex-square">
                            <div class="clearfix">
                                <div class="feature-flex-square-icon"> <i class="icon-target"></i> </div>
                                <div class="feature-flex-square-content">
                                    <h4><a href="#">Empathy</a></h4>
                                    <p>We become other people, and in becoming, ensure that our value propositions are lived through the life of others.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInUp">
                        <div class="feature-flex-square">
                            <div class="clearfix">
                                <div class="feature-flex-square-icon"> <i class="icon-diamond"></i> </div>
                                <div class="feature-flex-square-content">
                                    <h4><a href="#">Love</a></h4>
                                    <p>Our propelling factor that gets us working to do more and never to relent till we have given all</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInUp">
                        <div class="feature-flex-square">
                            <div class="clearfix">
                                <div class="feature-flex-square-icon"> <i class="icon-hourglass"></i> </div>
                                <div class="feature-flex-square-content">
                                    <h4><a href="#">Leadership</a></h4>
                                    <p>The better leaders we have out there, the more our world becomes a better place. We go beyond being good leaders to people. We produce good leaders out of people and drive the value chain for creation of more good leaders.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
