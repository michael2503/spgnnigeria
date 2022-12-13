@extends('guest.layouts.appmain')
@section('title', 'About Spgn')


@section('content')


<x-GuestComps.breadcrum bigTitle='About SPGN' smallTitle='About SPGN'/>


<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-7 col-sm-12 col-12  wow fadeInLeft">
                <div class="pr-30-md">
                    <div class="section-heading">
                        <h4>Who We Are</h4>
                    </div>
                    <div class="section-heading-line-left"></div>
                    <div class="text-content-big mt-20">
                        <p class="text-justify">Superior Performance Global Network (SPGN) is a people-oriented organization with the passionate vision of improving the quality of human life for superior performance. SPGN offers psychological, guidance and counselling services in specialized areas such as suicidal behaviors, career counselling, conflict resolution/crisis intervention, life transition, self-esteem, depression and family difficulties. We support the psychological and emotional wellbeing of adolescents, adults and couples by providing counseling, and behavior modification tips all of which adhere to strict standards of confidentiality. Also, we partner with other professionals and a number of methods are employed to enable people to respond to their problems, develop good coping skills, support structure and character. We generally assist people to find different ways of functioning more effectively. Various techniques are used in different dimensions to heal and provide a better quality of life, which enables them to imbibe the new world they have just started after healing. Life is then filled with fresh air, which helps the client to manage the new life with zeal and utmost motivation.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-5 col-sm-12 col-12 wow fadeInRight float-right">
                {{-- <div class="about-img black-opacity" style="margin-top: 80px">
                    <img src="{{ asset('images/banner/chart.png') }}" class="rounded-border shadow-primary" alt="img">
                </div> --}}

                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0&appId=264004618155505&autoLogAppEvents=1" nonce="Qd48PcZ6"></script>



                <div class="fb-page" data-href="https://www.facebook.com/SPGNNigeria/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SPGNNigeria/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SPGNNigeria/">Superior Performance Global Network - SPGN</a></blockquote></div>

            </div>
        </div>
    </div>
</div>





<div class="section-block-parallax black-overlay-60" style="background-image: url('{{ asset('images/banner/bg17.jpg') }}');">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 col-md-12 col-12">
                    <div class="pr-30-md">
                        <div class="section-heading mt-30">
                            <h3 class="white-color">Healing Mind Since 2015</h3>
                            <div class="section-heading-line-left"></div>
                            <p class="text-justify">There is no gainsaying the fact that nearly half of the global population are young people. The vast majority of them struggle to stay in school, to access training, to find a job, to make their voices heard in society. But if we empower these millions of young people, educate them, help them to become the best and most productive citizens they can be, we will set them on a course to improve their lives, grow their countries’ economies, strengthen their societies, lift up and empower the generations coming up behind them. This is why we explore the underlying foundations of growth - the experiences and relationships that help youth discover purpose, meaning, initiative, creativity, resilience, love of learning, empathy, and other internal strengths that foster a life of well-being. Our goal is that every Nigerian youth must possess the necessary life skills to succeed and lead a productive life.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12"> <img src="{{ asset('images/banner/map.png') }}" class="mb-15-xs" alt="map"> </div>
            <div class="col-md-5 col-sm-6 col-12 offset-md-1">
                <div class="section-heading">
                    <h5>A Proven Record</h5>
                    <div class="section-heading-line-left"></div>
                </div>
                <div class="text-content text-justify mt-25">
                    <p>At SPGN, we derive enormous personal satisfaction from helping others. We try our best to create an empathetic therapeutic environment that is non-judgmental and client-focused. People are helped to find a path through which they can re-discover themselves and smiles which are lost are gained.</p>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
