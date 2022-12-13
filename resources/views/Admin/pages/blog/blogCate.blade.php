
@extends("Admin.AdminLayout.app")
@section('title', 'Blog Category')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Blog Category"
                urlTitle="Blog"
                url="{{ route('adminblogView') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>



            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Category</h5>

                        <form method="post" action="{{ route('submitAddedcat') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Category <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                <div class="formErr">{{$errors->first('name')}}</div>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">All Category</h5>

                        @foreach ($blogCats as $cat)
                            <div class="bg-light mb-2 p-2">
                                <p class="mb-0"><b>{{ $cat->name }}</b></p>
                                <p class="mt-2 mb-0">
                                    <button onclick="editSocial({{ $cat->id }}, '{{ $cat->name }}')" class="mr-2 bg-success"><i class="fa fa-pencil"></i></button>
                                    <button onclick="deleteCat({{ $cat->id }})" class="bg-danger"><i class="fa fa-trash"></i></button>
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
          <p>Are you sure you want to delete this category?</p>
          <form method="post" action="{{ route('deleteBlogCat') }}">
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
          <h4 class="modal-title">EDIT BLOG CATEGORY</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{ route('updateBlogCat') }}">
            @csrf
            @method('put')
            <input type="hidden" name="blogcatID" id="deleteIDEdit">

            <div class="form-group mb-3">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="nameEdit" class="form-control">
                <div class="formErr">{{$errors->first('name')}}</div>
            </div>

            <div class="mt-4">
                <button class="btn btn-danger btn-sm mr-3">UPDATE</button>
                <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">CANCEL</button>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>

<script>
    function deleteCat($id){
        $('#deleteModal').modal();
        document.getElementById('deleteID').value = $id;
    }
    function editSocial(id, name){
        $('#editModal').modal();
        document.getElementById('deleteIDEdit').value = id;
        document.getElementById('nameEdit').value = name;
    }
</script>
@endsection
