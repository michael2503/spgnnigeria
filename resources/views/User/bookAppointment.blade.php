@extends('guest.layouts.appmain')
@section('title', 'Contact Us')


@section('content')

<div style="display: flex">

    <div class="theSideMenu" id="theSideMenu" style="flex: 1">
        <x-UserComps.sidebar/>
    </div>


    <div id="theMainPage" class="theMainPage" style="flex: 1; border-left: 1.5px solid #ccc">
        <div class="container">

            <section id="contact-spgn" class="section-block">

                <div class="text-center mb-5">
                    <div class="section-heading">
                        <h4>Book Session</h4>
                    </div>
                    <div class="section-heading-line"></div>
                </div>

                <div class="text-center">
                    {{-- <x-GuestComps.errorLink/> --}}
                    <x-GuestComps.successMessage/>
                </div>


                <div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div id="recaptcha-form">
                            <div class="form">
                                <form id="contact-form" name="contact-form" action="{{ route('submitSession') }}" method="post">
                                    @csrf
                                    <p class="text-danger">*All fields are requires</p>
                                    <div class="row mt-4">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="service" class="text-muted mb-0">Appointment For</label>
                                                <select name="service" class="form-control mt-1" id="">
                                                    <option label="--Select--" hidden></option>
                                                    <option value="Therapy Session">Therapy Session</option>
                                                    <option value="Psychological Session">Psychological Session</option>
                                                    <option value="Empowerment Programme">Empowerment Programme</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <div class="formErr">{{$errors->first('service')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="schedule_date" class="text-muted mb-0">Schedule Date <small>(Please give at least 24 hours ahead notice)</small></label>
                                                <input type="datetime-local" name="schedule_date" value="{{ old('schedule_date') }}" id="schedule_date" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('schedule_date')}}</div>
                                                @if(Session::has('scheduleFail'))
                                                <div class="formErr">
                                                    {{Session::pull('scheduleFail')}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="first_name" class="text-muted mb-0">First Name</label>
                                                <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" placeholder="First Name" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('first_name')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="last_name" class="text-muted mb-0">Last Name</label>
                                                <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name" placeholder="Last Name" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('last_name')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="email" class="text-muted mb-0">Email</label>
                                                <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Email" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('email')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="phone" class="text-muted mb-0">Phone</label>
                                                <input type="text" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Phone" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('phone')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-4">
                                                <label for="address" class="text-muted mb-0">Address</label>
                                                <input type="text" name="address" value="{{ old('address') }}" id="address" placeholder="Address" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('address')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="city" class="text-muted mb-0">City</label>
                                                <input type="text" name="city" value="{{ old('city') }}" id="city" placeholder="City" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('city')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="state" class="text-muted mb-0">State</label>
                                                <input type="text" name="state" value="{{ old('state') }}" id="state" placeholder="State" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('state')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="dob" class="text-muted mb-0">Date of Birth</label>
                                                <input type="date" name="dob" value="{{ old('dob') }}" id="dob" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('dob')}}</div>
                                                @if(Session::has('dobFail'))
                                                <div class="formErr">
                                                    {{Session::pull('dobFail')}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-0">
                                                <label for="occupation" class="text-muted mb-0">Occupation</label>
                                                <input type="text" name="occupation" value="{{ old('occupation') }}" id="occupation" placeholder="Occupation" class="form-control mt-1">
                                                <div class="formErr">{{$errors->first('occupation')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-0">
                                                <label for="gender" class="text-muted mb-3">Gender</label>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="radio" class="custom-control-input" name="gender" value="Male" id="male">
                                                    <label for="male" class="custom-control-label">Male</label>
                                                </div>

                                                <div class="custom-control custom-checkbox mt-2">
                                                    <input type="radio" class="custom-control-input" name="gender" value="Female" id="female">
                                                    <label for="female" class="custom-control-label">Female</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mt-2">
                                                    <input type="radio" class="custom-control-input" name="gender" value="Other" id="other">
                                                    <label for="other" class="custom-control-label">Other <span class="text-muted">(Identity other tham M/F)</span></label>
                                                </div>

                                                <div class="formErr">{{$errors->first('gender')}}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-0">
                                                <label for="ocupation" class="text-muted mb-3">Marital Status</label>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="radio" class="custom-control-input" value="Married" name="marital_status" id="married">
                                                    <label for="married" class="custom-control-label">Married</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mt-2">
                                                    <input type="radio" class="custom-control-input" value="Single" name="marital_status" id="single">
                                                    <label for="single" class="custom-control-label">Single</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mt-2">
                                                    <input type="radio" class="custom-control-input" value="Divorced" name="marital_status" id="divoced">
                                                    <label for="divoced" class="custom-control-label">Divorced</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mt-2">
                                                    <input type="radio" class="custom-control-input" name="marital_status" value="Living Together" id="living_together">
                                                    <label for="living_together" class="custom-control-label">Living Together</label>
                                                </div>

                                                <div class="formErr">{{$errors->first('marital_status')}}</div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 mt-4 col-lg-12">
                                            <label for="input-message" class="text-muted">More Information</label>
                                            <textarea name="message" type="text" id="input-message" placeholder="Message" class="form-control">{{ old('customermessage') }}</textarea>
                                            <div class="formErr">{{$errors->first('customermessage')}}</div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="submit btn btn-success rounded-0" id="input-submit">Submit</button>
                                    </div>
                                </form><br>
                            </div>
                        </div>
                    </div>

                </div>

            </section><br>




        </div>
    </div>



</div>


@endsection
