

@extends("Admin.AdminLayout.app")
@section('title', 'Change Password')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Change Password"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>

            {{-- <x-GuestComps.errorLink/> --}}




            <form method="post" id="myAwesomeDropzone" action="{{ route('submitRestpass') }}" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Reset Password</h5>

                            <div class="form-group mb-3">
                                <label for="old_password">Old password <span class="text-danger">*</span></label>
                                <input type="password" name="old_password" id="old_password" class="form-control">
                                <input type="hidden" name="id" id="old_password" class="form-control">
                                <div class="formErr">{{$errors->first('old_password')}}</div>
                                <div class="formErr">{{ session::pull('oldPass') }}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">New password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="formErr">{{$errors->first('password')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password_confirmation">Confirm Password password <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                <div class="formErr">{{$errors->first('password_confirmation')}}</div>
                            </div>

                            <div class="text-center mb-3 mt-4">
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Submit</button>
                            </div>

                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

                </div>

            </form>

        </div>

    </div>
</div>




@endsection
