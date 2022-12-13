@extends('guest.layouts.appmain')
@section('title', 'FAQ')


@section('content')

<style>
    .team-img img{
        height: 320px !important;
        width: 100%;
        object-fit: cover;
        object-position: 0px -10px;
    }
</style>

<x-GuestComps.breadcrum bigTitle='FAQ' smallTitle='FAQ'/>


<div class="count-back-box" style="background-image: url({{ asset('images/banner/bg-8.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="construction-box">
                <div class="construction-icons"> <i class="icon-settings" id="cons-icon-1"></i> <i class="icon-settings" id="cons-icon-2"></i> </div>
            </div>
            <div class="wrapper">
                <div class="clock">
                    <!-- <div class="column days mr-20-md">
                        <div class="timer" id="days"></div>
                        <h5>DAY</h5>
                    </div>
                    <div class="timer">:</div> -->
                    <div class="column">
                        <div class="timer" id="hours">COMING</div>
                        <!-- <h5>HOUR</h5> -->
                    </div>
                    <div class="timer">:</div>
                    <div class="timer">:</div>
                    <div class="column">
                        <div class="timer" id="minutes">SOON</div>
                        <!-- <h5>MINUTE</h5> -->
                    </div>
                    <!-- <div class="timer">:</div>
                    <div class="column">
                        <div class="timer" id="seconds"></div>
                        <h5>SECOND</h5>
                    </div> -->
                </div>
            </div>
            <div class="count-back-box-text">
                <h3>UNDER CONSTRUCTION</h3>
                <!-- <h6>We’ll be here soon with our new awesome site, subscribe to be notified.</h6> -->
            </div>
        </div>
    </div>
</div>





@endsection
