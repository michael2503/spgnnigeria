
@extends("Admin.AdminLayout.app")
@section('title', 'Social Links')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Social Media Links"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>



            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Link</h5>

                        <form method="post" action="{{ route('submitAddedLink') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="social_name">Social Name <span class="text-danger">*</span></label>
                                <input type="text" name="social_name" id="social_name" class="form-control" value="{{ old('social_name') }}">
                                <div class="formErr">{{$errors->first('social_name')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="social_url">Social URL <span class="text-danger">*</span></label>
                                <input type="text" name="social_url" id="social_url" class="form-control" value="{{ old('social_url') }}">
                                <div class="formErr">{{$errors->first('social_url')}}</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="social_icon">Icon <span class="text-danger">*</span></label>
                                <input type="text" name="social_icon" id="social_icon" class="form-control" value="{{ old('social_icon') }}">
                                <div class="formErr">{{$errors->first('social_icon')}}</div>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="show" name="status" value="1">
                                <label class="custom-control-label" for="show">Show on website</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="not_show" name="status" value="0">
                                <label class="custom-control-label" for="not_show">Do not show on website</label>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Add Link</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Link</h5>

                        @foreach ($links as $link)
                            <div class="bg-light mb-2 p-2">
                                <p class="mb-0"><b>{{ $link->social_name }}</b></p>
                                <p class="mb-0">Link: <a href="{{ $link->social_url }}">{{ $link->social_url }}</a></p>
                                <p class="mt-2 mb-0">
                                    <button onclick="editSocial({{ $link->id }}, '{{ $link->social_url }}', '{{ $link->social_name }}', '{{ $link->social_icon }}', {{ $link->status }})" class="mr-2 bg-success"><i class="fa fa-pencil"></i></button>
                                    <button onclick="deleteImage({{ $link->id }})" class="bg-danger"><i class="fa fa-trash"></i></button>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>





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
          <form method="post" action="{{ route('deleteSocailLink') }}">
            @csrf
            <input type="hidden" name="dleteID" id="deleteID">

            <button class="btn btn-danger btn-sm mr-3">YES</button>
            <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">NO</button>
          </form>
        </div>

      </div>
    </div>
</div>



<!-- The Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Social Media</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{ route('updateSocailLink') }}">
            @csrf
            @method('put')
            <input type="hidden" name="sosID" id="deleteIDEdit">

            <div class="form-group mb-3">
                <label for="social_name">Social Name <span class="text-danger">*</span></label>
                <input type="text" name="social_name" id="social_nameEdit" class="form-control">
                <div class="formErr">{{$errors->first('social_name')}}</div>
            </div>

            <div class="form-group mb-3">
                <label for="social_url">Social URL <span class="text-danger">*</span></label>
                <input type="text" name="social_url" id="social_urlEdit" class="form-control">
                <div class="formErr">{{$errors->first('social_url')}}</div>
            </div>

            <div class="form-group mb-3">
                <label for="social_icon">Icon <span class="text-danger">*</span></label>
                <input type="text" name="social_icon" id="social_iconEdit" class="form-control">
                <div class="formErr">{{$errors->first('social_icon')}}</div>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="showEdit" name="statusEdit" value="1">
                <label class="custom-control-label" for="showEdit">Show on website</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="not_showEdit" name="statusEdit" value="0">
                <label class="custom-control-label" for="not_showEdit">Do not show on website</label>
            </div>

            <div class="mt-4">
                <button class="btn btn-danger btn-sm mr-3">SUBMIT</button>
                <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">CANCEL</button>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>

<script>
    function deleteImage($id){
        $('#deleteModal').modal();
        document.getElementById('deleteID').value = $id;
    }
    function editSocial(id, name, url, icon, status){
        $('#editModal').modal();
        document.getElementById('deleteIDEdit').value = id;
        document.getElementById('social_nameEdit').value = name;
        document.getElementById('social_urlEdit').value = url;
        document.getElementById('social_iconEdit').value = icon;
    }
</script>
@endsection
