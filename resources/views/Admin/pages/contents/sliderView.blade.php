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


            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Slide</h5>

                        <form method="post" id="myAwesomeDropzone" action="{{ route('submitAddedSlide') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                <div class="formErr">{{$errors->first('title')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="btn_title">Button Title <span class="text-danger">*</span></label>
                                <input type="text" name="btn_title" id="btn_title" class="form-control" value="{{ old('btn_title') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="link">Button Link <span class="text-danger">*</span></label>
                                <input type="text" name="link" id="link" class="form-control" value="{{ old('link') }}">
                            </div>

                            <div class="mt-3">
                                <input type="file" class="dropify" data-default-file="" name="banner"/>
                                <p class="text-muted text-center mt-2 mb-0">Max File size</p>
                            </div>

                            <div class="form-group mb-3">
                                <label for="sub_title">Content <span class="text-danger">*</span></label>
                                <textarea name="sub_title" class="form-control" id="sub_title" rows="6">{{ old('sub_title') }}</textarea>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">ADD SLIDE</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-xl-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">All Slide</h5>

                        @foreach ($slides as $slide)
                        <div class="eachSlide mb-4 pb-4" style="border-bottom: 1px solid #ccc">
                            <img src="{{ $slide->banner }}" style="width: 100%" alt="{{ $slide->title }}">
                            <p>{{ $slide->title }}</p>
                            <div class="d-flex justify-content-start">
                                <div class="mr-3"><a href="{{ route('editSliderView', $slide->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></div>
                                <div class="ml-3"><button onclick="deleteSlide({{ $slide->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Warning</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center">
                <p>Are you sure you want to delete this slide?</p>
                <form method="post" action="{{ route('deleteSlide') }}">
                    @csrf
                    <input type="hidden" name="id" id="deleteID">

                    <button class="btn btn-danger btn-sm mr-3">YES</button>
                    <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function deleteSlide($id){
        $('#deleteModal').modal();
        document.getElementById('deleteID').value = $id;
    }
</script>

@endsection
