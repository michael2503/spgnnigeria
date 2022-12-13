@extends('guest.layouts.appmain')
@section('title', 'Training Conferences')


@section('content')


<x-GuestComps.breadcrum bigTitle='Training Conferences' smallTitle='Training Conferences'/>


<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h4 style="font-size: 17px" class="text-center">CONFERENCES</h4>
        </div>
        <div class="section-heading-line"></div>

        <div class="services-single-right">

            <div class="project-single-text">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12 wow fadeInLeft">
                        <h4>Our Vision</h4>
                        <p>These adds-on which are courtesy our partners render such other assistance in relation to the Scheme and they include:</p>
                    </div>


                    <div class="col-md-4 col-sm-12 col-12 wow fadeInUp">
                        <img src="{{ asset('images/banner/turning.png') }}" width="100%">
                    </div>


                    <div class="col-md-4 col-sm-12 col-12 wow fadeInRight">
                        <h4>Our Mission</h4>
                        <p>These adds-on which are courtesy our partners render such other assistance in relation to the Scheme and they include:</p>
                    </div>
                </div>


                <div class="text-center wow fadeInUp">
                    <div class="animated fadeInUp mt-30"> <a href="{{ route('turnPointIndex') }}" class="dark-button button-md">About Turning Point</a> </div>
                </div>
            </div>

        </div>
    </div>
</div>




@endsection
