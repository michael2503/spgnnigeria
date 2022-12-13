@extends('guest.layouts.appmain')
@section('title', 'Rewriting Your Story - 2019')


@section('content')


<x-GuestComps.breadcrum bigTitle='Turning Point Conferences' smallTitle='Rewriting Your Story - 2019'/>



<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-12 mb-4">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>All Turning Points</h4>
                    </div>

                    <x-GuestComps.turningPointMenu active='2019'/>

                    <div class="services-single-left-heading mt-40">
                        <h4><b>REWRITE YOUR STORY</b></h4><br>
                        <img src="{{ asset('images/banner/old-new-life.png') }}" class="sm-resize" style="width: 100%"><br><br>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-12">
                <div class="services-single-right">
                    <div class="row wow zoomIn">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-10">
                          <div class="panel panel-default" align="center">
                            <img src="{{ asset('images/banner/turning-point-2.png') }}" class="sm-resize" style="width: 100%">
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-1"></div>
                    </div>


                    <div class="text-content-big mt-20 wow zoomIn">
                        <p class="text-justify"><b>TURNING POINT 2.0</b> tagged “<b>“Rewriting your story</b>” was held on January 26, 2019 at the Onikan Youth Centre, Onikan, Lagos. The event which had a gathering of over 1000 youths featured prominent speakers such as <b>Dr. Chidi Okpaluba</b>, <b>Ubong King</b>, <b>Waidi Akanni</b>, <b>Tim Atimoe</b>, <b>Munachi Mbonu</b>, <b>Olatayo Ajiboye</b>, <b>Tinu Oyenuga</b>, <b>Jide Peters</b>, <b>Dr. Dapo Agunbiade</b>, <b>Muhktaar Tijani</b> and <b>Keji Hamilton</b>.</p>

                        <p class="text-justify">The theme for the second edition was inspired by the words of a British Novelist and Poet, Clive Staples Lewis who says <b>- You can’t go back and change the beginning, but you can start where you are and change the ending</b>. It is believed that only if we stop blaming government, employers, mothers, fathers, sisters, brothers, ex-spouses or former lovers, our background or heritage and take charge of our life, then we can redesign our future.</p>

                        <p class="text-justify">This is because, to “rewrite your story” is more than a cliché or temporary behavior modification - rather it is a permanent and inspirational change that begins when we decide to take responsibility for our actions.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
