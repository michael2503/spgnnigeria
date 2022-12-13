@extends('guest.layouts.appmain')
@section('title', 'Change password')


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
                        <h4>Change Password</h4>
                    </div>
                    <div class="section-heading-line"></div>
                </div>

                <div class="text-center">
                    {{-- <x-GuestComps.errorLink/> --}}
                    <x-GuestComps.successMessage/>
                </div>


                <div class="row d-flex justify-content-center">

                    <div class="col-xl-6 col-lg-6">
                        <div class="card card-body">
                            <div id="recaptcha-form">
                                <div class="form">
                                    <form id="contact-form" name="contact-form" action="{{ route('userChangePasswordSubmit') }}" method="post">
                                        @csrf

                                        <div class="fomr-group mb-4">
                                            <label for="old" class="text-muted mb-0">Old Password</label>
                                            <input type="password" id="old" class="form-control" name="old_password">
                                            <div class="formErr">{{$errors->first('old_password')}}</div>
                                            @if(Session::has('oldPass'))
                                            <div class="formErr">
                                                {{Session::pull('oldPass')}}
                                            </div>
                                            @endif
                                        </div>

                                        <div class="fomr-group mb-4">
                                            <label for="new" class="text-muted mb-0">New Password</label>
                                            <input type="password" id="new" class="form-control" name="password">
                                            <div class="formErr">{{$errors->first('password')}}</div>
                                        </div>

                                        <div class="fomr-group">
                                            <label for="retype" class="text-muted mb-0">Retpe New Password</label>
                                            <input type="password" id="retype" class="form-control" name="password_confirmation">
                                            <div class="formErr">{{$errors->first('password_confirmation')}}</div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="submit btn btn-success rounded-0" id="input-submit">Submit</button>
                                        </div>
                                    </form><br>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section><br>




        </div>
    </div>



</div>


@endsection
