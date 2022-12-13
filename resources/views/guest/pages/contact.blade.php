@extends('guest.layouts.appmain')
@section('title', 'Contact Us')


@section('content')
<style>
    .icon i{
        width: 70px;
        height: 70px;
        background: #d21e2b;
        border-radius: 8px;
        margin-right: 8px;
        padding-top: 15px;
        color: #fff;
        font-size: 35px;
        text-align: center;
    }
</style>


<x-GuestComps.breadcrum bigTitle='Contact' smallTitle='Contact'/>

<x-GuestComps.errorLink/>
<x-GuestComps.successMessage/>








<section id="contact-spgn" class="section-block">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-heading">
                <h4>Get In Touch</h4>
            </div>
            <div class="section-heading-line"></div>
        </div>


        <div class="row">


            <div class="col-xl-6 col-lg-6">
                <section id="spgn_map" style="border: 5px solid #ccc">
                    <div class="map001">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.666627760045!2d3.3828089571498774!3d6.605445692536597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b92fea3d31c51%3A0x5ff4eb840cd769fa!2s12+Onakoya+St%2C+Ikosi+Ketu%2C+Lagos!5e0!3m2!1sen!2sng!4v1543849629440" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </section><br>
            </div>


            <div class="col-xl-6 col-lg-6">
                <div id="recaptcha-form">
                    <div class="form">
                        <form id="contact-form" name="contact-form" action="{{ route('submitContactForm') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-0">
                                        {{-- <label for="input-name"></label> --}}
                                        <input type="text" name="name" value="{{ old('name') }}" id="input-name" placeholder="Your Full Name" class="form-control">
                                        <div class="formErr">{{$errors->first('name')}}</div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-0">
                                        {{-- <label for="input-phone-number"></label> --}}
                                        <input type="text" name="phone_number" value="{{ old('phone_number') }}" id="input-phone-number" placeholder="Your Phone Number" class="form-control">
                                        <div class="formErr">{{$errors->first('phone_number')}}</div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-0">
                                        {{-- <label for="input-email"></label> --}}
                                        <input type="email" name="email" value="{{ old('email') }}" id="input-email" placeholder="Email address" class="form-control">
                                        <div class="formErr">{{$errors->first('email')}}</div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 col-lg-12">
                                    {{-- <label for="input-message"></label> --}}
                                    <textarea name="customermessage" type="text" id="input-message" placeholder="Message" class="form-control">{{ old('customermessage') }}</textarea>
                                    <div class="formErr">{{$errors->first('customermessage')}}</div>
                                </div>
                            </div>
                            <button class="submit btn btn-success rounded-0" id="input-submit">Submit</button>
                        </form><br>
                    </div>
                </div>
            </div>

        </div>


        <div class="spgn-info">
            <div class="clearfix"></div><br><br><br>
            <div class="spgn-contact-details links">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-3">
                        <div class="d-flex justify-content-start">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div>
                                <h5>Phone</h5>
                                <p><a href="tel:+2347086484790">+234 708 648 4790</a></p>
                                <p><a href="tel:+2348023655968">+234 802 365 5968</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-3">
                        <div class="d-flex justify-content-start">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div>
                                <p><a href="mailto:info@spgnnigeria.org">info@spgnnigeria.org</a></p>
                                <p><a href="mailto:spgn_nigeria@yahoo.com">spgn_nigeria@yahoo.com</a></p>
                                <p><a href="mailto:olusegun.odufuwa@yahoo.com">olusegun.odufuwa@yahoo.com</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-3">
                        <div class="d-flex justify-content-start">
                            <div class="icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div>
                                <h5>Address</h5>
                                <p>12, Onakoya Street, Ikosi, </p>
                                <p>Lagos. Nigeria.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-3">
                        <div class="d-flex justify-content-start">
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div>
                                <h5>We Open</h5>
                                <p>Monday - Friday </p>
                                <p>Time: 10am - 8pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br>





@endsection
