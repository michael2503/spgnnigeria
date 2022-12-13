@extends('guest.layouts.appmain')
@section('title', 'Skill Acquisition')


@section('content')


<x-GuestComps.breadcrum bigTitle='Skill Acquisition' smallTitle='Skill Acquisition'/>


<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h4 style="font-size: 17px" class="text-center">SKILL ACQUISITION</h4>
        </div>
        <div class="section-heading-line"></div>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-12 mt-30 wow fadeInLeft">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>Empowerment Programmes</h4>
                    </div>
                    <x-GuestComps.empowermentMenu active='skill' />
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                <div class="services-single-right">

                    <div class="project-single-text">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="wow zoomIn">
                                    <h4>Introduction</h4>
                                    <p class="text-justify">The Skill Acquisition scheme allows Youths to acquire hard skills in contemporary training that can advance their business growth and development. This also includes Youths that desire to receive further training or update their trainings in a specified field of endeavor. This section is designed for both educated, semi educated and youths without basic education. The envisaged skill cuts across different function including but not limited to Information Technology, Fashion and Beauty, Food and Entertainment etc.</p>
                                </div>


                                <div class="wow zoomIn">
                                    <h4 class="mt-40">Targeted Beneficiaries</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Youths with tertiary academic qualifications that desire to acquire other skills</li>
                                        <li><i class="fa fa-check"></i>Youths with basic education that intend to diversify their skill sets</li>
                                        <li><i class="fa fa-check"></i>Youths without basic education that are willing to learn</li>
                                        <li><i class="fa fa-check"></i>Youths willing to be mentored by leading expert in identified areas of endeavour</li>
                                    </ul>
                                </div>


                                <div class="wow zoomIn">
                                    <h4 class="mt-4">Opportunities Available</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Training</li>
                                        <li><i class="fa fa-check"></i>Internship</li>
                                        <li><i class="fa fa-check"></i>Certification</li>
                                    </ul>
                                </div>

                                <div class="wow zoomIn">
                                    <h4 class="mt-4">Resource Requirements</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Government Empowerment scheme for Youths</li>
                                        <li><i class="fa fa-check"></i>Donor Agencies</li>
                                        <li><i class="fa fa-check"></i>Philanthropists</li>
                                        <li><i class="fa fa-check"></i>High Net Worth Individuals</li>
                                        <li><i class="fa fa-check"></i>Established Business Owners</li>
                                        <li><i class="fa fa-check"></i>Interested Volunteers</li>
                                    </ul>
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
