@extends("Admin.AdminLayout.app")
@section('title', 'Manage Slider')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">
            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Managse Slider"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>


            <div class="row d-flex justify-content-center">
                <div class="col-xl-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit Slide</h5>

                        <form method="post" id="myAwesomeDropzone" action="{{ route('submitUpdateSlide') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $slide->id }}">
                            <div class="form-group mb-3">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $slide->title }}">
                                <div class="formErr">{{$errors->first('title')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="btn_title">Button Title <span class="text-danger">*</span></label>
                                <input type="text" name="btn_title" id="btn_title" class="form-control" value="{{ $slide->btn_title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="link">Button Link <span class="text-danger">*</span></label>
                                <input type="text" name="link" id="link" class="form-control" value="{{ $slide->link }}">
                            </div>

                            <div class="mt-3">
                                <input type="file" class="dropify" data-default-file="{{ $slide->banner }}" name="banner"/>
                                <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                            </div>

                            <div class="form-group mb-3">
                                <label for="sub_title">Content <span class="text-danger">*</span></label>
                                <textarea name="sub_title" id="sub_title" class="form-control" rows="6">{{ $slide->sub_title }}</textarea>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">UPDATE SLIDE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

@endsection
