@extends('guest.layouts.appmain')
@section('title', 'Mentorship Scheme')


@section('content')


<x-GuestComps.breadcrum bigTitle='Mentorship Scheme' smallTitle='Mentorship Scheme'/>


<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h4 style="font-size: 17px" class="text-center">PLACEMENT / MENTORSHIP SCHEME</h4>
        </div>
        <div class="section-heading-line"></div>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-12 mt-30 wow fadeInLeft">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>Empowerment Programmes</h4>
                    </div>
                    <x-GuestComps.empowermentMenu active='mentorship' />
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                <div class="services-single-right">

                    <div class="project-single-text">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="wow zoomIn">
                                    <h4>Introduction</h4>
                                    <p class="text-justify">This scheme is designed for Youths that desire to work or be mentored in a structured organization or environment. SPGN recognizes that a pivotal factor for youths to truly achieve their potential is the opportunity to gain requisite experience by working in an organization or environment that aligns with their educational qualifications, set skills, gifts and passion.</p>
                                </div>

                                <div class="wow zoomIn">
                                    <h4>Targeted Beneficiaries</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Youths with minimum academic qualification of “O-Level”</li>
                                        <li><i class="fa fa-check"></i>Students in tertiary institutions</li>
                                        <li><i class="fa fa-check"></i>Young graduates (either currently employed or unemployed)</li>
                                        <li><i class="fa fa-check"></i>Youths willing to be peered with Mentor(s) that have excelled in a field of endeavour for mentorship</li>
                                    </ul>
                                </div>


                                <div class="wow zoomIn">
                                    <h4 class="mt-4">Opportunities Available</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Internship</li>
                                        <li><i class="fa fa-check"></i>Permanent and temporary job placement</li>
                                        <li><i class="fa fa-check"></i>Scholarships</li>
                                        <li><i class="fa fa-check"></i>One-on-One Mentorship</li>
                                    </ul>
                                </div>


                                <div class="wow zoomIn">
                                    <h4 class="mt-4">Resource Requirements</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Private Companies</li>
                                        <li><i class="fa fa-check"></i>Public Companies</li>
                                        <li><i class="fa fa-check"></i>Government Agencies</li>
                                        <li><i class="fa fa-check"></i>Non-Governmental Organizations</li>
                                        <li><i class="fa fa-check"></i>International Organizations</li>
                                        <li><i class="fa fa-check"></i>Regulatory Agencies</li>
                                        <li><i class="fa fa-check"></i>Persons that have distinguished themselves in chosen field of endeavour</li>
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
