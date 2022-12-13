@extends('guest.layouts.appmain')
@section('title', 'Psychological Services')


@section('content')


<x-GuestComps.breadcrum bigTitle='Psychological Services' smallTitle='Psychological Services'/>


<div class="section-block">
    <div class="container">
        <div class="section-heading">
            <h4 style="font-size: 17px" class="text-center">PSYCHOLOGICAL / GUIDANCE AND COUNSELLING SERVICES</h4>
        </div>
        <div class="section-heading-line"></div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-12 wow fadeInLeft">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading mt-20">
                        <img src="{{ asset('images/small-banner/psychological.jpg') }}" class="sm-resize" style="width: 1500px"><br><br>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-8 col-12">
                <div class="services-single-right">
                    <div class="text-content-big mt-20 wow zoomIn">
                        <p class="text-justify">SPGN offers psychological, guidance and counselling services in specialized areas such as suicidal behaviors, career counselling, conflict resolution, crisis intervention, life transition, self-esteem, depression and family difficulties.

                        We support the psychological and emotional wellbeing of adolescents, adults and couples by providing counseling, and behavior modification tips all of which adhere to strict standards of confidentiality. Also, we partner with other professionals and a number of methods are employed to enable people to respond to their problems, develop good coping skills, support structure and character. We generally assist people to find different ways of functioning more effectively.

                        Various techniques are used in different dimensions to heal and provide a better quality of life, which enables them to imbibe the new world they have just started after healing. Life is then filled with fresh air, which helps the client to manage the new life with zeal and utmost motivation.</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <img src="{{ asset('images/services/help.png') }}" width="100%">

                <div class="text-left mt-4">
                    <a class="button-tag pt-3 pb-3 primary-button rounded-0" href="{{ route('bookASessionView') }}">
                        BOOK A SESSION
                    </a>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-md-9 col-sm-8 col-12">
                <div class="services-single-right">
                    <div class="text-content-big mt-20 wow zoomIn">
                        <p class="text-justify">There is no gainsaying the fact that nearly half of the global population are young people. The vast majority of them struggle to stay in school, to access training, to find a job, to make their voices heard in society. But if we empower these millions of young people, educate them, help them to become the best and most productive citizens they can be, we will set them on a course to improve their lives, grow their countries’ economies, strengthen their societies, lift up and empower the generations coming up behind them. This is why we explore the underlying foundations of growth - the experiences and relationships that help youth discover purpose, meaning, initiative, creativity, resilience, love of learning, empathy, and other internal strengths that foster a life of well-being. Our goal is that every Nigerian youth must possess the necessary life skills to succeed and lead a productive life.</p>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-4 col-12 wow fadeInRight">
                <div class="services-single-left-box"><br>
                    <div class="services-single-left-heading mt-20">
                        <img src="{{ asset('images/services/words.png') }}" class="sm-resize" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="services-single-right">
                    <div class="text-content-big mt-20 wow fadeInUp">


                        <p class="text-justify">At SPGN, we derive enormous personal satisfaction from helping others. We try our best to create an empathetic therapeutic environment that is non-judgmental and client-focused. People are helped to find a path through which they can re-discover themselves and smiles which are lost are gained.</p>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




@endsection
