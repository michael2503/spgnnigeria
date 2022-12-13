@extends('guest.layouts.appmain')
@section('title', 'Turning Point - 2018')


@section('content')


<x-GuestComps.breadcrum bigTitle='Turning Point Conferences' smallTitle='Turning Point - 2018'/>



<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-12 mb-4">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>All Turning Points</h4>
                    </div>

                    <x-GuestComps.turningPointMenu active='2018'/>

                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-12">
                <div class="services-single-right">
                    <div class="row wow zoomIn">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-10">
                          <div class="panel panel-default" align="center">
                            <img src="{{ asset('images/banner/turning-point-1.png') }}" class="sm-resize" style="width: 100%">
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-1"></div>
                    </div>


                    <div class="text-content-big mt-20 wow zoomIn">
                        <p class="text-justify">The maiden edition of The Youth Leadership Conference “Turning Point 1.0” was held on Saturday March 10, 2018 with a massive participation of youth across the State. The event featured speakers such as Helen Paul (Comedienne/Actress), Ubong King (The Trouble Maker - Chairman, Protection Plus Services Limited), Adepeju Jaiyeoba (CEO, Mothers Delivery Kit), Seyi Odufuwa (Managing Director, Skyview Capital Limited -Member of the Nigerian Stock Exchange), Lovette Otegbola (Dance Instructor and Choreographer), Chris Osiobe (Wright & Co. Limited) and Prince Joshua Oyeniyi (CEO, Amborion Media Global).</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
