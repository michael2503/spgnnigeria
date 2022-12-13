@extends('guest.layouts.appmain')
@section('title', 'SPGN ADDS - ON')


@section('content')


<x-GuestComps.breadcrum bigTitle='SPGN ADDS - ON' smallTitle='SPGN ADDS - ON'/>


<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h4 style="font-size: 17px" class="text-center">SPGN ADD - ONS</h4>
        </div>
        <div class="section-heading-line"></div>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-12 mt-30 wow fadeInLeft">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>Empowerment Programmes</h4>
                    </div>
                    <x-GuestComps.empowermentMenu active='addon' />
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                <div class="services-single-right">

                    <div class="project-single-text">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="wow zoomIn">
                                    <h4>Introduction</h4>
                                    <p>These add-ons which are courtesy our partners render such other assistance in relation to the Scheme and they include:</p>



                                    <ul>
                                        <li><i class="fa fa-check"></i>Registration of business and obtaining requisite permit at the relevant regulatory agencies in Nigeria</li>
                                        <li><i class="fa fa-check"></i>Assistance with opening of Corporate Accounts with major Nigerian financial institutions in Nigeria</li>
                                        <li><i class="fa fa-check"></i>Applying for and securing relevant grants, aids and assistance as may become available from time to time</li>
                                        <li><i class="fa fa-check"></i>Promote businesses of Youths by offering opportunities to exhibit their skills and talents</li>
                                        <li><i class="fa fa-check"></i>Free Legal Advice</li>
                                        <li><i class="fa fa-check"></i>Production of branding and marketing tools such as Digital Ads, Complimentary Cards, Flyers, Roll-Up Banners either for free or heavily subsidized rate</li>
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
