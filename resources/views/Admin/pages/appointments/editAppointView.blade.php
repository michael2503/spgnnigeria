
@extends("Admin.AdminLayout.app")
@section('title', 'Appointments')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Appointments"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>
            <x-GuestComps.errorMessage/>



            <div class="edit">
                <form id="contact-form" name="contact-form" action="{{ route('adminSubmitUpdate') }}" method="post">
                    @csrf
                    <p class="text-danger">*All fields are requires</p>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card-box">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">User Information</h5>

                                <div class="form-group mb-4">
                                    <label for="first_name" class="text-muted mb-0">First Name</label>
                                    <input type="text" name="first_name" value="{{ $appoint->first_name }}" id="first_name" placeholder="First Name" class="form-control mt-1">
                                    <input type="hidden" name="appID" value="{{ $appoint->id }}" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('first_name')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="last_name" class="text-muted mb-0">First Name</label>
                                    <input type="text" name="last_name" value="{{ $appoint->last_name }}" id="last_name" placeholder="First Name" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('last_name')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="email" class="text-muted mb-0">Email</label>
                                    <input type="email" name="email" value="{{ $appoint->email }}" id="email" placeholder="Email" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('email')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="phone" class="text-muted mb-0">Phone</label>
                                    <input type="text" name="phone" value="{{ $appoint->phone }}" id="phone" placeholder="Phone" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('phone')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="dob" class="text-muted mb-0">Date of Birth</label>
                                    <input type="date" name="dob" value="{{ $appoint->dob }}" id="dob" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('dob')}}</div>
                                    @if(Session::has('dobFail'))
                                    <div class="formErr">
                                        {{Session::pull('dobFail')}}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group mb-4">
                                    <label for="occupation" class="text-muted mb-0">Occupation</label>
                                    <input type="text" name="occupation" value="{{ $appoint->occupation }}" id="occupation" placeholder="Occupation" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('occupation')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="address" class="text-muted mb-0">Address</label>
                                    <input type="text" name="address" value="{{ $appoint->address }}" id="address" placeholder="Address" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('address')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="city" class="text-muted mb-0">City</label>
                                    <input type="text" name="city" value="{{ $appoint->city }}" id="city" placeholder="City" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('city')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="state" class="text-muted mb-0">State</label>
                                    <input type="text" name="state" value="{{ $appoint->state }}" id="state" placeholder="State" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('state')}}</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-6">
                            <div class="card-box">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Other Information</h5>

                                <div class="form-group mb-4">
                                    <label for="service" class="text-muted mb-0">Appointment For</label>
                                    <select name="service" class="form-control mt-1" id="">
                                        <option label="--Select--" hidden></option>
                                        <option @if($appoint->service == 'Therapy Session') selected @endif value="Therapy Session">Therapy Session</option>
                                        <option @if($appoint->service == 'Psychological Session') selected @endif value="Psychological Session">Psychological Session</option>
                                        <option @if($appoint->service == 'Empowerment Programme') selected @endif value="Empowerment Programme">Empowerment Programme</option>
                                        <option @if($appoint->service == 'Training') selected @endif value="Training">Training</option>
                                        <option @if($appoint->service == 'Others') selected @endif value="Others">Others</option>
                                    </select>
                                    <div class="formErr">{{$errors->first('service')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="schedule_date" class="text-muted mb-0">Schedule Date <small>(Please give at least 24 hours ahead notice)</small></label>
                                    <input type="datetime-local" name="schedule_date" value="{{ $appoint->schedule_date }}" id="schedule_date" class="form-control mt-1">
                                    <div class="formErr">{{$errors->first('schedule_date')}}</div>
                                    @if(Session::has('scheduleFail'))
                                    <div class="formErr">
                                        {{Session::pull('scheduleFail')}}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group mb-4">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Gender</h5>
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" @if($appoint->gender == 'Male') checked @endif name="gender" value="Male" id="male">
                                        <label for="male" class="custom-control-label">Male</label>
                                    </div>

                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="radio" class="custom-control-input" @if($appoint->gender == 'Female') checked @endif name="gender" value="Female" id="female">
                                        <label for="female" class="custom-control-label">Female</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="radio" class="custom-control-input" @if($appoint->gender == 'Other') checked @endif name="gender" value="Other" id="other">
                                        <label for="other" class="custom-control-label">Other <span class="text-muted">(Identity other tham M/F)</span></label>
                                    </div>

                                    <div class="formErr">{{$errors->first('gender')}}</div>
                                </div>

                                <div class="form-group mb-4">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Marital Status</h5>
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" @if($appoint->marital_status == 'Married') checked @endif value="Married" name="marital_status" id="married">
                                        <label for="married" class="custom-control-label">Married</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="radio" class="custom-control-input" @if($appoint->marital_status == 'Single') checked @endif value="Single" name="marital_status" id="single">
                                        <label for="single" class="custom-control-label">Single</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="radio" class="custom-control-input" @if($appoint->marital_status == 'Divorced') checked @endif value="Divorced" name="marital_status" id="divoced">
                                        <label for="divoced" class="custom-control-label">Divorced</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="radio" class="custom-control-input" @if($appoint->marital_status == 'Living Together') checked @endif name="marital_status" value="Living Together" id="living_together">
                                        <label for="living_together" class="custom-control-label">Living Together</label>
                                    </div>

                                    <div class="formErr">{{$errors->first('marital_status')}}</div>
                                </div>

                                <div class="form-group mb-0 mt-4">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Note</h5>
                                    <textarea name="message" type="text" id="input-message" rows="8" placeholder="Message" class="form-control">{{ $appoint->message }}</textarea>
                                    <div class="formErr">{{$errors->first('customermessage')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="submit btn btn-success rounded-0" id="input-submit">Submit Update</button>
                    </div>
                </form><br>
            </div>

        </div>

    </div>
</div>


@endsection
