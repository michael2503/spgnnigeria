@extends('guest.layouts.appmain')
@section('title', 'Our Team')


@section('content')

<style>
    .team-img img{
        height: 320px !important;
        width: 100%;
        object-fit: cover;
        object-position: 0px -10px;
    }
</style>

<x-GuestComps.breadcrum bigTitle='Our Team' smallTitle='Our Team'/>


<div class="section-block-grey">
        <div class="container">
            <div class="section-heading center-holder">
                <h3>Our creative team</h3>
                <div class="section-heading-line"></div>
            </div>
            <div class="row mt-50">
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 wow fadeInUp">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('images/team/odufuwa1.jpg') }}" alt="img"> </div>
                        <div class="team-info"> <span>CEO</span>
                            <h4><a href="#">Mr Segun Odufuwa</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 wow fadeInUp">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('images/team/lawyer.jpeg') }}" alt="img"> </div>
                        <div class="team-info"> <span>Legal Director</span>
                            <h4><a href="#">Yinka Akinrinmade Esq</a></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 wow fadeInUp">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('images/team/media2.png') }}" alt="img"> </div>
                        <div class="team-info"> <span>Project Lead</span>
                            <h4><a href="#">Ayuba David Ogundero</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 wow fadeInUp">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('images/team/technical2.png') }}" alt="img"> </div>
                        <div class="team-info"> <span>Technical Director</span>
                            <h4><a href="#">Omotosho Michael</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
