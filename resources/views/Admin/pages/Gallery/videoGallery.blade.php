

@extends("Admin.AdminLayout.app")
@section('title', 'Video Gallery')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Video Gallery"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>




            <div class="card card-body p-2">
                <div class="row">
                    <div class="col-xl-6">
                        <h4 class="header-title mt-1">List of Videos</h4>
                    </div>
                    <div class="col-xl-6">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addvideo">Add Video</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                @foreach ($videos as $vid)
                <div class="col-sm-6 col-xl-4">
                    <div class="gal-box">
                        <div class="img-wraper">
                            <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $vid->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="gall-info">
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <button class="btn btn-success btn-sm">{{ date('M d, Y', strtotime($vid->created_at)) }}</button>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-sm" onclick="deleteVideo({{ $vid->id }})"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div> <!-- gallery info -->
                    </div> <!-- end gal-box -->
                </div> <!-- end col -->
                @endforeach
            </div>


            <div class="d-flex justify-content-center mt-3">
                {!! $videos->links() !!}
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
                <p>Are you sure you want to delete this video?</p>
                <form method="post" action="{{ route('deleteVideoGallery') }}">
                    @csrf
                    <input type="hidden" name="id" id="deleteID">

                    <button class="btn btn-danger btn-sm mr-3">YES</button>
                    <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addvideo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Video</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="padding-bottom: 100px">

          <form action="{{ route('uploadVideo') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Video Title</label>
              <input type="text" name="vid_title" class="form-control" value="{{ old('vid_title') }}">
            </div>


            <div class="form-group">
              <label>Video Url</label>
              <small>Enter the last code of your youtube video</small><br>
              <small>E.g https://youtu.be/<span style="background: #ccc">x7UjRKipgBU</span></small><br><br>
              <input type="text" name="url" class="form-control" value="{{ old('url') }}">
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-primary">SUBMIT</button>
            </div>
          </form>


        </div>

      </div>
    </div>
</div>

<script>
    function deleteVideo($id){
        $('#deleteModal').modal();
        document.getElementById('deleteID').value = $id;
    }
</script>

@endsection
