
@extends("Admin.AdminLayout.app")
@section('title', 'Photo Gallery')


@section('content')
<style>
    .img-wraper{
        width: 100%; height: 250px
    }
    .img-a-pix{
        width: 100%; height: 100%;
    }
    .img-wraper img{
        object-fit: cover;
        object-position: top !important;
    }
</style>

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Photo Gallery"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>




            <div class="card card-body p-2">
                <div class="row">
                    <div class="col-xl-6">
                        <select class="form-control" id="getCat">
                            <option label="Sort By" hidden></option>
                            <option value="all">All</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-6">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addPhotos">Add Photos</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="d-flex justify-content-between mb-3">
                <h4 class="header-title mt-1">{{ ucwords($cats) }}</h4>
                <h4 class="header-title mt-1">{{ $from }} - {{ $to }} of ({{ $total }})</h4>
            </div>


            <div class="row">
                @foreach ($images as $img)
                <div class="col-sm-6 col-xl-4">
                    <div class="gal-box">
                        <div class="img-wraper">
                            <a href="{{ $img->photo }}" class="image-popup img-a-pix" title="Screenshot-1">
                                <img src="{{ $img->photo }}" class="img-fluid img-a-pix" alt="work-thumbnail">
                                {{-- <p>{{ $img->id }}</p> --}}
                            </a>
                        </div>
                        <div class="gall-info">
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <button class="btn btn-success btn-sm">{{ date('M d, Y', strtotime($img->created_at)) }}</button>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-sm" onclick="deleteImage({{ $img->id }}, '{{ $img->public_id }}')"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div> <!-- gallery info -->
                    </div> <!-- end gal-box -->
                </div> <!-- end col -->
                @endforeach
            </div>


            <div class="d-flex justify-content-center mt-3">
                {!! $images->links() !!}
            </div>




        </div>

    </div>
</div>



<div class="modal fade @if($errors->first('file') || $errors->first('category')) show @endif"
    id="addPhotos"
    @if($errors->first('file') || $errors->first('category'))
        aria-modal="true"
        style="display: block; padding-right: 15px; background: rgba(0, 0, 0, .3)"
    @else
        style="display: none"
        aria-hidden="true"
    @endif
>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Photos</h4>
          <button type="button" onclick="closeAddModal()" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="padding-bottom: 100px">
            <form action="{{ route('uploadPhoto') }}" enctype="multipart/form-data" method="post" id="myAwesomeDropzone">
                @csrf
                <div class="form-group">
                    <select name="category" class="form-control">
                        <option hidden label="Select Category"></option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="formErr">{{$errors->first('category')}}</div>
                </div>

                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Upload Image</h5>

                    <div class="mt-3">
                        <input type="file" class="dropify" data-max-file-size="1M" name="file" />
                        <p class="text-muted text-center mt-2 mb-0">Max File size of 1m</p>
                    </div>
                </div>
                <div class="formErr">{{$errors->first('file')}}</div>

                <div class="text-center" style="position: absolute; bottom: 30px; left: 45%">
                    <button class="btn btn-primary">SUBMIT</button>
                </div>
            </form>
        </div>

      </div>
    </div>
</div>


{{-- DELETE MODAL --}}
<!-- The Modal -->
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
                <p>Are you sure you want to delete this Image?</p>
                <form method="post" action="{{ route('deletePhotoGallery') }}">
                    @csrf
                    <input type="hidden" name="dleteID" id="deleteID">
                    <input type="hidden" name="pubID" id="deletePubID">

                    <button class="btn btn-danger btn-sm mr-3">YES</button>
                    <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function deleteImage($id, $delPubID){
        $('#deleteModal').modal();
        document.getElementById('deleteID').value = $id;
        document.getElementById('deletePubID').value = $delPubID;
    }
    function closeAddModal() {
        document.getElementById('addPhotos').style.display = 'none';
    }


    const select = document.getElementById('getCat');
    select.addEventListener('change', function handleChange(event) {
        const value = select.options[select.selectedIndex].value;
        window.location.replace("/administrator/gallery/photo/" + value);
    });

</script>
@endsection
