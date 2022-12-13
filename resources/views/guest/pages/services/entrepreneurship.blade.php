@extends('guest.layouts.appmain')
@section('title', 'Entrepreneurship')


@section('content')


<x-GuestComps.breadcrum bigTitle='Entrepreneurship' smallTitle='Entrepreneurship'/>


<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h4 style="font-size: 17px" class="text-center">ENTREPRENEURSHIP</h4>
        </div>
        <div class="section-heading-line"></div>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-12 mt-30 wow fadeInLeft">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>Empowerment Programmes</h4>
                    </div>
                    <x-GuestComps.empowermentMenu active='entrepreneur' />
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                <div class="services-single-right">

                    <div class="project-single-text">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="wow zoomIn">
                                    <h4>Introduction</h4>
                                    <p class="text-justify">This is designed for Youths with strong interest in entrepreneurship, self-sufficiency and expansion of value chain without the requisite funds, skills, guidance, tools and instruments of trade. SPGN intends to provide funds (in form of loans, grants), business opportunities, contacts, training and guidance for qualified youth. Benefits are decided on a case-by-case basis.</p>
                                </div>

                                <div class="wow zoomIn">
                                    <h4 class="mt-40">Targeted Beneficiaries</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Youths with established small-scale business</li>
                                        <li><i class="fa fa-check"></i>Youths with bankable business plan</li>
                                        <li><i class="fa fa-check"></i>Youths planning to establish business with partners</li>
                                        <li><i class="fa fa-check"></i>Young graduates that have undergone specialized training and willing to establish business</li>
                                        <li><i class="fa fa-check"></i>Youths willing to be mentored by business owners</li>
                                    </ul>
                                </div>


                                <div class="wow zoomIn">
                                    <h4 class="mt-4">Opportunities Available</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Grant</li>
                                        <li><i class="fa fa-check"></i>Short and medium-term loan with minimal interest rate</li>
                                        <li><i class="fa fa-check"></i>Business mentorship</li>
                                        <li><i class="fa fa-check"></i>Sponsorship on business trainings</li>
                                    </ul>
                                </div>


                                <div class="wow zoomIn">
                                    <h4 class="mt-4">Resource Requirements</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Government Empowerment scheme for Youths</li>
                                        <li><i class="fa fa-check"></i>Donor Agencies</li>
                                        <li><i class="fa fa-check"></i>Philanthropists</li>
                                        <li><i class="fa fa-check"></i>High Net Worth Individuals</li>
                                        <li><i class="fa fa-check"></i>Distinguished Business Owners</li>
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
