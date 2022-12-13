@extends('guest.layouts.app')
@section('title', 'Welcome to SPGN Nigeria')


@section('content')

{{-- SLIDER MOBILE VIEW --}}
<div class="swiper-main-slider swiper-container mobileView">
    <div class="swiper-wrapper">
        @foreach ($sliders as $slider)
        <div class="swiper-slide" style="background-image:url({{ $slider->banner }});">
            <div class="medium-overlay"></div>
            <div class="container">
                <div class="slider-content left-holder">
                    <h2 class="animated fadeInDown"> {{ $slider->title }} </h2>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <p class="animated fadeInDown"> {!! $slider->sub_title !!} </p>
                        </div>
                    </div>
                    <div class="animated fadeInUp mt-30"> <a href="{{ $slider->link }}" class="primary-button button-md"><?=$slider->btn_title?></a> </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

{{-- SLIDER DESTOP VIEW --}}
<div class="desktopView">
    <div class="rev_slider_wrapper fs-slider-wrap bg-arrows">
        <div id="rev_slider" class="rev_slider fullscreenbanner">
            <ul>
                @foreach ($sliders as $slider)
                <li class="slideWrapp" data-delay="5000" data-transition="slidingoverlayleft" data-slotamount="7" data-masterspeed="2500" data-fsmasterspeed="1000">
                    <img src="{{ $slider->banner }}" alt="" data-bgposition="right center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                    <div class="getOver">
                        <div class="textTitle slide-title tp-caption tp-resizeme text-center" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-30','-30', '-150', '-350']"
                            data-fontweight="700"  data-height="none" data-color="#fff" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-frames='[{"delay":700,"speed":2500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-start="500" data-responsive_offset="on" data-elementdelay="0.05">{{ $slider->title }}</div>
                        <div class="text-subTitle slide-subtitle tp-caption tp-resizeme text-center" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['65','65', '-60', '-50']"
                            data-fontweight="300"   data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                            data-transform_out="opacity:0;s:1000;s:1000;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-color="#fff" data-splitin="none" data-splitout="none">{!! $slider->sub_title !!} </div>
                        <a href="{{ $slider->link }}">
                        <div class="tp-caption rev-btn tp-resizeme slider-btn primary-button" id="slide-1081-layer-14" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['150','150','40','90']"
                            data-fontsize="['15','15','15','15']" data-fontweight="400" data-lineheight="['50','50','50','50']" data-width="['200','200','200','200']" data-height="none" data-whitespace="nowrap" data-start="1500" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"-70px","delay":"","speed":"2500","ease":"Power1.easeInOut"}]'
                            data-responsive_offset="on" data-splitin="none" data-splitout="none" data-frames='[{"delay":1100,"speed":1000,"frame":"0","from":"y:50px;opacity:0;fb:10px;fbr:100;","to":"o:1;fb:0;fbr:100;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;fbr:110%;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="">{{ $slider->btn_title }} </div></a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


{{-- WHO WE ARE --}}
<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12  wow fadeInLeft">
                <div class="pr-30-md">
                    <div class="section-heading">
                        <h4>Who We Are</h4>
                    </div>
                    <div class="section-heading-line-left"></div>
                    <div class="text-content-big mt-20">
                        <p class="text-justify"><b>Superior Performance Global Network (SPGN)</b> is a people-oriented organization with the passionate vision of improving the quality of human life for superior performance by providing help, hope and psychological support as well as empowering young people to succeed in life. SPGN offers:</p>
                    </div>
                    <div class="mt-20">
                        <ul class="primary-list">
                            <li><i class="fa fa-check-square"></i>Psychological, Guidance and Counselling Services</li>
                            <li><i class="fa fa-check-square"></i>Career Counselling</li>
                            <li><i class="fa fa-check-square"></i>Conflict Resolution/Crisis Intervention</li>
                            <li><i class="fa fa-check-square"></i>Life Transition</li>
                            <li><i class="fa fa-check-square"></i>Self-Esteem</li>
                            <li><i class="fa fa-check-square"></i>Depression and Family Difficulties</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12 wow fadeInRight">
                <div class="about-img black-opacity" style="margin-top: 40px">
                    <img src="{{ asset('images/small-banner/admin-3.jpg') }}" class="rounded-border shadow-primary" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>



{{-- WHAT WE DO --}}
<div class="section-block-parallax" style="background-image: url('{{ asset('images/banner/bg14.jpg') }}');">
    <div class="container">

        <div class="section-heading center-holder white-color">
            <h4>What We Do</h4> <br>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="feature-box-5 wow fadeInLeft"> <i class="icon-tag2"></i>
                    <h4>Counselling</h4>
                    <p class="text-justify">SPGN offers psychological, guidance and counselling services in specialized areas such as suicidal behaviors, career counselling, conflict resolution, crisis intervention, life transition, self-esteem, depression and family difficulties.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="feature-box-5 wow fadeInUp"> <i class="icon-flag3"></i>
                    <h4>Training & Conference</h4>
                    <p class="text-justify">TURNING POINT is an annual Youth Leadership event cum conference that seeks to address an increasing cost of a generation defined by a skills gap and left unprepared for their future. The event is an effort to empower, educate...</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="feature-box-5 wow fadeInRight"> <i class="icon-wallet"></i>
                    <h4>Empowerment Program</h4>
                    <p class="text-justify">Superior Performance Global Network has among its objectives to empower young people between the ages of 18 to 40 years old irrespective of gender, religion, ethnic background, educational qualification etc.</p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 col-sm-12 col-12">
                <div class="blog-list-left">

                    <blockquote class="blockquote wow fadeInUp">
                        <p class="text-justify">Life gets difficult. If there were a constant in life, that would probably be one of the most consistent ones. For some of us, we can dust ourselves off, pick ourselves up and get going again when we hit a roadblock, but for others, it can be incredibly hard.

                        And in those times, we may sometimes need a helping hand to get back on our feet again. Here at SPGN, that’s what our team hopes to help you do, get back on your feet again. A journey of self-discovery can be both a daunting and yet exciting journey. Our team at SPGN hopes to accompany you on this journey, where we strive to make it a pleasant experience.

                        Don’t you dare quit. Don’t you dare settle for less. Don’t you dare back down. Not today or any other day. When the tough moments come, never forget you are in that moment writing your legacy. In that tough moment you are setting the standard for your character. Every day must be a COMMITMENT - To improve, To be better, To be stronger, In every area of your life!</p>
                        </blockquote>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
