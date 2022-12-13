
@extends("Admin.AdminLayout.app")
@section('title', 'Blog')


@section('content')
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Manage Blog"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>






            <div class="owl-carousel">
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-5">
                        <div class="post-slide">
                            <a href="{{ route('blogDetails', [$blog->id, $blog->slug]) }}">
                                <div class="post-img">
                                    @if ($blog->image)
                                    <img src="{{ $blog->image }}" alt="">
                                    @else
                                    <img src="{{ asset('images/blog/demo.jpg') }}" alt="">
                                    @endif
                                    <div class="category">{{ date('M d, Y', strtotime($blog->created_at)) }}</div>
                                </div>
                            </a>
                            <div class="post-review">
                                <h3 class="post-title"><a href="{{ route('blogDetails', [$blog->id, $blog->slug]) }}">{{ $blog->title }}</a></h3>
                                <p class="post-description">
                                    {{ strip_tags(substr($blog->content, 0, 150)) }}
                                </p>
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('blogSingle', $blog->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                    <button onclick="deleteBlog({{ $blog->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>


                <div class="d-flex justify-content-center mt-3">
                    {!! $blogs->links() !!}
                </div>
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
          <p>Are you sure you want to delete this blog?</p>
          <form method="post" action="{{ route('deleteAdminBlog') }}">
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
    function deleteBlog($id, $delPubID){
        $('#deleteModal').modal();
        document.getElementById('deleteID').value = $id;
    }
    function closeAddModal() {
        document.getElementById('addPhotos').style.display = 'none';
    }
</script>
@endsection
