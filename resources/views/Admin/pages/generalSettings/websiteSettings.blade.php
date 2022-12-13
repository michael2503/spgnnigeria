@extends("Admin.AdminLayout.app")
@section('title', 'Website Settings')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">
            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Website Settings"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>


            <form method="post" id="myAwesomeDropzone" action="{{ route('updateWebSettings') }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General Details</h5>

                            <div class="form-group mb-3">
                                <label for="biz_name">Business Name <span class="text-danger">*</span></label>
                                <input type="text" name="biz_name" id="biz_name" class="form-control" value="{{ $webSet->biz_name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="site_name">Site Name <span class="text-danger">*</span></label>
                                <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $webSet->site_name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="site_title">Site Title <span class="text-danger">*</span></label>
                                <input type="text" name="site_title" id="site_title" class="form-control" value="{{ $webSet->site_title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="site_url">Site URL <span class="text-danger">*</span></label>
                                <input type="text" name="site_url" id="site_url" class="form-control" value="{{ $webSet->site_url }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="biz_email">Website Email 1 <span class="text-danger">*</span></label>
                                <input type="email" name="biz_email" id="biz_email" class="form-control" value="{{ $webSet->biz_email }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="biz_email_2">Website Email 2 <span class="text-danger">*</span></label>
                                <input type="email" name="biz_email_2" id="biz_email_2" class="form-control" value="{{ $webSet->biz_email_2 }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="site_phone">Website Phone Number 1<span class="text-danger">*</span></label>
                                <input type="text" name="biz_phone" id="site_phone" class="form-control" value="{{ $webSet->biz_phone }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="site_phone_2">Website Phone Number 2<span class="text-danger">*</span></label>
                                <input type="test" name="biz_phone_2" id="site_phone_2" class="form-control" value="{{ $webSet->biz_phone_2 }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="biz_addr">Website Address<span class="text-danger">*</span></label>
                                <input type="text" name="biz_addr" id="biz_addr" class="form-control" value="{{ $webSet->biz_addr }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="biz_city">Website City<span class="text-danger">*</span></label>
                                <input type="text" name="biz_city" id="biz_city" class="form-control" value="{{ $webSet->biz_city }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="biz_state">Website state<span class="text-danger">*</span></label>
                                <input type="text" name="biz_state" id="biz_state" class="form-control" value="{{ $webSet->biz_state }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="biz_country">Website Country<span class="text-danger">*</span></label>
                                <input type="text" name="biz_country" id="biz_country" class="form-control" value="{{ $webSet->biz_country }}">
                            </div>

                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Website Favicon</h5>

                            <input type="hidden" name="default_favicon" value="{{ $webSet->favicon_url }}">
                            <div class="mt-3">
                                <input type="file" class="dropify" data-default-file="{{ $webSet->favicon_url }}" name="favicon"/>
                                <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                            </div>
                        </div> <!-- end col-->


                        <div class="card-box">
                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Website Logo</h5>

                            <input type="hidden" name="default_logo" value="{{ $webSet->logo_url }}">
                            <div class="mt-3">
                                <input type="file" class="dropify" data-default-file="{{ $webSet->logo_url }}" name="logo"/>
                                <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                            </div>
                        </div> <!-- end col-->


                        <div class="card-box">
                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Website Short Description</h5>

                            <div class="form-group mb-3">
                                <textarea rows="7" name="site_description" class="form-control">{{ $webSet->site_description }}</textarea>
                            </div>
                        </div> <!-- end col-->

                    </div> <!-- end col-->

                </div>
                <!-- end row -->



                <div class="row mt-4">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Update Info</button>
                        </div>
                    </div> <!-- end col -->
                </div>
            <!-- end row -->
            </form>
        </div>

    </div>
</div>



@endsection
