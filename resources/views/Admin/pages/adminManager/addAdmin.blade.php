
@extends("Admin.AdminLayout.app")
@section('title', 'Add Admin')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Add Admin"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>




            <form method="post" id="myAwesomeDropzone" action="{{ route('submitAddAdmin') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General Details</h5>

                            <div class="form-group mb-3">
                                <label for="first_name">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
                                <div class="formErr">{{$errors->first('first_name')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
                                <div class="formErr">{{$errors->first('last_name')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="username">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                                <div class="formErr">{{$errors->first('username')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                <div class="formErr">{{$errors->first('email')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="formErr">{{$errors->first('password')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}">
                                <div class="formErr">{{$errors->first('role')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                <div class="formErr">{{$errors->first('phone')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                                <div class="formErr">{{$errors->first('address')}}</div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="country">Country<span class="text-danger">*</span></label>
                                        <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}">
                                        <div class="formErr">{{$errors->first('country')}}</div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="state">State<span class="text-danger">*</span></label>
                                        <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}">
                                        <div class="formErr">{{$errors->first('state')}}</div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Profile Image</h5>

                            <div class="mt-3">
                                <input type="file" class="dropify" data-max-file-size="1M" name="photo" />
                                <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                            </div>
                        </div> <!-- end col-->

                        <div class="card-box">
                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Biography</h5>

                            <div class="mt-3">
                                <textarea name="bio" class="form-control" rows="9">{{ old('bio') }}</textarea>
                                <div class="formErr">{{$errors->first('bio')}}</div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Add Admin</button>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </form>

        </div>

    </div>
</div>




@endsection
